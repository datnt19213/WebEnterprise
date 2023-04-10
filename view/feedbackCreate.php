<?php
include_once("./data/connection.php");
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
    <form action="" method="post" enctype="multipart/form-data" class="fb-create-form">
      <div class="fb-content-input">
        <div class="fb-content-label">
          <p class="fb-create-tittle">Feedback Create</p>
        </div>
        <div class="wrapper-textarea">
          <textarea class="textarea-feedback-content" name="fbCrea_contentFeedback" required id="" cols="30" rows="18" maxlength="10000" placeholder="Feedback Content"></textarea>
        </div>
      </div>
      <div class="fb-file-time-submit">
        <div class="select-data-to-submit">
          <div class="fb-file-input">
            <input type="file" name="fbDocument" name="fbCrea_DocsFile" id="fileInput" style="display: none" />
            <label for="fileInput" class="label-input-file">
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
            <input type="date" name="fbCrea_StartDate" id="inputDate" class="fb-end-date-input" required />
          </div>
          <div class="fb-end-date">
            <p class="fb-end-date-label">Ended on</p>
            <input type="date" name="fbCrea_EndDate" id="inputDate" class="fb-end-date-input" required />
          </div>
        </div>
        <div class="submit-group">
          <label for="" class="checkbox-label-post">
            <input type="checkbox" class="check-box-terms" name="fbCrea_TypePost" value="1" />
            <p class="terms-check">Post As Anonymous</p>
          </label>
          <button type="submit" name="fbCrea_SubmitBtn" class="create-fb-btn">Create</button>
          <label for="" class="checkbox-label-post">
            <input type="checkbox" class="check-box-terms" name="fbCrea_TermsCheck" value="1" required />
            <p class="terms-check">Accepted Terms & Conditions</p>
          </label>
        </div>
      </div>
    </form>
  </div>
</body>

<?php
if (isset($_POST['fbCrea_SubmitBtn'])) {
  $fbCrea_contentFeedback = $_POST['fbCrea_contentFeedback'];
  // $fbCrea_Doc = 
  // $_FILES['fbCrea_DocsFile'];
  $fbCrea_Cate = $_POST['fbCrea_Category'];
  $fbCrea_StartDate = $_POST['fbCrea_StartDate'];
  $fbCrea_EndDate = $_POST['fbCrea_EndDate'];
  $fbCrea_TypePost = isset($_POST['fbCrea_TypePost']) ? $_POST['fbCrea_TypePost'] : 0;
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



      $insertFbCrea = mysqli_query($conn, "INSERT INTO feedback_tb (email, feedback_content, document, category_id, started_date, ended_date, post_state, position_id, department_id) VALUES ('$userEmail', '$fbCrea_contentFeedback', '$file_path', '$fbCrea_Cate', '$fbCreaStart_Date', '$fbCreaEnd_Date', '$fbCrea_TypePost', '$getPosUser', '$getDepUser')");
      if ($insertFbCrea) {
        echo '<script>alert("Feedback Created")</script>';
      } else {
        echo '<script>alert("Post fail 1")</script>';
      }
    } else {
      $insertFbCrea = mysqli_query($conn, "INSERT INTO feedback_tb (email, feedback_content, category_id, started_date, ended_date, post_state, position_id, department_id) VALUES ('$userEmail', '$fbCrea_contentFeedback', '$fbCrea_Cate', '$fbCreaStart_Date', '$fbCreaEnd_Date', '$fbCrea_TypePost', '$getPosUser', '$getDepUser')");
      if ($insertFbCrea) {
        echo '<script>alert("Feedback Created")</script>';
      } else {
        echo '<script>alert("Post fail 2")</script>';
      }
    }
  } else {
    echo '<script>alert("Please enter fields")</script>';
  }
}

?>

</html>