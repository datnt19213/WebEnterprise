<?php
include_once("../data/connection.php");


if (isset($_POST['fbId'])) {

    $id = $_POST['fbId'];

    sleep(1);

    $likeCountQuery = "SELECT SUM(`like`) AS likeCount FROM contact_tb WHERE feedback_id = $id";
    $dislikeCountQuery = "SELECT  SUM(`dislike`) AS dislikeCount FROM contact_tb WHERE feedback_id = $id";

    $likeCountRes = mysqli_fetch_assoc(mysqli_query($conn, $likeCountQuery));
    $dislikeCountRes = mysqli_fetch_assoc(mysqli_query($conn, $dislikeCountQuery));

    $counts = array(
        "likeCount" => $likeCountRes['likeCount'],
        "dislikeCount" => $dislikeCountRes['dislikeCount']
    );
    echo json_encode($counts);
}
