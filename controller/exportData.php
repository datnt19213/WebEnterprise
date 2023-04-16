<?php
    include_once("../data/connection.php");

    $result = mysqli_query($conn, "SELECT 
        user_tb.fullname AS Author, 
        feedback_tb.feedback_content AS Content, 
        category_tb.category_name AS Category, 
        feedback_tb.document AS Document, 
        feedback_tb.ended_date AS Deadline,
        SUM(contact_tb.like) AS total_likes,
        SUM(contact_tb.dislike) AS total_dislikes,
        COUNT(comment_tb.comment_id) AS total_comments,
        DATEDIFF(feedback_tb.ended_date, NOW()) AS DaysToDeadline
    FROM feedback_tb
    JOIN user_tb ON feedback_tb.email=user_tb.email
    JOIN category_tb ON feedback_tb.category_id=category_tb.category_id
    LEFT JOIN contact_tb ON feedback_tb.feedback_id=contact_tb.feedback_id
    LEFT JOIN comment_tb ON feedback_tb.feedback_id=comment_tb.feedback_id AND comment_tb.state_code=1
    GROUP BY feedback_tb.feedback_id
    ORDER BY DaysToDeadline ASC");

    if($result->num_rows > 0){
        $delimiter = ",";
        $filename = "export-data_" . date('Y-m-d') . ".csv";

        $f = fopen('php://memory', 'w');

        $fields = array('Author', 'Content', 'Category', 'Document', 'Deadline', 'Like', 'Dislike', 'Comment');
        fputcsv($f, $fields, $delimiter);

        while($row = $result->fetch_assoc()){
            $lineData = array($row['Author'] , $row['Content'] , $row['Category'] , $row['Document'] , $row['Deadline'] , $row['total_likes'] , $row['total_dislikes'] , $row['total_comments']);;
            // $lineData = array($row['author'], $row['content'], $row['category'], $row['document'], $row['deadline'], $row['like'], $row['dislike'], $row['comment']);
            fputcsv($f, $lineData, $delimiter);            
        }   

        fseek($f, 0);

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename .'";');

        fpassthru($f);
        
        mysqli_close($conn);
    }
    exit;
?>


