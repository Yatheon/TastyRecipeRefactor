<?php
namespace TastyRecipe\View;

use TastyRecipe\Controller\SessionManager;
use TastyRecipe\Util\Util;
use \TastyRecipe\Model\Comment;


require_once 'classes/TastyRecipe/Util/Util.php';
Util::initRequest();
$contr = SessionManager::getController();
$username = $contr->getUsername();

if (empty($_POST[KEY_CMT]) or !ctype_print($_POST[KEY_CMT]) or $username == NULL) {
    include KEY_VIEWS . $_POST['redirect'];
    exit();
}

$comment = new Comment($username, $_POST[KEY_CMT]);
$fileDist = $_POST['recipeID'];
$contr->storeComment($fileDist,$comment);
SessionManager::storeController($contr);

include KEY_VIEWS . $_POST['redirect'];
