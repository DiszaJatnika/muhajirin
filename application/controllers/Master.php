<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Master extends CI_Controller
{
    function __construct(){
        parent::__construct();

        //load model available
        $this->load->model('Master_model','master');
        $this->load->model('User_m','user');
        $this->load->model('Menu_model');
        $this->load->model('Login_model','login');
        $this->load->library('upload');
        $this->load->library('source/SsimpleXLSX');
        date_default_timezone_set('Asia/Jakarta');

        if(!isset($this->session->userdata['username'])) {
			$this->session->set_flashdata('Pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><small> Anda Belum Login! (Silahkan Login untuk mengakses halaman yang akan dituju!)</small> <button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span> </button> </div>');
			redirect('Auth');
		}
        
        $level = $this->session->userdata['jabatan'];

        if($level == 3 or $level == 4 or $level == 5){
			redirect('Dashboard');
        }
    }

    function info_aplikasi(){
        
        //load profil data
		$parsedata   =  $this->login->profil();
		$data['profil'] = $parsedata['0'];

        
		$data['menu']  	= $this->Menu_model->tampilmenu()->result();
		$data['submenu']  	= $this->Menu_model->tampilsubmenu()->result();

        //load to view
        $this->load->view('template/header', $data);
        $this->load->view('master/info_aplikasi', $data);
        $this->load->view('template/footer', $data);
    }


    function menu(){
        
        //load profil data
		$parsedata   =  $this->login->profil();
		$data['profil'] = $parsedata['0'];
        $data['hasil']= $this->master->menu()->result();

        
		$data['menu']  	= $this->Menu_model->tampilmenu()->result();
		$data['submenu']  	= $this->Menu_model->tampilsubmenu()->result();

        //load to view
        $this->load->view('template/header', $data);
        $this->load->view('master/menu', $data);
        $this->load->view('template/footer', $data);
    }

    function update_info_aplikasi(){
        
        if($this->input->post('submit')){
			$this->form_validation->set_rules('nama_aplikasi', 'Judul Buku', 'trim|required');
			$this->form_validation->set_rules('deskripsi', 'Penulis', 'trim');

			if ($this->form_validation->run() == true) {

                if($this->master->update(1)){
					$this->session->set_flashdata('announce', 'Berhasil menyimpan data');
					redirect('Master-info-aplikasi');
				}else{
					$this->session->set_flashdata('announce', 'Gagal menyimpan data');
					redirect('Master-info-aplikasi');
				}
			} else {
				$this->session->set_flashdata('announce', validation_errors());
				redirect('Master-info-aplikasi');
			}
		}else
        {
            $this->session->set_flashdata('announce', validation_errors());
            redirect('Master-info-aplikasi');
        }
    }


    function user(){
		$parsedata   =  $this->login->profil();
		$data['profil'] = $parsedata['0'];
        $data['hasil']= $this->master->user()->result();
        

        //show menu
		$data['menu']  	    = $this->Menu_model->tampilmenu()->result();
		$data['submenu']  	= $this->Menu_model->tampilsubmenu()->result();
        $data['pegawai']    = $this->Menu_model->get_pegawai()->result();

        $this->load->view('template/header', $data);
        $this->load->view('master/user', $data);
        $this->load->view('template/footer', $data);
    }

    function user_ubah_status($id){
        if($this->master->user_ubah_status($id)){
            $this->session->set_flashdata('announce', 'Berhasil mengubah status');
            redirect('Master-user');
        }else{
            $this->session->set_flashdata('announce', 'Gagal mengubah status');
            redirect('Master-user');
        }
    }
    
    function level(){
		$parsedata   =  $this->login->profil();
		$data['profil'] = $parsedata['0'];
        $data['hasil'] = $this->master->level()->result();

        //show menu
		$data['menu']  	= $this->Menu_model->tampilmenu()->result();
		$data['submenu']  	= $this->Menu_model->tampilsubmenu()->result();

        $this->load->view('template/header', $data);
        $this->load->view('master/level', $data);
        $this->load->view('template/footer', $data);
    }

    function hak_akses(){
		$parsedata   =  $this->login->profil();
		$data['profil'] = $parsedata['0'];
        $data['hasil'] = $this->master->hak_akses()->result();

        //show menu
		$data['menu']  	= $this->Menu_model->tampilmenu()->result();
		$data['submenu']  	= $this->Menu_model->tampilsubmenu()->result();

        $this->load->view('template/header', $data);
        $this->load->view('master/hak_akses', $data);
        $this->load->view('template/footer', $data);
    }

    function modul(){
		$parsedata   =  $this->login->profil();
		$data['profil'] = $parsedata['0'];
        $data['hasil'] = $this->master->modul()->result();

        //show menu
		$data['menu']  	= $this->Menu_model->tampilmenu()->result();
		$data['submenu']  	= $this->Menu_model->tampilsubmenu()->result();

        $this->load->view('template/header', $data);
        $this->load->view('master/modul', $data);
        $this->load->view('template/footer', $data);
    }

    function hak_akses_detail($id){

		$parsedata      = $this->login->profil();
		$data['profil'] = $parsedata['0'];
        
        //show menu
		$data['menu']  	= $this->Menu_model->tampilmenu()->result();
		$data['submenu']  	= $this->Menu_model->tampilsubmenu()->result();

		$datalevel      = $this->master->cekdatalevel($id)->result();
		$data['level'] = $datalevel['0'];
        $data['hasil']  = $this->master->cekmodul($id)->result();


        $this->load->view('template/header', $data);
        $this->load->view('master/hak_akses_detail', $data);
        $this->load->view('template/footer', $data);
    }

    function level_delete($id)
    {        
        if($this->master->level_delete($id)){
            $this->session->set_flashdata('announce', 'Berhasil menghapus data');
            redirect('Master-level');
        }else{
            $this->session->set_flashdata('announce', 'Gagal menghapus data, error code : foreign key available');
            redirect('Master-level');
        }
    }

    function update_save(){
        if($this->master->update_data_save()){
            $this->session->set_flashdata('announce', 'Berhasil menghapus data');
            redirect('Master-blog');
        }else{
            $this->session->set_flashdata('announce', 'Gagal menghapus data, error code : foreign key available');
            redirect('Master-blog');
        }
    }


    //data muhajirin
    function data_siswa()
    {
        //load profil data
		$parsedata   =  $this->login->profil();
		$data['profil'] = $parsedata['0'];

        //menu
		$data['menu']  	= $this->Menu_model->tampilmenu()->result();
		$data['submenu']  	= $this->Menu_model->tampilsubmenu()->result();

        //data
        $data['siswa'] = $this->master->get_data_siswa();

        //load to view
        $this->load->view('template/header', $data);
        $this->load->view('data/siswa', $data);
        $this->load->view('template/footer', $data);
    }

    public function data_siswa_save(){
  
        ini_set('max_execution_time',300);
        ini_set('error_reporting', E_ALL);
        ini_set('display_errors', true);
  
        //require_once __DIR__.'/../source/SsimpleXLSX.php';
  
        if (isset($_FILES['filee'])) {
          
          if ($xlsx = SsimpleXLSX::parse( $_FILES['filee']['tmp_name'] ) ) {
  
              $dim = $xlsx->dimension();
              $cols = $dim[1];
            

              $rrr=($xlsx->rows());
                 for ($i = 1; $i < $cols; $i ++ )
                 {
                  $nama_siswa           = addslashes($rrr[$i][0]);
                  $nomor_induk          = addslashes($rrr[$i][1]);
                  $jenis_kelamin        = addslashes($rrr[$i][2]);
                  $semester_dijalani    = addslashes($rrr[$i][3]);
                  $kelas_id             = $this->input->post('rombel_id');
                  $status_siswa         = addslashes($rrr[$i][4]);

                  $data = array(
                    "nama_siswa" => $nama_siswa,
                    "nomor_induk" => $nomor_induk,   
                    "jenis_kelamin" => $jenis_kelamin,   
                    "semester_dijalani" => $semester_dijalani,   
                    "kelas_id" => $kelas_id,  
                    "status_siswa" => $status_siswa,  
                  );

                
                  //sesuaikan nama dengan nama tabel
                  if($nama_siswa && $nomor_induk){
                    $insert = $this->db->insert("tbl_siswa", $data);
                  }
                
               }
              
            }
      
          }
  
           $this->session->set_flashdata('announce', 'Data Berhasil Disimpan');
                   redirect('Master-siswa');
        }
  

    function data_pegawai()
    {
        //load profil data
		$parsedata   =  $this->login->profil();
        $data = [
            //profil dan menu
            'profil'    => $parsedata['0'],
            'menu'      => $this->Menu_model->tampilmenu()->result(),
            'submenu'   => $this->Menu_model->tampilsubmenu()->result(),

            //data
            'pegawai'     => $this->master->get_data_pegawai(),
        ]; 

        //load to view
        $this->load->view('template/header', $data);
        $this->load->view('data/pegawai', $data);
        $this->load->view('template/footer', $data);
    }

    function data_rombel()
    {
        //load profil data
		$parsedata   =  $this->login->profil();
		$data['profil'] = $parsedata['0'];

        //menu
		$data['menu']  	= $this->Menu_model->tampilmenu()->result();
		$data['submenu']  	= $this->Menu_model->tampilsubmenu()->result();

        //data
        $data['rombel'] = $this->master->get_data_rombel();

        //load to view
        $this->load->view('template/header', $data);
        $this->load->view('data/rombel', $data);
        $this->load->view('template/footer', $data);
    }

    function data_rombel_tambah()
    {
		$parsedata   =  $this->login->profil();
        $data = [
            //profil dan menu
            'profil'    => $parsedata['0'],
            'menu'      => $this->Menu_model->tampilmenu()->result(),
            'submenu'   => $this->Menu_model->tampilsubmenu()->result(),

            'pegawai'   => $this->db->get('tbl_pegawai')->result_array(),
            'tahunajaran' => $this->db->get('tbl_tahun_ajaran')->result_array(),
        ];

        $this->load->view('template/header', $data);
        $this->load->view('data/rombel_tambah', $data);
        $this->load->view('template/footer', $data);
    }

    function data_rombel_save()
    {
        $nama_rombel    = $this->input->post('nama_rombel');
        $wali_kelas     = $this->input->post('wali_kelas');
        $semester       = $this->input->post('semester');
        $tahun_ajaran   = $this->input->post('tahun_ajaran');
        $strata         = $this->input->post('strata');
        $status         = $this->input->post('status');

        $data = [
            'nama_rombel'   => $nama_rombel,
            'wali_kelas'    => $wali_kelas,
            'semester'      => $semester,
            'tahun_ajaran'  => $tahun_ajaran,
            'strata'        => $strata,
            'status'        => $status
        ];

        $this->db->insert('tbl_rombel', $data);
        
        $this->session->set_flashdata('announce', 'Data Berhasil Disimpan');
        redirect('Master-rombel');
    }

    function data_rombel_hapus($id)
    {
        $kode = decrypt_url($id);
        $this->db->delete('tbl_rombel', array('rombel_id' => $kode));

        $this->session->set_flashdata('announce', 'Rombongan Belajar Berhasil Dihapus');
        redirect('Master-rombel');
    }

    function data_rombel_edit($id)
    {
        $kode = decrypt_url($id);
		$parsedata   =  $this->login->profil();
        $data = [
            //profil dan menu
            'profil'    => $parsedata['0'],
            'menu'      => $this->Menu_model->tampilmenu()->result(),
            'submenu'   => $this->Menu_model->tampilsubmenu()->result(),

            //data
            'rombel'   => $this->db->get_where('tbl_rombel', array('rombel_id' => $kode))->result_array()[0],
            'pegawai'   => $this->db->get('tbl_pegawai')->result_array(),
            'tahunajaran' => $this->db->get('tbl_tahun_ajaran')->result_array(),

        ];

        $this->load->view('template/header', $data);
        $this->load->view('data/rombel_edit', $data);
        $this->load->view('template/footer', $data);
    }

    function data_rombel_edit_save()
    {        
        $rombel_id      = decrypt_url($this->input->post('rombel_id'));
        $nama_rombel    = $this->input->post('nama_rombel');
        $wali_kelas     = $this->input->post('wali_kelas');
        $semester       = $this->input->post('semester');
        $tahun_ajaran   = $this->input->post('tahun_ajaran');
        $strata         = $this->input->post('strata');
        $status         = $this->input->post('status');

        $data = [
            'nama_rombel'   => $nama_rombel,
            'wali_kelas'    => $wali_kelas,
            'semester'      => $semester,
            'tahun_ajaran'  => $tahun_ajaran,
            'strata'        => $strata,
            'status'        => $status
        ];

        $this->db->update('tbl_rombel', $data, array('rombel_id' => $rombel_id));
        
        $this->session->set_flashdata('announce', 'Data Berhasil Disimpan');
        redirect('Master-rombel');
    }
    

    function buat_akun()
    {
        $username   = $this->input->post('username');
        $pegawai    = $this->input->post('pegawai');
        $password   = $this->input->post('password');


        $cekusername = $this->master->cek_username($username);

        if($cekusername){
            $this->session->set_flashdata('announce', 'Username yang anda masukan sudah tersedia');
            redirect('Master-user');
        }else{
            $now = date('Y-m-d H:i:s');
            $data = array(
                'username' => $username,
                'pegawai_id' => $pegawai,
                'password' => md5($password),
                'tanggal_dibuat' => $now
            );

            $this->master->tambah_akun($data);
            $this->session->set_flashdata('announce', 'Akun Berhasil Dibuat');
            redirect('Master-user');
        }
    }

    function data_siswa_tambah()
    {
         //load profil data
		$parsedata   =  $this->login->profil();

        $data = [
            //profil dan menu
            'profil'    => $parsedata['0'],
            'menu'      => $this->Menu_model->tampilmenu()->result(),
            'submenu'   => $this->Menu_model->tampilsubmenu()->result(),

            //data
            'rombel'    => $this->master->get_rombel()
        ];

        //load to view
        $this->load->view('template/header', $data);
        $this->load->view('data/siswa_tambah', $data);
        $this->load->view('template/footer', $data);
    }

    function data_pegawai_tambah()
    {
         //load profil data
		$parsedata   =  $this->login->profil();

        $data = [
            //profil dan menu
            'profil'    => $parsedata['0'],
            'menu'      => $this->Menu_model->tampilmenu()->result(),
            'submenu'   => $this->Menu_model->tampilsubmenu()->result(),

            //data
            'rombel'    => $this->master->get_rombel()
        ];

        //load to view
        $this->load->view('template/header', $data);
        $this->load->view('data/pegawai_tambah', $data);
        $this->load->view('template/footer', $data);
    }

    function data_siswa_hapus($id)
    {
        $kode = decrypt_url($id);
        $this->db->delete('tbl_siswa', array('siswa_id' => $kode));

        $this->session->set_flashdata('announce', 'Siswa Berhasil Dihapus');
        redirect('Master-siswa');
    }

    function data_siswa_edit($id)
    {
        $kode = decrypt_url($id);
		$parsedata   =  $this->login->profil();
        $data = [
            //profil dan menu
            'profil'    => $parsedata['0'],
            'menu'      => $this->Menu_model->tampilmenu()->result(),
            'submenu'   => $this->Menu_model->tampilsubmenu()->result(),

            //data
            'siswa'     => $this->db->get_where('tbl_siswa', array('siswa_id' => $kode))->result_array()[0],
            'kelas'     => $this->db->get('tbl_rombel')->result_array(),
        ];

        //load to view
        $this->load->view('template/header', $data);
        $this->load->view('data/siswa_edit', $data);
        $this->load->view('template/footer', $data);
    }

    function data_siswa_edit_save()
    {
        $siswa_id       = decrypt_url($this->input->post('siswa_id'));
        $nama_siswa     = $this->input->post('nama_siswa');
        $nomor_induk    = $this->input->post('nomor_induk');
        $jenis_kelamin  = $this->input->post('jenis_kelamin');
        $semester_dijalani   = $this->input->post('semester_dijalani');
        $kelas_id       = $this->input->post('kelas_id');
        $status_siswa   = $this->input->post('status_siswa');

        $data = [
            'nama_siswa' => $nama_siswa,
            'nomor_induk'   => $nomor_induk,
            'jenis_kelamin' => $jenis_kelamin,
            'semester_dijalani' => $semester_dijalani,
            'kelas_id'      => $kelas_id,
            'status_siswa'  => $status_siswa
        ];

        $this->db->update('tbl_siswa', $data, array('siswa_id' => $siswa_id));
        
        $this->session->set_flashdata('announce', 'Data Berhasil Disimpan');
        redirect('Master-siswa');
    }

    public function data_pegawai_save(){
  
        ini_set('max_execution_time',300);
        ini_set('error_reporting', E_ALL);
        ini_set('display_errors', true);
  
        //require_once __DIR__.'/../source/SsimpleXLSX.php';
  
        if (isset($_FILES['filee'])) {
          
          if ($xlsx = SsimpleXLSX::parse( $_FILES['filee']['tmp_name'] ) ) {
  
              $dim = $xlsx->dimension();
              $cols = $dim[1];
            

              $rrr=($xlsx->rows());
                 for ($i = 1; $i < $cols; $i ++ )
                 {
                  $nik      = addslashes($rrr[$i][0]);
                  $nama     = addslashes($rrr[$i][1]);
                  $jabatan  = addslashes($rrr[$i][2]);
                  $no_hp    = addslashes($rrr[$i][3]);
                  $alamat   = addslashes($rrr[$i][4]);

                  $data = array(
                    "nik"       => $nik,
                    "nama"      => $nama,   
                    "jabatan"   => $jabatan,   
                    "no_hp"     => $no_hp,   
                    "alamat"    => $alamat
                  );

                
                  //sesuaikan nama dengan nama tabel
                  if($nik && $nama){
                    $insert = $this->db->insert("tbl_pegawai", $data);
                  }
                
               }
              
            }
      
          }
  
           $this->session->set_flashdata('announce', 'Data Berhasil Disimpan');
                   redirect('Master-pegawai');
    }

    function data_pegawai_hapus($id)
    {
        $kode = decrypt_url($id);
        $this->db->delete('tbl_pegawai', array('pegawai_id' => $kode));

        $this->session->set_flashdata('announce', 'Pegawai Berhasil Dihapus');
        redirect('Master-pegawai');
    }

    function data_pegawai_edit($id)
    {
        $kode = decrypt_url($id);
		$parsedata   =  $this->login->profil();
        $data = [
            //profil dan menu
            'profil'    => $parsedata['0'],
            'menu'      => $this->Menu_model->tampilmenu()->result(),
            'submenu'   => $this->Menu_model->tampilsubmenu()->result(),

            //data
            'pegawai'   => $this->db->get_where('tbl_pegawai', array('pegawai_id' => $kode))->result_array()[0],
            'jabatan'   => $this->db->get('tbl_jabatan')->result_array(),
        ];

        $this->load->view('template/header', $data);
        $this->load->view('data/pegawai_edit', $data);
        $this->load->view('template/footer', $data);
    }

    function data_pegawai_edit_save()
    {
        $pegawai_id     = decrypt_url($this->input->post('pegawai_id'));
        $nomor_induk    = $this->input->post('nomor_induk');
        $nama           = $this->input->post('nama');
        $jabatan        = $this->input->post('jabatan');
        $no_hp          = $this->input->post('no_hp');
        $alamat         = $this->input->post('alamat');

        $data = [
            'nik'           => $nomor_induk,
            'nama'          => $nama,
            'jabatan'       => $jabatan,
            'no_hp'         => $no_hp,
            'alamat'        => $alamat
        ];

        $this->db->update('tbl_pegawai', $data, array('pegawai_id' => $pegawai_id));
        
        $this->session->set_flashdata('announce', 'Data Berhasil Disimpan');
        redirect('Master-pegawai');
    }

    function data_jabatan()
    {
        //load profil data
		$parsedata   =  $this->login->profil();
        $data = [
            //profil dan menu
            'profil'    => $parsedata['0'],
            'menu'      => $this->Menu_model->tampilmenu()->result(),
            'submenu'   => $this->Menu_model->tampilsubmenu()->result(),

            //data
            'jabatan'   => $this->db->get('tbl_jabatan')->result_array(),
        ]; 

        //load to view
        $this->load->view('template/header', $data);
        $this->load->view('data/jabatan', $data);
        $this->load->view('template/footer', $data);
    }
    
    function data_jabatan_tambah()
    {
		$parsedata   =  $this->login->profil();
        $data = [
            //profil dan menu
            'profil'    => $parsedata['0'],
            'menu'      => $this->Menu_model->tampilmenu()->result(),
            'submenu'   => $this->Menu_model->tampilsubmenu()->result(),
        ];

        $this->load->view('template/header', $data);
        $this->load->view('data/jabatan_tambah', $data);
        $this->load->view('template/footer', $data);
    }

    function data_jabatan_save()
    {
        $nama_jabatan    = $this->input->post('nama_jabatan');

        $data = [
            'nama_jabatan' => $nama_jabatan
        ];

        $this->db->insert('tbl_jabatan', $data);
        
        $this->session->set_flashdata('announce', 'Data Berhasil Disimpan');
        redirect('Master-jabatan');
    }

    function data_jabatan_hapus($id)
    {
        $kode = decrypt_url($id);
        $this->db->delete('tbl_rombel', array('rombel_id' => $kode));

        $this->session->set_flashdata('announce', 'Jabatan Berhasil Dihapus');
        redirect('Master-jabatan');
    }

    function data_jabatan_edit($id)
    {
        $kode = decrypt_url($id);
		$parsedata   =  $this->login->profil();
        $data = [
            //profil dan menu
            'profil'    => $parsedata['0'],
            'menu'      => $this->Menu_model->tampilmenu()->result(),
            'submenu'   => $this->Menu_model->tampilsubmenu()->result(),

            //data
            'jabatan'   => $this->db->get_where('tbl_jabatan', array('jabatan_id' => $kode))->result_array()[0],
        ];

        $this->load->view('template/header', $data);
        $this->load->view('data/jabatan_edit', $data);
        $this->load->view('template/footer', $data);
    }

    function data_jabatan_edit_save()
    {        
        $kode    = decrypt_url($this->input->post('jabatan_id'));
        $nama_jabatan    = $this->input->post('nama_jabatan');

        $data = [
            'nama_jabatan' => $nama_jabatan
        ];

        $this->db->update('tbl_jabatan', $data, array('jabatan_id' => $kode));
        
        $this->session->set_flashdata('announce', 'Data Berhasil Disimpan');
        redirect('Master-jabatan');
    }

    function data_hadits40()
    {
        //load profil data
		$parsedata   =  $this->login->profil();
        $data = [
            //profil dan menu
            'profil'    => $parsedata['0'],
            'menu'      => $this->Menu_model->tampilmenu()->result(),
            'submenu'   => $this->Menu_model->tampilsubmenu()->result(),

            //data
            'hadits'    => $this->db->get('tbl_hadits')->result_array(),
        ]; 

        //load to view
        $this->load->view('template/header', $data);
        $this->load->view('data/hadits40', $data);
        $this->load->view('template/footer', $data);
    }
    
    function data_hadits40_tambah()
    {
		$parsedata   =  $this->login->profil();
        $data = [
            //profil dan menu
            'profil'    => $parsedata['0'],
            'menu'      => $this->Menu_model->tampilmenu()->result(),
            'submenu'   => $this->Menu_model->tampilsubmenu()->result(),
        ];

        $this->load->view('template/header', $data);
        $this->load->view('data/hadits40_tambah', $data);
        $this->load->view('template/footer', $data);
    }

    function data_hadits40_save()
    {
        $nama_hadits    = $this->input->post('nama_hadits');
        $isi            = $this->input->post('isi');

        $data = [
            'nama_hadits' => $nama_hadits,
            'isi' => $isi,
        ];

        $this->db->insert('tbl_hadits', $data);
        
        $this->session->set_flashdata('announce', 'Data Berhasil Disimpan');
        redirect('Master-hadits40');
    }

    function data_hadits40_hapus($id)
    {
        $kode = decrypt_url($id);
        $this->db->delete('tbl_rombel', array('rombel_id' => $kode));

        $this->session->set_flashdata('announce', 'Jabatan Berhasil Dihapus');
        redirect('Master-jabatan');
    }

    function data_hadits40_edit($id)
    {
        $kode = decrypt_url($id);
		$parsedata   =  $this->login->profil();
        $data = [
            //profil dan menu
            'profil'    => $parsedata['0'],
            'menu'      => $this->Menu_model->tampilmenu()->result(),
            'submenu'   => $this->Menu_model->tampilsubmenu()->result(),

            //data
            'hadits'    => $this->db->get_where('tbl_hadits', array('hadits_id' => $kode))->result_array()[0],
        ];

        $this->load->view('template/header', $data);
        $this->load->view('data/hadits40_edit', $data);
        $this->load->view('template/footer', $data);
    }

    function data_hadits40_edit_save()
    {        
        $kode           = decrypt_url($this->input->post('hadits_id'));
        $nama_hadits    = $this->input->post('nama_hadits');
        $isi            = $this->input->post('isi');

        $data = [
            'nama_hadits' => $nama_hadits,
            'isi' => $isi,
        ];

        $this->db->update('tbl_hadits', $data, array('hadits_id' => $kode));
        
        $this->session->set_flashdata('announce', 'Data Berhasil Disimpan');
        redirect('Master-hadits40');
    }

    function data_pelanggaran()
    {
        //load profil data
		$parsedata   =  $this->login->profil();
        $data = [
            //profil dan menu
            'profil'    => $parsedata['0'],
            'menu'      => $this->Menu_model->tampilmenu()->result(),
            'submenu'   => $this->Menu_model->tampilsubmenu()->result(),

            //data
            'pelanggaran'    => $this->db->get('tbl_pelanggaran')->result_array(),
        ]; 

        //load to view
        $this->load->view('template/header', $data);
        $this->load->view('data/pelanggaran', $data);
        $this->load->view('template/footer', $data);
    }
    
    function data_pelanggaran_tambah()
    {
		$parsedata   =  $this->login->profil();
        $data = [
            //profil dan menu
            'profil'    => $parsedata['0'],
            'menu'      => $this->Menu_model->tampilmenu()->result(),
            'submenu'   => $this->Menu_model->tampilsubmenu()->result(),
        ];

        $this->load->view('template/header', $data);
        $this->load->view('data/pelanggaran_tambah', $data);
        $this->load->view('template/footer', $data);
    }

    function data_pelanggaran_save()
    {
        $nama       = $this->input->post('nama_pelanggaran');
        $jenis      = $this->input->post('jenis_pelanggaran');
        $poin       = $this->input->post('poin_pelanggaran');

        $data = [
            'nama_pelanggaran'  => $nama,
            'jenis_pelanggaran' => $jenis,
            'poin_pelanggaran'  => $poin,
        ];

        $this->db->insert('tbl_pelanggaran', $data);
        
        $this->session->set_flashdata('announce', 'Data Berhasil Disimpan');
        redirect('Master-pelanggaran');
    }

    function data_pelanggaran_hapus($id)
    {
        $kode = decrypt_url($id);
        $this->db->delete('tbl_pelanggaran', array('pelanggaran_id' => $kode));

        $this->session->set_flashdata('announce', 'Pelanggaran Berhasil Dihapus');
        redirect('Master-pelanggaran');
    }

    function data_pelanggaran_edit($id)
    {
        $kode = decrypt_url($id);
		$parsedata   =  $this->login->profil();
        $data = [
            //profil dan menu
            'profil'    => $parsedata['0'],
            'menu'      => $this->Menu_model->tampilmenu()->result(),
            'submenu'   => $this->Menu_model->tampilsubmenu()->result(),

            //data
            'pelanggaran'    => $this->db->get_where('tbl_pelanggaran', array('pelanggaran_id' => $kode))->result_array()[0],
        ];

        $this->load->view('template/header', $data);
        $this->load->view('data/pelanggaran_edit', $data);
        $this->load->view('template/footer', $data);
    }

    function data_pelanggaran_edit_save()
    {        
        $kode           = decrypt_url($this->input->post('pelanggaran_id'));
        $nama_pelanggaran   = $this->input->post('nama_pelanggaran');
        $jenis_pelanggaran  = $this->input->post('jenis_pelanggaran');
        $poin_pelanggaran   = $this->input->post('poin_pelanggaran');

        $data = [
            'nama_pelanggaran'  => $nama_pelanggaran,
            'jenis_pelanggaran' => $jenis_pelanggaran,
            'poin_pelanggaran'  => $poin_pelanggaran,
        ];

        $this->db->update('tbl_pelanggaran', $data, array('pelanggaran_id' => $kode));
        
        $this->session->set_flashdata('announce', 'Data Berhasil Disimpan');
        redirect('Master-pelanggaran');
    }
    

}