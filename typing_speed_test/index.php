<?php
session_start();

if(isset($_SESSION['user_id'])){
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Typing Speed Test</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,sans-serif;
}

body{

height:100vh;
display:flex;
justify-content:center;
align-items:center;
background:linear-gradient(135deg,#2563eb,#4f46e5,#7c3aed);

}

.container{

width:420px;
background:white;
padding:40px;
border-radius:20px;
text-align:center;
box-shadow:0 15px 35px rgba(0,0,0,.3);

}

h1{

color:#4f46e5;
margin-bottom:15px;
font-size:40px;

}

p{

color:#666;
margin-bottom:35px;
font-size:18px;

}

.btn{

display:block;
width:100%;
padding:15px;
background:#4f46e5;
color:white;
text-decoration:none;
font-size:20px;
border-radius:10px;
margin-bottom:25px;

}

.btn:hover{

background:#312e81;

}

.register{

font-size:17px;

}

.register a{

color:#2563eb;
text-decoration:none;
font-weight:bold;

}

.register a:hover{

text-decoration:underline;

}

</style>

</head>

<body>

<div class="container">

<h1>Typing Speed Test</h1>

<p>
Improve your typing speed and accuracy.
</p>

<a href="login.php" class="btn">
Login
</a>

<div class="register">

Don't have an account?

<a href="register.php">

Register

</a>

</div>

</div>

</body>

</html>