<?php

class Pembimbing_model extends CI_Model{

    function get_izinkeluar(){
        $pegawai_id = $this->session->userdata('pegawai_id');
        $this->db->select('tbl_izinkeluarkomplek.*,tbl_siswa.nama_siswa,tbl_rombel.nama_rombel,tbl_pegawai.nama,pgw.nama as namapegawai,tbl_pegawai.pegawai_id');
        $this->db->order_by('tanggal', 'desc');
        $this->db->order_by('jam_keluar', 'desc');
        $this->db->join('tbl_pegawai','tbl_izinkeluarkomplek.pembimbing_approval_keluar = tbl_pegawai.pegawai_id','left');
        $this->db->join('tbl_pegawai as pgw','tbl_izinkeluarkomplek.pembimbing_approval_masuk = pgw.pegawai_id','left');
        $this->db->join('tbl_siswa','tbl_siswa.siswa_id = tbl_izinkeluarkomplek.siswa_id');
        $this->db->join('tbl_rombel','tbl_rombel.rombel_id = tbl_siswa.kelas_id');
        $this->db->where('tbl_izinkeluarkomplek.waktu_kembali =', NULL);
        $this->db->where('tbl_izinkeluarkomplek.pembimbing_approval_keluar =', $pegawai_id);
        // $this->db->or_where('tbl_izinkeluarkomplek.pembimbing_approval_masuk =', $pegawai_id);
        return $this->db->get('tbl_izinkeluarkomplek')->result(); 
    }

    function getPulang()
    {
        $pegawai_id = $this->session->userdata('pegawai_id');
        $this->db->select('tbl_izinpulang.*, tbl_siswa.nama_siswa, tbl_rombel.nama_rombel, tbl_pegawai.nama as riayah');
        $this->db->join('tbl_siswa','tbl_siswa.siswa_id = tbl_izinpulang.siswa_id');
        $this->db->join('tbl_rombel','tbl_rombel.rombel_id = tbl_siswa.kelas_id');
        $this->db->join('tbl_pegawai','tbl_izinpulang.riayah_approval = tbl_pegawai.pegawai_id');
        $this->db->where('tbl_izinpulang.pembimbing_id =', $pegawai_id);
        $this->db->order_by('tbl_izinpulang.tanggal_pengajuan ', 'DESC');
        return $this->db->get('tbl_izinpulang')->result_array(); 

    }

    function get_izinkeluar_all(){
        $pegawai_id = $this->session->userdata('pegawai_id');
        $this->db->select('tbl_izinkeluarkomplek.*,tbl_siswa.nama_siswa,tbl_rombel.nama_rombel,tbl_pegawai.nama,pgw.nama as namapegawai,tbl_pegawai.pegawai_id');
        $this->db->order_by('tanggal', 'desc');
        $this->db->order_by('jam_keluar', 'desc');
        $this->db->join('tbl_pegawai','tbl_izinkeluarkomplek.pembimbing_approval_keluar = tbl_pegawai.pegawai_id','left');
        $this->db->join('tbl_pegawai as pgw','tbl_izinkeluarkomplek.pembimbing_approval_masuk = pgw.pegawai_id','left');
        $this->db->join('tbl_siswa','tbl_siswa.siswa_id = tbl_izinkeluarkomplek.siswa_id');
        $this->db->join('tbl_rombel','tbl_rombel.rombel_id = tbl_siswa.kelas_id');
        $this->db->where('tbl_izinkeluarkomplek.pembimbing_approval_masuk =', NULL);
        return $this->db->get('tbl_izinkeluarkomplek')->result(); 
        // $this->db->or_where('tbl_izinkeluarkomplek.pembimbing_approval_keluar !=', $pegawai_id);
        // $this->db->or_where('tbl_izinkeluarkomplek.pembimbing_approval_masuk !=', $pegawai_id);
    }

    function getPembimbingApproval()
    {
        
        $pegawai_id = $this->session->userdata('pegawai_id');
        $this->db->select('tbl_izinkeluarkomplek.*,tbl_siswa.nama_siswa,tbl_rombel.nama_rombel,tbl_pegawai.nama,pgw.nama as namapegawai,tbl_pegawai.pegawai_id');
        $this->db->order_by('tanggal', 'desc');
        $this->db->order_by('jam_keluar', 'desc');
        $this->db->join('tbl_pegawai','tbl_izinkeluarkomplek.pembimbing_approval_keluar = tbl_pegawai.pegawai_id','left');
        $this->db->join('tbl_pegawai as pgw','tbl_izinkeluarkomplek.pembimbing_approval_masuk = pgw.pegawai_id','left');
        $this->db->join('tbl_siswa','tbl_siswa.siswa_id = tbl_izinkeluarkomplek.siswa_id');
        $this->db->join('tbl_rombel','tbl_rombel.rombel_id = tbl_siswa.kelas_id');
        $this->db->where('tbl_izinkeluarkomplek.waktu_kembali !=', NULL);
        $this->db->where('tbl_izinkeluarkomplek.pembimbing_approval_keluar =', $pegawai_id);
        $this->db->or_where('tbl_izinkeluarkomplek.pembimbing_approval_masuk =', $pegawai_id);
        return $this->db->get('tbl_izinkeluarkomplek')->result(); 
    }

