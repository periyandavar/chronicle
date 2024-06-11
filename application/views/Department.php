<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
}
  
/* body {
  font-family: Arial, Helvetica, sans-serif;
} */




/*ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: black;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}*/
.dropdown-menu{
  background-color: DodgerBlue;
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
    <button class="dropbtn1" style="font-size:20px;">  Academic Audit (Department) *<i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content1">
      <!-- <div class="header">
        <h2>Mega Menu</h2>
      </div>    -->
      <div class="row">
        <div class="column">
          <!-- <h3>Category 1</h3> -->
        <b> <a href="/chronicle/index.php/report/specialprg"><b>Certificate/Diploma/Crash Courses</b> 
        <a href="/chronicle/index.php/report/Dept"><b>Seminars/Workshops/Conferences Organised</b> </a>
        <a href="/chronicle/index.php/report/MoU_signed"><b> MoU Signed</b></a>
        <a href="/chronicle/index.php/report/alumini"><b>Alumni Interactions</b> </a>
        
        
          </b>
        </div>
        <div class="column">
          <!-- <h3>Category 2</h3> -->
          <b> 
          <ul>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><b>Other Points </b><span class="caret"></span></a>
        <ul class="dropdown-menu">
  <li>  <a href="/chronicle/index.php/report/Cluster"><b> Cluster of Departments</b> </a></li>
  <li>  <a href="/chronicle/index.php/report/Cluster1"><b> Cluster of Colleges</b> </a></li>                
  <li><a href="/chronicle/index.php/report/field_visit"><b>Field Visit</b></a></li>
  <li><a href="/chronicle/index.php/report/overall_shield"><b>Overall Obtained by Students</b></a></li>
  <li><a href="/chronicle/index.php/report/peer_learning"> <b>Peer Learning</b></a></li>
  <li><a href="/chronicle/index.php/report/training"><b>Training Programme in Campus</b></a></li>
  <li><a href="/chronicle/index.php/report/Internship"><b>Internship Training</b></a></li>
  
  <li><a href="/chronicle/index.php/report/consultancy"><b>Consultancy Services</b></a></li>
  <li><a href="/chronicle/index.php/report/extension"><b>Extension Activities</b></a></li>
  </ul> 
 </li></ul>  
 <a href="/chronicle/index.php/report/overall_result"><b>Overall Results</b></a>
  <!-- <a href="/chronicle/index.php/report/overall_result"><b>Overall Results</b></a> -->
 <!-- <a href="/chronicle/index.php/report/student_progression"><b>Student Progression</b> </a> -->
 <a href="/chronicle/index.php/report/drop"><b>Students Dropout</b>  </a>
 <a href="/chronicle/index.php/report/future_plan"><b>Future Plan</b></a>
        </div>
        <div class="column">
          <!-- <h3>Category 2</h3> -->
          <b>  
          <a href="/chronicle/index.php/report/New_teaching_methods"><b>New Teaching Methods Adopted</b></a>
          <a href="/chronicle/index.php/report/beyond_syllabus"><b>Beyond Syllabus Scholarly Activities </b> </a>
          <a href="/chronicle/index.php/report/womensafety"><b> Women Safety Measures Initiated </b></a>
          <a href="/chronicle/index.php/report/green_measures"><b> Green Measures Adopted </b> </a>
           </b></div>
        <div class="column">
          <!-- <h3>Category 3</h3> --><b>
          <a href="/chronicle/index.php/report/strength"> <b>Strength,Weakness,Opportunities & Threads of Department</b> </a>
          <a href="/chronicle/index.php/report/significant_achievement"> <b>Significant Achievements of Department</b> </a>
          <a href="/chronicle/index.php/report/significant"><b> Significant Contributions of the Department To College </b></a>
          
          
  <!-- <a href="#">Student Progression</a>          -->
  <!-- <a href="/chronicle/index.php/Appraisal/">Extra Annexure-XX</a> -->

  </b> <!-- <a href="/chronicle/index.php/admin_ctrl/phd" class="active"><b>Staff PhD </b></a> -->
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
