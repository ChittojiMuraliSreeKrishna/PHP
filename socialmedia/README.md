# to use this first we have to create a database called socialmedia using phpmyadmin
# this has three tables 
## users
>for login signup and profile 
## messages
>for personal messages
## globalmessages
>for global messages

```php
// this is the connection
$db = mysqli_connect('localhost', 'root', '', 'socialmedia');
// for errors and stuff i am using array_push() to display the errors
$errors = array();
array_push($errors, "comment goes here");
// for password encryption using a md5(); 
$password = md5($password);
```
## for styling and stuff i am using bootstrap 4 for minimal files
## and everything is a uploaded via post method and redirected using header
```php
header('location: home.php');
```
