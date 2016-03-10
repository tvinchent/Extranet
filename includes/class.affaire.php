<?php
class affaire
{
	var $id_affaire;
	var $id_utilisateur;
	var $id_compte;
	var $intitule;
	var $ca;
	var $ca_performance;
	var $etape;
	var $debut;
	var $ca_0;
	var $ca_1;
	var $ca_2;
	var $ca_3;
	var $ca_4;
	var $ca_5;
	var $ca_6;
	var $ca_7;
	var $ca_8;
	var $ca_9;
	var $ca_10;
	var $ca_11;
	var $ca_12;
	var $ca_13;
	var $ca_14;
	var $ca_15;
	var $ca_16;
	var $ca_17;
	var $ca_18;
	var $ca_19;
	var $ca_20;
	var $ca_21;
	var $ca_22;
	var $ca_23;
	var $ca_performance_0;
	var $ca_performance_1;
	var $ca_performance_2;
	var $ca_performance_3;
	var $ca_performance_4;
	var $ca_performance_5;
	var $ca_performance_6;
	var $ca_performance_7;
	var $ca_performance_8;
	var $ca_performance_9;
	var $ca_performance_10;
	var $ca_performance_11;
	var $ca_performance_12;
	var $ca_performance_13;
	var $ca_performance_14;
	var $ca_performance_15;
	var $ca_performance_16;
	var $ca_performance_17;
	var $ca_performance_18;
	var $ca_performance_19;
	var $ca_performance_20;
	var $ca_performance_21;
	var $ca_performance_22;
	var $ca_performance_23;
	var $date_creation;
	
	function affaire()
	{
			$this->id_affaire = "";
			$this->id_utilisateur = "";
			$this->id_compte = "";
			$this->intitule = "";
			$this->ca = "";			
			$this->ca_performance = "";
			$this->etape = "";
			$this->debut = "";
			$this->ca_0 = "";
			$this->ca_1 = "";
			$this->ca_2 = "";
			$this->ca_3 = "";
			$this->ca_4 = "";
			$this->ca_5 = "";
			$this->ca_6 = "";
			$this->ca_7 = "";
			$this->ca_8 = "";
			$this->ca_9 = "";
			$this->ca_10 = "";
			$this->ca_11 = "";
			$this->ca_12 = "";
			$this->ca_13 = "";
			$this->ca_14 = "";
			$this->ca_15 = "";
			$this->ca_16 = "";
			$this->ca_17 = "";
			$this->ca_18 = "";
			$this->ca_19 = "";
			$this->ca_20 = "";
			$this->ca_21 = "";
			$this->ca_22 = "";
			$this->ca_23 = "";
			$this->ca_performance_0 = "";
			$this->ca_performance_1 = "";
			$this->ca_performance_2 = "";
			$this->ca_performance_3 = "";
			$this->ca_performance_4 = "";
			$this->ca_performance_5 = "";
			$this->ca_performance_6 = "";
			$this->ca_performance_7 = "";
			$this->ca_performance_8 = "";
			$this->ca_performance_9 = "";
			$this->ca_performance_10 = "";
			$this->ca_performance_11 = "";
			$this->ca_performance_12 = "";
			$this->ca_performance_13 = "";
			$this->ca_performance_14 = "";
			$this->ca_performance_15 = "";
			$this->ca_performance_16 = "";
			$this->ca_performance_17 = "";
			$this->ca_performance_18 = "";
			$this->ca_performance_19 = "";
			$this->ca_performance_20 = "";
			$this->ca_performance_21 = "";
			$this->ca_performance_22 = "";
			$this->ca_performance_23 = "";
			$this->date_creation ="";
	}
	
