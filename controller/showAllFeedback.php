<?php 

    include_once("../data/connection.php");

    // $options = [
    //     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    //     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    //     PDO::ATTR_EMULATE_PREPARES   => false,
    // ];
    // try {
    //     $pdo = mysqli_connect('localhost', 'root', '', 'feedbacksystem');
    // } catch (\PDOException $e) {
    //     throw new \PDOException($e->getMessage(), (int)$e->getCode());
    // }

    $filterRes = mysqli_query($conn, "SELECT user_tb.fullname AS Author, feedback_tb.feedback_content AS Content, category_tb.category_name AS Category, feedback_tb.document AS Document, feedback_tb.ended_date AS Deadline, COUNT(contact_tb.like) AS total_likes, COUNT(contact_tb.dislike) AS total_dislikes, COUNT(comment_tb.comment_id) AS total_comments
    FROM feedback_tb
    JOIN user_tb ON feedback_tb.email = user_tb.email
    JOIN category_tb ON feedback_tb.category_id = category_tb.category_id
    LEFT JOIN contact_tb ON feedback_tb.feedback_id = contact_tb.feedback_id
    LEFT JOIN comment_tb ON feedback_tb.feedback_id = comment_tb.feedback_id
    GROUP BY feedback_tb.feedback_id");
    while ($row = mysqli_fetch_array($filterRes, MYSQLI_ASSOC))
    {
?>
    <div class="qa-ad-fb-tbody">
        <div class="qa-ad-tbody-cell" title="<?php echo $row['Author'];?>">
            <p><?php echo $row['Author'];?></p>
        </div>
        <div class="qa-ad-tbody-cell" title="<?php echo  $row['Content'];?>">
            <p><?php echo  $row['Content'];?></p>
        </div>
        <div class="qa-ad-tbody-cell" title="<?php echo  $row['Category'];?>">
            <p><?php echo  $row['Category'];?></p>
        </div>
        <div class="qa-ad-tbody-cell" title="<?php echo  $row['Document'];?>">
            <p><?php echo  $row['Document'];?></p>
        </div>
        <div class="qa-ad-tbody-cell" title="<?php echo  $row['Deadline'];?>">
            <p><?php echo  $row['Deadline'];?></p>
        </div>
        <div class="qa-ad-tbody-cell" title="<?php echo  $row['total_likes'];?>">
            <p><?php echo $row['total_likes']==0 ? 0 : $row['total_likes'];?></p>
        </div>
        <div class="qa-ad-tbody-cell" title="<?php echo  $row['total_dislikes'];?>">
            <p><?php echo  $row['total_dislikes']==0 ? 0 : $row['total_dislikes'];?></p>
        </div>
        <div class="qa-ad-tbody-cell" title="<?php echo  $row['total_comments'];?>">
            <p><?php echo  $row['total_comments']==0 ? 0 : $row['total_comments'];?></p>
        </div>
    </div>
<?php
    }
?>