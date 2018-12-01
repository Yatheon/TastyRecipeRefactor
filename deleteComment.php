<?php
namespace TastyRecipe\View;

use TastyRecipe\Controller\SessionManager;
use \TastyRecipe\Model\Comment;
use \TastyRecipe\Util\Util;

require_once 'classes/TastyRecipe/Util/Util.php';
Util::initRequest();


$contr = SessionManager::getController();
$username = $contr->getUsername();
SessionManager::storeController($contr);


if (!empty($_POST[KEY_TIMESTAMP])) {

    if ($_POST['recipeID'] == 0) {
        $commentFile = "commentData/commentsPancakes.txt";
    } else if ($_POST['recipeID'] == 1) {
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