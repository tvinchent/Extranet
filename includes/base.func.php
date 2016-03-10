<?php
	function openDB(){
		$database = mysql_connect(HOST,USER,PWD);
		mysql_select_db(DB_NAME);
		return $database;
	}
	
	function closeDB($database){
		mysql_close($database);
	}
	
	function Select($bddco,$curco){
		if($bddco==$curco){
			$coselected="selected='selected'";
		}
		else{
			$coselected="";
		}
		return $coselected;
	}
	
	function Check($bddco,$curco){
		if($bddco==$curco){
			$cochecked="checked='checked'";
		}
		else{
			$cochecked="";
		}
		return $cochecked;
	}
	
	function Checkit($bddco,$curco){
		if($bddco==$curco){
			$cochecked=" checked";
		}
		else{
			$cochecked="";
		}
		return $cochecked;
	}
?>