<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Students extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
	}

	public function index()
	{
		$this->load->view('index');
	}

	public function create()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("first_name","First Name", "required");
		$this->form_validation->set_rules("last_name","Last Name", "required");
		$this->form_validation->set_rules("email","Email Address", "required");
		$this->form_validation->set_rules("password","Password", "required|min_length[8]");
		$this->form_validation->set_rules("confirm_password","Confirm Password", "required|matches[password");
		if($this->form_validation->run()===FALSE)
		{
			$view_data=array("errors" => validation_errors());
			$this->load->view("index", $view_data);
		}
		else
		{
			$this->load->model('Student');
			$this->Student->add_student($this->input->post());
			redirect('/');
		}	
	}
	
	public function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $this->load->model('Student');
        $student = $this->Student->get_student_by_email($email);
        if($student && $student['password'] == md5($password))
        {
            $view_data = array(
               'id' => $student['id'],
               'email' => $student['email'],
               'first_name' => $student['first_name'],
               'last_name' => $student['last_name'],
               'is_logged_in' => true
            );
            $this->session->set_userdata($view_data);

            $this->load->view('welcome', '$view_data');
        }
        else
        {
            $this->session->set_flashdata("login_error", "Invalid email or password!");
            redirect("/");
        }
    }

	public function welcome_page()
	{
		$this->load->model('Student');
		$view_data = array('Student' => $this->Student->get_student($id));
		$this->load->view('welcome', $view_data);
	}

	public function logout()
	 {
	   $this->session->unset_userdata('logged_in');
	   $this->session->sess_destroy();
	   redirect('index', 'refresh');
	 }
}

//end of main controller