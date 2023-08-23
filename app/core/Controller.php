<?php

class Controller
{
    // untuk menampilkan data kepada pengguna
    public function view($view, $data = [])
    {
        require_once  '../app/views/' . $view . '.php';
    }
}