	function load($id)
	{
		$rs = mysql_query("select * from affaire where id_affaire='".$id."' order by id_affaire asc");
		if(mysql_num_rows($rs)>0){
			$l = mysql_fetch_object($rs);
			$this->id_affaire = $l->id_affaire;
			$this->id_utilisateur = $l->id_utilisateur;
			$this->id_compte = $l->id_compte;
			$this->intitule = $l->intitule;
			$this->ca = $l->ca;
			$this->ca_performance = $l->ca_performance;
			$this->etape = $l->etape;
			$this->debut = timestampTOfr($l->debut);
			$this->ca_0 = $l->ca_0;
			$this->ca_1 = $l->ca_1;
			$this->ca_2 = $l->ca_2;
			$this->ca_3 = $l->ca_3;
			$this->ca_4 = $l->ca_4;
			$this->ca_5 = $l->ca_5;
			$this->ca_6 = $l->ca_6;
			$this->ca_7 = $l->ca_7;
			$this->ca_8 = $l->ca_8;
			$this->ca_9 = $l->ca_9;
			$this->ca_10 = $l->ca_10;
			$this->ca_11 = $l->ca_11;
			$this->ca_12 = $l->ca_12;
			$this->ca_13 = $l->ca_13;
			$this->ca_14 = $l->ca_14;
			$this->ca_15 = $l->ca_15;
			$this->ca_16 = $l->ca_16;
			$this->ca_17 = $l->ca_17;
			$this->ca_18 = $l->ca_18;
			$this->ca_19 = $l->ca_19;
			$this->ca_20 = $l->ca_20;
			$this->ca_21 = $l->ca_21;
			$this->ca_22 = $l->ca_22;
			$this->ca_23 = $l->ca_23;			
			$this->ca_performance_0 = $l->ca_performance_0;
			$this->ca_performance_1 = $l->ca_performance_1;
			$this->ca_performance_2 = $l->ca_performance_2;
			$this->ca_performance_3 = $l->ca_performance_3;
			$this->ca_performance_4 = $l->ca_performance_4;
			$this->ca_performance_5 = $l->ca_performance_5;
			$this->ca_performance_6 = $l->ca_performance_6;
			$this->ca_performance_7 = $l->ca_performance_7;
			$this->ca_performance_8 = $l->ca_performance_8;
			$this->ca_performance_9 = $l->ca_performance_9;
			$this->ca_performance_10 = $l->ca_performance_10;
			$this->ca_performance_11 = $l->ca_performance_11;
			$this->ca_performance_12 = $l->ca_performance_12;
			$this->ca_performance_13 = $l->ca_performance_13;
			$this->ca_performance_14 = $l->ca_performance_14;
			$this->ca_performance_15 = $l->ca_performance_15;
			$this->ca_performance_16 = $l->ca_performance_16;
			$this->ca_performance_17 = $l->ca_performance_17;
			$this->ca_performance_18 = $l->ca_performance_18;
			$this->ca_performance_19 = $l->ca_performance_19;
			$this->ca_performance_20 = $l->ca_performance_20;
			$this->ca_performance_21 = $l->ca_performance_21;
			$this->ca_performance_22 = $l->ca_performance_22;
			$this->ca_performance_23 = $l->ca_performance_23;
			$this->date_creation = $l->date_creation;
		}
	}
	
	/*
	function ajaxsave()
	{
		$ok=explode('-',$hey);
		echo 'vala: '.$ok[0].' et '.$ok[1];

		$str = "update affaire set intitule='".$this->intitule."' where id_affaire=".$this->id_affaire;
		mysql_query($str);
	}
	*/
	
