<?php

class Client_model
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

    public function register()
    {
        // ambil semua inputan user
        $username = strtolower($_POST['username']);
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        $notlp = $_POST['notlp'];
        $nowa = $_POST['nowa'];
        $address = $_POST['address'];
        $email = $_POST['email'];

        // cek username sudah digunakan atau belum
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE username = :username');
        $this->db->bind('username', $username);
        if ($this->db->single()) {
            echo "
                <script>
                    alert('Username telah digunakan!');
                </script>
                ";
            return false;
        }
        // cek konfirmasi password
        if ($password !== $password2) {
            echo "
                <script>
                    alert('Password tidak sesuai!');
                </script>
        ";
            return false;
        }

        // tambah data client baru
        $query = "INSERT INTO " . $this->table . " VALUES ('', :username, :password, :notlp, :nowa, :address, :email)";
        $this->db->query($query);
        $this->db->bind('username', $username);
        $this->db->bind('password', $password);
        $this->db->bind('notlp', $notlp);
        $this->db->bind('nowa', $nowa);
        $this->db->bind('address', $address);
        $this->db->bind('email', $email);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
