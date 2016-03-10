<?php
class action
{
	var $id_action;
	var $id_action_type;
	var $createur;	
	var $attribue;
	var $id_affaire;
	var $nom;
	var $avancement;
	var $priorite;
	var $debut;
	var $fin;
	
	function action()
	{
			$this->id_action = "";
			$this->id_action_type = "";
			$this->createur = "";
			$this->attribue = "";
			$this->id_affaire = "";
			$this->nom = "";
			$this->avancement = "";
			$this->priorite = "";
			$this->debut = "";
			$this->fin = "";
	}
	
	function load($id)
	{
		$rs = mysql_query("select * from action where id_action='".$id."'");
		if(mysql_num_rows($rs)>0){
			$l = mysql_fetch_object($rs);
			$this->id_action = $l->id_action;
			$this->createur = $l->createur;
			$this->attribue = $l->attribue;
			$this->id_affaire = $l->id_affaire;
			$this->avancement = $l->avancement;
			$this->priorite = $l->priorite;
			$this->debut = $l->debut;
			$this->fin = timestampTOfr($l->fin);
				$rt = mysql_query("select * from action_type where id_action_type='".$l->id_action_type."'");
				if(mysql_num_rows($rt)>0){
					$t = mysql_fetch_object($rt);
					$this->id_action_type = $t->id_action_type;
					$this->nom = $t->nom;
				}
		}
	}
	
	function save()
	{
		if($this->id_action <> ""){
			$str = "update action set attribue='".$this->attribue."',";
			$str .= "id_affaire='".$this->id_affaire."',";
			$str .= "avancement='".$this->avancement."',";
			$str .= "priorite='".$this->priorite."',";
			$str .= "fin='".frTOtimestamp(urldecode($this->fin))."'";
			$str .= " where id_action=".$this->id_action;
			mysql_query($str);
			
			$strr = "update action_type set nom='".$this->nom."'";
			$strr .= " where id_action_type=".$this->id_action_type;
			mysql_query($strr);
		}
		else{
			$strr = "insert action_type (nom) ";
			$strr .= "values ('".$this->nom."')";
			mysql_query($strr);
			$id_insert=mysql_insert_id();
			
			$str = "insert action (id_action_type,createur,attribue,id_affaire,avancement,priorite,debut,fin) ";
			$str .= "values ('".$id_insert."','".$this->createur."','".$this->attribue."','".$this->id_affaire."','".$this->avancement."','".$this->priorite."','".date("Y-m-d")."','".frTOtimestamp(urldecode($this->fin))."')";
			mysql_query($str);	
		}
		
		if($this->id_action == ""){
			$this->id_action = mysql_insert_id();
		}
		
	}
	
}

?>
