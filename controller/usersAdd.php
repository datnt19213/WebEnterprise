<?php 
include_once("../data/connection.php");

$uMail = $_POST['mail'];
$uPass = $_POST['pass'];
$uName = $_POST['name'];
$uDob =  $_POST['dob'];
$uPos =  $_POST['pos'];
$uDep =  $_POST['dep'];
$uRole = $_POST['role'];


$pos = intval($uPos);
$dep = intval($uDep);
$role = intval($uRole);

// $positionCheckQuery = "SELECT position_id FROM position_tb WHERE position_id = '$uPos'";
// $positionCheckResult = mysqli_query($conn, $positionCheckQuery);

// if($positionCheckResult){
//   echo '<script>alert("Got ID")</script>';
// }else{
//   echo '<script>alert("No ID")</script>';

// }

// echo 'alert("'.$uPos.'")';
// echo 'alert("'.$uDep.'")';

if(!$uMail && !$uPass && !$uName && !$uDob && !$uPos && !$uDep && !$uRole){
    echo '<script>alert("Some data lost '.$uMail.' - '.$uPass.' - '.$uName.' - '.$uDob.' - '.$uPos.' - '.$uDep.' - '.$uRole.'")</script>';
} else{

$pa = md5($uPass);
$dob = date("Y-m-d", strtotime($uDob));

$insertUserQuery = mysqli_query($conn, "INSERT INTO user_tb (email, password, fullname, dob, tel, position_id, address, department_id, avatar, description, state_code) VALUES ('$uMail', '$pa', '$uName', '$dob', NULL, '$pos', NULL, '$dep', NULL, NULL, '$role')");

        if ($insertUserQuery) {
          echo '<script>alert("User added successfully")</script>';
        } else {
          echo '<script>alert("Error Add User")</script>';
          echo '<script>alert("'.mysqli_error($conn).'")</script>';
        }
    }

?>