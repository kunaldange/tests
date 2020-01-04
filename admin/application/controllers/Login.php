<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Login extends CI_Controller {

	/*
	Author : Kunal Dange
	*/
	function __construct(){
		parent::__construct();
	//initialise the autoload things for this class
		$this->load->model('Adminmodel');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function authenticate()
	{
		$login_email = $this->input->post("email");
		$login_pwd = $this->input->post("password");

		// Check wheather email is exist or not
		$tbl = "user_register";
		$cond = array("user_email_id" => $login_email);

		$cnt = $this->Adminmodel->get_count($tbl,$cond);
		if($cnt > 0)
		{

			$result = $this->Adminmodel->check_login_details($tbl,$cond);

			$check = password_verify($login_pwd , $result['user_password']);

			if($check)
			{
				$this->session->set_userdata('user_session', $result);

				$this->session->set_flashdata('message', 'You logged in successfully.');
				$this->session->set_flashdata('erclass', "alert-success");
				redirect("Admin");
			}
			else
			{
				$this->session->set_flashdata('message', 'Wrong password.');
				$this->session->set_flashdata('erclass', "alert-danger");
				redirect("/");
			}
		}
		else
		{
			$this->session->set_flashdata('message', 'Sorry, Email ID not registered with us.');
			$this->session->set_flashdata('erclass', "alert-danger");
			redirect("/");
		}
	}

	public function register()
	{

		$email = $this->input->post('email');

		// Check wheather email is alreaduy exist or not
		$cnt = $this->Apimodel->check_email_exist($email);
		if($cnt==0)
		{

			if(isset($_FILES['image_name']['name'])!="")
		    {
		      $config['upload_path']   = '../upload/images/';
		      $config['allowed_types'] = '*';

		      $this->load->library('upload', $config);
		      $this->upload->initialize($config);
		      $img_nm = "";

		      if($this->upload->do_upload('image_name'))
		      {
		        $data = array('upload_data' => $this->upload->data());
		        $img_nm = ".../upload/images/".$this->upload->data('file_name');
		      }
		      else
		      {
		        $error = array('error' => $this->upload->display_errors());
		      }
		  	}

			$arr = array(
				"user_full_name" 	=> $this->input->post('full_name'),
				"user_gender" 		=> $this->input->post('gender'),
				"user_email_id" 	=> $this->input->post('email'),
				"user_mobile_no" 	=> $this->input->post('mobile_no'),
				"user_password" 	=> password_hash($this->input->post('pwd'),PASSWORD_BCRYPT),
				"user_image" 		=> $img_nm,
				"user_type"			=> "user",

			);

			$tbl_nm = "user_register";

			$rid = $this->Adminmodel->insert_function($tbl_nm,$arr);
			if($rid > 0)
			{
				
				$this->session->set_flashdata('message', 'User registered successfully.');
				$this->session->set_flashdata('erclass', "alert-success");
				redirect("/");
				
			}
			else
			{
				$this->session->set_flashdata('message', 'Problem occur while registering user.');
				$this->session->set_flashdata('erclass', "alert-danger");
				redirect("/");
			}
		}
		else
		{
			$this->session->set_flashdata('message', 'Sorry, Email ID is already present. Please register first.');
			$this->session->set_flashdata('erclass', "alert-danger");
			redirect("/");
		}
	}


	

	
	}
