<?php

class Figure_model
{
    private $table = "item";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllItem()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }
}
