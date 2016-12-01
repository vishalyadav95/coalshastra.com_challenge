<?php 

class Site extends CI_Controller {

	public function __construct()
   	{
        parent::__construct();
        $this->is_logged_in();
        
   	}
	/*function index() {
		$this->load->model('site_model');
		$data['records'] = $this->site_model->getAll();
		$this->load->view('home', $data);
	}*/

	/*function about() {
		$this->load->view('about');
	}*/

	/*function index() {
		$this->load->model('data_model');
		$data['rows'] =	$this->data_model->getAll();

		$this->load->view('home', $data);

	}*/

	function index() 
	{
		// pagination
		$this->load->library('pagination');

		$config['base_url'] = base_url() . '/index.php/site/members_area';
		$config['total_rows'] = $this->db->get('data')->num_rows();
		$config['per_page'] = 5; 
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';

		$this->pagination->initialize($config); 

		$data = array();
		//$this->load->view('options_view');
		$this->load->model('site_model');
		if($query = $this->site_model->get_records()) 
		{
			$data['records'] = $query;
		}
		//$this->load->view('options_view', $data);

		$data['main_content'] = 'options_view';
		$data['title'] = 'Portal';
			$this->load->view('includes/template', $data);
	}

	function create() {
		$data = array(
			'title' => $this->input->post('title'),
			'content' => $this->input->post('content')
		);

		$this->site_model->add_record($data);
		$this->index();
	}

	function delete() {
		$this->site_model->delete_row();
		$this->index();
	}

	/*function update() {
		$data = array(
			'title' => 'My freshly updated title',
			'content' => 'Content should go here; it is updated'
		);
		$this->site_model->update_record($data);
	}*/

	function members_area() 
	{
		$this->load->model('site_model');
		$this->index();
		//$this->load->view('options_view');
	}

	function is_logged_in() 
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true) 
		{
			echo 'You do not have permission to access this page. <a href="../login">Login</a>';
			die();
		} 
	}

	function logout()  
	{  
	    $this->session->sess_destroy(); 
	    //$this->load->model('membership_model'); 
	    $data['main_content'] = 'login_form';
	    $data['title'] = 'Login - Portal';
		$this->load->view('includes/template', $data);
	}  
}