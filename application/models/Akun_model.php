<?php

class Akun_model extends CI_Model{
   
    function update_profil()
    {
        //cari key
        $userid       = $this->session->userdata['user_id'];

        //parse dari form input
        $tempat_lahir   =  $this->input->post('tempat_lahir');
        $tanggal_lahir  =  $this->input->post('tanggal_lahir');
        $jenis_kelamin  =  $this->input->post('jenis_kelamin');
        $asal_negara    =  $this->input->post('asal_negara');
        $asaljenjang    =  $this->input->post('asal_jenjang_pendidikan');
        $alamat         =  $this->input->post('alamat');
        $provinsi       =  $this->input->post('provinsi');
        $kabupaten      =  $this->input->post('kabupaten');

        //parse dari form input sec 2
        $rpenghasilan       = $this->input->post('rerata_penghasilan');
        $pekerjaan_ayah     = $this->input->post('pekerjaan_ayah');
        $pendidikan_ayah    = $this->input->post('pendidikan_ayah');
        $pekerjaan_ibu      = $this->input->post('pekerjaan_ibu');
        $pendidikan_ibu     = $this->input->post('pendidikan_ibu');
        
        //parse dari form input sec 3
        $no_handphone       = $this->input->post('no_handphone');
        $kepemilikan        = $this->input->post('kepemilikan');
        $no_rekening        = $this->input->post('no_rekening');
        $nama_rekening      = $this->input->post('nama_rekening');
        $nama_bank          = $this->input->post('nama_bank');
        
    
        $data = array(
            //section 1
            'tempat_lahir'     => $tempat_lahir,
            'tanggal_lahir'    => $tanggal_lahir,
            'jenis_kelamin'    => $jenis_kelamin,
            'asal_negara'      => $asal_negara,
            'asal_jenjang_pendidikan'      => $asaljenjang,
            'alamat'           => $alamat,
            'kota'             => $kabupaten,
            'provinsi'         => $provinsi,

            //section 2
            'rata_rata_penghasilan_orangtua' => $rpenghasilan,
            'pekerjaan_ayah'   => $pekerjaan_ayah,
            'pendidikan_ayah'  => $pendidikan_ayah,
            'pekerjaan_ibu'    => $pekerjaan_ibu,
            'pendidikan_ibu'   => $pendidikan_ibu,
            
            //section 3
            'no_handphone'     => $no_handphone,
            'kepemilikan'      => $kepemilikan,
            'no_rekening'      => $no_rekening,
            'nama_rekening'    => $nama_rekening,
            'nama_bank'        => $nama_bank
        );
 
        $this->db->where('fk_user_id', $userid)->update('tdata_mahasiswa', $data);
        if($this->db->affected_rows() > 0){
             return true;
        }else{
             return false;
        }
    }

    function proses_ganti_password()
    {
        $id_user                = $this->session->userdata['user_id']; 
        $check                  = $this->input->post('check'); 
        $username               = $this->input->post('username'); 
        $password_baru          = $this->input->post('password_baru'); 
        $konfir_password_baru   = $this->input->post('konfir_password_baru');

        

        if($check == 'on'){
            //cekusername tersedia
            $query = $this->db->get_where('tuser', array('username' => $username));
            $data  = $query->num_rows();
            // $username  = $data->username;
            if($data > 0){
                $this->session->set_flashdata('announce', 'Username Sudah Tersedia, Coba Ganti!');
                redirect('Akun');
            }else{
                
                if($password_baru == $konfir_password_baru){
                    $data = array(
                        'username'          => $username,
                        'password'          => md5($password_baru)
                    );
                }else{
                    $this->session->set_flashdata('announce', 'Password baru dan konfirmasi password baru berbeda!');
                    redirect('Akun');
                }
               
            }
        }else
        {
            if($password_baru == $konfir_password_baru){
                $data = array(
                    'password'          => md5($password_baru)
                );
            }else{
                $this->session->set_flashdata('announce', 'Password baru dan konfirmasi password baru berbeda!');
                redirect('Akun');
            }
            
        }
        

        // print_r($data);
        $excecute = $this->db->where('pk_user_id', $id_user)->update('tuser', $data);

        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
}