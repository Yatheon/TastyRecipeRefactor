<?php

namespace TastyRecipe\View;

use TastyRecipe\Controller\SessionManager;
use \TastyRecipe\Model\Comment;
use TastyRecipe\Util\Util;

require_once 'classes/TastyRecipe/Util/Util.php';
Util::initRequest();

$contr = SessionManager::getController();
$username = $contr->getUsername();

if (empty($_POST[KEY_CMT])) {
    include KEY_VIEWS . $_POST['redirect'];
    exit();
}

$comment = new Comment($username, $_POST[KEY_CMT]);
$fileDist = $_POST['recipeID'];
$contr->storeComment($fileDist,$comment);
SessionManager::storeController($contr);

include KEY_VIEWS . $_POST['redirect'];
