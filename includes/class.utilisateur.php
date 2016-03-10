<?php
class utilisateur
{
		
	var $id_utilisateur;
	var $nom;
	
	function utilisateur()
	{
		$this->id_utilisateur = "";
		$this->nom = "";
	}
	
	function load($nom)
	{
		$rs = mysql_query("select * from utilisateur where nom='".$nom."'");
		if(mysql_num_rows($rs)>0){
			$l = mysql_fetch_object($rs);
			$this->id_utilisateur = $l->id_utilisateur;
			$this->nom = $l->nom;
		}
	}
	
	function load_by_id($id)
	{
		$rs = mysql_query("select * from utilisateur where id_utilisateur='".$id."'");
		if(mysql_num_rows($rs)>0){
			$l = mysql_fetch_object($rs);
			$this->id_utilisateur = $l->id_utilisateur;
			$this->nom = $l->nom;
		}
	}
	
}

?>