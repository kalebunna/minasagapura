<?php
class Model_utility extends CI_Model
{
    public function get_data_sekolah()
    {
        return $this->db->limit(1)->get('data_sekolah ')->row();
    }

    public function get_nama_sekolah()
    {
        $this->db->limit(1);
        $data_sekolah    = $this->db->get("data_sekolah");
        if ($data_sekolah->num_rows() > 0) {
            return $data_sekolah->row()->nama_sekolah;
        } else {
            return "nama_sekolah_belumterisi";
        }
    }
}
