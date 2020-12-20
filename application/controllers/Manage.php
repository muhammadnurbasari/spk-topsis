<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends CI_Controller {

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
		$this->load->library("form_validation");

		// validation login
		if (!$this->session->userdata('user')) {
			redirect('welcome');
		}
	}
	
	// users - manage users data
	public function users($para='')
	{
		if ($para == '') {
			$page = "users/index";
			$data["info_topbar"] = "Manajemen Users";
			$data['users'] = $this->Result_model->getdata("users");
			$this->_templating($data, $page);
		} elseif ($para == "edit") {
			$username = $this->input->post("username");
			$id = $this->input->post("id");

			$this->form_validation->set_rules("username", "Username", "required",["required" => "username harus diisi"]);

			if ($this->form_validation->run() == false) {
				echo validation_errors();
			} else {
				$data = [
					"username" => htmlspecialchars($username)
				];

				$this->Result_model->updatedata_by_id("users", $id, $this->audit_trails('edit', $data));

				echo "1";
			}
		} elseif ($para == "add") {
			$username = $this->input->post("username");
			$password = $this->input->post("password");

			$this->form_validation->set_rules("username", "Username", "required",["required" => "username harus diisi"]);
			$this->form_validation->set_rules("password", "Password", "required",["required" => "password harus diisi"]);

			if ($this->form_validation->run() == false) {
				echo validation_errors();
			} else {
				$data = [
					"username" => htmlspecialchars($username),
					"password" => password_hash($password, PASSWORD_DEFAULT)
				];

				$this->Result_model->add_data("users", $this->audit_trails('add', $data));

				echo "1";
			}
		} elseif ($para == "delete") {
			$id = $this->input->post("id");

			$this->Result_model->updatedata_by_id("users", $id, $this->audit_trails('delete', ''));

			echo "1";
		}
	}

	// _templating - function to view and send data
	function _templating($data, $page)
	{
		$this->load->view('partials/header');
		$this->load->view('partials/navbar_top', $data);
		$this->load->view($page, $data);
		$this->load->view('partials/modals');
		$this->load->view('partials/footer');
	}

	// manage_view_edit - function to show edit popup using AJAX
	function manage_view_edit($table, $id)
	{
		// get data by id
		$data[$table] = $this->Result_model->getdata($table, $id);

		if ($data) {
			$response = json_encode([
				"view" => $this->load->view($table.'/edit', $data)
			]);

			// response edit layout
			echo $response;
		}
	}

	// manage_view_add - function to show add popup using AJAX
	function manage_view_add($table)
	{
		$response = json_encode([
			"view" => $this->load->view($table.'/add')
		]);

		// response edit layout
		echo $response;
	}

	// audit_trails - function to merge array data and array audit trails
	function audit_trails($action, $arr = '')
	{
		// cek parameter array
		// if para = '', define array with empty value
		if ($arr == '') {
			$arr = [];
		}

		if ($action == 'add') {
			$data = [
				'created_by' => $this->session->userdata('user')[0]['users_id'],
				'created_at' => date('Y-m-d')
			];

			$audit_trails = array_merge($arr, $data);
		} elseif ($action == 'edit') {
			$data = [
				'updated_by' => $this->session->userdata('user')[0]['users_id'],
				'updated_at' => date('Y-m-d')
			];
			$audit_trails = array_merge($arr, $data);
		} elseif ($action == 'delete') {
			$data = [
				'deleted_by' => $this->session->userdata('user')[0]['users_id'],
				'deleted_at' => date('Y-m-d')
			];
			$audit_trails = array_merge($arr, $data);
		}

		return $audit_trails;
	}

	// logout - method to logout
	function logout()
	{
		$this->session->unset_userdata('user');
		redirect("dashboard");
	}
}
