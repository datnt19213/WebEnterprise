<?php
include_once("../data/connection.php");
    if (isset($_POST['name']) && isset($_POST['desc'])) {

        $nameCate = $_POST['name'];
        $descCate = $_POST['desc'];

        $insertUserQuery = mysqli_query($conn, "INSERT INTO category_tb (category_name,category_desc)
        VALUES ('$nameCate', '$descCate')");

        if ($insertUserQuery) {
            echo 'Category Added Successfully';
        } else {
            echo 'Category Added Failed';
        }
    }else{
        echo 'No data to add';
    }
?>