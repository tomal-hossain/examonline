<?php
   session_start();
   if(!isset($_SESSION['admin'])){
	echo "<script> window.open('login.php','_self') </script>";
}
else{ 
   include("includes/database.php");

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>
		insert question
	</title>
    <style type="text/css">
    	body{
    		background-color: #F5F5F5;
    		color: #F5F5F5;
    	}
    	#wrapper{
    		width: 1000px;
    		background-color: #284269;
    		margin:0px auto;
    	}
    	form{
    		width: 100%;
    	}
    	table{
    		width: 80%;
    		margin:0px auto;
    	}
    	input,textarea{
    		margin-left: 20px;
    	}
    	a{
    		color: yellow;
    	}
    	#insert{
    		background: green;
    		padding: 8px 20px;
    		border: 1px solid #453428;
    	}
    	#insert:hover{
    		background: #453428;
    	}
    </style>
</head>
<body>
	<div id="wrapper">
	<form action="#" method="POST">
		<table border="1px solid  #77CBE3">
			<th colspan="2">
				New Question
			</th>
			<tr>
				<td>
					Question
				</td>
				<td>
					<textarea name="question"  cols="50" rows="2" required="required"> </textarea>
				</td>
			</tr>

			<tr>
				<td>
				option a
			    </td>
				<td>
				<input type="text" name="opt1" required="required">
			  </td>

			</tr>
			<tr>
				<td>
				option b
				  </td>
				<td>
				<input type="text" name="opt2" required="required">
			  </td>

			</tr>
			<tr>
				<td>
				option c
			    </td>
				<td>
				<input type="text" name="opt3" required="required">
			  </td>

			</tr>
			<tr>
				<td>
				option d
				  </td>
				<td>
				<input type="text" name="opt4" required="required">
			  </td>

			</tr>

			<tr>
				<td>
					Correct Answer
				</td>

				<td>
					<label>
						<input type="checkbox" name="ans1" value="1">
						a
					</label>
					<label>
						<input type="checkbox" name="ans2" value="1">
						 b
					</label>
					<label>
						<input type="checkbox" name="ans3" value="1">
						 c
					</label>
					<label>
						<input type="checkbox" name="ans4" value="1">
						 d
					</label>
					
				</td>

			</tr>
			<tr>
				<td>
					Question Category
				</td>

				<td>
					 <select name="category">
						  <option value="bangla">Bangla</option>
						  <option value="english">English</option>
						  <option value="gn_knowledge">General Knowledge</option>
						  <option value="ict">ICT</option>
						  <option value="math">Math</option>
					</select> 
					
				</td>

			</tr>
				<th colspan="2">
					<input type="submit" name="insert" value="Insert" id="insert">
				</th>
		</table>
		
	</form>
	<a href="index.php">Back To Previous</a>
         </div>
</body>
</html>
<?php
}
?>

<?php 
   if(isset($_POST['insert'])){
    
       $ques=$_POST['question'];
       $subject=$_POST['subject'];
       $op1=$_POST['opt1'];
       $op2=$_POST['opt2'];
       $op3=$_POST['opt3'];
       $op4=$_POST['opt4'];

       $ans1=$_POST['ans1'];
       $ans2=$_POST['ans2'];
       $ans3=$_POST['ans3'];
       $ans4=$_POST['ans4'];

       if($ans1!=1){
       	  $ans1=0;
       }
       if($ans2!=1){
       	  $ans2=0;
       }
       if($ans3!=1){
       	  $ans3=0;
       }
       if($ans4!=1){
       	  $ans4=0;
       }
       $table = $_POST['category'];

       $insert="insert into $table (question,opt1,opt2,opt3,opt4,ans1,ans2,ans3,ans4) values ('$ques','$op1','$op2','$op3','$op4','$ans1','$ans2','$ans3','$ans4')";
  
       $run_insert= mysqli_query($con,$insert);

       if($run_insert){
   	   echo "<script> alert('Successfully Inserted') </script>";
   	         }
   	   else{
   	   	   echo "<script> alert('Something went wrong') </script>";
   	   }

   }

 ?>