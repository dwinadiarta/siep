<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    private $current_user = '';
    public function __construct() {
        parent::__construct();
        $this->load->model('user');
        $this->current_user = $this->user->getCurrentUser();
    }

    public function index()
	{
        $data = array(
            'content' => 'dashboard',
            'current_user' => $this->current_user
        );
        $this->load->view('home', $data);
	}
}
