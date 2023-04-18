<?php

use PHPMailer\PHPMailer\SMTP;

include_once("./data/connection.php");
// session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './phpmailer/src/Exception.php';
require './phpmailer/src/PHPMailer.php';
require './phpmailer/src/SMTP.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Feedback Create</title>
  <link rel="stylesheet" href="../css/feedbackCreate.css" />
  <link rel="stylesheet" href="../css/profile.css" />
  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
</head>

<body>
  <div class="fb-create-container">
    <form action="" method="POST" enctype="multipart/form-data" class="fb-create-form">
      <div class="fb-content-input">
        <div class="fb-content-label">
          <p class="fb-create-tittle">Feedback Create</p>
        </div>
        <div class="wrapper-textarea">
          <label for="" class="checkbox-label-post">
            <input type="checkbox" class="check-box-terms" name="fbCrea_SaveContent" id="fbCrea_SaveContent" />
            <p class="terms-check">Recently entered content</p>
          </label>
          <textarea class="textarea-feedback-content" name="fbCrea_contentFeedback" required id="contentFeedback" cols="30" rows="18" maxlength="10000" placeholder="Feedback Content"></textarea>
        </div>
      </div>
      <div class="fb-file-time-submit">
        <div class="select-data-to-submit">
          <div class="fb-file-input">
            <input type="file" name="fbCrea_DocsFile" id="fileInput" style="display: none" accept=".pdf" />
            <label for="fileInput" class="label-input-file" title="PDF Import">
              Document Import
            </label>
            <p id="fileInputName" style="max-width: 5vw; max-height: 2vw"></p>
          </div>
          <?php
          $fbCreaCateLists = mysqli_query($conn, "SELECT * FROM category_tb");
          ?>
          <select name="fbCrea_Category" id="" class="option-list-cate" required>
            <option value="" selected>Select Category</option>
            <?php
            while ($creaCateListRow = mysqli_fetch_array($fbCreaCateLists, MYSQLI_ASSOC)) {
            ?>
              <option value="<?php echo $creaCateListRow['category_id']; ?>">
                <?php echo $creaCateListRow['category_name']; ?>
              </option>
            <?php } ?>
          </select>

          <div class="fb-end-date">
            <p class="fb-end-date-label">Started on</p>
            <input type="date" name="fbCrea_StartDate" id="inputEndDate" class="fb-end-date-input" required />
          </div>
          <div class="fb-end-date">
            <p class="fb-end-date-label">Ended on</p>
            <input type="date" name="fbCrea_EndDate" id="inputEndDate" class="fb-end-date-input" required />
          </div>
        </div>
        <div class="submit-group">
          <label for="" class="checkbox-label-post">
            <input type="checkbox" class="check-box-terms" name="fbCrea_TypePost" />
            <p class="terms-check">Post As Anonymous</p>
          </label>
          <input type="submit" name="fbCreaSubmitBtn" class="create-fb-btn" value="Create" />
          <label for="" class="checkbox-label-post">
            <input type="checkbox" class="check-box-terms" name="fbCrea_TermsCheck" value="1" required />
            <p class="terms-check">Accepted Terms & Conditions</p>
          </label>
        </div>
      </div>

      <?php
      if (isset($_POST['fbCreaSubmitBtn'])) {
        $fbCrea_contentFeedback = $_POST['fbCrea_contentFeedback'];
        // $fbCrea_Doc = $_FILES['fbCrea_DocsFile'];
        $fbCrea_Cate = $_POST['fbCrea_Category'];
        $fbCrea_StartDate = $_POST['fbCrea_StartDate'];
        $fbCrea_EndDate = $_POST['fbCrea_EndDate'];
        $fbCrea_TypePost = isset($_POST['fbCrea_TypePost']) ? 1 : 0;
        $fbCrea_TermsCheck = isset($_POST['fbCrea_TermsCheck']) ? $_POST['fbCrea_TermsCheck'] : 0;

        if ($fbCrea_contentFeedback && $fbCrea_Cate && $fbCrea_StartDate && $fbCrea_EndDate) {

          $fbCreaStart_Date = date('Y-m-d', strtotime($fbCrea_StartDate));
          $fbCreaEnd_Date = date('Y-m-d', strtotime($fbCrea_EndDate));
          $userEmail = $_SESSION['us'];
          $getPosUserQuery = mysqli_query($conn, "SELECT position_id FROM user_tb 
                  WHERE email = '$userEmail'");
          if (!$getPosUserQuery) {
            die("Error getting position ID: " . mysqli_error($conn));
          }
          $getDepUserQuery = mysqli_query($conn, "SELECT department_id FROM user_tb 
                  WHERE email = '$userEmail'");
          if (!$getDepUserQuery) {
            die("Error getting department ID: " . mysqli_error($conn));
          }
          $getPosUser = mysqli_fetch_array($getPosUserQuery, MYSQLI_ASSOC)['position_id'];
          $getDepUser = mysqli_fetch_array($getDepUserQuery, MYSQLI_ASSOC)['department_id'];

          if (isset($_FILES['fbCrea_DocsFile']) && $_FILES['fbCrea_DocsFile']['error'] == 0) {
            $file_name = $_FILES["fbCrea_DocsFile"]["name"];
            $file_size = $_FILES["fbCrea_DocsFile"]["size"];
            $file_tmp = $_FILES["fbCrea_DocsFile"]["tmp_name"];
            $file_type = $_FILES["fbCrea_DocsFile"]["type"];

            $upload_dir = "./uploads/";
            $file_path = $upload_dir . $file_name;

            move_uploaded_file($file_tmp, $file_path);

            if ($file_size > 2000000) {
              echo '<script>alert("File is too large. Maximum size is 2MB")</script>';
              return;
            } else {
              $insertFbCrea = "INSERT INTO feedback_tb (email, feedback_content, document, category_id, started_date, ended_date, post_state, position_id, department_id) VALUES ('$userEmail', '$fbCrea_contentFeedback', '$file_path', '$fbCrea_Cate', '$fbCreaStart_Date', '$fbCreaEnd_Date', '$fbCrea_TypePost', '$getPosUser', '$getDepUser')";

              if (mysqli_query($conn, $insertFbCrea)) {
                echo '<script>alert("Feedback Created")</script>';
                echo '<meta http-equiv="refresh" content="0;URL=?page=create"/>';
              } else {
                $error_message = mysqli_error($conn);
                echo '<script>alert("Error creating feedback: ' . $error_message . '")</script>';
              }
            }
          } else {
            // echo '<script>confirm("No document or error! Do you want to post this feedback the without this document file?")</script>';
            $insertFbCrea = mysqli_query($conn, "INSERT INTO feedback_tb (email, feedback_content, category_id, started_date, ended_date, post_state, position_id, department_id) VALUES ('$userEmail', '$fbCrea_contentFeedback', '$fbCrea_Cate', '$fbCreaStart_Date', '$fbCreaEnd_Date', '$fbCrea_TypePost', '$getPosUser', '$getDepUser')");




            if ($insertFbCrea) {

              $userEmail = $_SESSION['us'];
              $userMailName = $_SESSION['fu'];
              $subjectStr = 'Employee feedback posted';
              $strNotify = 'Employee ' . $userMailName . ' has sent feedback to the system';
              $fbCrea_contentFeedback;

              try {
                $mail = new PHPMailer(true);

                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'fb.uni.azdash.smith@gmail.com';
                $mail->Password = 'xrdbkcdrgbfyuowc';
                $mail->SMTPSecure = 'tsl';
                $mail->Port = 587;



                $mail->setFrom('fb.uni.azdash.smith@gmail.com');

                $mail->addAddress('fb.uni.stank.depart@gmail.com');

                $mail->isHTML(true);

                $mail->Subject = $subjectStr;

                $mail->Body = $strNotify;

                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

                $mail->send();
              } catch (Exception $e) {
                echo '<script>alert("Feedback is not sending mail' . $e . '")</script>';
              }

              date_default_timezone_set('Asia/Ho_Chi_Minh');
              $timeNotify = date("Y-m-d H:i:s");
              $notifyStatus = "Received";

              $insertNotify = mysqli_query($conn, "INSERT INTO notification_tb (email, notify_desc, notify_time, notify_status) VALUES ('$userEmail', '$strNotify', '$timeNotify', '$notifyStatus')");
              echo '<script>alert("Feedback Posted"); document.location.href="index.php"</script>';
            } else {
              echo '<script>alert("Post Failed")</script>';
            }
          }
        } else {
          echo '<script>alert("Please Enter Fields")</script>';
        }
      }
      ?>
    </form>
  </div>
</body>

</html>