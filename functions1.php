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
        public function add($data=null, $table=null) {
            $field_array1 = array_keys($data);    
            $field_array  = implode(',' , $field_array1);
            $data_array1 = array_values($data);
            $data_array =  implode(',' , $data_array1); 
            //return $data_array;
            try {
                $add_sql= "INSERT INTO $table ($field_array) VALUES ($data_array)";
                $stmt= $this->dbh->prepare($add_sql);
                $stmt->execute();
                $result = 'inserted';
                }
                catch(PDOException $e)
                {
                    $result = "Error!: " . $e->getMessage() . "<br />";
                }  
                //$result = $stmt->fetchAll();
                return $result;
        }
    }

    // $data = array(
    //     "name" => "99",
    //     "email" => "88",
    //     "password" => "66"
    // );
    // $table = "users";

    // if(isset($_POST['submit']))
    //     {  $data = array(
    //              "name" => "99",
    //              "email" => "88",
    //              "password" => "66"
    //          );
    //          $table = "users";
    //         $dbObj = new dao();
    //         echo $dbObj->add($data, $table);
    //     }

 
 if(isset($_POST['submit']))
  { $data = array(
    "name" => $_POST[name], 
    "email" => $_POST[email], 
    "password" => $_POST[password]
    );  
    $table="users";
    //print_r($data);
    $dbObj = new dao();
   echo  $dbObj->add($data, $table);
  } 
?>