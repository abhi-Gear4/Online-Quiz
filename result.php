<?php
session_start();
$date = date("Y-m-d H:i:s");
$_SESSION["end_time"]="";

include "header.php";
include "connection.php";
?>



       <div class="row" style=".....">

            <div class="col-lg-6 col-lg-push-3" style="margin-bottom:340px">
            	<?php
            	$correct = 0;
            	$wrong = 0;
            	if(isset($_SESSION["answer"]))
            	{
            		for($i = 1;$i<=sizeof($_SESSION["answer"]); $i++)
            		{
            			$answer = "";
            		$res = mysqli_query($link,"SELECT * from questions where ecategory='$_SESSION[exam_category]' && qno=$i");
            			while($row=mysqli_fetch_array($res))
            			{
            				$answer = $row["answer"];
            			}
            			if(isset($_SESSION["answer"][$i]))
            			{
            				if($answer==$_SESSION["answer"][$i])
            				{
            					$correct = $correct + 1;
            				}
            				else
            				{
            					$wrong = $wrong + 1;
            				}
            			}
            			else
            			{
            				$wrong = $wrong + 1;
            			}
            		}
            	}
            	$count = 0;
            	$res = mysqli_query($link,"SELECT * from questions where ecategory='$_SESSION[exam_category]'") or die(mysqli_error($link));
            	$count = mysqli_num_rows($res);
            	$wrong = $count - $correct ;
            	echo "<br>";
            	echo"<br>";
            	echo "<center>";
            	echo "Total Questions =".$count;
            	echo "<br>";
            	echo "Correct Answer = ".$correct;
            	echo "<br>";
            	echo "Wrong Answer=".$wrong;
            	echo "</center>";
            	?>
                
            	
            </div>

        </div>
<?php
if(isset($_SESSION["exam_start"]))
{
	$date = date("Y-m-d");
	mysqli_query($link,"INSERT into exam_results(id,uname,exam_type,total_question,correct_answer,wrong_answer,exam_time) values (NULL,'$_SESSION[uname]','$_SESSION[exam_category]','$count','$correct','$wrong','$date') ");

}	
	if(isset($_SESSION["exam_start"]))
	{
		unset($_SESSION["exam_start"])
		?>
        <script type="text/javascript">
        	window.location.href = window.location.href ;
        </script>

		<?php
	}

?>
<?php
include "footer.php"
?>