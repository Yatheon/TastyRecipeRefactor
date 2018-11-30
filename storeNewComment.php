<?php

namespace TastyRecipe\View;

use \TastyRecipe\Model\Comment;
use TastyRecipe\Util\Util;

require_once 'classes/TastyRecipe/Util/Util.php';
Util::initRequest();

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

