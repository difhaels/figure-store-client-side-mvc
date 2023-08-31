<?php

class Transaction_model
{
    private $table = "transaction";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // method untuk menampikan semua info transaksi
    public function getAllInfo()
    {
        $username = $_SESSION['username'];
        $this->db->query('SELECT * FROM ' . $this->table  . ' WHERE username = :username');
        $this->db->bind('username', $username);
        return $this->db->resultSet();
    }
}
