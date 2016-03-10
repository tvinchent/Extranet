<?php

$page='action';
	
include("includes/base.access.php");
include("includes/class.action.php");
include("includes/class.utilisateur.php");
include("includes/class.affaire.php");
include("includes/class.compte.php");

$db = openDB();

if(isset($_POST['action']) && $_POST['action'] == "save"){		
	$n = new action();
	$n->id_action = $_POST['id_action'];
	$n->id_action_type = $_POST['id_action_type'];
	$n->createur = $_POST['createur'];
	$n->attribue = $_POST['attribue'];
	$n->id_affaire = $_POST['id_affaire'];
	$n->nom = $_POST['nom'];
	if(!isset($_POST['avancement'])){
		$n->avancement = '0%';
	}
	else{
		$n->avancement = $_POST['avancement'];
	}
	$n->priorite = $_POST['priorite'];
	$n->fin = $_POST['fin'];
	$n->save();
	
	if(mysql_error()==""){
		$error = "ok";
	}else{
		echo("erreur mysql : ".mysql_error());
	}
	
}

?>

<?php include("includes/base.header.php"); ?>
<link rel="stylesheet" type="text/css" href="css/jquery.rating.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.rating.js"></script>
<link rel="stylesheet" type="text/css" href="css/datePicker.css">
<script type="text/javascript" src="js/date.js"></script>
<script type="text/javascript" src="js/date_fr.js"></script>
<script type="text/javascript" src="js/jquery.datePicker.js"></script>
<link media="screen" rel="stylesheet" href="css/colorbox.css" />
<script type="text/javascript" src="js/jquery.colorbox.min.js"></script>
<script type="text/javascript">    
$(document).ready(function(){
	$(".ajaxform").bind("keyup change click",function(){
		var str = $(this).serialize();
		$.ajax({
			type: "POST",
			data: str
		});
	});
	$.dpText = {
	TEXT_CHOOSE_DATE	:	'date de fin'
	}
	$(function()
	{
		$('.date-pick').datePicker({startDate:'01/01/1996'});
	});
	$(".modalbox").colorbox({iframe:true, innerWidth:500, innerHeight:300, onCleanup:function(){ window.parent.location.reload(); } });
});
</script>
</head>

<body>
<?php include("includes/base.menu.php"); ?>

<!--<p><a href="#" onClick="popup('add.action.php<?php if(isset($_GET['id_affaire'])){echo'?id_affaire='.$_GET['id_affaire']; } ?>',500,450);" class="pagelink">Ajouter une action</a></p>-->

<p><a href="add.action.php<?php if(isset($_GET['id_affaire'])){echo'?id_affaire='.$_GET['id_affaire']; } ?>" class="pagelink modalbox">Ajouter une action</a></p>

