<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/qaDepartments.css">
</head>

<body>
    <div class="qaDepartment-container">
        <header class="header">Feedback Notification</header>

        <div class="tableManagement">
            <div class="thead">
                <div class="tbTitle">Author</div>
                <div class="tbTitle">Description</div>
                <div class="tbTitle">Time</div>
                <div class="tbTitle">Status</div>
            </div>

            <?php
            session_start();
            include_once("./data/connection.php");
            $result = mysqli_query($conn, "SELECT * FROM notification_tb a, user_tb b WHERE b.email = a.email");

            if (!$result)
            {
                die('Invalid query: ' . mysqli_error($conn));
            }

            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
            {
            ?>
                <div class="tbody">
                    <div class="tbBody" name="author"><?php echo  $row['fullname'];?></div>
                    <div class="tbBody" name="description"><?php echo  $row['notify_desc'];?></div>
                    <div class="tbBody" name="time"><?php echo  $row['notify_time'];?></div>
                    <div class="tbBody" name="status"><?php echo  $row['notify_status'];?></div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>