    function approve_masuk($id)
    {
        $idkey       = decrypt_url($id);
        $pegawai_id  = $this->session->userdata('pegawai_id');
        $jamsekarang = date('H:i:s');
        $tanggalkembali = date('Y-m-d');

        $update = array(
            'tanggal_kembali' => $tanggalkembali,
            'waktu_kembali' => $jamsekarang,
            'pembimbing_approval_masuk' => $pegawai_id
        );

        
        $where = array(
            'izinkeluarkomplek_id' => $idkey
        );
        
        $data = $this->db->update('tbl_izinkeluarkomplek', $update, $where);
        
        if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
    }

    function get_rombel_aktif()
    {
        return $this->db->get_where('tbl_rombel', array('status' => 'A'))->result();
    }

    function get_siswa_rombel($id)
    {
        return $this->db->get_where('tbl_siswa', array('kelas_id' => $id));
    }

    function tambah_izin_keluar_komplek()
    {
        $jam_masuk  = $this->input->post('jam_masuk');
        $keterangan = $this->input->post('keterangan');
        $siswa      = $this->input->post('siswa');
        $pegawai_id = $this->session->userdata('pegawai_id');
        $tanggal    = date('Y-m-d');
        $jam_keluar = date('H:i:s');

        $insert = array(
            'siswa_id'      => $siswa,
            'tanggal'       => $tanggal,
            'jam_keluar'    => $jam_keluar,
            'batas_waktu'   => $jam_masuk,
            'pembimbing_approval_keluar' => $pegawai_id,
            'keterangan' => $keterangan
        );

        $this->db->insert('tbl_izinkeluarkomplek', $insert);

        if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
    }

    function getAllSiswaKeluarKomplek()
    {
        // SELECT b.nama_siswa,COUNT(a.siswa_id) AS total FROM tbl_izinkeluarkomplek a LEFT JOIN tbl_siswa b ON a.siswa_id = b.siswa_id 
        // GROUP BY a.siswa_id
        $query = $this->db->select('tbl_siswa.*, count(tbl_izinkeluarkomplek.siswa_id ) as total, tbl_rombel.nama_rombel');
        $query = $this->db->join('tbl_siswa','tbl_siswa.siswa_id = tbl_izinkeluarkomplek.siswa_id');
        $query = $this->db->join('tbl_rombel','tbl_siswa.kelas_id = tbl_rombel.rombel_id');
        $query = $this->db->group_by('tbl_izinkeluarkomplek.siswa_id');
        $query = $this->db->order_by('total', 'desc');
        $query = $this->db->get('tbl_izinkeluarkomplek');

        return $query->result_array();
    }

    function getSiswaKeluarKomplekById($id)
    {
        $siswaid = decrypt_url($id);
        
        $this->db->select('tbl_izinkeluarkomplek.*,tbl_pegawai.nama,pgw.nama as namapegawai,tbl_pegawai.pegawai_id');
        $this->db->order_by('tanggal', 'desc');
        $this->db->order_by('jam_keluar', 'desc');
        $this->db->join('tbl_pegawai','tbl_izinkeluarkomplek.pembimbing_approval_keluar = tbl_pegawai.pegawai_id','left');
        $this->db->join('tbl_pegawai as pgw','tbl_izinkeluarkomplek.pembimbing_approval_masuk = pgw.pegawai_id','left');
        $this->db->join('tbl_siswa','tbl_siswa.siswa_id = tbl_izinkeluarkomplek.siswa_id');
        $this->db->where('tbl_izinkeluarkomplek.siswa_id', $siswaid);        
        return $this->db->get('tbl_izinkeluarkomplek')->result_array(); 
    }

    function hapusKeluarKomplek($id)
    {
        $kode = decrypt_url($id);
        $this->db->delete('tbl_izinkeluarkomplek', array('izinkeluarkomplek_id' => $kode));
    }

    function getPulangApprove()
    {
        $pegawai_id = $this->session->userdata('pegawai_id');
        
        $this->db->select('tbl_izinpulang.*, tbl_siswa.nama_siswa, tbl_rombel.nama_rombel, tbl_pegawai.nama as riayah');
        $this->db->join('tbl_siswa','tbl_siswa.siswa_id = tbl_izinpulang.siswa_id');
        $this->db->join('tbl_rombel','tbl_rombel.rombel_id = tbl_siswa.kelas_id');
        $this->db->join('tbl_pegawai','tbl_izinpulang.riayah_approval = tbl_pegawai.pegawai_id');
        $this->db->where('tbl_izinpulang.pembimbing_id =', $pegawai_id);
        $this->db->where('tbl_izinpulang.status =', 'Disetujui');
        $this->db->order_by('tbl_izinpulang.tanggal_pengajuan ', 'DESC');
        return $this->db->get('tbl_izinpulang')->result_array(); 

    }

    function getPulangDisApprove()
    {
        $pegawai_id = $this->session->userdata('pegawai_id');
        
        $this->db->select('tbl_izinpulang.*, tbl_siswa.nama_siswa, tbl_rombel.nama_rombel, tbl_pegawai.nama as riayah');
        $this->db->join('tbl_siswa','tbl_siswa.siswa_id = tbl_izinpulang.siswa_id');
        $this->db->join('tbl_rombel','tbl_rombel.rombel_id = tbl_siswa.kelas_id');
        $this->db->join('tbl_pegawai','tbl_izinpulang.riayah_approval = tbl_pegawai.pegawai_id');
        $this->db->where('tbl_izinpulang.pembimbing_id =', $pegawai_id);
        $this->db->where('tbl_izinpulang.status =', 'Ditolak');
        $this->db->order_by('tbl_izinpulang.tanggal_pengajuan ', 'DESC');
        return $this->db->get('tbl_izinpulang')->result_array(); 

    }
}