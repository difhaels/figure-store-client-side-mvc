<?php

class Item extends Controller
{
    // method untuk item
    public function index()
    {
        $data['nav'] = "setting";
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
        $data['nav'] = "item";
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

    public function updatePage()
    {
        $data['nav'] = "item";
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
        $this->view('setting/item/updatePage', $data);
        $this->view('templates/footer');
    }

    public function update()
    {
        $data['id'] = $_POST["id"];
        $data['name'] = htmlspecialchars($_POST["name"]);
        $data['code'] = htmlspecialchars($_POST["code"]);
        $data['stock'] = htmlspecialchars($_POST["stock"]);
        $data['price'] = htmlspecialchars($_POST["price"]);
        $data['type'] = htmlspecialchars($_POST["type"]);
        $data['source'] = htmlspecialchars($_POST["source"]);
        $data['dimensions'] = htmlspecialchars($_POST["dimensions"]);
        $data['material'] = htmlspecialchars($_POST["material"]);

        $oldImage = $_POST["oldImage"];
        $oldImage1 = $_POST["oldImage1"];
        $oldImage2 = $_POST["oldImage2"];
        $oldImage3 = $_POST["oldImage3"];
        $oldImage4 = $_POST["oldImage4"];

        // cek apakah user pilih gambar baru atau tidak
        if ($_FILES['image']['error'] === 4) {
            $data['image'] = $oldImage;
        } else {
            $data['image'] = $this->uploudImg('image', 'item');
        }

        if ($_FILES['image1']['error'] === 4) {
            $data['image1'] = $oldImage1;
        } else {
            $data['image1'] = $this->uploudImg('image1', 'sub');
        }

        if ($_FILES['image2']['error'] === 4) {
            $data['image2'] = $oldImage2;
        } else {
            $data['image2'] = $this->uploudImg('image2', 'sub');
        }

        if ($_FILES['image3']['error'] === 4) {
            $data['image3'] = $oldImage3;
        } else {
            $data['image3'] = $this->uploudImg('image3', 'sub');
        }

        if ($_FILES['image4']['error'] === 4) {
            $data['image4'] = $oldImage4;
        } else {
            $data['image4'] = $this->uploudImg('image4', 'sub');
        }

        if ($this->model('Item_model')->update($data) > 0) {
            // pindah ke dashboard admin setting
            header("Location: " . BASEURL . "/item");
            die;
        } else {
            echo "gagal update";
        }
    }

    public function delete()
    {
        $get = $_GET;
        $string = http_build_query($get);
        $url = explode('%2F', $string);
        $lastUrl = end($url);

        if ($lastUrl) {
            $id = $lastUrl; // jika last url ada maka id akan menggunakan last url
        }

        if ($this->model('Item_model')->delete($id) > 0) {
            // pindah ke dashboard admin setting
            header("Location: " . BASEURL . "/item");
            die;
        } else {
            echo "gagal deletes";
        }
    }
}
