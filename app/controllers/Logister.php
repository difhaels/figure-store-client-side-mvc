<?php

class Logister extends Controller
{

    public function index()
    {
        // data untuk settingan navbar 
        $data['nav'] = "back-button";
        $data['back'] = "home";
        $data['nav-short'] = "yes";

        $this->view('templates/header', $data);

        if (isset($_SESSION["login"])) {
            // jika sudah login akan menampilkan data user
            $this->user($_SESSION['id-login']);
        } else {
            // jika belum login, user akan diarahkan ke tampilan login
            $this->view('logister/login');
        }
        $this->view('templates/footer');
    }

    public function user($id)
    {
        $data['client'] = $this->model('Client_model')->getMember($id);
        $this->view('logister/user', $data);
    }

    // method untuk menghandle login (method ini menerima POST)
    public function login()
    {
        // mengecek password benar atau salah, jika benar akan mengembalikan nilai
        $data['client'] = $this->model('Client_model')->login();

        if ($data['client']) {
            $_SESSION["login"] = true;
            $_SESSION["id-login"] = $data['client']["id"];
            // pindah ke halaman user
            header("Location: " . BASEURL . "/logister");
            die;
        }
        echo "username atau password salah";
    }

    // method untuk logout
    public function logout()
    {
        $_SESSION = [];
        session_unset();
        session_destroy();
        // pindah ke halaman login
        header("Location: " . BASEURL . "/logister");
    }


    // ini untuk tampilan register
    public function regis()
    {
        $data['nav'] = "back-button";
        $data['back'] = "home";
        $data['nav-short'] = "yes";

        $this->view('templates/header', $data);
        $this->view("logister/register");
    }

    // method untuk menghandle register
    public function register()
    {
        $this->model('Client_model')->register($_POST);
        header("Location: " . BASEURL . "/logister");
    }
}
