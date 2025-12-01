<?php
    class DatabaseHelper {
        private $db;

        public function __construct($servername, $username, $password, $dbname, $port) {
            $this->db = new mysqli($servername, $username, $password, $dbname, $port);
            if ($this->db->connect_error) {
                die("Connection failed: " .$this->db->connect_error);
            }
        }

        public function getSetList() {
            $stmt = $this->db->prepare("SELECT DISTINCT(insieme) FROM insiemi");
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getValuesBySet($insieme) {
            $stmt = $this->db->prepare("SELECT valore FROM insiemi WHERE insieme = ?");
            $stmt->bind_param('i', $insieme);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function insertNewValueInSet($valore, $insieme) {
           $stmt =  $this->db->prepare("INSERT INTO insiemi(valore, insieme) VALUES (?, ?)");
           $stmt->bind_param('ii', $valore, $insieme);

           return $stmt->execute();
        }

    }

    $dbh = new DatabaseHelper("localhost", "root", "", "giugno", "3306");
    $sets = array_column($dbh->getSetList(), "insieme");
    $newSetNumber = max($sets) + 1;
    $a = 0;
    $b = 0;
    $o = 0;
    $resultArray = [];
    
    if (isset($_GET["A"], $_GET["B"], $_GET["O"])) {
        $a = $_GET["A"];
        $b = $_GET["B"];
        $o = $_GET["O"];
    }

    if (in_array($a, $sets) && in_array($b, $sets)) {
        $arrayA = array_column($dbh->getValuesBySet($a), "valore");
        $arrayB = array_column($dbh->getValuesBySet($b), "valore");
        if ($o === 'u') {
            $resultArray = array_unique(array_merge($arrayA, $arrayB));  
        } elseif ($o === 'i') {
            $resultArray = array_intersect($arrayA, $arrayB);
        }
    }

    foreach ($resultArray as $value) {
        $dbh->insertNewValueInSet($value, $newSetNumber);
    }        

?>