<?php if($_COOKIE['statut']=='admin'){ ?>
<a name="chaudes"></a><p class="info">Actions chaudes</p>

<div class="tableau">
<div class="titre">
    <div class="cell w280">Nom</div>
    <div class="cell actaff">Affaire</div>
    <div class="cell w120">Attribu&eacute; &agrave;</div>
    <div class="cell w100">Fin</div>
    <div class="cell w120">Avancement</div>
    <div class="cell w100">Priorite</div>
</div>
<?php

$u = new utilisateur();
$u->load($_COOKIE['nom']);

// creation de la requette specifique fonction du statut utilisateur et de la selection ou non d'une affaire
$requete_specifique = '';
if(isset($_GET['id_affaire'])){
	// si affaire: que les action liée a l'affaire selectionnée, que ce soit par un admin ou non admin
	$requete_specifique = ' and id_affaire='.$_GET['id_affaire'];
}

// affichage des actions
$query='select id_action from action where avancement!="100%"'.$requete_specifique.' order by fin asc';
$rs = mysql_query($query);
$li=0;
$chaudation= time()+86400; // chaudation a +1 jour
while ($d = mysql_fetch_object($rs)){
	$a = new action();
	$a->load($d->id_action);
	if(datefrTOunixtimestamp($a->fin)<$chaudation){
		$li=$li%2;
		$li++;
		echo'<form method="post" class="ajaxform" name="actform'.$d->id_action.'">
		<div class="cell w280"><input type="text" value="'.$a->nom.'" maxlength="50" name="nom" /></div>';
		
		echo'<div class="cell actaff">
		<select name="id_affaire">';
		if(isset($a->id_affaire) && $a->id_affaire=='0'){
			$select=' selected="selected"';
		}
		echo'<option value="0"'.$select.'>non li&eacute;e</option>';
		$req2="select * from affaire order by id_compte desc, intitule";
		$rs2 = mysql_query($req2);
		while ($co = mysql_fetch_object($rs2)){
			$c = new compte();
			$c->load($co->id_compte);
			$select='';
			if(isset($a->id_affaire) && $a->id_affaire==$co->id_affaire){
				$select=' selected="selected"';
			}
			echo'<option value="'.$co->id_affaire.'"'.$select.'><strong>'.$c->compte.'</strong>: '.$co->intitule.'</option>';
		}
		echo'</select>
		</div>
		<div class="cell w120">
		<select name="attribue">';
		$req3="select * from utilisateur";
		$rs3 = mysql_query($req3);	
		while ($co = mysql_fetch_object($rs3)){
			echo'<option value="'.$co->id_utilisateur.'" '.Select($co->id_utilisateur,$a->attribue).'>'.$co->nom.'</option>';
		}
		echo'		
		</select>
		</div>
		<div class="cell w100"><input type="text" class="date-pick" value="'.$a->fin.'" maxlength="10" name="fin" /></div>
		<div class="ligne skin'.$li.'">
		<div class="cell w120" >
	<input name="avancement" type="radio" class="star" value="20%" '.Check($a->avancement,'20%').'/>
	<input name="avancement" type="radio" class="star" value="40%" '.Check($a->avancement,'40%').' />
	<input name="avancement" type="radio" class="star" value="60%" '.Check($a->avancement,'60%').' />
	<input name="avancement" type="radio" class="star" value="80%" '.Check($a->avancement,'80%').' />
	<input name="avancement" type="radio" class="star" value="100%" '.Check($a->avancement,'100%').' /></div>';
		echo'
		<div class="cell w100">
		<select name="priorite">';
		for($i=0;$i<=4;$i++){
		echo'<option value="'.$i.'" '.Select($a->priorite,$i).'>'.$i.'</option>';
		}
		echo'</select></div>
		</div>
		<input type="hidden" name="id_action" value="'.$a->id_action.'" />
		<input type="hidden" name="id_action_type" value="'.$a->id_action_type.'" />
		<input type="hidden" name="createur" value="'.$a->createur.'" />
		<input type="hidden" name="action" value="save" />
		</form>';
	}
}
?>
</div>
<br />
<a href="#top" class="tothetop">Haut de page</a>
<br />
<?php } ?>

<a name="parmoi"></a><p class="info">Actions cr&eacute;&eacute;es par moi</p>

<div class="tableau">
<div class="titre">
    <div class="cell w280">Nom</div>
    <div class="cell actaff">Affaire</div>
    <div class="cell w120">Attribu&eacute; &agrave;</div>
    <div class="cell w100">Fin</div>
    <div class="cell w120">Avancement</div>
    <div class="cell w100">Priorite</div>
</div>
<?php

$u = new utilisateur();
$u->load($_COOKIE['nom']);

// creation de la requette specifique fonction du statut utilisateur et de la selection ou non d'une affaire
$requete_specifique = '';
if(isset($_GET['id_affaire'])){
	// si affaire: que les action liée a l'affaire selectionnée, que ce soit par un admin ou non admin
	$requete_specifique = ' where id_affaire='.$_GET['id_affaire'];
}
/*
elseif(isset($_GET['id_compte'])){
	// liaison d'une affaire direct à un compte
	$requete_specifique = ' where id_affaire IN (SELECT `id_affaire` FROM `affaire` WHERE id_compte='.$_GET['id_compte'].')';
$requete='SELECT * FROM `action` WHERE `id_affaire` IN (SELECT `id_affaire` FROM `affaire` WHERE id_compte=22)';
}*/
else{	
	// si pas d'affaire: action propose a l'utilisateur
	$requete_specifique = ' where createur='.$u->id_utilisateur;
}


