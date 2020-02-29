<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('AdminModels');	
	}

	public function index()
	{
		$data['coba'] = $this->AdminModels->getData('coba');

		$this->session->unset_userdata('admin_page');
		$this->session->set_userdata('admin_page', 'Dashboard');
		$this->load->view('admin/dashboard/index', $data);
	}

	public function addNewPayment()
	{
		$this->session->unset_userdata('admin_page');
		$this->session->set_userdata('admin_page', 'Add Payment');
		$this->load->view('admin/add_payment/index');
	}

	public function studentPage()
	{
		$this->session->unset_userdata('admin_page');
		$this->session->set_userdata('admin_page', 'Siswa');
		$this->load->view('admin/student/index');
	}

	public function employeePage()
	{
		$data['level'] = $this->AdminModels->getEnumVals('petugas', 'level');
		$data['employees'] = $this->AdminModels->getData('petugas');
		
		$this->session->unset_userdata('admin_page');
		$this->session->set_userdata('admin_page', 'Petugas');
		$this->load->view('admin/employee/index', $data);
	}

	public function classroomPage()
	{
		$data['classes'] = $this->AdminModels->getData('kelas');
		$this->session->unset_userdata('admin_page');
		$this->session->set_userdata('admin_page', 'Kelas');
		$this->load->view('admin/classroom/index', $data);
	}


	// action function
	// classroom
	public function AddNewDataClassroom()
	{
		$kelas = $_POST['kelas'];
		$kompetensi = $_POST['kompetensi'];
		$cekVerifikasi = $_POST['check_verify'];
		$kelas = htmlspecialchars($kelas, TRUE);
		$kompetensi = htmlspecialchars($kompetensi, TRUE);


		
		if($cekVerifikasi != TRUE){
			redirect('Admin/classroomPage');
		}
		
		$valueNum = (int)$kelas;
		if(is_numeric($valueNum) && $valueNum <= 0){
			redirect('Admin/classroomPage');
		}

		$kompetensi = $this->changeFirstToUpCade($kompetensi);
		$data = array(
			'nama_kelas' => $kelas,
			'kompetensi_keahlian' => $kompetensi
		);
		
		$this->AdminModels->setData('kelas', $data);
		redirect('Admin/classroomPage');
	}

	public function DeleteClasses()
	{
		$id = $_GET['id'];
		$this->AdminModels->deleteData($id, 'id_kelas', 'kelas');
		redirect('Admin/classroomPage');
	}

	// employee
	public function insertEmployee()
	{
		$nama = $_POST['name'];
		$username = $_POST['username'];
		$level = $_POST['level'];
		$pass = $_POST['password'];
		$re_pass = $_POST['retype_password'];
		$cek = $_POST['check_verify'];

		$nama = htmlspecialchars($nama, TRUE);
		$username = htmlspecialchars($username, TRUE);
		$level = htmlspecialchars($level, TRUE);
		$pass = htmlspecialchars($pass, TRUE);
		$re_pass = htmlspecialchars($re_pass, TRUE);

		if ($cek != TRUE) {
			echo 'belum anda centang';
		}elseif($pass != $re_pass){
			echo 'password tidak sama';
		}else{
		$data = array(
			'username' => $username,
			'password' => $pass,
			'nama_petugas' => $nama,
			'level' => $level
		);
		$this->AdminModels->setData('petugas', $data);
		redirect('Admin/employeePage');
		}
	}

	public function deleteEmployee()
	{
		$id = $_GET['id'];
		$this->AdminModels->deleteData($id, 'id_petugas', 'petugas');
		redirect('Admin/employeePage');
	}

	public function changeFirstToUpCade($string)
	{
		$str = strtolower($string);
		for($i = 0; $i <= strlen($str); $i++){
			if($str[$i] == ' '){
				$str[$i+1] = strtoupper($str[$i+1]);
			}elseif($i == 0){
				$str[$i] = strtoupper($str[$i]);
			}
		}
		return $str;
	}
}
