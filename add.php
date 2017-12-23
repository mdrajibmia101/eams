
<?php 
include 'inc/header.php';
include 'lib/employee.php';
?>

<?php 
$emp = new employee();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $name=$_POST['name'];
  $Id=$_POST['id'];
  $insertdata = $emp->insertemployee($name,$Id);
}
?>

<?php 
if (isset($insertdata)){
    echo $insertdata;
}
?>

<div class="panel panel-default">
    	<div class="panel-heading">
    		<h2>
    			<a class="btn btn-success" href="add.php">Add Employee</a>
    			<a class="btn btn-info pull-right" href="index.php">Back</a>
    		</h2>
    	</div>

    	<div class="panel-body">
    		<form action="" method="post">
    			<div class="form-group">
                   <label for="name">Employee Name</label>
                   <input type="text" class="form-control" name="name" id="name">
                </div>

                <div class="form-group">
                   <label for="id">Employee Id</label>
                   <input type="text" class="form-control" name="id" id="id">
                </div>

                <div class="form-group">
                   <input type="submit" class="btn btn-primary" name="submit" value="Add employee">
                </div>
    		</form>
    	</div>

    </div>

  <?php include 'inc/footer.php'?>  
