<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
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
$student->student_id=$data->student_id;
//Update Method Call
if($student->delete())
{
   echo json_encode(array("message"=>"Recored Successfully Deleted"));
}
else
{
    echo json_encode(array("message"=>"Failed To Delete Recored"));
   
}

?>