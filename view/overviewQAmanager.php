<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/overviewQAmanager.css">
</head>

<body>
    <!-- <div class="scroll-overview" style="overflows: scroll"> -->
    <?php
        session_start();
        include_once("../data/connection.php");

        $result = mysqli_query($conn, "SELECT * FROM department_tb");

        // $result = mysqli_query($conn, "SELECT * FROM department_tb, feedback_tb, comment_tb
        //                                 WHERE department_tb.department_id = feedback_tb.department_id AND 
        //                                 comment_tb.comment_id = feedback_tb.comment_id");
        $tFeedback = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM feedback_tb"));

        $tUser = mysqli_query($conn, "SELECT * FROM user_tb");

        $perFeedback = mysqli_num_rows($tUser) / $tFeedback * 100;
        $perFeedback = round($perFeedback, 1);

        $tContributor = mysqli_num_rows(mysqli_query($conn, "SELECT DISTINCT email FROM feedback_tb"));

        $tFeedbackWithoutComment = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM feedback_tb a, comment_tb b WHERE a.feedback_id = b.feedback_id AND a.feedback_id = NULL"));

        $tAnonymousFeedback = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM feedback_tb WHERE post_state = 1"));

        $tAnonymousComment = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM comment_tb WHERE state_code = 1"));

        if (!$result)
        {
            die('Invalid query: ' . mysqli_error($conn));
        }

        
        while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            ?>

        <div class="departmentItem">
            <div class="departmentName-container">

                <header class="header" name="departmentName"><?php echo  $rows['department_name'];?></header>

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
                        <p class="row2-value" name="totalFeedbackWithoutComment"><?php echo  $tFeedbackWithoutComment;?></p>
                    </div>

                    <div class="row3">
                        <div class="col1">
                            <p class="row3-col1-title">Total Anonymous Feedback</p>
                            <p class="row3-col1-value" name="totalAnonymousFeedback"><?php echo  $tAnonymousFeedback;?></p>
                        </div>

                        <div class="col2">
                            <p class="row3-col2-title">Total Anonymous Comment</p>
                            <p class="row3-col2-value" name="totalAnonymousComment"><?php echo $tAnonymousComment?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
        }
    ?>
    <!-- </div> -->
</body>

</html>