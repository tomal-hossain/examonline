<?php

include("includes/database.php");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Question</title>
  <link rel="stylesheet" type="text/css" href="css/answer.css">

<script type="text/javascript">
  
 function myFunction() {
    var x = document.getElementById("TopNav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
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
       $subject=($_POST['sub']);
       $query="select * from $subject";

       echo "
               <div id='questions'>
               <h3> Questions</h3>
                 <ol>";
       
      $c=0;
      $correct=array();
      $run_ques=mysqli_query($con,$query);
      while ($row_ques=mysqli_fetch_array($run_ques)) {
          

                              $question=$row_ques['question'];
                               $opt_1=$row_ques['opt1'];
                               $opt_2=$row_ques['opt2'];
                               $opt_3=$row_ques['opt3'];
                               $opt_4=$row_ques['opt4'];
                               $ques_no=$row_ques['ques_no'];

                                $correct[$c]=$row_ques['ans1'];
                                $c++;
                                $correct[$c]=$row_ques['ans2'];
                                $c++;
                                $correct[$c]=$row_ques['ans3'];
                                $c++;
                                $correct[$c]=$row_ques['ans4'];
                                $c++;

                            echo "<li>
                             $question
                             <br>
                            
                           <label>
                             (a) 
                             $opt_1
                            </label>
                           
                           <label>
                               (b)
                              $opt_2
                           </label>
                          
                           <label>
                               (c)
                              $opt_3
                           </label>
                          
                           <label>
                              (d) 
                             $opt_4
                           </label>
                            </li>
                            <br>";

                         }
                     echo "</ol>
                        </div>";
                ?>
                         
          <?php
if(!empty($_POST['answer'])){
     $given= array();
     $j=0;
     $length=count($correct);
     
     for($i=1;$i<=$length;$i++){
        for($k=1;$k<=4;$k++){
          $given[$j]=$i.'.'.$k;
          $j++;
        }
     }
     $p=0;
     $q=0;
     foreach($_POST['answer'] as $answ) {

        for($i=$p;$i<$length;$i++){

          if($answ===$given[$i]){

            for($k=$i-1;$k>=$q;$k--){
                $given[$k]=0;
            }
               $given[$i]=1;
               $p=$i+1;
               $q=$i+1;

              break;
          }
             
      }
          }

          for($k=$p;$k<$length;$k++){
                $given[$k]=0;
     }
              

 echo"<div id='correct_ans'>

   <table border=1px>
   <tr>
     <th>Ques. no.</th>
     <th>Your Ans.</th>
     <th>Correct Ans.</th>
   </tr>
 ";
     $j=1;
     for($i=0;$i<$length;$i+=4,$j++){
         echo"
             <tr>
             <td> $j </td>

         <td>";
          if($given[$i]==1)
              echo "a ";
          if($given[$i+1]==1)
              echo "b ";
          if($given[$i+2]==1)
              echo "c ";
          if($given[$i+3]==1)
              echo "d ";
        echo "</td>";
        echo"<td>";
          if($correct[$i]==1)
              echo "a ";
          if($correct[$i+1]==1)
              echo "b ";
          if($correct[$i+2]==1)
              echo "c ";
          if($correct[$i+3]==1)
              echo "d ";
        echo "
        </tr>
        </td>";
     } 

    echo"</table>
     </div>";

   $marks=0;
   $j=0;
   for($i=0;$i<$length;$i+=4,$j++){

           if($given[$i]==$correct[$i] and $given[$i+1]==$correct[$i+1] and $given[$i+2]==$correct[$i+2] and $given[$i+3]==$correct[$i+3]) {
              $marks=$marks+1;
           }
   }

  echo "
        <h3> Your Score : $marks out of $j </h3>";}

  else{
    echo "<script> alert('You should answer first.');
          window.open('index.php','_self'); 
    </script>";
  }

?>


   </div>
 </div>
</body>
</html>


