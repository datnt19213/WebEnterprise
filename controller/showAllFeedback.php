<?php 

    include_once("../data/connection.php");

    $showAllFb = mysqli_query($conn, "SELECT * FROM feedback_tb ORDER BY feedback_id DESC");

    while ($row = mysqli_fetch_array($showAllFb, MYSQLI_ASSOC))
    {
?>
    <div class="qa-ad-fb-tbody">
        <div class="qa-ad-tbody-cell" title="<?php echo  $row['feedback_id'];?>">
            <p><?php echo  $row['feedback_id'];?></p>
        </div>
        
        <div class="qa-ad-tbody-cell" title="<?php echo  $row['feedback_id'];?>">
            <p><?php echo  $row['feedback_id'];?></p>
        </div>
        
        <div class="qa-ad-tbody-cell" title="<?php echo  $row['feedback_id'];?>">
            <p><?php echo  $row['feedback_id'];?></p>
        </div>
        
        <div class="qa-ad-tbody-cell" title="<?php echo  $row['feedback_id'];?>">
            <p><?php echo  $row['feedback_id'];?></p>
        </div>
    </div>
<?php
    }
?>