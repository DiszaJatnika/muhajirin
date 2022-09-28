<?php

class Matkul_model extends CI_Model{

    function data_matkul()
    {
        $this->db->select('*');
        $this->db->from('tmatakuliah');
        return $this->db->get()->result();
    }

     function input_data(){
     	

     	$k_matkul  = $this->input->post('k_matkul');
        $n_matkul  = $this->input->post('n_matkul');
       
        $data = array(
            'kode_matakuliah' => $k_matkul,
            'nama_matakuliah' => $n_matkul
        );

        $this->db->insert('tmatakuliah',$data);
        
    }

    function tambahdata($data){
        $this->db->insert('tmatakuliah', $data);
    }

    function tahun_ajaran_kurikulum()
    {
        $this->db->join('tkurikulum','tkurikulum.pk_kurikulum_id = ttahunajaran_kurikulum.fk_kurikulum_id');
        $this->db->join('ttahun_ajaran','ttahun_ajaran.pk_tahunajaran_id = ttahunajaran_kurikulum.fk_tahun_ajaran_id');
        $this->db->order_by('tahun_ajaran', 'desc');
        return $this->db->get("ttahunajaran_kurikulum")->result();
    }

    function tahun_ajaran_kurikulum_by_id($id)
    {
        $this->db->join('tkurikulum','tkurikulum.pk_kurikulum_id = ttahunajaran_kurikulum.fk_kurikulum_id');
        $this->db->join('ttahun_ajaran','ttahun_ajaran.pk_tahunajaran_id = ttahunajaran_kurikulum.fk_tahun_ajaran_id');
        return $this->db->get_where("ttahunajaran_kurikulum", array('pk_tahunajarankurikulum_id' => $id))->result(); 
    }

    function getjurusan($id)
    {
        return $this->db->get_where('tpaket', array('fk_tahun_ajaran' => $id))->result();
    }

    function getmatkulsmt1($id)
    {
        $this->db->select('tpaketmatakuliah.*,sks,nama_pegawai,nama_gelar,kode_matakuliah,nama_matakuliah');
        $this->db->join('tdosen','tdosen.pk_dosen_id = tpaketmatakuliah.fk_dosen_id', 'left');
        $this->db->join('tdata_pegawai','tdata_pegawai.pk_pegawai_id = tdosen.fk_pegawai_id', 'left');
        $this->db->join('tmatakuliah','tmatakuliah.pk_matakuliah_id = tpaketmatakuliah.fk_matakuliah_id');
        $this->db->order_by('kode_matakuliah','asc');
        return $this->db->get_where('tpaketmatakuliah', array('fk_paket_id' => $id, 'semester' => 1))->result();
    }

    
    function getmatkulsmt2($id)
    {
        $this->db->select('tpaketmatakuliah.*,sks,nama_pegawai,nama_gelar,kode_matakuliah,nama_matakuliah');
        $this->db->join('tdosen','tdosen.pk_dosen_id = tpaketmatakuliah.fk_dosen_id', 'left');
        $this->db->join('tdata_pegawai','tdata_pegawai.pk_pegawai_id = tdosen.fk_pegawai_id', 'left');
        $this->db->join('tmatakuliah','tmatakuliah.pk_matakuliah_id = tpaketmatakuliah.fk_matakuliah_id');
        $this->db->order_by('kode_matakuliah','asc');
        return $this->db->get_where('tpaketmatakuliah', array('fk_paket_id' => $id, 'semester' => 2))->result();
    }

    
    function getmatkulsmt3($id)
    {
        $this->db->select('tpaketmatakuliah.*,sks,nama_pegawai,nama_gelar,kode_matakuliah,nama_matakuliah');
        $this->db->join('tdosen','tdosen.pk_dosen_id = tpaketmatakuliah.fk_dosen_id', 'left');
        $this->db->join('tdata_pegawai','tdata_pegawai.pk_pegawai_id = tdosen.fk_pegawai_id', 'left');
        $this->db->join('tmatakuliah','tmatakuliah.pk_matakuliah_id = tpaketmatakuliah.fk_matakuliah_id');
        $this->db->order_by('kode_matakuliah','asc');
        return $this->db->get_where('tpaketmatakuliah', array('fk_paket_id' => $id, 'semester' => 3))->result();
    }

    
    function getmatkulsmt4($id)
    {
        $this->db->select('tpaketmatakuliah.*,sks,nama_pegawai,nama_gelar,kode_matakuliah,nama_matakuliah');
        $this->db->join('tdosen','tdosen.pk_dosen_id = tpaketmatakuliah.fk_dosen_id', 'left');
        $this->db->join('tdata_pegawai','tdata_pegawai.pk_pegawai_id = tdosen.fk_pegawai_id', 'left');
        $this->db->join('tmatakuliah','tmatakuliah.pk_matakuliah_id = tpaketmatakuliah.fk_matakuliah_id');
        $this->db->order_by('kode_matakuliah','asc');
        return $this->db->get_where('tpaketmatakuliah', array('fk_paket_id' => $id, 'semester' => 4))->result();
    }

    
    function getmatkulsmt5($id)
    {
        $this->db->select('tpaketmatakuliah.*,sks,nama_pegawai,nama_gelar,kode_matakuliah,nama_matakuliah');
        $this->db->join('tdosen','tdosen.pk_dosen_id = tpaketmatakuliah.fk_dosen_id', 'left');
        $this->db->join('tdata_pegawai','tdata_pegawai.pk_pegawai_id = tdosen.fk_pegawai_id', 'left');
        $this->db->join('tmatakuliah','tmatakuliah.pk_matakuliah_id = tpaketmatakuliah.fk_matakuliah_id');
        $this->db->order_by('kode_matakuliah','asc');
        return $this->db->get_where('tpaketmatakuliah', array('fk_paket_id' => $id, 'semester' => 5))->result();
    }

    
    function getmatkulsmt6($id)
    {
        $this->db->select('tpaketmatakuliah.*,sks,nama_pegawai,nama_gelar,kode_matakuliah,nama_matakuliah');
        $this->db->join('tdosen','tdosen.pk_dosen_id = tpaketmatakuliah.fk_dosen_id', 'left');
        $this->db->join('tdata_pegawai','tdata_pegawai.pk_pegawai_id = tdosen.fk_pegawai_id', 'left');
        $this->db->join('tmatakuliah','tmatakuliah.pk_matakuliah_id = tpaketmatakuliah.fk_matakuliah_id');
        $this->db->order_by('kode_matakuliah','asc');
        return $this->db->get_where('tpaketmatakuliah', array('fk_paket_id' => $id, 'semester' => 6))->result();
    }

    
    function getmatkulsmt7($id)
    {
        $this->db->select('tpaketmatakuliah.*,sks,nama_pegawai,nama_gelar,kode_matakuliah,nama_matakuliah');
        $this->db->join('tdosen','tdosen.pk_dosen_id = tpaketmatakuliah.fk_dosen_id', 'left');
        $this->db->join('tdata_pegawai','tdata_pegawai.pk_pegawai_id = tdosen.fk_pegawai_id', 'left');
        $this->db->join('tmatakuliah','tmatakuliah.pk_matakuliah_id = tpaketmatakuliah.fk_matakuliah_id');
        $this->db->order_by('kode_matakuliah','asc');
        return $this->db->get_where('tpaketmatakuliah', array('fk_paket_id' => $id, 'semester' => 7))->result();
    }

    
    function getmatkulsmt8($id)
    {

        $this->db->select('tpaketmatakuliah.*,sks,nama_pegawai,nama_gelar,kode_matakuliah,nama_matakuliah');
        $this->db->join('tdosen','tdosen.pk_dosen_id = tpaketmatakuliah.fk_dosen_id', 'left');
        $this->db->join('tdata_pegawai','tdata_pegawai.pk_pegawai_id = tdosen.fk_pegawai_id', 'left');
        $this->db->join('tmatakuliah','tmatakuliah.pk_matakuliah_id = tpaketmatakuliah.fk_matakuliah_id');
        $this->db->order_by('kode_matakuliah','asc');
        return $this->db->get_where('tpaketmatakuliah', array('fk_paket_id' => $id, 'semester' => 8))->result();
    }

