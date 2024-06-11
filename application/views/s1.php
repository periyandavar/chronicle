<!DOCTYPE html>
<html>
<head>
  <style>
    .a {  
  border: none ;
  background-color: #f2f2f2;
  text-align: left;
  font-size: 18px;
  color: DodgerBlue;
  font-weight: inherit;
  border-radius: 15px 15px 15px 15px;
  text-decoration-style: ;
}
.c {  
  border: none ;
  background-color: #f2f2f2;
  text-align: left;
  font-size: 18px;
  color: DodgerBlue;
  font-weight: inherit;
  border-radius: 15px 15px 15px 15px;
  text-decoration-style: ;
}
.b {  
  border: none ;
  background-color: #f2f2f2;
  text-align: left;
  font-size: 18px;
  color: DodgerBlue;
  font-weight: inherit;
  border-radius: 15px 15px 15px 15px;
  text-decoration-style: ;
}
  .a {
  border-collapse: collapse;
  width: 50%;
}
.b, .c {
  padding: 15px;
}

  </style>
</head>
<?php include("studentmenu.php") ?>
<div class="container" >
  <center>
<table id='a'><tr id='b'><td id='c'>
 <center><img src='/chronicle/images/1.png'width="150" height="150"/>
 <br> 
<?php
foreach($data as $row) {
echo'<h3>';
    echo"<span>".$row->Reg_No. "</span> - <b>";
    echo"<span>".$row->Student_Name. "</span></b></h3>";
}
  ?>
</td>
</tr>
</table>
</center>
</div>
<div id='main'>