	function save()
	{
		if($this->id_affaire <> ""){
			if($this->ca_0=="" || !isset($this->ca_0)){
				$str = "update affaire set intitule='".$this->intitule."',";
				$str .= "id_compte='".$this->id_compte."',";
				$str .= "ca='".$this->ca."',";
				$str .= "ca_performance='".$this->ca_performance."',";
				$str .= "etape='".$this->etape."',";	
				$str .= "debut='".frTOtimestamp(urldecode($this->debut))."'";
				$str .= " where id_affaire=".$this->id_affaire;
			}
			else{
				$str = "update affaire set intitule='".$this->intitule."',";
				$str .= "id_compte='".$this->id_compte."',";
				$str .= "ca='".$this->ca."',";
				$str .= "ca_performance='".$this->ca_performance."',";
				$str .= "etape='".$this->etape."',";			
				$str .= "debut='".frTOtimestamp(urldecode($this->debut))."',";
				$str .= "ca_0='".$this->ca_0."',";
				$str .= "ca_1='".$this->ca_1."',";
				$str .= "ca_2='".$this->ca_2."',";
				$str .= "ca_3='".$this->ca_3."',";
				$str .= "ca_4='".$this->ca_4."',";
				$str .= "ca_5='".$this->ca_5."',";
				$str .= "ca_6='".$this->ca_6."',";
				$str .= "ca_7='".$this->ca_7."',";
				$str .= "ca_8='".$this->ca_8."',";
				$str .= "ca_9='".$this->ca_9."',";
				$str .= "ca_10='".$this->ca_10."',";
				$str .= "ca_11='".$this->ca_11."',";
				$str .= "ca_12='".$this->ca_12."',";
				$str .= "ca_13='".$this->ca_13."',";
				$str .= "ca_14='".$this->ca_14."',";
				$str .= "ca_15='".$this->ca_15."',";
				$str .= "ca_16='".$this->ca_16."',";
				$str .= "ca_17='".$this->ca_17."',";
				$str .= "ca_18='".$this->ca_18."',";
				$str .= "ca_19='".$this->ca_19."',";
				$str .= "ca_20='".$this->ca_20."',";
				$str .= "ca_21='".$this->ca_21."',";
				$str .= "ca_22='".$this->ca_22."',";
				$str .= "ca_23='".$this->ca_23."',";
				$str .= "ca_performance_0='".$this->ca_performance_0."',";
				$str .= "ca_performance_1='".$this->ca_performance_1."',";
				$str .= "ca_performance_2='".$this->ca_performance_2."',";
				$str .= "ca_performance_3='".$this->ca_performance_3."',";
				$str .= "ca_performance_4='".$this->ca_performance_4."',";
				$str .= "ca_performance_5='".$this->ca_performance_5."',";
				$str .= "ca_performance_6='".$this->ca_performance_6."',";
				$str .= "ca_performance_7='".$this->ca_performance_7."',";
				$str .= "ca_performance_8='".$this->ca_performance_8."',";
				$str .= "ca_performance_9='".$this->ca_performance_9."',";
				$str .= "ca_performance_10='".$this->ca_performance_10."',";
				$str .= "ca_performance_11='".$this->ca_performance_11."',";
				$str .= "ca_performance_12='".$this->ca_performance_12."',";
				$str .= "ca_performance_13='".$this->ca_performance_13."',";
				$str .= "ca_performance_14='".$this->ca_performance_14."',";
				$str .= "ca_performance_15='".$this->ca_performance_15."',";
				$str .= "ca_performance_16='".$this->ca_performance_16."',";
				$str .= "ca_performance_17='".$this->ca_performance_17."',";
				$str .= "ca_performance_18='".$this->ca_performance_18."',";
				$str .= "ca_performance_19='".$this->ca_performance_19."',";
				$str .= "ca_performance_20='".$this->ca_performance_20."',";
				$str .= "ca_performance_21='".$this->ca_performance_21."',";
				$str .= "ca_performance_22='".$this->ca_performance_22."',";
				$str .= "ca_performance_23='".$this->ca_performance_23."'";
				$str .= " where id_affaire=".$this->id_affaire;
			}
		}else{
			$str = "insert affaire (id_utilisateur,id_compte,intitule,ca,ca_performance,etape,debut,ca_0,ca_1,ca_2,ca_3,ca_4,ca_5,ca_6,ca_7,ca_8,ca_9,ca_10,ca_11,ca_12,ca_13,ca_14,ca_15,ca_16,ca_17,ca_18,ca_19,ca_20,ca_21,ca_22,ca_23,ca_performance_0,ca_performance_1,ca_performance_2,ca_performance_3,ca_performance_4,ca_performance_5,ca_performance_6,ca_performance_7,ca_performance_8,ca_performance_9,ca_performance_10,ca_performance_11,ca_performance_12,ca_performance_13,ca_performance_14,ca_performance_15,ca_performance_16,ca_performance_17,ca_performance_18,ca_performance_19,ca_performance_20,ca_performance_21,ca_performance_22,ca_performance_23,date_creation) ";
			$str .= "values ('".$this->id_utilisateur."','".$this->id_compte."','".$this->intitule."','".$this->ca."','".$this->ca_performance."','".$this->etape."','".frTOtimestamp(urldecode($this->debut))."','".$this->ca_0."','".$this->ca_1."','".$this->ca_2."','".$this->ca_3."','".$this->ca_4."','".$this->ca_5."','".$this->ca_6."','".$this->ca_7."','".$this->ca_8."','".$this->ca_9."','".$this->ca_10."','".$this->ca_11."','".$this->ca_12."','".$this->ca_13."','".$this->ca_14."','".$this->ca_15."','".$this->ca_16."','".$this->ca_17."','".$this->ca_18."','".$this->ca_19."','".$this->ca_20."','".$this->ca_21."','".$this->ca_22."','".$this->ca_23."','".$this->ca_performance_0."','".$this->ca_performance_1."','".$this->ca_performance_2."','".$this->ca_performance_3."','".$this->ca_performance_4."','".$this->ca_performance_5."','".$this->ca_performance_6."','".$this->ca_performance_7."','".$this->ca_performance_8."','".$this->ca_performance_9."','".$this->ca_performance_10."','".$this->ca_performance_11."','".$this->ca_performance_12."','".$this->ca_performance_13."','".$this->ca_performance_14."','".$this->ca_performance_15."','".$this->ca_performance_16."','".$this->ca_performance_17."','".$this->ca_performance_18."','".$this->ca_performance_19."','".$this->ca_performance_20."','".$this->ca_performance_21."','".$this->ca_performance_22."','".$this->ca_performance_23."','".timestamp()."')";
		}
		
		mysql_query($str);
		
		if($this->id_affaire == ""){
			$this->id_affaire = mysql_insert_id();
		}
		
	}
	
	function etapeSelect($affetape,$etape){
		if($affetape==$etape){
			$etapeselected="selected='selected'";
		}
		else{
			$etapeselected="";
		}
		return $etapeselected;
	}
		
	function compteSelect($affco,$co){
		if($affco==$co){
			$coselected="selected='selected'";
		}
		else{
			$coselected="";
		}
		return $coselected;
	}
	
	function delete()
	{
		mysql_query("delete from affaire where id_affaire=".$this->id_affaire);
	}
	
	function etape($etape)
	{
		if($etape=='0') $titre_etape='Perdue';
		if($etape=='0.1') $titre_etape='Ouverture';
		if($etape=='0.15') $titre_etape='Brief';
		if($etape=='0.3') $titre_etape='Proposition';
		if($etape=='0.5') $titre_etape='N&eacute;gociation';
		if($etape=='0.8') $titre_etape='Conclusion';
		if($etape=='0.9') $titre_etape='Ordre';
		if($etape=='1') $titre_etape='Gagn&eacute;e';
		return $titre_etape;
	}
	
