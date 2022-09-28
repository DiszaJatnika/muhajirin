<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Auth extends CI_Controller {
    
	function __construct(){
		parent::__construct();
		$this->load->model('Login_model');
	} 

    public function index()
	{
		 //validasi inputan login
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
		
        $parsedata   =  $this->Login_model->profil();
		$data['profil'] = $parsedata['0'];
		$this->load->view('Login',$data);
		
	}  
	
	public function proses_login()
	{
		$this->form_validation->set_rules('user', 'username','required', [
			'required' => 'Username wajib diisi!']);
		$this->form_validation->set_rules('pwd', 'password','required', [
			'required' => 'Password wajib diisi!']);
		

		if ($this->form_validation->run()== FALSE){			
			redirect('/');
		}else{
			$username = $this->input->post('user');
			$password = $this->input->post('pwd');

			$user = $username;
			$pass = MD5($password);


			$cek 	= $this->Login_model->cek_login($user, $pass);

			$hasil 	= $cek->result();
			$pegawai = $hasil[0]->pegawai_id;
			$status = $hasil[0]->status;

			if($cek->num_rows() > 0){
				if($status == 'Y'){
					foreach ($cek->result() as $ck) {

						$sess_data['login_id'] = $ck->login_id;
						$sess_data['pegawai_id'] = $ck->pegawai_id;
						$sess_data['username'] = $ck->username;
						$sess_data['jabatan'] = $ck->jabatan;
						$sess_data['status'] = $ck->status;
	
						$this->session->set_userdata($sess_data);
						
					}
					if($sess_data['status'] == 'Y'){
						redirect('Dashboard');
					}
				}else
				{
					$this->session->sess_destroy();
					$this->session->set_flashdata('Pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Akun Anda Dinonaktifkan!Hubungi Admin! <button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span> </button> </div>');
					redirect('Auth');
				}	
			}else{
					$this->session->sess_destroy();
					$this->session->set_flashdata('Pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Username atau Password Salah! <button type="button" class="close" data-dismiss="alert" aria-label="Close" <span aria-hidden="true">&times;</span> </button> </div>');
					redirect('Auth');
			}
		}
	}
 
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('Auth');
	}
}
