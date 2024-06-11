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
  height: 237px;
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
    <button class="dropbtn1" style="font-size:20px;"> Faculty Data *<i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content1">
      <!-- <div class="header">
        <h2>Mega Menu</h2>
      </div>    -->
      <div class="row">
        <div class="column">
          <!-- <h3>Category 1</h3> -->
          <a href="/chronicle/index.php/admin_ctrl1/Staff" class="active"><b>Staff Profile</b></a>
          <a href="/chronicle/index.php/admin_ctrl1/book" class="active"><b>Books Published By Staff</b></a>        
          <a href="/chronicle/index.php/admin_ctrl1/journal" class="active"><b>Papers in Journals By Staff</b></a>
          <a href="/chronicle/index.php/admin_ctrl1/refresher_orientation" class="active"><b>Refresh/Orientation Courses</b></a>
          
        </div>
        <div class="column">
          <!-- <h3>Category 2</h3> -->
          <a href="/chronicle/index.php/admin_ctrl1/seminar" class="active"><b>Seminars/Conferences Attended</b></a>
          <a href="/chronicle/index.php/admin_ctrl1/workshop" class="active"><b>Workshops Attended</b></a>
           <a href="/chronicle/index.php/admin_ctrl1/FDP" class="active"><b>Faculty Development Programs</b></a>
           <a href="/chronicle/index.php/admin_ctrl1/Research_Project" class="active"><b>Research Projects</b></a>
        </div>
        <div class="column">
          <!-- <h3>Category 2</h3> -->
          <a href="/chronicle/index.php/admin_ctrl1/guest_lecture" class="active"><b>Guest Lectures Delivered by Staff</b></a>          
          <a href="/chronicle/index.php/admin_ctrl1/exam" class="active"><b>Exams Passed (NET/SET)</b></a>
          <a href="/chronicle/index.php/admin_ctrl1/Awards" class="active"><b>Awards Received By Staff</b></a>
          <a href="/chronicle/index.php/admin_ctrl1/study" class="active"><b>Board of Studies</b></a>          

        </div>
        <div class="column">
          <!-- <h3>Category 3</h3> -->
          <a href="/chronicle/index.php/admin_ctrl1/research" class="active"><b>Research Guidance</b></a>          
          <a href="/chronicle/index.php/admin_ctrl1/phd" class="active"><b>PhD </b></a>
          <a href="/chronicle/index.php/admin_ctrl1/guide" class="active"><b>Ph.D. Scholars Guided </b></a>
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
