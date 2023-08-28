<?php

// default dari App
class Home extends Controller
{
    // default dari App
    public function index()
    {
        $data['nav'] = "default";
        $data['default'] = $this->model('Item')->getAllItem(); // untuk default

        if (isset($_POST['search'])) { // menggunakan isset karena post seacrh belum terbaca diawal
            $data['search'] = $this->model('Item')->searchItem($_POST['key']); // untuk fitur seacrh
        }

        if (isset($_POST['sort'])) { // menggunakan isset karena post sort belum terbaca diawal
            $data['sort'] = $this->model('Item')->sortItem($_POST['sort']); // untuk fitur sort
        }
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}
