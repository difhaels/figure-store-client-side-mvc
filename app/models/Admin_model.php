<?php
class Admin_model
{
    private $table = "admin";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
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

    // ambil semua item di database
    public function getAllAdmin()
    {
        $query = 'SELECT * FROM ' . $this->table;
        $this->db->query($query);
        return $this->db->resultSet();
    }

    // tambah admin baru
    public function addAdmin()
    {
        // ambil username n password dari inputan user
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "INSERT INTO " . $this->table . " (username, password) VALUES ('$username', '$password')";
        $this->db->query($query);
        $this->db->execute();

        return $this->db->rowCount();
    }

    // hapus admin
    public function deleteAdmin($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = $id";
        $this->db->query($query);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
