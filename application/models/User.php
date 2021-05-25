<?php

class User extends CI_Model {
    public $username;
    public $password;
    public $email;
    public $full_name;
    public $phone;
    public $role;

    public function tambah($data) {
        $data_in['username'] = $data['username'];
        $data_in['password'] = md5($data['password']);
        $data_in['email'] = $data['email'];
        $data_in['full_name'] = $data['full_name'];
        $data_in['phone'] = $data['phone'];
        $data_in['role'] = $data['role'];
        $data_in['photo'] = $data['photo'];
        return $this->db->insert('users', $data_in);
    }

    public function create() {
        $this->username = $_POST['username'];
        $this->password = md5($_POST['password']); 
        $this->email = $_POST['email'];
        $this->full_name = $_POST['full_name'];
        $this->phone = $_POST['phone'];
        $this->role = 'user';
        return $this->db->insert('users', $this);
    }

    public function read() {
        $query = $this->db->get('users');
        return $query->result();
    }

    public function update() {
        $this->username = $_POST['username'];
        $this->password = md5($_POST['password']);
        $this->email = $_POST['email'];
        return $this->db->update('users', $this, array('id' => $_POST['id']));
    }

    public function hapus($id) {
        $this->db->where('id', $id);
        return $this->db->delete('users');
    }

    public function login() {
        $post = $this->input->post();

        $this->db->where('email', $post['username'])
                 ->or_where('username', $post['username']);
        $user = $this->db->get('users')->row();
        if ($user) {
            $isPasswordTrue = (md5($_POST['password']) == $user->password);
            if($isPasswordTrue) {
                $this->session->set_userdata(['logged_in' => $user]);
                $this->_updateLastLogin($user->id);
            }
        }
    }

    private function _updateLastLogin($user_id) {
        return $this->db->update('users', array('id' => $user_id), array('last_login' => now())); 
    }

    public function getCurrentUser() {
        $id = $this->session->userdata('logged_in')->id;
        $query = $this->db->get_where('users', array('id' => $id));
        return $query->result()[0];
    }

    public function get_user($id = NULL) {
        if ($id != NULL) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get('users');
        return $query->result();
    }

    public function profile($data_in) {
        $this->db->set($data_in);
        $this->db->where('id', $this->session->userdata('logged_in')->id);
        return $this->db->update('users');
    }

    public function edit($id) {
        $data_in['username'] = $_POST['username'];
        $data_in['email'] = $_POST['email'];
        $data_in['full_name'] = $_POST['full_name'];
        if ($_POST['password'] != "") {
            $data_in['password'] = md5($_POST['password']);
        }
        $data_in['role'] = $_POST['role'];

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['overwrite'] = TRUE;
        $username = $_POST['username'];
        $file_name = $_FILES['photo']['name'];
        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $config['file_name'] = $username.".".$file_ext; 
        $this->load->library('upload', $config);
        if ($_FILES['photo']['tmp_name'] != "") {
            if (!$this->upload->do_upload('photo')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $error);
            } else {
                $data_in['photo'] = $config['file_name'];
                $data = array('upload_data' => $this->upload->data());
            }
        }

        $this->db->set($data_in);
        $this->db->where('id', $id);
        return $this->db->update('users');
    }
}
