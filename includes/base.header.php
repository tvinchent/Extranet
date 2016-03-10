<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title> ADSPRING - Suivi de client&egrave;le </title>

<?php
// verification de l'utilisateur
if (!$_COOKIE['nom']){
header('Location: index.php');
}
?>

<link rel="stylesheet" type="text/css" href="css/page.css" />
<script language="javascript" src="js/admin.js" type="text/javascript"></script>