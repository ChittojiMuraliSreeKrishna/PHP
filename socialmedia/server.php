<?php
session_start();

// initializing Variables
$username = "";
$email = "";

// for error messages
$errors = array();

// connecting to db
$db = mysqli_connect('localhost', 'root', '', 'socialmedia') or die('could not connect to database');

// Tables
$sql = "CREATE TABLE IF NOT EXISTS users(
    id INT(20) AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL)";
$table1 = mysqli_query($db, $sql);

$sql2 = "CREATE TABLE IF NOT EXISTS messages(
    id INT(20) AUTO_INCREMENT PRIMARY KEY,
    sender VARCHAR(255) NOT NULL,
    reciever VARCHAR(255) NOT NULL,
    message VARCHAR(255) NOT NULL
)";
$table2 = mysqli_query($db, $sql2);

$sql3 = "CREATE TABLE IF NOT EXISTS globalchat(
    id INT(20) AUTO_INCREMENT PRIMARY KEY,
    sender VARCHAR(255) NOT NULL,
    message VARCHAR(255) NOT NULL
)";
$table3 = mysqli_query($db, $sql3);

if (isset($_POST['user_register'])) {
    // setting the local variables
    $firstname = @mysqli_real_escape_string($db, $_POST['firstname']);
    $lastname = @mysqli_real_escape_string($db, $_POST['lastname']);
    $username = @mysqli_real_escape_string($db, $_POST['username']);
    $email = @mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = @mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = @mysqli_real_escape_string($db, $_POST['password_2']);

    // checking if they are not empty
    if (empty($firstname)) {
        array_push($errors, "firstname is required");
    }
    if (empty($lastname)) {
        array_push($errors, "lastname is required");
    }
    if (empty($username)) {
        array_push($errors, "username is required");
    }
    if (empty($email)) {
        array_push($errors, "email is required");
    }
    if (empty($password_1)) {
        array_push($errors, "password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "passwords are not matching");
    }

    // checking for existing username and email in database
    $user_check_query = "SELECT * FROM users WHERE username='$username' or email='$email' LIMIT 1";
    $results = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($results);

    if ($user) {
        if ($user['username'] === $username) {
            array_push($errors, "username already exits try a different one");
        }
        if ($user['email'] === $email) {
            array_push($errors, "email already exits try a different one");
        }
    }

    if (count($errors) === 0) {
        $password = md5($password_1);
        $query = "INSERT INTO users (firstname, lastname,username, email, password) VALUES('$firstname', '$lastname', '$username', '$email', '$password')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "you are logged in";
        header('location: home.php');
    }
}

// login user
if (isset($_POST['user_login'])) {
    $username = @mysqli_real_escape_string($db, $_POST['username']);
    $password = @mysqli_real_escape_string($db, $_POST['password_1']);

    if (empty($username)) {
        array_push($errors, "username is required");
    }
    if (empty($password)) {
        array_push($errors, "password is required");
    }

    if (count($errors) === 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results)) {
            $_SESSION['username'] = $username;
            $_SESSION['seccess'] = "logged in successfully";
            header('location: home.php');
        } else {
            array_push($errors, "wrong username or password try again");
        }
    }
}

//change password
if (isset($_POST['change_password'])) {
    $user = $_SESSION['username'];
    if ($user) {
        if (isset($_POST['change_password'])) {
            //check fields
            $oldpassword = @mysqli_real_escape_string($db, $_POST['oldpassword']);
            $newpassword_1 = @mysqli_real_escape_string($db, $_POST['newpassword_1']);
            $newpassword_2 = @mysqli_real_escape_string($db, $_POST['newpassword_2']);
            $query = "SELECT password FROM users WHERE username= '$user'";
            $results = mysqli_query($db, $query);
            $row = mysqli_fetch_assoc($results);
            $oldpasswordddb = $row['password'];
            $oldpass = md5($oldpassword);
            if ($oldpass === $oldpasswordddb) {
                if ($newpassword_1 === $newpassword_2) {
                    $newpassword = md5($newpassword_1);
                    $updatequery = "UPDATE users SET password='$newpassword' WHERE username='$user'";
                    $updateresults = mysqli_query($db, $updatequery);
                    session_destroy();
                    array_push($errors, "your password have been changed");
                    header('location: login.php');
                } else {
                    array_push($errors, "new passwords are not matching");
                }
            } else {
                array_push($errors, "type old password correct");
            }
        } else {
            header('location: changepassword.php');
        }
    } else {
        header('location: login.php');
    }
}

// Edit profile 
if (isset($_POST['edit_profile'])) {
    $user = $_SESSION['username'];
    if ($user) {
        $firstname = @mysqli_real_escape_string($db, $_POST['firstname']);
        $lastname = @mysqli_real_escape_string($db, $_POST['lastname']);
        $email = @mysqli_real_escape_string($db, $_POST['email']);


        if (empty($firstname)) {
            array_push($errors, "firstname should not be empty");
        }
        if (empty($lastname)) {
            array_push($errors, "lastname should not be empty");
        }
        if (empty($email)) {
            array_push($errors, "email id should not be empty");
        }

        if (count($errors) === 0) {
            $updatequery = "UPDATE users SET firstname='$firstname', lastname='$lastname', email='$email' WHERE username='$user' ";
            $query_push = mysqli_query($db, $updatequery);
            if ($query_push) {
                echo '<script>alert("data uploaded");</script>';
                header('location: profile.php');
            } else {
                echo '<script>alert("data not uploaded");</script>';
            }
        }
    }
}

// sending message
if (isset($_POST['send_message'])) {
    $sender = $_SESSION['username'];
    $reciever = @mysqli_real_escape_string($db, $_POST['recievername']);
    $message = @mysqli_real_escape_string($db, $_POST['message']);

    if (empty($reciever)) {
        array_push($errors, "Reciver name is important");
    }
    if (empty($message)) {
        array_push($errors, "You cant send empty messages");
    }
    $query = "SELECT * FROM users WHERE username='$reciever' LIMIT 1";
    $results = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($results);

    if ($user) {
        if ($user['username'] != $reciever) {
            array_push($errors, "username not found");
        }
    }

    if (count($errors) === 0) {
        $sendquery = "INSERT INTO messages (sender, reciever, message) VALUES ('$sender', '$reciever', '$message')";
        $sendmessage = mysqli_query($db, $sendquery);
        if ($sendmessage) {
            array_push($errors, "message sent");
            header('location: messages.php');
        } else {
            array_push($errors, "message not sent");
        }
    }
}

// global messages
if (isset($_POST['global_stories'])) {
    $sender = $_SESSION['username'];
    $stories = @mysqli_real_escape_string($db, $_POST['stories']);

    if (empty($sender)) {
        array_push($errors, "you must be logged in to post a message");
    }
    if (empty($stories)) {
        array_push($errors, "message cannot be empty");
    }

    if (count($errors) === 0) {
        $query = "INSERT INTO globalchat (sender, message) VALUES ('$sender','$stories')";
        $results = mysqli_query($db, $query);
        if ($results) {
            array_push($errors, "message sent");
            header('location: home.php');
        } else {
            array_push($errors, "message not sent");
        }
    }
}
