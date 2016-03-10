<?php
	
include("includes/base.access.php");
include("includes/class.compte.php");
include("includes/class.utilisateur.php");
	
$db = openDB();

$error = "";

if(isset($_POST['action']) && $_POST['action'] == "save"){
		
	$n = new compte();
	$n->id_utilisateur = $_POST['id_utilisateur'];
	$n->compte = $_POST['compte'];
	$n->etat = $_POST['etat'];
	$n->save();
	
	if(mysql_error()==""){
		$error = "ok";
	}else{
		echo("erreur mysql : ".mysql_error());
	}
	
}

$n = new compte();
if(isset($_GET['id_compte'])){
	$n->load($_GET['id_compte']);
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Document sans titre</title>
<?php include("includes/base.header.php"); ?>
<?php 
if($error == "ok"){
echo '<script type="text/javascript">parent.$.fn.colorbox.close();</script>';
}
?>
</head>

<body onload="document.getElementById('input_compte').focus();" class="modal">

<div id="titre">
<?php
if(isset($_GET['id_compte'])){
	echo("Modification ");
}else{
	echo("Ajout ");
}
?> 
du compte</div><br />

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
<td>Nom : </td>
<td><input type="text" value="<?php echo($n->compte)?>" id="input_compte" maxlength="50" name="compte" /></td>
</tr>
<tr>
<td>Suivi par : </td>
<?php
$u= new utilisateur();
$u->load_by_id($n->id_utilisateur);
?>
<td>
<select name="id_utilisateur">
<?php
$req2="select * from utilisateur";
$rs2 = mysql_query($req2);	
while ($co = mysql_fetch_object($rs2)){
    echo'<option value="'.$co->id_utilisateur.'" '.Select($co->id_utilisateur,$n->id_utilisateur).'>'.$co->nom.'</option>';
}
?>			
</select></td>
</tr>
<tr>
<td>&Eacute;tat : </td>
<td>
	<?php echo'<select name="etat">
        <option value="Lead" '.Select($n->etat,'Lead').'>Lead</option>
        <option value="Prospect" '.Select($n->etat,'Prospect').'>Prospect</option>
        <option value="Client" '.Select($n->etat,'Client').'>Client</option>
    </select>';
	?>
</td>
</tr>
</table>
<?php
if(isset($_GET['id_compte'])){
echo'<input name="id_compte" type="hidden" id="id_compte" value="'.$_GET['id_compte'].'">';
}
?>
<input name="action" type="hidden" id="action" value="save" />
<input type="submit" value="<?php
if(isset($_GET['id_compte'])){
echo("Modifier");
}else{
echo("Ajouter");
}
?>" />
</form>

</body>
</html>
