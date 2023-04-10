<?php
include_once("./data/connection.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home</title>
  <link rel="stylesheet" href="../css/home.css" />
  <link rel="stylesheet" href="../css/feedbackCreate.css" />
  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
  <script src="../js/home.js"></script>
</head>

<body>
  <div class="home-container">
    <div class="fb-view-container">
      <!-- feedback box -->
      <div class="fb-list">
        <div class="fb-list-scroll">
          <?php
          $fbPost = mysqli_query($conn, "SELECT * FROM feedback_tb");
          if (!$fbPost) {
            die('Invalid query: ' . mysqli_error($conn));
          }

          $keyPost;
          $fbEmail;

          while ($postRow = mysqli_fetch_array($fbPost, MYSQLI_ASSOC)) {
            $keyPost = $postRow['comment_id'];
            $fbEmail = $postRow['email'];
            $userPost = mysqli_query($conn, "SELECT * FROM user_tb WHERE user_tb.email = '$fbEmail'");
            $userPostInfo = mysqli_fetch_assoc($userPost);
          ?>
            <form class="fb-list-form-content fb-list-form-content-0" enctype="multipart/form-data" action="" method="post" data-="1">
              <div class="fb-header-interact">
                <div class="fb-user-info">
                  <div class="fb-user-data">
                    <img src="<?php echo $userPostInfo['avatar'] ? $avatar : "./image/defaultUser.png"; ?>" alt="avatar" class="avt-user-push" />
                  </div>
                  <div class="end-date-username">
                    <p class="fb-user-name"><?php echo $userPostInfo['fullname']; ?></p>
                    <div class="fb-end-date-data">
                      <p class="date-deadline">Ended on&nbsp;</p>
                      <p class="date-deadline"><? echo date('m/d/Y', strtotime($postRow['ended_date'])); ?></p>
                    </div>
                  </div>
                </div>
                <div class="fb-emotion-interact">
                  <?php
                  $idContact = $postRow['contact_id'];
                  $emailContact = $_SESSION['us'];
                  $contactLike = mysqli_query($conn, "SELECT * FROM contact_tb WHERE contact_tb.contact_id = '$idContact' AND contact_tb.like = 1");
                  $contactDislike = mysqli_query($conn, "SELECT * FROM contact_tb WHERE contact_tb.contact_id = '$idContact' AND contact_tb.like = 0");
                  $clickContact = mysqli_query($conn, "SELECT like FROM contact_tb WHERE contact_tb.contact_id = '$idContact' AND contact_tb.email = '$emailContact'");

                  $likeDislike = mysqli_fetch_assoc($clickContact);

                  ?>
                  <!--Like press-->
                  <button type="submit" class="fb-like">
                    <div class="icon-outline">
                      <img src="./image/like.png" alt="like ico" class="ico-like" style="<? $likeDislike = 1 ? "opacity: 1" : $likeDislike = 0 ? "opacity: 0.5" : "opacity: 0.5" ?>" />
                    </div>
                    <p class="fb-like-label"><? echo $likeNum = mysqli_num_rows($contactLike); ?></p>
                  </button>

                  <!--Dislike press-->
                  <button type="submit" class="fb-dislike">
                    <div class="icon-outline">
                      <img src="./image/like.png" alt="dislike ico" class="ico-dislike" style="<? $likeDislike = 1 ? "opacity: 1" : $likeDislike = 0 ? "opacity: 0.5" : "opacity: 0.5" ?>" />
                    </div>
                    <p class="fb-dislike-label"><? echo $disLikeNum = mysqli_num_rows($contactDislike); ?></p>
                  </button>
                  <!--Comment press-->
                  <div class="fb-cmt">
                    <div class="icon-outline">
                      <img src="./image/comment.png" alt="comment ico" class="ico-like" />
                    </div>
                    <p class="fb-cmt-label">Comment</p>
                  </div>
                </div>
              </div>
              <div class="fb-content-data">
                <?php if ($postRow['document']) { ?>
                  <div class="btn-view-doc">
                    <a href="<? echo $postRow['document']; ?>" class="fb-document" target="_blank">
                      View Document
                    </a>
                  </div>
                <? } ?>
                <div class="fb-content-para fb-content-para-0">
                  <pre class="fb-text-paragraph">
                    <?php echo $postRow['feedback_content']; ?>
                  </pre>
                </div>
                <?php
                $lenContent = strlen($postRow['feedback_content']);
                if ($lenContent >= 500) { ?>
                  <p class="show-more-content show-more-content-0">Show more</p>
                  <p class="show-less-content show-less-content-0">Show less</p>
                <?php } ?>
              </div>
            </form>
          <?php } ?>

        </div>
      </div>
      <!-- comment box -->
      <div class="fb-comment">
        <div class="hide-cmt">
          <p>Hide</p>
        </div>
        <div class="list-comment">
          <?php
          $cmtQuery = mysqli_query($conn, "SELECT * FROM comment_tb WHERE comment_tb.comment_id = '$keyPost'");

          while ($cmtRow = mysqli_fetch_array($cmtQuery, MYSQLI_ASSOC)) {
            $cmtUser = $cmtRow['email'];
            $cmtState = $cmtRow['state_code'];
            $cmtNonAnoQuery = mysqli_query($conn, "SELECT * FROM user_tb WHERE comment_tb.email = '$cmtUser' AND state_code = 1");
            $cmtNonAno = mysqli_fetch_assoc($cmtNonAnoQuery);
          ?>
            <!-- comment list -->
            <div class="comment-row">
              <div class="cmt-avt">
                <img src="<? $cmtState = 1 ? $cmtNonAno['avatar'] : "./image/Anonymous.png" ?>" alt="Avatar" class="avt-comment" />
              </div>
              <div class="cmt-content">
                <pre class="cmt-text"><? echo $cmtRow['comment_content'] ?></pre>
              </div>
            </div>
          <?php } ?>
        </div>
        <div class="post-comment">
          <form action="" class="comment-form" method="post">
            <label for="" class="checkbox-label-post">
              <input type="checkbox" class="check-box-terms" name="" value="check box" />
              <p class="terms-check">Comment As Anonymous</p>
            </label>
            <div class="cmt-box">
              <input type="text" placeholder="Comment" class="comment-input" />
              <button class="fb-send-comment">
                <img src="./image/send.png" alt="Send" class="send-comment" />
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>