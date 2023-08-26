<?php

class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    // database handle, untuk koneksi database
    private $dbh;
    // statement, untuk mengeksekusi query SQL
    private $stmt;

    public function __construct()
    {
        // data source name 
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;

        // pengaturan tambahan,  digunakan saat membuat koneksi ke basis data dengan PDO (PHP Data Objects).
        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // metode ini akan mempersiapkan kueri menggunakan objek koneksi PDO yang ada. 
    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    // menginstruksikan PDO untuk menjalankan kueri ke database dengan nilai-nilai yang telah ditentukan sebelumnya
    public function execute()
    {
        $this->stmt->execute();
    }

    //  method untuk mengambil semua isi database yang berkaitan
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
