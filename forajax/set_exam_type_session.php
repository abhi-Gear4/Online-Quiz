<?php
session_start();
include "../connection.php";
$exam_category = $_GET["exam_category"];
$_SESSION["exam_category"] = $exam_category;
$res = mysqli_query($link,"SELECT * from exam_category where exam_category = '$exam_category'");
while($row=mysqli_fetch_array($res))
{
$_SESSION["exam_time"] = $row["etime_in_mins"];
}
$date = date("Y-m-d H:i:s");
$_SESSION["end_time"]=date("Y-m-d H:i:s",strtotime($date."+$_SESSION[exam_time] minutes"));
$_SESSION["exam_start"]= "yes" ;

?>