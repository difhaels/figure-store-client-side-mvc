<?php

class Logister extends Controller
{

    public function index()
    {
        // data untuk settingan navbar 
        $data['nav'] = "back-button";
        $this->view('templates/header', $data);

        if (isset($_SESSION["login"])) {
            // jika sudah login akan menampilkan data user
            $this->user();
        } else {
            // jika belum login, user akan diarahkan ke tampilan login
            $this->view('logister/login');
        }
    }

    public function user()
    {
        $this->view('logister/user');
    }

    public function login()
    {
        // mengecek password benar atau salah, jika benar akan mengembalikan nilai
        $data['client'] = $this->model('Client')->login($_POST);

        if ($data['client']) {
            $_SESSION["login"] = true;
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["notlp"] = $data['client']["notlp"];
            $_SESSION["nowa"] = $data['client']["nowa"];
            $_SESSION["address"] = $data['client']["address"];
            $_SESSION["email"] = $data['client']["email"];

            // pindah ke halaman user
            header("Location: " . BASEURL . "/logister");
            die;
        }
        echo "username atau password salah";
    }

    public function logout()
    {
        $_SESSION = [];
        session_unset();
        session_destroy();
        // pindah ke halaman login
        header("Location: " . BASEURL . "/logister");
    }

    public function register()
    {
        $data['nav'] = "back-button";
        $this->view('templates/header', $data);
        $this->view("logister/register");
    }
}
