
<?php 
include 'inc/header.php';
include 'lib/employee.php';
?>


<div class="panel panel-default">
    	<div class="panel-heading">
    		<h2>
    			<a class="btn btn-success" href="add.php">Add Employee</a>
    			<a class="btn btn-info pull-right" href="index.php">Take Attendance</a>

    		</h2>
    	</div>

    	<div class="panel-body">
    		
    	</div>
    		<form action="" method="post">
    			<table class=table table-striped>
    				<tr>
    					<th width="30%">Serial </th>
    					<th width="50%">Attendance date</th>
    					<th width="20%">Action</th>
    					
    				</tr>
                    
                    <?php 
                    $emp = new employee();
                    $get_date = $emp->getDatelist();
                    if ($get_date) {
                        $i=0;
                        while ($value = $get_date->fetch_assoc()) {
                            $i++;
                    ?>
                    <tr>
    					<td><?php echo $i;?></td>
    					
    					<td><?php echo $value['attendance_time'];?></td>
    					<td>
    					<a class="btn btn-primary" href="employee_view.php?dt=<?php echo $value['attendance_time'];?>">View</a>
    					</td>
    				</tr>
                    
                      <?php }  }?>

    			</table>
             
    		</form>
    	</div>

    </div>

  <?php include 'inc/footer.php';?>  
