<?php


    class dbClass{


        private $dbhost = "127.0.0.1";
        private $dbuser = 'root';
        private $dbpass = '';
        private $dbname = 'crud';

        private $conn;

        public $dbErrors = array();
        public $stmt;


        public function __construct(){
            $dsn = "mysql:host=$this->dbhost;dbname=$this->dbname;";

            $options = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            try{
                $this->conn = new PDO($dsn, $this->dbuser, $this->dbpass, $options);
            }catch (PDOException $e){
                $this->dbErrors[] = $e->getMessage();
            }

        }

        public function query($query){
            $this->stmt = $this->conn->prepare($query);
        }

        public function execute($arr = array()){
            return $this->stmt->execute($arr);
        }

        public function input($text){
            $this->query("INSERT INTO texts (text) VALUES(:text)");
            $this->execute(array('text' => $text));
        }

        public function output(){
            $this->query("SELECT * FROM texts");
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update($text, $id){
            $this->query("UPDATE texts SET text = :text WHERE id = :id");
            $this->execute(array('text' => $text, 'id' => $id));
        }

        public function delete($id){
            $this->query("DELETE FROM texts WHERE id = :id");
            $this->execute(array('id' => $id));
        }




    }