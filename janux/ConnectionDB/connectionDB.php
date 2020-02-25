<?php
    class Database
    {
        private $hostname='localhost';
        private $username='root';
        private $pass='';
        private $dbname='mysql_ltpm';
        private  $conn=NULL;
        private  $result=NULL;
        

        public function connect() 
        {
           $this->conn=new mysqli($this->hostname,$this->username,$this->pass,$this->dbname);
            if(!$this->conn)
            {
                echo "Kết nối thất bại";
                exit();
            }
            else
            {
                mysqli_set_charset($this->conn,'utf8');
            }
            return $this->conn;
        }


        /*
        public static function getInstance() {
        if (!isset(self::$conn)) {
            try {
            self::$conn = new PDO('mysql:host=localhost;dbname=mysql_ltpm', 'root', '');
            echo "Kết nối  thành công!";

            self::$conn->exec("SET NAMES 'utf8'");
            } catch (PDOException $ex) {

            echo "Kết nối thất bại!";

            die($ex->getMessage());
            
            }
        }
        return self::$conn;
        }*/

        
        public function execute($sql)
        {
            $this->result=$this->conn->query($sql);
            return $this->result;
        }

        public function getData()
        {
            if($this->result)
            {
                $data=mysqli_fetch_array($this->result);
            }
            else
            {
                $data=0;
            }
            return $data;
        }

        public function getAllData($table)
        {
            $sql="SELECT * FROM $table";
            $this->execute($sql);
            if($this->num_rows()==0)
            {
                $data=0;
            }
            else
            {
                while($datas=$this->getData())
                {
                    $data[]=$datas;
                } 
            }
            return $data;
        }

        public function getAllDataFind($sql)
        {
           
            $this->execute($sql);
            if($this->num_rows()==0)
            {
                $data=0;
            }
            else
            {
                while($datas=$this->getData())
                {
                    $data[]=$datas;
                } 
            }
            return $data;
        }

        public function num_rows()
        {
            if($this->result)
            {
                $num=mysqli_num_rows($this->result);
            }
            else
            {
                $num=0;
            }
            return $num;
        }

        public function InsertData($MaDe,$MaHP,$MaKhoaThi,$CauSo,$NDCauHoi,$A,$B,$C,$D,$DapAn)
        {
            $sql="INSERT INTO cauhoi(MaDe,MaHP,MaKhoaThi,CauSo,NDCauHoi,A,B,C,D,DapAn) VALUES ($MaDe,$MaHP,$MaKhoaThi,$CauSo,$NDCauHoi,$A,$B,$C,$D,$DapAn)";
            return $this->execute($sql);
        }
    }
?>