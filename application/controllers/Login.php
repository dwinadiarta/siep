<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('user');
    }

    public function index()
	{
        if (!$this->session->userdata('logged_in')) {
            $this->load->view('auth-login');
        } else {
            return redirect(base_url('home'));
        }
	}

    public function postLogin()
    {
        $this->user->login();
        redirect($_SERVER['HTTP_REFERER']);
    }
}
