<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Divisi extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('user');
        $this->load->model('barang');
		$this->load->model('datamodel', 'data');
        $this->load->model('divisimodel', 'divisi');
        $this->current_user = $this->user->getCurrentUser();
    }

    public function index()
	{
        $data = array(
            'content' => 'divisi',
            'current_user' => $this->current_user,
            'divisi' => $this->divisi->get_data()
        );
        $this->load->view('home', $data);
	}

    public function tambah()
    {
        $this->divisi->tambah();
        redirect(base_url('divisi'));
    }

    public function edit($id)
    {
        $this->divisi->edit($id);
        redirect(base_url('divisi'));
    }

    public function hapus($id)
    {
        $this->divisi->hapus($id);
        redirect(base_url('divisi'));
    }
}
