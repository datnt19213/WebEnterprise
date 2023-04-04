<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=380px" />
  <title>Feedback</title>
  <link rel="stylesheet" href="./css/index.css" />
  <link rel="stylesheet" href="./css/adminQaFeedbackManagement.css">
  <link rel="stylesheet" href="./css/cate_manager.css">
  <link rel="stylesheet" href="./css/feedbackCreate.css">
  <link rel="stylesheet" href="./css/home.css">
  <link rel="stylesheet" href="./css/login_adduser.css">
  <link rel="stylesheet" href="./css/overviewQAmanager.css">
  <link rel="stylesheet" href="./css/profile.css">
  <link rel="stylesheet" href="./css/qaDepartments.css">
  <link rel="stylesheet" href="./css/qaDepartmentsAdmin.css">
  <link rel="stylesheet" href="./css/qaDepartqaManager.css">
  <link rel="stylesheet" href="./css/qaMamagementAdmin.css">
  <link rel="stylesheet" href="./css/root.css">
  <link rel="stylesheet" href="./css/sidebar.css">
  <link rel="stylesheet" href="./css/staff.css">
  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
  <script src="./js/index.js"></script>
  <script src="./js/home.js"></script>
  <script src="./js/sidebar.js"></script>
</head>

<body>
  <?php

  session_start();
  include_once("./data/connection.php");
  ?>
  <div class="index-container">
    <div class="navigation">
      <div class="nav-respo">
        <p>≡</p>
      </div>
      <div class="logo-index">
        <img class="logo-img" src="./image//Logo.png" alt="Logo" srcset="" />
      </div>
      <div class="menu-bar">
        <a href="index.php" class="menu-link">
          <p class="link-title">HOME</p>
        </a>
        <div class="menu-link link-lists">
          <div class="title-link-menu">
            <p class="link-title">CATEGORY</p>
            <img class="angle-down" src="./image//angle_down.png" alt="" />
          </div>
          <div class="sub-menu-link">
            <a href="" class="sub-link">
              <p>Most Populars Like</p>
            </a>
            <a href="" class="sub-link">
              <p>Most Populars Unlike</p>
            </a>
            <a href="" class="sub-link">
              <p>Seen of Feedback</p>
            </a>
            <a href="" class="sub-link">
              <p>Newest Feedback</p>
            </a>
            <a href="" class="sub-link">
              <p>Newest Comment</p>
            </a>
          </div>
        </div>
        <div class="menu-link link-lists">
          <div class="title-link-menu">
            <p class="link-title">LISTS</p>
            <img class="angle-down" src="./image//angle_down.png" alt="" />
          </div>
          <div class="sub-menu-link">
            <a href="" class="sub-link">
              <p>Most Populars Like</p>
            </a>
            <a href="" class="sub-link">
              <p>Most Populars Unlike</p>
            </a>
            <a href="" class="sub-link">
              <p>Seen of Feedback</p>
            </a>
            <a href="" class="sub-link">
              <p>Newest Feedback</p>
            </a>
            <a href="" class="sub-link">
              <p>Newest Comment</p>
            </a>
          </div>
        </div>
      </div>
      <div class="user-interact">
        <a href="?page=create" class="fb-create">
          <p class="fb-create-title">CREATE FEEDBACK</p>
        </a>
        <a href="?page=profile" class="users-info-link">
          <p class="users-name">USERNAME</p>
        </a>
      </div>
    </div>
    <div class="content-pages">
      <!-- php -->

      <?php

      if (isset($_POST['page'])) {
        $page = $_POST['page'];

        if ($page == 'profile') {
          include_once("./view/profile.php");
        }
        if ($page == 'create') {
          include_once("./view/feedbackCreate.php");
        }
      } else {
        include_once("./view/home.php");
      }

      ?>

    </div>
    <div class="footer">
      <p class="ft-copyright">Copyright&copy;2023 by Uni.Feedback</p>
    </div>
  </div>
</body>

</html>