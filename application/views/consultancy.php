<!DOCTYPE html>  
 <html>  
      <head>  
           <title>ANJA College </title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
          <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
          <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
          <meta charset=utf-8 />
          <meta name="viewport" content="width=device-width, initial-scale=1">
      </head>  
  <body> 
    
  <div class="container" style="width:500px;"> 
   <?php echo validation_errors();?> 
  <!--<form id="submit_form" action="<?php echo base_url();?>/consultancy/do_upload" method="post"> -->
  	<?php echo form_open_multipart('Consultancy/do_upload');?>
  <label>Staff ID</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  <?php foreach($data as $row) {echo"<td text-align:left>".$row->Staff_ID. "</span></td></tr>";}?><br> 
  <label>Name of the Consultant</label>  
  <input type="text" name="Staff_Name" value="<?php foreach($data as $row) echo "$row->Staff_Name"?>"   class="form-control"><br>
  <br /> 
  <label>Department</label>
                  <input type="text" name="Department" value="<?php foreach($data as $row) echo "$row->Department"?>"   class="form-control"><br>



  <label>Name of Consultancy Project</label>  
  <textarea name="Name_of_Project" id="Name_of_journal" class="form-control"></textarea>    
  <br />  
  
   
  <label>Consulting/Sponsoring Agency</label>
   <textarea name="Name_of_Agency" id="Name_of_journal" class="form-control"></textarea>  
  <br />  
  <label>Consulting Agency Address</label>  
  <textarea name="Agency_Address" id="Name_of_journal" class="form-control"></textarea>  
  <br />  

  <label>Agency Contact Detail</label>  
  <input type="text" name="Agency_Contact" id="Year" class="form-control"></textarea> <br />  

  <label>Revenue generated</label>  
  <input type="text" name="Amount_generated" id="Year" class="form-control"></textarea> <br />  
  <label>Billing Document</label>  
  <input type='file' onchange="readURL(this);"  name="Billing_Document" size="50">
  <!--<img id="blah" src="#" alt="your image" class="img-thumbnail">-->
  <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" onclick="return confirm('Are you sure want to submit') "/>
  <span id="error_message" class="text-danger"></span>  
  <span id="success_message" class="text-success"></span>  
  </form>  
   </div>  
   
 <script>  
 
 function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(150);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    
   function confSubmit(form) {

if (confirm("Are you sure want to submit the form?")) {
  if(alert("Please fill the Required field"))
form.submit();
}
}

 </script>  
</body>  
 </html>  