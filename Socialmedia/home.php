<?php include('server.php') ?>
<?php
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-info text-dark">
        <div class="container">
            <a class="navbar-brand margin-right: 1rem " href="home.php">Twitter</a>
            <?php if (!isset($_SESSION['username'])) { ?>
                <h3>welcome <strong class="text-warning">anonymous</strong></h3>
            <?php } else { ?>
                <h3>welcome <strong class="text-warning"><?php echo $_SESSION['username']; ?></strong></h3>
            <?php } ?>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav justify-content-end">
                    <a class="nav-item nav-link" href="messages.php">Messages</a>
                    <a class="nav-item nav-link" href="profile.php">Profile</a>
                    <?php if (!isset($_SESSION['username'])) { ?>
                        <a class="btn btn-outline-warning" href="login.php">Login</a>
                    <?php } else { ?>
                        <a class="btn btn-outline-warning" href="home.php?logout='1'">Logout</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>
    <div class="alert"><?php include('errors.php') ?></div>
    <section class="container">
        <form action="home.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <textarea name="stories" maxlength="255" rows="5" class="form-control" placeholder="type your text here"></textarea>
            </div>
            <input type="file" name="image">
            <button type="submit" name="global_stories" class="btn btn-outline-success">Post</button>
        </form>
        <?php
        $query = "SELECT * FROM globalchat";
        $results = mysqli_query($db, $query);
        if ($results) {
            foreach ($results as $result) {
        ?>
                <div class="card">
                    <div class="card-header">
                        <?php echo $result['sender']; ?>
                    </div>
                    <div class="card-body">
                        <img src="<?php echo $result['image']; ?>" alt="image">
                    </div>
                    <div class="card-footer">
                        <?php echo $result['message']; ?>
                    </div>
                </div>
        <?php }
        } ?>
    </section>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
