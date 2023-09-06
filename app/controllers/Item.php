<?php

class Item extends Controller
{
    // method untuk item
    public function index()
    {
        $data['nav'] = "back-button";
        $data['back'] = "admin";
        $data['nav-short'] = "yes";

        $data['items'] = $this->model('Item_model')->getAllItem(); // untuk default

        if (isset($_POST['search'])) { // menggunakan isset karena post seacrh belum terbaca diawal
            $data['search'] = $this->model('Item_model')->searchItem($_POST['key']); // untuk fitur seacrh
        }
        if (isset($_POST['sort'])) { // menggunakan isset karena post sort belum terbaca diawal
            $data['sort'] = $this->model('Item_model')->sortItem($_POST['sort']); // untuk fitur sort
        }
        $this->view('templates/header', $data);
        $this->view('setting/item', $data);
    }

    // method untuk halaman add
    public function addPage()
    {
        $data['nav'] = "back-button";
        $data['back'] = "admin";
        $data['nav-short'] = "yes";

        $this->view('templates/header', $data);
        $this->view('setting/item/addPage', $data);
    }

    // method untuk handle add
    public function add()
    {
        $data['name'] = htmlspecialchars($_POST["name"]);
        $data['code'] = htmlspecialchars($_POST["code"]);
        $data['stock'] = htmlspecialchars($_POST["stock"]);
        $data['price'] = htmlspecialchars($_POST["price"]);
        $data['type'] = htmlspecialchars($_POST["type"]);
        $data['source'] = htmlspecialchars($_POST["source"]);
        $data['dimensions'] = htmlspecialchars($_POST["dimensions"]);
        $data['material'] = htmlspecialchars($_POST["material"]);

        // uploud image
        $data['image'] = $this->uploudImg('image', 'item');
        // jika image tidak ada maka akan failed, karena image pertama adalah required
        if (!$data['image']) {
            return false;
        }
        // upload sub image
        if ($_FILES['image1']['error'] === 4) {
            $data['image1'] = "image1";
        } else {
            $data['image1'] = $this->uploudImg('image1', 'sub');
        }

        if ($_FILES['image2']['error'] === 4) {
            $data['image2'] = "image2";
        } else {
            $data['image2'] = $this->uploudImg('image2', 'sub');
        }

        if ($_FILES['image3']['error'] === 4) {
            $data['image3'] = "image3";
        } else {
            $data['image3'] = $this->uploudImg('image3', 'sub');
        }

        if ($_FILES['image4']['error'] === 4) {
            $data['image4'] = "image4";
        } else {
            $data['image4'] = $this->uploudImg('image4', 'sub');
        }

        if ($this->model('Item_model')->add($data) > 0) {
            // pindah ke dashboard admin setting
            header("Location: " . BASEURL . "/item");
            die;
        } else {
            echo "gagal update";
        }
    }

    // method uploud gambar
    function uploudImg($name, $folder)
    {
        $namaFile = $_FILES[$name]['name'];
        $ukuranFile = $_FILES[$name]['size'];
        $error = $_FILES[$name]['error'];
        $tmpName = $_FILES[$name]['tmp_name'];

        // cek ada gambar atau tidak (4 = tidak ada gambar yang diuploud)
        if ($error === 4) {
            echo "
                    <script>
                        alert('Uploud gambar terlebih dahulu');
                    </script>
                ";
            return false;
        }

        // cek yang diup gambar bukan
        $ekstensiGambarValid = ['png', 'jpeg', 'jpg'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "
                    <script>
                        alert('Anda harus menguploud gambar');
                    </script>
                ";
            return false;
        }

        // cek ukuran gambar 2mb max
        if ($ukuranFile > 2000000) {
            echo "
                    <script>
                        alert('Ukuran file terlalu besar max 2 mb');
                    </script>
                ";
            return false;
        }

        $img = 'img';
        // lolos pengecekan, 
        // akan mengisi file img/daftar dari tambahBarang karena dia yang menjalankan function ini
        if (move_uploaded_file($tmpName, 'img/' . $folder . '/' . $namaFile)) {
        } else {
            echo "gagal memindahkan file";
        }

        return $namaFile;
    }

    public function itemUpdate()
    {
        $data['nav'] = "back-button";
        $data['back'] = "admin";
        $data['nav-short'] = "no";

        $get = $_GET;
        $string = http_build_query($get);
        $url = explode('%2F', $string);
        $lastUrl = end($url);

        if ($lastUrl) {
            $id = $lastUrl; // jika last url ada maka id akan menggunakan last url
        }

        $data['update'] = $this->model('Item_model')->getItem($id);
        $this->view('templates/header', $data);
        $this->view('admin/item/update', $data);
        $this->view('templates/footer');
    }

    public function itemDelete()
    {
        $coba = $_GET;
        var_dump($coba);
    }
}
