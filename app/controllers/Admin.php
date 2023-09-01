<?php

class Admin extends Controller
{
    public function index()
    {
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

            // pindah ke dashboar admin
            header("Location: " . BASEURL . "/admin");
            die;
        }
        echo "password atau username salah";
    }
}
