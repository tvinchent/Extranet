<?php
class production
{
		
	var $id_production;
	var $id_utilisateur;
	var $id_affaire;
	var $semaine;
	var $annee;
	var $lundi;
	var $mardi;
	var $mercredi;
	var $jeudi;
	var $vendredi;
	
	function production()
	{
		$this->id_production = "";
		$this->id_utilisateur = "";
		$this->id_affaire = "";
		$this->semaine = "";
		$this->annee = "";
		$this->lundi = "";
		$this->mardi = "";
		$this->mercredi = "";
		$this->jeudi = "";
		$this->vendredi = "";
	}
	
	function load($utilisateur,$affaire,$semaine,$annee)
	{
		$rs = mysql_query("select * from production where id_utilisateur='".$utilisateur."' and id_affaire='".$affaire."' and semaine='".$semaine."' and annee='".$annee."'");
		if(mysql_num_rows($rs)>0){
			$l = mysql_fetch_object($rs);
			$this->id_production = $l->id_production;
			$this->id_utilisateur = $l->id_utilisateur;
			$this->id_affaire = $l->id_affaire;
			$this->semaine = $l->semaine;
			$this->annee = $l->annee;
			$this->lundi = $l->lundi;
			$this->mardi = $l->mardi;
			$this->mercredi = $l->mercredi;
			$this->jeudi = $l->jeudi;
			$this->vendredi = $l->vendredi;
		}
	}
	
	function save()
	{		
		$rs = mysql_query("select * from production where id_utilisateur='".$this->id_utilisateur."' and id_affaire='".$this->id_affaire."' and semaine='".$this->semaine."' and annee='".$this->annee."'");
		if(mysql_num_rows($rs)>0){
			$str = "update production set lundi='".$this->lundi."',";
			$str .= "mardi='".$this->mardi."',";
			$str .= "mercredi='".$this->mercredi."',";
			$str .= "jeudi='".$this->jeudi."',";
			$str .= "vendredi='".$this->vendredi."'";
			$str .= " where id_utilisateur=".$this->id_utilisateur." and id_affaire=".$this->id_affaire." and semaine=".$this->semaine." and annee=".$this->annee;
		}else{
			$str = "insert production (id_utilisateur,id_affaire,semaine,annee,lundi,mardi,mercredi,jeudi,vendredi) ";
			$str .= "values ('".$this->id_utilisateur."','".$this->id_affaire."','".$this->semaine."','".$this->annee."','".$this->lundi."','".$this->mardi."','".$this->mercredi."','".$this->jeudi."','".$this->vendredi."')";
		}
		
		mysql_query($str);
		
		if($this->id_production == ""){
			$this->id_production = mysql_insert_id();
		}
		
	}
	
