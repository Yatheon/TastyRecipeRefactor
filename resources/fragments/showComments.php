<?php

function comments($recipeID, $thisPage)
{

    if ($recipeID == 0) {
        $commentFile = __DIR__. "/../../commentData/commentsPancakes.txt";
    } else if ($recipeID == 1) {
        $commentFile = __DIR__. "/../../commentData/commentsMeatballs.txt";
    }

    $comments = explode(";\n", file_get_contents($commentFile));
    $x = 0;
    echo "Fish";
    for ($i = 0; $i < count($comments); $i++) {
        echo "Fish";
        $comment = unserialize($comments[$i]);
        if ($comment instanceof Comment and !$comment->isDeleted()) {

            if ($x % 2 == 0) {
                echo('<div class="message-container">');
            } else {
                echo('<div class="message-container darker">');
            }
            $x++;
            echo('<p class="name">' . $comment->getUsername() . '</p>');
            if ($comment->getUsername() === $_SESSION[KEY_USER]) {
                echo("<form action='deleteComment.php?" . $recipeID . "' method='post'>");
                echo('<input type="hidden" name="redirect" value="' . $thisPage . '"/>');
                echo("<input type='hidden' name='timestamp' value='" .
                    $comment->getTime() . "'/>");
                echo("<input class='delbutton' type='submit' value='X'/>");
                echo("</form>");
            }

            echo('<p class="comment">' . $comment->getComment() . '</p>');
            echo('<p class="time">' . $comment->getCreated() . '</p>');
            echo('</div>');
        }
    }
}

