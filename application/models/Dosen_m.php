<?php

class Dosen_m extends CI_Model{

    function data_dosen()
    {
        $this->db->select('*');
        $this->db->from('tdosen');       
        $this->db->join('tdata_pegawai', 'tdosen.fk_pegawai_id = tdata_pegawai.pk_pegawai_id');       
        return $this->db->get()->result();
    }

    function datamatakuliah()
    {
        $userid = $this->session->userdata('user_id');

        //cari data pegawai 
        $this->db->join('tdosen','tdosen.fk_pegawai_id = tdata_pegawai.pk_pegawai_id');
        $data = $this->db->get_where('tdata_pegawai', array('fk_user_id' => $userid))->result();
        $dosenid = $data[0]->pk_dosen_id;

        //cari mata kuliah dengan id dosen 
        
        $this->db->select('trps.*,tpaketmatakuliah.*,tmatakuliah.nama_matakuliah,tmatakuliah.kode_matakuliah, tpaket.*,tjurusan.nama_jurusan,ttahun_ajaran.tahun_ajaran');
        $this->db->join('tpaket', 'tpaket.pk_paket_id = tpaketmatakuliah.fk_paket_id');
        $this->db->join('trps', 'trps.fk_matakuliah_id = tpaketmatakuliah.pk_matakuliah_id');
        $this->db->join('tmatakuliah', 'tmatakuliah.pk_matakuliah_id = tpaketmatakuliah.fk_matakuliah_id');
        $this->db->join('tjurusan', 'tjurusan.pk_jurusan_id = tpaket.fk_jurusan_id');
        //cari tahun ajaran
        $this->db->join('ttahunajaran_kurikulum', 'ttahunajaran_kurikulum.pk_tahunajarankurikulum_id = tpaket.fk_tahun_ajaran');
        $this->db->join('ttahun_ajaran', 'ttahun_ajaran.pk_tahunajaran_id = ttahunajaran_kurikulum.fk_tahun_ajaran_id');
        return $this->db->get_where('tpaketmatakuliah', array('fk_dosen_id' => $dosenid))->result();
    }
    
    function data_penelitian()
    {
        $userid = $this->session->userdata('user_id');

        //cari data pegawai 
        $this->db->join('tdosen','tdosen.fk_pegawai_id = tdata_pegawai.pk_pegawai_id');
        $data = $this->db->get_where('tdata_pegawai', array('fk_user_id' => $userid))->result();
        $dosenid = $data[0]->pk_dosen_id;

        return $this->db->get_where('tpenelitian', array('fk_dosen_id' => $dosenid))->result();
    }

    function data_rps()
    {
        $userid = $this->session->userdata('user_id');

        //cari data pegawai 
        $this->db->join('tdosen','tdosen.fk_pegawai_id = tdata_pegawai.pk_pegawai_id');
        $data = $this->db->get_where('tdata_pegawai', array('fk_user_id' => $userid))->result();
        $dosenid = $data[0]->pk_dosen_id;

        $this->db->select('trps.*,tpaketmatakuliah.*,tmatakuliah.nama_matakuliah,tmatakuliah.kode_matakuliah, tpaket.*,tjurusan.nama_jurusan,ttahun_ajaran.tahun_ajaran ');
        $this->db->join('tpaket', 'tpaket.pk_paket_id = tpaketmatakuliah.fk_paket_id');
        $this->db->join('trps', 'trps.fk_matakuliah_id = tpaketmatakuliah.pk_matakuliah_id');
        $this->db->join('tmatakuliah', 'tmatakuliah.pk_matakuliah_id = tpaketmatakuliah.fk_matakuliah_id');
        $this->db->join('tjurusan', 'tjurusan.pk_jurusan_id = tpaket.fk_jurusan_id');
        //cari tahun ajaran
        $this->db->join('ttahunajaran_kurikulum', 'ttahunajaran_kurikulum.pk_tahunajarankurikulum_id = tpaket.fk_tahun_ajaran');
        $this->db->join('ttahun_ajaran', 'ttahun_ajaran.pk_tahunajaran_id = ttahunajaran_kurikulum.fk_tahun_ajaran_id');
        return $this->db->get_where('tpaketmatakuliah', array('fk_dosen_id' => $dosenid))->result();
    }

    function data_pengabdian()
    {
        $userid = $this->session->userdata('user_id');
        
        //cari data pegawai 
        $this->db->join('tdosen','tdosen.fk_pegawai_id = tdata_pegawai.pk_pegawai_id');
        $data = $this->db->get_where('tdata_pegawai', array('fk_user_id' => $userid))->result();
        $dosenid = $data[0]->pk_dosen_id;

        return $this->db->get_where('pengabdian', array('fk_dosen_id' => $dosenid))->result();
    }

    function showtmp()
    {
        return $this->db->get('tmp_dosen')->result();
    }

    function deleteAll()
    {
        $this->db->truncate('tmp_dosen');
    }

