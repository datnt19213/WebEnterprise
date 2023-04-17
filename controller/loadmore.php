<?php
include_once("../data/connection.php");
session_start();

if (isset($_POST['limit'], $_POST['offset'])) {
    $limit = $_POST['limit'];
    $offset = $_POST['offset'];
} else {
    $limit = 5;
    $offset = 0;
}

$fbPost = mysqli_query($conn, "SELECT * FROM feedback_tb ORDER BY feedback_id DESC LIMIT $limit OFFSET $offset");
if (!$fbPost) {
    die('Invalid query: ' . mysqli_error($conn));
}


while ($postRow = mysqli_fetch_array($fbPost, MYSQLI_ASSOC)) {
    echo '<script>console.log("' . $postRow['feedback_id'] . '")</script>';
    $fbEmail = $postRow['email'];
    $userPost = mysqli_query($conn, "SELECT * FROM user_tb WHERE user_tb.email = '$fbEmail'");
    $userPostInfo = mysqli_fetch_array($userPost);
?>
    <form method="post" class="fb-list-form-content fb-list-form-content-0" enctype="multipart/form-data">
        <p id="<?php echo $valId; ?>"></p>
        <div class="fb-header-interact">
            <div class="fb-user-info">
                <div class="fb-user-data">
                    <img src="<?php if ($postRow['post_state'] == 0) {
                                    echo $userPostInfo['avatar'] ? $userPostInfo['avatar'] : "./image/defaultUser.png";
                                } else {
                                    echo "./image/Anonymous.png";
                                } ?>" alt="" class="avt-user-push" />
                </div>
                <div class="end-date-username">
                    <p class="fb-user-name"><?php echo $authorPost = $postRow['post_state'] == 0 ? $userPostInfo['fullname'] : "Anonymous" ?></p>
                    <div class="fb-end-date-data">
                        <p class="date-deadline">Ended on&nbsp;</p>
                        <p class="date-deadline"><?php echo date('m/d/Y', strtotime($postRow['ended_date'])); ?></p>
                    </div>
                </div>
            </div>
            <div class="fb-emotion-interact">
                <?php
                $feedbackId = $postRow['feedback_id'];
                $userContact = $_SESSION['us'];

                $likeCountQuery = "SELECT SUM(`like`) AS likeCount FROM contact_tb WHERE feedback_id = $feedbackId";
                $dislikeCountQuery = "SELECT  SUM(`dislike`) AS dislikeCount FROM contact_tb WHERE feedback_id = $feedbackId";

                $likeCountRes = mysqli_fetch_assoc(mysqli_query($conn, $likeCountQuery));
                $dislikeCountRes = mysqli_fetch_assoc(mysqli_query($conn, $dislikeCountQuery));


                $contactCheckedQuery = "SELECT `like`, `dislike` FROM contact_tb WHERE feedback_id = $feedbackId AND email = '$userContact'";
                $isCheckedContact = mysqli_query($conn, $contactCheckedQuery);
                if (!$isCheckedContact) {
                    // Query failed, output the error message and exit.
                    die("Error: " . mysqli_error($conn));
                }

                if (mysqli_num_rows($isCheckedContact) > 0) {
                    $rowChecked = mysqli_fetch_assoc($isCheckedContact);
                    $isLikeChecked = $rowChecked["like"];
                    $isDislikeChecked = $rowChecked["dislike"];
                } else {
                    $isLikeChecked = 0;
                    $isDislikeChecked = 0;
                }

                ?>


                <!--Like press-->
                <button type="button" class="fb-like" id="<?php echo 'like' . $postRow['feedback_id']; ?>" onclick="likeButtonPressed(<?php echo $postRow['feedback_id']; ?>)">
                    <div class="icon-outline">
                        <img src="./image/like.png" alt="like ico" id="imgLike<?php echo $postRow['feedback_id']; ?>" class="ico-like" style="<?php echo $isLikeChecked == 1 ? "opacity: 1" : "opacity: 0.5" ?>" />
                    </div>
                    <p class="fb-like-label" id="<?php echo 'numLike' . $postRow['feedback_id']; ?>"><?php echo $likeCountRes['likeCount']; ?></p>
                </button>



                <!--Dislike press-->
                <button type="button" class="fb-dislike" id="<?php echo 'dislike' . $postRow['feedback_id']; ?>" onclick="dislikeButtonPressed(<?php echo $postRow['feedback_id']; ?>)">
                    <div class="icon-outline">
                        <img src="./image/like.png" alt="dislike ico" id="imgDislike<?php echo $postRow['feedback_id']; ?>" class="ico-dislike" style="<?php echo $isDislikeChecked == 1 ? "opacity: 1" : "opacity: 0.5" ?>" />
                    </div>
                    <p class="fb-dislike-label" id="<?php echo 'numDislike' . $postRow['feedback_id']; ?>"><?php echo $dislikeCountRes['dislikeCount']; ?></p>
                </button>

                <script>
                    function likeButtonPressed(feedbackId) {
                        document.getElementById("imgLike" + feedbackId).style.opacity = "1";
                        document.getElementById("imgDislike" + feedbackId).style.opacity = "0.5";

                        $.ajax({
                            url: "./controller/contactReload.php",
                            type: "POST",
                            data: "fbId=" + feedbackId,
                            success: function(response) {
                                var counts = JSON.parse(response);

                                // console.log(counts.likeCount)
                                // console.log(counts.dislikeCount)

                                $("#numLike" + feedbackId).html(counts.likeCount);
                                $("#numDislike" + feedbackId).html(counts.dislikeCount);
                            }
                        })

                    }

                    function dislikeButtonPressed(feedbackId) {
                        document.getElementById("imgLike" + feedbackId).style.opacity = "0.5";
                        document.getElementById("imgDislike" + feedbackId).style.opacity = "1";

                        $.ajax({
                            url: "./controller/contactReload.php",
                            type: "POST",
                            data: "fbId=" + feedbackId,
                            success: function(response) {
                                var counts = JSON.parse(response);
                                // console.log(counts.likeCount)
                                // console.log(counts.dislikeCount)


                                $("#numLike" + feedbackId).html(counts.likeCount);
                                $("#numDislike" + feedbackId).html(counts.dislikeCount);
                            }
                        })

                    }
                </script>

                <!--Comment press-->
                <button type="button" class="fb-cmt" id="comment<?php echo $postRow['feedback_id'] ?>">
                    <div class="icon-outline">
                        <img src="./image/comment.png" alt="comment ico" class="ico-like" />
                    </div>
                    <p class="fb-cmt-label">Comment</p>
                </button>


                <?php
                $like = "like";
                $dislike = "dislike";
                $contactToPostId = $postRow['feedback_id'];

                ?>
                <script>
                    $("#<?php echo 'like' . $postRow['feedback_id']; ?>").click(() => {
                        $.post({
                            url: "./controller/likePress.php",
                            type: "POST",
                            data: {
                                type: "<?php echo $like; ?>",
                                likeId: <?php echo $contactToPostId; ?>
                            },
                            success: function(response) {
                                console.log(response)

                            }
                        })
                    })
                    $("#<?php echo 'dislike' . $postRow['feedback_id']; ?>").click(() => {
                        $.post({
                            url: "./controller/dislikePress.php",
                            type: "POST",
                            data: {
                                type: "<?php echo $dislike; ?>",
                                dislikeId: <?php echo $contactToPostId; ?>
                            },
                            success: function(response) {
                                console.log(response)
                            }
                        })
                    })

                    $("#comment<?php echo $postRow['feedback_id'] ?>").click(() => {
                        localStorage.setItem("commentId", <?php echo $postRow['feedback_id']; ?>);
                        localStorage.setItem("endTime", "<?php echo date('m/d/Y', strtotime($postRow['ended_date'])); ?>");
                        $.post({
                            url: "./view/home.php",
                            type: "POST",
                            success: function(response) {
                                showComment();
                                checkEndDate();

                            }
                        })
                    })
                </script>
            </div>
        </div>
        <div class="fb-content-data">
            <?php if ($postRow['document']) { ?>
                <div class="btn-view-doc">
                    <a href="<?php echo $postRow['document']; ?>" class="fb-document" target="_blank">
                        View Document
                    </a>
                </div>
            <?php }

            $paraId = "para" . $postRow['feedback_id'];
            $textParaId = "textPara" . $postRow['feedback_id'];
            ?>
            <div class="fb-content-para" id="<?php echo $paraId; ?>">
                <pre class="fb-text-paragraph" id="<?php echo $textParaId; ?>">
                    <?php echo $postRow['feedback_content']; ?>
                  </pre>
            </div>
            <?php
            $lenContent = strlen($postRow['feedback_content']);
            $showId = "show" . $postRow['feedback_id'];
            $hideId = "hide" . $postRow['feedback_id'];
            if ($lenContent >= 380) { ?>
                <button type="button" class="show-more-content" id="<?php echo $showId; ?>">Show more</button>
                <button type="button" class="show-less-content" id="<?php echo $hideId; ?>">Show less</button>
            <?php } ?>
        </div>
        <script>
            $(document).ready(function() {
                $("#<?php echo $showId; ?>").click(() => {
                    var txtHeight = $("#<?php echo $textParaId; ?>").height();
                    $("#<?php echo $paraId; ?>").animate({
                        height: txtHeight
                    });
                    $("#<?php echo $showId; ?>").hide();
                    $("#<?php echo $hideId; ?>").show();
                });

                $("#<?php echo $hideId; ?>").click(() => {
                    $("#<?php echo $paraId; ?>").css("height", "100px");
                    $("#<?php echo $showId; ?>").show();
                    $("#<?php echo $hideId; ?>").hide();
                });
                if ($(window).width() < 900) {
                    $(".hide-cmt").click(() => {
                        $(".fb-comment").slideDown();
                    });
                    $(".fb-cmt").click(() => {
                        $(".fb-comment").slideUp();
                    });
                } else {
                    $(".fb-comment").show();
                }
            })
        </script>
    </form>
<?php } ?>