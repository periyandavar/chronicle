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
        
           <center><h4>Cluster Meeting </h4></center>
            
           <div class="container" style="width:500px;">  
                 <?php echo form_open_multipart('Clust/get_user');?>
                  <label>Staff ID</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php foreach($data as $row) {echo"<td text-align:left>".$row->Staff_ID. "</span></td></tr>";}?><br>                   
                     <label>Date</label>  
                     <input type="Date" placeholder="YYYY-MM-DD"  
pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))"  name="Date" class="form-control"><br>
  <label>Speaker(Name of Faculty)</label>  
                     <input type="text" name="Staff_Name"  class="form-control" value="<?php foreach($data as $row) {echo"$row->Staff_Name";}?>" >  
                     <br /> 
                     <label>Discipline(Department)</label><br>  
                     <input type="text" name="Department"  class="form-control" value="<?php foreach($data as $row) {echo"$row->Department";}?>" >
                     <br /> 
                     <label>Title</label>  
                     <input type="text" name="Title" id="Title" class="form-control" required /> 
                     <br /> 
                  
      <span>Choose file</span>
      <input type='file' onchange="readURL(this);" name="Certificate" required>
       <img id="blah" src="#" alt="your image" class="img-thumbnail" name="Certificate">
    
    
                     
                    <br>
                     <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" onclick="return confirm('Are you sure want to submit') "/> 
                               
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
    
 </script>  
</body>  
 </html>  