<?php

class Hafalan_model extends CI_Model{

   
    function gethafalan()
    {
        $pegawai_id = $this->session->userdata('pegawai_id');
        $this->db->select('tbl_hafalan_siswa.*, tbl_siswa.nama_siswa, tbl_rombel.nama_rombel, tbl_pegawai.nama as nama_pembimbing,nama_jenis_kegiatan');
        $this->db->join('tbl_siswa','tbl_siswa.siswa_id = tbl_hafalan_siswa.siswa_id');
        $this->db->join('tbl_jenis_kegiatan','tbl_jenis_kegiatan.jenis_kegiatan_id = tbl_hafalan_siswa.jenis_kegiatan_id');
        $this->db->join('tbl_rombel','tbl_rombel.rombel_id = tbl_siswa.kelas_id');
        $this->db->join('tbl_pegawai','tbl_pegawai.pegawai_id = tbl_hafalan_siswa.pembimbing_id');
        $this->db->where('tbl_hafalan_siswa.pembimbing_id =', $pegawai_id);
        $this->db->order_by('tbl_hafalan_siswa.created_at', 'DESC');
        $this->db->limit(10);
        return $this->db->get('tbl_hafalan_siswa')->result_array(); 

    }

   

    function get_rombel_aktif()
    {
        return $this->db->get_where('tbl_rombel', array('status' => 'A'))->result();
    }

    function get_siswa_rombel($id)
    {
        return $this->db->get_where('tbl_siswa', array('kelas_id' => $id));
    }

    function get_kegiatan()
    {
        return $this->db->get('tbl_jenis_kegiatan')->result();
    }

    function tambah_hafalan() 
    {

        $siswa      = $this->input->post('siswa');
        $kgt     = $this->input->post('kgt');
        $pegawai_id = $this->session->userdata('pegawai_id');
        $tanggal    = date('Y-m-d');
        $keterangan = $this->input->post('keterangan');

        $insert = array(
            'siswa_id'               => $siswa,
            'jenis_kegiatan_id'      => $kgt,
            'created_at'                => $tanggal,
            'pembimbing_id'          => $pegawai_id,
            'keterangan'             => $keterangan
        );

        $this->db->insert('tbl_hafalan_siswa', $insert);

        if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
    }

  
}