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
        
           <center><h4>Guest Lecture Delivered </h4></center>
            
           <div class="container" style="width:500px;">  
                 <?php echo form_open_multipart('Guest_lecture/get_user');?>
                  <label>Staff ID</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php foreach($data as $row) {echo"<td text-align:left>".$row->Staff_ID. "</span></td></tr>";}?><br>
                  <label>Staff_Name</label>
                  <input type="text" name="Staff_Name" value="<?php foreach($data as $row) echo "$row->Staff_Name"?>"   class="form-control"><br>
                  <label>Department</label>
                  <input type="text" name="Department" value="<?php foreach($data as $row) echo "$row->Department"?>"   class="form-control"><br>
                     <label>Title</label>  
                     <textarea name="Title" id="Title" class="form-control" required>  </textarea>
                     <br />  
                       
                     <label>Forum</label>  
                     <input type="text" name="Place" id="Place" class="form-control" required /> 
                     <br /> 
                     
                     <label>Date</label>  
                     <input type="Date" placeholder="YYYY-MM-DD"  
pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))"  name="Date" class="form-control"placeholder="Date"><br>
  
                  
      <span>Choose file</span>
      <input type='file' onchange="readURL(this);" name="Certificate">
      <img id="blah" src="#" alt="your image" class="img-thumbnail" name="Certificate">
    
    
                     
                    <br>
                     <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" onclick="return confirm('Are you sure want to submit') "/> 
                     <span id="error_message" class="text-danger"></span>  
                     <span id="success_message" class="text-success"></span>  
                 
           
           </form>
           </div> 
      
 <script>  
  function required()
{
var Conference_Name = document.forms["PtForm"]["Conference_Name"];
var Title = document.forms["PtForm"]["Title"];
var Level = document.forms["PtForm"]["Level"];
var Issn_Isbn = document.forms["PtForm"]["Issn_Isbn"];
var Page_No = document.forms["PtForm"]["Page_No"];
var Name_of_journal = document.forms["PtForm"]["Name_of_journal"];
var Place = document.forms["PtForm"]["Place"];
var Year =document.forms["PtForm"]["Date_Year"];
var Certificate =document.forms["PtForm"]["Certificate"];
if(Conference_Name.value == ''|| Title.value == ''|| what.selectedIndex < 1 == '' ||Issn_Isbn.value == ''||Name_of_journal.value == ''||Page_No.value == ''||Place.value == ''||Date_Year.value == ''||Certificate.value == '')
{
  window.alert("All fields required.");
  return false;
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