<?php 

// extends agar class Home merupakan child class dari class Controller, sehingga fungsi view dapat digunakan
class loginController extends Controller{ 
	// Method default
	public function index(){
		// Memanggil view
		// method view ada di code/Controller.php

		$data['title'] = 'Login Page';
		// Memanggil model lalu memanggil method getUser()
		$data['user'] = $this->model('loginModel')->getAllUser();
		// Memanggil template header dan footer
		$this->view('templates/login/header', $data);
		$this->view('index', $data);
		$this->view('templates/login/footer');
	}

	public function login(){
		if ($this->model('loginModel')->login($_POST) > 0) {
			session_start();
			$_SESSION['username'] = $_POST['username'];

			Flasher::setFlash('berhasil', 'login', 'primary');
			header("Location: " . BASEURL . "/dashboard/" . $_POST['username']);
			exit;
		} else{
			Flasher::setFlash('gagal', 'login', 'danger');
			header('Location: ' . BASEURL . '/');
			exit;
		}
	}
}