<?php
session_start();
include "includes/db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT users.username,
               results.wpm,
               results.accuracy,
               results.mistakes,
               results.created_at
        FROM results
        INNER JOIN users
        ON results.user_id = users.id
        ORDER BY results.wpm DESC
        LIMIT 10";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Leaderboard</title>

<link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="container">

<h1>🏆 Typing Speed Leaderboard</h1>

<table>

<tr>

<th>Rank</th>
<th>Username</th>
<th>WPM</th>
<th>Accuracy</th>
<th>Mistakes</th>
<th>Date</th>

</tr>

<?php

$rank = 1;

while($row = mysqli_fetch_assoc($result))
{

?>

<tr>

<td class="rank"><?php echo $rank++; ?></td>

<td><?php echo htmlspecialchars($row['username']); ?></td>

<td><?php echo $row['wpm']; ?></td>

<td><?php echo $row['accuracy']; ?>%</td>

<td><?php echo $row['mistakes']; ?></td>

<td><?php echo date("d-m-Y",strtotime($row['created_at'])); ?></td>

</tr>

<?php
}
?>

</table>

<a href="dashboard.php" class="back">
← Back to Dashboard
</a>

</div>

</body>

</html>