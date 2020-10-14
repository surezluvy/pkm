<?php 

class Controller{
	// method yang digunakan dalam controller untuk memanggil view
	// Param view berguna untuk memanggil view, data untuk berjaga jaga jika ingin mengirim data ke view
	public function view($view, $data = []){
		require_once '../app/views/' . $view . '.php';
	}

	// Membuat fungsi model yang ber paramater $model, berarti $model itu model nya apa
	public function model($model){
		require_once '../app/models/' .$model . '.php';
		// menginstasiasi model (karena class) agar bisa dipanggil
		return new $model;
	}
}