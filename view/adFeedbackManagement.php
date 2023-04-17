<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Feedback Management</title>
  <link rel="stylesheet" href="../css/feedbackCreate.css" />
  <link rel="stylesheet" href="../css/adminQaFeedbackManagement.css" />
  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
</head>

<body>
  <div class="qa-ad-fb-mn-container">
    <div class="title-contact-btn">
      <p class="ad-qa-mn-title">Feedback Management</p>
      <div class="ad-qa-mn-btn">
        <form method="POST" enctype="multipart/form-data" class="filter-btn">
          Filter&nbsp;
          <img src="./image/filter.png" alt="filter-img" />
          <select name="" id="mySelection" class="option-list-cate filter-fb" required>
            <option value="all" selected>All</option>
            <option value="like">Most Like</option>
            <option value="dislike">Most Dislike</option>
            <option value="comment">Most Comment</option>
            <option value="new">Newest</option>
            <option value="end">Ended</option>
          </select>

          <script>
            $(document).ready(function() {
              var selectVal = "all";
              $("#showFilterData").load("./controller/showAllFeedback.php");

              $("#mySelection").change(function (e) { 
                e.preventDefault();
                selectVal = $("#mySelection").val();
                console.log(selectVal);
                $.post({
                    url: "./controller/showFilter.php",
                    type: "POST",
                    data: "id="+selectVal,
                    success: function (data) {
                        $("#showFilterData").html(data);   
                    }
                });
            });
          })
          </script>
        </form>
        <a href="./controller/exportData.php" class="ad-qa-mn-download">Download</a>
      </div>
    </div>

    <div class="qa-ad-scroll-table">
      <div class="qa-ad-table-data">
        <div class="qa-ad-fb-thead">
          <div class="qa-ad-thead-cell">Author</div>
          <div class="qa-ad-thead-cell">Content</div>
          <div class="qa-ad-thead-cell">Category</div>
          <div class="qa-ad-thead-cell">Document</div>
          <div class="qa-ad-thead-cell">Deadline</div>
          <div class="qa-ad-thead-cell">Like</div>
          <div class="qa-ad-thead-cell">Dislike</div>
          <div class="qa-ad-thead-cell">Comment</div>
        </div>
        <div class="y-scroll-tb-data" id="showFilterData">
      </div>
    </div>
  </div>
</body>

</html>