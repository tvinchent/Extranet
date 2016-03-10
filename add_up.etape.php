<?php
	
include("includes/base.access.php");
include("includes/class.affaire.php");
include("includes/class.etape.php");
	
$db = openDB();

$error = "";

if(isset($_POST['action']) && $_POST['action'] == "save"){
		
	$n = new etape();
	$n->id_etape = $_POST['id_etape'];
	$n->ca_pondere = $_POST['ca_pondere'];
	$n->id_affaire = $_POST['id_affaire'];
	$n->save();
	
	if(mysql_error()==""){
		$error = "ok";
	}else{
		echo("erreur mysql : ".mysql_error());
	}
	
}

$n = new etape();
if(isset($_GET['id_etape'])){
	$n->load($_GET['id_etape']);
}

$a = new affaire();
$a->load($_GET['id_affaire']);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Document sans titre</title>
<?php include("includes/base.header.php"); ?>
</head>

<body onload="document.getElementById('ca_pondere').focus();">

<p>
<?php
if(isset($_GET['id_etape'])){
	echo("Modification ");
}else{
	echo("Ajout ");
}
?> 
de l'etape</p>

<?php 
if($error == "ok"){
echo("<script language=\"javascript\">refresher();</script>");
}else{
echo($error);
}
?>

<form action="#" method="post" enctype="multipart/form-data">
<table cellpadding="0" cellspacing="0">
<tr>
<td>CA pond&eacute;r&eacute; : </td>
<td><input type="text" value="<?php echo($n->ca_pondere); ?>" id="ca_pondere" maxlength="50" name="ca_pondere" /></td>
</tr>
<tr>
<td>Affaire : </td>
<td><?php echo $a->intitule; ?></td>
</tr>
<tr>
<td></td>
<td>
<?php
if(isset($_GET['id_etape'])){
echo'<input name="id_etape" type="hidden" value="'.$_GET['id_etape'].'">';
}
?>
<input name="id_affaire" type="hidden" value="<?php echo $_GET['id_affaire']; ?>">
<input name="action" type="hidden" id="action" value="save" />
<input type="submit" value="<?php
if(isset($_GET['id_etape'])){
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
