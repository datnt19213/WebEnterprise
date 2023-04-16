<?php 
include_once "../data/connection.php";
if (isset($_POST['delCateId'])){
$delCategoryId = $_POST['delCateId'];
$resultDeleteCate = mysqli_query($conn, "DELETE FROM category_tb WHERE category_id='$delCategoryId'" );
if ($resultDeleteCate) {
    echo 'Delete successfully';
}else{
    echo 'Delete failed';
}
}else {
    echo 'Delete Error';
}
?>