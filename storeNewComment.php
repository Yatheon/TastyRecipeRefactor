<?php

namespace TastyRecipe\View;

use \TastyRecipe\Util\Util;
use \TastyRecipe\Model\Comment;
use \TastyRecipe\Controller\SessionManager;


require_once 'classes/TastyRecipe/Model/Comment.php';

if (!empty($_POST['comment'])) {

    if ($_SERVER['QUERY_STRING'] == 0) {
        $commentFile = "commentData/commentsPancakes.txt";
    } else if ($_SERVER['QUERY_STRING'] == 1) {
        $commentFile = "commentData/commentsMeatballs.txt";
    }
    session_start();
    $comment = new Comment($_SESSION['username'], $_POST['comment']);
    file_put_contents($commentFile, serialize($comment) . ";\n", FILE_APPEND);

    include "resources/views/" . $_POST['redirect'];
}	

