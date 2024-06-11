<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>   
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
div {
  border-radius: 5px;
  background-color: ;
  align-content: center;
  padding: 20px;
}
.button{
  background-color: black;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

</style></head>
<body>
  <button type="button" class="btn btn-primary" onclick="goBack()"></button>
  <!--<input class="button" type="button" value="Go Back" onclick="history.back(-1)"style="align:right">-->
    <div class="container">
      <center><h2>Profile</h2>
<table><tr><td>
  <p><center><img src='/CodeIgniter-3.1.9/images/profile.png' width="150" height="150"/></center>
    <!--  <tr><th><td></td></th></tr><br>
      <tr><th><td>Name</td></th></tr><br>
      <tr><th><td>Designation</td></th></tr><br>
      <tr><th><td>Department</td></th></tr><br>
      <tr><th><td>Qualification</td></th></tr><br>
      <tr><th><td>Gender</td></th></tr><br>
      <tr><th><td>Date of Birth</td></th></tr><br> -->
    <!--<img src="data:image/png;base64,<?php //echo base64_encode( 'Profile_Photo'); ?>" />-->
<?php
foreach($data as $row) {

  echo "<tr>";
  /*$str= '<?php echo '.$row->Profile_Photo.'?>';
  echo "<img src='<?php base64_decode($str)?>'>";
   echo "<img src='<?php echo ".$row->Profile_Photo."?>''>";*/
 //echo "<img src='".base_url()."images/".$row->Profile_Photo."'>";
  echo "\t<tr><td>Name<span>";
  echo "<td>".$row->Staff_Name."</span></td></tr>\n";
  echo "<tr><td>Designation<span>";
  echo "<td>".$row->Designation."</td></tr>";
  echo "<tr><td>Department<span>";
  echo "<td>".$row->Department."</td></tr>";
  echo "<tr><td>Qualification<span>\t";
  echo "<td>".$row->Qualification."</td></tr>";
  echo "<tr><td>Gender<span>";
  echo "<td>".$row->Gender."</td></tr>";
  echo "<tr><td>Date of Birth  <span>";
  echo "<td>".$row->Date_of_Birth."</td></tr>";
  echo "<tr><td>Area of Interest  <span>";
  echo "<td>".$row->Area_of_Interest."</td></tr>";
  echo "<tr><td>Contact No  <span>";
  echo "<td>".$row->Contact_No."</td></tr>";
  /*echo "<td>".$i."</td>";
  echo "<tr><th>";
  echo"\t<tr><td>".$row->Profile_Photo."</td></tr>\n";
  echo "\t<tr><td>Name<span>";
  echo"<td text-align:left>".$row->Staff_Name. "</span></td></tr>\n";
  echo "<tr><td>Designation<span>";echo"<td text-align:left>" .$row->Designation."</td></tr>";
  echo "\t<tr><td>Department\t\t<span>";echo"<td text-align:left>" .$row->Department. "</span></td></tr>\n";
  echo "<tr><td>Gender<span>";echo"<td text-align:left>" .$row->Gender."</td></tr>";
  echo "\t<tr><td>Qualification\t\t<span>";echo"<td text-align:left>" .$row->Qualification."</span></td></tr>\n";
  echo "<tr><td>Date Of Birth<span>";echo"<td text-align:left>" .$row->DOB."</td></tr>" ; */
  echo"</tr>";
}
  ?>

</table>
</center>
</div>
<script>
  function goBack(){
    window.history.back();
    }
  </script>
</body>
</html>