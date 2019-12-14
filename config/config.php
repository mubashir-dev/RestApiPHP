<?php
class Database
{
private $host = "localhost";
private $db_name="Rest-Api";
private $db_user="root";
private $db_password="";
private $conn;
 public function connect()
 {
     $this->conn=null;
     try
     {
        $this->conn=new PDO("mysql:host=".$this->host.";dbname=".$this->db_name,$this->db_user,$this->db_password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
     catch(PDOException $E)
     {
         echo "Connection Error".$E->getMessage();
     }
     return $this->conn;
 }

}
//Data Parameters



?>