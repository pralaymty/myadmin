<?php 
error_reporting(E_ALL);
class basic 
{
    // private $host = 'localhost';
    // private $dbname = 'project';
    // private $username = 'root';
    // private $password = '';
    //private $conn;
    // $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);

    // if($conn){
    //     echo 'Conn Successful'; 
    // }

    public function __construct() {

		try {
			$dbh = new PDO('mysql:host=localhost;dbname=project', 'root', '');
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br />";
			die();
		}

		$this->dbh = $dbh;

	}

    // public function connect()
    // {
        // try{
        //         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //         echo 'Conn Successful';
        //     }
        // catch(PDOException $e)
        //     {
        //         echo 'Unable to connect'. $e;         
        //     }
        // $dsn = 'mysql:host=localhost;dbname=project';
        // $user = 'root';
        // $pass = '';
        // return new PDO($dsn, $user, $pass);
    // }
    public function insert($data=null, $table=null)
    // {
    //         echo $field_array;
    //         echo $data_array;
    //         echo $table;

    //         $query ="INSERT INTO $table_name ( ". implode(',' , $key) .") VALUES('". implode("','" , $value) ."')";
    // }
    {
        $pdo = connect();
        $field_array1 = array_keys($data);    
        $field_array  = "implode(',' , $field_array1)";

        $data_array1 = array_values($data);
	 	$data_array =  "implode(',' , $data_array1)";
            $table = "$table";
            $sql= "insert into '$table' ('$field_array') values ('$data_array')";
            $stmt= $this->dbh->prepare($sql)->execute();
            echo 'Data Inserted !';
            return true;
    }      
}

$con = new basic();
//con->connect();

$data = array(
    "name" => "pralay",
    "email" => "abcd123",
    "password" => "mnop"
);
$table = "users";

$con->insert($data, $table);

?>