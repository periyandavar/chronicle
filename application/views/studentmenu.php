<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #f5f5f5;
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
  color: black;
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
  color: black;
}
.dropdown-container {
  display: none;
  background-color: #f5f5f5;
  padding-left: 8px;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
  float: right;
  padding-right: 8px;
}
</style>
</head>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  
    <a href="/chronicle/index.php/studachieve/change_pass"><i class="fas fa-user-friends"></i> Change Password</a>
    <!-- <a href="/chronicle/index.php/studachieve"><i class="fas fa-user-friends"></i> Achievements</a> -->
    <a href="/chronicle/index.php/studachieve/intercollegiate" class="active">Inter-Collegiate Meet</a>
    <a href="/chronicle/index.php/studachieve/workshop" class="active">Workshop </a>
    <a href="/chronicle/index.php/studachieve/conference" class="active">Conference</a>
    <a href="/chronicle/index.php/studachieve/seminar" class="active">Seminar</a>
    <a href="/chronicle/index.php/studachieve/competitive" class="active">Competitive Exam </a>
    <a href="/chronicle/index.php/studachieve/sports" class="active">Sports & Games </a>
    <a href="/chronicle/index.php/studachieve/cultural" class="active">Cultural Competition </a>
    <a href="/chronicle/index.php/studachieve/placement" class="active">Placement</a>
    <!-- <a href="/chronicle/index.php/studachieve/others" class="active">Others</a> -->
    <a href="/chronicle/index.php/loginsamp/logout"><i class="">Logout</i></a>
    
</div>


<div id="main">
   
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
</div>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
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
