<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');


include_once"../../config/config.php";
include_once"../../classes/student.php";

$datbase=new Database();
$db=$datbase->connect();

$student=new Student($db);
$result=$student->read();
$rows=$result->rowCount();
if($rows > 0)
{
    $student_arr=array();
    $student_arr["data"]=array();
    while($row=$result->fetch(PDO::FETCH_ASSOC))
    { 
        extract($row);
        $student_data=array(
            'id' => $student_id,
            'name' => $name,
            'father_name' => $father_name,
            'gender' => $gender,
            'address' => $address
        );
        array_push($student_arr["data"],$student_data);
    }
    echo json_encode($student_arr);
}
else
{
echo json_encode(array("message"=>"No Recored Found"));
}







?>