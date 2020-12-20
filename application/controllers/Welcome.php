<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct()
	{
		parent::__construct();
		$this->load->model('Result_model');
	}
	
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$cek_users = $this->Result_model->getdata_by_name('users', 'username', $username);
		 if (count($cek_users) > 0) {
		 	if (password_verify($password, $cek_users[0]['password'])) {

		 		$this->session->set_userdata(['user' => $cek_users]);

			 	$message = [
			 			'meta' => [
			 				'response' => 200,
			 				'msg' => 'ok'
			 			]
			 	];

				echo json_encode(array_merge($message, ['data' => $cek_users]));
		 	} else {
		 		$message = [
			 			'meta' => [
			 				'response' => 404,
			 				'msg' => 'password salah'
			 			]
			 	];
				echo json_encode(array_merge($message, ['data' => $cek_users]));
		 	}
		 } else {
		 	$message = [
		 			'meta' => [
		 				'response' => 404,
		 				'msg' => 'username belum terdaftar'
		 			]
		 	];

			echo json_encode(array_merge($message, ['data' => $cek_users]));
		 }
	}
}
