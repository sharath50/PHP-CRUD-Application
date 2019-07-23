<?php declare(strict_types=1); ?>
<?php include('connection.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>C R U D Delete</title>
	<meta name="author" content="sharath mohan">
	<meta name="description" content="PHP CRUD application project">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>


	<?php
		function read_id() {
			global $connection;

			$read_query = "SELECT id , emp_name, emp_role FROM employee_record;";
			$read = $connection->query($read_query);
			$data = '';
			if ($read->num_rows > 0) {
				while($row = $read->fetch_assoc()) {
					$id = $row['id'];
					$name = $row['emp_name'];
					$role = $row['emp_role'];
					$data .= "<option value='{$id}'>{$id}, {$name}, {$role}</option>";
				}
			}
			return $data;
		}

	?>

<div class='content'>
	<div class="container">
		<div class="col"><h1 class="h1 text-primary text-center">C R U D DELETE</h1></div>
			<div class="row">
				<div class="col-6 bg-white text-dark">
					<p class="lead text-danger">Delete By Selecting Multiple ID</p>
					<form action="" method="POST">
						<select multiple name="records" class="form-control w-50">
							<?php
								echo read_id();
							?>
						</select>
						<br/>
						<div class="form-group">
							<button class="btn btn-sm btn-outline-danger d-inline-block" type="submit" name="submit">Multi Delete </button>
							<a class="btn btn-sm btn-outline-danger d-inline-block" href="deleting.php?id=all">Delete All Data</a>
						</div>
					</form>
			</div>
			<div class="col-4 bg-white">
				<?php
					if (isset($_POST['submit'])) {

						print_r($_POST['records']);

						// foreach ($_POST['records'] as $key) {
						// 	echo $key;
						// }
					}
				?>
			</div>
			<div class="col-2 p-2 bg-light">
				<br/>
				<a class="btn btn-sm btn-outline-success btn-block " href="index.php">Create</a>
				<a class="btn btn-sm btn-outline-primary btn-block" href="Update_database.php">Update</a>
				<a class="btn btn-sm btn-outline-info btn-block" href="Read_database.php">Read</a>
				<br/>
			</div>
		</div>
	</div>
</div>





<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>