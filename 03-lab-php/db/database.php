<?php
    class DatabaseHelper{
        private $db;

        public function __construct($servername, $username, $password, $dbname, $port){
            $this->db = new mysqli($servername, $username, $password, $dbname, $port);
            if($this->db->connect_error){
                die("Connessione al db fallita.");
            }
        }

        public function getRandomPosts($n=2){
            $stmt = $this->db->prepare("SELECT idarticolo, titoloarticolo, imgarticolo FROM articolo ORDER BY RAND() LIMIT ?");
            $stmt->bind_param("i", $n);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getCategories(){
            $stmt = $this->db->prepare("SELECT idcategoria, nomecategoria FROM categoria");
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getPosts($n=-1){
            $query = "SELECT idarticolo, titoloarticolo, anteprimaarticolo, imgarticolo, dataarticolo, nome FROM articolo, autore WHERE autore=idautore ORDER BY dataarticolo DESC";
            if($n>0){
                $query .= " LIMIT ?";
            }
            $stmt = $this->db->prepare($query);
            if($n>0){
                $stmt->bind_param("i", $n);
            }
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getAutors(){
            $stmt = $this->db->prepare("SELECT nome, username, GROUP_CONCAT(DISTINCT nomeCategoria SEPARATOR ', ') AS nomeCategoria FROM autore, articolo, articolo_ha_categoria, categoria WHERE idautore=autore AND idarticolo=articolo AND idcategoria=categoria GROUP BY nome, username");
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }   

    }
?>