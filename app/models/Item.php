<?php

class Item
{
    private $table = "item";
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

    // method untuk menampilkan item yang dipilih 
    public function getItem($id)
    {
        $this->db->query("SELECT * FROM $this->table WHERE item_id = $id");
        return $this->db->single();
    }

    // method untuk search item 
    public function searchItem($key)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE item_name LIKE '%$key%' OR item_source LIKE '%$key%'");
        return $this->db->resultSet();
    }

    // method untuk sort item 
    public function sortItem($selectedSort)
    {
        if ($selectedSort === "newest") {
            $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY item_id DESC');
        } else if ($selectedSort === 'oldest') {
            $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY item_id ASC');
        } else if ($selectedSort === 'highest') {
            $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY item_price DESC');
        } else if ($selectedSort === 'lowest') {
            $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY item_price ASC');
        } else {
            $this->db->query('SELECT * FROM ' . $this->table);
        }
        return $this->db->resultSet();
    }
}
