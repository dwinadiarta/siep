<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    private $current_user = '';
    public function __construct() {
        parent::__construct();
        $this->load->model('user');
        $this->current_user = $this->user->getCurrentUser();
    }

    public function index()
	{
        $id = $this->session->userdata('logged_in')->id;
        $user = $this->user->get_user($id)[0];
        $data = array(
            'content' => 'profile',
            'current_user' => $this->current_user,
            'user' => $user
        );
        $this->load->view('home', $data);
	}

    public function input()
    {
        if (null != $this->input->post('password')) {
            $data_in['password'] = md5($this->input->post('password'));
        }
        $data_in['full_name'] = $this->input->post('full_name');
        $data_in['phone'] = $this->input->post('phone');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['overwrite'] = TRUE;
        $username = $this->session->userdata('logged_in')->username;
        $file_name = $_FILES['photo']['name'];
        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $config['file_name'] = $username.".".$file_ext; 
        $this->load->library('upload', $config);
        $current_user = $this->current_user;
        if ($_FILES['photo']['tmp_name'] != "") {
            if (!$this->upload->do_upload('photo')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $error);
            } else {
                $data_in['photo'] = $config['file_name'];
                $data = array('upload_data' => $this->upload->data());
            }
        }
        $this->user->profile($data_in);
        return redirect(base_url('profile'));
    }
}
