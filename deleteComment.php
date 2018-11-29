<?php
namespace TastyRecipe\View;

use \TastyRecipe\Model\Comment;
use \TastyRecipe\Util\Util;

require_once 'classes/TastyRecipe/Util/Util.php';
Util::initRequest();

if (!empty($_POST[KEY_TIMESTAMP])) {

    if ($_SERVER['QUERY_STRING'] == 0) {
        $commentFile = "commentData/commentsPancakes.txt";
    } else if ($_SERVER['QUERY_STRING'] == 1) {
        $commentFile = "commentData/commentsMeatballs.txt";
    }
    $comments = explode(";\n", file_get_contents($commentFile));

    for ($i = count($comments) - 1; $i >= 0; $i--) {
        $comment = unserialize($comments[$i]);
        if ($comment instanceof Comment and ($comment->getTime() == $_POST['timestamp'])) {
            $comment->setDeleted(true);
            $comments[$i] = serialize($comment);
            break;
        }
    }
    file_put_contents($commentFile, implode(";\n", $comments));
}

    include KEY_VIEWS . $_POST['redirect'];