<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Management extends CI_Controller {
    private $current_user;
    public function __construct() {
        parent::__construct();
        $this->load->model('user');
        $this->current_user = $this->user->getCurrentUser();
    }

	public function index()
	{
        $data = array(
            'content' => 'user',
            'user' => $this->user->get_user(),
            'current_user' => $this->current_user
        );
        $this->load->view('home', $data);
	}

    public function tambah()
    {
        $data = array(
            'content' => 'user_management/tambah',
            'current_user' => $this->current_user
        );

        $this->load->view('home', $data);
    }

    public function input()
    {
        $data = $_POST;
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['overwrite'] = TRUE;
        $username = $_POST['username'];
        $file_name = $_FILES['photo']['name'];
        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $config['file_name'] = $username.".".$file_ext; 
        $this->load->library('upload', $config);
        $current_user = $this->current_user;
        if ($_FILES['photo']['tmp_name'] != "") {
            if (!$this->upload->do_upload('photo')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $error);
                $data['photo'] = "";
            } else {
                $data['photo'] = $config['file_name'];
                $data_in = array('upload_data' => $this->upload->data());
            }
        }
        $this->user->tambah($data);
        redirect(base_url('user_management'));
    }

    public function lihat($id)
    {
        $data = array(
            'content' => 'inventaris/lihat',
            'current_user' => $this->current_user,
            'user' => $this->user->get_user($id)[0]
        );

        $this->load->view('home', $data);
    }

    public function hapus($id)
    {
        $this->user->hapus($id);
        redirect(base_url('user_management'));
    }

    public function ubah($id) {
        $data = array(
            'content' => 'user_management/ubah',
            'current_user' => $this->current_user,
            'user' => $this->user->get_user($id)[0]
        );

        $this->load->view('home', $data);
    }

    public function edit($id) {
        $this->user->edit($id);
        redirect(base_url('user_management'));
    }
}
