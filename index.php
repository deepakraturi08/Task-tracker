<?php
session_start();
if (isset($_SESSION['todo-user'])) {
    header("Location: index2.php");
}
if (isset($_POST["submit"])) {
    $link = mysqli_connect("localhost", "root", "", "notes");
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);
    $sql = "select * from todouser where username='$username' and password='$password'";
    if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $user = $row['username'];
            $pass = $row['password'];
            $_SESSION['todo-user'] = $user;
            header('Location: index2.php');
        } else {
            echo "<script>alert('Invalid Username or password')</script>";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Back</title>
    <link rel="stylesheet" href="index.css">
</head>

<body class="login-app">
    <div class="login-main">
        <h1>Welcome Back</h1>
        <form action="" method="POST">
            <div>
                <input type="text" name="username" id="username" required placeholder="Username" autocomplete="off">
            </div>
            <div>
                <input type="password" name="password" id="password" required placeholder="Password">
            </div>
            <div class="btns">
                <input class="button-27" name="submit" id="login-btn" type="submit">
                <a id="register-link" href="registration.php">Register</a>
            </div>
        </form>
    </div>
</body>

</html>