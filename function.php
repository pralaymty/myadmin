<?php 
error_reporting(E_ALL);
class basic 
{
    private $host = 'localhost';
    private $dbname = 'project';
    private $username = 'root';
    private $password = '';
    private $conn;

    public function connect()
    {
        try{
            $conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db,$this->user,$this->pass);
                //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo 'Conn Successful';
            }
        catch(PDOException $e)
            {
                echo 'Unable to connect'. $e;         
            }
    }
    public function insert($data=null, $table=null)
    // {
    //         echo $field_array;
    //         echo $data_array;
    //         echo $table;

    //         $query ="INSERT INTO $table_name ( ". implode(',' , $key) .") VALUES('". implode("','" , $value) ."')";
    // }
    {
        $field_array1 = array_keys($data);    
        $field_array  = "implode(',' , $field_array1)";

        $data_array1 = array_values($data);
	 	$data_array =  "implode(',' , $data_array1)";
            $table = "$table";
            $sql= "insert into '$table' ('$field_array') values ('$data_array')";
            try{
                $conn->prepare($sql)->execute();
                echo 'Inserted !';
                }
            catch(PDOException $e)
                {
                    echo 'Error while inserting'.$e ;
                }
            return true;
    }      
}

$con = new basic();
$con->connect();

$data = array(
    "name" => "pralay",
    "email" => "abcd123",
    "password" => "mnop"
);
$table = "users";

$con->insert($data, $table);

?>