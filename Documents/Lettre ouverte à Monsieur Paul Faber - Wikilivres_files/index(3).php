/**********************
*** Automatically generate page footer from values in {{header}}
*** by [[user:GrafZahl]]
**********************/

 
function DisplayFooter() {
	if(document.getElementById && wgNamespaceNumber==0) {
		if(document.URL.indexOf("match=") > 0 ) return;
		var nofooterElt = document.getElementById('nofooter');
		var hp = document.getElementById('headerprevious');
		var hn = document.getElementById('headernext');
 
		var contentElt = document.getElementById('bodyContent');
		var catlinksElt = document.getElementById('catlinks');
 
		var footerElt = document.createElement('table');
 
                if( (!((contentElt) && (footerElt))) || (!(hp || hn)) || (nofooterElt))	return;
 
		footerElt.setAttribute('class', 'footertemplate');
		footerElt.setAttribute('id', 'footertemplate');
		footerElt.setAttribute('style', 'margin-top:1em; clear:both;');
 
		/* Begin footer HTML code */
		var tr = document.createElement('tr');
		var td = document.createElement('td');
		td.setAttribute('align', 'left');
		td.setAttribute('width', '33%');
 
                if (hp) {
		  fp = hp.cloneNode(true);
		  fp.setAttribute('id', 'footerprevious');
		  td.appendChild(fp);
		}
		tr.appendChild(td);
 
		td = document.createElement('td');
		td.setAttribute('align', 'center');
		td.setAttribute('width', '34%');
		var a = document.createElement('a');
		a.setAttribute('href', '#top');
		var text = document.createTextNode(ws_msg('▲'));
		a.appendChild(text);
		td.appendChild(a);
		tr.appendChild(td);
 
		td = document.createElement('td');
		td.setAttribute('align', 'right');
		td.setAttribute('width', '33%');
 
                if (hn) {
		  var fn = hn.cloneNode(true);
		  fn.setAttribute('id', 'footernext');
		  td.appendChild(fn);
		}
 
		tr.appendChild(td);
 
		footerElt.appendChild(tr);
 
		/* End footer HTML code */
 
                header_template = document.getElementById('headertemplate');		
                if(header_template) {
                    header_template.parentNode.appendChild(footerElt);
                } else {
		    if(catlinksElt) // place footer before category box
		    contentElt.insertBefore(footerElt, catlinksElt);
		    else contentElt.appendChild(footerElt);
                }
	}
}
 
addOnloadHook(DisplayFooter);