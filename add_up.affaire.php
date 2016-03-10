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
	if(!isset($_POST['debut']) || $_POST['debut']==''){
		$n->debut = timestampFR();
	}
	else{
		$n->debut = $_POST['debut'];
	}
	$n->ca_0 = '';
	$n->ca_1 = '';
	$n->ca_2 = '';
	$n->ca_3 = '';
	$n->ca_4 = '';
	$n->ca_5 = '';
	$n->ca_6 = '';
	$n->ca_7 = '';
	$n->ca_8 = '';
	$n->ca_9 = '';
	$n->ca_10 = '';
	$n->ca_11 = '';
	$n->ca_12 = '';
	$n->ca_13 = '';
	$n->ca_14 = '';
	$n->ca_15 = '';
	$n->ca_16 = '';
	$n->ca_17 = '';
	$n->ca_18 = '';
	$n->ca_19 = '';
	$n->ca_20 = '';
	$n->ca_21 = '';
	$n->ca_22 = '';
	$n->ca_23 = '';
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
<link rel="stylesheet" type="text/css" href="css/datePicker.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/date.js"></script>
<script type="text/javascript" src="js/date_fr.js"></script>
<script type="text/javascript" src="js/jquery.datePicker.js"></script>

<script type="text/javascript">	
$(document).ready(function(){
	$.dpText = {
	TEXT_CHOOSE_DATE	:	'date de debut'
	}
	$(function()
	{
		$('.date-pick').datePicker()
	});
});
<?php 
if($error == "ok"){
echo 'parent.$.fn.colorbox.close();';
}
?>
</script>
</head>

<body class="modal">
<!-- onload="document.getElementById('input_intitule').focus();"-->
<div id="titre">
<?php
if(isset($_GET['id_affaire'])){
	echo("Modification ");
}else{
	echo("Ajout ");
}
?> 
de l'affaire</div><br />


<?php 
if($error == "ok"){
echo("<script language=\"javascript\">refresher();</script>");
}else{
echo($error);
}
?>

<form action="#" method="post" enctype="multipart/form-data">
<table cellpadding="0" cellspacing="5" class="tablemodal">
<tr>
<td>Intitule : </td>
<td><input type="text" value="<?php echo($n->intitule)?>" id="input_intitule" maxlength="50" name="intitule" /></td>
</tr>
<tr>
<td>Compte :</td>
<td>
<?php
if(isset($_GET['id_affaire'])){
	echo($c->compte);
}
else{
	echo '<select name="id_compte">';
	$rt = mysql_query("select * from compte where id_utilisateur='".$_GET['id_utilisateur']."' order by id_compte DESC");
	while ($co = mysql_fetch_object($rt)){
		echo'<option value="'.$co->id_compte.'">'.$co->compte.'</option>';
	}
	echo '</select>';
}

?>

</td>
</tr>
<tr>
<td>Signature pr&eacute;vue : </td>
<td><input type="text" class="date-pick" value="<?php echo($n->debut)?>" maxlength="10" name="debut" /></td>
</tr>
<tr>
<td>MB : </td>
<td><input type="text" value="<?php echo($n->ca)?>" maxlength="9" name="ca" /></td>
</tr>
<tr>
<td>MB performance : </td>
<td><input type="text" value="<?php echo($n->ca_performance)?>" maxlength="9" name="ca_performance" /></td>
</tr>
<tr>
<td>&Eacute;tape : </td>
<td>
<select name="etape">
    <option value="0" <?php if($n->etape=='0') echo'selected="selected"'; ?>>Perdue</option>
	<option value="0.1" <?php if($n->etape=='0.1' || !$n->etape) echo'selected="selected"'; ?>>Ouverture</option>
    <option value="0.15" <?php if($n->etape=='0.15') echo'selected="selected"'; ?>>Brief</option>
    <option value="0.3" <?php if($n->etape=='0.3') echo'selected="selected"'; ?>>Proposition</option>
    <option value="0.5" <?php if($n->etape=='0.5') echo'selected="selected"'; ?>>N&eacute;gociation</option>
    <option value="0.8" <?php if($n->etape=='0.8') echo'selected="selected"'; ?>>Conclusion</option>
    <option value="0.9" <?php if($n->etape=='0.9') echo'selected="selected"'; ?>>Ordre</option>
    <option value="1" <?php if($n->etape=='1') echo'selected="selected"'; ?>>Gagn&eacute;e</option>
    </select></td>
</tr>
<tr>
<td></td>
<td><?php
if(isset($_GET['id_affaire'])){
echo'
<input name="id_affaire" type="hidden" value="'.$_GET['id_affaire'].'">
<input name="id_utilisateur" type="hidden" value="'.$n->id_utilisateur.'">
<input name="id_compte" type="hidden" value="'.$n->id_compte.'">
';
}
else{
	echo'
	<input name="id_affaire" type="hidden" value="">
	<input name="id_utilisateur" type="hidden" value="'.$_GET['id_utilisateur'].'">';
}
?>
<input name="action" type="hidden" id="action" value="save" />
<input type="submit" value="<?php
if(isset($_GET['id_affaire'])){
echo("Modifier");
}else{
echo("Ajouter");
}
?>" /></td>
</tr>
</table>

</form>

</body>
</html>
