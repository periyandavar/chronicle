<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: "Lato", sans-serif;}

.sidebar {
  height: 100%;
  width: 20%;
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

.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}
</style>
</head>
<body>

<div class="sidebar">
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

<