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
$qid = $_GET['id'];
$id1 = $_GET['id1'];
$question = "";
$opt1 = "";
$opt2 = "";
$opt3 = "";
$opt4 = "";
$answer = "";

$res = mysqli_query($link,"SELECT * from questions where qid = $qid ");
while($row = mysqli_fetch_array($res))
{
    $question = $row["question"];
    $opt1 = $row["opt1"];
    $opt2 = $row["opt2"];
    $opt3 = $row["opt3"];
    $opt4 = $row["opt4"];
    $answer = $row["answer"];
}
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Update Question</h1>
                    </div>
                </div>
            </div>
 
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                          
                            <div class="card-body">


                          <div class="col-lg-12">
                             <form name="form1" action="" method="POST">
                            <div class="card">
                            <div class="card-header"><strong>Update Question</strong></div>
                            <div class="card-body card-block">
                                <div class="form-group"><label for="company" class=" form-control-label"> Question</label><input type="text" name="question" placeholder= " Add Questions" value = "<?php echo $question ; ?>" class="form-control"></div>
                                <div class="form-group"><label for="company" class=" form-control-label"> opt1</label><input type="text" name="opt1" placeholder= " Add opt1" value = "<?php echo $opt1 ; ?>" class="form-control"></div>
                                <div class="form-group"><label for="company" class=" form-control-label"> opt2</label><input type="text" name="opt2" placeholder= " Add opt2" value = "<?php echo $opt2 ; ?>" class="form-control"></div>
                                <div class="form-group"><label for="company" class=" form-control-label"> opt3</label><input type="text" name="opt3" placeholder= " Add opt3" value = "<?php echo $opt3 ; ?>"  class="form-control"></div>
                                <div class="form-group"><label for="company" class=" form-control-label"> opt4</label><input type="text" name="opt4"  value = "<?php echo $opt4 ; ?>"  class="form-control"></div>
                                <div class="form-group"><label for="company" class=" form-control-label"> answer</label><input type="text" name="answer" placeholder= " Add answer" value = "<?php echo $answer ; ?>" class="form-control"></div>

                                    <div class="form-group"><input type="submit" name ="submit3" value="Update Question" class="btn btn-success"></div>
                                   
                            </div>
                            </div>
                        </form>
                            </div>
                   

                            </div>
                        </div> <!-- .card -->

                    </div>
                    <!--/.col-->

                                             
                                                </div>

                                            </div>
                                        </div><!-- .animated -->
                                    </div><!-- .content -->


  <?php
  if(isset($_POST["submit3"]))
  {
    mysqli_query($link,"UPDATE questions set question='$_POST[question]',opt1='$_POST[opt1]',opt2='$_POST[opt2]',opt3='$_POST[opt3]',
        opt4='$_POST[opt4]',answer='$_POST[answer]'");
    ?>
        <script type="text/javascript">
            window.location = "add_edit_exam_questions.php?id=<?php echo $id1 ; ?>";
        </script>

    <?php



  }


  ?>                                  

<?php
include "footer.php"
?>
                               