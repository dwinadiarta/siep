<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user');
        $this->load->model('barang');
        $this->load->model('datamodel', 'data');
        $this->load->model('ruangmodel', 'ruang');
        $this->load->model('divisimodel', 'divisi');
        $this->current_user = $this->user->getCurrentUser();
    }

    public function index()
    {
        $data = array(
            'content' => 'data',
            'current_user' => $this->current_user,
            'data' => $this->data->get_data(),
            'ruang' => $this->ruang->get_data(),
            'divisi' => $this->divisi->get_data()
        );
        $this->load->view('home', $data);
    }

    public function tambah()
    {
        $this->data->tambah();
        redirect(base_url('data'));
    }

    public function edit($id)
    {
        $this->data->edit($id);
        redirect(base_url('data'));
    }

    public function hapus($id)
    {
        $this->data->hapus($id);
        redirect(base_url('data'));
    }
}
