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
  height: 150px;
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
.make{
  background-color: red;
}
</style>
</head>
<body>

<div class="navbar1">

  <div class="dropdown1" style="text-align:center">
    <button class="dropbtn1" style="font-size:20px;">  Data Verification (Faculty) *<i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content1">
      <!-- <div class="header">
        <h2>Mega Menu</h2>
      </div>    -->
      <div class="row">
        <div class="column">
          <!-- <h3>Category 1</h3> -->
        <b>  <a href="/chronicle/index.php/approval/Awards"  <?php 
        foreach($data as $row) $dept=$row->Department;
        foreach (($this->selection_model->awar($dept)) as $x1)
        foreach ($x1 as $y1)
        if($y1>0) echo"class='make'";
        ?>><b>Awards Received By Staff <?php echo' ('.$y1.')';?></b></a>
        <a href="/chronicle/index.php/approval/book"  <?php 
        foreach($data as $row) $dept=$row->Department;
        foreach (($this->selection_model->bk($dept)) as $x1)
        foreach ($x1 as $y1)
        if($y1>0) echo"class='make'";
        ?>><b>Book Published By Staff <?php echo' ('.$y1.')';?></b></a>
          </b>
        </div>
        <div class="column">
          <!-- <h3>Category 2</h3> -->
          <b> 
          <a href="/chronicle/index.php/approval/journal" <?php 
        foreach($data as $row) $dept=$row->Department;
        foreach (($this->selection_model->jnl($dept)) as $x1)
        foreach ($x1 as $y1)
        if($y1>0) echo"class='make'";
        ?>  ><b>Journals By Staff<?php echo' ('.$y1.')';?></b></a>
          <a href="/chronicle/index.php/approval/FDP" <?php 
        foreach($data as $row) $dept=$row->Department;
        foreach (($this->selection_model->fdp($dept)) as $x1)
        foreach ($x1 as $y1)
        if($y1>0) echo"class='make'";
        ?> ><b>Faculty Development Program <?php echo' ('.$y1.')';?></b></a>
        </div>
        <div class="column">
          <!-- <h3>Category 2</h3> -->
          <b> <a href="/chronicle/index.php/approval/guest_lecture" <?php 
        foreach($data as $row) $dept=$row->Department;
        foreach (($this->selection_model->gst($dept)) as $x1)
        foreach ($x1 as $y1)
        if($y1>0) echo"class='make'";
        ?>><b>Guest Lecture Delivered by Staff<?php echo' ('.$y1.')';?></b></a></b>
          </div>
        <div class="column">
          <!-- <h3>Category 3</h3> --><b>
          <a href="/chronicle/index.php/approval/seminar" <?php 
        foreach($data as $row) $dept=$row->Department;
        foreach (($this->selection_model->sor($dept)) as $x1)
        foreach ($x1 as $y1)
        if($y1>0) echo"class='make'";
        ?>><b>Seminar/Workshop/Conference Attended<?php echo' ('.$y1.')';?></b></a>
          
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
