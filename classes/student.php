<?php
class Student
{
//Database Parameters
private $conn;
private $db_table="Student";
//Class Properties
public $name;
public $father_name;
public $gender;
public $address;
public $student_id;


public function __construct($db)
{
$this->conn=$db;
}

//Read Method

public function read()
{
    $query="SELECT *FROM ".$this->db_table;
    $stmt=$this->conn->prepare($query);
    $stmt->execute();
    return $stmt;

}

//Single Student

public function read_single()
{
    $query="SELECT *FROM " .$this->db_table. " WHERE student_id = ?";
    $stmt=$this->conn->prepare($query);
    $stmt->bindParam(1,$this->student_id);
    $stmt->execute();
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    $this->student_id=$row["student_id"];
    $this->name=$row["name"];
    $this->father_name=$row["father_name"];
    $this->gender=$row["gender"];
    $this->address=$row["address"];
}

//Create 

public function create()
{
    $query="INSERT INTO " .$this->db_table. "(name,father_name,gender,address) VALUES(?,?,?,?)";
    $stmt=$this->conn->prepare($query);
    //Clean Data
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->father_name=htmlspecialchars(strip_tags($this->father_name));
    $this->gender=htmlspecialchars(strip_tags($this->gender));
    $this->address=htmlspecialchars(strip_tags($this->address));
    //Query Parameters
    $stmt->bindParam(1,$this->name);
    $stmt->bindParam(2,$this->father_name);
    $stmt->bindParam(3,$this->gender);
    $stmt->bindParam(4,$this->address);
    //Execute Query
    if($stmt->execute())
    {
        return true;
    }
    else
    {
        printf("Error: %s.\n", $stmt->error);
        return false;
    }
}

//Update 

public function update()
{
    $query="UPDATE " .$this->db_table. 
    "SET name=:name,father_name=:father_name,gender=:gender,address=:address
    WHERE student_id=:student_id";
    $stmt=$this->conn->prepare($query);
    //Clean Data
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->father_name=htmlspecialchars(strip_tags($this->father_name));
    $this->gender=htmlspecialchars(strip_tags($this->gender));
    $this->address=htmlspecialchars(strip_tags($this->address));
    $this->student_id=htmlspecialchars(strip_tags($this->student_id));
    //Query Parameters
    $stmt->bindParam(":name",$this->name);
    $stmt->bindParam(":father_name",$this->father_name);
    $stmt->bindParam(":gender",$this->gender);
    $stmt->bindParam(":address",$this->address);
    $stmt->bindParam(":student_id",$this->student_id);
    //Execute Query
    if($stmt->execute())
    {
        return true;
    }
    else
    {
        printf("Error: %s.\n", $stmt->error);
        return false;
    }
}


//Delete

public function delete()
{
    $query="DELETE FROM " .$this->db_table. " WHERE student_id = ?";
    $stmt=$this->conn->prepare($query);
    //Clean Data
    $this->student_id=htmlspecialchars(strip_tags($this->student_id));
    //Query Parameters
    $stmt->bindParam(1,$this->student_id);
    if($stmt->execute())
    {
        return true;
    }
    else
    {
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

}
}

