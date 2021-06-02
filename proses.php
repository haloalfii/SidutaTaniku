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

        public function GetAllLuasTanamExcel(){
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT * FROM luas_tanam INNER JOIN kecamatan ON luas_tanam.id_kecamatan = kecamatan.id_kecamatan JOIN komoditi ON komoditi.id_komoditi = luas_tanam.id_komoditi";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }

        public function GetAllLuasPanenExcel(){
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT * FROM luas_panen INNER JOIN kecamatan ON luas_panen.id_kecamatan = kecamatan.id_kecamatan JOIN komoditi ON komoditi.id_komoditi = luas_panen.id_komoditi";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }

        public function GetAllProduksiExcel(){
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT * FROM produksi INNER JOIN kecamatan ON produksi.id_kecamatan = kecamatan.id_kecamatan JOIN komoditi ON komoditi.id_komoditi = produksi.id_komoditi";
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

        // LUAS TANAM START
        
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

        public function GetLuasTanamKecamatan($id_tanam)
        {
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $this->pdo->prepare("SELECT * FROM luas_tanam INNER JOIN kecamatan JOIN komoditi where id_tanam=?");
            $query->bindParam(1, $id_tanam);
            $query->execute();
            return $query->fetch();
        }

        public function GetLuasPanenKecamatan($id_panen)
        {
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $this->pdo->prepare("SELECT * FROM luas_panen INNER JOIN kecamatan JOIN komoditi where id_panen=?");
            $query->bindParam(1, $id_panen);
            $query->execute();
            return $query->fetch();
        }

        public function GetProduksi($id_produksi)
        {
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $this->pdo->prepare("SELECT * FROM produksi INNER JOIN kecamatan JOIN komoditi where id_produksi=?");
            $query->bindParam(1, $id_produksi);
            $query->execute();
            return $query->fetch();
        }

        public function UpdateLuasTanamKecamatan($id_tanam, $id_kecamatan, $id_komoditi, $jan, $feb, $mar, $apr, $mei, $jun, $jul, $agu, $sep, $okt, $nov, $des)
        {
            $query = $this->pdo->prepare('UPDATE luas_tanam set jan=?,feb=?,mar=?,apr=?,mei=?,jun=?,jul=?,agu=?,sep=?,okt=?,nov=?,des=?,id_kecamatan=?,id_komoditi=? WHERE id_tanam=?');

            $query->bindParam(1, $jan);
            $query->bindParam(2, $feb);
            $query->bindParam(3, $mar);
            $query->bindParam(4, $apr);
            $query->bindParam(5, $mei);
            $query->bindParam(6, $jun);
            $query->bindParam(7, $jul);
            $query->bindParam(8, $agu);
            $query->bindParam(9, $sep);
            $query->bindParam(10, $okt);
            $query->bindParam(11, $nov);
            $query->bindParam(12, $des);
            $query->bindParam(13, $id_kecamatan);
            $query->bindParam(14, $id_komoditi);
            $query->bindParam(15, $id_tanam);

            $query->execute();
            return $query->rowCount();
        }

        public function UpdateLuasPanenKecamatan($id_panen, $id_kecamatan, $id_komoditi, $jan, $feb, $mar, $apr, $mei, $jun, $jul, $agu, $sep, $okt, $nov, $des)
        {
            $query = $this->pdo->prepare('UPDATE luas_panen set jan=?,feb=?,mar=?,apr=?,mei=?,jun=?,jul=?,agu=?,sep=?,okt=?,nov=?,des=?,id_kecamatan=?,id_komoditi=? WHERE id_panen=?');

            $query->bindParam(1, $jan);
            $query->bindParam(2, $feb);
            $query->bindParam(3, $mar);
            $query->bindParam(4, $apr);
            $query->bindParam(5, $mei);
            $query->bindParam(6, $jun);
            $query->bindParam(7, $jul);
            $query->bindParam(8, $agu);
            $query->bindParam(9, $sep);
            $query->bindParam(10, $okt);
            $query->bindParam(11, $nov);
            $query->bindParam(12, $des);
            $query->bindParam(13, $id_kecamatan);
            $query->bindParam(14, $id_komoditi);
            $query->bindParam(15, $id_panen);

            $query->execute();
            return $query->rowCount();
        }

        public function UpdateProduksi($id_produksi, $id_kecamatan, $id_komoditi, $jan, $feb, $mar, $apr, $mei, $jun, $jul, $agu, $sep, $okt, $nov, $des)
        {
            $query = $this->pdo->prepare('UPDATE produksi set jan=?,feb=?,mar=?,apr=?,mei=?,jun=?,jul=?,agu=?,sep=?,okt=?,nov=?,des=?,id_kecamatan=?,id_komoditi=? WHERE id_produksi=?');

            $query->bindParam(1, $jan);
            $query->bindParam(2, $feb);
            $query->bindParam(3, $mar);
            $query->bindParam(4, $apr);
            $query->bindParam(5, $mei);
            $query->bindParam(6, $jun);
            $query->bindParam(7, $jul);
            $query->bindParam(8, $agu);
            $query->bindParam(9, $sep);
            $query->bindParam(10, $okt);
            $query->bindParam(11, $nov);
            $query->bindParam(12, $des);
            $query->bindParam(13, $id_kecamatan);
            $query->bindParam(14, $id_komoditi);
            $query->bindParam(15, $id_produksi);

            $query->execute();
            return $query->rowCount();
        }


        public function DelLuasTanam($id_tanam){
            $query = $this -> pdo -> prepare('DELETE FROM luas_tanam WHERE id_tanam=?');
            $query-> bindParam(1, $id_tanam);

            $query->execute();
            return $query->rowCount();
        }

        public function DelLuasPanen($id_panen){
            $query = $this -> pdo -> prepare('DELETE FROM produksi WHERE id_panen=?');
            $query-> bindParam(1, $id_panen);

            $query->execute();
            return $query->rowCount();
        }

        public function DelProduksi($id_produksi){
            $query = $this -> pdo -> prepare('DELETE FROM produksi WHERE id_produksi=?');
            $query-> bindParam(1, $id_produksi);

            $query->execute();
            return $query->rowCount();
        }

        // LUAS TANAM END

        public function GetAllLuasPanen($jenis){
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT * FROM luas_panen INNER JOIN kecamatan ON luas_panen.id_kecamatan = kecamatan.id_kecamatan JOIN komoditi ON komoditi.id_komoditi = luas_panen.id_komoditi
            WHERE komoditi.jenis = '".$jenis."'";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }

        public function GetAllProduksi($jenis){
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT * FROM produksi INNER JOIN kecamatan ON produksi.id_kecamatan = kecamatan.id_kecamatan JOIN komoditi ON komoditi.id_komoditi = produksi.id_komoditi
            WHERE komoditi.jenis = '".$jenis."'";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }


        public function GetAllLuasPanenKecamatan($jenis, $kecamatan){
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT * FROM luas_panen INNER JOIN kecamatan ON luas_panen.id_kecamatan = kecamatan.id_kecamatan JOIN komoditi ON komoditi.id_komoditi = luas_panen.id_komoditi
            WHERE komoditi.jenis = '".$jenis."' AND kecamatan.nama_kecamatan = '".$kecamatan."'";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }

        public function GetAllProduksiKecamatan($jenis, $kecamatan){
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT * FROM produksi INNER JOIN kecamatan ON produksi.id_kecamatan = kecamatan.id_kecamatan JOIN komoditi ON komoditi.id_komoditi = produksi.id_komoditi
            WHERE komoditi.jenis = '".$jenis."' AND kecamatan.nama_kecamatan = '".$kecamatan."'";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }
        

        public function AddDataProduksi($id_kecamatan, $id_komoditi, $jan, $feb, $mar, $apr, $mei, $jun, $jul, $agu, $sep, $okt, $nov, $des)
        {
            $data = $this->pdo->prepare("INSERT INTO produksi (jan,feb,mar,apr,mei,jun,jul,agu,sep,okt,nov,des,id_kecamatan,id_komoditi) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
            ON DUPLICATE KEY UPDATE jan = VALUES(jan), feb = VALUES(feb), mar = VALUES(mar), apr = VALUES(apr), mei = VALUES(mei), jun = VALUES(jun), jul = VALUES(jul)
            , agu = VALUES(agu), sep = VALUES(sep), okt = VALUES(okt), nov = VALUES(nov), des = VALUES(des)
            , id_kecamatan = VALUES(id_kecamatan), id_komoditi = VALUES(id_komoditi)");
            
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

        public function AddDataLuasTanam($id_kecamatan, $id_komoditi, $jan, $feb, $mar, $apr, $mei, $jun, $jul, $agu, $sep, $okt, $nov, $des)
        {
            $data = $this->pdo->prepare("INSERT INTO luas_tanam (jan,feb,mar,apr,mei,jun,jul,agu,sep,okt,nov,des,id_kecamatan,id_komoditi) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
            ON DUPLICATE KEY UPDATE jan = VALUES(jan), feb = VALUES(feb), mar = VALUES(mar), apr = VALUES(apr), mei = VALUES(mei), jun = VALUES(jun), jul = VALUES(jul)
            , agu = VALUES(agu), sep = VALUES(sep), okt = VALUES(okt), nov = VALUES(nov), des = VALUES(des)
            , id_kecamatan = VALUES(id_kecamatan), id_komoditi = VALUES(id_komoditi)");
            
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

        public function AddDataLuasPanen($id_kecamatan, $id_komoditi, $jan, $feb, $mar, $apr, $mei, $jun, $jul, $agu, $sep, $okt, $nov, $des)
        {
            $data = $this->pdo->prepare("INSERT INTO luas_panen (jan,feb,mar,apr,mei,jun,jul,agu,sep,okt,nov,des,id_kecamatan,id_komoditi) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
            ON DUPLICATE KEY UPDATE jan = VALUES(jan), feb = VALUES(feb), mar = VALUES(mar), apr = VALUES(apr), mei = VALUES(mei), jun = VALUES(jun), jul = VALUES(jul)
            , agu = VALUES(agu), sep = VALUES(sep), okt = VALUES(okt), nov = VALUES(nov), des = VALUES(des)
            , id_kecamatan = VALUES(id_kecamatan), id_komoditi = VALUES(id_komoditi)");
            
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

        // public function GetTotalLuasTanam($jenis){
        //     $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //     $query = "SELECT sum(jan) FROM luas_tanam
        //     INNER JOIN kecamatan ON luas_tanam.id_kecamatan = kecamatan.id_kecamatan JOIN komoditi ON komoditi.id_komoditi = luas_tanam.id_komoditi
        //     WHERE komoditi.jenis = '".$jenis."'";
        //     $stmt = $this->pdo->prepare($query);
        //     $stmt->execute();
        //     $result = $stmt->fetchAll();
        //     return $result;
        // }

        // public function GetTotalLuasTanamKecamatan($jenis, $kecamatan){
        //     $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //     $query = "SELECT sum(jan) FROM luas_tanam
        //     INNER JOIN kecamatan ON luas_tanam.id_kecamatan = kecamatan.id_kecamatan JOIN komoditi ON komoditi.id_komoditi = luas_tanam.id_komoditi
        //     WHERE komoditi.jenis = '".$jenis."' AND kecamatan.nama_kecamatan = '".$kecamatan."'";
        //     $stmt = $this->pdo->prepare($query);
        //     $stmt->execute();
        //     $result = $stmt->fetchAll();
        //     return $result;
        // }
    }
?>