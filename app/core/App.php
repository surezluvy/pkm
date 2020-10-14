<?php 

class App{

	// Properti untuk menentukan controller, method dan params default
	// Jadi controller default adalah Home
	// Jadi method default adalah index yang berada di /controller/Home.php
	// Jadi params default adalah Array yang kosong yang nanti akan berisikan variabel $url dari pemecahan url dibawah
	protected $controller = 'loginController';
	protected $method = 'index';
	protected $params = [];

	public function __construct(){
		$url = $this->parseURL();

		// Mengecek apakah url memiliki file di dalam folder
		// Misal public/controller/Home.php
		// Apakah file controller/Home.php ada/exist
		// Lalu digabung dengan url index ke 0 dan .php
		// Dan ini juga akan menjalankan file ../index.php, jadi kita gunakan ../app/controlers
		if (file_exists('../app/controllers/' . $url[0] . '.php')) {
			// Jika ada maka controller default akan ditimpa dengan nama file yang sama dengan nama urul
			// misal url user, akan mencari controller user
			// maka akan di hapus karena yang
			$this->controller = $url[0]; 
			unset($url[0]);
		}

		// Setelah kita tau controller nya yang sama dengan url, makan kita panggil controllernya
		// Lalu di instasiasi
		// Agar bisa dipanggil nanti
		require_once '../app/controllers/' . $this->controller . '.php';
		$this->controller = new $this->controller;

		// Method
		// Jika method kosong maka default, jika isi maka akan di unset/hapus
		if (isset($url[1])) {
			if (method_exists($this->controller, $url[1])) {
				$this->method = $url[1];
				unset($url[1]);
			}
		}

		// Params
		if (!empty($url)) {
			// Memasukan aray url terbaru ke dalam variabel params
			$this->params = array_values($url);
		}

		// Jalankan controller dan method, serta kirimkan params jika ada
		call_user_func_array([$this->controller, $this->method], $this->params);
	}

	public function parseURL(){
		if (isset($_GET['url'])) {
			// Agar tidak mendapatkan / setelah url
			$url = rtrim($_GET['url'], '/');
			// Agar url tidak bisa menggunakan karakter2 aneh (hack)
			$url = filter_var($url, FILTER_SANITIZE_URL);
			// Dan url dipecah berdasarkan / (/ akan hilang) dan string akan menjadi elemen array dari $url
			// Misal public/ayam/bebek/cicak
			// Akan menjadi array 1 ayam dst yang akan dihubungkan ke controller 
			$url = explode('/', $url);
			return $url;
		}
	}
}