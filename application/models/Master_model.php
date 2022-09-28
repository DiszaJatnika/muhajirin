<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Master_model extends CI_Model{

    function update($id)
    {
        $data = array(
			'nama_aplikasi' => $this->input->post('nama_aplikasi'),
			'deskripsi'		=> $this->input->post('deskripsi')
			 );

		$this->db->where('pk_profil_id', $id)->update('tprofil', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
    }

	function cekdatalevel($id)
	{
		return $query = $this->db->get_where('tlevel', array('pk_level_id' => $id));
	}

	function user()
	{
		$login_id = $this->session->userdata['login_id'];
		$this->db->from('tbl_login');
		$this->db->join('tbl_pegawai','tbl_pegawai.pegawai_id = tbl_login.pegawai_id');
		$this->db->join('tbl_jabatan','tbl_pegawai.jabatan = tbl_jabatan.jabatan_id');
		$this->db->where('login_id !=', $login_id);
		return $this->db->get();

	}

	function blog(){
		
		$this->db->select('*');
		$this->db->from('tblog');
		return $this->db->get();
	}

	function user_ubah_status($id)
	{
		//load data user
		$datauser =  $this->db->get_where('tbl_login', array('login_id' => $id))->result();
		$datauser = $datauser[0];
		$status	  = $datauser->status;
		if($status == 'Y'){
			$status = 'N';
		}else
		{
			$status = 'Y';
		}
		$data = array(
			'status' => $status
		);

		$this->db->where('login_id', $id)->update('tbl_login', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function level()
	{
		return $this->db->get('tlevel');	
	}

	function level_delete($id)
	{
		$this->db->where('pk_level_id', $id)->delete('tlevel');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function modul()
	{
		return $this->db->get('tmodul');
	}

	function hak_akses()
	{
		$this->db->select('takses.*,tmodul.nama_modul,tlevel.nama_level');
		$this->db->from('takses');
		$this->db->join('tmodul','tmodul.pk_modul_id = takses.fk_modul_id','left');
		$this->db->join('tlevel','tlevel.pk_level_id = takses.fk_level_id','left');
		$this->db->group_by('fk_level_id');
		return $this->db->get();
	}

	function cekmodul($id)
	{
		$this->db->select('takses.*,tmodul.nama_modul,tlevel.nama_level');
		$this->db->from('takses');
		$this->db->join('tmodul','tmodul.pk_modul_id = takses.fk_modul_id','left');
		$this->db->join('tlevel','tlevel.pk_level_id = takses.fk_level_id','left');
		$this->db->where('tlevel.pk_level_id',$id);
		return $this->db->get();
	}

	function menu()
	{
		return $this->db->get('tmenu');
	}

	function tambah_blog()
	{
		$judul   	= $this->input->post('judul');
        $penulis   	= $this->input->post('penulis');
        $tanggal  	= $this->input->post('tanggal');
        $deskripsi  = $this->input->post('deskripsi');
        $kategori 	= $this->input->post('kategori');
        $jenis  	= $this->input->post('jenis');


		$string=preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]/', '', $judul); 
		$trim=trim($string); 
		$pre_slug=strtolower(str_replace(" ", "-", $trim)); 
		$slug=$pre_slug.'.html'; 

		$akun = array(
			'judul'         => $judul,
			'slug'       	=> $slug,
			'penulis'       => $penulis,
			'tanggal'       => $tanggal,
			'deskripsi'      => $deskripsi,
			'kategori'      => $kategori,
			'jenis'        	=> $jenis
		);

		// print_r($akun);
		$this->db->insert('tblog', $akun); 

		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
       
	}

	function tambah_blog_gambar($gambar)
	{
		$judul   	= $this->input->post('judul');
        $penulis   	= $this->input->post('penulis');
        $tanggal  	= $this->input->post('tanggal');
        $deskripsi  = $this->input->post('deskripsi');
        $kategori 	= $this->input->post('kategori');
        $jenis  	= $this->input->post('jenis');
        $foto  		= $gambar;

		$string=preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]/', '', $judul); 
		$trim=trim($string); 
		$pre_slug=strtolower(str_replace(" ", "-", $trim)); 
		$slug=$pre_slug.'.html'; 

		$akun = array(
			'judul'         => $judul,
			'slug'       	=> $slug,
			'penulis'       => $penulis,
			'tanggal'       => $tanggal,
			'deskripsi'     => $deskripsi,
			'foto'      	=> $foto,
			'kategori'      => $kategori,
			'jenis'        	=> $jenis
		);

		// print_r($akun);
		$this->db->insert('tblog', $akun); 

		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
       
	}

	function delete_blog($id)
	{
		$this->db->where('pk_blog_id', $id)->delete('tblog');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function blogbyid($id)
	{
		return $query = $this->db->get_where('tblog', array('pk_blog_id' => $id))->result();
	}

	function update_data_save()
	{

		$judul   	= $this->input->post('judul');
        $penulis   	= $this->input->post('penulis');
        $tanggal  	= $this->input->post('tanggal');
        $deskripsi  = $this->input->post('deskripsi');
        $kategori 	= $this->input->post('kategori');
        $jenis  	= $this->input->post('jenis');

		// primary
        $id_blog  	= $this->input->post('id_blog');


		$data = array(
			'judul'         => $judul,
			'penulis'       => $penulis,
			'tanggal'       => $tanggal,
			'deskripsi'      => $deskripsi,
			'kategori'      => $kategori,
			'jenis'        	=> $jenis
		);

		$this->db->where('pk_blog_id', $id_blog)->update('tblog', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function get_data_siswa()
	{
		return $this->db->get('tbl_siswa')->result();
	}

	function get_data_pegawai()
	{
		$this->db->join('tbl_jabatan', 'tbl_jabatan.jabatan_id = tbl_pegawai.jabatan');
		return $this->db->get('tbl_pegawai')->result();
	}

	
	function get_data_rombel()
	{
		$this->db->join('tbl_pegawai', 'tbl_pegawai.pegawai_id = tbl_rombel.wali_kelas');
		$this->db->join('tbl_tahun_ajaran', 'tbl_tahun_ajaran.tahun_ajaran_id = tbl_rombel.tahun_ajaran');
		return $this->db->get('tbl_rombel')->result();
	}

	function get_data_pelanggaran()
	{
		return $this->db->get('tbl_pelanggaran')->result();
	}

	function cek_username($username)
    {
        return $this->db->get_where('tbl_login', array('username' =>$username))->result();
    }

    function tambah_akun($data)
    {
        $this->db->insert('tbl_login', $data);
    }

	function get_rombel()
	{
		return $this->db->get('tbl_rombel')->result_array();
	}
}