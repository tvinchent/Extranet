<?php

$page='activite';
	
include("includes/base.access.php");
include("includes/class.utilisateur.php");
include("includes/class.affaire.php");
include("includes/class.production.php");
include("includes/class.compte.php");

$db = openDB();

$mode='modif';

if(isset($_POST['action']) && $_POST['action'] == "save"){		
	$n = new production();
	$n->id_production = $_POST['id_production'];
	$n->id_utilisateur = $_POST['id_utilisateur'];
	$n->id_affaire = $_POST['id_affaire'];
	$n->semaine = $_POST['semaine'];
	$n->annee = $_POST['annee'];
	$n->lundi = $_POST['lundi'];
	$n->mardi = $_POST['mardi'];
	$n->mercredi = $_POST['mercredi'];
	$n->jeudi = $_POST['jeudi'];
	$n->vendredi = $_POST['vendredi'];
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
	$(".ajaxform").bind("keyup click",function(){
		var str = $(this).serialize();
		$.ajax({
			type: "POST",
			data: str
		});
	});
});
function plus025(lol) {
	if(lol=='') lol=0;
	resu = parseFloat(lol)+parseFloat(0.25);
	return(resu);
}
function moins025(loul) {
	if(loul=='') loul=0;
	resu = parseFloat(loul)-parseFloat(0.25);
	return(resu);
}
</script>
</script>
</head>

<body>
<?php include("includes/base.menu.php"); ?>

<div id="note"></div>

<p class="info">Planning de la semaine</p>

<?php

$u = new utilisateur();
$u->load($_COOKIE['nom']);

$n = new production();
$n->dashboard($u->id_utilisateur,getCurrentWeek(),getCurrentYear(),$mode);

closeDB($db);

?>

</body>
</html>