	function dashboard($id_utilisateur,$mode)
	{
		// MODE DIRCLI
		if($mode=='dir'){
			echo'
			<p><a href="add_up.affaire.php?id_utilisateur='.$id_utilisateur.'" class="pagelink modalbox">Ajouter une affaire</a></p>';
			
			$req="select id_affaire from affaire where id_utilisateur='".$id_utilisateur."' and etape!='0' order by etape";
			$rs = mysql_query($req);
			$li=0;	
			while ($a = mysql_fetch_object($rs)){
				$this->load($a->id_affaire);
				if($li==0){
					echo'
					<a name="'.$this->etape($this->etape).'"></a><p class="info">Affaire en étape <strong>'.$this->etape($this->etape).'</strong></p>
					<div class="tableau">
						<div class="titre">
							<div class="cell w250">Intitule</div>
							<div class="cell w180">Compte</div>
							<div class="cell w70">MB</div>
							<div class="cell w100">MB perf</div>
							<div class="cell w120">&Eacute;tape</div>
							<div class="cell w100">D&eacute;but</div>
							<div class="cell w40"></div>
							<div class="cell w40"></div>
						</div>';
				}
				if($li>0 && $chgttab!=$this->etape){
					echo'
					</div>
					
					<br />
					<a href="#top" class="tothetop">Haut de page</a>
					<br />
					
					<a name="'.$this->etape($this->etape).'"></a><p class="info">Affaire en étape <strong>'.$this->etape($this->etape).'</strong></p>
					<div class="tableau">
						<div class="titre">
							<div class="cell w250">Intitule</div>
							<div class="cell w180">Compte</div>
							<div class="cell w70">MB</div>
							<div class="cell w100">MB perf</div>
							<div class="cell w120">&Eacute;tape</div>
							<div class="cell w100">D&eacute;but</div>
							<div class="cell w40"></div>
							<div class="cell w40"></div>
						</div>';
						$li=0;
				}
				// check etape pour afficher ou non la checklist
				if($this->etape=='1' || $this->etape=='0.8') {
					$checkvisib='visible';
				}
				else {
					$checkvisib='hidden';
				}
				$li=$li%2;
				$li++;
				echo '
				<div class="ligne skin'.$li.'">
				<form method="post" class="ajaxform">
				<div class="cell w250"><input type="text" value="'.$this->intitule.'" maxlength="50" name="intitule" /></div>';
			
				// recherche du compte associé à l\'id compte
				$c = new compte();
				$c->load($this->id_compte);
				echo'
				<div class="cell w180">'.$c->compte.'</div>
				<div class="cell w70"><input type="text" value="'.$this->ca.'" maxlength="50" name="ca" style="width:50px;" /></div>
				<div class="cell w100"><input type="text" value="'.$this->ca_performance.'" maxlength="50" name="ca_performance" style="width:50px;" /></div>
				<div class="cell w120">
					<select name="etape" onblur="javascript:savebutton_check('.$this->id_affaire.')">
						<option value="0" '.$this->etapeSelect($this->etape,'0').'>Perdue</option>
						<option value="0.1" '.$this->etapeSelect($this->etape,'0.1').'>Ouverture</option>
						<option value="0.15" '.$this->etapeSelect($this->etape,'0.15').'>Brief</option>
						<option value="0.3" '.$this->etapeSelect($this->etape,'0.3').'>Proposition</option>
						<option value="0.5" '.$this->etapeSelect($this->etape,'0.5').'>N&eacute;gociation</option>
						<option value="0.8" '.$this->etapeSelect($this->etape,'0.8').'>Conclusion</option>
						<option value="0.9" '.$this->etapeSelect($this->etape,'0.9').'>Ordre</option>
						<option value="1" '.$this->etapeSelect($this->etape,'1').'>Gagn&eacute;e</option>
					</select>
				</div>
				<div class="cell w100"><input type="text" class="date-pick" value="'.$this->debut.'" maxlength="10" name="debut" /></div>
				<input name="id_affaire" type="hidden" value="'.$this->id_affaire.'">
				<input name="id_compte" type="hidden" value="'.$this->id_compte.'">
				<input name="id_utilisateur" type="hidden" value="'.$this->id_utilisateur.'">
				<input type="hidden" name="action" value="save"/>
		<div class="cell w40"><a href="add_up.affaire_details.php?id_affaire='.$this->id_affaire.'" class="otherlink blue modalbox_details">D</a></div>
		<div class="cell w40"><a href="up.action.php?id_affaire='.$this->id_affaire.'" class="otherlink green">A</a></div><td>
		
		
		</form></div>
		';
		
				/*
				SELECTION POUR LISTE COMPTE
				<select name="id_compte">
				$req2="select * from compte where id_utilisateur='".$id_utilisateur."'";
				$rs2 = mysql_query($req2);
				while ($co = mysql_fetch_object($rs2)){
					echo'<option value="'.$co->id_compte.'" '.$this->compteSelect($co->id_compte,$this->id_compte).'>'.$co->compte.'</option>';
				}	</select>
				
				LIENCHECKLIST
				<div class="cell w70"><span id="check'.$this->id_affaire.'" style="visibility:'.$checkvisib.';"><a href="#" onclick="popup(\'add_up.affaire_checklist.php?id_affaire='.$this->id_affaire.'\',1100,450);">checklist</a></div>
				lien supprimer
				<td><a href="?action=del_affaire&amp;id_affaire='.$this->id_affaire.'">supprimer</a></td></tr>
								
				modifier -> détails				
				echo'
					<td><a href="#" onclick="popup(\'add_up.affaire.php?id_affaire='.$this->id_affaire.'\',500,450);">modifier</a></td>
					<td><a href="?action=del_affaire&amp;id_affaire='.$this->id_affaire.'">supprimer</a></td></tr>';

				echo '
				<tr>
				<td></td>
				<td></td>
				<td class="etape">&Eacute;tape(s)</td>
				<td class="etape">CA pond&eacute;r&eacute;</td>
				<td class="etape"></td>
				<td class="etape"></td>
				</tr>
				';
				*/
		
				// chargement des etapes associées à l'affaire
				$req2="select id_etape from etape where id_affaire='".$this->id_affaire."' order by etape.id_etape asc";
				$rs2 = mysql_query($req2);
				$i=1;
				while ($o = mysql_fetch_object($rs2)){
					$e = new etape();
					$e->load($o->id_etape);
					/*
					echo '
					<tr>
					<td></td>
					<td></td>
					<td>&eacute;tape '.$i++.'</td>
					<td>'.$e->ca_pondere.'</td>
					<td><a href="#" onclick="popup(\'add_up.etape.php?id_affaire='.$this->id_affaire.'&id_etape='.$e->id_etape.'\',500,450);">modifier</a></td>
					<td><a href="?action=del_etape&amp;id_etape='.$e->id_etape.'">supprimer</a></td>
					</tr>';
					*/
				}
				/*
				echo '
				<tr>
				<td></td>
				<td></td>
				<td colspan="2"><a href="#" onclick="popup(\'add_up.etape.php?id_affaire='.$this->id_affaire.'\',500,450);">ajouter une &eacute;tape</a><br /><br /></td>
				<td></td>
				<td></td>
				</tr>
				';*/
				
				// ecoute pour creation de nouveau tab
				$chgttab=$this->etape;				
			}
			
			// pour etape perdu (=0)
			
			$req="select id_affaire from affaire where id_utilisateur='".$id_utilisateur."' and etape='0' order by etape";
				$rs = mysql_query($req);
				$li=0;	
				while ($a = mysql_fetch_object($rs)){
					$this->load($a->id_affaire);
					if($li==0){
						echo'
						</div>
					
					<br />
					<a href="#top" class="tothetop">Haut de page</a>
					<br />
						<a name="'.$this->etape($this->etape).'"></a><p class="info">Affaire en étape <strong>'.$this->etape($this->etape).'</strong></p>
						<div class="tableau">
							<div class="titre">
								<div class="cell w250">Intitule</div>
								<div class="cell w180">Compte</div>
								<div class="cell w70">MB</div>
								<div class="cell w100">MB perf</div>
								<div class="cell w120">&Eacute;tape</div>
								<div class="cell w100">D&eacute;but</div>
								<div class="cell w40"></div>
								<div class="cell w40"></div>
							</div>';
					}
			$li=$li%2;
					$li++;
					echo '
					<div class="ligne skin'.$li.'">
					<form method="post" class="ajaxform">
					<div class="cell w250"><input type="text" value="'.$this->intitule.'" maxlength="50" name="intitule" /></div>';
				
					// recherche du compte associé à l\'id compte
					$c = new compte();
					$c->load($this->id_compte);
					echo'
					<div class="cell w180">'.$c->compte.'</div>
					<div class="cell w70"><input type="text" value="'.$this->ca.'" maxlength="50" name="ca" style="width:50px;" /></div>
					<div class="cell w100"><input type="text" value="'.$this->ca_performance.'" maxlength="50" name="ca_performance" style="width:50px;" /></div>
					<div class="cell w120">
						<select name="etape" onblur="javascript:savebutton_check('.$this->id_affaire.')">
							<option value="0" '.$this->etapeSelect($this->etape,'0').'>Perdue</option>
							<option value="0.1" '.$this->etapeSelect($this->etape,'0.1').'>Ouverture</option>
							<option value="0.15" '.$this->etapeSelect($this->etape,'0.15').'>Brief</option>
							<option value="0.3" '.$this->etapeSelect($this->etape,'0.3').'>Proposition</option>
							<option value="0.5" '.$this->etapeSelect($this->etape,'0.5').'>N&eacute;gociation</option>
							<option value="0.8" '.$this->etapeSelect($this->etape,'0.8').'>Conclusion</option>
							<option value="0.9" '.$this->etapeSelect($this->etape,'0.9').'>Ordre</option>
							<option value="1" '.$this->etapeSelect($this->etape,'1').'>Gagn&eacute;e</option>
						</select>
					</div>
					<div class="cell w100"><input type="text" class="date-pick" value="'.$this->debut.'" maxlength="10" name="debut" /></div>
					<input name="id_affaire" type="hidden" value="'.$this->id_affaire.'">
					<input name="id_compte" type="hidden" value="'.$this->id_compte.'">
					<input name="id_utilisateur" type="hidden" value="'.$this->id_utilisateur.'">
					<input type="hidden" name="action" value="save"/>
			<div class="cell w40"><a href="add_up.affaire_details.php?id_affaire='.$this->id_affaire.'" class="otherlink blue modalbox_details">D</a></div>
			<div class="cell w40"><a href="up.action.php?id_affaire='.$this->id_affaire.'" class="otherlink green">A</a></div><td>
			
			
			</form></div>
			';
			}
		}
		
		if($mode=='admin'){
			echo'
			<p><a href="add_up.affaire.php?id_utilisateur='.$id_utilisateur.'" class="pagelink modalbox">Ajouter une affaire</a></p>';
			
			$req="select id_affaire from affaire where etape!='0' order by etape";
			$rs = mysql_query($req);
			$li=0;	
			while ($a = mysql_fetch_object($rs)){
				$this->load($a->id_affaire);
				if($li==0){
					echo'
					<a name="'.$this->etape($this->etape).'"></a><p class="info">Affaire en étape <strong>'.$this->etape($this->etape).'</strong></p>
					<div class="tableau">
						<div class="titre">
							<div class="cell w250">Intitule</div>
							<div class="cell w180">Compte</div>
							<div class="cell w70">MB</div>
							<div class="cell w100">MB perf</div>
							<div class="cell w120">&Eacute;tape</div>
							<div class="cell w100">D&eacute;but</div>
							<div class="cell w40"></div>
							<div class="cell w40"></div>
						</div>';
				}
				if($li>0 && $chgttab!=$this->etape){
					echo'
					</div>
					
					<br />
					<a href="#top" class="tothetop">Haut de page</a>
					<br />
					
					<a name="'.$this->etape($this->etape).'"></a><p class="info">Affaire en étape <strong>'.$this->etape($this->etape).'</strong></p>
					<div class="tableau">
						<div class="titre">
							<div class="cell w250">Intitule</div>
							<div class="cell w180">Compte</div>
							<div class="cell w70">MB</div>
							<div class="cell w100">MB perf</div>
							<div class="cell w120">&Eacute;tape</div>
							<div class="cell w100">D&eacute;but</div>
							<div class="cell w40"></div>
							<div class="cell w40"></div>
						</div>';
						$li=0;
				}
				// check etape pour afficher ou non la checklist
				if($this->etape=='1' || $this->etape=='0.8') {
					$checkvisib='visible';
				}
				else {
					$checkvisib='hidden';
				}
				$li=$li%2;
				$li++;
				echo '
				<div class="ligne skin'.$li.'">
				<form method="post" class="ajaxform">
				<div class="cell w250"><input type="text" value="'.$this->intitule.'" maxlength="50" name="intitule" /></div>';
			
				// recherche du compte associé à l\'id compte
				$c = new compte();
				$c->load($this->id_compte);
				echo'
				<div class="cell w180">'.$c->compte.'</div>
				<div class="cell w70"><input type="text" value="'.$this->ca.'" maxlength="50" name="ca" style="width:50px;" /></div>
				<div class="cell w100"><input type="text" value="'.$this->ca_performance.'" maxlength="50" name="ca_performance" style="width:50px;" /></div>
				<div class="cell w120">
					<select name="etape" onblur="javascript:savebutton_check('.$this->id_affaire.')">
						<option value="0" '.$this->etapeSelect($this->etape,'0').'>Perdue</option>
						<option value="0.1" '.$this->etapeSelect($this->etape,'0.1').'>Ouverture</option>
						<option value="0.15" '.$this->etapeSelect($this->etape,'0.15').'>Brief</option>
						<option value="0.3" '.$this->etapeSelect($this->etape,'0.3').'>Proposition</option>
						<option value="0.5" '.$this->etapeSelect($this->etape,'0.5').'>N&eacute;gociation</option>
						<option value="0.8" '.$this->etapeSelect($this->etape,'0.8').'>Conclusion</option>
						<option value="0.9" '.$this->etapeSelect($this->etape,'0.9').'>Ordre</option>
						<option value="1" '.$this->etapeSelect($this->etape,'1').'>Gagn&eacute;e</option>
					</select>
				</div>
				<div class="cell w100"><input type="text" class="date-pick" value="'.$this->debut.'" maxlength="10" name="debut" /></div>
				<input name="id_affaire" type="hidden" value="'.$this->id_affaire.'">
				<input name="id_compte" type="hidden" value="'.$this->id_compte.'">
				<input name="id_utilisateur" type="hidden" value="'.$this->id_utilisateur.'">
				<input type="hidden" name="action" value="save"/>
		<div class="cell w40"><a href="add_up.affaire_details.php?id_affaire='.$this->id_affaire.'" class="otherlink blue modalbox_details">D</a></div>
		<div class="cell w40"><a href="up.action.php?id_affaire='.$this->id_affaire.'" class="otherlink green">A</a></div><td>
		
		
		</form></div>
		';
				/*
				SELECTION POUR LISTE COMPTE
				<select name="id_compte">
				$req2="select * from compte where id_utilisateur='".$id_utilisateur."'";
				$rs2 = mysql_query($req2);
				while ($co = mysql_fetch_object($rs2)){
					echo'<option value="'.$co->id_compte.'" '.$this->compteSelect($co->id_compte,$this->id_compte).'>'.$co->compte.'</option>';
				}	</select>
				
				LIENCHECKLIST
				<div class="cell w70"><span id="check'.$this->id_affaire.'" style="visibility:'.$checkvisib.';"><a href="#" onclick="popup(\'add_up.affaire_checklist.php?id_affaire='.$this->id_affaire.'\',1100,450);">checklist</a></div>
				lien supprimer
				<td><a href="?action=del_affaire&amp;id_affaire='.$this->id_affaire.'">supprimer</a></td></tr>
								
				modifier -> détails				
				echo'
					<td><a href="#" onclick="popup(\'add_up.affaire.php?id_affaire='.$this->id_affaire.'\',500,450);">modifier</a></td>
					<td><a href="?action=del_affaire&amp;id_affaire='.$this->id_affaire.'">supprimer</a></td></tr>';

				echo '
				<tr>
				<td></td>
				<td></td>
				<td class="etape">&Eacute;tape(s)</td>
				<td class="etape">CA pond&eacute;r&eacute;</td>
				<td class="etape"></td>
				<td class="etape"></td>
				</tr>
				';
				*/
		
				// chargement des etapes associées à l'affaire
				$req2="select id_etape from etape where id_affaire='".$this->id_affaire."' order by etape.id_etape asc";
				$rs2 = mysql_query($req2);
				$i=1;
				while ($o = mysql_fetch_object($rs2)){
					$e = new etape();
					$e->load($o->id_etape);
					/*
					echo '
					<tr>
					<td></td>
					<td></td>
					<td>&eacute;tape '.$i++.'</td>
					<td>'.$e->ca_pondere.'</td>
					<td><a href="#" onclick="popup(\'add_up.etape.php?id_affaire='.$this->id_affaire.'&id_etape='.$e->id_etape.'\',500,450);">modifier</a></td>
					<td><a href="?action=del_etape&amp;id_etape='.$e->id_etape.'">supprimer</a></td>
					</tr>';
					*/
				}
				/*
				echo '
				<tr>
				<td></td>
				<td></td>
				<td colspan="2"><a href="#" onclick="popup(\'add_up.etape.php?id_affaire='.$this->id_affaire.'\',500,450);">ajouter une &eacute;tape</a><br /><br /></td>
				<td></td>
				<td></td>
				</tr>
				';*/
				
				// ecoute pour creation de nouveau tab
				$chgttab=$this->etape;				
			}
			// pour etape perdu (=0)
			
			$req="select id_affaire from affaire where etape='0' order by etape";
				$rs = mysql_query($req);
				$li=0;	
				while ($a = mysql_fetch_object($rs)){
					$this->load($a->id_affaire);
					if($li==0){
						echo'
						</div>
					
					<br />
					<a href="#top" class="tothetop">Haut de page</a>
					<br />
						<a name="'.$this->etape($this->etape).'"></a><p class="info">Affaire en étape <strong>'.$this->etape($this->etape).'</strong></p>
						<div class="tableau">
							<div class="titre">
								<div class="cell w250">Intitule</div>
								<div class="cell w180">Compte</div>
								<div class="cell w70">MB</div>
								<div class="cell w100">MB perf</div>
								<div class="cell w120">&Eacute;tape</div>
								<div class="cell w100">D&eacute;but</div>
								<div class="cell w40"></div>
								<div class="cell w40"></div>
							</div>';
					}
			$li=$li%2;
					$li++;
					echo '
					<div class="ligne skin'.$li.'">
					<form method="post" class="ajaxform">
					<div class="cell w250"><input type="text" value="'.$this->intitule.'" maxlength="50" name="intitule" /></div>';
				
					// recherche du compte associé à l\'id compte
					$c = new compte();
					$c->load($this->id_compte);
					echo'
					<div class="cell w180">'.$c->compte.'</div>
					<div class="cell w70"><input type="text" value="'.$this->ca.'" maxlength="50" name="ca" style="width:50px;" /></div>
					<div class="cell w100"><input type="text" value="'.$this->ca_performance.'" maxlength="50" name="ca_performance" style="width:50px;" /></div>
					<div class="cell w120">
						<select name="etape" onblur="javascript:savebutton_check('.$this->id_affaire.')">
							<option value="0" '.$this->etapeSelect($this->etape,'0').'>Perdue</option>
							<option value="0.1" '.$this->etapeSelect($this->etape,'0.1').'>Ouverture</option>
							<option value="0.15" '.$this->etapeSelect($this->etape,'0.15').'>Brief</option>
							<option value="0.3" '.$this->etapeSelect($this->etape,'0.3').'>Proposition</option>
							<option value="0.5" '.$this->etapeSelect($this->etape,'0.5').'>N&eacute;gociation</option>
							<option value="0.8" '.$this->etapeSelect($this->etape,'0.8').'>Conclusion</option>
							<option value="0.9" '.$this->etapeSelect($this->etape,'0.9').'>Ordre</option>
							<option value="1" '.$this->etapeSelect($this->etape,'1').'>Gagn&eacute;e</option>
						</select>
					</div>
					<div class="cell w100"><input type="text" class="date-pick" value="'.$this->debut.'" maxlength="10" name="debut" /></div>
					<input name="id_affaire" type="hidden" value="'.$this->id_affaire.'">
					<input name="id_compte" type="hidden" value="'.$this->id_compte.'">
					<input name="id_utilisateur" type="hidden" value="'.$this->id_utilisateur.'">
					<input type="hidden" name="action" value="save"/>
			<div class="cell w40"><a href="add_up.affaire_details.php?id_affaire='.$this->id_affaire.'" class="otherlink blue modalbox_details">D</a></div>
			<div class="cell w40"><a href="up.action.php?id_affaire='.$this->id_affaire.'" class="otherlink green">A</a></div><td>
			
			
			</form></div>
			';
			}
		}
				
		/*
		
		!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
								tab admin temporairement desactivé
		!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		
		*/
		
		
		// MODE ADMIN
		if($mode=='adminplouf'){
			echo'
			<p><a href="add_up.affaire.php?id_utilisateur='.$id_utilisateur.'" class="pagelink modalbox">Ajouter une affaire</a></p>';
		
			echo'
			<table class="tableau" id="thattableau">
			<thead class="titre">
					<th>Cr&eacute;&eacute; le</th>
					<th>Suivi par</th>
					<th>Intitule</th>
					<th>Compte</th>
					<th>MB</th>
					<th>&Eacute;tape</th>
					<th>MB pond&eacute;r&eacute;</th>
					<td></td>
					<td></td>
			</thead>
			<tbody>';
			
			$req="select * from affaire order by id_utilisateur, id_affaire desc";
			$rs = mysql_query($req);
			$li=0;
			while ($a = mysql_fetch_object($rs)){
				$li=$li%2;
				$li++;
				$this->load($a->id_affaire);
				echo '
				<tr class="ligne skin'.$li.'">';
                $u= new utilisateur();
				$u->load_by_id($this->id_utilisateur);
				echo'
				<td>'.$this->date_creation.'</td>
				<td>'.$u->nom.'</td>
				<td>'.$this->intitule.'</td>';
				
				// recherche du compte associé à l'id compte
				$c = new compte();
				$c->load($this->id_compte);
				echo'
				<td>'.$c->compte.'</td>
				<td>'.$this->ca.'</td>
				<td>'.$this->etape($this->etape).'</td>
				<td>'.$this->ca*$this->etape.'</td>
				';
				echo'
					<td><a href="add_up.affaire_details.php?id_affaire='.$this->id_affaire.'" class="otherlink blue modalbox_details">d&eacute;tails</a></td>
					<td><a href="up.action.php?id_affaire='.$this->id_affaire.'">action</a></td>';
		
		/*
		if($this->etape=='1' || $this->etape=='0.8'){
		echo '<a href="#" onclick="popup(\'add_up.affaire_checklist.php?id_affaire='.$this->id_affaire.'\',700,450);">checklist</a>';
		}
		*/
		
		echo'</tr>';
				/* modifier -> détails				
				echo'
					<td><a href="#" onclick="popup(\'add_up.affaire.php?id_affaire='.$this->id_affaire.'\',500,450);">modifier</a></td>
					<td><a href="?action=del_affaire&amp;id_affaire='.$this->id_affaire.'">supprimer</a></td></tr>';
				*/
		
				/*
				echo '
				<tr>
				<td></td>
				<td></td>
				<td class="etape">&Eacute;tape(s)</td>
				<td class="etape">CA pond&eacute;r&eacute;</td>
				<td class="etape"></td>
				<td class="etape"></td>
				</tr>
				';
				*/
		
				// chargement des etapes associées à l'affaire
				$req2="select id_etape from etape where id_affaire='".$this->id_affaire."' order by etape.id_etape asc";
				$rs2 = mysql_query($req2);
				$i=1;
				while ($o = mysql_fetch_object($rs2)){
					$e = new etape();
					$e->load($o->id_etape);
					/*
					echo '
					<tr>
					<td></td>
					<td></td>
					<td>&eacute;tape '.$i++.'</td>
					<td>'.$e->ca_pondere.'</td>
					<td><a href="#" onclick="popup(\'add_up.etape.php?id_affaire='.$this->id_affaire.'&id_etape='.$e->id_etape.'\',500,450);">modifier</a></td>
					<td><a href="?action=del_etape&amp;id_etape='.$e->id_etape.'">supprimer</a></td>
					</tr>';
					*/
				}
				/*
				echo '
				<tr>
				<td></td>
				<td></td>
				<td colspan="2"><a href="#" onclick="popup(\'add_up.etape.php?id_affaire='.$this->id_affaire.'\',500,450);">ajouter une &eacute;tape</a><br /><br /></td>
				<td></td>
				<td></td>
				</tr>
				';*/
			}		
			echo'</tbody></table>';
		}
	}
	
}

?>
