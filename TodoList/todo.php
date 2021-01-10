<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Todo-List</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
	<section class="card align-middle">
		<div class="container">
			<div class="card-header">
				<h3 class="card-title text-align-center">Todo-List</h3>
			</div>
			<div class="alert">
            	<?php include('errors.php') ?>
        	</div>
			<div class="card-body">
				<form action="todo.php" method="post">
					<div class="input-group">
						<input type="text" placeholder="Type Your Todo Here" name="message" id="" class="form-control form-control-lg">
						<button type="submit" class="btn btn-success input-group-text" name="addTodo">ADD</button>
					</div>
				</form>
				<div class="card-title">
					Saved Todos
				</div>
				<?php 
				$query = "SELECT * FROM todo";
				$results = mysqli_query($db, $query);
				foreach($results as $result) {
				?>
				<form action="todo.php" method="post">
				<input type="hidden" name="messageId" 
				value="<?php echo $result['id']; ?>">
				<div class="input-group">
					<button class="btn btn-danger" name="deleteTodo" type="submit">Delete</button>
					<input type="text" name="outmessages" 
					 class="form-control form-control-lg"
					value="<?php echo $result['message']; ?>">
					<button type="submit" name="updateTodo" class="btn btn-info">
						Update
					</button>
				</div>
				</form>
			<?php }?>
			</div>
		</div>
	</section>
	<!--Bootstrap 5-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>