// affichage des actions
$query='select id_action from action'.$requete_specifique.' and avancement!="100%" order by fin asc';
$rs = mysql_query($query);
$li=0;
while ($d = mysql_fetch_object($rs)){
	$a = new action();
	$a->load($d->id_action);
	
	$li=$li%2;
	$li++;
	echo'<form method="post" class="ajaxform" name="actform'.$d->id_action.'">
	<div class="cell w280"><input type="text" value="'.$a->nom.'" maxlength="50" name="nom" /></div>';
	
	echo'<div class="cell actaff">
	<select name="id_affaire">';
	if(isset($a->id_affaire) && $a->id_affaire=='0'){
		$select=' selected="selected"';
	}
	echo'<option value="0"'.$select.'>non li&eacute;e</option>';
	$req2="select * from affaire order by id_compte desc, intitule";
	$rs2 = mysql_query($req2);
	while ($co = mysql_fetch_object($rs2)){
		$c = new compte();
		$c->load($co->id_compte);
		$select='';
		if(isset($a->id_affaire) && $a->id_affaire==$co->id_affaire){
			$select=' selected="selected"';
		}
		echo'<option value="'.$co->id_affaire.'"'.$select.'><strong>'.$c->compte.'</strong>: '.$co->intitule.'</option>';
	}
	echo'</select>
	</div>
	<div class="cell w120">
	<select name="attribue">';
	$req3="select * from utilisateur";
	$rs3 = mysql_query($req3);	
	while ($co = mysql_fetch_object($rs3)){
		echo'<option value="'.$co->id_utilisateur.'" '.Select($co->id_utilisateur,$a->attribue).'>'.$co->nom.'</option>';
	}
	echo'		
	</select>
	</div>
	<div class="cell w100"><input type="text" class="date-pick" value="'.$a->fin.'" maxlength="10" name="fin" /></div>
	<div class="ligne skin'.$li.'">
	<div class="cell w120" >
<input name="avancement" type="radio" class="star" value="20%" '.Check($a->avancement,'20%').'/>
<input name="avancement" type="radio" class="star" value="40%" '.Check($a->avancement,'40%').' />
<input name="avancement" type="radio" class="star" value="60%" '.Check($a->avancement,'60%').' />
<input name="avancement" type="radio" class="star" value="80%" '.Check($a->avancement,'80%').' />
<input name="avancement" type="radio" class="star" value="100%" '.Check($a->avancement,'100%').' /></div>';
	echo'
	<div class="cell w100">
	<select name="priorite">';
	for($i=0;$i<=4;$i++){
	echo'<option value="'.$i.'" '.Select($a->priorite,$i).'>'.$i.'</option>';
	}
	echo'</select></div>
	</div>
	<input type="hidden" name="id_action" value="'.$a->id_action.'" />
	<input type="hidden" name="id_action_type" value="'.$a->id_action_type.'" />
	<input type="hidden" name="createur" value="'.$a->createur.'" />
	<input type="hidden" name="action" value="save" />
	</form>';
}
?>
</div>
<br />
<a href="#top" class="tothetop">Haut de page</a>
<br />

<a name="attribuee"></a><p class="info">Actions qui me sont attribu&eacute;es</p>

<div class="tableau">
<div class="titre">
    <div class="cell w280">Nom</div>
    <div class="cell actaff">Affaire</div>
    <div class="cell w120">Attribu&eacute; &agrave;</div>
    <div class="cell w100">Fin</div>
    <div class="cell w120">Avancement</div>
    <div class="cell w100">Priorite</div>
