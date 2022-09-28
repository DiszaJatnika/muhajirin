<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Pembimbing extends CI_Controller
{
    function __construct(){
        parent::__construct();

        //load model available
        $this->load->model('Pembimbing_model','pembimbing');
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

    function izin_keluarkomplek(){
        //load profil data
		$parsedata   =  $this->login->profil();
		$data['profil'] = $parsedata['0'];

        //menu
		$data['menu']  	= $this->Menu_model->tampilmenu()->result();
		$data['submenu']  	= $this->Menu_model->tampilsubmenu()->result();

        //load to view
        $data['izinkeluar'] = $this->pembimbing->get_izinkeluar();
        $data['rombel'] = $this->pembimbing->get_rombel_aktif();

        //templating
        $this->load->view('template/header', $data);
        $this->load->view('pembimbing/izin_keluarkomplek', $data);
        $this->load->view('template/footer', $data);
    }


    function approve_masuk($id)
    {
        if($this->pembimbing->approve_masuk($id)){
            $this->session->set_flashdata('announce', 'Berhasil mengubah status');
            redirect('Izin-keluar-komplek');
        }else{
            $this->session->set_flashdata('announce', 'Gagal mengubah status');
            redirect('Izin-keluar-komplek');
        }
    }

    function get_siswa()
    {
        $rombel_id = $this->input->post('id',TRUE);
        $data = $this->pembimbing->get_siswa_rombel($rombel_id)->result();
        print_r(json_encode($data));
    }

    function tambah_izin_keluar_komplek()
    {
        if($this->pembimbing->tambah_izin_keluar_komplek()){
            $this->session->set_flashdata('announce', 'Berhasil menambah data');
            redirect('Izin-keluar-komplek');
        }else{
            $this->session->set_flashdata('announce', 'Gagal menambah data');
            redirect('Izin-keluar-komplek');
        }
    }

    function izin_keluarkomplek_approve()
    {
        //load profil data
		$parsedata   =  $this->login->profil();
		$data['profil'] = $parsedata['0'];

        //menu
		$data['menu']  	= $this->Menu_model->tampilmenu()->result();
		$data['submenu']  	= $this->Menu_model->tampilsubmenu()->result();

        //load to view
        $data['izinkeluar'] = $this->pembimbing->get_izinkeluar_all();
        $data['rombel'] = $this->pembimbing->get_rombel_aktif();

        //templating
        $this->load->view('template/header', $data);
        $this->load->view('pembimbing/izin_keluarkomplek_approve', $data);
        $this->load->view('template/footer', $data);
    }

    function getAllSiswaKeluarKomplek()
    {

        //load profil data
		$parsedata   =  $this->login->profil();
        
        $menu = [
            'profil'    => $parsedata['0'],
            'menu'      => $this->Menu_model->tampilmenu()->result(), 
            'submenu'   => $this->Menu_model->tampilsubmenu()->result()
        ];

        $data = [
            'siswa'    => $this->pembimbing->getAllSiswaKeluarKomplek()
        ];

        
        //templating
        $this->load->view('template/header', $menu);
        $this->load->view('pembimbing/siswa', $data);
        $this->load->view('template/footer', $menu);
    }

    function GetSiswaKeluarKomplekById($id)
    {
        
        //load profil data
		$parsedata   =  $this->login->profil();
        
        $menu = [
            'profil'    => $parsedata['0'],
            'menu'      => $this->Menu_model->tampilmenu()->result(), 
            'submenu'   => $this->Menu_model->tampilsubmenu()->result()
        ];

        $data = [
            'siswa'    => $this->pembimbing->getSiswaKeluarKomplekById($id)
        ];

        
        //templating
        $this->load->view('template/header', $menu);
        $this->load->view('pembimbing/siswaDetail', $data);
        $this->load->view('template/footer', $menu);
    }

    function hapusKeluarKomplek($id)
    {
        if($this->pembimbing->hapusKeluarKomplek($id)){
            $this->session->set_flashdata('announce', 'Berhasil Menghapus Data');
            redirect('Izin-keluar-komplek');
        }else{
            $this->session->set_flashdata('announce', 'Gagal Menghapus Data');
            redirect('Izin-keluar-komplek');
        }
    }

    function keluarKomplekApproval()
    {
         //load profil data
		$parsedata   =  $this->login->profil();
        
        $menu = [
            'profil'    => $parsedata['0'],
            'menu'      => $this->Menu_model->tampilmenu()->result(), 
            'submenu'   => $this->Menu_model->tampilsubmenu()->result()
        ];

        $data = [
            'keluarkomplek'    => $this->pembimbing->getPembimbingApproval()
        ];

        
        //templating
        $this->load->view('template/header', $menu);
        $this->load->view('pembimbing/pembimbingApproval', $data);
        $this->load->view('template/footer', $menu);
    }

    function gettotalkeluarkomplek()
    {
        $total = $this->db->get_where('tbl_izinkeluarkomplek', array('waktu_kembali' => NULL));
        $hasil =  $total->num_rows();
        return  print_r($hasil);
    }

    function izin_pulang()
    {
        //load profil data
        $parsedata   =  $this->login->profil();
                
        $menu = [
            'profil'    => $parsedata['0'],
            'menu'      => $this->Menu_model->tampilmenu()->result(), 
            'submenu'   => $this->Menu_model->tampilsubmenu()->result()
        ];

        $data = [
            'pulang'    => $this->pembimbing->getPulang(),
            'rombel'    => $this->pembimbing->get_rombel_aktif()
        ];

        

        
        //templating
        $this->load->view('template/header', $menu);
        $this->load->view('pembimbing/pengajuan_pulang', $data);
        $this->load->view('template/footer', $menu);
    }

    function izin_pulang_tambah()
    {
        $pegawai_id = $this->session->userdata('pegawai_id');

        $lampiran = $_FILES['lampiran']['name'];

        if($lampiran):
            //proses upload file
            if(!is_dir("./assets/izinpulang/$pegawai_id")) {
                mkdir('./assets/izinpulang/'.$pegawai_id, 0777, true);
            }

            //proses upload
            $config['upload_path']          = "./assets/izinpulang/$pegawai_id/";
            $config['allowed_types']        = 'pdf|png|jpg|jpeg|doc';
            $config['max_size']             = 3000;
            $config['encrypt_name']         = true;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('lampiran')){
                $fatal = array('fatal' => $this->upload->display_errors());
    			$this->session->set_flashdata('fatal', '<span class="badge badge-danger">'.$fatal['fatal'].'</span>');
                redirect('Izin-pulang-pengajuan');
            }else{
                $data = array('upload_data' => $this->upload->data());
                $namafile =  $this->upload->data("file_name");

                $folder = "$pegawai_id/$namafile";

                $data = [
                    'siswa_id' => $this->input->post('siswa'),
                    'tanggal_pengajuan' => $this->input->post('tanggal_pengajuan'),
                    'tanggal_mulai' => $this->input->post('tanggal_mulai'),
                    'tanggal_kembali' => $this->input->post('tanggal_kembali'),
                    'keterangan' => $this->input->post('keterangan'),
                    'status' => 'Pending',
                    'lampiran' => $folder,
                    'pembimbing_id' => $pegawai_id,
                    'riayah_approval' => 10
                ];
                
                $this->db->insert('tbl_izinpulang', $data);

            }
        else:
            $data = [
                'siswa_id' => $this->input->post('siswa'),
                'tanggal_pengajuan' => $this->input->post('tanggal_pengajuan'),
                'tanggal_mulai' => $this->input->post('tanggal_mulai'),
                'tanggal_kembali' => $this->input->post('tanggal_kembali'),
                'keterangan' => $this->input->post('keterangan'),
                'status' => 'Pending',
                'pembimbing_id' => $pegawai_id,
                'riayah_approval' => 10
            ];
            
            $this->db->insert('tbl_izinpulang', $data);

        endif;
        redirect('Izin-pulang-pengajuan');     
    }

    function izin_pulang_diterima()
    {
        //load profil data
        $parsedata   =  $this->login->profil();
                
        $menu = [
            'profil'    => $parsedata['0'],
            'menu'      => $this->Menu_model->tampilmenu()->result(), 
            'submenu'   => $this->Menu_model->tampilsubmenu()->result()
        ];

        $data = [
            'approve'    => $this->pembimbing->getPulangApprove(),
        ];

        //templating
        $this->load->view('template/header', $menu);
        $this->load->view('pembimbing/pengajuan_pulang_disetujui', $data);
        $this->load->view('template/footer', $menu);
    }

    function izin_pulang_ditolak()
    {
        //load profil data
        $parsedata   =  $this->login->profil();
                
        $menu = [
            'profil'    => $parsedata['0'],
            'menu'      => $this->Menu_model->tampilmenu()->result(), 
            'submenu'   => $this->Menu_model->tampilsubmenu()->result()
        ];

        $data = [
            'approve'    => $this->pembimbing->getPulangDisApprove(),
        ];

        //templating
        $this->load->view('template/header', $menu);
        $this->load->view('pembimbing/pengajuan_pulang_ditolak', $data);
        $this->load->view('template/footer', $menu);

    }
}