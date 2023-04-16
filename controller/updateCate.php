<?php
include_once("../data/connection.php");
    if (isset($_POST['cateIdEd']) && isset($_POST['cateNameEd']) && isset($_POST['cateDesEd'])) {

        $cateIdEdit = $_POST['cateIdEd'];
        $nameCateEdit = $_POST['cateNameEd'];
        $descCateEdit = $_POST['cateDesEd'];

        $insertUserQuery = mysqli_query($conn, "UPDATE category_tb SET category_name='$nameCateEdit',category_desc='$descCateEdit' WHERE category_id='$cateIdEdit' ");

        if ($insertUserQuery) {
            echo 'Category Updated Successfully';
        } else {
            echo 'Category Updated Failed';
        }
    }else{
        echo 'No data to add';
    }
?>