<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Model
{
	//fungsi cek session
    function logged_id()
    {
        return $this->session->userdata('user_id');
        return $this->session->userdata('user_nama');
        return $this->session->userdata('user_name');
        return $this->session->userdata('user_pass');
        return $this->session->userdata('level');
    }

	//fungsi check login
    function check_login($table, $field1, $field2)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field1);
        $this->db->where($field2);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }
    function hitungBuku()
    {   
        
        $query=$this->db->query("SELECT * FROM tbl_buku");
        if($query->num_rows()>0)
        {
            return $query->num_rows();
        }
        else
        {
            return 0;
        }
    }
    function hitungPeminjam()
    {   
        
        $query=$this->db->query("SELECT * FROM tbl_peminjam");
        if($query->num_rows()>0)
        {
            return $query->num_rows();
        }
        else
        {
            return 0;
        }
    }
    function hitungPinjam()
    {   
        $id= $this->session->userdata('user_id');
        $query=$this->db->query("SELECT * FROM tbl_peminjaman WHERE status = ' '");
        if($query->num_rows()>0)
        {
            return $query->num_rows();
        }
        else
        {
            return 0;
        }
    }
   
}