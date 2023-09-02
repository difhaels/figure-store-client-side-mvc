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

    // method untuk admin/setting
    public function setting()
    {
        $data['nav'] = "back-button";
        $data['nav-short'] = "no";

        $data['admin'] = $this->model('Admin_model')->getAllAdmin();

        $this->view('templates/header', $data);
        $this->view('admin/setting', $data);
        $this->view('templates/footer');
    }

    // method untuk tambah admin
    public function settingAdd()
    {
        if ($this->model('Admin_model')->addAdmin($_POST) > 0) {
            // pindah ke dashboard admin setting
            header("Location: " . BASEURL . "/admin/setting");
            die;
        } else {
            echo "gagal menambahkan";
        }
    }

    // method untuk hapus admin
    public function settingDelete()
    {
        $get = $_GET;
        $string = http_build_query($get);
        $url = explode('%2F', $string);
        $lastUrl = end($url);

        if ($lastUrl) {
            $id = $lastUrl; // jika last url ada maka id akan menggunakan last url
        }

        if ($this->model('Admin_model')->deleteAdmin($id) > 0) {
            // pindah ke dashboard admin setting
            header("Location: " . BASEURL . "/admin/setting");
            die;
        } else {
            echo "gagal delete";
        }
    }

    // method untuk update admin tampilan
    public function settingUpdatePage()
    {
        $get = $_GET;
        $string = http_build_query($get);
        $url = explode('%2F', $string);
        $lastUrl = end($url);

        if ($lastUrl) {
            $id = $lastUrl; // jika last url ada maka id akan menggunakan last url
        }

        $data['nav'] = "back-button";
        $data['nav-short'] = "no";

        $data['admin'] = $this->model('Admin_model')->getAdmin($id);

        $this->view('templates/header', $data);
        $this->view('admin/setting/update', $data);
        $this->view('templates/footer');
    }

    public function settingUpdate()
    {
        $data['id'] = $_POST['id'];
        $data['username'] = $_POST['username'];
        $data['password'] = $_POST['password'];

        if ($this->model('Admin_model')->updateAdmin($data) > 0) {
            // pindah ke dashboard admin setting
            header("Location: " . BASEURL . "/admin/setting");
            die;
        } else {
            echo "gagal update";
        }
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
        $data['nav'] = "back-button";
        $data['nav-short'] = "no";

        $get = $_GET;
        $string = http_build_query($get);
        $url = explode('%2F', $string);
        $lastUrl = end($url);

        if ($lastUrl) {
            $id = $lastUrl; // jika last url ada maka id akan menggunakan last url
        }

        $data['update'] = $this->model('Item_model')->getItem($id);
        $this->view('templates/header', $data);
        $this->view('admin/item/update', $data);
        $this->view('templates/footer');
    }

    public function itemDelete()
    {
        $coba = $_GET;
        var_dump($coba);
    }

    // method untuk member
    public function member()
    {
        $data['nav'] = "back-button";
        $data['nav-short'] = "no";

        $data['member'] = $this->model('Client_model')->getAllItem();
        $this->view('templates/header', $data);
        $this->view('admin/member', $data);
        $this->view('templates/footer');
    }
    // method untuk transaction
    public function transaction()
    {
        echo "transaction";
    }
}
