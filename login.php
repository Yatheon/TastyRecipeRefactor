<?php

namespace TastyRecipe\View;

use TastyRecipe\Controller\SessionManager;
use \TastyRecipe\Util\Util;

require_once 'classes/TastyRecipe/Util/Util.php';
Util::initRequest();
$contr = SessionManager::getController();
if (empty($_POST[KEY_USER]) or empty($_POST[KEY_PASSWORD])) {
    $_SESSION['failedLogin'] = true;
    include KEY_VIEWS . $_POST['redirect'];
    exit();
}

$username = $_POST[KEY_USER];
$password = $_POST[KEY_PASSWORD];
$contr = SessionManager::getController();
if (!$contr->tryLogin($username, $password)) {
    $_SESSION['failedLogin'] = true;
}else{
    $_SESSION['loggedIn'] = true;
}

$username = $contr->getUsername();
SessionManager::storeController($contr);
include KEY_VIEWS . $_POST['redirect'];

