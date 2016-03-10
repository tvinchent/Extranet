<?php

$page='action';
	
include("includes/base.access.php");
include("includes/class.action.php");
include("includes/class.utilisateur.php");
include("includes/class.affaire.php");

$db = openDB();

if(isset($_POST['action']) && $_POST['action'] == "save"){		
	$n = new action();
	$n->id_action = $_POST['id_action'];
	$n->id_action_type = $_POST['id_action_type'];
	$n->id_utilisateur = $_POST['id_utilisateur'];
	$n->id_affaire = $_POST['id_affaire'];
	$n->nom = $_POST['nom'];
	$n->commentaire = $_POST['commentaire'];
	$n->priorite = $_POST['priorite'];
	$n->checked = $_POST['checked'];
	$n->save();
	
	if(mysql_error()==""){
		$error = "ok";
	}else{
		echo("erreur mysql : ".mysql_error());
	}
	
}

?>

<?php include("includes/base.header.php"); ?>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">    
$(document).ready(function(){
	$(".ajaxform").change(function(){
		var str = $(this).serialize();
		$.ajax({
			type: "POST",
			data: str
		});
	});
});
</script>
</head>

<body>
<?php include("includes/base.menu.php"); ?>

<p><a href="#" onClick="popup('add.action.php<?php if(isset($_GET['id_affaire'])){echo'?id_affaire='.$_GET['id_affaire']; } ?>',500,450);" class="pagelink">Ajouter une action</a></p>

<div class="tableau">
<div class="titre">
	<div class="cell w100">Utilisateur</div>
    <div class="cell w150">&Eacute;tat</div>
    <div class="cell w200">Nom</div>
    <div class="cell w150">Affaire</div>
    <div class="cell w200">Commentaire</div>
    <div class="cell w100">Priorite</div>
</div>
<?php

$u = new utilisateur();
$u->load($_COOKIE['nom']);

// creation de la requette specifique fonction du statut utilisateur et de la selection ou non d'une affaire
$requete_specifique = '';
if(isset($_GET['id_affaire'])){
	// si affaire: uniquement actions lié a l'affaire
	$requete_specifique = ' where id_affaire='.$_GET['id_affaire'];
}

// affichage des actions
$query='select id_action from action'.$requete_specifique.' order by fin asc';
$rs = mysql_query($query);
$li=0;
while ($d = mysql_fetch_object($rs)){
	$a = new action();
	$a->load($d->id_action);	
	$li=$li%2;
	$li++;
	echo'
	<form method="post" class="ajaxform">
	<div class="ligne skin'.$li.'">';
	$ut = new utilisateur();
	$ut->load_by_id($a->id_utilisateur);
	echo'<div class="cell w100">'.$ut->nom.'</div>
	<div class="cell w150"><input type="checkbox" value="1" maxlength="50" name="checked" ';
	if($a->checked=='1'){ echo'checked="checked"'; }
	echo' /></div>
	<div class="cell w200"><input type="text" value="'.$a->nom.'" maxlength="50" name="nom" /></div>';
	if(isset($a->id_affaire) && $a->id_affaire!='0'){
		$af = new affaire();
		$af->load($a->id_affaire);
		echo'<div class="cell w150"><input type="text" value="'.$af->intitule.'" maxlength="50" name="affaireinfo" disabled /><input type="hidden" value="'.$a->id_affaire.'" maxlength="50" name="affaire" /></div>';
	}
	else{
		echo'<div class="cell w150"><input type="text" value="non renseign&eacute;" maxlength="50" name="info" disabled /><input type="hidden" value="0" maxlength="50" name="id_affaire" /></div>';
	}
	echo'<div class="cell w200"><input type="text" value="'.$a->commentaire.'" maxlength="50" name="commentaire" /></div>
	<div class="cell w100">
	<select name="priorite">';
	for($i=1;$i<=4;$i++){
	echo'<option value="'.$i.'" '.Select($a->priorite,$i).'>'.$i.'</option>';
	}
	echo'</select></div>
	</div>
	<input type="hidden" name="id_action" value="'.$a->id_action.'" />
	<input type="hidden" name="id_action_type" value="'.$a->id_action_type.'" />
	<input type="hidden" name="id_utilisateur" value="'.$a->id_utilisateur.'" />
	<input type="hidden" name="action" value="save" />
	</form>';
}

closeDB($db);

?>

</div>

</body>
</html>