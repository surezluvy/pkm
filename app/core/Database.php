<?php

class Database{
	private $host = DB_HOST;
	private $user = DB_USER;
	private $pass = DB_PASS;
	private $db_name = DB_NAME;

	private $dbh;
	private $stmt;

	public function __construct(){
		// Variabel identitas server
		$dsn = "mysql:host={$this->host}; dbname={$this->db_name}";

		$option = [
			// Agar menjaga db secara berkala
			PDO::ATTR_PERSISTENT => true,
			// Jika db eror maka
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		];
		try {
			$this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
		} catch(PDOException $e){
			die($e->getMessage());
		}
	}

	// Untuk query db misalkan Create Read dll
	public function query($query){
		$this->stmt = $this->dbh->prepare($query);
	}

	// Untuk query misal insert into, value set dll
	public function bind($param, $value, $type = null){
		if (is_null($type)) {
			switch(true){
				// Jika tipe int maka
				case is_int($value) :
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value) :
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value) :
					$type = PDO::PARAM_NULL;
					break;
				default :
					$type = PDO::PARAM_STR;
			}
		}
		$this->stmt->bindValue($param, $value, $type);
	}

	// Eksekusi db
	public function execute(){
		$this->stmt->execute();
	}

	// Setelah di eksekusi hasilnya ingin banyak atau satuu, jika banyak
	public function resultSet(){
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	// Jika satu
	public function single(){
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}

	// Menghitung berapa baris yang diubah di db kaya create dll
	public function rowCount(){
		return $this->stmt->rowCount();
	}
}