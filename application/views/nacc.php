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
        <li><a href="/CI-Project/index.php/Naac/project_received">3.2.1</a></li><?php $_SESSION['CustomTitle']='<h3> Number of research projects per teacher funded by government and non-government agencies during the last five years</h3>';?>
        <li><a href="/CI-Project/index.php/Naac/Research_guides"> 3.2.3 </a></li><?php $_SESSION['CustomTitle']='<h3>Number of research projects per teacher funded by government and non-government agencies during the last five years</h3>';?>
        <li><a href="/CI-Project/index.php/Naac/project_received"> 3.2.4 </a></li><?php $_SESSION['CustomTitle']='<h3> Percentage of teachers recognised as research guides </h3>';?>
        
        <li><a href="/CI-Project/index.php/Naac/seminar">3.3.2</a></li><?php $_SESSION['CustomTitle']='<h3> Total number of workshops/seminars conducted on Intellectual Property Rights (IPR) and Industry-Academia Innovative practices year wise during last five years    </h3>';?>
        <li><a href="/CI-Project/index.php/Naac/awards">3.3.3</a></li><?php $_SESSION['CustomTitle']='<h3> Number of awards for innovation won by teachers  during the last five years    </h3>';?>
  <li><a href="/CI-Project/index.php/Naac/paper_publication">3.4.5</a></li><?php $_SESSION['CustomTitle']='<h3>Paper Published in Journal by the Staff </h3>';?>
    <li><a href="/CI-Project/index.php/Naac/consultancy_service">3.5.2</a></li><?php $_SESSION['CustomTitle']='<h3>Revenue generated from consultancy during the last five years(INR in Lakhs)  </h3>';?>
     <li><a href="/CI-Project/index.php/Naac/extension_activity">3.6.2</a></li>
  <li><a href="/CI-Project/index.php/Naac/extension_activity">3.6.3</a></li><?php $_SESSION['CustomTitle']='<h3> Number of extension and outreach programs conducted in collaboration with industry,community and Non - Government Organisations  through NSS/NCC/Red cross/YRC etc.,  during the last five years  </h3>';?>
  <li><a href="/CI-Project/index.php/Naac/stud_exact">3.6.4 </a></li><?php $_SESSION['CustomTitle']='<h3>Total number of students participating in extension activities with Government Organisations, Non-Government Organisations and during last five years </h3>';?>

  <li><a href="/CI-Project/index.php/Naac/linkage_for_ojt">3.7.1</a></li><?php $_SESSION['CustomTitle']='<h3>Number of linkages for faculty exchange, student exchange, internship, field trip,on-the-job training, research, etc year-wise during last five years   </h3>';?>
  <li><a href="/CI-Project/index.php/Naac/book">Book Publish</a></li><?php $_SESSION['CustomTitle']='<h3> Extension Activities </h3>';?>
  
  <li><a href="/CI-Project/index.php/Naac/mou_signed">3.7.2 </a></li><?php $_SESSION['CustomTitle']='<h3> Number of functional MoUs with institutions of national, international importance, other Institutions, industries, corporate  houses etc. during the last five years (only functional MoUs with  ongoing activities to be considered) </h3>';?>
   <li><a href="/CI-Project/index.php/Naac/dept_org_seminar">Department Organized Programmes </a></li><?php $_SESSION['CustomTitle']='<h3> Extension Activities </h3>';?>
  
  
  </ul>

</body>
</html>
