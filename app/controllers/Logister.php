<?php

class Logister extends Controller
{

    public function index()
    {
        $data['nav'] = "back-button";
        $this->view('templates/header', $data);
        $this->view('logister/login');
    }

    public function login()
    {
        $data['nav'] = "back-button";
        $this->view('templates/header', $data);
        $this->view('logister/login');
    }
    public function register()
    {
        $data['nav'] = "back-button";
        $this->view('templates/header', $data);
        $this->view('logister/register');
    }
}
