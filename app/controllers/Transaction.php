<?php

class Transaction extends Controller
{
    public function index()
    {
        if (isset($_SESSION['login'])) {
            $data['nav'] = "back-button";
            $this->view('templates/header', $data);
            $this->view("transaction/index");
            $this->view('templates/footer');
        } else {
            // pindah ke halaman user
            header("Location: " . BASEURL . "/logister");
            die;
        }
    }
}
