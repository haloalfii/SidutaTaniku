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

        public function AddData($id_kecamatan, $id_komoditi, $jan, $feb, $mar, $apr, $mei, $jun, $jul, $agu, $sep, $okt, $nov, $des)
        {
            $data = $this->pdo->prepare('INSERT INTO produksi (jan,feb,mar,apr,mei,jun,jul,agu,sep,okt,nov,des,id_kecamatan,id_komoditi) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
            
            $data->bindParam(1, $jan);
            $data->bindParam(2, $feb);
            $data->bindParam(3, $mar);
            $data->bindParam(4, $apr);
            $data->bindParam(5, $mei);
            $data->bindParam(6, $jun);
            $data->bindParam(7, $jul);
            $data->bindParam(8, $agu);
            $data->bindParam(9, $sep);
            $data->bindParam(10, $okt);
            $data->bindParam(11, $nov);
            $data->bindParam(12, $des);
            $data->bindParam(13, $id_kecamatan);
            $data->bindParam(14, $id_komoditi);
     
            $data->execute();
            return $data->rowCount();
        }
    }
?>