<?php

namespace TastyRecipe\View;

use \TastyRecipe\Model\Comment;
use \TastyRecipe\Util\Util;

require_once 'classes/TastyRecipe/Util/Util.php';
Util::initRequest();

require_once 'classes/TastyRecipe/Model/Comment.php';

if (!empty($_POST['KEY_CMT'])) {

    if ($_SERVER['QUERY_STRING'] == 0) {
        $commentFile = "commentData/commentsPancakes.txt";
    } else if ($_SERVER['QUERY_STRING'] == 1) {
        $commentFile = "commentData/commentsMeatballs.txt";
    }
    session_start();
    $comment = new Comment($_SESSION['KEY_USER'], $_POST['KEY_CMT']);
    file_put_contents($commentFile, serialize($comment) . ";\n", FILE_APPEND);

    include KEY_VIEWS . $_POST['redirect'];
}	

