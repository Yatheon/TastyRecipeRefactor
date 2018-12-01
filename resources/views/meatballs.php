<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/resources/CSS/reset.css">
    <link rel="stylesheet" type="text/css" href="/resources/CSS/main.css">
    <link rel="stylesheet" type="text/css" href="/resources/CSS/recipe.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Meatballs</title>
</head>
<body>
<div class="title">
    <form action="redirect.php" method='post'>
        <input type="hidden" name="nextPage" value="frontPage.php">
        <input type="submit" value="Tasty Recipes">
    </form>
</div>
<div class="navbar">
    <form class="navbutton" action="redirect.php" method='post'>
        <input type="hidden" name="nextPage" value="frontPage.php">
        <input type="submit" value="Home">
    </form>
    <form class="navbutton" action="redirect.php" method='post'>
        <input type="hidden" name="nextPage" value="calendar.php">
        <input type="submit" value="Calendar">
    </form>
    <div class="dropdown">
        <p class="dropbtn-active">Weekly Recipes
            <i class="fa fa-caret-down"></i>
        </p>
        <div class="dropdown-content">
            <form class="navbutton" action="redirect.php" method='post'>
                <input type="hidden" name="nextPage" value="pancakes.php">
                <input type="submit" value="Pancakes">
            </form>
            <form class="navbutton" action="redirect.php" method='post'>
                <input type="hidden" name="nextPage" value="meatballs.php">
                <input class="active" type="submit" value="Meatballs">
            </form>

        </div>
    </div>
    <?php
    include_once KEY_FRAGMENTS . "accField.php";
    accField("meatballs.php", $username);
    ?>
</div>


<div class="pagetitle">
    <h1>Meatballs</h1>
</div>
<div class="foodPresent">
    <img src="/resources/images/meatballs-recipe.jpg" alt="Meatballs">
</div>
<div class="header-recipe">
    <h2>
        ingredients
    </h2>
</div>
<div class="list-wrapper">
    <ul class="ingredients-list">
        <li class="ingredients-list-item">
            <div class="item-nr">
                1
            </div>
            <div class="text">
                lb lean (at least 80%) ground beef
            </div>
        </li>
        <li class="ingredients-list-item">
            <div class="item-nr">
                1/2
            </div>
            <div class="text">
                cup Progresso Italian-style bread crumbs
            </div>
        </li>
        <li class="ingredients-list-item">
            <div class="item-nr">
                1/4
            </div>
            <div class="text">
                cup milk
            </div>
        </li>
        <li class="ingredients-list-item">
            <div class="item-nr">
                1/2
            </div>
            <div class="text">
                teaspoon salt
            </div>
        </li>
        <li class="ingredients-list-item">
            <div class="item-nr">
                1/2
            </div>
            <div class="text">
                teaspoon Worcestershire sauce
            </div>
        </li>
        <li class="ingredients-list-item">
            <div class="item-nr">
                1/4
            </div>
            <div class="text">
                teaspoon pepper
            </div>
        </li>
        <li class="ingredients-list-item">
            <div class="item-nr">
                1
            </div>
            <div class="text">
                small onion, finely chopped (1/4 cup)
            </div>
        </li>
        <li class="ingredients-list-item">
            <div class="item-nr">
                1
            </div>
            <div class="text">
                egg
            </div>
        </li>
    </ul>
</div>
<div class="header-recipe">
    <h2>
        How To
    </h2>
</div>
<div class="list-wrapper">
    <ul class="ingredients-list">
        <li class="ingredients-list-item">
            <div class="item-nr">
                1.
            </div>
            <div class="text">
                Heat oven to 400F. Line 13x9-inch pan with foil; spray with cooking spray.
            </div>
        </li>
        <li class="ingredients-list-item">
            <div class="item-nr">
                2.
            </div>
            <div class="text">
                In large bowl, mix all ingredients. Shape mixture into 24 (1 1/2-inch) meatballs. Place 1 inch apart in
                pan.
            </div>
        </li>
        <li class="ingredients-list-item">
            <div class="item-nr">
                3.
            </div>
            <div class="text">
                Bake uncovered 18 to 22 minutes or until temperature reaches 160F and no longer pink in center.
            </div>
        </li>
    </ul>
</div>
<div class="header-recipe">
    <h2>Comments</h2>
</div>

<?php
$comments = $contr->getComments('Meatballs');
$x = 0;
foreach($comments as $comment)
{
    if ($x % 2 == 0) {
        echo('<div class="message-container">');
    } else {
        echo('<div class="message-container darker">');
    }
    $x++;
    echo('<p class="name">' . $comment->getUsername() . '</p>');
    if ($comment->getUsername() === $username) {
        echo("<form action='deleteComment.php' method='post'>");
        echo('<input type="hidden" name="recipeID" value="1"/>');
        echo('<input type="hidden" name="redirect" value= "meatballs.php"/>');
        echo('<input type="hidden" name="timestamp" value="' . $comment->getTime() . '"/>');
        echo('<input class="delbutton" type="submit" value="X"/>');
        echo('</form>');
    }

    echo('<p class="comment">' . $comment->getComment() . '</p>');
    echo('<p class="time">' . $comment->getCreated() . '</p>');
    echo('</div>');

}


if (isset($_SESSION['loggedIn']) and $_SESSION['loggedIn'] == true) {
    echo(
        '<form action="storeNewComment.php" method="post">
            <input type="hidden" name="redirect" value= "meatballs.php"/>
            <input type="hidden" name="recipeID" value= "1" >
			<div class="textbox-wrapper">
				<textarea class="textField commentTextBox" name="comment" placeholder="Type message.."></textarea>
			</div>
			<div class="sendbutton-wrapper">
				 <input class="sendbutton" type="submit" value="Send"/>
			</div>
		</form>'
    );
} else {
    echo('<p class="textbox-wrapper">Login to write comments!</P>');
}

/*include_once KEY_FRAGMENTS . "showComments.php";
include_once KEY_FRAGMENTS . "newCommentField.php";
comments(1, "meatballs.php");
newCommentField(1, "meatballs.php");*/
?>
<footer></footer>
</body>
</html>
