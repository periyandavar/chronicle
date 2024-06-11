<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
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
<?php include ('sidepushsam.php') ?>
<div class="container" >
  <center>
<table><tr><td>
 <center>
<?php
foreach($data as $row) {

  //echo "<td>".$i."</td>";
  if($row->Image_path=='')
  echo'<img src="/chronicle/images/1.png" width="150" height="150"/>';
  else
  echo'<img src="/chronicle/assets/uploads/files/Staff_Photo/'.$row->Image_path.'" width="150" height="150"/>';
  echo "<tr><th>";

  //echo"\t<tr><td>".$row->photo."</td></tr>\n";
  echo "\t<tr><td>Staff ID <span>";
  echo"<td text-align:left>".$row->Staff_ID. "</span></td></tr><br><br>";
  echo "\t<tr><td>Name<span>";
  echo"<td text-align:left>".$row->Staff_Name. "</span></td></tr>\n<br>";
  echo "\t<tr><td>Department\t\t<span>";echo"<td text-align:left>" .$row->Department. "</span></td></tr>\n";
  echo "\t<tr><td>Qualification\t\t<span>";echo"<td text-align:left>" .$row->Qualification."</span></td></tr>\n";
  echo "<tr><td>Designation<span>";echo"<td text-align:left>" .$row->Designation."</td></tr>";
  echo "<tr><td>Gender<span>";echo"<td text-align:left>" .$row->Gender."</td></tr>";
    echo "<tr><td>Area of Interest<span>";echo"<td text-align:left>" .$row->Area_of_Interest."</td></tr>";
  /*echo "<tr><td>Publication<span>";echo"<td text-align:left>" .$row->Publication."</td></tr>";
  echo "<tr><td>Research_Project<span>";echo"<td text-align:left>" .$row->Research_Project."</td></tr>";
  echo "<tr><td>Research_Supervision<span>";echo"<td text-align:left>".$row->Research_Supervision."</td></tr>";*/
  
  echo "<tr><td>Residential Address<span>";
  echo"<td text-align:left>" .$row->Residential_Address."</td></tr>";
  echo "<tr><td>Email_ID<span>";
  echo"<td text-align:left>" .$row->Email_ID."</td></tr>";
  echo "<tr><td>Contact No<span>";
  echo"<td text-align:left>" .$row->Contact_No."</td></tr>";
  echo"</th>";
}
  ?>
</td>
</tr>
</table>
</center>
</div>