    function gettotalsks($id)
    {
        $this->db->select('sum(sks) as sks');
        $this->db->from('tpaketmatakuliah');
        $this->db->where('fk_paket_id', $id);
        return $this->db->get()->result();
    }

    function get_totalsks($id)
    {
        $data = $this->db->select('sum(sks) as totalsks');
        $data = $this->db->from('tpaketmatakuliah');
        $data = $this->db->where('fk_paket_id', $id);
        $data = $this->db->get()->result();
        $totalsks = $data[0]->totalsks;

		return $totalsks;
    }

    function update_sks($update, $where)
    {
        $this->db->update('tpaketmatakuliah', $update, $where);
    }

    function getdosen()
    {
        $this->db->join('tdata_pegawai','tdata_pegawai.pk_pegawai_id = tdosen.fk_pegawai_id', 'inner');
        $this->db->order_by('nama_gelar','asc');
        return $this->db->get('tdosen')->result();
    }

    function update_dosen($update, $where)
    {
        $this->db->update('tpaketmatakuliah', $update, $where);
    }

    function get_matakuliah()
    {  
        $this->db->select('*, pk_matakuliah_id as kodematkul');
        $this->db->from('tmatakuliah');
        return $this->db->get()->result();
    }

    function insertmatakuliah($data)
    {
        $hasil = $this->db->insert('tpaketmatakuliah', $data);
      
    }

    function deletematakuliah($data)
    {
        $hasil = $this->db->delete('tpaketmatakuliah', $data);
    }

    function searchjurusan($id)
    {
        $this->db->select('nama_paket,fk_jurusan_id,nama_jurusan');
        $this->db->from('tpaket');
        $this->db->join('tjurusan','tjurusan.pk_jurusan_id = tpaket.fk_jurusan_id');
        $this->db->where('pk_paket_id', $id);
        $data = $this->db->get()->result();
        return $hasil =  $data[0];
    }

}


