<?php

class Detail extends Controller
{
    public function index()
    {
        $data['get'] = $_GET;
        $string = http_build_query($data['get']);
        $data['url'] = explode('F', $string);
        $data['url'] = end($data['url']);

        if (isset($_GET['url'])) $data['item'] = $this->model('Item')->getItem($data['url']); // mengirim data['url] sebagai id item

        $this->view('templates/header');
        $this->view('detail/index', $data);
        $this->view('templates/footer');
    }
}
