<?php /**
*
Exp:Connect to database in oop style
@params host dbname username password
*/
class Connect  
{
    //private only available forthe current class
    private $host=null;
    private $dbname = null;
    private $username = null;
    private $password = null;
        function __construct($host,$dbname,$username,$password)
        {
            $this->host = $host;
            $this->dbname = $dbname;
            $this->username = $username;
            $this->password = $password;
            $host = "localhost";
            $dbname = "project";
            $username = "root";
            $password = "";
        }
        
        function connect(){
        try {
        $conn = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->username, $this->password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
        echo 'Unable to connect';
        }
        }
} 
$con = new Connect();
$con->connect();
?>