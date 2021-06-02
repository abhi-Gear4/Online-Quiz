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
$qid = $_GET['id'];
$id1 = $_GET['id1'];
mysqli_query($link,"DELETE from questions where qid = $qid");
    ?>
        <script type="text/javascript">
            window.location = "add_edit_exam_questions.php?id=<?php echo $id1 ; ?>";
        </script>

    <?php

 ?>
