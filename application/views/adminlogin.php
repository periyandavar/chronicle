<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
<style>
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
.Footer
{
background-color:#003366;
margin-top:50px;
float:left;
width:1220px;
height:150px;
color:white;
}
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

/* Full-width input fields */
input[type=text], input[type=password],input[type=submit],select {
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
  width: 20%;
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
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}



/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
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
</style>
</head>
<body>      
        <?php include('header.php');?>
  
  <form class="modal-content animate" method="post" action="/chronicle/index.php/admin_login/auth/">
    <div class="imgcontainer">
      <a href="/chronicle/index.php/select_ctrl/header"><span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span></a>
      <img src="/chronicle/images/2.png" alt="Avatar" class="avatar" width="200px" height="160px">
    </div>

    <div class="container">
      <?php echo $this->session->flashdata('msg');?><br>
     <?php echo validation_errors('<div class="alert alert_danger" color="red">','</div>');?>
     <br>

<div class="panel panel-default"> 
            <div class="panel-heading">Login</div> 
            <div class="panel-body"> 
                <!--dropdown input--> 
                <label class="title">User ID </label> <br>
                <input type="text" placeholder="Department ID" name="Staff_ID" class="form-control" required>
                <!-- <?php echo form_dropdown('Staff_ID', $Staff_ID, '', 'class="form-control"');?>  -->
                    <br> 
                    
      <label for="psw"><b>Password</b></label><br>
      <input type="password" placeholder="Enter Password" name="Password" class="form-control" required>
        <br>
      <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-md"><br>
      
    </div>

    
      
    <!--  <span class="psw">Forgot <a href="#">password?</a></span>-->
    </div>
  </form>
</div>

</div>
  
    <script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

        </body>
        </html>