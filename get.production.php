<?php

$page='activite';
	
include("includes/base.access.php");
include("includes/class.utilisateur.php");
include("includes/class.affaire.php");
include("includes/class.production.php");

$db = openDB();

$mode='vue';

?>

<?php include("includes/base.header.php"); ?>
</head>

<body>
<?php include("includes/base.menu.php"); ?>

<!-- selection de la semaine avec par defaut la semaine et moi courant -->

<?php
// definition date selectionnee ou par defaut
if(!isset($_POST['semaine_conso']) || $_POST['semaine_conso']==''){
	$semaine_consolide=getCurrentWeek();
}
else{
	$semaine_consolide=$_POST['semaine_conso'];
}
if(!isset($_POST['annee_conso']) || $_POST['annee_conso']==''){
	$annee_consolide=getCurrentYear();
}
else{
	$annee_consolide=$_POST['annee_conso'];
}
?>


<form method="post" name="datesuivi">
<div class="info decale">Semaine <select name="semaine_conso" onChange="javascript:datesuivi.submit()">
<?php
for($i=1;$i<53;$i++){
	if($i==$semaine_consolide) $selection='selected=seletected'; else $selection='';
	echo '<option value="'.$i.'" '.$selection.'>'.$i.'</option>';
}
?>
</select>
Ann&eacute;e <select name="annee_conso" onChange="javascript:datesuivi.submit()">
<?php
for($a=getCurrentYear()-2;$a<getCurrentYear()+1;$a++){
	if($a==$annee_consolide) $selection='selected=seletected'; else $selection='';
	echo '<option value="'.$a.'" '.$selection.'>'.$a.'</option>';
}
?>
</select></div>
</form>

<h2 class="decale">Reporting directeur client</h2>

<?php

// listing des dircli
$rs = mysql_query("select nom from utilisateur where statut='dir'");

while ($d = mysql_fetch_object($rs)){

	// requete qui va chercher l'id associé a l'utilisateur dans la table utilisateur
	$u = new utilisateur();
	$u->load($d->nom);
	
	// affichage du reporting associé a l'utilisateur
	echo '<ul class="detail"><li>Reporting <span class="gris"> semaine '.$semaine_consolide.'</span> de '.$d->nom.'</li></ul>';

	$n = new production();
	$n->dashboard($u->id_utilisateur,$semaine_consolide,$annee_consolide,$mode);
}

closeDB($db);

?>

</body>
</html>
