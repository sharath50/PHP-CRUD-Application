<?php declare(strict_types=1); ?>
<?php include('connection.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP CRUD Application</title>
	<meta name="author" content="sharath mohan">
	<meta name="description" content="PHP CRUD application project">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>


<?php 

	$id = intval(@$_GET['id']);

	$nameError = '';
	$ageError = '';
	$genderError = '';
	$roleError = '';
	$salaryError = '';
	$addressError = '';

	$empName = '';
	$empAge = '';
	$empGender = '';
	$empRole = '';
	$empSalary = '';
	$empAddress = '';

?>

<?php 

	if (isset($_POST['submit'])) {
		if (empty($_POST['empname'])) {
			$nameError = 'Name required';
		} else {
			$empName = check_input($_POST['empname']);
		}
		if (empty($_POST['empage'])) {
			$ageError = 'Age required';
		} else {
			$empAge = check_input($_POST['empage']);
		}
		if (empty($_POST['gender'])) {
			$genderError = 'Gender required';
		} else {
			$empGender = $_POST['gender'];
		}
		if (empty($_POST['emprole'])) {
			$roleError = 'Role required';
		} else {
			$empRole = check_input($_POST['emprole']);
		}
		if (empty($_POST['salary'])) {
			$salaryError = 'Salary required';
		} else {
			$empSalary = check_input($_POST['salary']);
		}
		if (empty($_POST['address'])) {
			$addressError = 'Address required';
		} else {
			$empAddress = check_input($_POST['address']);
		}

	}

	function updated_data() {
			global $empName , $empAge , $empGender , $empRole , $empSalary , $empAddress;
			echo "<ul class='list-unstyled'> <li> Name : " . $empName . "</li>";
			echo "<li> Email : " . $empAge . "</li>";
			echo "<li> Website : " . $empGender . "</li>";
			echo "<li> Gender : " . $empRole . "</li>";
			echo "<li> Gender : " . $empSalary . "</li>";
			echo '<li> comments : ' . $empAddress . "</li> </ul>";
	}

	function check_input($data) {
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	function update_into_database() {
		global $empName , $empAge , $empGender , $empRole , $empSalary , $empAddress , $connection , $id;

		$insert_query = "UPDATE employee_record SET emp_name = '{$empName}' , emp_age = '{$empAge}' , emp_role = '{$empRole}' , salary = '{$empSalary}' , home_address = '{$empAddress}' , sex = '{$empGender}' WHERE id = '{$id}';";
		$insert = $connection->query($insert_query);

			if ($insert) {
				echo 'ok, data updated successfully';
			} else {
				echo 'No, data not undated';
				echo "error : " . $insert->error;
			}
	}


?>


<div class='content'>
	<div class="container">
		<div class="row">
			<div class="col-8">
				<form class="form-group" action="" method="POST">
					<div class="form-group">
						<label class="lead" for="name">Empoyee Name : <span class="text-dark font-weight-lighter"><?php echo $nameError; ?></span></label>
						<input class="form-control form-control-sm" id="name" type="text" name="empname">
					</div>
					<div class="form-group">
						<label class="lead" for="age">Employee Age : <span class="text-dark font-weight-lighter"><?php echo $ageError; ?></span></label>
						<input class="form-control form-control-sm" id="age" type="number" name="empage">
					</div>
					<div class="form-group">
						<label class="lead" for="role">His / Her - Role : <span class="text-dark font-weight-lighter"><?php echo $roleError; ?></span></label>
						<input class="form-control form-control-sm" id="role" type="text" name="emprole">
					</div>
					<div class="form-group">
						<label class="lead" for="salary">His / Her - Salary : <span class="text-dark font-weight-lighter"><?php echo $salaryError; ?></span></label>
						<input class="form-control form-control-sm" id="salary" type="number" name="salary">
					</div>
					<div class="form-group">
						<label class="lead">Gender : <span class="text-dark font-weight-lighter"><?php echo $genderError; ?></span></label> <br/>
						<div class="btn-group btn-group-toggle" data-toggle="buttons">
							<label class="btn btn-sm btn-primary active">
								<input id="option1" type="radio" value="male" name="gender" checked>Male
							</label>
							<label class="btn btn-sm btn-primary">
								<input id="option2" type="radio" value="female" name="gender">Female
							</label>
							<label class="btn btn-sm btn-primary">
								<input id="option2" type="radio" value="Other" name="gender">Other
							</label>
						</div>
					</div>
					<div class="form-group">
						<label class="lead" for="address">Address : <span class="text-dark font-weight-lighter"><?php echo $addressError; ?></span></label>
						<textarea class="form-control form-control-sm" id="address" rows="4" cols="30" name="address" maxlength="512"></textarea>
					</div>
					<div class="form-group">
						<button class="btn btn-sm btn-outline-success btn-block d-inline-block" name="submit" type="submit">Update</button>
						<a class="btn btn-sm btn-outline-info d-inline-block" href="Read_database.php">Read</a>
						<a class="btn btn-sm btn-outline-primary d-inline-block" href="index.php">Create</a>
						<a class="btn btn-sm btn-outline-danger d-inline-block" href="Delete_database.php">Delete</a>
					</div>
				</form>

			</div>
			<div class="col-4 bg-white text-dark card">
				<h1 class="h1 text-primary text-center">Employees Create</h1>

				<?php
						if (empty($nameError) && empty($ageError) && empty($genderError) && empty($roleError) && empty($salaryError) && empty($addressError)) {
							if (!empty($empName) && !empty($empAge) && !empty($empGender) && !empty($empRole) && !empty($empSalary) && !empty($empAddress)) {
								updated_data();
								update_into_database();
							} 
						}
					
				?>
			</div>
		</div>
	</div>
</div>



<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>