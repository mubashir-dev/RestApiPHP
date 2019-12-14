<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

//File Include
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
if($student->create())
{
   echo json_encode(array("message"=>"Recored Successfully Created"));
}
else
{
    echo json_encode(array("message"=>"Failed To Create Recored"));
   
}

?>