<?php

class Transaction extends Controller
{
    public function index()
    {
        // cek udah login apa belum
        if (isset($_SESSION['login'])) {
            $data['nav'] = "back-button";
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
            $data['nav'] = "";
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

        $data['username'] = htmlspecialchars($_POST["username"]);
        $data['notlp'] = htmlspecialchars($_POST["notlp"]);
        $data['address'] = htmlspecialchars($_POST["address"]);
        $data['item_image'] = htmlspecialchars($_POST["item_image"]);
        $data['item_name'] = htmlspecialchars($_POST["item_name"]);
        $data['item_price'] = htmlspecialchars($_POST["item_price"]);
        $data['transaction_name'] = htmlspecialchars($_POST["transaction_name"]);
        $data['transaction_notlp'] = htmlspecialchars($_POST["transaction_notlp"]);
        $data['transaction_address'] = htmlspecialchars($_POST["transaction_address"]);
        $data['transaction_info'] = $this->uploudImg("transaction_info", "transaction");


        if ($this->model('Transaction_model')->transaction($data) > 0) {
            header("Location: " . BASEURL . "/transaction/info");
        }
    }
}
