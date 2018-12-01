<?php

namespace TastyRecipe\View;

use TastyRecipe\Controller\SessionManager;
use \TastyRecipe\Model\Comment;
use TastyRecipe\Util\Util;

require_once 'classes/TastyRecipe/Util/Util.php';
Util::initRequest();

$contr = SessionManager::getController();
$username = $contr->getUsername();
SessionManager::storeController($contr);

if (!empty($_POST[KEY_CMT])) {

    if ($_POST['recipeID'] == 0) {
        $commentFile = "commentData/commentsPancakes.txt";
    } else if ($_POST['recipeID'] == 1) {
        $commentFile = "commentData/commentsMeatballs.txt";
    }

    $comment = new Comment($_SESSION[KEY_USER], $_POST[KEY_CMT]);
    file_put_contents($commentFile, serialize($comment) . ";\n", FILE_APPEND);

    include KEY_VIEWS . $_POST['redirect'];
}	

