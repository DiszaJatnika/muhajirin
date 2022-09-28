<?php

class Tahun_ajaran_model extends CI_Model{

   function showtahunajaran()
   {
        return $this->db->get('ttahun_ajaran')->result();
   }

   function add_tahun_ajaran()
   {
       $tahunajaran = $this->input->post('tahun_ajaran');

       $data = array(
           'tahun_ajaran' => $tahunajaran
       );

       $this->db->insert('ttahun_ajaran', $data);

       if($this->db->affected_rows() > 0){
            return true;
       }else{
            return false;
       }
   }

   function showtahunajaranbyid($id)
   {
        return $this->db->get_where('ttahun_ajaran', array('pk_tahunajaran_id' => $id))->result();
   }

   function update_tahun_ajaran()
   {
       $pktahunajaran   = $this->input->post('tahunajaran_id');
       $tahunajaran     = $this->input->post('tahun_ajaran');

       $data = array(
           'tahun_ajaran' => $tahunajaran
       );
       $where = array('pk_tahunajaran_id' => $pktahunajaran);

       $this->db->update('ttahun_ajaran', $data, $where);

       if($this->db->affected_rows() > 0){
            return true;
       }else{
            return false;
       }
   }

   function delete_tahun_ajaran($id)
   {    
        $this->db->delete('ttahun_ajaran', array('pk_tahunajaran_id' => $id));
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
   }

}


