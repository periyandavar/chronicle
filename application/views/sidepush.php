<!DOCTYPE html>
<html>
<head>
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
  font-size: 25px;
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
 <a href="/chronicle/index.php/Edit_Profile/index" id="isdefaultOpen"><i class="fas fa-user-edit"></i>Edit Profile</a>
  <button class="dropdown-btn"><i class="fas fa-award"></i> Achievements<i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="/chronicle/index.php/page_ctrl/Audio_book"><i class="fas fa-headphones"></i>Audio Book Launch</a>
    <a href="/chronicle/index.php/page_ctrl/awardrec"><i class="fas fa-award"></i>Awards Received</a>
    <!--<a href="/chronicle/index.php/book/index"><i class="fas fa-book-open"></i> Book Publish</a>-->
    <a href="/chronicle/index.php/page_ctrl/Cluster"><i class="fas fa-user-friends"></i> Cluster Meeting</a>
    
    <a href="/chronicle/index.php/page_ctrl/Consultancy"><i class="fas fa-user"></i> Consultancy Service</a>
    <a href="/chronicle/index.php/page_ctrl/FDP"><i class="fas fa-user-plus"></i> FDP</a>
    <a href="/chronicle/index.php/page_ctrl/Guest_lecture"><i class="fas fa-user"></i> Guest Lecture Deliver</a>
    <a href="/chronicle/index.php/page_ctrl/Paper"><i class="fas fa-user-paper"></i> Paper Publication</a>
    <a href="/chronicle/index.php/page_ctrl/Research"><i class="fas fa-user"></i> Research Guidance</a>
    <a href="/chronicle/index.php/page_ctrl/Seminar"><i class="fas fa-user-friends"></i> Seminar/Workshop</a>
</div>
  
    <a href="/chronicle/index.php/loginsamp/logout"><i class="">Logout</i></a>
    
</div>
<div id="main">
 <!-- <h2>Sidenav Push Example</h2>
  <p>Click on the element below to open the side navigation menu, and push this content to the right. Notice that we add a black see-through background-color to body when the sidenav is opened.</p>-->
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
</div>

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
