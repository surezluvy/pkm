<?php

class loginModel{

	private $table = 'user';
	private $db;

	public function __construct(){
		$this->db = new Database;
	}

	public function getAllUser(){
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function login($data){
		$query = "SELECT * FROM ". $this->table . " WHERE username=:username AND password=:password";
		$this->db->query($query);
		$this->db->bind('username', $data['username']);
		$this->db->bind('password', $data['password']);

		$this->db->execute();

		return $this->db->rowCount();
	}
}