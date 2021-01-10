<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="card bg-info text-white">
        <div class="card-header">
            <h1>User Login Page</h1>
        </div>
        <div class="alert"><?php include('errors.php') ?></div>
        <div class="card-body">
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="username">username :</label>
                    <input type="text" placeholder="User Name" name="username" class="form-control" id="username">
                </div>
                <div class="form-group">
                    <label for="password_1">Password :</label>
                    <input type="password" placeholder="Password" name="password_1" class="form-control" id="password">
                </div>
                <button type="submit" name="user_login" class="btn btn-success">Login</button>
            </form>
        </div>
        <div class="card-footer">
            <p>Not a User? <a href="signup.php" class="btn btn-outline-warning">Click-Here</a></p>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>