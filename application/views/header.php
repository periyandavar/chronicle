<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
<style>
*{
  box-sizing:border-box;
}
html{
  background: rgb(248, 249, 250);
}

.Tittle
{
	
	color:white;
	font-family: 'Impact, Charcoal, sans-serif';
background-color:#003366;
padding:3px;
}
#footer {
    /* clear: both; */
    position: absolute;
    /* height: 200px; */
    margin-top: 100%;
    bottom:0;
}
.Form
{
	margin-top:20px;
	padding:5px;
	width:300px;
	height:200px;
	background-color:#000033;
	color:white;
	border-radius:15px;
}
/* .Footer
{
background-color:#003366;
margin-top:50px;
float:left;
width:1220px;
height:150px;
color:white;
} */
.main{
  float: left;
    color: black;
  font-family: 'Impact, Charcoal, sans-serif';
  font-style: bold;
background-color: #f5f5f5;
padding:3px;
    margin-top: 7%;
    margin-bottom: -10%;
    border-radius: 0px;
}
.navbar {
    overflow: hidden;
    background-color: #333;
    font-family: Arial, Helvetica, sans-serif;
    margin-top: 0%;
    /* margin-bottom: -10%; */
    border-radius: 0px;
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

body {
  margin:0;
  padding:0;

  font-family: Arial, Helvetica, sans-serif;
    /* overflow:hidden; */
}

/* Full-width input fields */
input[type=text], input[type=password],input[type=submit] {
  width: 75%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: none;
  align-items: center;
  
}

/* Set a style for all buttons */
button {
  background-color: black;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 50%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 13%;
  height: 30%;
  border-radius: 50%;
}

.container {
  padding: 16px;
  width:50%;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  /* height: 100%; Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}



/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: -5% auto 1% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 60%; /* Could be more or less, depending on screen size */
  height:65%;
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: Dodger Blue;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 50%;
  }
}
.alert_danger{
color: #FF0000;
font-size: 10pt;
}
#snackbar {
  visibility: hidden;
  min-width: 250px;
  margin-left: -205px;
  background-color: #333;
  color: #fff;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
  position: fixed;
  z-index: 1;
  left: 50%;
  bottom: 30px;
  font-size: 17px;
}

#snackbar.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
  from {bottom: 0; opacity: 0;} 
  to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {bottom: 30px; opacity: 1;} 
  to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}
</style>
</head>
<body>			
				<img src='/chronicle/images/logo.png' align='center' height='100' width='100' style="float:left" >	
				<div class='Tittle'><center>
				<h1>AYYA NADAR JANAKI AMMAL COLLEGE</h1><h5>
        
        <?php  $val = $this->selection_model->abtus();
        echo ($val[0]->detail); ?>
        
        <!-- (Autonomus,affiliated to Madurai Kamaraj University,
				Re-accredited(3rd Cycle) with 'A' grade<br>(CGPA 3.67 out of 4)
				by NAAC and recognized as College of Excellence by UGC,<br>
				Star College by DBT and Ranked 47th at National Level in NIRF 2018)</h5> -->
        <h2>Sivakasi-West 626124</h2>
        </center>
				</div>
	<div class="navbar">
  
  <a href="/chronicle/index.php/selection_ctrl/depts"> Departments </a>
  <a href="/chronicle/index.php/loginsamp"> LogIn </a>
  <!-- <a href="/chronicle/index.php/admin_login"> Admin LogIn </a> -->
</div>
<div id="snackbar">Developed by Department of Computer Science..!</div>

<script>

 {
  var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 300000);
}
</script>
<!-- <div class="main"> 
        
      </div> -->
<!-- <center>      <div>
      <footer id="footer" >
Developed by the Department of Computer Science
</footer>
      </div></center> -->
		</body>
				</html>