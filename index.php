<?php
session_start();
include_once("./data/connection.php");

if (isset($_SESSION['us'])) {
  $welcomeMess = "Welcome " . $_SESSION['us'] . " to feedback website";
  echo '<script>alert(' . $welcomeMess . ')</script>';
} else {
  header("Location: ./view/login.php");
}
?>

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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js" integrity="sha512-bztGAvCE/3+a1Oh0gUro7BHukf6v7zpzrAb3ReWAVrt+bVNNphcl2tDTKCBr5zk7iEDmQ2Bv401fX3jeVXGIcA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js" integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="./js/index.js"></script>
  <script src="./js/home.js"></script>
  <script src="./js/sidebar.js"></script>
  <script src="./js/logOut.js"></script>
  <script src="./js/content_sidebar_load.js"></script>

</head>

<body>
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
        <div class="menu-link link-lists list-show list-cate">
          <div class="title-link-menu">
            <p class="link-title">CATEGORY</p>
            <img class="angle-down" src="./image//angle_down.png" alt="" />
          </div>
          <div class="sub-menu-link sub-list l-categories">
            <?php

            $categoryLists = mysqli_query($conn, "SELECT * FROM category_tb") or die(mysqli_errno($conn));
            while ($cateRows = mysqli_fetch_array($categoryLists, MYSQLI_ASSOC)) {
              echo '<a href="?page=' . str_replace(' ', '', $cateRows['category_name']) . '" class="sub-link">';
            ?>
              <p><?php echo $cateRows['category_name']; ?></p>
              </a>
            <?php } ?>
          </div>
        </div>
        <div class="menu-link link-lists list-show list-sort">
          <div class="title-link-menu">
            <p class="link-title">LISTS</p>
            <img class="angle-down" src="./image//angle_down.png" alt="" />
          </div>
          <div class="sub-menu-link sub-list sorts">
            <a href="?page=like" class="sub-link">
              <p>Most Populars Like</p>
            </a>
            <a href="?page=unlike" class="sub-link">
              <p>Most Populars Unlike</p>
            </a>
            <a href="?page=seenfb" class="sub-link">
              <p>Seen of Feedback</p>
            </a>
            <a href="?page=newfb" class="sub-link">
              <p>Newest Feedback</p>
            </a>
            <a href="?page=newcmt" class="sub-link">
              <p>Newest Comment</p>
            </a>
          </div>
        </div>
      </div>
      <div class="user-interact">
        <?php

        if (isset($_SESSION['us']) && $_SESSION['role'] == 0) {
          echo '<a href="?page=create" class="fb-create">
                    <p class="fb-create-title">CREATE FEEDBACK</p>
                  </a>';
        } elseif (isset($_SESSION['us']) && ($_SESSION['role'] == 1
          || $_SESSION['role'] == 2
          || $_SESSION['role'] == 3)) {
          echo '<a href="?page=management" class="fb-create">
                  <p class="fb-create-title">DASHBOARD</p>
                </a>';
        }
        ?>

        <div class="menu-link link-lists higher-role">
          <div class="title-link-menu logout-show">
            <a href="?page=profile-info" class="link-title"> <?php echo $_SESSION['fu']; ?> </a>
          </div>
          <div class="sub-menu-link log-out">
            <a href="view/logout.php" class="sub-link" onclick="return confirm('Do you want to end the login session?')">
              <p>Log out</p>
            </a>
          </div>
        </div>
      </div>
      <div class="title-link-menu logout-show hidden-logout">
        <a href="view/logout.php" class="link-title" onclick="return confirm('Do you want to end the login session?')">
          <p>Log out</p>
        </a>
      </div>
    </div>
    <!-- <div class="content-pages"> -->
    <!-- php -->

    <?php

    if (isset($_GET['page'])) {
      $page = $_GET['page'];

      if ($page == 'profile-info') {
        include_once("view/profile.php");
      }
      if ($page == 'create') {
        include_once("view/feedbackCreate.php");
      }
      if ($page == 'management') {
        include_once("view/sidebar.php");
      }
    } else {
      include_once("./view/home.php");
    }

    ?>

    <!-- </div> -->
    <div class="footer">
      <p class="ft-copyright">Copyright&copy;2023 by Uni.Feedback</p>
    </div>
  </div>
</body>


</html>