function popup(page,largeur,hauteur){
	var top=(screen.height-hauteur)/2-20;
	var left=(screen.width-largeur)/2;
	options = 'toolbar=no,directories=no,status=no,scrollbars=yes,resize=no,menubar=no,location=no';
	window.open(page,"","top="+top+",left="+left+",width="+largeur+",height="+hauteur+","+options);
}
function recharge(){
	/*if(window.location.href.indexOf('#')>0){
		uri = window.location.href.substring(0,window.location.href.length-1); 
	}else{
		uri = window.location.href
	}
	window.open(uri,'_self');*/
	window.location.reload();
}
function refresher(){
	opener.recharge();
	window.close();
}