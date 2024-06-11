<!DOCTYPE html>  
 <html>  
 <head>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
 <style>

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: DodgerBlue;
}  
body {
  font-family: Arial, Helvetica, sans-serif;
}


li {
  float: left;
}

li a {
  display: block;
  /*color: white;*/
  text-align: center;
  color: white;
  padding: 14px 16px;
  /* border-style: solid;
  border-width: thin; */
  text-decoration: none;
  /* font-size: 12px; */
}

li a:hover {
  background-color: #111;
}
.dropdown-menu{
  background-color: white;
}
</style>
              
      <body>        
  
<?php $this->session->userdata('Department');?>


       <ul class="nav navbar-nav">
  <li><a href="/chronicle/index.php/reports/specialprg"><b>Special Programs</b> </a></li><?php $_SESSION['CustomTitle']='<h3>Special Programs </h3>';?>
  <!-- </li><li><a href="/chronicle/index.php/reports/NME"><b> Non-Major Elective</b></a> -->
  </li><li> <a href="/chronicle/index.php/reports/assosiate"><b> Association Meeting</b></a>
 
 
  <li><a href="/chronicle/index.php/reports/Dept"><b>Seminar/Workshop/Conference Organised By Department</b> </a></li><?php $_SESSION['CustomTitle']='<h3>Seminar/Workshop/Conference Organised By Department </h3>';?>
  <li><a href="/chronicle/index.php/reports/MoU_signed"><b> MoU Signed</b></a></li><?php $_SESSION['CustomTitle']='<h3> MoU Signed </h3>';?>
  <li><a href="/chronicle/index.php/reports/alumini"><b>Alumni Interactions</b> </a></li><?php $_SESSION['CustomTitle']='<h3> Alumini Interactions </h3>';?>
  <li><a href="/chronicle/index.php/reports/consultancy"><b>Consultancy Services</b></a></li><?php $_SESSION['CustomTitle']='<h3> Consultancy Services </h3>';?>
  <li><a href="/chronicle/index.php/reports/extension"><b>Extension Activities</b></a></li><?php $_SESSION['CustomTitle']='<h3> Extension Activities </h3>';?>
  
  <li><a href="/chronicle/index.php/reports/overall_result"><b>Overall Results</b></a></li><?php $_SESSION['CustomTitle']='<h3> Overall Results </h3>';?>
  <li><a href="/chronicle/index.php/reports/student_progression"><b>Student Progression</b> </a></li><?php $_SESSION['CustomTitle']='<h3>Student Progression</h3>';?>
  <li><a href="/chronicle/index.php/reports/drop"><b>Students Dropout</b>  </a></li><?php $_SESSION['CustomTitle']='<h3> Students Dropout  </h3>';?>
  <li><a href="/chronicle/index.php/reports/New_teaching_methods"><b>New Teaching Methods Adopted</b>  </a></li><?php $_SESSION['CustomTitle']='<h3> New Teaching Methods Adopted </h3>';?>
  <li><a href="/chronicle/index.php/reports/beyond_syllabus"><b>Beyond Syllabus Scholarly Activities </b> </a></li><?php $_SESSION['CustomTitle']='<h3> Beyound Syllabus Scholarly Activities </h3>';?>
  <li><a href="/chronicle/index.php/reports/womensafety"><b> Women Safety Measures Initiated </b></a></li><?php $_SESSION['CustomTitle']='<h3> Women Safty Measures Initiated</h3>';?>
  <li><a href="/chronicle/index.php/reports/green_measures"><b> Green Measures Adopted </b> </a></li><?php $_SESSION['CustomTitle']='<h3> Green Measures Adopted </h3>';?>
  <li><a href="/chronicle/index.php/reports/strength"> <b>Strength,Weakness,Opportunities & Threads of Department</b> </a></li><?php $_SESSION['CustomTitle']='<h3> Strength,Weakness,Opportunities & Threads of Department </h3>';?>
  <li><a href="/chronicle/index.php/reports/significant_achievement"> <b>Significant Achievements of Department</b> </a></li><?php $_SESSION['CustomTitle']='<h3>Significant Achievements of Department</h3>';?>
  <li><a href="/chronicle/index.php/reports/User_sign"><b> Significant Contributions of the Department To College </b></a></li><?php $_SESSION['CustomTitle']='<h3> Significant Contributions of the Department To College</h3>';?>
  
  <li>  <a href="/chronicle/index.php/reports/Cluster"><b> Cluster Meeting</b> </a></li>
  <li><a href="/chronicle/index.php/reports/field_visit"><b>Field Visit</b></a></li><br>
  <li><a href="/chronicle/index.php/reports/overall_shield"><b>Overall Obtained by Students</b></a></li>
  <li><a href="/chronicle/index.php/reports/peer_learning"> <b>Peer Learning</b></a></li><?php $_SESSION['CustomTitle']='<h3> Peer Learning </h3>';?>
  <li><a href="/chronicle/index.php/reports/training"><b>Training Programme in Campus</b></a></li><?php $_SESSION['CustomTitle']='<h3>Training Programme in Campus  </h3>'; ?>
  <li><a href="/chronicle/index.php/reports/Internship"><b>Internship Training</b></a></li>
  <li><a href="/chronicle/index.php/reports/future_plan"><b>Future Plan</b></a></li><br>
  </ul>  
<br>
<br>
</body>
</html>
