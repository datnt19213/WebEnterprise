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
      <div class="fb-list" id="fb-list">
        <div class="fb-list-scroll" id="loaderData">

          <script>
            var p_num = 1;
            var isLoad = false;
            toLoad();

            const containerEl = document.getElementById('fb-list');

            containerEl.addEventListener('scroll', function() {
              const scrollTop = containerEl.scrollTop;
              const scrollHeight = containerEl.scrollHeight;
              const clientHeight = containerEl.clientHeight;

              if (scrollTop + clientHeight === scrollHeight) {
                if (!isLoad) {
                  toLoad();
                }
              }
            });


            // $("#loaderData").scroll(function() {
            //   // if ($(".fb-list").scrollTop() + $(".fb-list").height() > $(".fb-view-container").height() + 1000) {
            //   // if (!isLoad) {
            //   toLoad();
            //   // }
            // })

            function toLoad() {
              isLoad = true;
              $(".loader").show();
              $.post("./controller/loadmore.php", {
                p: p_num
              }, (response) => {
                $("#loaderData").append(response);
                $(".loader").hide();
                isLoad = false;
                p_num++;
              })
            }
          </script>

        </div>
        <span class="loader" style="display: none;"></span>
      </div>
      <!-- comment box -->
      <div class="fb-comment">
        <div class="hide-cmt">
          <p>Hide</p>
        </div>
        <div class="list-comment">
          <?php
          $cmtQuery = mysqli_query($conn, "SELECT * FROM comment_tb, feedback_tb WHERE comment_tb.comment_id = feedback_tb.comment_id");

          while ($cmtRow = mysqli_fetch_array($cmtQuery, MYSQLI_ASSOC)) {
            $cmtUser = $cmtRow['email'];
            $cmtState = $cmtRow['state_code'];
            $cmtNonAnoQuery = mysqli_query($conn, "SELECT * FROM user_tb WHERE comment_tb.email = '$cmtUser' AND state_code = 1");
            $cmtNonAno = mysqli_fetch_assoc($cmtNonAnoQuery);
          ?>
            <!-- comment list -->
            <div class="comment-row">
              <div class="cmt-avt">
                <img src="<?php $cmtState = 1 ? $cmtNonAno['avatar'] : "./image/Anonymous.png" ?>" alt="Avatar" class="avt-comment" />
              </div>
              <div class="cmt-content">
                <pre class="cmt-text"><?php echo $cmtRow['comment_content'] ?></pre>
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