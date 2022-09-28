<?php

class Studi_model extends CI_Model{

    function data_studi()
    {
        $this->db->select('*');
        $this->db->from('tjurusan');
        return $this->db->get()->result();
    }


}


