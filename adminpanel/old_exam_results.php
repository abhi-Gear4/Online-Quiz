<?php
session_start();
include "header.php";
include "../connection.php"
?>

        <div class="breadcrumbs">
            <div class="col-sm-12">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h3>All Exam Results</h3>
                    </div>
                </div>
            </div>
 
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                          
                            <div class="card-body">

            <center>
                <h3> Old Exam Results </h3>
            </center>
            <?php
            $count = 0;
            $res = mysqli_query($link,"SELECT * from exam_results  order by id desc");

            $count = mysqli_fetch_array($res);

            if($count==0)
            {
                ?>
                <center>
                    <h2>No Results found</h2>
                </center>
                <?php
            }
            else
            {
                echo"<table class = 'table table-bordered'>";
                echo "<tr style = 'background-color: #006df0; color:white'>" ;
                echo "<th>";echo "username" ; echo"</th>";
                echo "<th>";echo "exam type" ; echo"</th>";
                echo "<th>";echo "total question" ; echo"</th>";
                echo "<th>";echo "correct answer" ; echo"</th>";
                echo "<th>";echo "wrong answer" ; echo"</th>";
                echo "<th>";echo "exam date" ; echo"</th>";
                echo "</tr>";

                while($row = mysqli_fetch_array($res))
                {
                        echo "<tr>" ;
                echo "<td>";echo $row["uname"] ; echo"</td>";
            echo "<td>";echo $row["exam_type"] ; echo"</td>";
            echo "<td>";echo $row["total_question"]  ; echo"</td>";
                echo "<td>";echo $row["correct_answer"]  ; echo"</td>";
                echo "<td>";echo $row["wrong_answer"]  ; echo"</td>";
                echo "<td>";echo $row["exam_time"]  ; echo"</td>";
                echo "</tr>";
                }

                echo "</table>";
            }



            ?>
                   

                            </div>
                        </div> <!-- .card -->

                    </div>
                    <!--/.col-->

                                             
                </div>

            </div>
         </div><!-- .animated -->
    </div><!-- .content -->

<?php
include "footer.php"
?>
                               