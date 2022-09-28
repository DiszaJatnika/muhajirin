<?php

class Kelas_model extends CI_Model{

    function data_kelas()
    {
        $this->db->select('*');
        $this->db->from('trombel');
        $this->db->join('tjurusan','trombel.fk_jurusan_id = tjurusan.pk_jurusan_id');
        $this->db->join('ttahun_ajaran','trombel.fk_tahun_ajaran_id = ttahun_ajaran.pk_tahunajaran_id');
        return $this->db->get()->result();
    }


}


