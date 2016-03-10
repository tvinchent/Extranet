<?php

$page='compte';
	
include("includes/base.access.php");
include("includes/class.compte.php");
include("includes/class.utilisateur.php");

$db = openDB();

if(isset($_GET['action'])){
	
	if($_GET['action']=="del"){
		$n = new compte();
		$n->id_compte = $_GET['id_compte'];
		$n->delete();
	}
}
if(isset($_POST['action']) && $_POST['action'] == "save"){		
	$n = new compte();
	$n->compte = $_POST['compte'];
	$n->id_compte = $_POST['id_compte'];
	$n->id_utilisateur = $_POST['id_utilisateur'];
	$n->etat = $_POST['etat'];
	if($_POST['communication_reference']=='on'){
		$n->communication_reference='1';
	}
	else{
		$n->communication_reference='0';
	}
	if($_POST['maj_support']=='on'){
		$n->maj_support='1';
	}
	else{
		$n->maj_support='0';
	}
	$n->save();
	
	if(mysql_error()==""){
		$error = "ok";
	}else{
		echo("erreur mysql : ".mysql_error());
	}	
}

?>

<?php include("includes/base.header.php"); ?>
<?php include("includes/base.header.php"); ?>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">    
$(document).ready(function(){
	$(".ajaxform").bind("keyup change",function(){
		var str = $(this).serialize();
		$.ajax({
			type: "POST",
			data: str
		});
	});
});
</script>
<link media="screen" rel="stylesheet" href="css/colorbox.css" />
<script type="text/javascript" src="js/jquery.colorbox.min.js"></script>
<script>
$(document).ready(function(){
	$(".modalbox").colorbox({iframe:true, innerWidth:500, innerHeight:300, onCleanup:function(){ window.parent.location.reload(); } });
});
</script>
</head>

<body>
<?php include("includes/base.menu.php"); ?>

<?php

$n = new compte();
$n->dashboard($_COOKIE['statut'],$_COOKIE['nom']);

closeDB($db);

?>

</div>

</body>
</html>
