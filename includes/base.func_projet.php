<?php

// fonctions propres au projet

	function timestamp(){
		return date('Y').'-'.date('m').'-'.date('d');
	}
	function timestampFR(){
		return date('d').'/'.date('m').'/'.date('Y');
	}
	function getCurrentWeek(){
		return strftime("%W");
	}
	function getCurrentMonth(){
		return strftime("%m");
	}
	function getCurrentYear(){
		return strftime("%Y");
	}
	function getPrevWeek(){
		return getCurrentWeek()-1;
	}
	function getAffaireMonth($debut){
		$m=$debut-1;
		$d = array();
		for($i=0;$i<24;$i++){
			$m=$m%12;
			$c=$m+1;
			array_push($d,$c);
			$m++;
		}
		return $d;
	}
	function setMonthName($month){
		switch($month)
		{
		case '01': $MonthName='Janvier'; break;
		case '02': $MonthName='Fevrier'; break;
		case '03': $MonthName='Mars'; break;
		case '04': $MonthName='Avril'; break;
		case '05': $MonthName='Mai'; break;
		case '06': $MonthName='Juin'; break;
		case '07': $MonthName='Juillet'; break;
		case '08': $MonthName='Aout'; break;
		case '09': $MonthName='Septembre'; break;
		case '10': $MonthName='Octobre'; break;
		case '11': $MonthName='Novembre'; break;
		case '12': $MonthName='Decembre'; break;
		default: echo 'mois';
		}
		return $MonthName;
	}
	function monthFromTimestamp($d){
		if($d!=''){
		$monthFromTimestamp=explode('/',$d);
		return (int)$monthFromTimestamp[1];
		}
	}
	function yearFromTimestamp($d){
		if($d!=''){
		$monthFromTimestamp=explode('/',$d);
		return (int)$monthFromTimestamp[2];
		}
	}
	function timestampTOfr($d){
		if($d!=''){
		$timestampTOfr=explode('-',$d);
		return $timestampTOfr[2].'/'.$timestampTOfr[1].'/'.$timestampTOfr[0];
		}
	}
	function frTOtimestamp($d){
		if($d!=''){
			$timestampTOfr=explode('/',$d);
			return $timestampTOfr[2].'-'.$timestampTOfr[1].'-'.$timestampTOfr[0];
		}
	}
	
	function datefrTOunixtimestamp($d){
		if($d!=''){
			$timestampTOfr=explode('/',$d);
			return mktime(0, 0, 0, $timestampTOfr[1], $timestampTOfr[0],  $timestampTOfr[2]);
		}
	}
	
?>