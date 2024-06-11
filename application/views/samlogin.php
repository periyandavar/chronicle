<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
</head>
<body>
	<div>
		<form method="post" action="select" >
		Department Code<br>	<input type="text" name="Departmnent_Code"><br>
		Password	<br><input type="password" name="Password"><br>
			<button type="submit" name="submit">submit</button>
		</form>
	</div>
</body>
<!--controller fuction

$this->form_validation->set_rules('deptcode','Department Code','required');
public function isEmailExist($deptcode){
	$this->load->library('form_validation');
	$this->load->model('user');
	$is_exist=$this->dept->isEmailExist($deptcode);
	if($is_exist){
	$this->form_validation->set_message('isEmailExist','Email address is already exist');
	return false;
}
else{
	return true;
}
}

#model function

function isEmailExist($email){
	$this->db->select('id');
	$this->db->where('email',$email);
	$query=$this->db->get('users');
	if($query->num_rows() >0){
	return true;
}
else{
	return false;
}
}-->