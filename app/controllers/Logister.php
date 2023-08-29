<?php

class Logister extends Controller
{

    public function index()
    {
        $data['nav'] = "back-button";

        $data['user'] = $this->model('Client')->click();
        $this->view('templates/header', $data);
        $this->view('logister/login', $data);
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
