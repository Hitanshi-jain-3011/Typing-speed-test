<?php
include "includes/auth.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Typing Speed Test</title>

<link rel="stylesheet" href="css/style.css">

<style>

body{
    margin:0;
    padding:0;
    font-family:Arial,Helvetica,sans-serif;
    background:linear-gradient(135deg,#2563eb,#4f46e5,#7c3aed);
}

.container{
    width:90%;
    max-width:1200px;
    margin:30px auto;
}

h1{
    text-align:center;
    color:white;
}

.timer{
    text-align:center;
    color:#ffc107;
    font-size:34px;
    font-weight:bold;
    margin:20px 0;
}

.paragraph{
    background:white;
    padding:25px;
    border-radius:12px;
    font-size:22px;
    line-height:40px;
    color:#333;
}

textarea{
    width:100%;
    height:180px;
    margin-top:20px;
    border:none;
    outline:none;
    resize:none;
    border-radius:12px;
    padding:20px;
    font-size:20px;
}

.stats{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:20px;
    margin-top:30px;
}

.card{
    background:white;
    border-radius:12px;
    text-align:center;
    padding:25px;
}

.card h2{
    color:#4f46e5;
    margin-bottom:10px;
}

.card span{
    font-size:34px;
    font-weight:bold;
}

.buttons{
    text-align:center;
    margin-top:30px;
}

button,a{
    padding:14px 28px;
    border:none;
    border-radius:8px;
    font-size:18px;
    cursor:pointer;
    text-decoration:none;
    margin:10px;
}

button{
    background:#4f46e5;
    color:white;
}

a{
    background:#16a34a;
    color:white;
}

button:hover{
    background:#312e81;
}

a:hover{
    background:#15803d;
}

.progress{
    width:100%;
    height:18px;
    background:#ddd;
    border-radius:20px;
    margin-top:25px;
    overflow:hidden;
}

.progress-bar{
    width:0%;
    height:100%;
    background:#22c55e;
}

@media(max-width:768px){

.stats{
grid-template-columns:repeat(2,1fr);
}

textarea{
height:150px;
}

}

</style>

</head>

<body>

<div class="container">

<h1>Typing Speed Test</h1>

<div class="timer">

Time Left :
<span id="time">30</span>
sec

</div>

<div class="paragraph" id="paragraph">

Learning web development requires consistent practice with HTML, CSS, JavaScript, PHP and MySQL. Regular typing practice improves your speed, accuracy and confidence while building real world projects.

</div>

<textarea
id="input"
placeholder="Start typing here..."
autocomplete="off"
spellcheck="false">
</textarea>

<div class="progress">

<div class="progress-bar" id="progressBar"></div>

</div>

<div class="stats">

<div class="card">

<h2>WPM</h2>

<span id="wpm">0</span>

</div>

<div class="card">

<h2>Accuracy</h2>

<span id="accuracy">100%</span>

</div>

<div class="card">

<h2>Mistakes</h2>

<span id="mistakes">0</span>

</div>

<div class="card">

<h2>Characters</h2>

<span id="characters">0</span>

</div>

</div>

<div class="buttons">

<button id="restart">

Restart Test

</button>

<a href="dashboard.php">

Back Dashboard

</a>

</div>

</div>

<script src="js/script.js"></script>

</body>

</html>