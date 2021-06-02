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
?>


        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add Exam Details</h1>
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
                            <div class="card-header"><strong>Add Exam</strong></div>
                            <div class="card-body card-block">
                                <div class="form-group"><label for="company" class=" form-control-label"> Add Exam </label><input type="text" name="exam_cat" placeholder="Enter Exam Category" class="form-control"></div>
                                    <div class="form-group"><label for="vat" class=" form-control-label">Exam time in mins</label><input type="text" name="exam_duration" placeholder="" class="form-control"></div>

                                    <div class="form-group"><input type="submit" name ="submit2" value="Add Exam" class="btn btn-success"></div>
                                   
                                    </div>
                                </div>
                            </div>

                                               <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Exam Categories</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Exam Name</th>
                                            <th scope="col">Exam Time</th>
                                            <th scope="col">Edit</th>
                                             <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $res = mysqli_query($link,"select * from exam_category");
                                        $count = 0;
                                        while($row = mysqli_fetch_array($res))
                                        {
                                            $count = $count + 1;
                                            ?>
                                        <tr>
                                            <th scope="row"><?php echo $count; ?></th>
                                            <td><?php echo $row["exam_category"]; ?></td>
                                            <td><?php echo $row["etime_in_mins"]; ?></td>
                                            <td><a href = "edit_exam.php?id=<?php echo $row["exam_id"] ; ?>">Edit</a></td>
                                            <td><a href = "delete_exam.php?id=<?php echo $row["exam_id"]; ?>">Delete</a></td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                      
                                       
                                    </tbody>
                                </table>
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
  mysqli_query($link,"INSERT INTO exam_category values (NULL,'$_POST[exam_cat]','$_POST[exam_duration]')") or die(mysqli_error($link));
  ?>
  <script type="text/javascript">
      alert("exam added successfully");
      window.location.href = window.location.href ;
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



