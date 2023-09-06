<?php

class Transaction extends Controller
{
    public function index()
    {
        // cek udah login apa belum
        if (isset($_SESSION['login'])) {
            $data['nav'] = "back-button";
            $data['back'] = "home";
            $data['nav-short'] = "yes";

            $this->view('templates/header', $data);
            // jika sudah login, tampilkan menu transaction
            $this->view('transaction/index');
            $this->view('templates/footer');
        } else {
            // pindah ke halaman user jika belum login
            header("Location: " . BASEURL . "/logister");
            die;
        }
    }

    public function info()
    {
        // cek udah login apa belum
        if (isset($_SESSION['login'])) {
            $data['nav'] = "back-button";
            $data['back'] = "home";
            $data['nav-short'] = "yes";

            // jika sudah login jalankan getAllInfo untuk menangkap semua proses transaksi
            $data['informations'] = $this->model('Transaction_model')->getAllInfo();
            $this->view('templates/header', $data);

            $this->view('transaction/info', $data);  // hasil getAllInfo akan ditampilkan di sini 
            $this->view('templates/footer');
        } else {
            // pindah ke halaman user jika belum login
            header("Location: " . BASEURL . "/logister");
            die;
        }
    }

    // method untuk handle transaction
    public function process()
    {
        if ($this->model('Transaction_model')->transaction($_POST) > 0) {
            header("Location: " . BASEURL . "/transaction/info");
        } else {
            header("Location: " . BASEURL);
        }
    }
}
