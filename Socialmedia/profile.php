<?php include('server.php') ?>
<?php
if (!isset($_SESSION['username'])) {
    header('location: home.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: home.php');
}
$user = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username='$user'";
$results = mysqli_query($db, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-info text-dark">
        <a class="navbar-brand" href="home.php">Twitter</a>
        <?php if (!isset($_SESSION['username'])) { ?>
            <h3>welcome <strong class="text-warning">anonymous</strong></h3>
        <?php } else { ?>
            <h3>welcome <strong class="text-warning"><?php echo $_SESSION['username']; ?></strong></h3>
        <?php } ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="messages.php">Messages</a>
                <a class="nav-item nav-link active" href="profile.php">Profile</a>
                <?php if (!isset($_SESSION['username'])) { ?>
                    <a class="btn btn-outline-warning" href="login.php">Login</a>
                <?php } else { ?>
                    <a class="btn btn-outline-warning" href="home.php?logout='1'">Logout</a>
                <?php } ?>
            </div>
        </div>
    </nav>
    <section class="container-fluid">
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-outline-info my-4 edit-details">Edit Profile</button>
                <a href="changepassword.php" class="btn btn-outline-danger change-password">Change Password</a>
                <h4></h4>
            </div>
            <div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="alert">
                            <?php include('errors.php') ?>
                        </div>
                        <?php
                        if ($results) {
                            foreach ($results as $result) {
                        ?>
                                <div class="modal-body">
                                    <form action="profile.php" method="post">
                                        <div class="form-group">
                                            <label for="firstname">First Name :</label>
                                            <input type="text" name="firstname" placeholder="First Name" value="<?php echo $result['firstname']; ?>" class="form-control">
                                            <label for="lastname">Last Name :</label>
                                            <input type="text" name="lastname" placeholder="Last Name" value="<?php echo $result['lastname']; ?>" class="form-control">
                                            <label for="email">Email :</label>
                                            <input type="email" name="email" placeholder="someone@example.com" value="<?php echo $result['email']; ?>" class="form-control">
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="edit_profile">Save changes</button>
                                </div>
                                </form>
                    </div>
                </div>
            </div>
            <div class="col-9 m-auto d-block">
                <h1 class="justify-content-start"><?php echo $result['firstname']; ?> <?php echo $result['lastname']; ?></h1>
                <h3><?php echo $result['email']; ?></h3>
        <?php }
                        } ?>
            </div>
    </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('.edit-details').on('click', function() {
                $('#editProfile').modal('show');
            });
        });
    </script>
</body>

</html>