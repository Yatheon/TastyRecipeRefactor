<?php
namespace TastyRecipe\View;

use \TastyRecipe\Util\Util;

require_once 'classes/TastyRecipe/Util/Util.php';
Util::initRequest();

session_start();
$_SESSION = array();
session_destroy();
include "resources/views/" . $_POST['redirect'];
