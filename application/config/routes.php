<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['/'] = 'Auth';


//data dashboard
$route['Dashboard'] = 'Login/dashboard';
$route['Blog-view/(:any)'] = 'Login/blog_view/$1';

//data master
$route['Master-info-aplikasi'] = "Master/info_aplikasi";
$route['Master-menu'] = "Master/menu";
$route['Master-update-info-aplikasi'] = "Master/update_info_aplikasi";
$route['Master-modul'] = "Master/modul";
$route['Master-user'] = "Master/user";
$route['Master-akun-ubah-status/(:num)'] = "Master/user_ubah_status/$1";
$route['Master-buat-akun'] = "Master/buat_akun";


$route['Master-siswa'] = "Master/data_siswa";
$route['Master-siswa-tambah'] = "Master/data_siswa_tambah";
$route['Master-siswa-save'] = "Master/data_siswa_save";
$route['Master-siswa-hapus/(:any)'] = "Master/data_siswa_hapus/$1";
$route['Master-siswa-edit/(:any)'] = "Master/data_siswa_edit/$1";
$route['Master-siswa-edit-save'] = "Master/data_siswa_edit_save";

// data master pegawai
$route['Master-pegawai'] = "Master/data_pegawai";
$route['Master-pegawai-tambah'] = "Master/data_pegawai_tambah";
$route['Master-pegawai-save'] = "Master/data_pegawai_save";
$route['Master-pegawai-hapus/(:any)'] = "Master/data_pegawai_hapus/$1";
$route['Master-pegawai-edit/(:any)'] = "Master/data_pegawai_edit/$1";
$route['Master-pegawai-edit-save'] = "Master/data_pegawai_edit_save";


//data jabatan
$route['Master-jabatan'] = "Master/data_jabatan";
$route['Master-jabatan-tambah'] = "Master/data_jabatan_tambah";
$route['Master-jabatan-save'] = "Master/data_jabatan_save";
$route['Master-jabatan-hapus/(:any)'] = "Master/data_jabatan_hapus/$1";
$route['Master-jabatan-edit/(:any)'] = "Master/data_jabatan_edit/$1";
$route['Master-jabatan-edit-save'] = "Master/data_jabatan_edit_save";

// rombel
$route['Master-rombel'] = "Master/data_rombel";
$route['Master-rombel-tambah'] = "Master/data_rombel_tambah";
$route['Master-rombel-save'] = "Master/data_rombel_save";
$route['Master-rombel-hapus/(:any)'] = "Master/data_rombel_hapus/$1";
$route['Master-rombel-edit/(:any)'] = "Master/data_rombel_edit/$1";
$route['Master-rombel-edit-save'] = "Master/data_rombel_edit_save";

//hadits arba'in
$route['Master-hadits40'] = "Master/data_hadits40";
$route['Master-hadits40-tambah'] = "Master/data_hadits40_tambah";
$route['Master-hadits40-save'] = "Master/data_hadits40_save";
$route['Master-hadits40-hapus/(:any)'] = "Master/data_hadits40_hapus/$1";
$route['Master-hadits40-edit/(:any)'] = "Master/data_hadits40_edit/$1";
$route['Master-hadits40-edit-save'] = "Master/data_hadits40_edit_save";

$route['Master-pelanggaran'] = "Master/data_pelanggaran";
$route['Master-pelanggaran-tambah'] = "Master/data_pelanggaran_tambah";
$route['Master-pelanggaran-save'] = "Master/data_pelanggaran_save";
$route['Master-pelanggaran-hapus/(:any)'] = "Master/data_pelanggaran_hapus/$1";
$route['Master-pelanggaran-edit/(:any)'] = "Master/data_pelanggaran_edit/$1";
$route['Master-pelanggaran-edit-save'] = "Master/data_pelanggaran_edit_save";

//izin keluar komplek
$route['Izin-keluar-komplek'] = "Pembimbing/izin_keluarkomplek";
$route['Izin-keluar-komplek-approve'] = "Pembimbing/izin_keluarkomplek_approve";
$route['Izin-keluar-komplek-approve-masuk/(:any)'] = "Pembimbing/approve_masuk/$1";
$route['Izin-keluar-komplek-tambah'] = "Pembimbing/tambah_izin_keluar_komplek";
$route['Izin-pulang'] = "Pembimbing/izin_pulang";
$route['Izin-keluar-komplek-history'] = "Pembimbing/getAllSiswaKeluarKomplek";
$route['Izin-keluar-komplek-by-id/(:any)'] = "Pembimbing/GetSiswaKeluarKomplekById/$1";
$route['Izin-keluar-komplek-hapus/(:any)'] = "Pembimbing/hapusKeluarKomplek/$1";
$route['Izin-keluar-komplek-approval'] = "Pembimbing/keluarKomplekApproval";
$route['Izin-keluar-komplek-get-total'] = "Pembimbing/gettotalkeluarkomplek";


//izin pulang
$route['Izin-pulang-pengajuan'] = "Pembimbing/izin_pulang";
$route['Izin-pulang-tambah'] = "Pembimbing/izin_pulang_tambah";
$route['Izin-pulang-diterima'] = "Pembimbing/izin_pulang_diterima";
$route['Izin-pulang-ditolak']  = "Pembimbing/izin_pulang_ditolak";


//hafalan siswa
$route['Hafalan-siswa']  = "Hafalan_siswa/hafalanShow";
$route['hafalan-tambah']  = "Hafalan_siswa/hafalanTambah";
$route['Hafalan-murojaah'] = "Hafalan_siswa/murojaah";
$route['Murojaah-tambah-data'] = "Hafalan_siswa/murojaah_tambah";
$route['Murojaah-save'] = "Hafalan_siswa/murojaah_save";
$route['Murojaah-hapus/(:any)'] = "Hafalan_siswa/murojaah_hapus/$1";
$route['Murojaah-edit/(:any)'] = "Hafalan_siswa/murojaah_edit/$1";
$route['Murojaah-edit-save'] = "Hafalan_siswa/murojaah_edit_save";

// hadits 40
$route['Hadits-40']  = "Hafalan_siswa/hadits40";
$route['Hadits-40-tambah-data'] = "Hafalan_siswa/hadits40_tambah";
$route['Hadits-40-save'] = "Hafalan_siswa/hadits40_save";
$route['Hadits-40-hapus/(:any)'] = "Hafalan_siswa/hadits40_hapus/$1";
$route['Hadits-40-edit/(:any)'] = "Hafalan_siswa/hadits40_edit/$1";
$route['Hadits-40-edit-save'] = "Hafalan_siswa/hadits40_edit_save";

// hadits 300
$route['Hadits-300']  = "Hafalan_siswa/hadits300";
$route['Hadits-300-tambah-data'] = "Hafalan_siswa/hadits300_tambah";
$route['Hadits-300-save'] = "Hafalan_siswa/hadits300_save";
$route['Hadits-300-hapus/(:any)'] = "Hafalan_siswa/hadits300_hapus/$1";
$route['Hadits-300-edit/(:any)'] = "Hafalan_siswa/hadits300_edit/$1";
$route['Hadits-300-edit-save'] = "Hafalan_siswa/hadits300_edit_save";

// praktik ibadah
$route['Praktik-ibadah']  = "Hafalan_siswa/praktik_ibadah";

// Doa harian
$route['Doa-harian']  = "Hafalan_siswa/doa_harian";

// Jurumiyah
$route['Jurumiyah']  = "Hafalan_siswa/jurumiyah";

// Tashrif
$route['Tashrif']  = "Hafalan_siswa/tashrif";
