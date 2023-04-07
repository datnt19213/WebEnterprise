<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/overviewQAmanager.css">
</head>

<body>
<?php
session_start();
include_once("./data/connection.php");
$result = mysqli_query($conn, "SELECT * FROM deparment_tb, feedback_tb, comment_tb
                                WHERE deparment_tb.department_id = feedback_tb.department_id AND 
                                comment_tb.comment_id = feedback_tb.comment_id");
$tFeedback = mysqli_query($conn, "SELECT COUNT(*) FROM feedback_tb");
$tUser = mysqli_query($conn, "SELECT COUNT(*) FROM user_tb");
$perFeedback = ($tFeedback / $tUser) * 100;
$tContributor = mysqli_query($conn, "SELECT COUNT(SELECT DISTINCT email FROM comment_tb;) FROM comment_tb");

$tFeedbackWithoutComment = mysqli_fetch_array($conn, "");

if (!$result)
{
    die('Invalid query: ' . mysqli_error($conn));
}

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
?>
    <div class="departmentItem">
        <div class="departmentName-container">
            <header class="header" name="departmentName"><?php echo  $row['department_name'];?></header>

            <div class="content">
                <div class="row1">
                    <div class="totalFeedback">
                        <p class="row1-col1-title">Total Feedback</p>
                        <p class="row1-col1-value" name="totalFeedback"><?php echo  $tFeedback;?></p>
                    </div>

                    <div class="percentFeedback">
                        <p class="row1-col2-title">Percentage of Feedback</p>
                        <p class="row1-col2-value" name="percentFeedback"><?php echo  $perFeedback;?>&nbsp;%</p>
                    </div>

                    <div class="totalContributor">
                        <p class="row1-col3-title">Total Contributor</p>
                        <p class="row1-col3-value" name="totalContributor"><?php echo  $tContributor;?></p>
                    </div>
                </div>

                <div class="row2">
                    <p class="row2-title">Total Feedback Without Comment</p>
                    <p class="row2-value" name="totalFeedbackWithoutComment">9999</p>
                </div>

                <div class="row3">
                    <div class="col1">
                        <p class="row3-col1-title">Total Anonymous Feedback</p>
                        <p class="row3-col1-value" name="totalAnonymousFeedback">9999</p>
                    </div>

                    <div class="col2">
                        <p class="row3-col2-title">Total Anonymous Comment</p>
                        <p class="row3-col2-value" name="totalAnonymousComment">9999</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    }
?>
</body>

</html>