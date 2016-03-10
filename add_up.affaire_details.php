<?php
	
include("includes/base.access.php");
include("includes/class.utilisateur.php");
include("includes/class.compte.php");
include("includes/class.affaire.php");
	
$db = openDB();

$error = "";

if(isset($_POST['action']) && $_POST['action'] == "save"){
		
	$n = new affaire();
	$n->id_affaire = $_POST['id_affaire'];
	$n->id_utilisateur = $_POST['id_utilisateur'];
	$n->id_compte = $_POST['id_compte'];
	$n->intitule = $_POST['intitule'];
	$n->ca = $_POST['ca'];
	$n->ca_performance = $_POST['ca_performance'];
	$n->etape = $_POST['etape'];	
	$n->debut = $_POST['debut'];
	$n->ca_0 = $_POST['ca_0'];
	$n->ca_1 = $_POST['ca_1'];
	$n->ca_2 = $_POST['ca_2'];
	$n->ca_3 = $_POST['ca_3'];
	$n->ca_4 = $_POST['ca_4'];
	$n->ca_5 = $_POST['ca_5'];
	$n->ca_6 = $_POST['ca_6'];
	$n->ca_7 = $_POST['ca_7'];
	$n->ca_8 = $_POST['ca_8'];
	$n->ca_9 = $_POST['ca_9'];
	$n->ca_10 = $_POST['ca_10'];
	$n->ca_11 = $_POST['ca_11'];
	$n->ca_12 = $_POST['ca_12'];
	$n->ca_13 = $_POST['ca_13'];
	$n->ca_14 = $_POST['ca_14'];
	$n->ca_15 = $_POST['ca_15'];
	$n->ca_16 = $_POST['ca_16'];
	$n->ca_17 = $_POST['ca_17'];
	$n->ca_18 = $_POST['ca_18'];
	$n->ca_19 = $_POST['ca_19'];
	$n->ca_20 = $_POST['ca_20'];
	$n->ca_21 = $_POST['ca_21'];
	$n->ca_22 = $_POST['ca_22'];
	$n->ca_23 = $_POST['ca_23'];
	$n->ca_performance_0 = $_POST['ca_performance_0'];
	$n->ca_performance_1 = $_POST['ca_performance_1'];
	$n->ca_performance_2 = $_POST['ca_performance_2'];
	$n->ca_performance_3 = $_POST['ca_performance_3'];
	$n->ca_performance_4 = $_POST['ca_performance_4'];
	$n->ca_performance_5 = $_POST['ca_performance_5'];
	$n->ca_performance_6 = $_POST['ca_performance_6'];
	$n->ca_performance_7 = $_POST['ca_performance_7'];
	$n->ca_performance_8 = $_POST['ca_performance_8'];
	$n->ca_performance_9 = $_POST['ca_performance_9'];
	$n->ca_performance_10 = $_POST['ca_performance_10'];
	$n->ca_performance_11 = $_POST['ca_performance_11'];
	$n->ca_performance_12 = $_POST['ca_performance_12'];
	$n->ca_performance_13 = $_POST['ca_performance_13'];
	$n->ca_performance_14 = $_POST['ca_performance_14'];
	$n->ca_performance_15 = $_POST['ca_performance_15'];
	$n->ca_performance_16 = $_POST['ca_performance_16'];
	$n->ca_performance_17 = $_POST['ca_performance_17'];
	$n->ca_performance_18 = $_POST['ca_performance_18'];
	$n->ca_performance_19 = $_POST['ca_performance_19'];
	$n->ca_performance_20 = $_POST['ca_performance_20'];
	$n->ca_performance_21 = $_POST['ca_performance_21'];
	$n->ca_performance_22 = $_POST['ca_performance_22'];
	$n->ca_performance_23 = $_POST['ca_performance_23'];
	$n->save();
	
	if(mysql_error()==""){
		$error = "ok";
	}else{
		echo("erreur mysql : ".mysql_error());
	}
	
}

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
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">    
$(document).ready(function(){
	$(".ajaxform").keyup(function(){
		var str = $(this).serialize();
		$.ajax({
			type: "POST",
			data: str
		});
	});
});
<?php 
if($error == "ok"){
echo 'parent.$.fn.colorbox.close();';
}
?>
</script>
<style type="text/css">
input{
	width:40px;
}
</style>
</head>

<body onload="document.formaff.ca_0.focus();"  class="modal">

<p>
<?php
if(isset($_GET['id_affaire'])){
	echo("Modification ");
}else{
	echo("Ajout ");
}
?> 
de l'affaire</p>

<?php 
if($error == "ok"){
echo("<script language=\"javascript\">window.close()</script>");
}else{
echo($error);
}

?>

