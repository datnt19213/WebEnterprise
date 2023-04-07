<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../css/root.css">
    <link rel="stylesheet" href="../css/qaDepartmentsAdmin.css"> -->
    <link rel="stylesheet" href="../css/feedbackCreate.css" />
    <link rel="stylesheet" href="../css/adminQaFeedbackManagement.css" />
    <script src="https://code.jquery.com/jquery-3.6.4.js"
        integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
</head>

<body>
<?php
session_start();
include_once("./data/connection.php");
$result = mysqli_query($conn, "SELECT * FROM user_tb a, position_tb b, department_tb c WHERE b.position_id = a.position_id AND c.department_id = a.department_id");

if (!$result)
{
    die('Invalid query: ' . mysqli_error($conn));
}

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
?>
    <div class="qa-ad-fb-mn-container">
        <div class="title-contact-btn">
            <p class="ad-qa-mn-title">QA Departments</p>
        </div>
        
        <div class="qa-ad-scroll-table">
            <div class="qa-ad-table-data">
                <div class="qa-ad-fb-thead">
                    <div class="qa-ad-thead-cell">Name</div>
                    <div class="qa-ad-thead-cell">DoB</div>
                    <div class="qa-ad-thead-cell">Tel</div>
                    <div class="qa-ad-thead-cell">Address</div>
                    <div class="qa-ad-thead-cell">Email</div>
                    <div class="qa-ad-thead-cell">Position</div>
                    <div class="qa-ad-thead-cell">Department</div>
                    <div class="qa-ad-thead-cell">Description</div>
                </div>
                
                <div class="qa-ad-fb-tbody">
                    <div class="qa-ad-tbody-cell" title="Name" name="Name">
                        <p><?php echo  $row['fullname'];?></p>
                    </div>
                    <div class="qa-ad-tbody-cell" title="DoB" name="DoB">
                        <p><?php echo  $row['dob'];?></p>
                    </div>
                    <div class="qa-ad-tbody-cell" title="Tel" name="Tel">
                        <p><?php echo  $row['tel'];?></p>
                    </div>
                    <div class="qa-ad-tbody-cell" title="Address" name="Address">
                        <p><?php echo  $row['address'];?></p>
                    </div>
                    <div class="qa-ad-tbody-cell" title="Email" name="Email">
                        <p><?php echo  $row['email'];?></p>
                    </div>
                    <div class="qa-ad-tbody-cell" title="Position" name="Position">
                        <p><?php echo  $row['position_name'];?></p>
                    </div>
                    <div class="qa-ad-tbody-cell" title="Department" name="Department">
                        <p><?php echo  $row['department_name'];?></p>
                    </div>
                    <div class="qa-ad-tbody-cell" title="Description" name="Description">
                        <p><?php echo  $row['description'];?></p>
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