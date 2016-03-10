<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Document sans titre</title>
<style type="text/css">
#main{
width:700px;
margin:auto;
}
input[type=text]{
width:30px;
}
.camarche{
color:#33CC33;
}
</style>
</head>

<body>
<?php

$semaine = strftime("%V");
$annee = strftime("%Y");
$semaineReport = $semaine;
$anneeReport = $annee;

echo 'Bonjour '.$_COOKIE[nom].',';

//envoie des modifications du reporting a la base

if($_POST['modif']){
	if($_POST['modif']=='prec'){
	$semaineReport-=1;
	}
	
	$db = mysql_connect('localhost', 'root', 'root');
	mysql_select_db('suivi',$db);
	$sql = "SELECT id_reporting FROM reporting WHERE annee='$anneeReport' AND semaine='$semaineReport'";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
	$resultat = mysql_num_rows($req);
	
	// si reporting existant update, sinon creation
	if($resultat!=0) {
	$sql2 = "UPDATE reporting SET AppelLeads='$_POST[AppelLeads]',AppelProspects='$_POST[AppelProspects]',AppelClients='$_POST[AppelClients]',EmailsLeads='$_POST[EmailsLeads]',EmailsProspects='$_POST[EmailsProspects]',EmailsClients='$_POST[EmailsClients]',VisiteLeads='$_POST[VisiteLeads]',VisiteProspects='$_POST[VisiteProspects]',VisiteClients='$_POST[VisiteClients]' WHERE semaine='$semaine' AND annee='$annee' AND id_utilisateur='$_COOKIE[nom]'";
	$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
	$confirmation='<span class="camarche">Reporting modifi&eacute;</span>';
	}
	else {
	$sql2 = "INSERT INTO reporting(id_reporting,id_utilisateur,semaine,annee,AppelLeads,AppelProspects,AppelClients,EmailsLeads,EmailsProspects,EmailsClients,VisiteLeads,VisiteProspects,VisiteClients) VALUES ('','$_COOKIE[nom]','$semaine','$annee','$_POST[AppelLeads]','$_POST[AppelProspects]','$_POST[AppelClients]','$_POST[EmailsLeads]','$_POST[EmailsProspects]','$_POST[EmailsClients]','$_POST[VisiteLeads]','$_POST[VisiteProspects]','$_POST[VisiteClients]')";
	$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
	$confirmation='<span class="camarche">Reporting cr&eacute;&eacute;</span>';
	}
	echo $confirmation;
	mysql_close(); 
}

?>

<div id="main">
<form action="#" method="post">
<table cellpadding="0" cellspacing="0">
<tr>
<td></td>
<td>Leads</td>
<td>Prospects</td>
<td>Clients</td>
</tr>
<tr>
<td>Appels</td>
<td><input type="text" name="AppelLeads" maxlength="3" /></td>
<td><input type="text" name="AppelProspects" maxlength="3" /></td>
<td><input type="text" name="AppelClients" maxlength="3" /></td>
</tr>
<tr>
<td>Emails</td>
<td><input type="text" name="EmailsLeads" maxlength="3" /></td>
<td><input type="text" name="EmailsProspects" maxlength="3" /></td>
<td><input type="text" name="EmailsClients" maxlength="3" /></td>
</tr>
<tr>
<td>Visite</td>
<td><input type="text" name="VisiteLeads" maxlength="3" /></td>
<td><input type="text" name="VisiteProspects" maxlength="3" /></td>
<td><input type="text" name="VisiteClients" maxlength="3" /></td>
</tr>
</table>
<input type="hidden" name="modif" value="actuel" />
<input type="submit" value="Mettre &agrave; jour" />
</form>
</div>

</body>
</html>
