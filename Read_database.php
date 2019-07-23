<?php declare(strict_types=1); ?>
<?php include('connection.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>C R U D Read</title>
	<meta name="author" content="sharath mohan">
	<meta name="description" content="PHP CRUD application project">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>


	<?php
		function read_database() {
			global $connection;

			$read_query = "SELECT * FROM employee_record;";
			$read = $connection->query($read_query);
			$data = '';
			if ($read->num_rows > 0) {
				while($row = $read->fetch_assoc()) {
					$data .= "<tr><td>{$row['id']}</td><td>{$row['emp_name']}</td><td>{$row['emp_age']}</td><td>{$row['sex']}</td><td>{$row['emp_role']}</td><td>{$row['salary']}</td><td>{$row['home_address']}</td><td><a class='btn text-danger btn-link' href='deleting.php?id={$row['id']}'>Delete</a><td><a class='btn text-warning btn-link' href='Update_database.php?id={$row['id']}'>Update</a></td></tr>";
				}
			}
			return $data;
		}

	?>

<div class='content'>
	<div class="container">
			<div class="row">
				<div class="col-10 bg-white text-dark card">
					<div class="col"><h1 class="h1 text-primary text-center">Employees Read</h1></div>
					<table class="table table-hovered table-striped table-bordered">
						<thead>
							<tr class="table-light">
								<th>Id</th>
								<th>Name</th>
								<th>Age</th>
								<th>Gender</th>
								<th>Role</th>
								<th>Salary</th>
								<th>Address</th>
								<th>Delete</th>
								<th>Update</th>
							</tr>
						</thead>
						<tbody>
							<?php
								echo read_database();
							?>
						</tbody>
				</table>
			</div>
			<div class="col-2 p-2 bg-light">
				<br/>
				<a class="btn btn-sm btn-outline-success btn-block " href="index.php">Create</a>
				<a class="btn btn-sm btn-outline-primary btn-block" href="Update_database.php">Update</a>
				<a class="btn btn-sm btn-outline-danger btn-block" href="Delete_database.php">More Delete</a>
				<br/>
			</div>
		</div>
	</div>
</div>





<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>