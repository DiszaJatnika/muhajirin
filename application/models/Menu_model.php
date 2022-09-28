<?php

class Menu_model extends CI_Model{

    function tampilmenu()
    {
        $level = $this->session->userdata['jabatan'];
        $query=$this->db->query("SELECT * FROM tmenu WHERE fk_modul_id  IN (SELECT fk_modul_id FROM takses WHERE jabatan=$level)");
	    if($query->num_rows()>0)
	    {
	        return $query;
	    }
	    else
        {
            return FALSE;
        }	    
    }

    function tampilsubmenu()
    {
        $this->db->select('*');
        $this->db->from('tsubmenu');
        $this->db->order_by('urutan','asc');
        return $this->db->get();
    }

    function get_pegawai()
    {
        $pegawai = $this->db->select('pegawai_id');
        $pegawai = $this->db->get('tbl_login')->result();
        // $pgw= array();
        foreach($pegawai as $pgw):
            $datapgw[] = $pgw->pegawai_id;
        endforeach;
        $pgwid = implode(",",$datapgw);
        $ids = explode(",", $pgwid);
   
        $this->db->select("*");
        $this->db->from('tbl_pegawai');
        $this->db->where_not_in('pegawai_id', $ids);
        return $query = $this->db->get();
        
    }

    
}