    function insert_data()
    {
        //select

        $datatmp = $this->db->get('tmp_dosen')->result();
        foreach($datatmp as $data){
            $nidn           = $data->nidn;
            $nama           = $data->nama;
            $nama_gelar     = $data->nama_gelar;
            $tempat_lahir   = $data->tempat_lahir;
            $tanggal_lahir  = $data->tanggal_lahir;
            $gelar          = $data->gelar;
            $jabatan_akademik = $data->jabatan_akademik;
            $home_base      = $data->home_base;

            //cek nim
            $ceknidn = $this->db->get_where('tdosen', array('nidn' => $nidn))->result();

            if($ceknidn){
                //update
                $updatedata = array(
                    //pegawai
                    "nama" => $nama,
                    // dosen   
                    "gelar" => $gelar,
                    "nama_gelar" => $nama_gelar,
                    "tempat_lahir" => $tempat_lahir,
                    "tanggal_lahir" => $tanggal_lahir,
                    "jabatan_akademik" => $jabatan_akademik,
                    "home_base" => $home_base
                );

                $where = array('nidn' => $nidn);
                $this->db->update('tdosen', $updatedata, $where);
            }else{
                //tambah data user
                $userid     = $this->insert_user($nidn);

                //tambah data pegawai
                if(@$userid)
                {
                    $pegawaiid  = $this->insert_pegawai($nama,$userid, $tempat_lahir, $tanggal_lahir);
                }

                if(@$pegawaiid)
                {
                    //tambah data dosen
                    $dosen = array(
                        "fk_pegawai_id" => $pegawaiid,
                        "nidn"         => $nidn, 
                        "gelar"        => $gelar, 
                        "nama_gelar"   => $nama_gelar, 
                        "jabatan_akademik"=> $jabatan_akademik, 
                        "home_base"    => $home_base
                    );
                    $this->db->insert('tdosen', $dosen);
                }
                
            }
        }

        $this->db->truncate('tmp_dosen');
        return true;
    }

    function insert_user($nidn)
    {
        $now = date('Y-m-d');
        $user = array(
            "username" => $nidn,
            "password" => md5($nidn), 
            "fk_level_id" => '9', 
            "status" => 'Y',
            "created_date" => $now
        );
        $this->db->insert('tuser', $user);
        return  $this->db->insert_id();
    }

    function insert_pegawai($nama, $userid, $tempat_lahir, $tanggal_lahir)
    {
        $datapegawai = array(
            "nama_pegawai"  => $nama,
            "fk_user_id"    => $userid,
            "tempat_lahir"  => $tempat_lahir,
            "tanggal_lahir" => $tanggal_lahir
        );

        $this->db->insert('tdata_pegawai', $datapegawai);
        return $this->db->insert_id();

    }

    function get_matakuliah($dosenid)
    {
        // SELECT * FROM tpaketmatakuliah WHERE fk_dosen_id = 22 GROUP BY fk_matakuliah_id
        $this->db->join('tpaket','tpaket.pk_paket_id = tpaketmatakuliah.fk_paket_id');
        $this->db->join('tjurusan','tpaket.fk_jurusan_id = tjurusan.pk_jurusan_id');
        $this->db->join('tmatakuliah','tmatakuliah.pk_matakuliah_id = tpaketmatakuliah.fk_matakuliah_id');
        $this->db->group_by('fk_matakuliah_id');
        return $this->db->get_where('tpaketmatakuliah', array('fk_dosen_id' => $dosenid))->result();
    }

    function get_namamatkul($matkul)
    {
        $matakuliah =  decrypt_url($matkul);
        return $this->db->get('tmatakuliah', array('pk_matakuliah_id' => $matakuliah))->result();
    }

    function get_mahasiswa_nilai($paket, $matakuliah, $semester)
    {
        $paketid        = decrypt_url($paket);
        $matakuliahid   = decrypt_url($matakuliah);
        $semesterid     = decrypt_url($semester);

        $this->db->select('tpaket_rombel.*,tdata_mahasiswa.nama,tdata_mahasiswa.nim,tjurusan.nama_jurusan');
        $this->db->join('tdata_mahasiswa','tdata_mahasiswa.pk_mahasiswa_id = tpaket_rombel.fk_mahasiswa_id');
        $this->db->join('tjurusan','tjurusan.pk_jurusan_id = tdata_mahasiswa.fk_jurusan_id');
        $this->db->order_by('tdata_mahasiswa.nama', 'asc');
        return $smt = $this->db->get_where('tpaket_rombel', array('fk_paket_id' => $paketid, 'fk_matakuliah_id' => $matakuliahid, 'semester' => $semesterid))->result();
    }

    function save_single()
    {
        
        //id
        $rombelid =  $this->input->post('rombelid');
        //nilai
        $terstruktur     =  $this->input->post('terstruktur');
        $mandiri     =  $this->input->post('mandiri');
        $kehadiran  =  $this->input->post('kehadiran');
        $uts        =  $this->input->post('uts');
        $uas        =  $this->input->post('uas');


        print_r($rombelid);
        die;
        $data = array(
            'nilai_kehadiran' => $kehadiran,
            'nilai_mandiri' => $mandiri,
            'nilai_terstruktur' => $terstruktur,
            'nilai_uts' => $uts,
            'nilai_uas' => $uas
        );
        
        $where= array (
            'pk_paketrombel_id' => $rombelid
        );
        $this->db->update('tpaket_rombel', $data, $where);
    }

}


