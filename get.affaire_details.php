<?php
	
include("includes/base.access.php");
include("includes/class.utilisateur.php");
include("includes/class.compte.php");
include("includes/class.affaire.php");
	
$db = openDB();

$error = "";

$n = new affaire();
$c = new compte();
if(isset($_GET['id_affaire'])){
	$n->load($_GET['id_affaire']);
	
	// chargement du comtpe associé à l'affaire
	$c->load($n->id_compte);
}



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Document sans titre</title>
<?php include("includes/base.header.php"); ?>
</head>

<body>

<p>
<?php
if(isset($_GET['id_affaire'])){
	echo("D&eacute;tails ");
}else{
	echo("Ajout ");
}
?> 
de l'affaire</p>

<?php 
/*
if($error == "ok"){
echo("<script language=\"javascript\">refresher();</script>");
}else{
echo($error);
}
*/
?>

<form action="#" method="post" enctype="multipart/form-data" name="formaff">
<table cellpadding="0" cellspacing="0">
<tr>
<td>Intitule : </td>
<td><?php echo($n->intitule)?></td>
</tr>
<tr>
<td>CA fixe : </td>
<td><?php echo($n->ca)?></td>
</tr>
<tr>
<td>CA performance : </td>
<td><?php echo($n->ca_performance)?></td>
</tr>
<tr>
<td>CA fixe pond&eacute;r&eacute; : </td>
<td><?php $ca_pondere=$n->ca*$n->etape; echo($ca_pondere)?></td>
</tr>
<tr>
<td>CA performance pond&eacute;r&eacute; : </td>
<td><?php $ca_pondere_performance=$n->ca_performance*$n->etape; echo($ca_pondere_performance)?></td>
</tr>
<tr>
<td>Total CA fixe r&eacute;parti : </td>
<td>
<span id="tot_performance"></span>
</td>
</tr>
<tr>
<td>Total CA performance r&eacute;parti : </td>
<td>
<span id="tot"></span>
</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>CA fixe r&eacute;parti : </td>
<td></td>
</tr>
<?php

// affichage des 24 mois suivant la création de l'affaire
$hop=monthFromTimestamp($n->debut);
$hip=getAffaireMonth($hop);
$newAnnee=12-$hop;// variable pour définir nb mois qu'il reste avant année suivante
$yearAffaire=yearFromTimestamp($n->debut);
for($i=0;$i<24;$i++){
	$ca='ca_'.$i;
	echo '<tr>
	<td>'.setMonthName($hip[$i]).' '.$yearAffaire.'</td>
	<td><span id='.$ca.'>'.$n->$ca.'</span></td></tr>';
	$a = $i%12;
	if($a==$newAnnee) $yearAffaire++;
}

echo'
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>CA performance r&eacute;parti : </td>
<td></td>
</tr>';

// affichage des 24 mois suivant la création de l'affaire
$hop=monthFromTimestamp($n->debut);
$hip=getAffaireMonth($hop);
$newAnnee=12-$hop;// variable pour définir nb mois qu'il reste avant année suivante
$yearAffaire=yearFromTimestamp($n->debut);
for($i=0;$i<24;$i++){
	$ca_performance='ca_performance_'.$i;
	echo '<tr>
	<td>'.setMonthName($hip[$i]).' '.$yearAffaire.'</td>
	<td><span id='.$ca_performance.'>'.$n->$ca_performance.'</span></td></tr>';
	$a = $i%12;
	if($a==$newAnnee) $yearAffaire++;
}
?>
</table>

</form>

<script type="text/javascript">
// coucou+=eval('document.formaff.ca_'+i+'.value');
function total(){
	var totint=0;
	var i;
	for(i=0;i<24;i++){
		var formval=eval('document.getElementById("ca_'+i+'").innerHTML');
		var totint= Number(totint)+Number(formval);
	}
	return totint;
}
function total_performance(){
	var totint=0;
	var i;
	for(i=0;i<24;i++){
		var formval=eval('document.getElementById("ca_performance_'+i+'").innerHTML');
		var totint= Number(totint)+Number(formval);
	}
	return totint;
}

// insertion du total au chargement
document.getElementById("tot").innerHTML=total();
document.getElementById("tot_performance").innerHTML=total_performance();
</script>
</body>
</html>
