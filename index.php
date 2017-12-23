
<?php 
include 'inc/header.php';
include 'lib/employee.php';
?>
<script type ="text/javascript">
    $(document).ready(function(){

       $("form").submit(function(){
       var employee_Id = true;
        $('.radio').each(function(){
         name=$(this).attr('name');
        if (employee_Id && !$('.radio[name ="' + name + '"]:checked').length) {
            alert(name + " employee_Id !");
            employee_Id = false;
        }
        });
        return employee_Id;
       });
    });
</script>
<?php 
error_reporting(0);
$emp=new employee();
$cur_date=date('y-m-d');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $attend=$_POST['attend'];
   $insertattend = $emp->insertAttendance($cur_date,$attend);
}
?>

<?php 
if (isset($insertattend)){
    echo $insertattend;
}
?>

<div class="panel panel-default">
    	<div class="panel-heading">
    		<h2>
    			<a class="btn btn-success" href="add.php">Add Employee</a>
    			<a class="btn btn-info pull-right" href="date_view.php">View Employee</a>

    		</h2>
    	</div>

    	<div class="panel-body">

    	<div class="well text-center" style="font-size:20px">
    	<strong>Date:</strong><?php echo $cur_date; ?>
    		
    	</div>
    		<form action="" method="post">
    			<table class=table table-striped>
    				<tr>
    					<th width="25%">Serial </th>
    					<th width="25%">Employee Name</th>
    					<th width="25%">Employee Id</th>
    					<th width="25%">Attendance</th>
    				</tr>
                    
                    <?php 
                    $get_employee = $emp->get_employees();
                    if ($get_employee) {
                        $i=0;
                        while ($value = $get_employee->fetch_assoc()) {
                            $i++;
                    ?>
                    <tr>
    					<td><?php echo $i;?></td>
    					<td><?php echo $value['employee_Name'];?></td>
    					<td><?php echo $value['employee_Id'];?></td>
    					<td>
    					<input type="radio" name="attend [<?php echo $value['employee_Id'];?>]" value="present">P
    					<input type="radio" name="attend [<?php echo $value['employee_Id'];?>]" value="absent">A
    					</td>
    				</tr>
                    
                      <?php }  }?>
    				<tr>
    					<td colspan="4">
                            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                        </td>
    				</tr>

    			</table>
             
    		</form>
    	</div>

    </div>

  <?php include 'inc/footer.php';?>  
