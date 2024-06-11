<!DOCTYPE html>  
 <html>  
 <head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>   </head>
 <style>
  .navbar {
    overflow: hidden;
    background-color: #333;
    font-family: Arial, Helvetica, sans-serif;
    margin-top: 0%;
    margin-bottom: -10%;
}

.navbar a {
    float: left;
    font-size: 16px;
    color: white;
    text-align: center;
    padding: 14px 16px;
    margin-left:10px;
    text-decoration: none;
}

.navbar a:hover, .dropdown:hover .dropbtn {
    background-color: slateblue;
}
body {font-family: Arial, Helvetica, sans-serif;}

 </style>
      
      <body>  
        <div>
          <h4><b><CENTER>
          <input type="label" name="Department" value="<?php foreach($data as $row) echo "$row->Department"?>" style=" width:50%; height:20%" disabled><br>
          <?php $this->session->userdata('Department');?></CENTER></b>
        </h4>
          
        </div>
        <div class="navbar">
  <a href="/chronicle/index.php/admin_ctrl/Staff">Faculty Profile </a>
  <a href="/chronicle/index.php/admin_ctrl/Projects">Research Projects Received By Members of Staff </a>
  <a href="/chronicle/index.php/admin_ctrl/paper_publication"> Publications of Faculty</a>
  <a href="/chronicle/index.php/admin_ctrl/Staff/#">Journal </a>
  <a href="/chronicle/index.php/admin_ctrl/Staff/#">Books</a>
  <a href="/chronicle/index.php/admin_ctrl/Staff/#">Proceedings</a>
  <a href="/chronicle/index.php/admin_ctrl/Research">Research Guidance by Staff </a>
  <a href="/chronicle/index.php/admin_ctrl/guest_lecture"> Guest Lecture Delivered By Staff Member </a>
  <a href="/chronicle/index.php/admin_ctrl/#">Seminar Attended not Participated </a>
  <a href="/chronicle/index.php/admin_ctrl/guest_lecture"> Paper Presented in Seminar/Conference By Staff </a>
  <a href="/chronicle/index.php/admin_ctrl/Awards">Awards Received by Staffs </a><br>
  <a href="/chronicle/index.php/admin_ctrl/guest_lecture"> MLM Prepared by Staff </a>
  
  <a href="/chronicle/index.php/admin_ctrl/guest_lecture#"> Video Lessons Prepared by Staff</a>
  <a href="/chronicle/index.php/admin_ctrl/Audio"> Audio Book Prepared by Staff </a>
  <a href="/chronicle/index.php/admin_ctrl/FDP"> FDP </a>
  
<a href="/chronicle/index.php/grocery_ctrl/specialprg">Special Programs </a>
  <a href="/chronicle/index.php/grocery_ctrl/department">Seminar/Workshop/Conference Organised By Department </a>
  <a href="/chronicle/index.php/grocery_ctrl/MoU_signed"> MoU Signed</a>
  <a href="/chronicle/index.php/grocery_ctrl/alumini">Alumini Interactions </a>
  <a href="/chronicle/index.php/grocery_ctrl/consultancy">Consultancy Services</a>
  <a href="/chronicle/index.php/grocery_ctrl/extension">Extension Activities</a>
  <a href="#">Overall Results</a>
  <a href="/chronicle/index.php/admin_ctrl/guest_lecture/#">Student Progression </a>
  <a href="#">New Teaching Methods  </a>
  <a href="/chronicle/index.php/grocery_ctrl/Cluster"> Cluster Meeting </a>
  <a href="/chronicle/index.php/grocery_ctrl/field_visit">Field Visit</a><br>
  <a href="#">Overall Obtained by Students</a>
    <a href="#"> Peer Learning</a>
  <a href="/chronicle/index.php/admin_ctrl/Audio"> Audio Book Prepared by Staff </a>
  <a href="/chronicle/index.php/admin_ctrl/FDP"> FDP </a>

</div>
  
</body>
</html>
