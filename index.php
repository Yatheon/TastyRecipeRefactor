<?php
namespace TastyRecipe\View;

use TastyRecipe\Util\Util;
use TastyRecipe\Controller\SessionManager;

require_once './classes/TastyRecipe/Util/Util.php';
Util::initRequest();

$contr = SessionManager::getController();
$username = $contr->getUsername();
SessionManager::storeController($contr);


include KEY_VIEWS . 'frontPage.php';