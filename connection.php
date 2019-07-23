<?php 

$connection = new mysqli('localhost' , 'root' , '123456' , 'company');

if (!$connection) {
	die ('database not connected ' . $connection->connect_error);
}

// $selection = $connection->select_db('company');
// if (!$selection) {
// 	die ('table not selected ' . $connection->connect_errno);
// }

?>