<?php

$page='activite';
	
include("includes/base.access.php");
include("includes/class.utilisateur.php");
include("includes/class.activite.php");

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

<h2 class="decale">Reporting consolid&eacute;</h2>

<?php

$rt = mysql_query("SELECT sum(AppelLeads) as s1, sum(AppelProspects) as s2, sum(AppelClients) as s3, sum(EmailsLeads) as s4, sum(EmailsProspects) as s5, sum(EmailsClients) as s6, sum(VisiteLeads) as s7, sum(VisiteProspects) as s8, sum(VisiteClients) as s9 FROM `activite` WHERE `semaine`='".$semaine_consolide."' AND `annee`='".$annee_consolide."'");
// pointe sur le premier enregistrement, 
// nb : cette opération est a faire pour chaque enregistrement que tu veux utiliser 
$somme = mysql_fetch_object($rt); 
// affiche le champ nomé 'masomme' de l'enregistrement courant 
// je prefere utilise la concaténation pour des questions de lisibilité. Ton \n peut etre remplace par la balise <br> pour la même raison. 
echo '
<div class="tableau">
	<div class="titre">
    	<div class="cell">Semaine '.$semaine_consolide.'</div>
        <div class="cell">Leads</div>
        <div class="cell">Prospects</div>
        <div class="cell">Clients</div>
    </div>
    <div class="ligne skin1">
    	<div class="cell intit">Appels</div>
        <div class="cell">'.$somme->s1.'</div>
        <div class="cell">'.$somme->s2.'</div>
        <div class="cell">'.$somme->s3.'</div>
    </div>
    <div class="ligne skin2">
    	<div class="cell intit">Emails</div>
        <div class="cell">'.$somme->s4.'</div>
        <div class="cell">'.$somme->s5.'</div>
        <div class="cell">'.$somme->s6.'</div>
    </div>
    <div class="ligne skin1">
    	<div class="cell intit">Visite</div>
        <div class="cell">'.$somme->s7.'</div>
        <div class="cell">'.$somme->s8.'</div>
        <div class="cell">'.$somme->s9.'</div>
    </div>
</div>';

?>

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

	$n = new activite();
	$n->dashboard($u->id_utilisateur,$semaine_consolide,$annee_consolide,$mode);
}

closeDB($db);

?>

</body>
</html>
