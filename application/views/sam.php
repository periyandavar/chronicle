<!DOCTYPE html>  
 <html>  
 <head>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
	<form>
		<?php echo form_open_multipart('myctrl/samp');?>
	<div>
		Search  Event <input type="text" name="tbname"><br>
		Search Date <input type="Date" name="Date"><br>
		Search To-Date <input type="Date" name="To_Date"><br>
		<input type="submit" name="submit">
	</div>
</form>
</body>
</html>