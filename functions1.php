<?php

class dao {

        public function __construct() {

            try {
                $dbh = new PDO("mysql:host=localhost;dbname=project", 'root', '');
            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br />";
                die();
            }

            $this->dbh = $dbh;

        }

        public function getCities() {
                $stmt= $this->dbh->prepare("INSERT INTO users ( name, email, password) VALUES (1, 2, 3)");
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $result;
                }
}

$dbObj = new dao();
$cities = $dbObj->getCities();

?>