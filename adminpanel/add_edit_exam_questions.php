<?php
session_start();
include "header.php";
include "../connection.php";
if(!isset($_SESSION["admin"]))
{
    ?>
    <script type="text/javascript">
        window.location =  "index.php";
    </script>
    <?php

}
 $id = $_GET['id'] ;
 $ecategory = '';
 $res = mysqli_query($link,"SELECT * from exam_category where exam_id = $id") or die(mysqli_error($link));
 while($row = mysqli_fetch_array($res))
{
        $ecategory = $row['exam_category'];
}
?>

        <div class="breadcrumbs">
            <div class="col-sm-12">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add Question inside : <?php echo $ecategory ; ?></h1>
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

                          <div class="col-lg-6">
                             <form name="form1" action="" method="POST">
                            <div class="card">
                            <div class="card-header"><strong>Add new Questions</strong></div>
                            <div class="card-body card-block">
                                <div class="form-group"><label for="company" class=" form-control-label"> Question</label><input type="text" name="question" placeholder= " Add Questions" class="form-control"></div>
                                <div class="form-group"><label for="company" class=" form-control-label"> opt1</label><input type="text" name="opt1" placeholder= " Add opt1" class="form-control"></div>
                                <div class="form-group"><label for="company" class=" form-control-label"> opt2</label><input type="text" name="opt2" placeholder= " Add opt2" class="form-control"></div>
                                <div class="form-group"><label for="company" class=" form-control-label"> opt3</label><input type="text" name="opt3" placeholder= " Add opt3" class="form-control"></div>
                                <div class="form-group"><label for="company" class=" form-control-label"> opt4</label><input type="text" name="opt4" placeholder= " Add opt4" class="form-control"></div>
                                <div class="form-group"><label for="company" class=" form-control-label"> answer</label><input type="text" name="answer" placeholder= " Add answer" class="form-control"></div>

                                    <div class="form-group"><input type="submit" name ="submit3" value="Add Question" class="btn btn-success"></div>
                                   
                            </div>
                            </div>
                        </form>
                            </div>
                            </div>
                        </div>
                        <!-- .card -->

                    </div>
                    <!--/.col-->

                                             
    </div>


    <div class="row">
        <div class="col-lg-12">
                       
            <div class="card">
                          
                <div class="card-body">
                    <table class = "table table-bordered">
                        <tr>
                            <th>No.</th>
                            <th>Question</th>
                            <th>opt1</th>
                            <th>opt2</th>
                            <th>opt3</th>
                            <th>opt4</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                   
                    <?php
                    $res = mysqli_query($link,"SELECT * from questions where ecategory = '$ecategory' order by qno asc");
                    while($row=mysqli_fetch_array($res))
                    {
                        echo "<tr>";
                        echo "<td>";  echo $row["qno"];echo"</td>" ;
                        echo "<td>";  echo $row["question"]; echo"</td>" ;
                        echo "<td>";  echo $row["opt1"]; echo"</td>" ;
                        echo "<td>";  echo $row["opt2"]; echo"</td>" ;
                        echo "<td>";  echo $row["opt3"]; echo"</td>" ;
                        echo "<td>";  echo $row["opt4"]; echo"</td>" ;
                        echo "<td>";  
                        ?><a href="edit_option.php?id=<?php echo $row["qid"] ;?>&id1=<?php echo $id ; ?>"> Edit</a> <?php
                                          echo"</td>" ;
                        echo "<td>" ;                 
                       ?><a href="delete_option.php?id=<?php echo $row["qid"] ; ?>&id1=<?php echo $id ; ?>"> Delete</a> <?php
                                          echo"</td>" ;

                        echo "</tr>";
                    }





                    ?>
                 </table>

                </div>
            </div>
        </div>
    </div>

    </div>
    </div><!-- .animated -->


    </div><!-- .content -->

<?php
if(isset($_POST["submit3"])) 
{

    $loop = 0;
    $count = 0;
    $result = mysqli_query($link,"SELECT * from questions where ecategory = '$ecategory' order by qid asc") or die(mysqli_error($link));
    $count = mysqli_num_rows($res);

    if($count>0)
    {
        while($row = mysqli_fetch_array($res))
        {
            $loop = $loop + 1;
            mysqli_query($link,"UPDATE questions set qno = $loop where qid = $row[qid]" ) or die(mysqli_error($link));
        }
    }
     $loop = $loop + 1;
     mysqli_query($link,"INSERT into questions  (qno,question,opt1,opt2,opt3,opt4,answer,ecategory) values('$loop','$_POST[question]','$_POST[opt1]','$_POST[opt2]','$_POST[opt3]','$_POST[opt4]','$_POST[answer]','$ecategory')" )or die(mysqli_error($link));



 ?>
 <script type="text/javascript">
     alert ("question added successfully");
     window.location.href = window.location.href;
 </script>

<?php
    
}

?>

<?php
include "footer.php";

?>
                               