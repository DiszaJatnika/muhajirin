<?php

class Jadkul_model extends CI_Model{

    function data_jadkul()
    {
        $this->db->select('*');
        $this->db->from('tjadwal_matkul');
        $this->db->join('tmatakuliah','tjadwal_matkul.fk_matakuliah_id = tmatakuliah.pk_matakuliah_id');
        $this->db->join('truangan','tjadwal_matkul.fk_ruangan_id = truangan.pk_ruangan_id');
        return $this->db->get()->result();
    }


}


