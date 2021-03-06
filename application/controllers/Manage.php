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
			$role = $this->input->post("role");
			$id = $this->input->post("id");

			$this->form_validation->set_rules("username", "Username", "required",["required" => "username harus diisi"]);
			$this->form_validation->set_rules("role", "Role", "required",["required" => "role harus diisi"]);

			if ($this->form_validation->run() == false) {
				echo validation_errors();
			} else {
				// pre-assesment
				$this->db->where('username', $username);
				$this->db->where('deleted_by', NULL);
				$this->db->where('deleted_at', NULL);
				$this->db->where('users_id !=', $id);
				$pre_assesment = $this->Result_model->getdata_by_name('users', 'username', $username);
				if($pre_assesment){
					echo "username sudah terdaftar, silahkan gunakan nama yang lain";
				} else {
					$data = [
						"username" => htmlspecialchars($username),
						"role" => htmlspecialchars($role)
					];
	
					$this->Result_model->updatedata_by_id("users", $id, $this->audit_trails('edit', $data));
	
					echo "1";
				}
			}
		} elseif ($para == "add") {
			$username = $this->input->post("username");
			$password = $this->input->post("password");
			$role = $this->input->post("role");

			$this->form_validation->set_rules("username", "Username", "required",["required" => "username harus diisi"]);
			$this->form_validation->set_rules("password", "Password", "required",["required" => "password harus diisi"]);
			$this->form_validation->set_rules("role", "Role", "required",["required" => "role harus diisi"]);

			if ($this->form_validation->run() == false) {
				echo validation_errors();
			} else {
				// pre-assesment
				$this->db->where('username', $username);
				$this->db->where('deleted_by', NULL);
				$this->db->where('deleted_at', NULL);
				$pre_assesment = $this->Result_model->getdata_by_name('users', 'username', $username);
				if($pre_assesment){
					echo "username sudah terdaftar, silahkan gunakan nama yang lain";
				} else {
					$data = [
						"username" => htmlspecialchars($username),
						"password" => password_hash($password, PASSWORD_DEFAULT),
						"role" => htmlspecialchars($role)
					];
	
					$this->Result_model->add_data("users", $this->audit_trails('add', $data));
	
					echo "1";
				}
			}
		} elseif ($para == "delete") {
			$id = $this->input->post("id");

			$this->Result_model->updatedata_by_id("users", $id, $this->audit_trails('delete', ''));

			echo "1";
		}
	}
	
	// criterias - manage criterias data
	public function criterias($para='')
	{
		if ($para == '') {
			$page = "criterias/index";
			$data["info_topbar"] = "Manajemen Kriteria";
			$data['criterias'] = $this->Result_model->getdata("criterias");
			$this->_templating($data, $page);
		} elseif ($para == "edit") {
			$criterias_name = $this->input->post("criterias_name");
			$criterias_attribute = $this->input->post("criterias_attribute");
			$criterias_crips = $this->input->post("criterias_crips");
			$id = $this->input->post("id");
			
			$this->form_validation->set_rules("criterias_name", "criterias_name", "required",["required" => "Nama Kriteria harus diisi"]);
			$this->form_validation->set_rules("criterias_attribute", "Criterias_attribute", "required",["required" => "Attribute Kriteria harus diisi"]);
			$this->form_validation->set_rules("criterias_crips", "Criterias_crips", "required",["required" => "Kepentingan Kriteria harus diisi"]);

			if ($this->form_validation->run() == false) {
				echo validation_errors();
			} else {
				// pre-assesment
				$this->db->where('criterias_name', $criterias_name);
				$this->db->where('deleted_by', NULL);
				$this->db->where('deleted_at', NULL);
				$this->db->where('criterias_id !=', $id);
				$pre_assesment = $this->Result_model->getdata_by_name('criterias', 'criterias_name', $criterias_name);
				if($pre_assesment){
					echo "nama kriteria sudah terdaftar, silahkan gunakan nama yang lain";
				} else {
					$data = [
						"criterias_name" => htmlspecialchars($criterias_name),
						"criterias_attribute" => htmlspecialchars($criterias_attribute),
						"criterias_crips" => htmlspecialchars($criterias_crips)
					];
					
					$this->Result_model->updatedata_by_id("criterias", $id, $this->audit_trails('edit', $data));
					
					echo "1";
				}
			}
		} elseif ($para == "add") {
			$criterias_name = $this->input->post("criterias_name");
			$criterias_attribute = $this->input->post("criterias_attribute");
			$criterias_crips = $this->input->post("criterias_crips");
			
			$this->form_validation->set_rules("criterias_name", "criterias_name", "required",["required" => "Nama Kriteria harus diisi"]);
			$this->form_validation->set_rules("criterias_attribute", "Criterias_attribute", "required",["required" => "Attribute Kriteria harus diisi"]);
			$this->form_validation->set_rules("criterias_crips", "Criterias_crips", "required",["required" => "Kepentingan Kriteria harus diisi"]);

			if ($this->form_validation->run() == false) {
				echo validation_errors();
			} else {
				// pre-assesment
				$this->db->where('criterias_name', $criterias_name);
				$this->db->where('deleted_by', NULL);
				$this->db->where('deleted_at', NULL);
				$pre_assesment = $this->Result_model->getdata_by_name('criterias', 'criterias_name', $criterias_name);
				if($pre_assesment){
					echo "nama kriteria sudah terdaftar, silahkan gunakan nama yang lain";
				} else {
					$data = [
						"criterias_name" => htmlspecialchars($criterias_name),
						"criterias_attribute" => htmlspecialchars($criterias_attribute),
						"criterias_crips" => htmlspecialchars($criterias_crips)
					];
	
					$this->Result_model->add_data("criterias", $this->audit_trails('add', $data));
	
					echo "1";
				}
			}
		} elseif ($para == "delete") {
			$id = $this->input->post("id");

			$this->Result_model->updatedata_by_id("criterias", $id, $this->audit_trails('delete', ''));

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
