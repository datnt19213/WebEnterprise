<?php
session_start();
include_once("../data//connection.php");

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
              <a href="categoryManagementAdmin.php" class="bar-category-nav" id="ad-cate">
                <p>Category</p>
              </a>
              <a href="adFeedbackManagement.php" class="bar-category-nav" id="ad-feedback">
                <p>Feedback</p>
              </a>
              <a href="qaMamagementAdmin.php" class="bar-category-nav" id="ad-qa-manage">
                <p>QA Manager</p>
              </a>
              <a href="qaDepartmentAdmin.php" class="bar-category-nav" id="ad-depart">
                <p>QA Department</p>
              </a>
              <a href="staff.php" class="bar-category-nav" id="ad-staff">
                <p>Staffs</p>
              </a>
            </div>';
        } elseif (isset($_SESSION['us']) && $_SESSION['role'] == 2) {
          echo '
            <!-- QA Manager sidebar -->
            <div class="admin-side-bar">
              <a href="overviewQAmanager.php" class="bar-category-nav" id="overview">
                <p>Overview</p>
              </a>
              <a href="categoryManagementQA.php" class="bar-category-nav" id="qa-manage-cate">
                <p>Category</p>
              </a>
              <a href="qaFeedbackManagement.php" class="bar-category-nav" id="qa-feedback-manage">
                <p>Feedback</p>
              </a>
              <a href="qaDepartqaManager.php" class="bar-category-nav" id="qa-depart-manage">
                <p>QA Department</p>
              </a>
            </div>';
        } elseif (isset($_SESSION['us']) && $_SESSION['role'] == 1) {
          echo '
            <!-- QA Department -->
            <div class="admin-side-bar">
              <a href="" class="bar-category-nav" id="depart-feedback">
                <p>Feedback Notification</p>
              </a>
              <a href="staff.php" class="bar-category-nav" id="depart-staff">
                <p>Staffs</p>
              </a>
            </div>';
        } else {
          echo '<script>alert("Undefinded the account! You are not as admin or manager")</script>';
          header('Location: login.php');
        }

        ?>

      </div>
    </div>
    <div class="mn-data-content">
      <script>
        // jQuery(document).ready(($) => {
        //   $(".bar-category-nav").click((e) => {
        //     link = $(this).attr("href");
        //     $.ajax({
        //         url: link,
        //       })
        //       .done((html) => {
        //         $(".qa-ad-fb-mn-container").empty().append(html);
        //         $(".form-wrapper-cate").empty().append(html);
        //         $(".form-wrapper-cate").empty().append(html);
        //       })
        //       .fail(() => {
        //         console.log("Error");
        //       })
        //       .always(() => {
        //         console.log("Loaded");
        //       })
        //     return false;
        //   })
        // })
        jQuery(document).ready(() => {
          $(".ad-cate").click(() => {
            $.ajax({
              url: "./categoryManagementAdmin.php",
              async: false,
              success: () => {
                console.log("admin category");
              }
            })
          })
          $(".ad-feedback").click(() => {
            $.ajax({
              url: "./adFeedbackManagement.php",
              async: false,
              success: () => {
                console.log("admin feedback");
              }
            })
          })
          $(".ad-qa-manage").click(() => {
            $.ajax({
              url: "./qaMamagementAdmin.php",
              async: false,
              success: () => {
                console.log("admin qa manage");
              }
            })
          })
          $(".ad-depart").click(() => {
            $.ajax({
              url: "./qaDepartmentAdmin.php",
              async: false,
              success: () => {
                console.log("admin depart");
              }
            })
          })
          $(".ad-staff").click(() => {
            $.ajax({
              url: "./staff.php",
              async: false,
              success: () => {
                console.log("admin staff");
              }
            })
          })
          $(".overview").click(() => {
            $.ajax({
              url: "./overviewQAmanager.php",
              async: false,
              success: () => {
                console.log("overview");
              }
            })
          })
          $(".qa-manage-cate").click(() => {
            $.ajax({
              url: "./categoryManagementQA.php",
              async: false,
              success: () => {
                console.log("qa manage cate");
              }
            })
          })
          $(".qa-feedback-manage").click(() => {
            $.ajax({
              url: "./qaFeedbackManagement.php",
              async: false,
              success: () => {
                console.log("qa manage feedback");
              }
            })
          })
          $(".qa-depart-manage").click(() => {
            $.ajax({
              url: "./qaDepartqaManager.php",
              async: false,
              success: () => {
                console.log("qa manage depart");
              }
            })
          })
          $(".depart-feedback").click(() => {
            $.ajax({
              url: "./feedbacNotify.php",
              async: false,
              success: () => {
                console.log("depart feedback");
              }
            })
          })
          $(".depart-staff").click(() => {
            $.ajax({
              url: "./staff.php",
              async: false,
              success: () => {
                console.log("depart staff");
              }
            })
          })
        })
      </script>
    </div>
  </div>
</body>

</html>