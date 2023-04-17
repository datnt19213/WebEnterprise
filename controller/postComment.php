<?php
include_once("../data/connection.php");
session_start();

if (isset($_POST['postId'], $_POST['state'], $_POST['content'])) {
    $idPost = $_POST['postId'];
    $statePost = $_POST['state'];
    $contentPost = $_POST['content'];
    $user = $_SESSION['us'];

    $postComment = mysqli_query($conn, "INSERT INTO comment_tb (comment_content, email, feedback_id, state_code) 
    VALUES ('$contentPost','$user','$idPost','$statePost')");

    if (!$postComment) {
        echo '<script>alert("Sent Failed")</script>';
    }
} else {
    echo '<script>alert("Sent Failed")</script>';
}
