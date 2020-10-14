<?php

class dashboardModel{

	private $tableUser = 'user';
	private $tablePesan = 'pesan';
	private $tableDesa = 'desa';
	private $tableKecamatan = 'kecamatan';
	private $db;

	public function __construct(){
		$this->db = new Database;
	}

	public function getAdminByName(){
		// Menggunakan WHERE id=:id untuk mengamankan dari SQL inject, jadi tidak menggunakan php echo $id
		$this->db->query('SELECT * FROM ' . $this->tableUser . ' WHERE username=:username');
		$this->db->bind('username', $_SESSION['username']);
		return $this->db->single();
	}

	public function getUserAdmin(){
		// Menggunakan WHERE id=:id untuk mengamankan dari SQL inject, jadi tidak menggunakan php echo $id
		$this->db->query('SELECT * FROM ' . $this->tableUser . ' WHERE role=:role');
		$this->db->bind('role', 'admin');
		return $this->db->resultSet();
	}

	public function getPengurus($id){
		// Menggunakan WHERE id=:id untuk mengamankan dari SQL inject, jadi tidak menggunakan php echo $id
		$this->db->query("SELECT * FROM $this->tableUser WHERE role=:role LIMIT $id");
		$this->db->bind('role', 'pengurus');
		
		return $this->db->resultSet();
	}

	public function getDesa(){
		$this->db->query('SELECT * FROM ' . $this->tableDesa . ' ORDER BY id_desa DESC');
		return $this->db->resultSet();
	}

	public function getKecamatan(){
		$this->db->query('SELECT * FROM ' . $this->tableDesa);
		return $this->db->resultSet();
	}

	public function tambahDataPengurus($data){
		$query = "INSERT INTO user(username, full_name, password)
					VALUES
					(:username, :full_name, :password)";
		$this->db->query($query);
		$this->db->bind('username', $data['username']);
		$this->db->bind('full_name', $data['full_name']);
		$this->db->bind('password', $data['password']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariDataPengurus(){
		$keyword = $_POST['keyword'];
		$query = "SELECT * FROM $this->tableUser WHERE
					full_name LIKE '%$keyword%' 
					OR username LIKE '%$keyword%'";
		$this->db->query($query);
		return $this->db->resultSet();
	}

	public function hapusDataPengurus($id){
		$query = "DELETE FROM $this->tableUser WHERE id_user=$id";
		$this->db->query($query);
		$this->db->bind('id', $id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function getWilayah($id1, $id2){
		$this->db->query("SELECT * FROM $this->tableDesa 
							INNER JOIN $this->tableKecamatan 
							ON desa.id_kec = kecamatan.id_kec LIMIT $id1, $id2");
		return $this->db->resultSet();
	}

	public function getSemuaWilayah(){
		$this->db->query("SELECT * FROM $this->tableDesa 
							INNER JOIN $this->tableKecamatan 
							ON desa.id_kec = kecamatan.id_kec");
		return $this->db->resultSet();
	}

	public function cariDataWilayah(){
		$keyword = $_POST['keyword'];
		$query = "SELECT * FROM $this->tableDesa 
					INNER JOIN $this->tableKecamatan 
					ON desa.id_kec = kecamatan.id_kec WHERE
					nama_desa LIKE '%$keyword%' 
					OR nama_kecamatan LIKE '%$keyword%'";
		$this->db->query($query);
		return $this->db->resultSet();
	}

	public function totalDesa(){
		$query = "SELECT COUNT(*) FROM $this->tableDesa";
		$this->db->query($query);
		return $this->db->single();
	}

	public function totalKecamatan(){
		$query = "SELECT COUNT(*) FROM $this->tableKecamatan";
		$this->db->query($query);
		return $this->db->single();
	}

	public function totalPengurus(){
		$query = "SELECT COUNT(*) FROM $this->tableUser WHERE role = 'pengurus'";
		$this->db->query($query);
		return $this->db->single();
	}

	public function pesan(){
		$query = "SELECT * FROM $this->tablePesan ORDER BY id_pesan DESC";
		$this->db->query($query);
		return $this->db->single();
	}

	public function kirimPesan($data){
		$query = "INSERT INTO pesan(pengirim, tanggal, isi_pesan)
					VALUES
					(:pengirim, :tanggal, :isi_pesan)";
		$this->db->query($query);
		$this->db->bind('pengirim', $data['pengirim']);
		$this->db->bind('tanggal', $data['tanggal']);
		$this->db->bind('isi_pesan', $data['isi_pesan']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function getPesan($id1, $id2){
		$this->db->query("SELECT * FROM $this->tablePesan WHERE status='belum'");
		return $this->db->resultSet();
	}

	public function bacaPesan($id){
		$query = "UPDATE $this->tablePesan SET status='dibaca' WHERE id_pesan=:id";
		$this->db->query($query);
		$this->db->bind('id', $id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function hapusPesan($id){
		$query = "DELETE FROM $this->tablePesan WHERE id_pesan=$id";
		$this->db->query($query);
		$this->db->bind('id', $id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function totalPesan(){
		$query = "SELECT COUNT(*) FROM $this->tablePesan WHERE status='belum'";
		$this->db->query($query);
		return $this->db->single();
	}

}