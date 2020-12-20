<?php  


/**
 * 
 */
class Dashboard extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		// validation login 
		if (!$this->session->userdata('user')) {
			redirect('welcome');
		}
	}

	function index()
	{
		$data['info_topbar'] = 'Dashboard';
		$this->load->view('partials/header');
		$this->load->view('partials/navbar_top', $data);
		$this->load->view('dashboard', $data);
		$this->load->view('partials/modals');
		$this->load->view('partials/footer');
	}
}