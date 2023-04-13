<?php
include_once("../data/connection.php");

sleep(1);
$page = $_POST['p'] ?? 1;
$limit = 5;
$rowToLoad = ($page - 1) * $limit;

$fbPost = mysqli_query($conn, "SELECT * FROM feedback_tb LIMIT $rowToLoad, $limit");
if (!$fbPost) {
    die('Invalid query: ' . mysqli_error($conn));
}

while ($postRow = mysqli_fetch_array($fbPost, MYSQLI_ASSOC)) {
    $fbEmail = $postRow['email'];
    $userPost = mysqli_query($conn, "SELECT * FROM user_tb WHERE user_tb.email = '$fbEmail'");
    $userPostInfo = mysqli_fetch_array($userPost);
?>
    <form class="fb-list-form-content fb-list-form-content-0" enctype="multipart/form-data" action="" method="post" data-="1">
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
                $idContact = $postRow['contact_id'];
                $userContact = $postRow['email'];

                $contactLikeQuery = "SELECT like FROM contact_tb WHERE contact_tb.contact_id = '$idContact' AND contact_tb.like = 1";
                $dislikeCountQuery = "SELECT dislike FROM contact_tb WHERE contact_tb.contact_id = '$idContact' AND contact_tb.dislike = 1";

                $likeCheckQuery = "SELECT * FROM contact_tb WHERE contact_tb.contact_id = '$idContact' AND contact_tb.email = '$userContact'";
                $likeCheckResult = mysqli_query($conn, $likeCheckQuery);

                $likeCheck = mysqli_fetch_array($likeCheckResult);

                if ($countLikeResult = mysqli_query($conn, $contactLikeQuery)) {
                    $countLikeNum = mysqli_num_rows($countLikeResult);
                } else {
                    $countLikeNum = 0;
                };

                if ($countDislikeResult = mysqli_query($conn, $dislikeCountQuery)) {
                    $countDislikeNum = mysqli_num_rows($countDislikeResult);
                } else {
                    $countDislikeNum = 0;
                };


                $likeId = $postRow['feedback_id'];
                ?>
                <!--Like press-->
                <button type="button" class="fb-like" id="<?php echo $likeId; ?>">
                    <div class="icon-outline">
                        <img src="./image/like.png" alt="like ico" class="ico-like" style="<?php if (!$likeCheck['like'] = 0) {
                                                                                                echo "opacity: 0.5";
                                                                                            } else {
                                                                                                echo "opacity: 1";
                                                                                            } ?>" />
                    </div>
                    <p class="fb-like-label"><?php echo $countLikeNum; ?></p>
                </button>

                <?php
                $dislikeId = $postRow['feedback_id'];;
                ?>
                <!--Dislike press-->
                <button type="button" class="fb-dislike" id="<?php echo $dislikeId; ?>">
                    <div class="icon-outline">
                        <img src="./image/like.png" alt="dislike ico" class="ico-dislike" style="<?php if (!$likeCheck['dislike'] = 0) {
                                                                                                        echo "opacity: 0.5";
                                                                                                    } else {
                                                                                                        echo "opacity: 1";
                                                                                                    } ?>" />
                    </div>
                    <p class="fb-dislike-label"><?php echo $countDislikeNum; ?></p>
                </button>
                <!--Comment press-->
                <div class="fb-cmt" id="">
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

                $("#<?php echo $likeId; ?>").click(() => {
                    $.post({
                        url: "likePress.php",
                        type: "POST",
                        data: "type=like$id" + $likeId,
                        success: function(result) {
                            console.log("Liked", result);
                        }
                    })
                })
            })
        </script>
    </form>
<?php } ?>