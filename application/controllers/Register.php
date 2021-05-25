<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('user');
    }

    public function index()
    {
        $this->load->view('auth-register');
    }

    public function postRegister()
    {
        $this->user->create();
        redirect($_SERVER['HTTP_REFERER']);
    }
}
