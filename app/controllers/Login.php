<?php

class Login extends Controller
{

    public function index()
    {
        // data untuk settingan navbar 
        $data['nav'] = "back-button";
        $this->view('templates/header', $data);

        if (isset($_SESSION["login"])) {
            // jika sudah login akan menampilkan data user
            $this->view('login/user');
        } else {
            // jika belum login, user akan diarahkan ke tampilan login
            $this->view('login/login');
        }
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

            // pindah ke halaman index
            header("Location: " . BASEURL);
        }
    }
}
