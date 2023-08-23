<?php

// default dari App
class Home extends Controller
{
    // default dari App
    public function index()
    {
        $this->view('templates/header');
        $this->view('home/index');
        $this->view('templates/footer');
    }
}
