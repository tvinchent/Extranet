<?php
class etape
{
		
	var $id_etape;
	var $ca_pondere;
	var $id_affaire;
	
	function etape()
	{
			$this->id_etape = "";
			$this->ca_pondere = "";
			$this->id_affaire = "";
	}
	
	function load($id_etape)
	{
		$rs = mysql_query("select * from etape where id_etape='".$id_etape."'");
		if(mysql_num_rows($rs)>0){
			$l = mysql_fetch_object($rs);
			$this->id_etape = $l->id_etape;
			$this->ca_pondere = $l->ca_pondere;
			$this->id_affaire = $l->id_affaire;
		}
	}
	
	function save()
	{
		if($this->id_etape <> ""){
			$str = "update etape set ca_pondere='".$this->ca_pondere."'";
			$str .= " where id_etape=".$this->id_etape;
		}else{
			$str = "insert etape (ca_pondere,id_affaire) ";
			$str .= "values ('".$this->ca_pondere."','".$this->id_affaire."')";
		}
		
		mysql_query($str);
		
		if($this->id_etape == ""){
			$this->id_etape = mysql_insert_id();
		}
		
	}
	
	function delete()
	{
		mysql_query("delete from etape where id_etape=".$this->id_etape);
	}
	
}

?>