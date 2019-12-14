<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');


include_once"../../config/config.php";
include_once"../../classes/student.php";
//Database
$datbase=new Database();
$db=$datbase->connect();
//Class Object
$student=new Student($db);

//Get Raw Data
$data = json_decode(file_get_contents("php://input"));
$student->name=$data->name;
$student->father_name=$data->father_name;
$student->gender=$data->gender;
$student->address=$data->address;
$student->student_id=$data->student_id;
//Update Method Call
if($student->update())
{
   echo json_encode(array("message"=>"Recored Successfully Updated"));
}
else
{
    echo json_encode(array("message"=>"Failed To Update Recored"));
   
}

?>