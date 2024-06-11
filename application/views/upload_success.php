<html>
<head>
    <title>Success Message</title>
               <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>   
           <style>
           	.button{
  background-color: black;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

</style>
</head>
<body>
<h3><center>Congratulation You Have Successfully Uploaded</center>
</h3>
<center><button type="button" class="btn btn-primary" onclick="goBack()"><b> Back </b></button>

<!-- Uploaded file specification will show up here -->
<!--<ul>
    <?php #foreach ($upload_data as $item => $value):?>
    <li><?php #echo $item;?>: <?php# echo $value;?></li>
    <?php #endforeach; ?>
</ul>
<p><?php //echo anchor('Upload/file_view', 'Upload Another File!'); ?></p>-->
<script>
  function goBack(){
  	
   window.history.back();
   // window.back('select_ctrl/display');
   //redirect('localhost/chronicle/index.php/select_ctrl/display');
    }
  </script>
</body>
</html>