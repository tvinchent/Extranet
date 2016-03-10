<?php

$page='activite';
	
include("includes/base.access.php");
include("includes/class.utilisateur.php");
include("includes/class.activite.php");

$db = openDB();

$mode='modif';

if(isset($_POST['action']) && $_POST['action'] == "save"){		
	$n = new activite();
	$n->id_activite = $_POST['id_activite'];
	$n->id_utilisateur = $_POST['id_utilisateur'];
	$n->semaine = $_POST['semaine'];
	$n->annee = $_POST['annee'];
	$n->AppelLeads = $_POST['AppelLeads'];
	$n->AppelProspects = $_POST['AppelProspects'];
	$n->AppelClients = $_POST['AppelClients'];
	$n->EmailsLeads = $_POST['EmailsLeads'];
	$n->EmailsProspects = $_POST['EmailsProspects'];
	$n->EmailsClients = $_POST['EmailsClients'];
	$n->VisiteLeads = $_POST['VisiteLeads'];
	$n->VisiteProspects = $_POST['VisiteProspects'];
	$n->VisiteClients = $_POST['VisiteClients'];
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
</script>
</head>

<body>
<?php include("includes/base.menu.php"); ?>

<div id="note"></div>

<p class="info">Semaine actuelle</p>

<?php

$u = new utilisateur();
$u->load($_COOKIE['nom']);

$n = new activite();
$n->dashboard($u->id_utilisateur,getCurrentWeek(),getCurrentYear(),$mode);

echo '<br /><p class="info">Semaine pr&eacute;c&eacute;dente</p>';

$n = new activite();
$n->dashboard($u->id_utilisateur,getPrevWeek(),getCurrentYear(),$mode);

closeDB($db);

?>

</body>
</html>
