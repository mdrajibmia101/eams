<?php
 $filepath=realpath(dirname(__FILE__));
 include_once ($filepath.'/Database.php');
?>


<?php
class employee{
    private $db;

    public function __construct()
    {
     $this->db = new Database();
    }
public function get_employees()
{
 $query="SELECT * FROM employee_table";
 $result=$this->db->select($query);
 return $result;
}

public function insertemployee($name, $Id)
{
 $name = mysqli_real_escape_string($this->db->link, $name);
 $Id = mysqli_real_escape_string($this->db->link, $Id);
 if (empty($name) || empty($Id)) 
 {
 $msg = "<div class ='alert alert-danger'><strong>Error!</strong>Field must not be empty !</div>";
 return $msg;
 }
 else
 {
   $emp_query = "INSERT INTO employee_table(employee_Name,employee_Id) VALUES('$name','$Id')";
   $emp_insert = $this->db->insert($emp_query);

   $att_query = "INSERT INTO attendance_table(employee_Id) VALUES('$Id')";
   $emp_insert = $this->db->insert($att_query);

   if ($emp_insert) 
   {
   	$msg = "<div class='alert alert-success'><strong>Success !</strong>Employee Data Inserted Successfully.</div>";
 	return $msg;
 	}
 	else
 	{
 	$msg = "<div class='alert alert-danger'><strong>Error!</strong>Employee Data Not Inserted.</div>";
 	return $msg;
 	}
   

 }

}



public function insertAttendance($cur_date,$attend = array())
{
 $query="SELECT DISTINCT attendance_time FROM attendance_table";
 $getdata = $this->db->select($query);
 while ($result = $getdata->fetch_assoc()) {
 	$db_date = $result['attendance_time'];
 	if ($cur_date == $db_date) {
 	$msg = "<div class='alert alert-danger'><strong>Error!</strong>Attendance already Taken Today</div>";
 	return $msg;
 	}
 }
 foreach ($attend as $atn_key => $atn_value) {
 	if ($atn_value == "present") {
 		$emp_query = "INSERT INTO attendance_table(employee_Id,attend,attendance_time) VALUES ('$atn_key','present',now())";
 		$data_insert = $this->db->insert($emp_query);
 	}
 	elseif ($atn_value == "absent") {
 		$emp_query = "INSERT INTO attendance_table(employee_Id,attend,attendance_time) VALUES ('$atn_key','absent',now())";
 		$data_insert = $this->db->insert($emp_query);
 	}
 }
  if ($data_insert) 
   {
   	$msg = "<div class='alert alert-success'><strong>Success !</strong>Attendance Data Inserted Successfully.</div>";
 	return $msg;
 	}
 	else
 	{
 	$msg = "<div class='alert alert-danger'><strong>Error!</strong>Attendance already taken.</div>";
 	return $msg;
 	}
   

}
public function getDatelist()
{
$query = "SELECT DISTINCT attendance_time FROM attendance_table";
 $result = $this->db->select($query);
 return $result;
}


}
?>