<?php 
error_reporting(0);
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
            $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db,$this->user,$this->pass);
                //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo 'Conn Successful';
            }
        catch(PDOException $e)
            {
                echo 'Unable to connect'. $e;         
            }
    }
    public function insert($field_array=null, $data_array=null, $table=null)
    {
            $field_array  = "`".implode("`,`", $field_array)."`";
	 		$data_array = "'".implode("','", $data_array)."'";
            $table = "`".$table."`";
            $sql= "insert into ".$table." (".$field_array.") values (".$data_array.")";
            try{
                $q = $this->conn->prepare($sql);
                $q->execute();
                }
            catch(PDOException $e)
                {
                    echo 'Error while inserting'.$e ;
                }
            return true;
    }      
}

$con = new basic();


$fieldData = array(
    "1" => 'email',
    "2" => 'password'
);
$postData = array(
    "email" => '99@gmail.com',
    "password" => '1001'
);
$table = 'users';


$con->connect();
$con->insert($fieldData, $postData, $table);

?>