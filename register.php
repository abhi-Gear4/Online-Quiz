<?php
include "connection.php";
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Register Now</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
       <link rel="stylesheet" href="css1/bootstrap.min.css">
       <link rel="stylesheet" href="css1/font-awesome.min.css">
      <link rel="stylesheet" href="css1/owl.carousel.css">
    <link rel="stylesheet" href="css1/owl.theme.css">
    <link rel="stylesheet" href="css1/owl.transitions.css">
      <link rel="stylesheet" href="css1/animate.css">
      <link rel="stylesheet" href="css1/normalize.css">
      <link rel="stylesheet" href="css1/main.css">
      <link rel="stylesheet" href="style.css">
       <link rel="stylesheet" href="css1/responsive.css">
      <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center custom-login">
				<h3>Register Now</h3>

			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <form action="" name="formr" method = "post">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>FirstName</label>
                                    <input type="text" name = "fname" class="form-control"  >
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>LastName</label>
                                    <input type="text" name = "lname"  class="form-control">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Username</label>
                                    <input type="text" name = "uname"  class="form-control">
                                </div>
                                <div class="form-group col-lg-12">
                                <label>Password</label>
                                <input type="password" name = "pass"  class="form-control">
                            </div>
                                <div class="form-group col-lg-12">
                                    <label>Email</label>
                                    <input type="text" name = "email"  class="form-control">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Contact</label>
                                    <input type="text" name = "contact"  class="form-control">
                                </div>
                              </div>
                            <div class="text-center">
                                <button  type="submit" name="submitr" class="btn btn-success loginbtn">Register</button>

                            </div>
                            <div class="alert alert-success" id = "success" style = "display: none;margin-top: 10px">
                                <strong>Success!</strong> User Registration Successfull.
                            </div>
                            <div class="alert alert-danger" id="failure" style = "display: none;margin-top: 10px">
                                <strong>Already exits!</strong> Username Already exists.
                            </div>
                        </form>
                    </div>
                </div>
			</div>

		</div>   
    </div>

<?php
 if(isset($_POST["submitr"]))
{
  $count = 0;
  $res = mysqli_query($link,"SELECT * from registration where uname = '$_POST[uname]' ");
  $count = mysqli_num_rows($res);
  if($count>0)
  {

    ?>
    <script type="text/javascript">
    document.getElementById("failure").style.display="block";
    </script>
    <?php
    
  }
  else
  {
    
mysqli_query($link,"INSERT INTO registration (fname,lname,uname,password,email,contact) VALUES ('$_POST[fname]','$_POST[lname]','$_POST[uname]','$_POST[pass]','$_POST[email]','$_POST[contact]')") or die(mysqli_error($link));
    ?>
    <script type="text/javascript">
    document.getElementById("success").style.display="block";
    </script>
    <?php
  }

}
?>

    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery-price-slider.js"></script>
    <script src="js/jquery.meanmenu.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>

</html>