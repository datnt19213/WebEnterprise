<?php
    include_once("../data/connection.php");

    $filterId = $_POST['id'];
    if($filterId == "all"){
        $filterRes = mysqli_query($conn, "SELECT * FROM feedback_tb, user_tb, category_tb, contact_tb, comment_tb 
        WHERE feedback_tb.feedback_id = contact_tb.feedback_id 
        AND feedback_tb.email = user_tb.email 
        AND feedback_tb.category_id = category_tb.category_id
        AND feedback_tb.feedback_id = comment_tb.feedback_id");
        while ($row = mysqli_fetch_array($filterRes, MYSQLI_ASSOC))
        {
?>
        <div class="qa-ad-fb-tbody">
            <div class="qa-ad-tbody-cell" title="<?php echo  $row['email'];?>">
                <p><?php echo  $row['email'];?></p>
            </div>
            <div class="qa-ad-tbody-cell" title="<?php echo  $row['feedback_content'];?>">
                <p><?php echo  $row['feedback_content'];?></p>
            </div>
            <div class="qa-ad-tbody-cell" title="<?php echo  $row['category_name'];?>">
                <p><?php echo  $row['category_name'];?></p>
            </div>
            <div class="qa-ad-tbody-cell" title="<?php echo  $row['document'];?>">
                <p><?php echo  $row['document'];?></p>
            </div>
            <div class="qa-ad-tbody-cell" title="<?php echo  $row['started_date'];?>">
                <p><?php echo  $row['started_date'];?></p>
            </div>
            <div class="qa-ad-tbody-cell" title="<?php echo  $row['like'];?>">
                <p><?php echo  $row['like'];?></p>
            </div>
            <div class="qa-ad-tbody-cell" title="<?php echo  $row['dislike'];?>">
                <p><?php echo  $row['dislike'];?></p>
            </div>
            <div class="qa-ad-tbody-cell" title="<?php echo  $row['comment'];?>">
                <p><?php echo  $row['comment'];?></p>
            </div>
        </div>
<?php
        }
    }
    elseif($filterId == "like"){
        $sql = "SELECT feedback_tb.feedback_id, feedback_tb.*, SUM(contact_tb.like) as total_likes FROM feedback_tb
            INNER JOIN contact_tb ON feedback_tb.feedback_id = contact_tb.feedback_id GROUP BY feedback_tb.feedback_id
            ORDER BY total_likes DESC LIMIT 10";

        $filterRes = mysqli_query($conn, $sql);
        
        while($row = mysqli_fetch_array($filterRes, MYSQLI_ASSOC)){
            
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
    }
    elseif($filterId == "dislike"){
        $sql = "SELECT feedback_tb.feedback_id, feedback_tb.*, SUM(contact_tb.dislike) as total_dislikes FROM feedback_tb
            INNER JOIN contact_tb ON feedback_tb.feedback_id = contact_tb.feedback_id GROUP BY feedback_tb.feedback_id
            ORDER BY total_dislikes DESC LIMIT 10";

        $filterRes = mysqli_query($conn, $sql);
        
        while($row = mysqli_fetch_array($filterRes, MYSQLI_ASSOC)){
            
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
    }
    elseif($filterId == "comment"){
        $sql = "SELECT feedback_tb.feedback_id, feedback_tb.feedback_content, COUNT(comment_tb.comment_id) as total_comments FROM feedback_tb
            INNER JOIN comment_tb ON feedback_tb.feedback_id = comment_tb.feedback_id WHERE comment_tb.state_code = 1 GROUP BY feedback_tb.feedback_id
            ORDER BY total_comments DESC LIMIT 10;";

        $filterRes = mysqli_query($conn, $sql);
        
        while($row = mysqli_fetch_array($filterRes, MYSQLI_ASSOC)){
            
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
    }
    elseif($filterId == "new"){
        $sql = "SELECT * FROM feedback_tb WHERE started_date <= CURDATE() ORDER BY started_date DESC LIMIT 10";

        $filterRes = mysqli_query($conn, $sql);
        
        while($row = mysqli_fetch_array($filterRes, MYSQLI_ASSOC)){
            
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
    }
    elseif($filterId == "end"){
        $sql = "SELECT * FROM feedback_tb WHERE ended_date <= CURDATE() ORDER BY ended_date ASC LIMIT 10";

        $filterRes = mysqli_query($conn, $sql);
        
        while($row = mysqli_fetch_array($filterRes, MYSQLI_ASSOC)){
            
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
    }
    else{
        echo '<script>alert("Filter not exist")</script>';
    }
?>