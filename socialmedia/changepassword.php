<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <section class="card">
        <div class="card-header">
            <h2>Update Password</h2>
        </div>
        <div class="alert">
            <?php include('errors.php') ?>
        </div>
        <div class="card-body">
            <form action="changepassword.php" method="POST">
                <div class="form-group">
                    <b>Old Password :</b>
                    <input type="password" name="oldpassword" class="form-control">
                </div>
                <div class="form-group">
                    <b>New Password :</b>
                    <input type="password" name="newpassword_1" class="form-control">
                </div>
                <div class="form-group">
                    <b>Confirm New Password :</b>
                    <input type="password" name="newpassword_2" class="form-control">
                </div>
                <button type="submit" name="change_password" class="btn btn-warning">Update</button>
        </div>
        </form>
        <div class="card-footer">
            <p>Wanna Go Back? <a href="home.php" class="btn btn-outline-info">Click-Here</a></p>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>