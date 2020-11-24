<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load library form validasi
        $this->load->library('form_validation');
        $this->load->model('petugas_model');
        //load model admin
    }

    public function index()
    {
    	$data['petugas'] = $this->petugas_model->view();
        $data['kode'] = $this->petugas_model->kode();
        
        $this->load->view('template/header',$data);
        $this->load->view("petugas.php");
        $this->load->view('template/footer');		
    }
	
	public function add()
	{
		$id=$this->input->post('id');
		$ktp=$this->input->post('ktp');
		$nama=$this->input->post('nama');
        $user=$this->input->post('email');
        $pass=$this->input->post('pass');
  		$tgl=$this->input->post('tgl');
		$hp=$this->input->post('hp');
		$alamat=$this->input->post('alamat');

		$this->petugas_model->save($id,$ktp,$nama,$user,$pass,$tgl,$hp,$alamat);
		
        redirect('petugas/');
      
	}
	public function edit()
	{
		$id=$this->input->post('id');
		$ktp=$this->input->post('ktp');
		$nama=$this->input->post('nama');
        $user=$this->input->post('email');
  		$tgl=$this->input->post('tgl');
		$hp=$this->input->post('hp');
		$alamat=$this->input->post('alamat');

		$this->petugas_model->update($id,$ktp,$nama,$user,$tgl,$hp,$alamat);
		
        redirect('petugas/');
      
	}
	public function hapus()
	{
		$id=$this->input->post('id');

		$this->petugas_model->delete($id);
		
        redirect('petugas/');
	}
	
}
