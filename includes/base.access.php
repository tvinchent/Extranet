<?php
// creation des variables d'environnement
include("base.func.php");
include("base.func_projet.php");

define("USER","exmachinefesdhem");
define("HOST","exmachinefesdhem.mysql.db");
// pwd mac:     define("PWD","root");
define("PWD","Esdhem2015"); // pwd pc
define("DB_NAME","exmachinefesdhem");
$dir = dirname($_SERVER['PHP_SELF']);
if($dir <> "/"){
	$dir .= "/";
}
define("WEB_PATH",$dir);
define("WEB_MAIL","tvinchent@gmail.com");
?>