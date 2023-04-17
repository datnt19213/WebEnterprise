<?php
session_start();
include_once("../data/connection.php");

if (isset($_POST['type'])) {
    $type = $_POST['type'];
    $likeId = $_POST['likeId'];
    $user = $_SESSION["us"];

    $id = intval($likeId);

    $isLike = 1;
    $isNotLike = 0;

    // echo $type && $likeId ? '<script>console.log("' . $type . '|' . $likeId . '")</script>' : '<script>console.log("No data")</script>';

    $contactQuery = "SELECT * FROM contact_tb 
WHERE contact_tb.feedback_id = '$likeId' AND contact_tb.email = '$user'";

    $contactVal = mysqli_fetch_array(mysqli_query($conn, $contactQuery));

    if ($contactVal) {
        echo '<script>alert("Got data")</script>';
        $updateContact = mysqli_query($conn, "UPDATE contact_tb SET `like` = '$isLike', `dislike` = '$isNotLike' WHERE feedback_id = '$id' AND email = '$user'");
        if (!$updateContact) {
            echo '<script>alert("Like Failed")</script>';
        }
    } else {
        // echo '<script>alert("No data ' . $user . '")</script>';
        $contactAdd = mysqli_query($conn, "INSERT INTO contact_tb (email, feedback_id, `like`, `dislike`) VALUES ('$user', $id, $isLike, $isNotLike)");
        // echo $contactAdd ? '<script>alert("' . $contactAdd . '")</script>' : '<script>alert("Not Like")</script>';
        // echo '<script>alert("' . mysqli_error($conn) . '")</script>';
        if (!$contactAdd) {
            echo '<script>alert("Like Failed")</script>';
        }
    }

    // $likeCountQuery = "SELECT SUM(`like`) AS likeCount FROM contact_tb WHERE feedback_id = $id";
    // $dislikeCountQuery = "SELECT  SUM(`dislike`) AS dislikeCount FROM contact_tb WHERE feedback_id = $id";

    // $likeCountRes = mysqli_fetch_assoc(mysqli_query($conn, $likeCountQuery));
    // $dislikeCountRes = mysqli_fetch_assoc(mysqli_query($conn, $dislikeCountQuery));

    // $counts = array(
    //     "likeCount" => $likeCountRes['likeCount'],
    //     "dislikeCount" => $dislikeCountRes['dislikeCount']
    // );
}
