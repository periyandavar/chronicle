<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
<title>Add Class</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
<style>
	input[type=text],input[type=number],input[type=submit],select {
  width: 25%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: none;
  align-items: center;
}
  </style>
  </head>
<body>

<div id="main">
<div id="login">
<?php echo @$error; ?>

<center>
<h2>Add a Classs (Add Students)</h2>
<br>

<form method="post" action='change_pass1'>
		
		<input type="text" name="Password" id="name" required placeholder="Students Prefix" class="form-control"/><br /><br />
		
		<input type="number" name="New_Password" id="password" required placeholder="Strength" class="form-control"/><br/><br />

		
		
		<input type="submit" value="Add" name="change_pass1" class="btn btn-primary btn-md"/><br />
</form>
</center>
<?php if (isset($msg)) echo$msg; ?>
</div>
</div>
</body>
</html>