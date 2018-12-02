<?php

function accField($thisPage, $username)
{
    if (isset($_SESSION['loggedIn']) and $_SESSION['loggedIn'] == true) {
        echo '<div class="formgroup">
				<form action="logout.php" method="post">
				    <input type="hidden" name="redirect" value="' . $thisPage . '"/>
					<label>User - ' . htmlentities($username, ENT_QUOTES) .' </label>
					<input class="formButton" type="submit" value="logout">
				</form>
			</div>';
    }
    else {
        echo '<div class="formgroup">
				<form action="login.php" method="post">
				    <input type="hidden" name="redirect" value="' . $thisPage  . '"/>
					<label for="loginName">Username:</label>
					<input class="textField" type="text" name="username"/>
					<label for="loginPass">Password:</label>
					<input class="textField" type="password" name="password"/>
					<input class="formButton" type="submit" value="Login">
				</form>
			</div>';
        if (!isset($_SESSION['loggedIn']) and isset($_SESSION['failedLogin']) and $_SESSION['failedLogin'] == true) {
                echo("<p class='accFieldError'>Wrong username or password!</p>");
                $_SESSION['failedLogin'] = false;

        }
    }
}