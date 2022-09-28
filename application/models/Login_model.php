<?php

class Login_model extends CI_Model{

	function profil()
	{
		return $this->db->get('tprofil')->result(); 
	}
	
	function cek_login($user, $pass)
    {
		$this->db->select('tbl_pegawai.pegawai_id,tbl_login.username,tbl_login.status,tbl_pegawai.nama,tbl_pegawai.jabatan,tbl_jabatan.nama_jabatan');
		$this->db->join('tbl_pegawai', 'tbl_pegawai.pegawai_id = tbl_login.pegawai_id');
		$this->db->join('tbl_jabatan', 'tbl_pegawai.jabatan = tbl_jabatan.jabatan_id');
		$this->db->where('username', $user);
        $this->db->where('password', $pass);
        $query = $this->db->get('tbl_login');
        return $query;
    }

    function getLoginData($user, $pass){
    	$u = $user;
    	$p = md5($pass);

    	$query_cekLogin = $this->db->get_where('user', array('username'=> $u, 'password' => $p));

    	if (count($query_cekLogin->result()) > 0) {
    		foreach ($query_cekLogin->result() as $qck) {
    			foreach ($query_cekLogin->result() as $ck) {
    				$sess_data ['logged_in'] = TRUE;
    				$sess_data ['username'] = $ck->username;
    				$sess_data ['password'] = $ck->password;
    				$sess_data ['level'] = $ck->level;
                    $sess_data ['user_id'] = $ck->user_id;	
    				$this->session->set_userdata($sess_data);
    			}
    			redirect('Dashboard');
    		}
    	}else{
    		$this->session->set_flashdata('Pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert"> Username atau Password Salah! <button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span> </button> </div>');
    		redirect('auth/login');
    	}
    }

	function hakaksesmodul($modul)
	{
        $level = $this->session->userdata['level'];

		$this->db->select("*");
		$this->db->from("takses");
		$this->db->where("fk_level_id",$level);
		$this->db->where("fk_modul_id",$modul);
		return $query = $this->db->get()->result();
	}

	function jumlah_lks()
	{
		$data = $this->db->get('tdata_lks');
		return $data->num_rows();
	}
	function jumlah_katar()
	{
		$data = $this->db->get('tdata_katar');
		return $data->num_rows();
	}

	function jumlah_userlks()
	{
		$this->db->select('pk_user_id,status');
		$this->db->from('tuser');
		$this->db->join('tdata_lks','tdata_lks.fk_user_id = tuser.pk_user_id','inner');
		$data = $this->db->get();
		return $data->num_rows();
	}

	
	function jumlah_userkatar()
	{
		$this->db->select('pk_user_id,status');
		$this->db->from('tuser');
		$this->db->join('tdata_katar','tdata_katar.fk_user_id = tuser.pk_user_id','inner');
		$data = $this->db->get();
		return $data->num_rows();
	}

	function datablogside(){
		$this->db->get('*');
		$this->db->from('tblog');
		$this->db->where('jenis','side');
		$this->db->order_by('pk_blog_id', 'desc');
		$this->db->limit(3);
		return $this->db->get()->result(); 
	}

	function datablogprimary(){
		$this->db->get('*');
		$this->db->from('tblog');
		$this->db->where('jenis','primary');
		$this->db->order_by('pk_blog_id', 'desc');
		$this->db->limit(5);
		return $this->db->get()->result(); 
	}

	function view_blog($slug)
	{
		return $query = $this->db->get_where('tblog', array('slug' => $slug))->result();
	}

	function gettotalsiswa()
	{
		$data = $this->db->get_where('tbl_siswa', array('status_siswa' => 'A'));
		$total = $data->num_rows();
		return $total;
	}

	function gettotalptk()
	{
		$data = $this->db->get('tbl_pegawai');
		$total = $data->num_rows();
		return $total;
	}
	function gettotalrombel()
	{
		$data = $this->db->get('tbl_rombel');
		$total = $data->num_rows();
		return $total;
	}

	function gettotaluser()
	{
		$data = $this->db->get('tbl_login');
		$total = $data->num_rows();
		return $total;
	}
	function getsiswa()
	{
		$data = $this->db->get_where('tbl_siswa', array('jenis_kelamin' => 'L', 'status_siswa' => 'A'));
		$total = $data->num_rows();
		return $total;
	}
	function getsiswi()
	{
		$data = $this->db->get_where('tbl_siswa', array('jenis_kelamin' => 'P', 'status_siswa' => 'A'));
		$total = $data->num_rows();
		return $total;
	}
	function getrombel()
	{
		$data = $this->db->get_where('tbl_rombel', array('status' => 'A'))->result();
		return $data;
	}

	function getkelas($kelas)
	{
		//cari kelas vii
		$siswkelas = $this->db->get_Where('tbl_rombel', array('strata' => $kelas, 'status' => 'A'))->result();
		$totalsiswa = 0;
		foreach($siswkelas as $kls):
			//1,2,3
			$rombel = $kls->rombel_id;

			$data = $this->db->get_where('tbl_siswa', array('kelas_id' => $rombel, 'status_siswa' => 'A'));
			$total = $data->num_rows();

			$totalsiswa += $total;
		endforeach;

		return $totalsiswa;
		
	}
}