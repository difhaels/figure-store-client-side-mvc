<?php

class App
{
    // default url
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();

        // [0] adalah controller
        if (!empty($url) && file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]); // karena sisanya untuk parameter
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller; // menginstansiasi class controller

        // [1] adalah method
        if (isset($url[1])) {
            // cek apakah method ada
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // [sisa] adalah params
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        // jalankan controller & method, serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    // function untuk mendapatkan url
    public function parseUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/'); // untuk menghapus '/' dipaling kanan (jika ada)
            $url = filter_var($url, FILTER_SANITIZE_URL); // untuk memastikan bahwa URL aman dan tidak menggangu
            $url = explode('/', $url); // menjadikan array isinya dan dipisah dengan '/'
            return $url;
        }
    }
}
