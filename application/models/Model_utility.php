<?php
class Model_utility extends CI_Model 
{
    public function get_data_sekolah()
    {
        return $this->db->limit(1)->get('data_sekolah ')->row();
    }
}

?>