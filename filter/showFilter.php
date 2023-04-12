<?php
    $filterId = $_POST['idFilter'];
    $filterId = trim($filterId);
    $result = mysqli_query($conn, "SELECT * FROM department_tb WHERE state_code = '{$filterId}'");
    if($filterId){
        $result = mysqli_query($conn, "SELECT * FROM department_tb WHERE state_code = $filterId");
    }
    else{
        $result = mysqli_query($conn, "SELECT * FROM department_tb");
    }

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
?>
    <div class="qa-ad-tbody-cell" title="<?php echo  $row['department_name'];?>">
        <p><?php echo  $row['department_name'];?></p>
    </div>

    <div class="qa-ad-tbody-cell" title="<?php echo  $row['department_name'];?>">
        <p><?php echo  $row['department_name'];?></p>
    </div>

    <div class="qa-ad-tbody-cell" title="<?php echo  $row['department_name'];?>">
        <p><?php echo  $row['department_name'];?></p>
    </div>
    
    <div class="qa-ad-tbody-cell" title="<?php echo  $row['department_name'];?>">
        <p><?php echo  $row['department_name'];?></p>
    </div>
<?php    
    }
    echo $result;
?>