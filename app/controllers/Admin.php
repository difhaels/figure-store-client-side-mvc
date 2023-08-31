<?php

class Admin extends Controller
{
    public function index()
    {
        $data['nav'] = "back-button";
        $data['nav-short'] = "no";
        $this->view('templates/header', $data);
        $this->view('templates/footer');
    }
}
