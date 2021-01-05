<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

    <div class="card bg-info text-white">
        <div class="card-header">
            <h1>User Register Page</h1>
        </div>
        <div class="alert"><?php include('errors.php') ?></div>
        <div class="card-body">
            <form action="signup.php" method="POST">
                <div class="form-group">
                    <label for="firstname">First Name :</label>
                    <input type="text" name="firstname" placeholder="First Name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname" placeholder="Last Name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="username">Username :</label>
                    <input class="form-control" placeholder="User Name" type="text" name="username">
                </div>
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input class="form-control" placeholder="someone@example.com" type="email" name="email">
                </div>
                <div class="form-group">
                    <label for="password_1">Password :</label>
                    <td><input class="form-control" placeholder="Password" type="password" name="password_1"></td>
                </div>
                <div class="form-group">
                    <label for="password_2">Confirm Password :</label>
                    <input class="form-control" placeholder="Confirm Password" type="password" name="password_2">
                </div>
                <button type="submit" name="user_register" class="btn btn-success">Register</button>
            </form>
            <div class="card-footer">
                <p>Already a user? <a href="login.php" class="btn btn-outline-warning">Click-Here</a></p>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>