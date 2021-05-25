<?php
class DivisiModel extends CI_Model {
    public function tambah() {
        $data_in['nama'] = $_POST['nama'];
        return $this->db->insert('divisi', $data_in);
    }

    public function get_data($id = NULL) {
        if ($id != NULL) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get('divisi');
        return $query->result();
    }

    public function hapus($id) {
        $this->db->where('id', $id);
        return $this->db->delete('divisi');
    }

    public function edit($id) {
        $data_in['nama'] = $_POST['nama'];
        $this->db->set($data_in);
        $this->db->where('id', $id);
        return $this->db->update('divisi');
    }
}
