<?php
namespace TastyRecipe\View;

use TastyRecipe\Util\Util;

require_once './classes/TastyRecipe/Util/Util.php';
Util::initRequest();

include KEY_VIEWS . 'frontPage.php';