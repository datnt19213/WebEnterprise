<?php
// session_start();
include_once("./data/connection.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Side Bar</title>
  <link rel="stylesheet" href="../css/sidebar.css" />
  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
  <script src="../js/sidebar.js"></script>
</head>

<body>
  <div class="mn-container">
    <div class="side-bar">
      <div class="show-hide-side-bar">
        <div class="hide-side-bar">
          <p>←</p>
        </div>
        <div class="show-side-bar">
          <p>→</p>
        </div>
      </div>
      <div class="menu-side-bar">
        <?php

        if (isset($_SESSION['us']) && $_SESSION['role'] == 3) {

          echo '
          <!-- admin sidebar -->
          <div class="admin-side-bar">
            <a href="./view/categoryManagementAdmin.php" class="bar-category-nav" id="ad-cate">
              <p>Category</p>
            </a>
            <a href="./view/adFeedbackManagement.php" class="bar-category-nav" id="ad-feedback">
              <p>Feedback</p>
            </a>
            <a href="./view/qaMamagementAdmin.php" class="bar-category-nav" id="ad-qa-manage">
              <p>QA Manager</p>
            </a>
            <a href="./view/qaDepartmentsAdmin.php" class="bar-category-nav" id="ad-depart">
              <p>QA Department</p>
            </a>
            <a href="./view/staff.php" class="bar-category-nav" id="ad-staff">
              <p>Staffs</p>
            </a>
          </div>
        ';
        } elseif (isset($_SESSION['us']) && $_SESSION['role'] == 2) {
          echo '

          <!-- QA Manager sidebar -->
          <div class="admin-side-bar">
            <a href="./view/overviewQAmanager.php" class="bar-category-nav" id="overview">
              <p>Overview</p>
            </a>
            <a href="./view/categoryManagementQA.php" class="bar-category-nav" id="qa-manage-cate">
              <p>Category</p>
            </a>
            <a href="./view/qaFeedbackManagement.php" class="bar-category-nav" id="qa-feedback-manage">
              <p>Feedback</p>
            </a>
            <a href="./view/qaDepartqaManager.php" class="bar-category-nav" id="qa-depart-manage">
              <p>QA Department</p>
            </a>
          </div>
        ';
        } elseif (isset($_SESSION['us']) && $_SESSION['role'] == 1) {
          echo '
          <!-- QA Department -->
          <div class="admin-side-bar">
            <a href="./view/feedbackNotify.php" class="bar-category-nav" id="depart-feedback">
              <p>Feedback Notification</p>
            </a>
            <a href="./view/staff.php" class="bar-category-nav" id="depart-staff">
              <p>Staffs</p>
            </a>
          </div>
        ';
        } else {
          echo '<script>alert("Undefinded the account! You are not as admin or manager")</script>';
          header('Location: login.php');
        }

        ?>

      </div>
    </div>
    <div class="mn-data-content" id="content-load">
      <div class="section-content">

      </div>
    </div>
  </div>
</body>

</html>