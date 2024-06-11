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
        
           <center><h4>Audio Book  </h4></center>
            
           <div class="container" style="width:500px;"> 
                 <?php echo form_open_multipart('Audio/do_upload');?>
                  <label>Staff ID</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php foreach($data as $row) {echo"<td text-align:left>".$row->Staff_ID. "</span></td></tr>";}?><br>
                  <label>Staff Name</label>
                  <input type="text" disabled name="Staff_Name" value="<?php foreach($data as $row) echo "$row->Staff_Name"?>"   class="form-control"><br>
                  <label>Department</label>
                  <input type="text" disabled name="Department" value="<?php foreach($data as $row) echo "$row->Department"?>"   class="form-control"><br>
                     <label>Title of Program</label>  
                     <textarea name="Title_of_Program" id="Title_of_Program" class="form-control">  </textarea>
                     <br />  
                       
                     <label>Organising Agency</label>  
                     <input type="text" name="Organising_Agency" id="Organising_Agency" class="form-control" /> 
                     <br /> 
                     
                     <label>Date</label>  
                     <input type="Date" placeholder="YYYY-MM-DD"  
pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))"  name="Date" class="form-control"placeholder="Date"><br>
  
                  
   <span>Choose file</span>
      <input type='file' onchange="readURL(this);" name="Certificate">
      <img id="blah" src="#" alt="your image" class="img-thumbnail" name="Certificate">
      <input type='file' onchange="readURL(this);" name="Evidence2">
      <img id="blah" src="#" alt="your image" class="img-thumbnail" name="Evidence2">
      <input type='file' onchange="readURL(this);" name="Evidence3">
      <img id="blah" src="#" alt="your image" class="img-thumbnail" name="Evidence3">
    
                     
                    <br>
                     <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" onclick="return confirm('Are you sure want to submit') "/>
                     <span id="error_message" class="text-danger"></span>  
                     <span id="success_message" class="text-success"></span>  
                 
           
           </form>
           </div> 
      
 <script>  
  function required()
{
var  Title= document.forms["audio"]["Title_of_Program"];
var Organising_Agency= document.forms["audio"]["Organising_Agency"];
var Date =document.forms["audio"]["Date"];
var Certificate =document.forms["audio"]["Certificate"];
if(Title.value == ''|| Organising_Agency.value == ''||Date.value == ''||Certificate.value == '')
{
  window.alert("All fields are required.");
  return false;
}
else{
  redirect('Audio/get_data');
}
}

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
    
  /*  function confSubmit(form) {

if (confirm("Are you sure you want to submit the form?")) {
  if(alert("Please fill the Required field"))
form.submit();
}*/

 </script>  
</body>  
 </html>  