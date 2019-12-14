<?php
    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    
    //File Include
    include_once"../../config/config.php";
    include_once"../../classes/student.php";
    
    //Database
    $datbase=new Database();
    $db=$datbase->connect();
    //Class Objects
    $student=new Student($db);

    $student->student_id=isset($_GET["id"]) ? $_GET["id"]:die();
    $result=$student->read_single();
    $student_data=array(
        'id' => $student->student_id,
        'name' => $student->name,
        'father_name' => $student->father_name,
        'gender' => $student->gender,
        'address' => $student->address
    );
    echo json_encode($student_data);
   // print_r(json_encode($student_data));
    
?>