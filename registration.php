<?php
session_start();
$link = mysqli_connect("localhost", "root", "", "notes");
if (isset($_POST["submit"])) {
    $fullname = htmlspecialchars($_POST["fullname"]);
    $username = htmlspecialchars($_POST["username"]);
    $email = htmlspecialchars($_POST["email"]);
    $purpose = htmlspecialchars($_POST["purpose"]);
    $password = htmlspecialchars($_POST["password"]);
    $_SESSION['todo-user'] = $username;
    $insert = "insert into todoUser(fullname,username,email,purpose,password) values('$fullname','$username','$email','$purpose','$password')";
    mysqli_query($link, $insert);
    header("Location: index2.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="registration.css">
</head>

<body>
    <div class="main">
        <div class="heading">
            <h1>Just</h1>
            <h1>Send It.</h1>
        </div>
        <div class="form">
            <form action="" method="post">
                <div>
                    <label for="fullname">Full Name</label>
                    <input type="text" name="fullname" id="fullname" size="50" required>
                </div>
                <div>
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" size="50" required>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" size="50" required>
                </div>
                <div>
                    <label for="purpose">Purpose of Using Our App</label>
                    <textarea name="purpose" id="purpose" cols="48" rows="8" fixed></textarea>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" size="50" required>
                </div>
                <button name="submit" id="register-btn" type="submit" value="submit">Register</button>
            </form>
        </div>
    </div>
</body>

</html>