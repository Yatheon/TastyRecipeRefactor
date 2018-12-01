<?php
namespace TastyRecipe\View;

use TastyRecipe\Controller\SessionManager;
use \TastyRecipe\Util\Util;


require_once 'classes/TastyRecipe/Util/Util.php';
Util::initRequest();

$contr = SessionManager::getController();
$username = $contr->getUsername();
SessionManager::storeController($contr);
$_SESSION = array();
session_destroy();

include KEY_VIEWS . $_POST['redirect'];
