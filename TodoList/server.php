<?php
session_start(); 

$db = mysqli_connect("localhost","root","","todomanager");


$errors = array();

$sql = "CREATE TABLE IF NOT EXISTS todo(
	id INT(200) AUTO_INCREMENT PRIMARY KEY,
	message VARCHAR(255) NOT NULL
)";

$table = mysqli_query($db, $sql);


if(isset($_POST['addTodo'])){
	$message = @mysqli_real_escape_string($db, $_POST['message']);
	if(empty($message)){
	array_push($errors, "todo cannot be empty");
}
if(count($errors) === 0){
	$query = "INSERT INTO todo (`message`) VALUES ('$message')";
	$results = mysqli_query($db, $query);
	if($results){
	header('location: todo.php');
}else{
	array_push($errors, "there is an error");
}
}
}

if(isset($_POST['deleteTodo'])){
	$id = @mysqli_real_escape_string($db, $_POST['messageId']);
	$query = "DELETE FROM todo WHERE `id`='$id'";
		$results = mysqli_query($db, $query);
		header('location: todo.php');
}

if(isset($_POST['updateTodo'])){
	$id = @mysqli_real_escape_string($db, $_POST['messageId']);
	$message = @mysqli_real_escape_string($db, $_POST['outmessages']);
	if(empty($message)){
		$query = "DELETE FROM todo WHERE `id`='$id'";
		$results = mysqli_query($db, $query);
		header('location: todo.php');
	}else{
		$query2 = "UPDATE todo SET `message`='$message' WHERE 
		`id`='$id'";
		$results2 = mysqli_query($db, $query2);
		header('location: todo.php');
	}

	
}

















?>
