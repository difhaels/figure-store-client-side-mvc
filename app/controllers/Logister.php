<?php

class Logister extends Controller
{
    public function index()
    {
        $this->view('logister/login');
    }

    public function login()
    {
        $this->view('logister/login');
    }
    public function register()
    {
        $this->view('logister/register');
    }
}
