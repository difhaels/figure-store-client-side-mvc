<?php

class Admin extends Controller
{
    public function index()
    {
        // cek dulu admin sudah login atau belum
        if (isset($_SESSION['login-admin'])) {
            $data['nav'] = "back-button";
            $data['nav-short'] = "no";
            $this->view('templates/header', $data);
            $this->view('admin/index');
            $this->view('templates/footer');
        } else {
            // pindah ke halaman login
            header("Location: " . BASEURL . "/admin/loginadmin");
        }
    }

    // method untuk tampilan login admin
    public function loginAdmin()
    {
        $data['nav'] = "back-button";
        $data['nav-short'] = "yes";
        $this->view('templates/header', $data);
        $this->view('admin/login', $data);
    }

    // method untuk handle login admin
    public function login()
    {
        if ($this->model('Admin_model')->login()) {
            $_SESSION['login-admin'] = true;

            // pindah ke dashboard admin
            header("Location: " . BASEURL . "/admin");
            die;
        }
        echo "password atau username salah";
    }

    // method untuk admin
    public function setting()
    {
        echo "admin";
    }
    // method untuk item
    public function item()
    {
        $data['nav'] = "back-button";
        $data['nav-short'] = "yes";

        $data['items'] = $this->model('Item_model')->getAllItem(); // untuk default

        if (isset($_POST['search'])) { // menggunakan isset karena post seacrh belum terbaca diawal
            $data['search'] = $this->model('Item_model')->searchItem($_POST['key']); // untuk fitur seacrh
        }
        if (isset($_POST['sort'])) { // menggunakan isset karena post sort belum terbaca diawal
            $data['sort'] = $this->model('Item_model')->sortItem($_POST['sort']); // untuk fitur sort
        }
        $this->view('templates/header', $data);
        $this->view('admin/item', $data);
    }

    public function itemUpdate()
    {
        $coba = $_GET;
        var_dump($coba);
    }

    public function itemDelete()
    {
        $coba = $_GET;
        var_dump($coba);
    }

    // method untuk member
    public function member()
    {
        echo "member";
    }
    // method untuk transaction
    public function transaction()
    {
        echo "transaction";
    }
}
