<?php declare(strict_types=1); ?>
<?php include('connection.php'); ?>
<?php  

$id = $_GET['id'];

function deleting_all() {
	global $connection;
	$delete_sql = "DELETE FROM employee_record";
	$connection->query($delete_sql);
}

function deleting_one() {
	global $connection , $id;
	$id = intval($id);
	$delete_sql = "DELETE FROM employee_record WHERE id = '{$id}' ";
	$connection->query($delete_sql);
}

if ($id == 'all') {
	deleting_all();	
} else {
	deleting_one();	
}


?>


<script>
	window.open('Read_database.php' , '_self');
</script>