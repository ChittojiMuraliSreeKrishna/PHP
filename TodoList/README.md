# todo
>this is a basic todo list which can post a new todo or update/delete the previous todo
>this can also delete the todo if update when input is empty
!for styling i am using bootstrap5
## database name
>todomanager
### to display the todos in the database
```php
$query = "SELECT * FROM todo";
				$results = mysqli_query($db, $query);
				foreach($results as $result) {
        echo $result['message'];
        }
```
### to update the todo
```php
$query2 = "UPDATE todo SET `message`='$message' WHERE 
		`id`='$id'";
		$results2 = mysqli_query($db, $query2);
		header('location: todo.php');
```
### to delete the todo
```php
$query = "DELETE FROM todo WHERE `id`='$id'";
		$results = mysqli_query($db, $query);
		header('location: todo.php');
```
