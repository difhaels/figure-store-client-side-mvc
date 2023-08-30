<?php

class Client
{
    private $table = "client";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // method untuk menampikan semua item
    public function getAllItem()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function login()
    {
        // ambil username n password dari inputan user
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = 'SELECT * FROM ' . $this->table . ' WHERE username = :username AND password  = :password';
        $this->db->query($query);
        $this->db->bind('username', $username);
        $this->db->bind('password', $password);
        return $this->db->single();
    }
}
