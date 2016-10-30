<?php
header("content-type:text/html;charset:utf8");
session_start();
define("ROOT", dirname(__FILE__));
//set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."/core".PATH_SEPARATOR.get_include_path());
require_once 'lib/mysql.func.php';
require_once 'configs/configs.php';
require_once 'lib/string.func.php';
connect();