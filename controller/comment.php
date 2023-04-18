<?php
include_once("../data/connection.php");
session_start();



if (isset($_POST['cmtId'])) {

    $id = $_POST['cmtId'];
    $user = $_SESSION['us'];

    echo '<script>console.log("--' . $id . '")</script>';


    $showCommentQuery = "SELECT * FROM comment_tb
    WHERE feedback_id = '$id'";

    if ($showCommentQuery) {
        $showCommentRes = mysqli_query($conn, $showCommentQuery);

        while ($commentRow = mysqli_fetch_array($showCommentRes, MYSQLI_ASSOC)) {
            $state = $commentRow['state_code'];
            $userEmailCmt = $commentRow['email'];

            $userCmt = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user_tb WHERE email = '$userEmailCmt'"));

            if ($state == 0) {
                $src = $userCmt['avatar'];
                if (!$src) {
                    $src = "./image/defaultUser.png";
                }
            }
            if ($state == 1) {
                $src = "./image/Anonymous.png";
            }

            $rowCmt = '<div class="comment-row">
            <div class="cmt-avt">
                <img src="' . $src . '" alt="Avatar" class="avt-comment" />
            </div>
            <div class="cmt-content">
                <pre class="cmt-text">' . $commentRow['comment_content'] . '</pre>
            </div>
        </div>';
            echo $rowCmt;
        }
    }
}
