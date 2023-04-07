<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/root.css">
    <link rel="stylesheet" href="../css/qaDepartqaManager.css">
    <link rel="stylesheet" href="../css/feedbackCreate.css" />
    <link rel="stylesheet" href="../css/adminQaFeedbackManagement.css" />
</head>
<!-- Chua ket noi database -->
<!-- Chua ket noi database -->
<!-- Chua ket noi database -->
<!-- Chua ket noi database -->
<body>
    <div class="qaDepartmentqaMa-container">
        <div class="title">
            <header class="header">QA Departments QA Management</header>

            <div class="filter-btn">
            Filter&nbsp;
            <img src="../image/filter.png" alt="filter-img" />
            <select name="" id="" class="option-list-cate filter-fb" required>
              <option value="0" selected>All</option>
              <option value="1">Most Like</option>
              <option value="2">Most Dislike</option>
              <option value="3">Most Comment</option>
              <option value="4">Newest</option>
              <option value="5">Ended</option>
            </select>
          </div>
        </div>

        <div class="tableManagement">
            <div class="thead">
                <div class="tbTitle">Department name</div>
                <div class="tbTitle">Description</div>
                <div class="tbTitle">Staff</div>
                <div class="tbTitle">Feedback</div>
            </div>

            <div class="tbody">
                <div class="tbBody" name="departmentName">Department name</div>
                <div class="tbBody" name="description">Description</div>
                <div class="tbBody" name="staff">9999</div>
                <div class="tbBody" name="feedback">9999</div>
            </div>
        </div>
    </div>
</body>

</html>