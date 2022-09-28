<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahun_ajaran extends CI_Controller
{
    function __construct(){
        parent::__construct();

        //load model available
        $this->load->model('User_m','user');
        $this->load->model('Menu_model');
        $this->load->model('Tahun_ajaran_model','ta');
        $this->load->model('Login_model','login');
        

        date_default_timezone_set('Asia/Jakarta');

        if(!isset($this->session->userdata['username'])) {
			$this->session->set_flashdata('Pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><small> Anda Belum Login! (Silahkan Login untuk mengakses halaman yang akan dituju!)</small> <button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span> </button> </div>');
			redirect('Auth');
		}
        
        if(!$this->login->hakaksesmodul(32)){
			redirect('Dashboard');
        }
    }

    function index()
    {        
        //load profil data
        $data['akun'] 	= $this->user->ambil_data($this->session->userdata['user_id']);
		$parsedata   =  $this->login->profil();
		$data['profil'] = $parsedata['0'];

        //load menu
		$data['menu']  	= $this->Menu_model->tampilmenu()->result();
		$data['submenu']  	= $this->Menu_model->tampilsubmenu()->result();

        //load main data
        $data['ta'] = $this->ta->showtahunajaran();

        //load to view
        $this->load->view('template/header', $data);
        $this->load->view('tahun_ajaran/tahun_ajaran', $data);
        $this->load->view('template/footer', $data);
    }

    function add_view()
    {
        //load profil data
        $data['akun'] 	= $this->user->ambil_data($this->session->userdata['user_id']);
        $parsedata   =  $this->login->profil();
        $data['profil'] = $parsedata['0'];

        //load menu
        $data['menu']  	= $this->Menu_model->tampilmenu()->result();
        $data['submenu']  	= $this->Menu_model->tampilsubmenu()->result();

        //load main data
        $data['ta'] = $this->ta->showtahunajaran();

        //load to view
        $this->load->view('template/header', $data);
        $this->load->view('tahun_ajaran/tahun_ajaran_add', $data);
        $this->load->view('template/footer', $data);
    }

    function add_save()
    {
        if($this->ta->add_tahun_ajaran($id)){
            $this->session->set_flashdata('announce', 'Berhasil menambah data');
            redirect('Tahun-ajaran');
        }else{
            $this->session->set_flashdata('announce', 'Gagal menambah data');
            redirect('Tahun-ajaran');
        }
    }

    function update_view($id)
    {
        //load profil data
        $data['akun'] 	= $this->user->ambil_data($this->session->userdata['user_id']);
        $parsedata   =  $this->login->profil();
        $data['profil'] = $parsedata['0'];

        //load menu
        $data['menu']  	= $this->Menu_model->tampilmenu()->result();
        $data['submenu']  	= $this->Menu_model->tampilsubmenu()->result();

        //load main data
        $parsetahunajaran =  $this->ta->showtahunajaranbyid($id);
        $data['ta'] = $parsetahunajaran[0];

        //load to view
        $this->load->view('template/header', $data);
        $this->load->view('tahun_ajaran/tahun_ajaran_update', $data);
        $this->load->view('template/footer', $data);
    }

    function update_save()
    {
        if($this->ta->update_tahun_ajaran()){
            $this->session->set_flashdata('announce', 'Berhasil mengubah data');
            redirect('Tahun-ajaran');
        }else{
            $this->session->set_flashdata('announce', 'Gagal mengubah data');
            redirect('Tahun-ajaran');
        }
    }

    function delete($id)
    {
        if($this->ta->delete_tahun_ajaran($id)){
            $this->session->set_flashdata('announce', 'Berhasil menghapus data');
            redirect('Tahun-ajaran');
        }else{
            $this->session->set_flashdata('announce', 'Gagal menghapus data');
            redirect('Tahun-ajaran');
        }
    }
}