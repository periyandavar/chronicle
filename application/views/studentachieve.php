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
body {font-family: Arial, Helvetica, sans-serif;}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: DodgerBlue;
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
}
</style>              
<body>               
  <?php $this->session->userdata('Department');?>
  <ul class="nav navbar-nav">
  <li><a href="/chronicle/index.php/studachieve/intercollegiate" class="active"><b>Inter-Collegiate Meet Attended by Student</b></a></li>
 <li><a href="/chronicle/index.php/studachieve/workshop" class="active"><b>Workshop Attended by Student</b></a></li>
    <li><a href="/chronicle/index.php/studachieve/conference" class="active"><b>Conference Attended by Student</b></a></li>
  </li>
  <li><a href="/chronicle/index.php/studachieve/seminar" class="active"><b>Seminar Attended By Student</b></a></li>
  </li>
  <li><a href="/chronicle/index.php/studachieve/competitive" class="active"><b>Competitive Exam Passed by Student</b></a></li>
  </li>
  <li><a href="/chronicle/index.php/studachieve/sports" class="active"><b>Sports & Games Participated By Student</b></a></li>
  </li>
  <li><a href="/chronicle/index.php/studachieve/cultural" class="active"><b>Cultural Competition Participated By Student</b></a></li>
  <li><a href="/chronicle/index.php/studachieve/placement" class="active"><b>Placement</b></a></li>
  <li><a href="/chronicle/index.php/studachieve/others" class="active"><b>Others</b></a></li>
  </li>
</ul>  
<?php if(isset($title)) echo $title; ?> 
</body>
</html>
