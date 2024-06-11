<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
}

.navbar1 {
  overflow: hidden;
  background-color: #333;
  width:100%;
  font-family: Arial, Helvetica, sans-serif;
}

.navbar1 a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown1 {
  /* float: left; */
  width:100%;
  overflow: hidden;
}

.dropdown1 .dropbtn1 {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font: inherit;
  margin: 0;
}

.navbar1 a:hover, .dropdown1:hover .dropbtn1 {
  background-color: dodgerblue;
}

.dropdown-content1 {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  width: 97%;
  margin-left:19px;
  left: 0;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content1 .header {
  background: dodgerblue;
  padding: 5px;
  color: white;
}

.dropdown1:hover .dropdown-content1 {
  display: block;
}

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 24.94%;
  padding: 10px;
  background-color:#1e90ffab;
   /* #8cccf2; */
  height: 326px;
}

.column a {
  float: none;
  color: black;
  padding: 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.column a:hover {
  background-color: white;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>
</head>
<body>

<div class="navbar1">

  <div class="dropdown1" style="text-align:center">
    <button class="dropbtn1" style="font-size:20px;"> Department Data *<i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content1">
      <!-- <div class="header">
        <h2>Mega Menu</h2>
      </div>    -->
      <div class="row">
        <div class="column">
          <!-- <h3>Category 1</h3> -->
        <b>  <a href="/chronicle/index.php/admin_ctrl2/specialprg">Certificate/Diploma/Crash Courses</a>
        <!-- <a href="/chronicle/index.php/admin_ctrl2/NME"> Elective</a> -->
        <a href="/chronicle/index.php/admin_ctrl2/assosiate"> Association Meetings</a>
        <a href="/chronicle/index.php/stud_ctrl2/peerlearning" class="active"><b>Peer Learning </b></a>
        <a href="/chronicle/index.php/admin_ctrl2/remed">Remedial Class</a>    
        <a href="/chronicle/index.php/admin_ctrl2/shield">Overall Achieved </a>

          </b>
        </div>
        <div class="column">
          <!-- <h3>Category 2</h3> -->
          <b>   <a href="<?php echo site_url('admin_ctrl2/extension')?>">Extension Activity</a>
          <a href="<?php echo site_url('admin_ctrl2/consultancy')?>">Consultancy Services</a>
          <div class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Cluster Meetings <span class="caret"></span>  </a>
          <!-- <a class="dropdown-toggle" data-toggle="dropdown" href="#"><b>Other Points </b><span class="caret"></span></a> -->
        <ul class="dropdown-menu">
  <li>  <a  href="/chronicle/index.php/admin_ctrl2/Cluster1"><b> Cluster of Colleges</b> </a></li>        
  <li><a href="/chronicle/index.php/admin_ctrl2/Cluster"><b>Cluster of Departments</b></a></li>
  </ul> 
 </div>
          <a href="<?php echo site_url('admin_ctrl2/field_visit')?>">Field Visits</a> 
          <a href="/chronicle/index.php/admin_ctrl2/board" class="active">Board of Studies</a>         
          
 
        </div>
        <div class="column">
          <!-- <h3>Category 2</h3> -->
          <b>  
          <a href="<?php echo site_url('admin_ctrl2/Dept')?>"> Department Organized Events</a>
         <a href="<?php echo site_url('admin_ctrl2/alumni')?>">Alumni Interactions</a>
       <a href="<?php echo site_url('admin_ctrl2/Mou_signed')?>">MoU Signed</a></b>
       <a href="/chronicle/index.php/admin_ctrl2/mlm" class="active"><b>E-Contents Prepared  by Staff</b></a>  
       <a href="/chronicle/index.php/admin_ctrl2/work">Work Adjustment</a>         
           </b></div>
        <div class="column">
          <!-- <h3>Category 3</h3> --><b>
          
  
  
       
  
 
  <a href="/chronicle/index.php/admin_ctrl2/grant_applied">Project Grant Applied/Received</a>         
  <a href="/chronicle/index.php/admin_ctrl2/Project_pro">Students Project Proposals</a>         
  <a href="/chronicle/index.php/admin_ctrl2/first">First Graduate</a>         
  <a href="/chronicle/index.php/admin_ctrl2/overall_result">Overall Results</a>         
  <!-- <a href="#">Student Progression</a>          -->
  <a href="/chronicle/index.php/admin_ctrl2/drop">Student Dropout</a>         

  </b> <!-- <a href="/chronicle/index.php/admin_ctrl2/phd" class="active"><b>Staff PhD </b></a> -->
        </div>
      </div>
    </div>
  </div> 
</div>

<?php
if(isset($title)) echo $title;
?>
</body>
</html>
