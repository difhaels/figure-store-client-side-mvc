<?php

class Item_model
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

    // method untuk menambahkan data
    public function add($data)
    {
        $name = $data['name'];
        $code = $data['code'];
        $stock = $data['stock'];
        $price = $data['price'];
        $type = $data['type'];
        $source = $data['source'];
        $dimensions = $data['dimensions'];
        $material = $data['material'];
        $image = $data['image'];
        $image1 = $data['image1'];
        $image2 = $data['image2'];
        $image3 = $data['image3'];
        $image4 = $data['image4'];

        $this->db->query("INSERT INTO " . $this->table . " (item_name, item_code, item_stock, item_price, item_type, item_source, item_dimensions, item_material, item_image, item_image1, item_image2, item_image3, item_image4) VALUES ('$name', '$code', '$stock', '$price', '$type', '$source', '$dimensions', '$material', '$image', '$image1', '$image2', '$image3', '$image4')");

        $this->db->execute();
        return $this->db->rowCount();
    }

    // update item 
    public function update($data)
    {
        $id = $data["id"];
        $id = $data["id"];
        $name = htmlspecialchars($data['name']);
        $code = htmlspecialchars($data['code']);
        $stock = htmlspecialchars($data["stock"]);
        $price = htmlspecialchars($data["price"]);
        $type = htmlspecialchars($data["type"]);
        $source = htmlspecialchars($data["source"]);
        $dimensions = htmlspecialchars($data["dimensions"]);
        $material = htmlspecialchars($data["material"]);
        $image = $data["image"];
        $image1 = $data["image1"];
        $image2 = $data["image2"];
        $image3 = $data["image3"];
        $image4 = $data["image4"];

        $query = "UPDATE " . $this->table . " SET item_name = '$name', item_code = '$code', item_stock = '$stock', item_price = '$price', item_type = '$type', item_source = '$source', item_dimensions = '$dimensions', item_material = '$material', item_image = '$image', item_image1 = '$image1', item_image2 = '$image2', item_image3 = '$image3', item_image4 = '$image4'  WHERE item_id = '$id'";

        $this->db->query($query);
        $this->db->execute();
        return $this->db->rowCount();
    }

    // hapus item
    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE item_id = $id";
        $this->db->query($query);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
