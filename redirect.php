<?php

namespace TastyRecipe\View;

use TastyRecipe\Controller\SessionManager;
use \TastyRecipe\Util\Util;

require_once 'classes/TastyRecipe/Util/Util.php';
Util::initRequest();

$contr = SessionManager::getController();
$username = $contr->getUsername();


include_once KEY_FRAGMENTS . "accField.php";
include KEY_VIEWS . $_POST['nextPage'];