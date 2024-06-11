<!DOCTYPE html>
<html>
<head>
  <style>
  <style>
     input[type=text],select {
    width: 75%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border:  1px solid #ccc;
    border-radius: 4px;
    align-items: center;
    box-sizing: border-box;
}
input[type=submit] {
    width: 50%;
    background-color: black;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border:none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  width: 50%;
  padding: 50px;
  border-radius: 15px 15px 15px 15px;
  background-color: #f2f2f2;
  align-content: center;
  text-align: left;
}
body {
   align-content: center;
    text-align: center;

}
</style></head>
<body>
	<div>
		<label for="Dept_ID">Department ID</label>
    <select id="Dept_ID" name="Deprt_ID">
      <option value="UR1-UG MATHS">UR1-UG MATHS</option>
      <option value="PR1">PR1-PG MATHS</option>
      <option value="UR2">UR2-UG PHYSICS</option>
      <option value="PR2">PR2-PG PHYSICS</option>
      <option value="UR3">UR3-UG CHEMISTRY</option>
      <option value="PR3">PR3-PG CHEMISTRY</option>
      <option value="UR4">UR4-UG ZOOLOGY</option>
      <option value="PR4">PR4-PG ZOOLOGY</option>
      <option value="UR5">UR5-UG CS</option>
       <option value="US5">US5-UG SF CS</option>
       <option value="PS5">PS5-PG CS</option>
      <option value="UR6">UR6-UG ECONOMICS</option>
      <option value="PR6">PS6-PG ECONOMICS</option>
      <option value="UR7">UR7-UG PHS</option>
      <option value="UR8">UR8-UG BBA</option>
      <option value="US8">US8-UG SF BBA</option>
      <option value="UR9">UR9-UG B.COM</option>
      <option value="US9">UR9-UG SF B.COM</option>
      <option value="US10">UR10-UG SF B.COM</option>


    </select><br>
    <input type="submit" name="save" value="Submit">
</div>
</body>
</html>