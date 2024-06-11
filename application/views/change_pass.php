<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
<title>Login Form</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
<style>
	input[type=password],input[type=submit],select {
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
<h2>Change Password</h2>
<br>

<form method="post" action='change_pass'>
		
		<input type="password" name="Password" id="name" required placeholder="Old Pass" class="form-control"/><br /><br />
		
		<input type="password" name="New_Password" id="password" required placeholder="New Password" class="form-control"/><br/><br />

		
		<input type="password" name="confirm_pass" id="password" reqired placeholder="Confirm Password" class="form-control"/><br/><br />
		<input type="submit" value="change" name="change_pass" class="btn btn-primary btn-md"/><br />
</form>
</center>
<?php if (isset($msg)) echo$msg; ?>
</div>
</div>
</body>
</html>