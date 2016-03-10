<?php

$page='action';
	
include("includes/base.access.php");
include("includes/class.action.php");
include("includes/class.utilisateur.php");
include("includes/class.affaire.php");
include("includes/class.compte.php");
	
$db = openDB();

$error = "";

if(isset($_POST['action']) && $_POST['action'] == "save"){
		
	$n = new action();
	$n->createur = $_POST['createur'];
	$n->attribue = $_POST['attribue'];
	$n->id_affaire = $_POST['id_affaire'];
	$n->nom = $_POST['nom'];
	$n->avancement = $_POST['avancement'];
	$n->priorite = $_POST['priorite'];
	$n->fin = $_POST['fin'];
	$n->save();
	
	if(mysql_error()==""){
		$error = "ok";
	}else{
		echo("erreur mysql : ".mysql_error());
	}
	
}


if(isset($_GET['id_affaire'])){
	// chargement du nom d'affaire de l'affaire a partir duquel l'action est créée
	$af = new affaire();
	$af->load($_GET['id_affaire']);
}

?>

<?php include("includes/base.header.php"); ?>
<link rel="stylesheet" type="text/css" href="css/datePicker.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/date.js"></script>
<script type="text/javascript" src="js/date_fr.js"></script>
<script type="text/javascript" src="js/jquery.datePicker.js"></script>
<script type="text/javascript">	
$(document).ready(function(){
	$.dpText = {
	TEXT_CHOOSE_DATE	:	'date de fin'
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
<div id="titre">Ajout d'action</div><br />


<form action="#" method="post" enctype="multipart/form-data">
<table cellpadding="0" cellspacing="5" class="tablemodal">
<tr>
<td>Affaire : </td>
<td><?php
if(isset($_GET['id_affaire'])){
	$af = new affaire();
	$af->load($_GET['id_affaire']);
	echo '<input type="hidden" value="'.$_GET['id_affaire'].'" maxlength="50" name="id_affaire" />'.$af->intitule.'</td>
	</tr>';
}
else{
	echo'<select name="id_affaire">
	<option value="0">non li&eacute;e</option>';
	$req="select * from affaire order by id_compte desc, intitule";
	$rs = mysql_query($req);
	while ($co = mysql_fetch_object($rs)){
		$c = new compte();
		$c->load($co->id_compte);
		echo'<option value="'.$co->id_affaire.'"><strong>'.$c->compte.'</strong>: '.$co->intitule.'</option>';
	}
	echo'</select>';
}
?>
</td>
</tr>
<tr>
<td>Nom : </td>
<td><input type="text" value="" maxlength="50" name="nom" /></td>
</tr>
<tr>
<td>Attribu&eacute; &agrave; : </td>
<td>
<select name="attribue">
<?php
$req2="select * from utilisateur";
$rs2 = mysql_query($req2);
while ($co = mysql_fetch_object($rs2)){
	if($_COOKIE['nom']==$co->nom){
		$sel_attr=" selected='selected'";
	}
	else{
		$sel_attr="";
	}		
    echo'<option value="'.$co->id_utilisateur.'"'.$sel_attr.'>'.$co->nom.'</option>';
}
?>			
</select></td>
</tr>
<tr>
<td>Date de fin: </td>
<td><input type="text" class="date-pick" value="" maxlength="10" name="fin" /></td>
</tr>
<tr>
<td>Priorite : </td>
<td>
<select name="priorite">
<?php
for($i=0;$i<=4;$i++){
	echo'<option value="'.$i.'">'.$i.'</option>';
}
?>
</select></td>
</tr>
<tr>
<td></td>
<td>
<?php
	$u = new utilisateur();
	$u->load($_COOKIE['nom']);
	echo'<input name="createur" type="hidden" value="'.$u->id_utilisateur.'">';
?>
<input name="avancement" type="hidden" value="0%">
<input name="action" type="hidden" id="action" value="save" />
<input type="submit" value="Ajouter" /></td>
</tr>
</table>

</form>

</body>
</html>
