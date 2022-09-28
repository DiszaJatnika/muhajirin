<?php

class Sistem_model extends CI_Model{

    function showsistem(){
        return $this->db->get('tpengaturan_sistem')->result();
    }

    function tahunajaran(){
        return $this->db->get('ttahun_ajaran')->result();
    }

    function ubah_pengaturan(){
        
        $tahun_ajaran   = $this->input->post('tahun_ajaran');
        $semester_aktif = $this->input->post('semester_aktif');
        $krs_awal       = $this->input->post('krs_awal');
        $krs_akhir      = $this->input->post('krs_akhir');
        $uts_awal       = $this->input->post('uts_awal');
        $uts_akhir      = $this->input->post('uts_akhir');
        $uas_awal       = $this->input->post('uas_awal');
        $uas_akhir      = $this->input->post('uas_akhir');

        $data_update = array(
            'tahun_ajaran_aktif'            => $tahun_ajaran,      
            'semester_aktif'    => $semester_aktif,      
            'tanggal_pengisian_krs_awal'    => $krs_awal,      
            'tanggal_pengisian_krs_akhir'   => $krs_akhir,      
            'tanggal_pengisian_uts_awal'    => $uts_awal,      
            'tanggal_pengisian_uts_akhir'   => $uts_akhir,      
            'tanggal_pengisian_uas_awal'    => $uas_awal,      
            'tanggal_pengisian_uas_akhir'   => $uas_akhir      
        );
    	
        return $update = $this->db->where('pk_pengaturan_id', 2)->update('tpengaturan_sistem', $data_update);

    }
}