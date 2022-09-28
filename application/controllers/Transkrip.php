<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Transkrip extends CI_Controller
{
    function __construct(){
        parent::__construct();

        //load model available
        // $this->load->model('Profil_lks_model','lks');
        $this->load->model('User_m','user');
        $this->load->model('Transkrip_model','transkrip');
        $this->load->model('Menu_model');
        $this->load->model('Login_model','login');
        

        date_default_timezone_set('Asia/Jakarta');

        if(!isset($this->session->userdata['username'])) {
			$this->session->set_flashdata('Pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><small> Anda Belum Login! (Silahkan Login untuk mengakses halaman yang akan dituju!)</small> <button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span> </button> </div>');
			redirect('Auth');
		}
        
        if(!$this->login->hakaksesmodul(1)){
			redirect('Dashboard');
        }
    }

    function index(){

        //parsedata mahasiswa
        $dataakun	= $this->user->ambil_data($this->session->userdata['user_id']);
		$data['mhs'] = $dataakun['0'];
        
        //info aplikasi
		$parsedata   	=  $this->login->profil();
		$data['profil'] = $parsedata['0'];
		
        //tampil menu
		$data['menu']  	= $this->Menu_model->tampilmenu()->result();
		$data['submenu']  	= $this->Menu_model->tampilsubmenu()->result();

        //data
		
		$this->load->view('template/header',$data);
		$this->load->view('transkrip/transkrip');
		$this->load->view('template/footer',$data);
    }

}