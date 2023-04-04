<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Feedback Management</title>
    <link rel="stylesheet" href="../css/feedbackCreate.css" />
    <link rel="stylesheet" href="../css/adminQaFeedbackManagement.css" />
    <script
      src="https://code.jquery.com/jquery-3.6.4.js"
      integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div class="qa-ad-fb-mn-container">
      <div class="title-contact-btn">
        <p class="ad-qa-mn-title">Feedback Management</p>
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
            <div class="qa-ad-thead-cell">Author</div>
            <div class="qa-ad-thead-cell">Content</div>
            <div class="qa-ad-thead-cell">Category</div>
            <div class="qa-ad-thead-cell">Document</div>
            <div class="qa-ad-thead-cell">Deadline</div>
            <div class="qa-ad-thead-cell">Like</div>
            <div class="qa-ad-thead-cell">Dislike</div>
            <div class="qa-ad-thead-cell">Comment</div>
          </div>
          <div class="qa-ad-fb-tbody">
            <div class="qa-ad-tbody-cell" title="Author"><p>Author</p></div>
            <div class="qa-ad-tbody-cell" title="Content"><p>Content</p></div>
            <div class="qa-ad-tbody-cell" title="Category">
              <p>Category</p>
            </div>
            <div class="qa-ad-tbody-cell" title="Document"><p>Document</p></div>
            <div class="qa-ad-tbody-cell" title="Deadline"><p>Deadline</p></div>
            <div class="qa-ad-tbody-cell" title="Like"><p>Like</p></div>
            <div class="qa-ad-tbody-cell" title="Dislike"><p>Dislike</p></div>
            <div class="qa-ad-tbody-cell" title="Comment"><p>Comment</p></div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
