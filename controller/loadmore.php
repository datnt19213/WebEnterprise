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

$keyPost = "";
$fbEmail = "";

while ($postRow = mysqli_fetch_array($fbPost, MYSQLI_ASSOC)) {
    // $keyPost = $postRow['comment_id'];
    // $fbEmail = $postRow['email'];
    $userPost = mysqli_query($conn, "SELECT * FROM user_tb WHERE user_tb.email = '$fbEmail'");
    $userPostInfo = mysqli_fetch_array($userPost);
?>
    <form class="fb-list-form-content fb-list-form-content-0" enctype="multipart/form-data" action="" method="post" data-="1">
        <div class="fb-header-interact">
            <div class="fb-user-info">
                <div class="fb-user-data">
                    <img src="<?php if ($postRow['post_state'] = 0) {
                                    echo $userPostInfo['avatar'] ? $userPostInfo['avatar'] : "./image/defaultUser.png";
                                } else {
                                    echo "./image/Anonymous.png";
                                } ?>" alt="" class="avt-user-push" />
                </div>
                <div class="end-date-username">
                    <p class="fb-user-name"><?php echo $authorPost = $postRow['post_state'] = 0 ? $userPostInfo['fullname'] : "Anonymous" ?></p>
                    <div class="fb-end-date-data">
                        <p class="date-deadline">Ended on&nbsp;</p>
                        <p class="date-deadline"><?php echo date('m/d/Y', strtotime($postRow['ended_date'])); ?></p>
                    </div>
                </div>
            </div>
            <div class="fb-emotion-interact">
                <?php
                $idContact = $postRow['contact_id'];

                $contactLikeQuery = "SELECT like FROM comment_tb WHERE comment_tb.comment_id = '$idContact'";
                $dislikeCountQuery = "SELECT dislike FROM comment_tb WHERE comment_tb.comment_id = '$idContact'";

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
                // $emailContact = $_SESSION['us'];
                // $clickContact = mysqli_query($conn, "SELECT like FROM contact_tb WHERE contact_tb.contact_id = '$idContact' AND contact_tb.email = '$emailContact'");

                ?>
                <!--Like press-->
                <button type="submit" class="fb-like">
                    <div class="icon-outline">
                        <img src="./image/like.png" alt="like ico" class="ico-like" style="<?php $likeDislike = 1 ? "opacity: 1" : $likeDislike = 0 ? "opacity: 0.5" : "opacity: 0.5" ?>" />
                    </div>
                    <p class="fb-like-label"><?php echo $countLikeNum; ?></p>
                </button>

                <!--Dislike press-->
                <button type="submit" class="fb-dislike">
                    <div class="icon-outline">
                        <img src="./image/like.png" alt="dislike ico" class="ico-dislike" style="<?php $likeDislike = 1 ? "opacity: 1" : $likeDislike = 0 ? "opacity: 0.5" : "opacity: 0.5" ?>" />
                    </div>
                    <p class="fb-dislike-label"><?php echo $countDislikeNum; ?></p>
                </button>
                <!--Comment press-->
                <div class="fb-cmt" onclick="showCmt()">
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
        </script>
    </form>
<?php } ?>