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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages page</title>
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
                <a class="nav-item nav-link active" href="messages.php">Messages</a>
                <a class="nav-item nav-link" href="profile.php">Profile</a>
                <?php if (!isset($_SESSION['username'])) { ?>
                    <a class="btn btn-outline-warning" href="login.php">Login</a>
                <?php } else { ?>
                    <a class="btn btn-outline-warning" href="home.php?logout='1'">Logout</a>
                <?php } ?>
            </div>
        </div>
    </nav>
    <div class="alert"><?php include('errors.php') ?></div>
    <div class="card">
        <div class="card-header">
            <h1>message your friend</h1>
        </div>
        <div class="card-body">
            <form action="messages.php" method="post">
                <div class="form-group">
                    <label for="recievername">Username :</label>
                    <input type="text" name="recievername" placeholder="Username" class="form-control">
                    <label for="message">Message :</label>
                    <textarea name="message" placeholder="Your Message" maxlength="255" class="form-control" rows="5"></textarea>
                </div>
        </div>
        <div class="card-footer">
            <button name="send_message" class="btn btn-success" type="submit">Send</button>
        </div>
        </form>
    </div>
    <table class="table table-striped">
        <?php
        $user = $_SESSION['username'];
        $recievequery = "SELECT sender, message FROM messages WHERE reciever='$user'";
        $results = mysqli_query($db, $recievequery);
        ?>
        <thead class="table-success">
            <tr>
                <th>Sender Name :</th>
                <th>Message :</th>
            </tr>
        </thead>
        <?php
        if ($results) {
            foreach ($results as $result) {
        ?>
                <tbody>
                    <tr>
                        <td><?php echo $result['sender'] ?></td>
                        <td><?php echo $result['message'] ?></td>
                    </tr>
                </tbody>
        <?php }
        } ?>
    </table>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>