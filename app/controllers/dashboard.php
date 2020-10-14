<?php 

// extends agar class Home merupakan child class dari class Controller, sehingga fungsi view dapat digunakan
class dashboard extends Controller{ 
	// Method default
	public function index(){
		// Memanggil view
		// method view ada di code/Controller.php

		$data['title'] = 'Dashboard';
		$data['bagian'] = '';
		// Memanggil model lalu memanggil method getUser()
		$data['admin'] = $this->model('dashboardModel')->getAdminByName();
		$data['user'] = $this->model('dashboardModel')->getPengurus(10);
		$data['userAdmin'] = $this->model('dashboardModel')->getUserAdmin();
		$data['desa'] = $this->model('dashboardModel')->totalDesa();
		$data['kecamatan'] = $this->model('dashboardModel')->totalKecamatan();
		$data['totalpengurus'] = $this->model('dashboardModel')->totalPengurus();
		$data['totalpesan'] = $this->model('dashboardModel')->totalPesan();
		// Memanggil template header dan footer
		$this->view('templates/dashboard/header', $data);
		$this->view('/dashboard/index', $data);
		$this->view('templates/dashboard/footer');
	}

	public function pengurus($id){
		$data['admin'] = $this->model('dashboardModel')->getAdminByName();
		$data['pengurus'] = $this->model('dashboardModel')->getPengurus($id);
		$data['totalpesan'] = $this->model('dashboardModel')->totalPesan();
		$data['title'] = 'Dashboard | Pengurus';
		$data['bagian'] = 'Pengurus';
		$this->view('templates/dashboard/header', $data);
		$this->view('/dashboard/pengurus', $data);
		$this->view('templates/dashboard/footer');
		echo $id;
	}

	public function tambahPengurus(){
		if ($this->model('dashboardModel')->tambahDataPengurus($_POST) > 0) {
			Flasher::setFlash('Berhasil', 'ditambahkan', 'primary');
			header('Location: ' . BASEURL . '/dashboard/pengurus/15');
			exit;
		} else{
			Flasher::setFlash('Gagal', 'ditambahkan', 'danger');
		}
	}

	public function cariPengurus(){

		$data['title'] = 'Dashboard';
		$data['admin'] = $this->model('dashboardModel')->getAdminByName();
		$data['totalpesan'] = $this->model('dashboardModel')->totalPesan();
		$data['bagian'] = 'Pengurus';
		$data['judul'] = 'Dashboard | Pengurus';
		$data['pengurus'] = $this->model('dashboardModel')->cariDataPengurus();
		$this->view('templates/dashboard/header', $data);
		$this->view('/dashboard/pengurus', $data);
		$this->view('templates/dashboard/footer');
	}

	public function hapusDataPengurus($id){
		if ($this->model('dashboardModel')->hapusDataPengurus($id) > 0) {
			Flasher::setFlash('Berhasil', 'dihapuskan', 'primary');
			header('Location: ' . BASEURL . '/dashboard/pengurus');
			exit;
		} else{
			Flasher::setFlash('Gagal', 'dihapuskan', 'danger');
			exit;
		}
	}

	public function wilayah($id1, $id2){
		$data['admin'] = $this->model('dashboardModel')->getAdminByName();
		$data['wilayah'] = $this->model('dashboardModel')->getWilayah($id1, $id2);
		$data['totalpesan'] = $this->model('dashboardModel')->totalPesan();
		$data['title'] = 'Dashboard | Wilayah';
		$data['bagian'] = 'Wilayah';
		$data['aktif'] = 'uk-active';
		$data['total'] = $this->model('dashboardModel')->totalDesa();
		$this->view('templates/dashboard/header', $data);
		$this->view('/dashboard/wilayah', $data);
		$this->view('templates/dashboard/footer');
	}

	public function semuaWilayah(){
		$data['admin'] = $this->model('dashboardModel')->getAdminByName();
		$data['wilayah'] = $this->model('dashboardModel')->getSemuaWilayah();
		$data['totalpesan'] = $this->model('dashboardModel')->totalPesan();
		$data['title'] = 'Dashboard | Wilayah';
		$data['bagian'] = 'Wilayah';
		$this->view('templates/dashboard/header', $data);
		$this->view('/dashboard/wilayah', $data);
		$this->view('templates/dashboard/footer');
	}

	public function cariWilayah(){

		$data['title'] = 'Dashboard';
		$data['admin'] = $this->model('dashboardModel')->getAdminByName();
		$data['totalpesan'] = $this->model('dashboardModel')->totalPesan();
		$data['bagian'] = 'Wilayah';
		$data['judul'] = 'Dashboard | Wilayah';
		$data['wilayah'] = $this->model('dashboardModel')->cariDataWilayah();
		$this->view('templates/dashboard/header', $data);
		$this->view('/dashboard/wilayah', $data);
		$this->view('templates/dashboard/footer');
	}

	public function pesan(){
		$data['admin'] = $this->model('dashboardModel')->getAdminByName();
		$data['totalpesan'] = $this->model('dashboardModel')->totalPesan();
		$data['title'] = 'Dashboard | Kirim Pesan';
		$data['bagian'] = 'Kirim Pesan';
		$data['pesan'] = $this->model('dashboardModel')->pesan();
		$this->view('templates/dashboard/header', $data);
		$this->view('/dashboard/pesan', $data);
		$this->view('templates/dashboard/footer');
	}

	public function kirimPesan(){
		if ($this->model('dashboardModel')->kirimPesan($_POST) > 0) {
			Flasher::setFlash('Berhasil', 'mengirim pesan', 'primary');
			header('Location: ' . BASEURL . '/dashboard/pesan');
			exit;
		} else{
			Flasher::setFlash('Gagal', 'mengirim pesan', 'danger');
		}
	}

	public function daftarPesan($id1, $id2){
		$data['admin'] = $this->model('dashboardModel')->getAdminByName();
		$data['totalpesan'] = $this->model('dashboardModel')->totalPesan();
		$data['pesan'] = $this->model('dashboardModel')->getPesan($id1, $id2);
		$data['title'] = 'Dashboard | Daftar Pesan';
		$data['bagian'] = 'Daftar Pesan';
		$this->view('templates/dashboard/header', $data);
		$this->view('/dashboard/daftarPesan', $data);
		$this->view('templates/dashboard/footer');
	}

	public function hapusPesan($id){
		if ($this->model('dashboardModel')->hapusPesan($id) > 0) {
			Flasher::setFlash('Berhasil', 'dihapuskan', 'primary');
			header('Location: ' . BASEURL . '/dashboard/daftarPesan/0/15');
			exit;
		} else{
			Flasher::setFlash('Gagal', 'dihapuskan', 'danger');
			exit;
		}
	}

	public function logout(){
		session_unset();
		session_destroy();

		header('Location: ' . BASEURL . '/');

		$this->view('templates/header');
		$this->view('/dashboard/');
		$this->view('templates/footer');
	}
}