<?php

$page='affaire';
	
include("includes/base.access.php");
include("includes/class.utilisateur.php");
include("includes/class.compte.php");
include("includes/class.etape.php");
include("includes/class.affaire.php");

$db = openDB();

$mode='vue';

if(isset($_GET['action'])){
	
	if($_GET['action']=="del_affaire"){
		$n = new affaire();
		$n->id_affaire = $_GET['id_affaire'];
		$n->delete();
	}
	if($_GET['action']=="del_etape"){
		$n = new etape();
		$n->id_etape = $_GET['id_etape'];
		$n->delete();
	}
}
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
	$n->save();
	
	if(mysql_error()==""){
		$error = "ok";
	}else{
		echo("erreur mysql : ".mysql_error());
	}
	
}
?>

<?php include("includes/base.header.php"); ?>
<script language="javascript" src="js/jquery.min.js" type="text/javascript"></script>
<script language="javascript" src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
<script language="javascript" src="js/jquery.uitablefilter.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#thattableau").tablesorter(); 

	var theTable = $('table.tableau')	
	theTable.find("tbody > tr").find("td:eq(1)").mousedown(function(){
	$(this).prev().find(":checkbox").click()
	});	
	$("#filter").keyup(function() {
	$.uiTableFilter( theTable, this.value );
	})	
	$('#filter-form').submit(function(){
	theTable.find("tbody > tr:visible > td:eq(1)").mousedown();
	return false;
	}).focus();

});

 
</script>
<link rel="stylesheet" type="text/css" href="css/datePicker.css">
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
		$('.date-pick').datePicker({startDate:'01/01/1996'});
	});
});
</script>
<link media="screen" rel="stylesheet" href="css/colorbox.css" />
<script type="text/javascript" src="js/jquery.colorbox.min.js"></script>
<script>
$(document).ready(function(){
	$(".modalbox").colorbox({iframe:true, innerWidth:500, innerHeight:300, onCleanup:function(){ window.parent.location.reload(); } });
	$(".modalbox_details").colorbox({iframe:true, innerWidth:1150, innerHeight:450, onCleanup:function(){ window.parent.location.reload(); } });
});
</script>
</head>
<body>
<?php include("includes/base.menu.php"); ?>

<!-- FILTRE DESACTIV2

<form id="filter-form" class="fonction">Filtre: <input name="filter" id="filter" value="" maxlength="30" size="30" type="text"></form><br />

 -->
<?php

$u = new utilisateur();
$u->load($_COOKIE['nom']);

$a = new affaire();
$a->dashboard($u->id_utilisateur,$_COOKIE['statut']);

closeDB($db);

?>

</div>
<br />
<a href="#top" class="tothetop">Haut de page</a>

</body>
</html>