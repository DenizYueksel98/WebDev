<?php
defined('DS')               ? null : define('DS', DIRECTORY_SEPARATOR); //define Directory-Separator \|/
defined('SITE_ROOT')        ? null : define('SITE_ROOT',    DS . 'var'.DS.'www'.DS.'html'); // für Docker! :-D
//defined('SITE_ROOT')        ? null : define('SITE_ROOT',    DS . 'xampp' .  DS . 'htdocs'); //define root folder from website
defined('CORE_PATH')        ? null : define('CORE_PATH',    SITE_ROOT .     DS . 'core'); //define core path
defined('SOURCE_PATH')      ? null : define('SOURCE_PATH',  SITE_ROOT .     DS . 'src'); //define source path for mvc-model
defined('MODEL_PATH')       ? null : define('MODEL_PATH',       SOURCE_PATH . DS . 'Model'); //define classes path
defined('CONTROLLER_PATH')  ? null : define('CONTROLLER_PATH',  SOURCE_PATH . DS . 'Controller'); //define controller path
defined('FRAMEWORK_PATH')   ? null : define('FRAMEWORK_PATH',   SOURCE_PATH . DS . 'Framework'); //define framework path
defined('LAYOUT_PATH')      ? null : define('LAYOUT_PATH',      SOURCE_PATH . DS . 'Layout'); //define layout path
defined('VIEW_PATH')        ? null : define('VIEW_PATH',        SOURCE_PATH . DS . 'View'); //define view path
defined('CAR_PATH')         ? null : define('CAR_PATH',             MODEL_PATH . DS . 'Car'); //define Car path
defined('USER_PATH')        ? null : define('USER_PATH',            MODEL_PATH . DS . 'User'); //define User path

require_once(CORE_PATH  . DS . "config.php"); //binde config ein- just once
require_once(USER_PATH  . DS . "user.php"); //bind user.php
require_once(CAR_PATH   . DS . "car.php");//bind car.php
