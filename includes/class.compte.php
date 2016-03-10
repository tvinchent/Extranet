<?php
class compte
{
		
	var $id_compte;
	var $id_utilisateur;
	var $compte;
	var $etat;
	var $communication_reference;
	var $maj_support;
	
	function compte()
	{
		$this->id_compte = "";
		$this->id_utilisateur = "";
		$this->compte = "";
		$this->etat = "";
		$this->communication_reference = "";
		$this->maj_support = "";
	}
	
	function load($id)
	{
		$rs = mysql_query("select * from compte where id_compte='".$id."' order by compte desc");
		if(mysql_num_rows($rs)>0){
			$l = mysql_fetch_object($rs);
			$this->id_compte = $l->id_compte;
			$this->id_utilisateur = $l->id_utilisateur;
			$this->compte = $l->compte;
			$this->etat = $l->etat;
			$this->communication_reference = $l->communication_reference;
			$this->maj_support = $l->maj_support;
		}
	}
	
	function save()
	{
		if($this->id_compte <> ""){
			$str = "update compte set id_utilisateur='".$this->id_utilisateur."',";
			$str .= "compte='".$this->compte."',";
			$str .= "etat='".$this->etat."',";
			$str .= "communication_reference='".$this->communication_reference."',";
			$str .= "maj_support='".$this->maj_support."'";
			$str .= " where id_compte=".$this->id_compte;
		}else{
			$str = "insert compte (id_utilisateur,compte,etat,communication_reference,maj_support) ";
			$str .= "values ('".$this->id_utilisateur."','".$this->compte."','".$this->etat."','".$this->communication_reference."','".$this->maj_support."')";
		}
		
		mysql_query($str);
		
		if($this->id_compte == ""){
			$this->id_compte = mysql_insert_id();
		}
		
	}
	
	function delete()
	{
		mysql_query("delete from compte where id_compte=".$this->id_compte);
	}
	
	function dashboard($mode,$utilisateur)
	{
		// creation du tableau de bord
		if($mode=='admin'){	
			echo'<p><a href="add_up.compte.php" class="pagelink modalbox">Ajouter un compte</a></p>';
			echo'
			<div class="tableau">
			<div class="titre">
				<div class="cell w400">Nom du compte</div>
				<div class="cell w170">Suivi par</div>
				<div class="cell w110">&Eacute;tat</div>
				<div class="cell w110">R&eacute;f&eacute;rence</div>
				<div class="cell w110">MAJ support</div>
			</div>';
			// listing des comptes
			$rs = mysql_query("select * from compte order by compte asc");
			$li=0;
			while ($c = mysql_fetch_object($rs)){
				$li=$li%2;
				$li++;
				echo'
				<form method="post" class="ajaxform">
				<div class="ligne skin'.$li.'">
					<div class="cell w400"><input type="text" value="'.$c->compte.'" maxlength="50" name="compte" /></div>
					<div class="cell w170">
					
					<select name="id_utilisateur">';
				$req2="select * from utilisateur";
				$rs2 = mysql_query($req2);	
				while ($co = mysql_fetch_object($rs2)){
					echo'<option value="'.$co->id_utilisateur.'" '.Select($co->id_utilisateur,$c->id_utilisateur).'>'.$co->nom.'</option>';
				}		
				echo'</select></div>					
					<div class="cell w110">						
						<select name="etat">
							<option value="Lead" '.Select($c->etat,'Lead').'>Lead</option>
							<option value="Prospect" '.Select($c->etat,'Prospect').'>Prospect</option>
							<option value="Client" '.Select($c->etat,'Client').'>Client</option>
						</select>
					</div>
					<div class="cell w110"><input type="checkbox" name="communication_reference"'.Checkit($c->communication_reference,'1').' /></div>
					<div class="cell w110"><input type="checkbox" name="maj_support"'.Checkit($c->maj_support,'1').' /></div>
				</div>
			<input type="hidden" name="id_compte" value="'.$c->id_compte.'" />
			<input type="hidden" name="action" value="save" />
				</form>';
			}
		}
			
		else{
			echo'
			<p class="info">Comptes qui me sont attribu&eacute;s</p>
			<div class="tableau">
				<div class="titre">
					<div class="cell w450">Mes comptes</div>
					<div class="cell w450">&Eacute;tat</div>
				</div>';
			// listing des comptes
			$u= new utilisateur();
			$u->load($utilisateur);
			$rs = mysql_query("select * from compte where id_utilisateur='".$u->id_utilisateur."'");
			$lo=0;
			while ($c = mysql_fetch_object($rs)){
				$lo=$lo%2;
				$lo++;
				echo'
			<form method="post" class="ajaxform">
				<div class="ligne skin'.$lo.'">
					<div class="cell w450">'.$c->compte.'</div>
					<div class="cell w450">
					<select name="etat">
						<option value="Lead" '.Select($c->etat,'Lead').'>Lead</option>
						<option value="Prospect" '.Select($c->etat,'Prospect').'>Prospect</option>
						<option value="Client" '.Select($c->etat,'Client').'>Client</option>
					</select>
					</div> 
				</div>
			<input type="hidden" name="compte" value="'.$c->compte.'" />
			<input type="hidden" name="id_compte" value="'.$c->id_compte.'" />
			<input type="hidden" name="id_utilisateur" value="'.$c->id_utilisateur.'" />
			<input type="hidden" name="action" value="save" />
			</form>';
			}		
		echo'</div>';
		
		// comptes non attribues		
		echo'<p class="info">Autres comptes</p>
		
			<div class="tableau">
				<div class="titre">
					<div class="cell w450">Mes comptes</div>
					<div class="cell w450">&Eacute;tat</div>
				</div>';
			// listing des comptes
			$u= new utilisateur();
			$u->load($utilisateur);
			$rs = mysql_query("select * from compte where id_utilisateur!='".$u->id_utilisateur."'");
			$lo=0;
			while ($c = mysql_fetch_object($rs)){
				$lo=$lo%2;
				$lo++;
				echo'
				<div class="ligne skin'.$lo.'">
					<div class="cell w450">'.$c->compte.'</div>
					<div class="cell w450">'.$c->etat.'</div>
				</div>';
			}		
		echo'</div>';
		}
	}
}

?>