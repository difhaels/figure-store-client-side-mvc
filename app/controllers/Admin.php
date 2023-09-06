<?php
class Admin extends Controller
{
    // method untuk admin/setting
    public function index()
    {
        $data['nav'] = "setting";
        $data['nav-short'] = "no";

        $data['admin'] = $this->model('Admin_model')->getAllAdmin();

        $this->view('templates/header', $data);
        $this->view('setting/admin', $data);
        $this->view('templates/footer');
    }

    // method untuk tambah admin
    public function add()
    {
        if ($this->model('Admin_model')->addAdmin($_POST) > 0) {
            // pindah ke dashboard admin setting
            header("Location: " . BASEURL . "/admin");
            die;
        } else {
            echo "gagal menambahkan";
        }
    }

    // method untuk hapus admin
    public function delete()
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
            header("Location: " . BASEURL . "/admin");
            die;
        } else {
            echo "gagal delete";
        }
    }

    // method untuk update admin tampilan
    public function updatePage()
    {
        $get = $_GET;
        $string = http_build_query($get);
        $url = explode('%2F', $string);
        $lastUrl = end($url);

        if ($lastUrl) {
            $id = $lastUrl; // jika last url ada maka id akan menggunakan last url
        }

        $data['nav'] = "admin";
        $data['nav-short'] = "no";

        $data['admin'] = $this->model('Admin_model')->getAdmin($id);

        $this->view('templates/header', $data);
        $this->view('setting/admin/update', $data);
        $this->view('templates/footer');
    }

    public function update()
    {
        $data['id'] = $_POST['id'];
        $data['username'] = $_POST['username'];
        $data['password'] = $_POST['password'];

        if ($this->model('Admin_model')->updateAdmin($data) > 0) {
            // pindah ke dashboard admin setting
            header("Location: " . BASEURL . "/admin");
            die;
        } else {
            echo "gagal update";
        }
    }
}
