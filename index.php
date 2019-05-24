<?php

include("includes/database.php");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Question</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">

<script type="text/javascript">
  window.onload=function(){
    document.getElementById("sub").style.display='none';
  }
 function myFunction() {
    var x = document.getElementById("TopNav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
function checkTime(i) {
  if (i < 10) {
    i = "0" + i;
  }
  return i;
}
function time(){
   var today = new Date();
   var h = today.getHours();
   var m = today.getMinutes();
   var s = today.getSeconds();
   m = checkTime(m);
   s = checkTime(s);
   document.getElementById("time").innerHTML = h + ":" + m + ":" + s;
   t = setTimeout(function() {
        time()
    }, 1000);
  }
 </script>
</head>
<body>
  <div id="wrapper">
    <div class="topnav" id="TopNav">
        
        <a href="index.php" class="active"> Home </a>
        <a href="index.php?subject=bangla"> Bangla </a>
        <a href="index.php?subject=english"> English </a>
        <a href="index.php?subject=math"> Math </a>
        <a href="index.php?subject=gn_knowledge"> General Knowledge </a>
        <a href="index.php?subject=ict"> ICT </a>
        <a href="index.php?syllabus"> Syllabus </a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
     </div> 

  <div id="ques_sec">
		   <?php
          
 if(isset($_GET['subject'])){
       echo "
             <div id='time'></div>
               <div id='questions'>
                 <ol>
                 <script> time(); </script>";

       if(($_GET['subject'])==='bangla') {
         $query="select * from bangla";
       }
       if(($_GET['subject'])=='english') {
         $query="select * from english";
       }
       if(($_GET['subject'])=='math') {
         $query="select * from math";
       }
       if(($_GET['subject'])=='gn_knowledge') {
         $query="select * from gn_knowledge";
       }
       if(($_GET['subject'])=='ict') {
         $query="select * from ict";
       }
        $sub=($_GET['subject']);
        $run_ques=mysqli_query($con,$query);
        echo"<form action='answer.php' method='POST'>
        <input type='text' id='sub' name='sub' value='$sub' display='hidden'>";
        $answer=array();
        $answer[0]=0;
        while ($row_ques=mysqli_fetch_array($run_ques)) {
        	

                               $question=$row_ques['question'];
                               $opt_1=$row_ques['opt1'];
                               $opt_2=$row_ques['opt2'];
                               $opt_3=$row_ques['opt3'];
                               $opt_4=$row_ques['opt4'];
                               $ques_no=$row_ques['ques_no'];

                            echo "<li>
                             $question
                             <br>
                            
                           <label>
		                         <input type='checkbox' name='answer[]' value='$ques_no.1'>
		                         $opt_1
	                          </label>
	                         
	                         <label>
		                         <input type='checkbox' name='answer[]' value='$ques_no.2'>
		                          $opt_2
	                         </label>
	                        
	                         <label>
		                         <input type='checkbox' name='answer[]' value='$ques_no.3'>
		                          $opt_3
	                         </label>
	                        
	                         <label> 
		                         <input type='checkbox' name='answer[]' value='$ques_no.4'>
		                         $opt_4
	                         </label>
                            </li>
                            <br>";

                         }

                         echo "<input type='submit' id='submit' name='submit' value='Submit'>";
                         echo"</form>
                         </ol>
                        </div>";
                       }

		      ?>
   </div>
 </div>
</body>
</html>
<?php 
   if(isset($_POST['submit'])){
       if(empty($_POST['answer'])){
           $answer[0]=0;
           echo "<script>  alert('answer first.') </script>";
       }

   }


?>

