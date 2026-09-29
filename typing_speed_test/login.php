<?php
session_start();
include "includes/db.php";

$message = "";

if (isset($_POST['login'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {

            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];

            header("Location: dashboard.php");
            exit();

        } else {

            $message = "Incorrect Password!";

        }

    } else {

        $message = "Username not found!";

    }

}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">


</head>

<body>

<div class="container">

<h2>User Login</h2>

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
type="password"
name="password"
placeholder="Password"
required>

<button
type="submit"
name="login">
Login
</button>

</form>

<p>

Don't have an account?

<a href="register.php">

Register

</a>

</p>

</div>

</body>

</html>