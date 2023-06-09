<?php
include_once "../data/connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/login_adduser.css" />
  <link rel="stylesheet" href="../css/feedbackCreate.css" />
</head>

<body>
  <div class="form-wrapper">
    <form action="" id="form" class="form-right" style="width: 100%;" method="POST">
      <p class="title-right">Add Category</p>
      <input type="text" class="input-username" id="cate_name" name="cate_name" placeholder="Category Name" required />
      <input type="text" class="input-password" id="cate_des" name="cate_des" placeholder="Category Description" required />
      <div class="buttonEdit" style="display: flex; flex-direction:row; gap: 1vw">
        <button type="submit" class="login-btn" id="submit" name="Add">Add</button>
        <button type="button" class="login-btn" id="cancelEdit">Cancel</button>
      </div>
    </form>
  </div>
<?php
if (isset($_POST['Add'])) {
  // Lấy dữ liệu từ biểu mẫu
  $cate_name = $_POST['cate_name'];
  $cate_des = $_POST['cate_des'];

  // Thực hiện truy vấn chèn dữ liệu
  $insertUserQuery = mysqli_query($conn, "INSERT INTO category_tb (category_name,category_desc)
      VALUES ('$cate_name', '$cate_des')");

  // Thực thi truy vấn và kiểm tra xem liệu có thành công hay không
  if ($insertUserQuery) {
    echo '<script>alert("Category added successfully")</script>';
  } else {
    echo '<script>console.log("no data")</script>';
  }
}
?>
</body>

</html>
