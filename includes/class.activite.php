<?php
class activite
{
		
	var $id_activite;
	var $id_utilisateur;
	var $semaine;
	var $annee;
	var $AppelLeads;
	var $AppelProspects;
	var $AppelClients;
	var $EmailsLeads;
	var $EmailsProspects;
	var $EmailsClients;
	var $VisiteLeads;
	var $VisiteProspects;
	var $VisiteClients;
	
	function activite()
	{
		$this->id_activite = "";
		$this->id_utilisateur = "";
		$this->semaine = "";
		$this->annee = "";
		$this->AppelLeads = "";
		$this->AppelProspects = "";
		$this->AppelClients = "";
		$this->EmailsLeads = "";
		$this->EmailsProspects = "";
		$this->EmailsClients = "";
		$this->VisiteLeads = "";
		$this->VisiteProspects = "";
		$this->VisiteClients = "";
	}
	
	function load($utilisateur,$semaine,$annee)
	{
		$rs = mysql_query("select * from activite where id_utilisateur='".$utilisateur."' and semaine='".$semaine."' and annee='".$annee."'");
		if(mysql_num_rows($rs)>0){
			$l = mysql_fetch_object($rs);
			$this->id_activite = $l->id_activite;
			$this->id_utilisateur = $l->id_utilisateur;
			$this->semaine = $l->semaine;
			$this->annee = $l->annee;
			$this->AppelLeads = $l->AppelLeads;
			$this->AppelProspects = $l->AppelProspects;
			$this->AppelClients = $l->AppelClients;
			$this->EmailsLeads = $l->EmailsLeads;
			$this->EmailsProspects = $l->EmailsProspects;
			$this->EmailsClients = $l->EmailsClients;
			$this->VisiteLeads = $l->VisiteLeads;
			$this->VisiteProspects = $l->VisiteProspects;
			$this->VisiteClients = $l->VisiteClients;
		}
	}
	
	function save()
	{		
		$rs = mysql_query("select * from activite where id_utilisateur='".$this->id_utilisateur."' and semaine='".$this->semaine."' and annee='".$this->annee."'");
		if(mysql_num_rows($rs)>0){
			$str = "update activite set AppelLeads='".$this->AppelLeads."',";
			$str .= "AppelProspects='".$this->AppelProspects."',";
			$str .= "AppelClients='".$this->AppelClients."',";
			$str .= "EmailsLeads='".$this->EmailsLeads."',";
			$str .= "EmailsProspects='".$this->EmailsProspects."',";
			$str .= "EmailsClients='".$this->EmailsClients."',";
			$str .= "VisiteLeads='".$this->VisiteLeads."',";
			$str .= "VisiteProspects='".$this->VisiteProspects."',";
			$str .= "VisiteClients='".$this->VisiteClients."'";
			$str .= " where id_utilisateur=".$this->id_utilisateur." and semaine=".$this->semaine." and annee=".$this->annee;
		}else{
			$str = "insert activite (id_utilisateur,semaine,annee,AppelLeads,AppelProspects,AppelClients,EmailsLeads,EmailsProspects,EmailsClients,VisiteLeads,VisiteProspects,VisiteClients) ";
			$str .= "values ('".$this->id_utilisateur."','".$this->semaine."','".$this->annee."','".$this->AppelLeads."','".$this->AppelProspects."','".$this->AppelClients."','".$this->EmailsLeads."','".$this->EmailsProspects."','".$this->EmailsClients."','".$this->VisiteLeads."','".$this->VisiteProspects."','".$this->VisiteClients."')";
		}
		
		mysql_query($str);
		
		if($this->id_activite == ""){
			$this->id_activite = mysql_insert_id();
		}
		
	}
	
