<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ruang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user');
        $this->load->model('barang');
        $this->load->model('datamodel', 'data');
        $this->load->model('ruangmodel', 'ruang');
        $this->current_user = $this->user->getCurrentUser();
    }

    public function index()
    {
        $data = array(
            'content' => 'ruang',
            'current_user' => $this->current_user,
            'ruang' => $this->ruang->get_data()
        );
        $this->load->view('home', $data);
    }

    public function tambah()
    {
        $this->ruang->tambah();
        redirect(base_url('ruang'));
    }

    public function edit($id)
    {
        $this->ruang->edit($id);
        redirect(base_url('ruang'));
    }

    public function hapus($id)
    {
        $this->ruang->hapus($id);
        redirect(base_url('ruang'));
    }
}
