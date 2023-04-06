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
    <div class="qa-ad-fb-mn-container">
        <div class="title-contact-btn">
            <p class="ad-qa-mn-title">QA Departments</p>
            <div class="ad-qa-mn-btn">
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
                    <div class="qa-ad-tbody-cell" title="Tame" name="Tame">
                        <p>__/__/____</p>
                    </div>
                    <div class="qa-ad-tbody-cell" title="DoB" name="DoB">
                        <p>Name</p>
                    </div>
                    <div class="qa-ad-tbody-cell" title="Tel" name="Tel">
                        <p>0123456789</p>
                    </div>
                    <div class="qa-ad-tbody-cell" title="Address" name="Address">
                        <p>a/b/c</p>
                    </div>
                    <div class="qa-ad-tbody-cell" title="Email" name="Email">
                        <p>abc@gmail.com</p>
                    </div>
                    <div class="qa-ad-tbody-cell" title="Position" name="Position">
                        <p>QA Management</p>
                    </div>
                    <div class="qa-ad-tbody-cell" title="Department" name="Department">
                        <p>QA Management</p>
                    </div>
                    <div class="qa-ad-tbody-cell" title="Comment" name="Comment">
                        <p>abcdxyz...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>