<?php
function newCommentField($recipeID,$thisPage)
{
    if (isset($_SESSION['loggedin']) and $_SESSION['loggedin'] == true) {
        echo(
            '<form action="storeNewComment.php" method="post">
            <input type="hidden" name="redirect" value="' . $thisPage . '"/>
            <input type="hidden" name="recipeID" value="' . $recipeID . '">
			<div class="textbox-wrapper">
				<textarea class="textField commentTextBox" name="comment" placeholder="Type message.."></textarea>
			</div>
			<div class="sendbutton-wrapper">
				 <input class="sendbutton" type="submit" value="Send"/>
			</div>
		</form>');
    } else {
        echo('<p class="textbox-wrapper">Login to write comments!</P>');
    }
}
