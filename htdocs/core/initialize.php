<?php
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);//define Directory-Separator \|/
defined('SITE_ROOT') ? null : define('SITE_ROOT', DS . 'xampp' . DS . 'htdocs');//define root folder from website
defined('CORE_PATH') ? null : define('CORE_PATH', SITE_ROOT . DS . 'core');//define core path

require_once(CORE_PATH.DS."config.php");//binde config ein- just once
require_once(CORE_PATH.DS."user.php");//bind user.php
require_once(CORE_PATH.DS."car.php");//bind car.php
