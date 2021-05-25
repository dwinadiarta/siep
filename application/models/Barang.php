<?php
class Barang extends CI_Model {
    public function tambah() {
        $data_in['jenis'] = $_POST['jenis'];
        $data_in['merk'] = $_POST['merk'];
        $data_in['nomor'] = $_POST['nomor'];
        $data_in['kode'] = $_POST['kode'];
        $data_in['kondisi'] = $_POST['kondisi'];
        $data_in['keterangan'] = $_POST['keterangan'];
        $data_in['lokasi'] = $_POST['lokasi'];
        $data_in['created_by'] = $this->session->userdata('logged_in')->id;
        return $this->db->insert('barang', $data_in);
    }

    public function get_barang($id = NULL) {
        if ($id != NULL) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get('barang');
        return $query->result();
    }

    public function hapus($id) {
        $this->db->where('id', $id);
        return $this->db->delete('barang');
    }

    public function edit($id) {
        $data_in['jenis'] = $_POST['jenis'];
        $data_in['merk'] = $_POST['merk'];
        $data_in['nomor'] = $_POST['nomor'];
        $data_in['kode'] = $_POST['kode'];
        $data_in['kondisi'] = $_POST['kondisi'];
        $data_in['keterangan'] = $_POST['keterangan'];
        $data_in['lokasi'] = $_POST['lokasi'];
        $this->db->set($data_in);
        $this->db->where('id', $id);
        return $this->db->update('barang');
    }
}
