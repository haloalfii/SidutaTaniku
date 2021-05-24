<?php
    class Pertanian {
        public $pertanian;
        public $pdo;

        public function __construct(){
            $host="localhost";
            $database="pertanianbeta";
            $user="root";
            $password="";
            $this->pdo = new PDO("mysql:host={$host};dbname={$database}", $user, $password);
        }

        public function GetAll(){
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT * FROM luas_tanam INNER JOIN kecamatan ON luas_tanam.id_kecamatan = kecamatan.id_kecamatan JOIN komoditi ON komoditi.id_komoditi = luas_tanam.id_komoditi";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }

        public function GetAllKomoditi(){
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT * FROM komoditi";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }
        
        public function GetAllLuasTanam($jenis){
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT * FROM luas_tanam INNER JOIN kecamatan ON luas_tanam.id_kecamatan = kecamatan.id_kecamatan JOIN komoditi ON komoditi.id_komoditi = luas_tanam.id_komoditi
            WHERE komoditi.jenis = '".$jenis."'";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }

        public function GetAllLuasTanamKecamatan($jenis, $kecamatan){
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT * FROM luas_tanam INNER JOIN kecamatan ON luas_tanam.id_kecamatan = kecamatan.id_kecamatan JOIN komoditi ON komoditi.id_komoditi = luas_tanam.id_komoditi
            WHERE komoditi.jenis = '".$jenis."' AND kecamatan.nama_kecamatan = '".$kecamatan."'";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }

        // public function AddData($id_produksi, $jan, $feb, $mar, $apr, $mei, $jun, $jul, $agu, $sep, $okt, $nov, $des){
        //     $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //     $query="INSERT INTO data_produksi(jan, feb, mar, apr, mei, jun, jul, agu, sep, okt, nov, des) 
        //     VALUES ('" . $jan . "','" . $feb . "','" . $mar . "', '" . $apr . "','" . $mei . "','" . $jun . "','" . $jul . "', '" . $agu . "', '" . $sep . "', '" . $okt . "', '" . $nov . "', '". $des ."')WHERE id_produksi = ".$id_produksi."";
        //     $stmt = $this->pdo->prepare($query);
        //     $stmt->execute();
        //     return $stmt->rowCount();
        // }
    }
?>