<?php
require_once 'conn.php';

if (isset($_POST['import'])) {
    $filename = $_FILES["excel"]["name"];
    $fileExtension = explode('.', $filename);
    $fileExtension = strtolower(end($fileExtension));

    $newFileName = date("Y.m.d") . "-" . date("h.i.sa") . "." . $fileExtension;
    $target_directory = "./uploadedfiles/" . $newFileName;


    move_uploaded_file($_FILES["excel"]["tmp_name"], $target_directory);
    error_reporting(0);
    ini_set('display_error', 0);

    require "./excelReader-main/excel_reader2.php";
    require "./excelReader-main/SpreadsheetReader.php";

    $reader = new SpreadsheetReader($target_directory);
    foreach ($reader as $key => $row) {
        $studno = $row[1];
        $snHash = md5($row[1]);
        $firstname = $row[2];
        $lastname = $row[3];
        $gender = $row[4];
        $department = $row[5];
        $course = $row[6];
        $major = $row[7];
        $year = $row[8];
        $status = $row[9];
        $cabinet = $row[10];
        mysqli_query($conn, "INSERT INTO `student`(`stud_no`, `firstname`, `lastname`, `gender`, `department`, `course`, `major`, `year`, `status`, `cabinet` , `password`) 
        VALUES ('$studno',' $firstname ',' $lastname','$gender','$department',' $course','$major',' $year','$status','$cabinet', '$snHash')");
        header("location: student.php");
    }
}
