<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventaris extends CI_Controller {
    private $current_user = '';
    public function __construct() {
        parent::__construct();
        $this->load->model('user');
        $this->load->model('barang');
        $this->current_user = $this->user->getCurrentUser();
    }

    public function index()
	{
        $data = array(
            'content' => 'inventaris',
            'current_user' => $this->current_user,
            'barang' => $this->barang->get_barang()
        );
        $this->load->view('home', $data);
	}

    public function tambah()
    {
        $data = array(
            'content' => 'inventaris/tambah',
            'current_user' => $this->current_user
        );

        $this->load->view('home', $data);
    }

    public function input()
    {
        $this->barang->tambah();
        redirect(base_url('inventaris'));
    }

    public function lihat($id)
    {
        $data = array(
            'content' => 'inventaris/lihat',
            'current_user' => $this->current_user,
            'barang' => $this->barang->get_barang($id)[0]
        );

        $this->load->view('home', $data);
    }

    public function hapus($id)
    {
        $this->barang->hapus($id);
        redirect(base_url('inventaris'));
    }

    public function ubah($id) {
        $data = array(
            'content' => 'inventaris/ubah',
            'current_user' => $this->current_user,
            'barang' => $this->barang->get_barang($id)[0]
        );

        $this->load->view('home', $data);
    }

    public function edit($id) {
        $this->barang->edit($id);
        redirect(base_url('inventaris'));
    }
}
