<?php

class Detail extends Controller
{
    // id 1 dijadikan default (sepertinya bukan cara terbaik)
    public function index($id = 1)
    {
        $data['nav'] = "back-button";
        $get = $_GET;
        $string = http_build_query($get);
        $url = explode('%2F', $string);
        $lastUrl = end($url);

        if ($lastUrl) {
            $id = $lastUrl; // jika last url ada maka id akan menggunakan last url
        }

        $data['item'] = $this->model('Item_model')->getItem($id);

        $this->view('templates/header', $data);
        $this->view('detail/index', $data);
        $this->view('templates/footer');
    }
}
