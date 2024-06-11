  <!DOCTYPE html>
<html>
<head>
  <style>
.navbar {
    overflow: hidden;
    background-color: #333;
    font-family: Arial, Helvetica, sans-serif;
}

.navbar a {
    float: left;
    font-size: 16px;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.navbar a:hover, .dropdown:hover .dropbtn {
    background-color: slateblue;
}

table, td, th {  
  border: none ;
  background-color: #f2f2f2;
  text-align: left;
  font-size: 18px;
  color: black;
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
body{
  background-color: DodgerBlue;
}
div {
  border-radius: 5px;
  background-color: #f2f2f2;
  align-content: center;
  padding: 20px;
}</style></head>
<body>
  <div class="navbar">
  <a href="/CodeIgniter-3.1.9/index.php/paper_ctrl/index"> Achievements </a></div>
    <center>
<table><tr><td>
 <center><img src='/CodeIgniter-3.1.9/images/profile.png'width="150" height="150"/></center>
<?php
foreach($data as $row) {

  //echo "<td>".$i."</td>";
  echo "<tr><th>";
  //echo"\t<tr><td>".$row->photo."</td></tr>\n";
  echo "\t<tr><td>ID <span>";
  echo"<td text-align:left>".$row->ID. "</span></td></tr>\n";
  echo "\t<tr><td>Name<span>";
  echo"<td text-align:left>".$row->Name. "</span></td></tr>\n";
  echo "\t<tr><td>Department\t\t<span>";echo"<td text-align:left>" .$row->Department. "</span></td></tr>\n";
  echo "\t<tr><td>Qualification\t\t<span>";echo"<td text-align:left>" .$row->Qualification."</span></td></tr>\n";
  echo "<tr><td>Designation<span>";echo"<td text-align:left>" .$row->Designation."</td></tr>";
  echo "<tr><td>Gender<span>";echo"<td text-align:left>" .$row->Gender."</td></tr>";
  echo "<tr><td>Email_ID<span>";echo"<td text-align:left>" .$row->Email_ID."</td></tr>";
  echo "<tr><td>Area of Interest<span>";echo"<td text-align:left>" .$row->Interest."</td></tr>";
  echo "<tr><td>Publication<span>";echo"<td text-align:left>" .$row->Publication."</td></tr>";
  echo "<tr><td>Research_Project<span>";echo"<td text-align:left>" .$row->Research_Project."</td></tr>";
  echo "<tr><td>Research_Supervision<span>";echo"<td text-align:left>".$row->Research_Supervision."</td></tr>";
  echo "<tr><td>Residential Address<span>";echo"<td text-align:left>" .$row->Address."</td></tr>";
  echo "<tr><td>Mobile No<span>";echo"<td text-align:left>" .$row->Mobile."</td></tr>";
  echo"</th>";
}
  ?></tr>
</th>
</table></div></center>
</html>