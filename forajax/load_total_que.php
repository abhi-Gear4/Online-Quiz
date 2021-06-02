<?php
session_start();
include "../connection.php";
$total_que=0;
$res1=mysqli_query($link,"SELECT * from questions where ecategory='$_SESSION[exam_category]'");
$total_que=mysqli_num_rows($res1);
echo $total_que;
?>