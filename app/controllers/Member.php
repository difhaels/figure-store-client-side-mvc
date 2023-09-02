<?php

class Member extends Controller
{
    // method untuk member
    public function index()
    {
        $data['nav'] = "back-button";
        $data['nav-short'] = "no";

        if (isset($_POST['search'])) { // menggunakan isset karena post seacrh belum terbaca diawal
            $data['search'] = $this->model('Client_model')->search($_POST['key']); // untuk fitur seacrh
        }

        $data['member'] = $this->model('Client_model')->getAllItem();
        $this->view('templates/header', $data);
        $this->view('setting/member', $data);
        $this->view('templates/footer');
    }

    // method untuk hapus member
    public function delete()
    {
        $get = $_GET;
        $string = http_build_query($get);
        $url = explode('%2F', $string);
        $lastUrl = end($url);

        if ($lastUrl) {
            $id = $lastUrl; // jika last url ada maka id akan menggunakan last url
        }

        if ($this->model('Client_model')->delete($id) > 0) {
            // pindah ke dashboard member
            header("Location: " . BASEURL . "/member");
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

        $data['nav'] = "back-button";
        $data['nav-short'] = "no";

        $data['member'] = $this->model('Client_model')->getMember($id);

        $this->view('templates/header', $data);
        $this->view('setting/member/update', $data);
        $this->view('templates/footer');
    }

    public function update()
    {
        $data['id'] = $_POST['id'];
        $data['username'] = $_POST['username'];
        $data['password'] = $_POST['password'];
        $data['notlp'] = $_POST['notlp'];
        $data['nowa'] = $_POST['nowa'];
        $data['address'] = $_POST['address'];
        $data['email'] = $_POST['email'];

        if ($this->model('Client_model')->update($data) > 0) {
            // pindah ke dashboard admin setting
            header("Location: " . BASEURL . "/member");
            die;
        } else {
            echo "gagal update";
        }
    }
}
