<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../css/qaDepartments.css"> -->
    <link rel="stylesheet" href="../css/qaDepartqaManager.css">
</head>

<body>
    <div class="qaDepartment-container">
        <div class="title-contact-btn">
            <!-- <header class="header">Feedback Notification</header> -->
            <p class="ad-qa-mn-title">Feedback Notification</p>
        </div>

        <div class="qa-ad-scroll-table">
            <div class="qa-ad-table-data">
                <div class="qa-ad-fb-thead">
                    <div class="qa-ad-thead-cell">Author</div>
                <div class="qa-ad-thead-cell">Description</div>
                <div class="qa-ad-thead-cell">Time</div>
                <div class="qa-ad-thead-cell">Status</div>
            </div>

            <div class="y-scroll-tb-data">
                <?php
                    session_start();
                    include_once("../data/connection.php");
                    $result = mysqli_query($conn, "SELECT * FROM notification_tb a, user_tb b WHERE b.email = a.email");
                    
                    if (!$result)
                    {
                        die('Invalid query: ' . mysqli_error($conn));
                    }
                    
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                    {
                ?>
                    <div class="qa-ad-fb-tbody">
                        <div class="qa-ad-tbody-cell" title="<?php echo  $row['fullname'];?>">
                            <p><?php echo  $row['fullname'];?></p>
                        </div>

                        <div class="qa-ad-tbody-cell" title="<?php echo  $row['notify_desc'];?>">
                            <p><?php echo  $row['notify_desc'];?></p>
                        </div>

                        <div class="qa-ad-tbody-cell" title="<?php echo  $row['notify_time'];?>">
                            <p><?php echo  $row['notify_time'];?></p>
                        </div>

                        <div class="qa-ad-tbody-cell" title="<?php echo  $row['notify_status'];?>">
                            <p><?php echo  $row['notify_status'];?></p>
                        </div>
                    </div>
                <?php
                    }
                    ?>
            </div>
        </div>

        <!-- <div class="tableManagement">
            <div class="thead">
                <div class="tbTitle">Author</div>
                <div class="tbTitle">Description</div>
                <div class="tbTitle">Time</div>
                <div class="tbTitle">Status</div>
            </div>
            
        <div class="tbody">
            <div class="tbBody" name="author"><?php echo  $row['fullname'];?></div>
            <div class="tbBody" name="description"><?php echo  $row['notify_desc'];?></div>
            <div class="tbBody" name="time"><?php echo  $row['notify_time'];?></div>
            <div class="tbBody" name="status"><?php echo  $row['notify_status'];?></div>
        </div> -->
    </div>
</body>

</html>