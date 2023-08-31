<?php

class Transaction extends Controller
{
    public function index()
    {
        // cek udah login apa belum
        if (isset($_SESSION['login'])) {
            $data['nav'] = "back-button";
            $this->view('templates/header', $data);
            $this->view('transaction/index');
            $this->view('templates/footer');
        } else {
            // pindah ke halaman user
            header("Location: " . BASEURL . "/logister");
            die;
        }
    }

    public function info()
    {
        // cek udah login apa belum
        if (isset($_SESSION['login'])) {
            $data['nav'] = "back-button";

            $data['informations'] = $this->model('Transaction_model')->getAllInfo();
            $this->view('templates/header', $data);
            $this->view('transaction/info', $data);
            $this->view('templates/footer');
        } else {
            // pindah ke halaman user
            header("Location: " . BASEURL . "/logister");
            die;
        }
    }
    // method untuk handle transaction
    public function transaction()
    {
        $this->view('templates/x');
    }
}
