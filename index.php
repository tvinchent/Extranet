<?php

include("includes/base.access.php");
$db = openDB();

// si arrivé sur la page en demande de déco, envoie de cookie de suppression
if(isset($_GET['action']) && $_GET['action']=="deco"){
	setcookie("nom",'',0);  // on met a zero le cookie nom
	setcookie("statut",'',0);  // on met a zero le cookie statut
}// si déja connecté, redirection page principale du système
elseif (isset($_COOKIE['nom'])){
	if($_COOKIE['statut']=='admin') header('Location: get.affaire.php');
	elseif($_COOKIE['statut']=='dir') header('Location: up.affaire.php');
	elseif($_COOKIE['statut']=='production') header('Location: up.production.php');
	else header('Location: up.action.php');
}

$erreur='';
// si form rempli, verif et si ok: connexion + redirection page principale du système
if(isset($_POST['action']) && $_POST['action'] == "ok"){
	$rs = mysql_query("select * from utilisateur where nom='".$_POST['nom']."'");
	$exist =  mysql_num_rows($rs);
	if ($exist==0){
		$erreur='Utilisateur inconnu';
	}
	else{
		$d =  mysql_fetch_object($rs);
		$md5pwd = md5($_POST['pwd']);
		if($md5pwd==$d->pwd){
			$expire = 365*24*3600; // on définit la durée du cookie, 1 an
			setcookie("nom",$d->nom,time()+$expire);  // on envoi le cookie nom
			setcookie("statut",$d->statut,time()+$expire);  // on l'envoi le cookie statut
			if($d->statut=='admin') header('Location: get.affaire.php');
			elseif($d->statut=='dir') header('Location: up.affaire.php');
			elseif($_COOKIE['statut']=='production') header('Location: up.production.php');
			else header('Location: up.action.php');
		}
		else{
			$erreur='Mauvais mot de passe';
		}
	}
}



// sinon, affichage du formulaire
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> ADSPRING - Suivi commercial </title>
<link rel="stylesheet" type="text/css" href="css/home.css" />
</head>

<body>

<div id="head">
<img src="img/logo.png" alt="logo adspring" />
</div>

<div id="main">
	<p id="notification"><?php echo $erreur; ?></p>
    <form action="#" enctype="multipart/form-data" method="post" name="connect">
    <label>Login</label>
    <input type="text" name="nom" />
    <label>Password</label>
    <input type="password" name="pwd" />
    <input type="hidden" name="action" value="ok" />
    <div class="connect_bouton" onclick="javascript:document.connect.submit();"></div>
    </form>
</div>

</body>

</html>