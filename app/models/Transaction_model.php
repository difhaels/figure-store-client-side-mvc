<?php

class Transaction_model
{
    private $table = "transaction";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // method untuk menampikan semua transaksi yang sesuai dengan username (untuk transaction/info)
    public function getAllInfo()
    {
        $username = $_SESSION['username'];
        $this->db->query('SELECT * FROM ' . $this->table  . ' WHERE username = :username');
        $this->db->bind('username', $username);
        return $this->db->resultSet();
    }

    public function transaction($data)
    {
        // username data
        $username = $data["username"];

        // item data
        $item_name = $data["item_name"];
        $item_image = $data["item_image"];
        $item_price = $data["item_price"];

        // transaction data
        $transaction_name = $data["transaction_name"];
        if (!$transaction_name) {
            $transaction_name = $data["username"];
        }
        $transaction_notlp = $data["transaction_notlp"];
        if (!$transaction_notlp) {
            $transaction_notlp = $data["notlp"];
        }
        $transaction_address = $data["transaction_address"];
        if (!$transaction_address) {
            $transaction_address = $data["address"];
        }
        $stat = "menunggu konfirmasi!";
        $transaction_info = $data['transaction_info'];

        $query = "INSERT INTO " . $this->table . " (username, transaction_name, transaction_notlp, transaction_address, item_name, item_image, item_price, status, transaction_info) VALUES ('$username', '$transaction_name', '$transaction_notlp', '$transaction_address', '$item_name', '$item_image', '$item_price', '$stat', '$transaction_info')";

        $this->db->query($query);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
