<?php 
	class Login extends CI_Controller {

		function index() 
		{
			$data['main_content'] = 'login_form';
			$data['title'] = 'Login - Portal';
			$this->load->view('includes/template', $data);
		}

		function validate_credentials() 
		{
			$this->load->model('membership_model');
			$query = $this->membership_model->validate();

			if($query) // if user's credentials are validated ...
			{
				$data = array(
					'username' => $this->input->post('username'),
					'is_logged_in' => TRUE
					);

				$this->session->set_userdata($data);
				redirect('site/members_area');
			}
			else {
				$this->index();
			}
		}

		function signup() 
		{
			$data['main_content'] = 'signup_form';
			$data['title'] = 'Signup - Portal';
			$this->load->view('includes/template', $data);
		}

		function create_member() 
		{
			$this->load->library('form_validation');
			// field name, error message, validation rules

			$this->form_validation->set_rules('first_name', 'First Name', 'required|min_length[3]|max_length[12]|xss_clean');
			$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]');
			$this->form_validation->set_rules('password2', 'Password confirmation', 'trim|required|matches[password]');

			if($this->form_validation->run() == FALSE) 
			{
				$this->signup();
			}
			else {
				$this->load->model('membership_model');
				if($query = $this->membership_model->create_member()) 
				{
					$data['main_content'] = 'signup_successful';
					$this->load->view('includes/template', $data);
				}
				else {
					$this->load->view('signup_form');
				}
			}
		}
	}