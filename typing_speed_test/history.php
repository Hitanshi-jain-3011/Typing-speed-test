<?php
include "includes/auth.php";
include "includes/db.php";

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM results
        WHERE user_id='$user_id'
        ORDER BY created_at DESC";

$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>

<head>

<title>My History</title>

<link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="container">

<h1>My Typing History</h1>

<table>

<tr>

<th>#</th>
<th>WPM</th>
<th>Accuracy</th>
<th>Mistakes</th>
<th>Time</th>
<th>Date</th>

</tr>

<?php

$i=1;

while($row=mysqli_fetch_assoc($result))
{

?>

<tr>

<td><?php echo $i++; ?></td>

<td><?php echo $row['wpm']; ?></td>

<td><?php echo $row['accuracy']; ?>%</td>

<td><?php echo $row['mistakes']; ?></td>

<td><?php echo $row['test_time']; ?> sec</td>

<td><?php echo $row['created_at']; ?></td>

</tr>

<?php

}

?>

</table>

<br>

<a href="dashboard.php">
Back Dashboard
</a>

</div>

</body>

</html>