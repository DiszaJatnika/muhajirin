<?php

class Profil_lks_model extends CI_Model{

    function tampil_data()
    {
        $user = $this->session->userdata['user_id'];
        $this->db->select('tdata_lks.*, tkelurahan.nama as nama_kel,tkecamatan.nama as nama_kec');
        $this->db->from('tdata_lks');
        $this->db->join('tkelurahan',' tkelurahan.id_kel = tdata_lks.fk_kelurahan_id','left');
        $this->db->join('tkecamatan',' tkecamatan.id_kec = tdata_lks.fk_kecamatan_id','left');
        $this->db->where('fk_user_id',$user);
        return $this->db->get()->result();
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
                redirect('Profil-lks-ganti-password');
            }else{
                
                if($password_baru == $konfir_password_baru){
                    $data = array(
                        'username'          => $username,
                        'password'          => md5($password_baru)
                    );
                }else{
                    $this->session->set_flashdata('announce', 'Password baru dan konfirmasi password baru berbeda!');
                    redirect('Profil-lks-ganti-password');
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
                redirect('Profil-lks-ganti-password');
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

    function tampilkecamatan()
    {
        //select ke db
        return $this->db->get('tkecamatan')->result();
    }

    function get_kelurahan($id)
    {    //select ke db
        $query = $this->db->get_where('tkelurahan', array('id_kec' => $id));
		return $query;
    }

    function proses_ubah()
    {
        $nama_lks           = $this->input->post('nama_lks');
        $kecamatan          = $this->input->post('kecamatan');
        $kelurahan          = $this->input->post('kelurahan');
        $alamat_lengkap     = $this->input->post('alamat_lengkap');
        $no_hp              = $this->input->post('no_hp');
        $email              = $this->input->post('email');
        $nama_pengurus      = $this->input->post('nama_pengurus');
        $telp_pengurus      = $this->input->post('telp_pengurus');
        $pengguna           = $this->input->post('pengguna');
        $username           = $this->input->post('username');
        $password           = $this->input->post('password');
        $legalitas_lks      = $this->input->post('legalitas_lks');
        $posisi_lks         = $this->input->post('posisi_lks');
        $ruang_lingkup_lks  = $this->input->post('ruang_lingkup_lks');
        $predikat_akreditasi= $this->input->post('predikat_akreditasi');
        $siks_ng            = $this->input->post('siks_ng');
        $klaster            = $this->input->post('klaster');
        $klien_dalam_panti  = $this->input->post('klien_dalam_panti');
        $klien_luar_panti   = $this->input->post('klien_luar_panti');
        
        //id lks
        $iduser   = $this->session->userdata['user_id'];

        $cekpk  = $this->db->get_where('tdata_lks', array('fk_user_id' => $iduser))->result();
        $datapk = $cekpk[0];
        $getid = $datapk->pk_data_lks_id;

        $data = array(
            'nama_lks'          => $nama_lks,
            'fk_kecamatan_id'   => $kecamatan,
            'fk_kelurahan_id'   => $kelurahan,
            'alamat'            => $alamat_lengkap,
            'telepon'           => $no_hp,
            'email'             => $email,
            'nama_pengurus'     => $nama_pengurus,
            'telp_pengurus'     => $telp_pengurus,
            'legalitas_lks'     => $legalitas_lks,
            'posisi_lks'        => $posisi_lks,
            'ruang_lingkup_lks'     => $ruang_lingkup_lks,
            'predikat_akreditasi'   => $predikat_akreditasi,
            'SIKS_NG'               => $siks_ng,
            'klaster'               => $klaster,
            'klien_dalam_panti'     => $klien_dalam_panti,
            'klien_luar_panti'      => $klien_luar_panti
        );

        $excecute = $this->db->where('pk_data_lks_id', $getid)->update('tdata_lks', $data);

        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    function simpan_upload($profil)
    {
        $iduser   = $this->session->userdata['user_id'];
        
        $data = array(
            'foto_profil'    => $profil
        );

        $excecute = $this->db->where('fk_user_id', $iduser)->update('tdata_lks', $data);
    }

    function simpan_sampul($profil)
    {
        $iduser   = $this->session->userdata['user_id'];
        
        $data = array(
            'slider1'    => $profil
        );

        $excecute = $this->db->where('fk_user_id', $iduser)->update('tdata_lks', $data);
    }
}