<?php
namespace TastyRecipe\View;

use \TastyRecipe\Util\Util;
use \TastyRecipe\Controller\SessionManager;

if (!isset($_SESSION)) {
    session_start();
}
include 'resources/views/frontPage.php';