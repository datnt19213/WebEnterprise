<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/cate_manager.css" />
  <link rel="stylesheet" href="../css/adminQaFeedbackManagement.css" />
</head>

<body>
  <div class="form-wrapper-cate">
    <div class="qa-ad-fb-mn-container">
      <div class="form-right-cate">
        <p class="title-cate">Category Management</p>
        <button class="add-btn">Add Category</button>
      </div>
      <div class="qa-ad-scroll-table">
        <div class="qa-ad-table-data">
          <div class="qa-ad-fb-thead">
            <div class="qa-ad-thead-cell">Category Name</div>
            <div class="qa-ad-thead-cell">Category Description</div>
            <div class="qa-ad-thead-cell">Operations</div>
          </div>
          <div class="y-scroll-tb-data">
          <?php
          include_once "../data/connection.php";
          $sql = "SELECT * from category_tb";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
          ?>
              <form class="qa-ad-fb-tbody">
                <div class="qa-ad-tbody-cell" title="<?php echo $row["category_name"]; ?>"><p><?php echo $row["category_name"]; ?></p></div>
                <div class="qa-ad-tbody-cell" title="<?php echo $row["category_desc"]; ?>"><p><?php echo $row["category_desc"]; ?></p></div>
                <div class="delete-edit">
                  <a class="edit-icon" href="?page=edit&category_id=<?php echo $row["category_id"]; ?>">
                    <img src="./image/edit.png" alt="edit" />
                  </a>
                  <a class="delete-icon" onclick="return confirm('Are you sure you want to delete this category?');">
                    <img src="./image/delete.png" alt="delete" />
                  </a>
                </div>
              </form>
              <?php
            }
          }
          ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>