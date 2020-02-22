<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function index()
	{
		$this->load->view('admin/dashboard/index');
	}

	public function addNewPayment()
	{
		$this->load->view('admin/add_payment/index');
	}

	public function studentPage()
	{
		$this->load->view('admin/student/index');
	}
}
