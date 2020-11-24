<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas_model extends CI_Model
{
    public function view()
    {
        $sql=$this->db->query("SELECT * FROM tbl_petugas ");
        return $sql->result_array();
    }
    
    public function kode()
    {
        $this->db->select("MAX(id_petugas)+1 AS kode");
        $this->db->from("tbl_petugas");
        $query = $this->db->get();

        return $query->row()->kode;
    }
    public function save($id,$ktp,$nama,$user,$pass,$tgl,$hp,$alamat)
    {
        $passw = md5($pass);
        $sql=$this->db->query("INSERT INTO tbl_petugas (id_petugas,no_ktp,nama_petugas,username,password,tgl_lahir,no_hp,alamat,level) VALUES ('$id','$ktp','$nama','$user','$passw','$tgl','$hp','$alamat','88')");
        return $sql;
    }
    public function update($id,$ktp,$nama,$user,$tgl,$hp,$alamat)
    {
        $sql=$this->db->query("UPDATE tbl_petugas SET nama_petugas='$nama', username='$user', tgl_lahir='$tgl',no_hp='$hp',alamat='$alamat' WHERE id_petugas='$id' ");
        return $sql;
    }
    public function delete($id)
    {
        $sql=$this->db->query("DELETE FROM tbl_petugas WHERE id_petugas='$id' ");
        return $sql;
    }
}