</div>

<?php

$u = new utilisateur();
$u->load($_COOKIE['nom']);

// creation de la requette specifique fonction du statut utilisateur et de la selection ou non d'une affaire
$requete_specifique = '';
if(!isset($_GET['id_affaire'])){
	// si pas d'affaire: action propose a l'utilisateur
	$requete_specifique = ' where attribue='.$u->id_utilisateur;}
else{
	// si affaire: que les action liée a l'affaire selectionnée, que ce soit par un admin ou non admin
	$requete_specifique = ' where id_affaire='.$_GET['id_affaire'];
}

// affichage des actions
$query='select id_action from action'.$requete_specifique.' and avancement!="100%" order by createur, fin asc, id_affaire, id_action asc';
$rs = mysql_query($query);
$li=0;
while ($d = mysql_fetch_object($rs)){
	$a = new action();
	$a->load($d->id_action);
	
	$li=$li%2;
	$li++;
	echo'<form method="post" class="ajaxform" name="actform'.$d->id_action.'">
	<div class="cell w280"><input type="text" value="'.$a->nom.'" maxlength="50" name="nom" /></div>';
	echo'<div class="cell actaff">
	<select name="id_affaire">';
	if(isset($a->id_affaire) && $a->id_affaire=='0'){
		$select=' selected="selected"';
	}
	echo'<option value="0"'.$select.'>non li&eacute;e</option>';
	$req2="select * from affaire order by id_compte desc, intitule";
	$rs2 = mysql_query($req2);
	while ($co = mysql_fetch_object($rs2)){
		$c = new compte();
		$c->load($co->id_compte);
		$select='';
		if(isset($a->id_affaire) && $a->id_affaire==$co->id_affaire){
			$select=' selected="selected"';
		}
		echo'<option value="'.$co->id_affaire.'"'.$select.'><strong>'.$c->compte.'</strong>: '.$co->intitule.'</option>';
	}
	echo'</select>
	</div>
	<div class="cell w120">
	<select name="attribue">';
	$req2="select * from utilisateur";
	$rs2 = mysql_query($req2);	
	while ($co = mysql_fetch_object($rs2)){
		echo'<option value="'.$co->id_utilisateur.'" '.Select($co->id_utilisateur,$a->attribue).'>'.$co->nom.'</option>';
	}
	echo'		
	</select>
	</div>
	<div class="cell w100"><input type="text" class="date-pick" value="'.$a->fin.'" maxlength="10" name="fin" /></div>
	<div class="ligne skin'.$li.'">
	<div class="cell w120">
<input name="avancement" type="radio" class="star" value="20%" '.Check($a->avancement,'20%').'/>
<input name="avancement" type="radio" class="star" value="40%" '.Check($a->avancement,'40%').' />
<input name="avancement" type="radio" class="star" value="60%" '.Check($a->avancement,'60%').' />
<input name="avancement" type="radio" class="star" value="80%" '.Check($a->avancement,'80%').' />
<input name="avancement" type="radio" class="star" value="100%" '.Check($a->avancement,'100%').' /></div>';
	echo'
	<div class="cell w100">
	<select name="priorite">';
	for($i=0;$i<=4;$i++){
	echo'<option value="'.$i.'" '.Select($a->priorite,$i).'>'.$i.'</option>';
	}
	echo'</select></div>
	</div>
	<input type="hidden" name="id_action" value="'.$a->id_action.'" />
	<input type="hidden" name="id_action_type" value="'.$a->id_action_type.'" />
	<input type="hidden" name="createur" value="'.$a->createur.'" />
	<input type="hidden" name="action" value="save" />
	</form>';
}

?>

</div>
<br />
<a href="#top" class="tothetop">Haut de page</a>
<br />

<a name="terminee"></a><p class="info">Actions termin&eacute;es</p>

