<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bunga extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load library form validasi
        $this->load->library('form_validation');
        $this->load->model('bunga_model');
        //load model admin
    }

    public function index()
    {
    	$data['bunga'] = $this->bunga_model->view();
        
        $this->load->view('template/header',$data);
        $this->load->view("bunga.php");
        $this->load->view('template/footer');		
    }
	
	public function add()
	{
		$nama=$this->input->post('bunga');
        
		$this->bunga_model->save($nama);
		
        redirect('bunga');
      
	}
	public function edit()
	{
		$id=$this->input->post('id');
		$nama=$this->input->post('bunga');

		$this->bunga_model->update($id,$nama);
		
        redirect('bunga');
      
	}
	public function hapus()
	{
		$id=$this->input->post('id');

		$this->bunga_model->delete($id);
		
        redirect('bunga');
	}
	
}
