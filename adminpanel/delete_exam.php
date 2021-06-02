<?php
session_start();
include "../connection.php";
if(!isset($_SESSION["admin"]))
{
    ?>
    <script type="text/javascript">
        window.location =  "index.php";
    </script>
    <?php

}

$id = intval($_GET['id']);
mysqli_query($link," DELETE FROM exam_category WHERE exam_id = $id ") or die(mysqli_error($link));
?>
<script type ="text/javascript">
window.location = "examcat.php";
</script>

