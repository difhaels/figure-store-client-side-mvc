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

    public function click()
    {
        if ($_POST('login') !== null) {
            echo "
                <script>
                    alert('ada');
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('takda');
                </script>
            ";
        }
    }
}