<div class="tableau">
<div class="titre">
    <div class="cell w280">Nom</div>
    <div class="cell actaff">Affaire</div>
    <div class="cell w120">Attribu&eacute; &agrave;</div>
    <div class="cell w100">Fin</div>
    <div class="cell w120">Avancement</div>
    <div class="cell w100">Priorite</div>
</div>

<?php

$requete_specifique = '';
if(!isset($_GET['id_affaire'])){
	// si pas d'affaire: action propose a l'utilisateur
	$requete_specifique = ' and (attribue='.$u->id_utilisateur.' or createur='.$u->id_utilisateur.')';}
else{
	// si affaire: que les action liée a l'affaire selectionnée, que ce soit par un admin ou non admin
	$requete_specifique = ' and id_affaire='.$_GET['id_affaire'];
}

// affichage des actions
$query='select id_action from action where avancement="100%"'.$requete_specifique.' order by fin asc';
$rs = mysql_query($query);
$li=0;
$expiration= time()-604800; // expiration a 7 jours
while ($d = mysql_fetch_object($rs)){
	$a = new action();
	$a->load($d->id_action);
	if(datefrTOunixtimestamp($a->fin)>$expiration){
		$li=$li%2;
		$li++;
		echo'<form method="post" class="ajaxform" name="actform'.$d->id_action.'">
		<div class="cell w280"><input type="text" value="'.$a->nom.'" maxlength="50" name="nom" /></div>';
		
		echo'<div class="cell actaff">
		<select name="id_affaire">';
		if(isset($a->id_affaire) && $a->id_affaire=='0'){
			$select=' selected="selected"';
		}
		echo'<option value="0"'.$select.'>non li&eacute;e</option>';
		$req2="select * from affaire order by id_compte desc, intitule";
		$rs2 = mysql_query($req2);
		while ($co = mysql_fetch_object($rs2)){
			$c = new compte();
			$c->load($co->id_compte);
			$select='';
			if(isset($a->id_affaire) && $a->id_affaire==$co->id_affaire){
				$select=' selected="selected"';
			}
			echo'<option value="'.$co->id_affaire.'"'.$select.'><strong>'.$c->compte.'</strong>: '.$co->intitule.'</option>';
		}
		echo'</select>
		</div>
		<div class="cell w120">
		<select name="attribue">';
		$req3="select * from utilisateur";
		$rs3 = mysql_query($req3);	
		while ($co = mysql_fetch_object($rs3)){
			echo'<option value="'.$co->id_utilisateur.'" '.Select($co->id_utilisateur,$a->attribue).'>'.$co->nom.'</option>';
		}
		echo'		
		</select>
		</div>
		<div class="cell w100"><input type="text" class="date-pick" value="'.$a->fin.'" maxlength="10" name="fin" /></div>
		<div class="ligne skin'.$li.'">
		<div class="cell w120" >
	<input name="avancement" type="radio" class="star" value="20%" '.Check($a->avancement,'20%').'/>
	<input name="avancement" type="radio" class="star" value="40%" '.Check($a->avancement,'40%').' />
	<input name="avancement" type="radio" class="star" value="60%" '.Check($a->avancement,'60%').' />
	<input name="avancement" type="radio" class="star" value="80%" '.Check($a->avancement,'80%').' />
	<input name="avancement" type="radio" class="star" value="100%" '.Check($a->avancement,'100%').' /></div>';
		echo'
		<div class="cell w100">
		<select name="priorite">';
		for($i=0;$i<=4;$i++){
		echo'<option value="'.$i.'" '.Select($a->priorite,$i).'>'.$i.'</option>';
		}
		echo'</select></div>
		</div>
		<input type="hidden" name="id_action" value="'.$a->id_action.'" />
		<input type="hidden" name="id_action_type" value="'.$a->id_action_type.'" />
		<input type="hidden" name="createur" value="'.$a->createur.'" />
		<input type="hidden" name="action" value="save" />
		</form>';
	}
}

closeDB($db);

?>
</div>
<br />
<a href="#top" class="tothetop">Haut de page</a>
<br />

</div>

</body>
</html>