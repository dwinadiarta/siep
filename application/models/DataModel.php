<?php
class DataModel extends CI_Model {
    public function tambah() {
        $data_in['no_inventaris'] = $_POST['no_inventaris'];
        $data_in['jenis'] = $_POST['jenis'];
        $data_in['merek'] = $_POST['merek'];
        $data_in['divisi_id'] = $_POST['divisi_id'];
        $data_in['ruang_id'] = $_POST['ruang_id'];
        $data_in['kondisi'] = $_POST['kondisi'];
        $data_in['keterangan'] = $_POST['keterangan'];
        $data_in['created_by'] = $this->session->userdata('logged_in')->id;
        return $this->db->insert('data', $data_in);
    }

    public function get_data($id = NULL) {
        if ($id != NULL) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get('data');
        return $query->result();
    }

    public function hapus($id) {
        $this->db->where('id', $id);
        return $this->db->delete('data');
    }

    public function edit($id) {
        $data_in['no_inventaris'] = $_POST['no_inventaris'];
        $data_in['jenis'] = $_POST['jenis'];
        $data_in['merek'] = $_POST['merek'];
        $data_in['divisi_id'] = $_POST['divisi_id'];
        $data_in['ruang_id'] = $_POST['ruang_id'];
        $data_in['kondisi'] = $_POST['kondisi'];
        $data_in['keterangan'] = $_POST['keterangan'];
        $this->db->set($data_in);
        $this->db->where('id', $id);
        return $this->db->update('data');
    }
}
