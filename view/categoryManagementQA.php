<?php 
  include_once "../data/connection.php";
?>

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
  <div class="form-wrapper-cate" >
    <div id="addFormCate" style="display: none; width: 100%">
      <div class="form-wrapper">
      <form action="" id="form" class="form-right" style="width: 100%;" method="POST">
        <p class="title-right">Add Category</p>
        <input type="text" class="input-username" id="cate_name" name="cate_name" placeholder="Category Name" required />
        <input type="text" class="input-password" id="cate_des" name="cate_des" placeholder="Category Description" required />
        <div class="buttonEdit" style="display: flex; flex-direction:row; gap: 1vw">
          <button type="button" class="login-btn" id="submitAdd" name="Add">Add</button>
          <button type="button" class="login-btn" id="cancelAdd">Cancel</button>
        </div>

        <script>
          $("#submitAdd").click(function() {
            
            var cateName = $("#cate_name").val();
            var cateDesc = $("#cate_des").val();

            if(cateName === "" || cateDesc === ""){
              alert("Please Enter fields");
            }else{
              $.post({
                url: "./controller/addCate.php",
                type: "POST",
                data: {
                  name: cateName,
                  desc: cateDesc
                },
                success: function(data) {
                  alert(data);
                  $("#addFormCate").fadeOut('fast');
                  $("#manageCateForm").fadeIn('fast');
                  document.location.href = "index.php?page=management";
                }
              })
            }
          })
        </script>
      </form>
    </div>
  </div>
    <div class="qa-ad-fb-mn-container" style="position: relative" id="manageCateForm">
      <form method="post" class="form-right-cate">
        <p class="title-cate">Category Management</p>
        <button type="button" class="add-btn" id="addCate">Add Category</button>
        <script>
      $('#addCate').click(function(){
        $("#manageCateForm").fadeOut('fast');
        $("#addFormCate").fadeIn('fast');        
      });
      $('#cancelAdd').click(function(){
        $("#addFormCate").fadeOut('fast');
        $("#manageCateForm").fadeIn('fast');        
      });
      
    </script>
      </form>
      <div class="qa-ad-scroll-table">
        <div class="qa-ad-table-data">
          <div class="qa-ad-fb-thead">
            <div class="qa-ad-thead-cell">Category Name</div>
            <div class="qa-ad-thead-cell">Category Description</div>
            <div class="qa-ad-thead-cell">Operations</div>
          </div>
          <div class="y-scroll-tb-data">
          <?php
          $sql = "SELECT * from category_tb WHERE category_id";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
          ?>
              <form class="qa-ad-fb-tbody" method="post">
                <div class="qa-ad-tbody-cell" title="<?php echo $row["category_name"]; ?>"><p><?php echo $row["category_name"]; ?></p></div>
                <div class="qa-ad-tbody-cell" title="<?php echo $row["category_desc"]; ?>"><p><?php echo $row["category_desc"]; ?></p></div>
                <div class="delete-edit">
                  <button type="button" class="edit-icon" id="editCate<?php echo $row['category_id']; ?>" style="cursor: pointer; background-color: transparent; border: none;">
                    <img src="./image/edit.png" alt="edit" />
                  </button>

                  <?php 
                      $idCategoryEdit = $row["category_id"];
                      $resultUpdateCate = mysqli_query($conn, "SELECT * FROM category_tb WHERE category_id = '$idCategoryEdit'");
                      
                      if(!$resultUpdateCate){
                        echo '<script>alert("error:'.mysqli_error($conn).'")</script>';
                      }
                      
                      $updateCateQuery = mysqli_fetch_assoc($resultUpdateCate);
                      // echo '<script>console.log("'.$updateCateQuery['category_name'].'");</script>';
                      $cateNameVal = $updateCateQuery['category_name'];
                      $cateDesVal = $updateCateQuery['category_desc'];
                    ?>
                  <script>
                    $("#editCate<?php echo $idCategoryEdit; ?>").click(function(){
                      // alert("Thay chua?")
                      console.log("<?php $cateNameVal;?>");
                      $("#editForm").fadeIn("fast");
                      $("#cateIdEdit").val("<?php echo $idCategoryEdit; ?>")
                      $("#cate_name_edit").val("<?php echo $cateNameVal; ?>");
                      $("#cate_des_edit").val("<?php echo $cateDesVal; ?>");
                    })
                    $("#cancelEdit").click(function(){
                      $("#editForm").fadeOut("fast");
                    })
                  </script>
                  <a class="delete-icon" id="deleteCate<?php echo $row['category_id']; ?>" style="cursor: pointer; background-color: transparent; border: none;">
                    <img src="./image/delete.png" alt="delete" />
                  </a>
                  <?php $idCategory = $row["category_id"] ?>
                  <script>
                      $("#deleteCate<?php echo $idCategory; ?>").click(function(){
                        var idCate = <?php echo $idCategory ?>;
                        // console.log("Id day ne: ", idCate);
                        if(confirm('Are you sure you want to delete this category?')){
                          $.post({
                            url: "./controller/deleteCate.php",
                            type: "POST",
                            data: "delCateId="+ idCate,
                            success: function(data){
                              alert(data);
                              document.location.href = "index.php?page=management";
                            }
                          })
                        }
                      });
                  </script>
                </div>
              </form>
              <?php
            }
          }
          ?>
          </div>
        </div>
      </div>

      <form action="" method="post" id="editForm" class="form-right" style="top: 0; left: 0;z-index: 11000; width: 100%; display: none; position: absolute; background-color: #fff" method="POST">
        <p class="title-right">Update Category</p>
        <input type="text" class="input-username" id="cate_name_edit" name="cate_name_edit" placeholder="Category Name" required />
        <input type="text" class="input-password" id="cate_des_edit" name="cate_des_edit" placeholder="Category Description" required />
        <input type="text" class="input-password" id="cateIdEdit" style="display: none;" name="cate_des_edit" placeholder="Category Description" required />
        <div class="buttonEdit" style="display: flex; flex-direction:row; gap: 1vw">
          <button type="button" class="login-btn" id="submitEdit" name="submitEdit">Update</button>
          <button type="button" class="login-btn" id="cancelEdit">Cancel</button>
        </div>
        <script>
          $(document).ready(function() {
            $('#submitEdit').click(function() {
              var cateIdEdit = $('#cateIdEdit').val();
              var cateNameEdit = $('#cate_name_edit').val();
              var cateDesEdit = $('#cate_des_edit').val();
              console.log(cateNameEdit, cateDesEdit);
              
              $.ajax({
                url: './controller/updateCate.php',
                type: 'POST',
                data: { 
                  cateIdEd: cateIdEdit, 
                  cateNameEd: cateNameEdit,
                  cateDesEd: cateDesEdit
                },
                success: function(data) {
                  alert(data);
                  document.location.href = "index.php?page=management";
                }
              });
            });
          });
        </script>
      </form>
    </div>
  </div>
</body>

</html>