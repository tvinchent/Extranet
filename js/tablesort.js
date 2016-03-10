function compstr(a, b){
	return a<b;
}
function comp(a, b){
	return (a.match(/[0-9]/g))?((a*1>b*1)?true:false):((compstr(a, b))?true:false);
}
function sortH(id, arrayindex){
	//trie les lignes d'un tableau
	var tab=document.getElementById(id);
	var a=tab.childNodes[1];
	var i=0, j, k, l, m;
	l=a.childNodes.length;
	for (i=1;i<l-1;i++){
		for (j=i+1;j<l;j++){
			if (a.childNodes[j].cells){
				if (comp(a.childNodes[j].cells[arrayindex].innerHTML, a.childNodes[i].cells[arrayindex].innerHTML)){
					for (k=0;k<a.childNodes[j].cells.length;k++){
						m=a.childNodes[i].cells[k].innerHTML;
						a.childNodes[i].cells[k].innerHTML=a.childNodes[j].cells[k].innerHTML;
						a.childNodes[j].cells[k].innerHTML=m;
					}
				}
			}
		}
	}
}

function sortV(id, arrayindex){
	//trie les colones d'un tableau
	var tab=document.getElementById(id);
	var a=tab.childNodes[1];
	var i=0, j, k, l, m;
	l=a.childNodes[arrayindex].cells.length;
	for (i=1;i<l-1;i++){
		for (j=i+1;j<l;j++){
			if (a.childNodes[j].cells){
				if (comp(a.childNodes[arrayindex].cells[j].innerHTML,a.childNodes[arrayindex].cells[i].innerHTML)){
					for (k=0;k<a.childNodes[arrayindex].cells.length;k++){
						m=a.childNodes[k].cells[i].innerHTML;
						a.childNodes[k].cells[i].innerHTML=a.childNodes[k].cells[j].innerHTML;
						a.childNodes[k].cells[j].innerHTML=m;
					}
				}
			}
		}
	}
}