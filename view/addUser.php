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
      <p class="title-right">Add User</p>
      <input type="email" class="input-username" name="email" placeholder="Email" required />
      <input type="password" class="input-password" name="pass" placeholder="Password" required />
      <input type="text" class="input-password" name="fullName" placeholder="Fullname" required />
      <div class="select-data-to-submit" style="gap: 0; height:fit-content;">

        <div class="input-password" style="position: relative;">
          <p class="fb-end-date-label" style="position: absolute; top: 25%;color: var(--dark-blue); left: 0 ">Day of birth</p>
          <input type="date" name="dob_addUser" id="inputDate" class="fb-end-date-input" required width="70%" style="text-align: right;background-color: transparent; padding: 0px;" />
        </div>
        <?php
        $addUserPosLists = mysqli_query($conn, "SELECT * FROM position_tb");
        ?>
        <select name="addU_position" id="" class="input-password" required style="background-color: #fff; color: var(--dark-blue)">
          <option value="" selected>Select Position</option>
          <?php
          while ($addUserPosListRow = mysqli_fetch_array($addUserPosLists, MYSQLI_ASSOC)) {
          ?>
            <option value="<?php echo $addUserPosListRow['position_id']; ?>">
              <?php echo $addUserPosListRow['position_name']; ?>
            </option>
          <?php } ?>
        </select>
        <?php
        $addUserDepLists = mysqli_query($conn, "SELECT * FROM department_tb");
        ?>
        <select name="addU_department" id="" class="input-password" required style="background-color: #fff;color: var(--dark-blue); margin-bottom: 0.5%">
          <option value="" selected>Select Deparment</option>
          <?php
          while ($addUserDepListRow = mysqli_fetch_array($addUserDepLists, MYSQLI_ASSOC)) {
          ?>
            <option value="<?php echo $addUserDepListRow['department_id']; ?>">
              <?php echo $addUserDepListRow['department_name']; ?>
            </option>
          <?php } ?>
        </select>

      </div>
      <div style="display: flex;">
        <label for="" class="checkbox-label">
          <input type="radio" class="check-box-terms" name="roleUser" value="0" />
          <p class="terms-check">Staff</p>
        </label>
        <label for="" class="checkbox-label">
          <input type="radio" class="check-box-terms" name="roleUser" value="1" />
          <p class="terms-check">QA-coordinator</p>
        </label>
        <label for="" class="checkbox-label">
          <input type="radio" class="check-box-terms" name="roleUser" value="2" />
          <p class="terms-check">QA-master</p>
        </label>
        <label for="" class="checkbox-label">
          <input type="radio" class="check-box-terms" name="roleUser" value="3" />
          <p class="terms-check">Admin</p>
        </label>
      </div>
      <button type="submit" class="login-btn" name="submit">Add</button>
    </form>
  </div>
</body>
<?php
if (isset($_POST['submit'])) {
  // Lấy dữ liệu từ biểu mẫu
  $email = $_POST['email'];
  $password = $_POST['pass'];
  $fullName = $_POST['fullName'];
  $dob_addUser = $_POST['dob_addUser'];
  $addU_position = $_POST['addU_position'];
  $addU_department = $_POST['addU_department'];
  $roleUser = $_POST['roleUser'];

  $pass = md5($password);
  $dob = date('Y-m-d', $dob_addUser);
  // Thực hiện truy vấn chèn dữ liệu
  $insertUserQuery = mysqli_query($conn, "INSERT INTO user_tb (email, password, fullname, dob, position_id , deparment_id , state_code)
      VALUES ('$email', '$pass', '$fullName', '$dob', '$addU_position', '$addU_department', '$roleUser')");

  // Thực thi truy vấn và kiểm tra xem liệu có thành công hay không
  if ($insertUserQuery) {
    echo "User added successfully";
  } else {
    echo "error: " .mysqli_error($conn);
  }
}
?>

</html>