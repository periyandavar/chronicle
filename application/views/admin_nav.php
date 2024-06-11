<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<style>
body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.dropdown-btn {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}
.dropdown-btn:hover {
  color: #f1f1f1;
}
.dropdown-container {
  display: none;
  font-size: 10px;
  background-color: #262626;
  padding-left: 5px;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
  float: right;
  padding-right: 8px;
}
</style>
</head>
<body>
<nav class="navbar navbar-dark bg-primary" style="max-height: 93px;">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
  <h3><center><lable>Admin</lable></center></h3>
<?php $this->session->userdata('Department');?><span>
<button type="button" class="btn btn-primary pull-right ">
  Notifications <span class="badge badge-light"></span></span>
</button>
</nav>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="/chronicle/index.php/admin_login/change_pass">Change Password</a>
  <a href="/chronicle/index.php/grocery_ctrl/header">Edit Header </a>
  <a href="/chronicle/index.php/grocery_ctrl/add_user">Add Subadmin </a>
  <a href="<?php echo site_url('pages/deptrpt1')?>"> Department Data</a>
 
 <a href="<?php echo site_url('pages/FacultyAchievement')?>"> Faculty Data</a>
  
  <a href="/chronicle/index.php/pages/studrpt1"> Student Data</a>
  <button class="dropdown-btn"> Report <i class="fa fa-caret-right"></i></button>
  <div class="dropdown-container">
  <!-- <a href="/chronicle/index.php/ADDC/index" >AARC</a> -->
  <a href="/chronicle/index.php/Appraisal1/index" >Department Appraisal</a>

      <a href="/chronicle/index.php/autonomy1/index" >Autonomy</a>
      <button class="dropdown-btn"> Academic Audit <i class="fa fa-caret-right"></i></button>
      <div class="dropdown-container">
      <a href="/chronicle/index.php/pages/deptrpt">Department Data</a><br>
      <a href="/chronicle/index.php/pages/facultyrpt">Faculty Data</a><br>
      <a href="/chronicle/index.php/pages/studrpt">Student Data</a><br>
    </div>
    </div>
    <a href="/chronicle/index.php/loginsamp/logout"><i class="">Logout</i></a>
    </div>
    
    
</div>
<div id="main">


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}

var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}

</script>
   
</body>
</html> 
