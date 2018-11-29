<?php
namespace TastyRecipe\View;

use \TastyRecipe\Util\Util;
use \TastyRecipe\Controller\SessionManager;

session_start();
$_SESSION = array();
session_destroy();
include "resources/views/" . $_POST['redirect'];
