<?php
session_start();

if(!isset($_SESSION['user_id'])){
header("Location:login.php");
exit();
}

include "includes/db.php";

$user=$_SESSION['username'];
$id=$_SESSION['user_id'];

$sql=mysqli_query($conn,"SELECT
COUNT(*) total,
MAX(wpm) best,
AVG(accuracy) avgacc
FROM results
WHERE user_id='$id'");

$data=mysqli_fetch_assoc($sql);
?>

<!DOCTYPE html>
<html>

<head>

<title>Dashboard</title>

<style>

*{

margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial;

}

body{

background:linear-gradient(135deg,#2563eb,#4f46e5,#7c3aed);

}

.container{

width:90%;
margin:40px auto;

}

.header{

display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:30px;

}

.header h1{

color:white;

}

.logout{

background:red;
padding:12px 25px;
color:white;
text-decoration:none;
border-radius:8px;

}

.cards{

display:grid;
grid-template-columns:repeat(3,1fr);
gap:25px;

}

.card{

background:white;
padding:30px;
border-radius:15px;
text-align:center;

}

.card h2{

color:#4f46e5;
font-size:35px;

}

.card p{

margin-top:10px;

}

.buttons{

margin-top:40px;
display:grid;
grid-template-columns:repeat(2,1fr);
gap:20px;

}

.buttons a{

background:white;
padding:18px;
text-align:center;
text-decoration:none;
border-radius:12px;
color:#4f46e5;
font-size:20px;
font-weight:bold;

}

.buttons a:hover{

background:#eef2ff;

}

</style>

</head>

<body>

<div class="container">

<div class="header">

<h1>

Welcome,
<?php echo htmlspecialchars($user); ?>

</h1>

<a href="logout.php" class="logout">

Logout

</a>

</div>

<div class="cards">

<div class="card">

<h2>

<?php echo $data['best'] ? $data['best'] : 0; ?>

</h2>

<p>Best WPM</p>

</div>

<div class="card">

<h2>

<?php echo round($data['avgacc'],2); ?>%

</h2>

<p>Average Accuracy</p>

</div>

<div class="card">

<h2>

<?php echo $data['total']; ?>

</h2>

<p>Total Tests</p>

</div>

</div>

<div class="buttons">

<a href="test.php">

⌨️ Start Typing Test

</a>

<a href="history.php">

📜 My History

</a>

<a href="leaderboard.php">

🏆 Leaderboard

</a>

<a href="logout.php">

🚪 Logout

</a>

</div>

</div>

</body>

</html>