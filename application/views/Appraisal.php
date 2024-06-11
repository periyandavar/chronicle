<!DOCTYPE html>
<html>
<head>
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
  height: 377px;
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
    <button class="dropbtn1" style="font-size:20px;">Department Appraisal *<i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content1">
      <!-- <div class="header">
        <h2>Mega Menu</h2>
      </div>    -->
      <div class="row">
        <div class="column">
          <!-- <h3>Category 1</h3> -->
        <b>  <a href="/chronicle/index.php/Appraisal/work">Work Adjustment</a>
        <a href="/chronicle/index.php/Appraisal/app">Mobile App Development</a>
        
        <a href="/chronicle/index.php/Appraisal/seminar">Staff Attended Seminars/Workshops</a>   
        <a href="/chronicle/index.php/Appraisal/grant_applied">Project Proposal Applied (Grant Applied)</a>
        <a href="/chronicle/index.php/Appraisal/student_project">Project Proposal Applied (Student Project)</a>
        <a href="/chronicle/index.php/Appraisal/paper_publication">Staff Publications</a>
          </b>
        </div>
        <div class="column">
          <!-- <h3>Category 2</h3> -->
          <b> <a href="/chronicle/index.php/Appraisal/seminar1">Staff Presented</a>
          <a href="/chronicle/index.php/Appraisal/dept_org_seminar">Department Organized </a>
          
          <a href="/chronicle/index.php/stud_appraisal/AnnexureVIII">Students Performance </a>
          <a href="/chronicle/index.php/stud_appraisal/AnnexureIX">Student Publications </a>        
          <a href="/chronicle/index.php/stud_appraisal/AnnexureX">Students Presented </a>
 
        </div>
        <div class="column">
          <!-- <h3>Category 2</h3> -->
          <b>  
          <a href="/chronicle/index.php/stud_appraisal/AnnexureXI">Best Paper Award by Students </a>
          <a href="/chronicle/index.php/Appraisal/consultancy_service">Consultancy</a>
          <a href="/chronicle/index.php/Appraisal/awards">Best Paper Awards by Staff </a>
          <a href="/chronicle/index.php/Appraisal/overall_shield">Overall Shields</a>
          <a href="/chronicle/index.php/Appraisal/guest_lecture">Guest Lectures Delivered </a>
           </b></div>
        <div class="column">
          <!-- <h3>Category 3</h3> --><b>
          
  
  
       
          
          <a href="/chronicle/index.php/Appraisal/FDP"> FDP  </a>
          <a href="/chronicle/index.php/Appraisal/extension_activity">Extension</a>
          <a href="/chronicle/index.php/Appraisal/mou">MoU Signed</a>
          <a href="/chronicle/index.php/Appraisal/remed">Remedial Class </a>
          <a href="/chronicle/index.php/Appraisal/refresher_orientation"> Refresh/Orientation Courses </a>
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
