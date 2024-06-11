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
  height: 225px;
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
    <button class="dropbtn1" style="font-size:20px;"> Student Data *<i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content1">
      <!-- <div class="header">
        <h2>Mega Menu</h2>
      </div>    -->
      <div class="row">
        <div class="column">
          <!-- <h3>Category 1</h3> -->
          <a href="/chronicle/index.php/report1/stud"><b> Students Profile</b></a>
          <a href="/chronicle/index.php/stud_ctrl1/conference" class="active"><b>Seminars/Conferences </b></a>        
          <a href="/chronicle/index.php/stud_ctrl1/workshop" class="active"><b>Workshops </b></a>
          <a href="/chronicle/index.php/stud_ctrl1/intercollegiate" class="active"><b>Inter-Collegiate Meets</b></a>

        </div>
        <div class="column">
          <!-- <h3>Category 2</h3> -->
          <a href="/chronicle/index.php/stud_ctrl1/sports" class="active"><b>Sports & Games </b></a>
          <a href="/chronicle/index.php/stud_ctrl1/cultural" class="active"><b>Cultural Competitions </b></a>
          <a href="/chronicle/index.php/admin_ctrl1/scholar"><b>Scholarships Received</b> </a>
          <a href="/chronicle/index.php/admin_ctrl1/AnnexureIX"><b>Papers in Journals</b> </a>

        </div>
        <div class="column">
          <!-- <h3>Category 2</h3> -->
          <a href="/chronicle/index.php/stud_ctrl1/project_applied" class="active"><b> Final Year Projects</b></a>
          <a href="<?php echo site_url('admin_ctrl1/training')?>"><i class="active"></i><b>Internship/Training Programs</b></a>
          
          <a href="/chronicle/index.php/admin_ctrl1/dis"><b> Physically Disabled</b> </a>
          <a href="/chronicle/index.php/admin_ctrl1/state"><b> Students from other States</b> </a>
        </div>
        <div class="column">
          <!-- <h3>Category 3</h3> -->
          <a href="/chronicle/index.php/stud_ctrl1/competitive" class="active"><b>Competitive Exams Passed </b></a>
          <a href="/chronicle/index.php/stud_ctrl1/placement" class="active"><b>Placement</b></a>
          <a href="/chronicle/index.php/admin_ctrl1/progression"><b> Higher Studies</b> </a>
          <a href="/chronicle/index.php/admin_ctrl1/others"><b>Others </b></a>
          <!-- <a href="/chronicle/index.php/admin_ctrl/phd" class="active"><b>Staff PhD </b></a> -->
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
