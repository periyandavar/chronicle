<!DOCTYPE html>
<html>
<head>
  <style>
    table, td, th {  
  border: none ;
  background-color: #f2f2f2;
  text-align: left;
  font-size: 18px;
  color: DodgerBlue;
  font-weight: inherit;
  border-radius: 15px 15px 15px 15px;
  text-decoration-style: ;
}
  table {
  border-collapse: collapse;
  width: 50%;
}
th, td {
  padding: 15px;
}

  </style>
</head>
<?php include("studentmenu.php") ?>
<div class="container" >
  <center>
<table><tr><td>
 <center><img src='/chronicle/images/1.png'width="150" height="150"/>
  
<?php
foreach($data as $row) {

  //echo "<td>".$i."</td>";
  echo "<tr><th>";
  //echo"\t<tr><td>".$row->photo."</td></tr>\n";
  echo "\t<tr><td>Roll No<span>";
  echo"<td text-align:left>".$row->Reg_No. "</span></td></tr><br><br>";
  echo "\t<tr><td>Name<span>";
  echo"<td text-align:left>".$row->Student_Name. "</span></td></tr>\n<br>";
   echo "\t<tr><td>Department\t\t<span>";echo"<td text-align:left>" .$row->Department. "</span></td></tr>\n";
  echo "<tr><td>Gender<span>";echo"<td text-align:left>" .$row->Gender."</td></tr>";
  echo "<tr><td>Date of Birth<span>";echo"<td text-align:left>" .$row->Dob."</td></tr>";
  
  echo "<tr><td>Email_ID<span>";
  echo"<td text-align:left>" .$row->Email_ID."</td></tr>";
  echo "<tr><td>Contact No<span>";
  echo"<td text-align:left>" .$row->Mobile_No."</td></tr>";
  echo"</th>";
}
  ?>
</td>
</tr>
</table>
</center>
</div>
