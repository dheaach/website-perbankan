<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load library form validasi
        $this->load->library('form_validation');
        $this->load->model('admin');
        //load model admin
    }


	public function index()
	{
		
			if($this->admin->logged_id())
			{
				//jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
				$lv = $this->session->userdata('level');
					
					$this->load->view('template/header');
	            	$this->load->view('dashboard');
	            	$this->load->view('template/footer.php');

			}else{

				//jika session belum terdaftar

				//set form validation
	            $this->form_validation->set_rules('username', 'Username', 'required');
	            $this->form_validation->set_rules('password', 'Password', 'required');

	            //set message form validation
	            $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
	                <div class="header><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

	            //cek validasi
				if ($this->form_validation->run() == TRUE) {

				//get data dari FORM
	            $username = $this->input->post("username", TRUE);
	            $password = ($this->input->post('password', TRUE));
	            $password1 = md5($this->input->post('password', TRUE));
	            
	            //checking data via model
	            $checking = $this->admin->check_login('tbl_petugas', array('username' => $username), array('password' => $password1)); 
	            //jika ditemukan, maka create session
	            if ($checking != FALSE) {
	                foreach ($checking as $apps) {

	                    $session_data = array(
	                        'user_id'   => $apps->id_petugas,
	                        'user_name' => $apps->username,
	                        'user_pass' => $apps->password,
	                        'user_nama' => $apps->nama_petugas,
	                        'level'     => $apps->level
	                    );
	                    //set session userdata
	          			$this->session->set_userdata($session_data);
	          			
	          			$this->load->view('template/header');
	                    $this->load->view('dashboard');
	                    $this->load->view('template/footer.php');
	                }
	            }else{

	            	$data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
	                	<div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> username atau password salah!</div></div>';
	                $this->session->sess_destroy();
	            	$this->load->view('login', $data);
	            }

	        }else{
	        	$this->session->sess_destroy();
	            $this->load->view('login');
	        }

		}

	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

}
