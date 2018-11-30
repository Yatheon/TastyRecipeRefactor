<?php

namespace TastyRecipe\View;

use \TastyRecipe\Util\Util;

require_once 'classes/TastyRecipe/Util/Util.php';
Util::initRequest();

include_once KEY_FRAGMENTS . "accField.php";
include KEY_VIEWS . $_POST['nextPage'];