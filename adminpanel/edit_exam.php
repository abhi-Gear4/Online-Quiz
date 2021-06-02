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

 $id = $_GET['id'];
 $res = mysqli_query($link,"SELECT * from exam_category where exam_id = $id");
 while($row=mysqli_fetch_array($res))
 {
 	$exam_category = $row['exam_category'];
 	$exam_time = $row['etime_in_mins'];
 }
?>


        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Edit Exam Details</h1>
                    </div>
                </div>
            </div>
 
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                          <form name = "form1" action ="" method="post">
                            <div class="card-body">

                            <div class="col-lg-6">
                            <div class="card">
                            <div class="card-header"><strong>Edit Exam Categories</strong></div>
                            <div class="card-body card-block">
                                <div class="form-group"><label for="company" class=" form-control-label"> Edit Exam </label><input type="text" name="exam_cat" value="<?php echo $exam_category; ?>" class="form-control"></div>
                                    <div class="form-group"><label for="vat" class=" form-control-label">Edit Exam time</label><input type="text" name="exam_duration" value="<?php echo $exam_time; ?>" class="form-control"></div>

                                    <div class="form-group"><input type="submit" name ="submit2" value="Update Exam" class="btn btn-success"></div>
                                   
                            </div>
                            </div>
                            </div>

                            </div>

                        </form>
                    </div> <!-- .card -->



                    </div>
                    <!--/.col--> 
                                </div>

                                </div>
                    </div><!-- .animated -->

                        </div><!-- .content -->
                </div><!-- /#right-panel -->
                                <!-- Right Panel -->

<?php
if(isset($_POST["submit2"]))
{
  mysqli_query($link," UPDATE exam_category set exam_category= '$_POST[exam_cat]',etime_in_mins='$_POST[exam_duration]' where exam_id = $id ") or die(mysqli_error($link));
  ?>
  <script type="text/javascript">
      alert("exam added successfully");
      window.location.href = "examcat.php" ;
  </script>
  <?php
}
?>            


                            <script src="vendors/jquery/dist/jquery.min.js"></script>
                            <script src="vendors/popper.js/dist/umd/popper.min.js"></script>

                            <script src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
                            <script src="vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

                            <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                            <script src="assets/js/main.js"></script>
</body>

</html>

<?php
include "footer.php";
?>



