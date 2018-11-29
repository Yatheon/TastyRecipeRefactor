<?php
session_start();
include_once __DIR__ . "/../fragments/accField.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/resources/CSS/reset.css">
    <link rel="stylesheet" type="text/css" href="/resources/CSS/main.css">
    <link rel="stylesheet" type="text/css" href="/resources/CSS/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Home</title>
</head>
<body>
<div class="title"><a href="/resources/views/frontPage.php">Tasty Recipes</a></div>
<div class="navbar">
    <a class="active" href="/resources/views/frontPage.php">Home</a>
    <a href="/resources/views/calendar.php">Calendar</a>
    <div class="dropdown">
        <p class="dropbtn">Weekly Recipes
            <i class="fa fa-caret-down"></i>
        </p>
        <div class="dropdown-content">
            <a href="/resources/views/pancakes.php">Pancakes</a>
            <a href="/resources/views/meatballs.php">Meatballs</a>
        </div>
    </div>
    <?php
    accField("frontPage.php");
    ?>
</div>


<div class="pagetitle">
    <h1>Welcome! </h1>
</div>
<div class="imagecontainer">
    <div class="left-pic">
        <img src="/resources/images/sallad-left.jpg" alt="Picture of sallad">
    </div>
    <div class="right-pic">
        <img src="/resources/images/steak-right.jpg" alt="Picture of steak">
    </div>
    <div class="textbox">
        <p>Press on the calendar below to find many tasty recipes for every day of the year!</p>
    </div>
    <a href="/resources/views/calendar.php">
        <img class="calendar" src="/resources/images/calendar.png" alt="Picture of calendar">
    </a>

</div>
<footer></footer>
</body>
</html>
