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
            var limit = 5;
            var offset = 0;
            var isLoad = false;

            $(document).ready(function() {
              toLoad(limit, offset);
            })

            $("#fb-list").scroll(function() {
              if ($(this).scrollTop() + $(this).outerHeight() >= $(this).get(0).scrollHeight) {
                console.log($(this).scrollTop());
                console.log($(this).outerHeight());
                console.log($(this).get(0).scrollHeight);
                if (isLoad === false) {
                  offset += limit;
                  toLoad(limit, offset);
                }
              }
            })

            function toLoad(limit, offset) {
              isLoad = true;
              $(".loader").show();
              $.post({
                url: "./controller/loadmore.php",
                type: "POST",
                data: {
                  limit: limit,
                  offset: offset,
                },
                success: (response) => {
                  $("#loaderData").append(response);
                  $(".loader").hide();
                  isLoad = false;
                }
              })
            }
          </script>
        </div>
        <span class="loader" style="display: none"></span>
      </div>
      <!-- comment box -->

      <form method="post" enctype="multipart/form-data" class="fb-comment">
        <div class="hide-cmt">
          <p>Hide</p>
        </div>
        <div class="list-comment" id="cmtList">
          <script>
            function checkEndDate() {
              let endPost = localStorage.getItem("endTime");
              let endDate = new Date(endPost);
              let currentDate = new Date();

              console.log("End date: " + endDate.toLocaleDateString());
              console.log("Current date: " + currentDate.toLocaleDateString());

              if (currentDate.getTime() < endDate.getTime()) {
                $("#sendComment").prop("disabled", false);
                $("#commentContent").prop("disabled", false);
                $("#cmtState").prop("disabled", false);
                console.log("The current date is before the end date.");
              } else {
                $("#sendComment").prop("disabled", true);
                $("#commentContent").prop("disabled", true);
                $("#cmtState").prop("disabled", true);
                console.log("The current date is after the end date.");
              }

            }

            function showComment() {
              var id = localStorage.getItem("commentId")
              console.log("SHOWED")
              $.post({
                url: "./controller/comment.php",
                type: "POST",
                data: {
                  cmtId: id,
                },
                success: function(data) {
                  $("#cmtList").html(data);
                  if ($(window).width() < 900) {
                    $(".hide-cmt").click(() => {
                      $(".fb-comment").hide();
                    });
                    $(".fb-comment").show();
                  }
                }
              })
            }

            function submitComment() {
              var id = localStorage.getItem("commentId");
              var cmtState = $("#cmtState").is(":checked") ? 1 : 0;
              var cmtVal = $("#commentContent").val();
              console.log(cmtState, cmtVal, id);
              $.post({
                url: "./controller/postComment.php",
                type: "POST",
                data: {
                  postId: id,
                  state: cmtState,
                  content: cmtVal
                },
                success: function(data) {
                  $("#cmtList").html(data);
                }
              })
            }
          </script>
        </div>
        <div class="post-comment">
          <div class="comment-form">
            <label for="" class="checkbox-label-post">
              <input type="checkbox" class="check-box-terms" id="cmtState" name="" />
              <p class="terms-check">Comment As Anonymous</p>
            </label>
            <div class="cmt-box">
              <input type="text" placeholder="Comment Here" class="comment-input" id="commentContent" minlength="7" required />
              <button type="button" class="fb-send-comment" onclick="submitComment()" id="sendComment">
                <img src="./image/send.png" alt="Send" class="send-comment" />
              </button>
            </div>
          </div>
        </div>
      </form>

    </div>
  </div>
</body>

</html>