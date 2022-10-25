<?php
defined('DS')               ? null : define('DS', DIRECTORY_SEPARATOR); //define Directory-Separator \|/
defined('SITE_ROOT')        ? null : define('SITE_ROOT',    DS . 'var'.DS.'www'.DS.'html'); // für Docker! :-D
//defined('SITE_ROOT')        ? null : define('SITE_ROOT',    DS . 'xampp' .  DS . 'htdocs'); //define root folder from website
defined('CORE_PATH')        ? null : define('CORE_PATH',    SITE_ROOT .     DS . 'core'); //define core path
defined('CLASSES_PATH')     ? null : define('CLASSES_PATH', SITE_ROOT .     DS . 'classes'); //define classes path
defined('SOURCE_PATH')      ? null : define('SOURCE_PATH',  SITE_ROOT .     DS . 'src'); //define source path for mvc-model
defined('CONTROLLER_PATH')  ? null : define('CONTROLLER_PATH',  SOURCE_PATH . DS . 'Controller'); //define controller path
defined('FRAMEWORK_PATH')   ? null : define('FRAMEWORK_PATH',   SOURCE_PATH . DS . 'Framework'); //define framework path
defined('LAYOUT_PATH')      ? null : define('LAYOUT_PATH',      SOURCE_PATH . DS . 'Layout'); //define layout path
defined('VIEW_PATH')        ? null : define('VIEW_PATH',        SOURCE_PATH . DS . 'View'); //define view path

require_once(CORE_PATH . DS . "config.php"); //binde config ein- just once
require_once(CLASSES_PATH . DS . "user.php"); //bind user.php
require_once(CLASSES_PATH . DS . "car.php");//bind car.php
