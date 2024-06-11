<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<style>
body {font-family: "Lato", sans-serif;}

.sidebar {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 16px;
}

.sidebar a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
#main {
  transition: margin-left .5s;
  padding: 16px;
}
table, td, th {  
  border: none ;
  background-color: #f2f2f2;
  text-align: left;
  font-size: 18px;
  color: DodgerBlue;
  font-weight: inherit;
  border-radius: 15px 15px 15px 15px;
  text-decoration-style: ;
}
  table {
  border-collapse: collapse;
  width: 50%;
}
th, td {
  padding: 15px;
}

@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
  
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
  background-color: #262626;
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

  <a href="#home" id="isdefaultOpen"><i class="fas fa-user-edit"></i>Edit Profile</a>
  <button class="dropdown-btn"><i class="fas fa-award"></i> Achievements<i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="/chronicle/index.php/Audio/index"><i class="fas fa-headphones"></i>Audio Book Launch</a>
    <a href="/chronicle/index.php/Awards/index"><i class="fas fa-award"></i>Awards Received</a>
    <a href="/chronicle/index.php/book/index"><i class="fas fa-book-open"></i> Book Publish</a>
    <a href="/chronicle/index.php/Cluster_Meeting/index"><i class="fas fa-user-friends"></i> Cluster Meeting</a>
    
    <a href="/chronicle/index.php/Consultancy/index"><i class="fas fa-user"></i> Cosultancy Service</a>
    <a href="/chronicle/index.php/FDP/index"><i class="fas fa-user-plus"></i> Faculty Development Programmes</a>
    <a href="/chronicle/index.php/Guest_lecture/index"><i class="fas fa-user"></i> Guest Lecture Deliver</a>
    <a href="/chronicle/index.php/imginsert/index"><i class="fas fa-user-paper"></i> Paper Publication</a>
    <a href="/chronicle/index.php/Research/index"><i class="fas fa-user"></i> Research Guidance</a>
    <a href="/chronicle/index.php/Seminar/index"><i class="fas fa-user-friends"></i> Seminar/Workshop</a>
       
  </div>
  
    <a href="#logout"><i class="">Logout</i></a>
</div>
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
<div id="main">

<script>
  
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

function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}
</script>
</body>
</html>