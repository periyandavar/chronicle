<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
<style>
	input[type=text], input[type=submit],input[type=Date] {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: none;
  align-items: center;
  
}

/* Set a style for all buttons */
button {
  background-color: black;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 50%;
}

button:hover {
  opacity: 0.8;
}
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
<body>
<div class="container">
	 <?php include ('sidepush.php') ?>
      <center><h2>Profile</h2></center>
<table><tr><td>
  <p><center><img src='/CodeIgniter-3.1.9/images/profile.png' width="150" height="150"/></center>
  	<label>Staff ID</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php foreach($data as $row) {echo"<td text-align:left>".$row->Staff_ID. "</span></td></tr>";}?><br> 
  	<label>Staff Name</label>  <br>
    <input type="text" name="Staff_Name"  class="form-control" value=<?php foreach($data as $row) {echo"$row->Staff_Name";}?>>  <br>
    <label>Designation</label> <br>
    <input type="text" name="Designation"  class="form-control" value=<?php foreach($data as $row) {echo"$row->Designation";}?>> <br>
     <label>Department</label> <br>
    <input type="text" name="Department"  class="form-control" value=<?php foreach($data as $row) {echo"$row->Department";}?>><br>
    <label>Qualification</label> <br>
    <input type="text" name="Qualification"  class="form-control" value=<?php foreach($data as $row) {echo"$row->Qualification";}?>><br>
    <label>Gender</label> <br>
    <input type="text" name="Gender"  class="form-control" value=<?php foreach($data as $row) {echo"$row->Gender";}?>><br>
    <label>Date of Birth</label> <br>
    <input type="Date" name="Date_of_Birth"  class="form-control" value=<?php foreach($data as $row) {echo"$row->Date_of_Birth";}?>><br>
    <label>Area of Interest</label> <br>
    <input type="text" name="Area_of_Interest"  class="form-control" value=<?php foreach($data as $row) {echo"$row->Area_of_Interest";}?>><br>
    <label>Contact No</label> <br>
    <input type="text" name="Contact_No"  class="form-control" value=<?php foreach($data as $row) {echo"$row->Contact_No";}?>><br>
    <br>
    <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />  
                 </p></td></tr></table></center></div></body></html>
  	<!-- <?php
/*foreach($data as $row){
 echo form_open_multipart('select_ctrl/edprf');
 echo form_upload(['name'=>'Profile_Photo','value'=>$row->Profile_Photo]);
 echo form_input(['name'=>'Name','value'=>$row->Staff_Name]);
 echo form_input(['name'=>'Designation','value'=>$row->Designation]);
 echo form_input(['name'=>'Department','value'=>$row->Department]);
 echo form_input(['name'=>'Qualification','value'=>$row->Qualification]);
 echo form_input(['name'=>'Gender','value'=>$row->Gender]);
 echo form_input(['name'=>'Date of Birth','value'=>$row->Date_of_Birth]);
 echo form_input(['name'=>'Area of Interest','value'=>$row->Area_of_Interest]);
 echo form_input(['name'=>'Contact No','value'=>$row->Contact_No]);
} 
 echo form_submit(['name'=>'submit','value'=>'Post']);
	 echo form_close();?><br>*/

