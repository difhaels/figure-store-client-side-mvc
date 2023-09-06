<?php

class Controller
{
    // untuk menampilkan data kepada pengguna
    public function view($view, $data = [])
    {
        require_once  '../app/views/' . $view . '.php';
    }

    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model;
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
}
