<?php
session_start();
include "includes/db.php";

$message = "";

if (isset($_POST['register'])) {

    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    if ($password != $confirm_password) {
        $message = "Passwords do not match!";
    } else {

        $check = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");

        if (mysqli_num_rows($check) > 0) {

            $message = "Username already exists!";

        } else {

            $hash = password_hash($password, PASSWORD_DEFAULT);

            $insert = mysqli_query($conn, "INSERT INTO users(username,email,password)
            VALUES('$username','$email','$hash')");

            if ($insert) {
                header("Location: login.php");
                exit();
            } else {
                $message = "Registration Failed!";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">


</head>

<body>

<div class="container">

<h2>Create Account</h2>

<div class="msg">
<?php echo $message; ?>
</div>

<form method="POST">

<input
type="text"
name="username"
placeholder="Username"
required>

<input
type="email"
name="email"
placeholder="Email"
required>

<input
type="password"
name="password"
placeholder="Password"
required>

<input
type="password"
name="confirm_password"
placeholder="Confirm Password"
required>

<button
type="submit"
name="register">
Register
</button>

</form>

<p>

Already have an account?

<a href="login.php">

Login

</a>

</p>

</div>

</body>

</html>