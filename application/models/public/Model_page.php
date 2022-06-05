<?php
class Model_page extends CI_Model
{

    public function sejarah()
    {
        return $this->db->get('histories')->row_array();
    }

    public function visimisi()
    {
        return $this->db->get('visimisi')->row_array();
    }

    public function logomotto()
    {
        return $this->db->get('logomotto')->row_array();
    }

    public function struktur()
    {
        return $this->db->get('struktur')->row_array();
    }

    public function sambutan_yayasan()
    {
        return $this->db->get('yayasan')->row_array();
    }

    public function sambutan_kepsek()
    {
        return $this->db->get('impressium')->row_array();
    }

    public function get_data_informasi_public()
    {
        $data=[
            "nama_kepala_sekolah" => $this->db->query("SELECT nama FROM `guru` WHERE guru.kepala_sekolah = 1 LIMIT
            1;")->row()->nama,
            "jumlah_siswa"=>$this->db->get('siswa')->num_rows(),
            "jumlah_guru"=>$this->db->get('guru')->num_rows(),
            "jumlah_jurusan"=>$this->db->get('jurusan')->num_rows(),
            "jumlah_kelas"=>$this->db->get('kelas')->num_rows(),
            "data_sekolah"=>$this->db->limit(1)->get('data_sekolah  ')->row(),
        ];

        return $data;
    }
}