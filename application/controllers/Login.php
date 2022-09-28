<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Login extends CI_Controller
{

	function __construct(){
		parent::__construct();
		$this->load->model('User_m');
		$this->load->model('Login_model');
		$this->load->model('Menu_model');
	} 

	public function index(){

		if(isset($this->session->userdata['username'])) {
			redirect('Dashboard');
		}else{
			$this->load->view('Login');
		}
        
        
	}

	public function dashboard(){

		if(!isset($this->session->userdata['username'])) {
			$this->load->view('login');
		}else{

			$parsedata   	=  $this->Login_model->profil();
			$data['profil'] = $parsedata['0'];
			//menu
			$data['menu']  	= $this->Menu_model->tampilmenu()->result();
			$data['submenu']  	= $this->Menu_model->tampilsubmenu()->result();

			//data
			$data['totalsiswa'] = $this->Login_model->gettotalsiswa();
			$data['totalptk'] = $this->Login_model->gettotalptk();
			$data['totalrombel'] = $this->Login_model->gettotalrombel();
			$data['totaluser'] = $this->Login_model->gettotaluser();
			$data['siswa'] = $this->Login_model->getsiswa();
			$data['siswi'] = $this->Login_model->getsiswi();
			$data['rombel'] = $this->Login_model->getrombel();
			$data['vii'] = $this->Login_model->getkelas('VII');
			$data['viii'] = $this->Login_model->getkelas('VIII');
			$data['ix'] = $this->Login_model->getkelas('IX');
			
			$this->load->view('template/header',$data);
			$this->load->view('Home/dashboard', $data);
			$this->load->view('template/footer',$data);
		}

	}

	function blog_view($slug){
		$datablog = $this->Login_model->view_blog($slug);
		$data['blog'] = $datablog[0];
		$this->load->view('blog', $data);
	}

	
}