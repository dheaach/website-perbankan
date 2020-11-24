<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nasabah extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load library form validasi
        $this->load->library('form_validation');
        $this->load->model('nasabah_model');
        //load model admin
    }

    public function index()
    {
    	# code...
    }
	public function calon()
	{
        $data['calon'] = $this->nasabah_model->view_calon();
        $data['kode'] = $this->nasabah_model->kode();
        $data['bunga'] = $this->nasabah_model->bunga();
        $data['kode_sim'] = $this->nasabah_model->kode_simpan();
        $data['kode_pin'] = $this->nasabah_model->kode_pinjam();
        $this->load->view('template/header',$data);
        $this->load->view("calon.php");
        $this->load->view('template/footer');	
	}
	public function real_simpan()
	{

		$data['nasabah'] = $this->nasabah_model->view_simpan();
		$data['det'] = $this->nasabah_model->det_simpan();
		$data['ambil'] = $this->nasabah_model->det_ambil();
        $this->load->view('template/header',$data);
        $this->load->view("nasabah.php");
        $this->load->view('template/footer');	
	}
	public function real_pinjam()
	{

		$data['nasabah'] = $this->nasabah_model->view_pinjam();
		$data['det'] = $this->nasabah_model->det_pinjam();
        $this->load->view('template/header',$data);
        $this->load->view("nasabah1.php");
        $this->load->view('template/footer');	
	}
	public function add()
	{
		$id=$this->input->post('id');
		$ktp=$this->input->post('ktp');
		$nama=$this->input->post('nama');
        $tmpt=$this->input->post('tempat');
  		$tgl=$this->input->post('tgl');
        $agama=$this->input->post('agama');
		$jk=$this->input->post('jk');
		$email=$this->input->post('email');
		$hp=$this->input->post('hp');
		$alamat=$this->input->post('alamat');

		$this->nasabah_model->save($id,$ktp,$nama,$tmpt,$tgl,$agama,$jk,$email,$hp,$alamat);
		
        redirect('nasabah/calon');
      
	}
	public function edit()
	{
		$id=$this->input->post('id');
		$ktp=$this->input->post('ktp');
		$nama=$this->input->post('nama');
        $tmpt=$this->input->post('tempat');
  		$tgl=$this->input->post('tanggal');
        $agama=$this->input->post('agama');
		$jk=$this->input->post('jk');
		$email=$this->input->post('email');
		$hp=$this->input->post('hp');
		$alamat=$this->input->post('alamat');

		$this->nasabah_model->update($id,$ktp,$nama,$tmpt,$tgl,$agama,$jk,$email,$hp,$alamat);
		
        redirect('nasabah/calon');
      
	}
	public function hapus()
	{
		$id=$this->input->post('id');

		$this->nasabah_model->delete($id);
		
        redirect('nasabah/calon');
	}
	public function simpan()
	{
		$kode=$this->input->post('kode');
		$id=$this->input->post('id');
        $jml=$this->input->post('tab');
  		$tgl=$this->input->post('tgl');
  		$bunga=$this->input->post('bunga');
		$this->nasabah_model->simpan($kode,$id,$jml,$tgl,$data,$bunga);
		
        redirect('nasabah/real_simpan');
	}
	public function pinjam()
	{
		$kode=$this->input->post('kode');
		$id=$this->input->post('id');
		$bung=$this->input->post('bunga');
        $jml=$this->input->post('pinjam');
  		$tgl=$this->input->post('tgl');
  		$waktu=$this->input->post('waktu');
        $k = $jml * ($bung/100);
        $tt = $jml + $k;
        $angsur = $tt / $waktu;

		$this->nasabah_model->pinjam($kode,$id,$jml,$tgl,$waktu,$angsur,$bung,$tt);
		
        redirect('nasabah/real_pinjam');
	}
	public function tabung()
	{
		$sim=$this->input->post('id_sim');
		$nas=$this->input->post('id_nas');
        $jml=$this->input->post('tab');
  		$tgl=date('Y-m-d');

		$this->nasabah_model->tabung($sim,$nas,$jml,$tgl);
		
        redirect('nasabah/real_simpan');
	}
	public function ambil()
	{
		$sim=$this->input->post('id_sim');
		$nas=$this->input->post('id_nas');
        $jml=$this->input->post('ambil');
  		$tgl=date('Y-m-d');

		$this->nasabah_model->ambil($sim,$nas,$jml,$tgl);
		
        redirect('nasabah/real_simpan');
	}
	public function b_sim($ttsim,$idsim)
	{
		$this->nasabah_model->b_sim($ttsim,$idsim);
		
        redirect('nasabah/real_simpan');
	}
	public function angsur()
	{
		$pin=$this->input->post('id_pin');
		$nas=$this->input->post('id_nas');
        $jml=$this->input->post('angsur');
  		$tgl=date('Y-m-d');

		$this->nasabah_model->angsur($pin,$nas,$jml,$tgl);
		
        redirect('nasabah/real_pinjam');
	}
}
