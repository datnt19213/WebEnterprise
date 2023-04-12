<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/root.css">
    <link rel="stylesheet" href="../css/qaDepartqaManager.css">
    <link rel="stylesheet" href="../css/feedbackCreate.css" />
    <!-- <link rel="stylesheet" href="../css/adminQaFeedbackManagement.css" /> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> -->    
    <script type="text/javascript" src="filter/showFilter.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>

<body>
    <?php
        session_start();
        include_once("../data/connection.php");

        $filter = mysqli_query($conn, "SELECT * FROM filter_tb");
        $result = mysqli_query($conn, "SELECT * FROM department_tb");
    ?>

    <div class="qaDepartmentqaMa-container">
        <div class="title-contact-btn">
            <!-- <header class="header">QA Departments Management</header> -->
            <p class="ad-qa-mn-title">QA Departments Management</p>

            <div class="filter-btn">
                Filter&nbsp;
                <img src="./image/filter.png" alt="filter-img" />
                <select class="option-list-cate filter-fb" id="mySelect" name="mySelect" onchange="selectFilter()">
                    <option value="0" selected>All</option>
                    <option value="1">Most Like</option>
                    <option value="2">Most Dislike</option>
                    <option value="3">Most Comment</option>
                    <option value="4">Newest</option>
                    <option value="5">Ended</option>
                    <!-- <?php
                        while ($row = mysqli_fetch_array($filter, MYSQLI_ASSOC)){
                    ?>
                        <option value=<?php echo $row['filter_id']?>><?php echo $row['filter_name'];?></option>
                    <?php
                        }
                    ?> -->
                </select>
            </div>
        </div>

        <div class="qa-ad-scroll-table">
            <div class="qa-ad-table-data">
                <div class="qa-ad-fb-thead">
                <div class="qa-ad-thead-cell">Department name</div>
                <div class="qa-ad-thead-cell">Description</div>
                <div class="qa-ad-thead-cell">Staff</div>
                <div class="qa-ad-thead-cell">Document</div>
            </div>

            <div class="y-scroll-tb-data">
                <div class="qa-ad-fb-tbody" id="showFilterData">
                    <div class="qa-ad-tbody-cell" title="department_name">
                        <p>department_name</p>
                    </div>
                    <div class="qa-ad-tbody-cell" title="department_name">
                        <p>department_name</p>
                    </div>
                    
                    <div class="qa-ad-tbody-cell" title="department_name">
                        <p>department_name</p>
                    </div>
                    
                    <div class="qa-ad-tbody-cell" title="department_name">
                        <p>department_name</p>
                    </div>


                    <!-- <div class="qa-ad-tbody-cell" title="<?php echo  $row['department_name'];?>">
                        <p><?php echo  $row['department_name'];?></p>
                    </div>

                    <div class="qa-ad-tbody-cell" title="<?php echo  $row['department_name'];?>">
                        <p><?php echo  $row['department_name'];?></p>
                    </div>

                    <div class="qa-ad-tbody-cell" title="<?php echo  $row['department_name'];?>">
                        <p><?php echo  $row['department_name'];?></p>
                    </div>

                    <div class="qa-ad-tbody-cell" title="<?php echo  $row['department_name'];?>">
                        <p><?php echo  $row['department_name'];?></p>
                    </div> -->
                </div>
            </div>
        </div>
        <!-- <div class="tableManagement" id="tableManagement">
            <div class="thead">
                <div class="tbTitle">Department name</div>
                <div class="tbTitle">Description</div>
                <div class="tbTitle">Staff</div>
                <div class="tbTitle">Feedback</div>
            </div>

            <div class="tbody" id="showFilterData"></div>
                <div class="tbBody" name="departmentName"><?php echo  $row['department_name'];?></div>
                <div class="tbBody" name="description"><?php echo  $row['department_desc'];?></div>
                <div class="tbBody" name="staff"><?php echo  $row['department_name'];?></div>
                <div class="tbBody" name="feedback"><?php echo  $row['state_code'];?></div>
        </div> -->
    </div>
</body>
</html>