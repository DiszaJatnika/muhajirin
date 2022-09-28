<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Hafalan_siswa extends CI_Controller
{
    function __construct(){
        parent::__construct();

        //load model available
        $this->load->model('Hafalan_model','hafalan');
        $this->load->model('Menu_model');
        $this->load->model('Login_model','login');
        date_default_timezone_set('Asia/Jakarta');

        if(!isset($this->session->userdata['username'])) {
			$this->session->set_flashdata('Pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><small> Anda Belum Login! (Silahkan Login untuk mengakses halaman yang akan dituju!)</small> <button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span> </button> </div>');
			redirect('Auth');
		}
        
        $level = $this->session->userdata['jabatan'];

        if($level == 1 or $level == 2 or $level == 4 or $level == 5){
			redirect('Dashboard');
        }
    }

    function hafalanShow(){
        //load profil data
		$parsedata   =  $this->login->profil();
		$data['profil'] = $parsedata['0'];

        //menu
		$data['menu']  	= $this->Menu_model->tampilmenu()->result();
		$data['submenu']  	= $this->Menu_model->tampilsubmenu()->result();

        //load to view
        $data['hafalan'] = $this->hafalan->getHafalan();
        $data['rombel'] = $this->hafalan->get_rombel_aktif();
        $data['kegiatan'] = $this->hafalan->get_kegiatan();
        
        //templating
        $this->load->view('template/header', $data);
        $this->load->view('pembimbing/hafalan-show', $data);
        $this->load->view('template/footer', $data);
    }


    public function hafalanTambah() {
    
        if($this->hafalan->tambah_hafalan()){
                $this->session->set_flashdata('announce', 'Berhasil menambah data');
                redirect('Hafalan-siswa');
        }else{
                $this->session->set_flashdata('announce', 'Gagal menambah data');
                redirect('Hafalan-siswa');
        }
    
    }

    public function murojaah()
    {
        $parsedata  =  $this->login->profil();
        $pembimbing_id = $this->session->userdata('pegawai_id');
        $quran_url  = $this->http_request("https://quran-api.santrikoding.com/api/surah");
        $murojaah   = $this->db->select('tbl_murojaah.*,tbl_siswa.nama_siswa, tbl_pegawai.nama,tbl_rombel.nama_rombel')
                    ->join('tbl_siswa', 'tbl_siswa.siswa_id = tbl_murojaah.siswa_id')
                    ->join('tbl_rombel', 'tbl_rombel.rombel_id = tbl_murojaah.rombel_id')
                    ->join('tbl_pegawai', 'tbl_pegawai.pegawai_id = tbl_murojaah.pembimbing_id')
                    ->where('pembimbing_id', $pembimbing_id)
                    ->order_by('tanggal', 'desc')
                    ->get('tbl_murojaah')
                    ->result_array();
            
        $data = [
            //profil dan menu
            'profil'    => $parsedata['0'],
            'menu'      => $this->Menu_model->tampilmenu()->result(),
            'submenu'   => $this->Menu_model->tampilsubmenu()->result(),


            'murojaah'  => $murojaah
        ];

        //templating
        $this->load->view('template/header', $data);
        $this->load->view('pembimbing/hafalan_murojaah', $data);
        $this->load->view('template/footer', $data);
    }

    function murojaah_tambah()
    {
        $parsedata  =  $this->login->profil();
        $quran_url  = $this->http_request("https://quran-api.santrikoding.com/api/surah");

        $data = [
            //profil dan menu
            'profil'    => $parsedata['0'],
            'menu'      => $this->Menu_model->tampilmenu()->result(),
            'submenu'   => $this->Menu_model->tampilsubmenu()->result(),

            //data
            'quran'     => json_decode($quran_url, TRUE),
            'rombel'    => $this->db->get('tbl_rombel')->result_array(),
        ];

        //templating
        $this->load->view('template/header', $data);
        $this->load->view('pembimbing/murojaah_tambah', $data);
        $this->load->view('template/footer', $data);
    }

    function murojaah_edit_save()
    {
        $rombel_id      = $this->input->post('rombel_id');
        $siswa_id       = $this->input->post('siswa_id');
        $dari_surah     = $this->input->post('dari_surah');
        $dari_ayat_ke   = $this->input->post('dari_ayat_ke');
        $sampai_surah   = $this->input->post('sampai_surah');
        $sampai_ayat_ke = $this->input->post('sampai_ayat_ke');
        $putaran        = $this->input->post('putaran');
        $murojaahid     = $this->input->post('murojaah_id');
        $pembimbing     = $this->session->userdata('pegawai_id');

        $data = [
            'rombel_id'     => $rombel_id,
            'siswa_id'      => $siswa_id,
            'dari_surah'    => $dari_surah,
            'dari_ayat_ke'  => $dari_ayat_ke,
            'sampai_surah'  => $sampai_surah,
            'sampai_ayat_ke'=> $sampai_ayat_ke,
            'putaran'       => $putaran,
            'pembimbing_id' => $pembimbing
        ];

        $where = [
            'murojaah_id'   => $murojaahid
        ];

        $this->db->update('tbl_murojaah', $data);
        
        $this->session->set_flashdata('announce', 'Data Berhasil Disimpan');
        redirect('Hafalan-murojaah');
    }

    function murojaah_save()
    {
        $rombel_id      = $this->input->post('rombel_id');
        $siswa_id       = $this->input->post('siswa_id');
        $dari_surah     = $this->input->post('dari_surah');
        $dari_ayat_ke   = $this->input->post('dari_ayat_ke');
        $sampai_surah   = $this->input->post('sampai_surah');
        $sampai_ayat_ke = $this->input->post('sampai_ayat_ke');
        $putaran        = $this->input->post('putaran');
        $tanggal        = date("Y-m-d H:i:s");
        $pembimbing     = $this->session->userdata('pegawai_id');

        $data = [
            'rombel_id'     => $rombel_id,
            'siswa_id'      => $siswa_id,
            'dari_surah'    => $dari_surah,
            'dari_ayat_ke'  => $dari_ayat_ke,
            'sampai_surah'  => $sampai_surah,
            'sampai_ayat_ke'=> $sampai_ayat_ke,
            'putaran'       => $putaran,
            'tanggal'       => $tanggal,
            'pembimbing_id' => $pembimbing
        ];

        $this->db->insert('tbl_murojaah', $data);
        
        $this->session->set_flashdata('announce', 'Data Berhasil Disimpan');
        redirect('Hafalan-murojaah');
    }

    function murojaah_hapus($id)
    {
        $kode = decrypt_url($id);
        $this->db->delete('tbl_murojaah', array('murojaah_id' => $kode));
        
        $this->session->set_flashdata('announce', 'Data Berhasil Dihapus');
        redirect('Hafalan-murojaah');
    }

    function get_siswa()
    {
        $rombel_id  = $this->input->post('id',TRUE);
        $data       = $this->db->get_where('tbl_siswa', array('kelas_id' => $rombel_id))->result();
        echo json_encode($data);
    }

    function murojaah_edit($id)
    {
        $kode       = decrypt_url($id);
        $parsedata  = $this->login->profil();
        $quran_url  = $this->http_request("https://quran-api.santrikoding.com/api/surah");

        $data = [
            //profil dan menu
            'profil'    => $parsedata['0'],
            'menu'      => $this->Menu_model->tampilmenu()->result(),
            'submenu'   => $this->Menu_model->tampilsubmenu()->result(),

            //data
            'quran'     => json_decode($quran_url, TRUE),
            'rombel'    => $this->db->get('tbl_rombel')->result_array(),
            'murojaah'  => $this->db->get_where('tbl_murojaah', array('murojaah_id' => $kode))->result_array()[0],
        ];

        //templating
        $this->load->view('template/header', $data);
        $this->load->view('pembimbing/murojaah_edit', $data);
        $this->load->view('template/footer', $data);
    }

    function http_request($url){
        // persiapkan curl
        $ch = curl_init(); 
    
        // set url 
        curl_setopt($ch, CURLOPT_URL, $url);
        
        // set user agent    
        curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
    
        // return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    
        // $output contains the output string 
        $output = curl_exec($ch); 
    
        // tutup curl 
        curl_close($ch);      
    
        // mengembalikan hasil curl
        return $output;
    }

    // hadist 40

    function hadits40()
    {
        $parsedata  = $this->login->profil();
        $pembimbing_id = $this->session->userdata('pegawai_id');
        $datahadits = $this->db->select('tbl_hadits40.*,tbl_hadits.nama_hadits,tbl_siswa.nama_siswa, tbl_pegawai.nama,tbl_rombel.nama_rombel')
                    ->join('tbl_siswa', 'tbl_siswa.siswa_id = tbl_hadits40.siswa_id')
                    ->join('tbl_rombel', 'tbl_rombel.rombel_id = tbl_hadits40.rombel_id')
                    ->join('tbl_hadits', 'tbl_hadits.hadits_id = tbl_hadits40.hadits_id')
                    ->join('tbl_pegawai', 'tbl_pegawai.pegawai_id = tbl_hadits40.pembimbing_id')
                    ->where('pembimbing_id', $pembimbing_id)
                    ->order_by('tanggal', 'desc')
                    ->get('tbl_hadits40')
                    ->result_array();

        $data = [
            //profil dan menu
            'profil'    => $parsedata['0'],
            'menu'      => $this->Menu_model->tampilmenu()->result(),
            'submenu'   => $this->Menu_model->tampilsubmenu()->result(),

            'hadits'   =>  $datahadits,
        ];

        //templating
        $this->load->view('template/header', $data);
        $this->load->view('pembimbing/hadits40/index', $data);
        $this->load->view('template/footer', $data);
    }

    function hadits40_edit($id)
    {
        $kode       = decrypt_url($id);
        $parsedata  = $this->login->profil();

        $data = [
            //profil dan menu
            'profil'    => $parsedata['0'],
            'menu'      => $this->Menu_model->tampilmenu()->result(),
            'submenu'   => $this->Menu_model->tampilsubmenu()->result(),

            //data
            'rombel'    => $this->db->get('tbl_rombel')->result_array(),
            'hadits'    => $this->db->get('tbl_hadits')->result_array(),
            'dthadits'  => $this->db->get_where('tbl_hadits40', array('hadits40_id' => $kode))->result_array()[0],
        ];

        //templating
        $this->load->view('template/header', $data);
        $this->load->view('pembimbing/hadits40/hadits40_edit', $data);
        $this->load->view('template/footer', $data);
    }

    function hadits40_tambah()
    {
        $parsedata  = $this->login->profil();
        $data = [
            //profil dan menu
            'profil'    => $parsedata['0'],
            'menu'      => $this->Menu_model->tampilmenu()->result(),
            'submenu'   => $this->Menu_model->tampilsubmenu()->result(),

            
            'rombel'    => $this->db->get('tbl_rombel')->result_array(),
            'hadits'    => $this->db->get('tbl_hadits')->result_array(),
        ];

        //templating
        $this->load->view('template/header', $data);
        $this->load->view('pembimbing/hadits40/hadits40_tambah', $data);
        $this->load->view('template/footer', $data);
    }

    function hadits40_edit_save()
    {
        $hadits40_id    = decrypt_url($this->input->post('hadits40_id'));
        
        $rombel_id      = $this->input->post('rombel_id');
        $siswa_id       = $this->input->post('siswa_id');
        $hadits_id      = $this->input->post('hadits_id');
        $putaran        = $this->input->post('putaran');
        $keterangan     = $this->input->post('keterangan');
        $pembimbing     = $this->session->userdata('pegawai_id');

        $data = [
            'rombel_id'     => $rombel_id,
            'siswa_id'      => $siswa_id,
            'hadits_id'     => $hadits_id,
            'putaran'       => $putaran,
            'pembimbing_id' => $pembimbing,
            'keterangan'    => $keterangan,
        ];


        $this->db->update('tbl_hadits40', $data, array('hadits40_id' => $hadits40_id));
        
        $this->session->set_flashdata('announce', 'Data Berhasil Disimpan');
        redirect('Hadits-40');
    }

    function hadits40_save()
    {
        $rombel_id      = $this->input->post('rombel_id');
        $siswa_id       = $this->input->post('siswa_id');
        $hadits_id      = $this->input->post('hadits_id');
        $putaran        = $this->input->post('putaran');
        $keterangan     = $this->input->post('keterangan');
        $tanggal        = date("Y-m-d H:i:s");
        $pembimbing     = $this->session->userdata('pegawai_id');

        $data = [
            'rombel_id'     => $rombel_id,
            'siswa_id'      => $siswa_id,
            'hadits_id'     => $hadits_id,
            'putaran'       => $putaran,
            'tanggal'       => $tanggal,
            'pembimbing_id' => $pembimbing,
            'keterangan'    => $keterangan,
        ];

        $this->db->insert('tbl_hadits40', $data);
        
        $this->session->set_flashdata('announce', 'Data Berhasil Disimpan');
        redirect('Hadits-40');
    }

    function hadits40_hapus($id)
    {
        $kode = decrypt_url($id);
        $this->db->delete('tbl_hadits40', array('hadits40_id' => $kode));
        
        $this->session->set_flashdata('announce', 'Data Berhasil Dihapus');
        redirect('Hadits-40');
    }

    function hadits300()
    {
        $parsedata  = $this->login->profil();
        $pembimbing_id = $this->session->userdata('pegawai_id');
        $datahadits = $this->db->select('data_hadits300.*,tbl_hadits300.nama_hadits,tbl_siswa.nama_siswa, tbl_pegawai.nama,tbl_rombel.nama_rombel')
                    ->join('tbl_siswa', 'tbl_siswa.siswa_id = data_hadits300.siswa_id')
                    ->join('tbl_rombel', 'tbl_rombel.rombel_id = data_hadits300.rombel_id')
                    ->join('tbl_hadits300', 'tbl_hadits300.hadits300_id = data_hadits300.hadits_id')
                    ->join('tbl_pegawai', 'tbl_pegawai.pegawai_id = data_hadits300.pembimbing_id')
                    ->where('pembimbing_id', $pembimbing_id)
                    ->order_by('tanggal', 'desc')
                    ->get('data_hadits300')
                    ->result_array();
        $data = [
            //profil dan menu
            'profil'    => $parsedata['0'],
            'menu'      => $this->Menu_model->tampilmenu()->result(),
            'submenu'   => $this->Menu_model->tampilsubmenu()->result(),

            'hadits'    => $datahadits
        ];

        //templating
        $this->load->view('template/header', $data);
        $this->load->view('pembimbing/hadits300/index', $data);
        $this->load->view('template/footer', $data);
    }

    function hadits300_edit($id)
    {
        $kode       = decrypt_url($id);
        $parsedata  = $this->login->profil();

        $data = [
            //profil dan menu
            'profil'    => $parsedata['0'],
            'menu'      => $this->Menu_model->tampilmenu()->result(),
            'submenu'   => $this->Menu_model->tampilsubmenu()->result(),

            //data
            'rombel'    => $this->db->get('tbl_rombel')->result_array(),
            'hadits'    => $this->db->get('tbl_hadits')->result_array(),
            'dthadits'  => $this->db->get_where('tbl_hadits40', array('hadits40_id' => $kode))->result_array()[0],
        ];

        //templating
        $this->load->view('template/header', $data);
        $this->load->view('pembimbing/hadits40/hadits40_edit', $data);
        $this->load->view('template/footer', $data);
    }

    function hadits300_tambah()
    {
        $parsedata  = $this->login->profil();
        $data = [
            //profil dan menu
            'profil'    => $parsedata['0'],
            'menu'      => $this->Menu_model->tampilmenu()->result(),
            'submenu'   => $this->Menu_model->tampilsubmenu()->result(),

            
            'rombel'    => $this->db->get('tbl_rombel')->result_array(),
            'hadits'    => $this->db->get('tbl_hadits300')->result_array(),
        ];

        //templating
        $this->load->view('template/header', $data);
        $this->load->view('pembimbing/hadits300/hadits300_tambah', $data);
        $this->load->view('template/footer', $data);
    }

    function hadits300_edit_save()
    {
        $hadits40_id    = decrypt_url($this->input->post('hadits40_id'));
        
        $rombel_id      = $this->input->post('rombel_id');
        $siswa_id       = $this->input->post('siswa_id');
        $hadits_id      = $this->input->post('hadits_id');
        $putaran        = $this->input->post('putaran');
        $keterangan     = $this->input->post('keterangan');
        $tanggal        = date("Y-m-d H:i:s");
        $pembimbing     = $this->session->userdata('pegawai_id');

        $data = [
            'rombel_id'     => $rombel_id,
            'siswa_id'      => $siswa_id,
            'hadits_id'     => $hadits_id,
            'putaran'       => $putaran,
            'tanggal'       => $tanggal,
            'pembimbing_id' => $pembimbing,
            'keterangan'    => $keterangan,
        ];


        $this->db->update('tbl_hadits40', $data, array('hadits40_id' => $hadits40_id));
        
        $this->session->set_flashdata('announce', 'Data Berhasil Disimpan');
        redirect('Hadits-40');
    }

    function hadits300_save()
    {
        $rombel_id      = $this->input->post('rombel_id');
        $siswa_id       = $this->input->post('siswa_id');
        $hadits_id      = $this->input->post('hadits_id');
        $putaran        = $this->input->post('putaran');
        $keterangan     = $this->input->post('keterangan');
        $tanggal        = date("Y-m-d H:i:s");
        $pembimbing     = $this->session->userdata('pegawai_id');

        $data = [
            'rombel_id'     => $rombel_id,
            'siswa_id'      => $siswa_id,
            'hadits_id'     => $hadits_id,
            'putaran'       => $putaran,
            'tanggal'       => $tanggal,
            'pembimbing_id' => $pembimbing,
            'keterangan'    => $keterangan,
        ];

        $this->db->insert('data_hadits300', $data);
        
        $this->session->set_flashdata('announce', 'Data Berhasil Disimpan');
        redirect('Hadits-300');
    }

    function hadits300_hapus($id)
    {
        $kode = decrypt_url($id);
        $this->db->delete('tbl_hadits40', array('hadits40_id' => $kode));
        
        $this->session->set_flashdata('announce', 'Data Berhasil Dihapus');
        redirect('Hadits-40');
    }

    function praktik_ibadah()
    {
        $parsedata  = $this->login->profil();
        $data = [
            //profil dan menu
            'profil'    => $parsedata['0'],
            'menu'      => $this->Menu_model->tampilmenu()->result(),
            'submenu'   => $this->Menu_model->tampilsubmenu()->result(),
        ];

        //templating
        $this->load->view('template/header', $data);
        $this->load->view('pembimbing/praktik_ibadah/index', $data);
        $this->load->view('template/footer', $data);
    }

    function doa_harian()
    {
        $parsedata  = $this->login->profil();
        $data = [
            //profil dan menu
            'profil'    => $parsedata['0'],
            'menu'      => $this->Menu_model->tampilmenu()->result(),
            'submenu'   => $this->Menu_model->tampilsubmenu()->result(),
        ];

        //templating
        $this->load->view('template/header', $data);
        $this->load->view('pembimbing/doa_harian/index', $data);
        $this->load->view('template/footer', $data);
    }

    function jurumiyah()
    {
        $parsedata  = $this->login->profil();
        $data = [
            //profil dan menu
            'profil'    => $parsedata['0'],
            'menu'      => $this->Menu_model->tampilmenu()->result(),
            'submenu'   => $this->Menu_model->tampilsubmenu()->result(),
        ];

        //templating
        $this->load->view('template/header', $data);
        $this->load->view('pembimbing/jurumiyah/index', $data);
        $this->load->view('template/footer', $data);
    }

    function tashrif()
    {
        $parsedata  = $this->login->profil();
        $data = [
            //profil dan menu
            'profil'    => $parsedata['0'],
            'menu'      => $this->Menu_model->tampilmenu()->result(),
            'submenu'   => $this->Menu_model->tampilsubmenu()->result(),
        ];

        //templating
        $this->load->view('template/header', $data);
        $this->load->view('pembimbing/tashrif/index', $data);
        $this->load->view('template/footer', $data);
    }

}