<?php

// default dari App
class Home extends Controller
{
    // default dari App
    public function index()
    {
        $data['nav'] = "no";
        $data['nav-short'] = "yes";

        $data['default'] = $this->model('Item_model')->getAllItem(); // untuk default

        if (isset($_POST['search'])) { // menggunakan isset karena post seacrh belum terbaca diawal
            $data['search'] = $this->model('Item_model')->searchItem($_POST['key']); // untuk fitur seacrh
        }

        if (isset($_POST['sort'])) { // menggunakan isset karena post sort belum terbaca diawal
            $data['sort'] = $this->model('Item_model')->sortItem($_POST['sort']); // untuk fitur sort
        }
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}
