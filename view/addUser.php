<?php
session_start();
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
    <form enctype="multipart/form-data" id="form" class="form-right" style="height: 100%;" method="POST">
      <p class="title-right">Add User</p>
      <input type="email" class="input-username" id="add_email" name="userEmail" placeholder="Email" required />
      <input type="password" class="input-password" id="add_pass" name="userPass" placeholder="Password" required />
      <input type="text" class="input-password" id="fullName" name="fullName" placeholder="Fullname" required />
      <div class="select-data-to-submit" style="gap: 0; height:fit-content; padding: 1% 0px">

        <div class="input-password" style="position: relative;">
          <p class="fb-end-date-label" style="position: absolute; top: 25%;color: var(--dark-blue); left: 0 ">Day of birth</p>
          <input type="date" name="dobUser" id="inputDate" class="fb-end-date-input" required width="70%" style="text-align: right;background-color: transparent; padding: 0px;" />
        </div>


        <?php
        $addUserDepLists = mysqli_query($conn, "SELECT * FROM department_tb");
        ?>

        <select name="userDepartment" id="addU_department" class="input-password" required style="background-color: #fff;color: var(--dark-blue); margin-bottom: 0.5%">
          <option value="" selected>Select Department</option>

          <?php
          
          while ($addUserDepListRow = mysqli_fetch_array($addUserDepLists, MYSQLI_ASSOC)) {
          ?>

            <option value="<?php echo $addUserDepListRow['department_id']; ?>">
              <?php echo $addUserDepListRow['department_name']; ?>
            </option>

          
            <?php } ?>

        </select>
        <!-- <script>
          $("#addU_department").change(() => { 
            $("#addU_department").val()
          })
          </script> -->
        <?php
        $addUserPosLists = mysqli_query($conn, "SELECT * FROM position_tb");
        ?>

        <select name="userPosition" id="addU_position"  class="input-password" required style="background-color: transparent; color: var(--dark-blue)">
          <option value="" selected>Select Position</option>

          <?php
          while ($addUserPosListRow = mysqli_fetch_array($addUserPosLists, MYSQLI_ASSOC)) {
          ?>

            <option value="<?php echo $addUserPosListRow['position_id']; ?>">
              <?php echo $addUserPosListRow['position_name']; ?>
            </option>

          <?php 
        }
         ?>

        </select>



      </div>
      <div style="display: flex; background-color: transparent">
        <label for="" class="checkbox-label">
          <input type="radio" class="check-box-terms" id="roleUser" name="roleUser" value="0" />
          <p class="terms-check">Staff</p>
        </label>
        <label for="" class="checkbox-label">
          <input type="radio" class="check-box-terms" id="roleUser" name="roleUser" value="1" />
          <p class="terms-check">QA-coordinator</p>
        </label>
        <label for="" class="checkbox-label">
          <input type="radio" class="check-box-terms" id="roleUser" name="roleUser" value="2" />
          <p class="terms-check">QA-master</p>
        </label>
        <label for="" class="checkbox-label">
          <input type="radio" class="check-box-terms" id="roleUser" name="roleUser" value="3" />
          <p class="terms-check">Admin</p>
        </label>
      </div>
      <button type="button" class="login-btn" id="submitAddUser" name="submitUserData" >Add New</button>
      <script>
        $(document).ready(function(){
          $("#addU_department").change(function(){
            localStorage.setItem("dep", $("#addU_department").val())
            alert(localStorage.getItem("dep"));
          })
          $("#addU_position").change(function(){
            localStorage.setItem("pos", $("#addU_position").val())
            alert(localStorage.getItem("pos"));
          })
          $("#submitAddUser").click(function(){

            var userEmail = $("#add_email").val();
            var userPass = $("#add_pass").val();
            var fullName = $("#fullName").val();
            var dobAddUser = $("#inputDate").val();
            var userPosition = localStorage.getItem("pos");
            var userDepartment = localStorage.getItem("dep");
            var roleUser = $("#roleUser").val();
            // alert(userEmail + " | " + userPass + " | " + fullName + " | " + dobAddUser + " | " + userPosition +" | " + userDepartment + " | " + roleUser)
            
            $.post({
              url: "./controller/usersAdd.php",
              type: "POST",
              data: {
                mail: userEmail,
                pass: userPass,
                name: fullName,
                dob: dobAddUser,
                pos: userPosition,
                dep: userDepartment,
                role: roleUser
              },
              success: function(data){
                $("#parse-data").html(data);
              }
            })
          })
        })
      </script>
    <div id="parse-data"></div>
    </form>
  </div>



  <?php
      // if (isset($_POST['submitUserData'])) {
      //   // Lấy dữ liệu từ biểu mẫu
      //   $userEmail = $_POST['userEmail'];
      //   $userPass = $_POST['userPass'];
      //   $fullName = $_POST['fullName'];
      //   $dobAddUser = $_POST['dobUser'];
      //   $userPosition = $_POST['userPosition'];
      //   $userDepartment = $_POST['userDepartment'];
      //   $roleUser = $_POST['roleUser'];

      //   $pass = md5($userPass);
      //   $dob = date('Y-m-d', $dobUser);

      //   echo '<script>alert("'.$userEmail.'")</script>';
      //   echo '<script>alert("'.$userPass.'")</script>';
      //   echo '<script>alert("'.$fullName.'")</script>';
      //   echo '<script>alert("'.$dobAddUser.'")</script>';
      //   echo '<script>alert("'.$userPosition.'")</script>';
      //   echo '<script>alert("'.$userDepartment.'")</script>';
      //   echo '<script>alert("'.$roleUser.'")</script>';

      //   // Thực hiện truy vấn chèn dữ liệu
      //   $insertUserQuery = mysqli_query($conn, "INSERT INTO user_tb (email,password,fullname,dob,position_id,deparment_id,state_code)
      //       VALUES ('$add_email', '$pass', '$fullName', '$dob', '$addU_position', '$addU_department', '$roleUser')");

      //   // Thực thi truy vấn và kiểm tra xem liệu có thành công hay không
      //   if ($insertUserQuery) {
      //     echo '<script>alert("User added successfully")</script>';
      //   } else {
      //     echo '<script>alert("error")</script>';
      //   }
      // }else{
        
      //   echo '<script>alert("No submit")</script>';
      // }
      ?>
</body>

</html>