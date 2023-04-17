<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/root.css">
    <link rel="stylesheet" href="../css/qaDepartqaManager.css">
    <!-- <link rel="stylesheet" href="../css/feedbackCreate.css" /> -->
    <!-- <link rel="stylesheet" href="../css/adminQaFeedbackManagement.css" /> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>     -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js" integrity="sha512-bztGAvCE/3+a1Oh0gUro7BHukf6v7zpzrAb3ReWAVrt+bVNNphcl2tDTKCBr5zk7iEDmQ2Bv401fX3jeVXGIcA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->

</head>

<body>
    <?php
        session_start();
        include_once("../data/connection.php");

        $result = mysqli_query($conn, "SELECT * FROM department_tb");
    ?>

    <div class="qaDepartmentqaMa-container">
        <div class="title-contact-btn">
            <!-- <header class="header">QA Departments Management</header> -->
            <p class="ad-qa-mn-title">QA Departments Management</p>

            <!-- <form method="POST" enctype="multipart/form-data" class="filter-btn">
                Filter&nbsp;
                <img src="./image/filter.png" alt="filter-img" />
                <select class="option-list-cate filter-fb" id="mySelection" name="mySelect">
                    <option value="0" selected>All</option>
                    <option value="1">Most Like</option>
                    <option value="2">Most Dislike</option>
                    <option value="3">Most Comment</option>
                    <option value="4">Newest</option>
                    <option value="5">Ended</option>
                </select>

                <script>
                    $("#mySelection").change(function (e) { 
                        e.preventDefault();
                        var selectVal = $("#mySelection").val();
                        $.post({
                            url: "./controller/showFilter.php",
                            type: "POST",
                            data: "id="+selectVal,
                            success: function (data) {
                                $("#showFilterData").html(data);   
                            }
                        });
                    });
                </script> 
            </form>-->
        </div>

        <div class="qa-ad-scroll-table">
            <div class="qa-ad-table-data">
                <div class="qa-ad-fb-thead">
                <div class="qa-ad-thead-cell">Department name</div>
                <div class="qa-ad-thead-cell">Description</div>
                <div class="qa-ad-thead-cell">Staff</div>
                <div class="qa-ad-thead-cell">Feedback</div>
            </div>

            <div class="y-scroll-tb-data">
                <?php
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                    {
                ?>
                    <div class="qa-ad-fb-tbody">
                        <div class="qa-ad-tbody-cell" title="<?php echo  $row['department_name'];?>">
                            <p><?php echo  $row['department_name'];?></p>
                        </div>
                        
                        <div class="qa-ad-tbody-cell" title="<?php echo  $row['department_desc'];?>">
                            <p><?php echo  $row['department_desc'];?></p>
                        </div>
                        
                        <div class="qa-ad-tbody-cell" title="<?php echo  $row['department_id'];?>">
                            <p><?php echo  $row['department_id'];?></p>
                        </div>
                        
                        <div class="qa-ad-tbody-cell" title="<?php echo  $row['department_id'];?>">
                            <p><?php echo  $row['department_id'];?></p>
                        </div>
                    </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>