	function dashboard($utilisateur,$semaine,$annee,$mode)
	{
		$this->load($utilisateur,$semaine,$annee); // chargement des donnees
		
		// si mode 'vue': verification de la création du planning
		if($mode=='vue'){
			
			if(!($this->id_utilisateur)){
			echo '<p class="notification">Reporting non cr&eacute;&eacute;</p>';
			}
			else{					
			// sinon, dans les 2 modes, creation du tableau de bord
				echo'<form action="#" method="post">
				<div class="tableau">
				<div class="titre">
					<div class="cell">Semaine '.$semaine.'</div>
					<div class="cell">Leads</div>
					<div class="cell">Prospects</div>
					<div class="cell">Clients</div>
				</div>
				<div class="ligne skin1">
					<div class="cell intit">Appels</div>
					<div class="cell">'.$this->AppelLeads.'</div>
					<div class="cell">'.$this->AppelProspects.'</div>
					<div class="cell">'.$this->AppelClients.'</div>
				</div>
				<div class="ligne skin2">
					<div class="cell intit">Emails</div>
					<div class="cell">'.$this->EmailsLeads.'</div>
					<div class="cell">'.$this->EmailsProspects.'</div>
					<div class="cell">'.$this->EmailsClients.'</div>
				</div>
				<div class="ligne skin1">
					<div class="cell intit">Visite</div>
					<div class="cell">'.$this->VisiteLeads.'</div>
					<div class="cell">'.$this->VisiteProspects.'</div>
					<div class="cell">'.$this->VisiteClients.'</div>
				</div>
				</div>';
			}
		}
			
			// si et seulement si mode 'modif': affichage du bouton de soumission
			if($mode=='modif'){
				echo'<form method="post" name=formAct'.$annee.$semaine.' class="ajaxform">
			<div class="tableau">
			<div class="titre">
				<div class="cell">Semaine '.$semaine.'</div>
				<div class="cell">Leads</div>
				<div class="cell">Prospects</div>
				<div class="cell">Clients</div>
			</div>
			<div class="ligne skin1">
				<div class="cell act_vue intit">Appels</div>
				<div class="cell act_vue" class="addbutton"><input value="'.$this->AppelLeads.'" type="text" name="AppelLeads" maxlength="3" /> <input type="button" value="-" onclick="document.forms.formAct'.$annee.$semaine.'.AppelLeads.value--;" /><input type="button" value="+" onclick="document.forms.formAct'.$annee.$semaine.'.AppelLeads.value++;" /></div>
				<div class="cell act_vue"><input value="'.$this->AppelProspects.'" type="text" name="AppelProspects" maxlength="3 document.forms.formAct'.$annee.$semaine.'.submit();" /> <input type="button" value="-" onclick="document.forms.formAct'.$annee.$semaine.'.AppelProspects.value--;" /><input type="button" value="+" onclick="document.forms.formAct'.$annee.$semaine.'.AppelProspects.value++;" /></div>
				<div class="cell act_vue"><input value="'.$this->AppelClients.'" type="text" name="AppelClients" maxlength="3" /> <input type="button" value="-" onclick="document.forms.formAct'.$annee.$semaine.'.AppelClients.value--;" /><input type="button" value="+" onclick="document.forms.formAct'.$annee.$semaine.'.AppelClients.value++;" /></div>
			</div>
			<div class="ligne skin2">
				<div class="cell act_vue intit">Emails</div>
				<div class="cell act_vue"><input value="'.$this->EmailsLeads.'" type="text" name="EmailsLeads" maxlength="3 document.forms.formAct'.$annee.$semaine.'.submit();" /> <input type="button" value="-" onclick="document.forms.formAct'.$annee.$semaine.'.EmailsLeads.value--;" /><input type="button" value="+" onclick="document.forms.formAct'.$annee.$semaine.'.EmailsLeads.value++;;" /></div>
				<div class="cell act_vue"><input value="'.$this->EmailsProspects.'" type="text" name="EmailsProspects" maxlength="3" /> <input type="button" value="-" onclick="document.forms.formAct'.$annee.$semaine.'.EmailsProspects.value--;" /><input type="button" value="+" onclick="document.forms.formAct'.$annee.$semaine.'.EmailsProspects.value++;" /></div>
				<div class="cell act_vue"><input value="'.$this->EmailsClients.'" type="text" name="EmailsClients" maxlength="3" /> <input type="button" value="-" onclick="document.forms.formAct'.$annee.$semaine.'.EmailsClients.value--;" /><input type="button" value="+" onclick="document.forms.formAct'.$annee.$semaine.'.EmailsClients.value++;" /></div>
			</div>
			<div class="ligne skin1">
				<div class="cell act_vue intit">Visite</div>
				<div class="cell act_vue"><input value="'.$this->VisiteLeads.'" type="text" name="VisiteLeads" maxlength="3" /> <input type="button" value="-" onclick="document.forms.formAct'.$annee.$semaine.'.VisiteLeads.value--;" /><input type="button" value="+" onclick="document.forms.formAct'.$annee.$semaine.'.VisiteLeads.value++;" /></div>
				<div class="cell act_vue"><input value="'.$this->VisiteProspects.'" type="text" name="VisiteProspects" maxlength="3" /> <input type="button" value="-" onclick="document.forms.formAct'.$annee.$semaine.'.VisiteProspects.value--;" /><input type="button" value="+" onclick="document.forms.formAct'.$annee.$semaine.'.VisiteProspects.value++;" /></div>
				<div class="cell act_vue"><input value="'.$this->VisiteClients.'" type="text" name="VisiteClients" maxlength="3" /> <input type="button" value="-" onclick="document.forms.formAct'.$annee.$semaine.'.VisiteClients.value--;" /><input type="button" value="+" onclick="document.forms.formAct'.$annee.$semaine.'.VisiteClients.value++;" /></div>
			</div>
			</div>
				<input type="hidden" name="id_activite" value="'.$this->id_activite.'" />
				<input type="hidden" name="id_utilisateur" value="'.$utilisateur.'" />
				<input type="hidden" name="semaine" value="'.$semaine.'" />
				<input type="hidden" name="annee" value="'.$annee.'" />
				<input type="hidden" name="action" value="save" />
				</form>';
		}
	}
	
}

?>