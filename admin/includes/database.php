<?php
  $con=mysqli_connect('sql205.epizy.com','epiz_23929424','hossain143088','epiz_23929424_onlinetest');
  mysqli_query($con,'set character set utf8');
  mysqli_query($con,'set session collation_connection="utf8_general_ci"') or die(mysql_errno());
?>