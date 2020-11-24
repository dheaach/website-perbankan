<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bunga_model extends CI_Model
{
    public function view()
    {
        $sql=$this->db->query("SELECT * FROM tbl_bunga ");
        return $sql->result_array();
    }
    
    public function save($nama)
    {
        $sql=$this->db->query("INSERT INTO tbl_bunga (jml_bunga) VALUES ('$nama')");
        return $sql;
    }
    public function update($id,$nama)
    {
        $sql=$this->db->query("UPDATE tbl_bunga SET jml_bunga='$nama' WHERE id_bunga='$id' ");
        return $sql;
    }
    public function delete($id)
    {
        $sql=$this->db->query("DELETE FROM tbl_bunga WHERE id_bunga='$id' ");
        return $sql;
    }
}