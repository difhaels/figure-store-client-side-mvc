<?php

// default dari App
class Home extends Controller
{
    // default dari App
    public function index()
    {
        $data['item'] = $this->model('Figure_model')->getAllItem();
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
