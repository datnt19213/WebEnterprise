<?php
    include_once("../data/connection.php");

    $filterId = $_POST['id'];

    if (!$filterId) {
        $filterRes = mysqli_query($conn, "SELECT * FROM department_tb");
    }
    $filterRes = mysqli_query($conn, "SELECT * FROM department_tb WHERE state_code = '{$filterId}'");
    
    while ($row = mysqli_fetch_array($filterRes, MYSQLI_ASSOC))
    {
?>
    <div class="qa-ad-fb-tbody">
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
    </div>
<?php
    }
?>