<form action="#" method="post" enctype="multipart/form-data" name="formaff" class="ajaxform">
<div style="float:left; width:250px;">
    <div>
    <span><strong>Intitule : </strong></span>
    <span><?php echo($n->intitule)?></span>
    </div>
    <br />
    <div>
    <span><strong>MB fixe: </strong></span>
    <span><input type="text" value="<?php echo($n->ca)?>" name="ca"></span>
    </div>
    <div>
    <span><strong>MB performance : </strong></span>
    <span><input type="text" value="<?php echo($n->ca_performance); ?>" name="ca_performance"></span>
    </div>
    <br />
    <div>
    <span><strong>MB fixe pond&eacute;r&eacute; : </strong></span>
    <span><?php $ca_pondere=$n->ca*$n->etape; echo($ca_pondere); ?></span>
    </div>
    <div>
    <span><strong>MB performance pond&eacute;r&eacute; : </strong></span>
    <span><?php $ca_performance_pondere=$n->ca_performance*$n->etape; echo($ca_performance_pondere); ?></span>
    </div>
    <br />
    <div>
    <span><strong>Total MB fixe r&eacute;parti : </strong></span>
    <span id="tot"></span>
    </div>
    <div>
    <span><strong>Total MB performance r&eacute;parti : </strong></span>
    <span id="tot_performance"></span>
    </div>
</div>

<div style="float:left; margin-left:20px;">
<div style="float:left; width:270px;"><span><strong>MB r&eacute;parti de l'ann&eacute;e <?php echo yearFromTimestamp($n->debut) ?></strong></span></div><br />
<div style="width:270px;">
	<div style="width:130px; float:left;">&nbsp;</div>
	<div style="width:70px; float:left;">Fixe</div>
	<div style="width:70px; float:left;">Perf</div>
</div>
<?php

// affichage des 24 mois suivant la création de l'affaire
$hop=monthFromTimestamp($n->debut);
$hip=getAffaireMonth($hop);
$newAnnee=12-$hop;// variable pour définir nb mois qu'il reste avant année suivante
$yearAffaire=yearFromTimestamp($n->debut);
for($i=0;$i<24;$i++){
	$ca='ca_'.$i;
	$ca_performance='ca_performance_'.$i;
	echo '<div style="width:270px;">
	<div style="width:130px; float:left;">'.setMonthName($hip[$i]).'</div>
		<div style="width:70px; float:left;"><input type="text" value="'.$n->$ca.'" maxlength="9" name="ca_'.$i.'" onkeyup="javascript:changement()" /></div>
		<div style="width:70px; float:left;"><input type="text" value="'.$n->$ca_performance.'" maxlength="9" name="ca_performance_'.$i.'" onkeyup="javascript:changement_performance()" /></div>
	</div>';
	$a = $i%12;
	if($a==$newAnnee){
		$yearAffaire++; // passage à l'année suivante
		echo'</div><div style="float:left; width:270px;">
		<div><div><strong>MB réparti de l\'ann&eacute;e '.$yearAffaire.'</strong></div></div>
		<div style="width:270px;">
			<div style="width:130px; float:left;">&nbsp;</div>
			<div style="width:70px; float:left;">Fixe</div>
			<div style="width:70px; float:left;">Perf</div>
		</div>';
	}
}
?>
</div>
<div class="clear"></div>
<?php



if(isset($_GET['id_affaire'])){
echo'
	<input type="hidden" value="'.$n->intitule.'" name="intitule">
	<input type="hidden" value="'.$n->etape.'" name="etape">
	<input type="hidden" value="'.$n->debut.'" name="debut">
	<input name="id_affaire" type="hidden" value="'.$_GET['id_affaire'].'">
	<input name="id_utilisateur" type="hidden" value="'.$n->id_utilisateur.'">
	<input name="id_compte" type="hidden" value="'.$n->id_compte.'">
';
}
else{
echo'<input name="id_utilisateur" type="hidden" value="'.$_GET['id_utilisateur'].'">';
}
?>
<input name="action" type="hidden" id="action" value="save" />

</form>

<script type="text/javascript">
// coucou+=eval('document.formaff.ca_'+i+'.value');
function total(){
	var totint=0;
	var i;
	for(i=0;i<24;i++){
		var formval=eval('document.formaff.ca_'+i+'.value');
		var totint= Number(totint)+Number(formval);
	}
	return totint;
}
function total_performance(){
	var totint=0;
	var i;
	for(i=0;i<24;i++){
		var formval=eval('document.formaff.ca_performance_'+i+'.value');
		var totint= Number(totint)+Number(formval);
	}
	return totint;
}
function changement(){
	document.getElementById("tot").innerHTML=total();
}
function changement_performance(){
	document.getElementById("tot_performance").innerHTML=total_performance();
}
// insertion du total au chargement
document.getElementById("tot").innerHTML=total();
document.getElementById("tot_performance").innerHTML=total_performance();
</script>
</body>
</html>
