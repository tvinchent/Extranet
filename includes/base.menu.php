<a name="top"></a>
<div id="head">
    <div id="top">
        <div id="chewbi"></div>
        <ul id="nav">
        
<?php

function menuOn($listelien){
	global $page;
	if($page==$listelien){
		return ' class="on"';
	}
}

// menu fonction du statut
if($_COOKIE['statut']=='admin'){
	echo'
	<li'.menuOn('dashboard').'><a href="dashboard.php">Dashboard</a></li>
	<li'.menuOn('affaire').'><a href="get.affaire.php">Affaires</a></li>
	<li'.menuOn('action').'><a href="up.action.php">Actions</a></li>
	<li'.menuOn('compte').'><a href="get.compte.php">Comptes</a></li>
	<li'.menuOn('activite').'><a href="get.activite.php">Reporting</a></li>
	<!--<li'.menuOn('objectif').'><a href="get.objectif.php">Objectifs</a></li>-->
	<li'.menuOn('ressource').'><a href="ressource.php">Ressources</a></li>
	';
}
elseif($_COOKIE['statut']=='dir'){
	echo'
	<li'.menuOn('dashboard').'><a href="dashboard.php">Dashboard</a></li>
	<li'.menuOn('affaire').'><a href="up.affaire.php">Affaires</a></li>
	<li'.menuOn('action').'><a href="up.action.php">Actions</a></li>
	<li'.menuOn('compte').'><a href="get.compte.php">Comptes</a></li>
	<li'.menuOn('activite').'><a href="up.activite.php">Reporting</a></li>
	<li'.menuOn('ressource').'><a href="ressource.php">Ressources</a></li>
	';
}
elseif($_COOKIE['statut']=='production'){
	echo'
	<li'.menuOn('dashboard').'><a href="dashboard.php">Dashboard</a></li>
	<li'.menuOn('action').'><a href="up.action.php">Actions</a></li>
	<li'.menuOn('activite').'><a href="up.production.php">Reporting</a></li>
	<li'.menuOn('ressource').'><a href="ressource.php">Ressources</a></li>
	';
}
elseif($_COOKIE['statut']=='secretariat'){
	echo'
	<li'.menuOn('dashboard').'><a href="dashboard.php">Dashboard</a></li>
	<li'.menuOn('action').'><a href="up.action.php">Actions</a></li>
	<!--<li'.menuOn('objectif').'><a href="get.objectif.php">Objectifs</a></li>-->
	<li'.menuOn('ressource').'><a href="ressource.php">Ressources</a></li>
	';
}
else{
	echo'<li></li>';
}
?>

		</ul>
        <div id="account">
        	<p style="padding-left:0;"><span id="nom"><?php echo $_COOKIE['nom'];?></span></p>
            <p><a href="index.php?action=deco"><img src="img/deco2.gif" alt="deconnexion" /></a></p>
        </div>
    </div>
<?php
	if($page=='action'){
		if($_COOKIE['statut']=='admin'){
			echo'<div id="menudessous"><a href="#chaudes">Actions chaudes</a><a href="#parmoi">Actions cr&eacute;&eacute;es par moi</a><a href="#attribuee">Actions attribu&eacute;es</a><a href="#terminee">Actions termin&eacute;es</a></div>';
		} 
		else{
			echo'<div id="menudessous"><a href="#parmoi">Actions cr&eacute;&eacute;es par moi</a><a href="#attribuee">Actions attribu&eacute;es</a><a href="#terminee">Actions termin&eacute;es</a></div></div>';
		}
	}
	elseif($page=='affaire'){
		echo'
		<div id="menudessous">
			<a href="#Ouverture">Ouverture</a>
			<a href="#Brief">Brief</a>
			<a href="#Proposition">Proposition</a>
			<a href="#N&eacute;gociation">N&eacute;gociation</a>
			<a href="#Conclusion">Conclusion</a>
			<a href="#Ordre">Ordre</a>
			<a href="#Gagn&eacute;e">Gagn&eacute;e</a>
			<a href="#Perdue">Perdue</a>
		</div>';
	}
	else{
		echo'<div id="titre">Chewbacca</div>';
	}
?>
</div>

<div id="main">