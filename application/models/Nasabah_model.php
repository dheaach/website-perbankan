<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nasabah_model extends CI_Model
{
    public function view_calon()
    {
        $sql=$this->db->query("SELECT * FROM tbl_nasabah ");
        return $sql->result_array();
    }
    public function view_simpan()
    {
        $sql=$this->db->query("SELECT * FROM tbl_simpan JOIN tbl_nasabah ON tbl_nasabah.id_nasabah = tbl_simpan.id_nasabah");
        return $sql->result_array();
    }
    public function view_pinjam()
    {
        $sql=$this->db->query("SELECT * FROM tbl_pinjam JOIN tbl_nasabah ON tbl_nasabah.id_nasabah = tbl_pinjam.id_nasabah");
        return $sql->result_array();
    }
    public function det_simpan()
    {
        $sql=$this->db->query("SELECT * FROM tbl_ang_simpan JOIN tbl_simpan ON tbl_simpan.id_simpan = tbl_ang_simpan.id_simpan JOIN tbl_nasabah ON tbl_nasabah.id_nasabah = tbl_ang_simpan.id_nasabah");
        return $sql->result_array();
    }
    public function det_pinjam()
    {
        $sql=$this->db->query("SELECT * FROM tbl_angsuran JOIN tbl_pinjam ON tbl_pinjam.id_pinjam = tbl_angsuran.id_pinjam JOIN tbl_nasabah ON tbl_nasabah.id_nasabah = tbl_angsuran.id_nasabah");
        return $sql->result_array();
    }
    public function det_ambil()
    {
        $sql=$this->db->query("SELECT * FROM tbl_ambil JOIN tbl_simpan ON tbl_simpan.id_simpan = tbl_ambil.id_simpan JOIN tbl_nasabah ON tbl_nasabah.id_nasabah = tbl_ambil.id_nasabah");
        return $sql->result_array();
    }
    public function kode()
    {
        $this->db->select("MAX(id_nasabah)+1 AS kode");
        $this->db->from("tbl_nasabah");
        $query = $this->db->get();

        return $query->row()->kode;
    }
    public function kode_simpan()
    {
        $this->db->select("MAX(id_simpan)+1 AS kode");
        $this->db->from("tbl_simpan");
        $query = $this->db->get();

        return $query->row()->kode;
    }
    public function kode_pinjam()
    {
        $this->db->select("MAX(id_pinjam)+1 AS kode");
        $this->db->from("tbl_pinjam");
        $query = $this->db->get();

        return $query->row()->kode;
    }
    public function bunga()
    {
        $sql=$this->db->query("SELECT * FROM tbl_bunga");
        return $sql->result_array();
    }
    public function save($id,$ktp,$nama,$tmpt,$tgl,$agama,$jk,$email,$hp,$alamat)
    {
        $sql=$this->db->query("INSERT INTO tbl_nasabah (id_nasabah,no_ktp,nama_nasabah,tmp_lahir,tgl_lahir,agama,jk,alamat,no_hp,email) VALUES ('$id','$ktp','$nama','$tmpt','$tgl','$agama','$jk','$alamat','$hp','$email')");
        return $sql;
    }
    public function update($id,$ktp,$nama,$tmpt,$tgl,$agama,$jk,$email,$hp,$alamat)
    {
        $sql=$this->db->query("UPDATE tbl_nasabah SET nama_nasabah='$nama', tmp_lahir='$tmpt', tgl_lahir='$tgl', agama='$agama', jk='$jk', alamat='$alamat', no_hp='$hp', email='$email' WHERE id_nasabah='$id' ");
        return $sql;
    }
    public function delete($id)
    {
        $sql=$this->db->query("DELETE FROM tbl_nasabah WHERE id_nasabah='$id' ");
        return $sql;
    }
    public function simpan($kode,$id,$jml,$tgl,$bunga)
    {

        $sql=$this->db->query("INSERT INTO tbl_simpan (id_simpan,id_nasabah,jml_simpan,total_simpan,tgl_simpan,id_bunga) VALUES ('$kode','$id','$jml','$jml','$tgl','$bunga')");
        $sql1=$this->db->query("INSERT INTO tbl_ang_simpan (id_simpan,id_nasabah,jml_tab,tgl_ang_sim) VALUES ('$kode','$id','$jml','$tgl')");
        return $sql;
        return $sql1;
    }
    public function pinjam($kode,$id,$jml,$tgl,$waktu,$angsur,$bung,$tt)
    {
        $sql=$this->db->query("INSERT INTO tbl_pinjam (id_pinjam,id_nasabah,jml_pinjam,total_pinjam,angsuran,waktu,tgl_pinjam,sisa_pinjam,status_pinjam,id_bunga) VALUES ('$kode','$id','$jml','$tt','$angsur','$waktu','$tgl','$tt','belum','$bung')");
        return $sql;
    }
    public function tabung($sim,$nas,$jml,$tgl)
    {
        $sql=$this->db->query("INSERT INTO tbl_ang_simpan (id_simpan,id_nasabah,jml_tab,tgl_ang_sim) VALUES ('$sim','$nas','$jml','$tgl')");
        $sql1 = $this->db->query("UPDATE tbl_simpan SET total_simpan =total_simpan+'$jml' WHERE id_simpan = '$sim'");
        return $sql;
        return $sql1;
    }
    public function ambil($sim,$nas,$jml,$tgl)
    {
        $sql=$this->db->query("INSERT INTO tbl_ambil (id_simpan,id_nasabah,jml_ambil,tgl_ambil) VALUES ('$sim','$nas','$jml','$tgl')");
        $sql1 = $this->db->query("UPDATE tbl_simpan SET total_simpan =total_simpan-'$jml' WHERE id_simpan = '$sim'");
        return $sql;
        return $sql1;
    }
    public function b_sim($ttsim,$idsim)
    {
        $sql=$this->db->query("UPDATE tbl_simpan SET total_simpan='$ttsim' WHERE id_simpan ='$idsim'");
        return $sql;
    }
    public function angsur($pin,$nas,$jml,$tgl)
    {
        $sql=$this->db->query("INSERT INTO tbl_angsuran (id_pinjam,id_nasabah,jml_angsur,tgl_angsur) VALUES ('$pin','$nas','$jml','$tgl')");
        $sql1 = $this->db->query("UPDATE tbl_pinjam SET sisa_pinjam =sisa_pinjam-'$jml' WHERE id_pinjam = '$pin'");
        return $sql;
        return $sql1;
    }
}