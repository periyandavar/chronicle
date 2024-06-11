<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CodeIgniter CSV Import</title>
	
    <!-- Bootstrap library -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/bootstrap.min.css'); ?>">
    
    <!-- Stylesheet file -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>
<body>
<div class="container">
    <h2>Student List</h2>
	
    <!-- Display status message -->
    <?php if(!empty($success_msg)){ ?>
    <div class="col-xs-12">
        <div class="alert alert-success"><?php echo $success_msg; ?></div>
    </div>
    <?php if(!empty($error_msg)){ ?>
    <div class="col-xs-12">
        <div class="alert alert-danger"><?php echo $error_msg; ?></div>
    </div>
    <?php } ?>
	
    <div class="row">
        <!-- Import link -->
        <div class="col-md-12 head">
            <div class="float-right">
                <a href="javascript:void(0);" class="btn btn-success" onclick="formToggle('importFrm');"><i class="plus"></i> Import</a>
            </div>
        </div>
		
        <!-- File upload form -->
        <div class="col-md-12" id="importFrm" style="display: none;">
            <form action="<?php echo base_url('members/import'); ?>" method="post" enctype="multipart/form-data">
                <input type="file" name="file" />
                <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
            </form>
        </div>
        
        <!-- Data list table -->
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>#ID</th>
                    <th>Reg_No</th>
                    <th>Student_Name</th>
                    <th>Class</th>
                    <th>Department</th>
                    <th>Gender</th>
                    <th>Dob</th>
                    <th>Email_ID</th>
                    <th>Mobile_No</th>
                    <th>Photo</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($members)){ foreach($members as $row){ ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['Reg_No']; ?></td>
                    <td><?php echo $row['Student_Name']; ?></td>
                    <td><?php echo $row['Class']; ?></td>
                    <td><?php echo $row['Department']; ?></td>
                    <td><?php echo $row['Gender']; ?></td>
                    <td><?php echo $row['Dob']; ?></td>
                    <td><?php echo $row['Email_ID']; ?></td>
                    <td><?php echo $row['Mobile_No']; ?></td>
                    <td><?php echo $row['Photo']; ?></td>
                </tr>
                <?php } }else{ ?>
                <tr><td colspan="10">No member(s) found...</td></tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
function formToggle(ID){
    var element = document.getElementById(ID);
    if(element.style.display === "none"){
        element.style.display = "block";
    }else{
        element.style.display = "none";
    }
}
</script>
</body>
</html>