	function dashboard($utilisateur,$semaine,$annee,$mode)
	{
		/*
		// si mode 'vue': verification de la création du planning
		if($mode=='vue'){			
					
		// sinon, dans les 2 modes, creation du tableau de bord
			echo'<form action="#" method="post">
			<div class="tableau">
				<div class="titre">
					<div class="cell">Semaine '.$semaine.'</div>
					<div class="cell">Lundi</div>
					<div class="cell">Mardi</div>
					<div class="cell">Mercredi</div>
					<div class="cell">Jeudi</div>
					<div class="cell">Vendredi</div>
				</div>';
				
			$req="select * from affaire where etape='1' order by id_affaire desc";
			$rs = mysql_query($req);
			$li=0;
			while ($a = mysql_fetch_object($rs)){
				$li=$li%2;
				$li++;
				echo'
				<div class="ligne skin'.$li.'">';
					if(!($utilisateur) && !($a->id_affaire)){
						echo '<div class="cell big">Planning non cr&eacute;&eacute;</div>';
					}
					else{				
					$af= new affaire();
					$af->load($a->id_affaire);
					$this->load($utilisateur,$a->id_affaire,$semaine,$annee); // chargement des donnees
					echo'
					<div class="cell intit"">'.$af->intitule.'</div>
					<div class="cell">'.$this->lundi.'</div>
					<div class="cell">'.$this->mardi.'</div>
					<div class="cell">'.$this->mercredi.'</div>
					<div class="cell">'.$this->jeudi.'</div>
					<div class="cell">'.$this->vendredi.'</div>';
					}
				echo'</div>';
				}				
			echo'</div>';
		}
		*/
		
		if($mode=='modif'){			
					
			echo'
			<div class="tableau">
				<div class="titre">
					<div class="cell w275">Semaine '.$semaine.'</div>
					<div class="cell w125">Lundi</div>
					<div class="cell w125">Mardi</div>
					<div class="cell w125">Mercredi</div>
					<div class="cell w125">Jeudi</div>
					<div class="cell w125">Vendredi</div>
				</div>';
				
			$req="select * from affaire where etape='1' order by id_affaire desc";
			$rs = mysql_query($req);
			$li=0;
			while ($a = mysql_fetch_object($rs)){
				$li=$li%2;
				$li++;
				echo'
				<form method="post" name=formProd'.$a->id_affaire.$annee.$semaine.' class="ajaxform">
				<div class="ligne skin'.$li.'">';
					if(!($utilisateur) && !($a->id_affaire)){
						echo '<div class="cell big">Planning non cr&eacute;&eacute;</div>';
					}
					else{				
					$af= new affaire();
					$af->load($a->id_affaire);
					$c = new compte();
					$c->load($a->id_compte);
					$p= new production();
					$p->load($utilisateur,$a->id_affaire,$semaine,$annee); // chargement des donnees
					echo'
					<div class="cell w275left"><strong>'.$c->compte.'</strong>: '.$af->intitule.'</div>
					<div class="cell w125"><input value="'.$p->lundi.'" type="text" name="lundi" maxlength="5" /> <input type="button" value="-" onclick="document.forms.formProd'.$a->id_affaire.$annee.$semaine.'.lundi.value=moins025(document.forms.formProd'.$a->id_affaire.$annee.$semaine.'.lundi.value);" /><input type="button" value="+" onclick="document.forms.formProd'.$a->id_affaire.$annee.$semaine.'.lundi.value=plus025(document.forms.formProd'.$a->id_affaire.$annee.$semaine.'.lundi.value);" /></div>
					<div class="cell w125"><input value="'.$p->mardi.'" type="text" name="mardi" maxlength="5" /> <input type="button" value="-" onclick="document.forms.formProd'.$a->id_affaire.$annee.$semaine.'.mardi.value=moins025(document.forms.formProd'.$a->id_affaire.$annee.$semaine.'.mardi.value);" /><input type="button" value="+" onclick="document.forms.formProd'.$a->id_affaire.$annee.$semaine.'.mardi.value=plus025(document.forms.formProd'.$a->id_affaire.$annee.$semaine.'.mardi.value);" /></div>
					<div class="cell w125"><input value="'.$p->mercredi.'" type="text" name="mercredi" maxlength="5" /> <input type="button" value="-" onclick="document.forms.formProd'.$a->id_affaire.$annee.$semaine.'.mercredi.value=moins025(document.forms.formProd'.$a->id_affaire.$annee.$semaine.'.mercredi.value);" /><input type="button" value="+" onclick="document.forms.formProd'.$a->id_affaire.$annee.$semaine.'.mercredi.value=plus025(document.forms.formProd'.$a->id_affaire.$annee.$semaine.'.mercredi.value);" /></div>
					<div class="cell w125"><input value="'.$p->jeudi.'" type="text" name="jeudi" maxlength="5" /> <input type="button" value="-" onclick="document.forms.formProd'.$a->id_affaire.$annee.$semaine.'.jeudi.value=moins025(document.forms.formProd'.$a->id_affaire.$annee.$semaine.'.jeudi.value);" /><input type="button" value="+" onclick="document.forms.formProd'.$a->id_affaire.$annee.$semaine.'.jeudi.value=plus025(document.forms.formProd'.$a->id_affaire.$annee.$semaine.'.jeudi.value);" /></div>
					<div class="cell w125"><input value="'.$p->vendredi.'" type="text" name="vendredi" maxlength="5" /> <input type="button" value="-" onclick="document.forms.formProd'.$a->id_affaire.$annee.$semaine.'.vendredi.value=moins025(document.forms.formProd'.$a->id_affaire.$annee.$semaine.'.vendredi.value);" /><input type="button" value="+" onclick="document.forms.formProd'.$a->id_affaire.$annee.$semaine.'.vendredi.value=plus025(document.forms.formProd'.$a->id_affaire.$annee.$semaine.'.vendredi.value);" /></div>					
				<input type="hidden" name="id_production" value="'.$p->id_production.'" />
				<input type="hidden" name="id_affaire" value="'.$a->id_affaire.'" />
				<input type="hidden" name="id_utilisateur" value="'.$utilisateur.'" />
				<input type="hidden" name="semaine" value="'.$semaine.'" />
				<input type="hidden" name="annee" value="'.$annee.'" />
				<input type="hidden" name="action" value="save" />';
					}
				echo'</div>
				</form>';
				}				
			echo'</div>';
		}
			
	}
	
}

?>