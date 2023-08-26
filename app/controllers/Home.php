<?php

// default dari App
class Home extends Controller
{
    // default dari App
    public function index()
    {
        $data['item'] = $this->model('Figure_model')->getAllItem(); // untuk default
        if (isset($_POST['sort'])) { // menggunakan isset karena post sort belum terbaca diawal
            $data['sort'] = $this->model('Figure_model')->sortItem($_POST['sort']); // untuk fitur sort
        }
        $this->view('templates/header');
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }

    public function hal2()
    {
        $this->view('templates/header');
        $this->view('home/hal2');
        $this->view('templates/footer');
    }
}
