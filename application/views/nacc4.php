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
 </style> 
      <body> 
<?php $this->session->userdata('Department');?>
       <ul class="nav navbar-nav">
        <li><a href="/CI-Project/index.php/Naac/project_received">4.1.3</a></li><?php $_SESSION['CustomTitle']='<h3> Number of research projects per teacher funded by government and non-government agencies during the last five years</h3>';?>
        <li><a href="/CI-Project/index.php/Naac/Research_guides">4.1.4</a></li><?php $_SESSION['CustomTitle']='<h3>Number of research projects per teacher funded by government and non-government agencies during the last five years</h3>';?>
        <li><a href="/CI-Project/index.php/Naac/project_received">4.3.2</a></li><?php $_SESSION['CustomTitle']='<h3> Percentage of teachers recognised as research guides </h3>';?>
        
        <li><a href="/CI-Project/index.php/Naac/seminar">4.3.3</a></li><?php $_SESSION['CustomTitle']='<h3> Total number of workshops/seminars conducted on Intellectual Property Rights (IPR) and Industry-Academia Innovative practices year wise during last five years    </h3>';?>
        <li><a href="/CI-Project/index.php/Naac/awards">4.3.4</a></li><?php $_SESSION['CustomTitle']='<h3> Number of awards for innovation won by teachers  during the last five years    </h3>';?>
  <li><a href="/CI-Project/index.php/Naac/paper_publication">4.4.1.1</a></li><?php $_SESSION['CustomTitle']='<h3>Paper Published in Journal by the Staff </h3>';?>
  </ul>
</body>
</html>
