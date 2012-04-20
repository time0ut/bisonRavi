/* generated javascript */
var skin = 'monobook';
var stylepath = '/w/skins';

/* MediaWiki:Common.js */
/* <pre> */

/**********************
*** Quality indicators on "article" tab
*** by [[user:ThomasV]]
**********************/
// return src for icon given percentage
function icon_src(t){
	var src='http://wikilivres.info/w/images/';
	switch(t){
		case '0%': src+='8/8f/00%25.png'; break;
		case '25%': src+='5/5b/25%25.png'; break;
		case '50%': src+='3/3a/50%25.png'; break;
		case '75%': src+='c/cd/75%25.png'; break;
		case '100%': src+='6/64/100%25.png'; break;
		case "Validated": src=+'b/b7/Etoile.png'; break;
	} 
	return src;
}
 
// add indicator
function pageQuality() {
	var a = document.getElementById('ca-nstab-main');
	if(!a) return;
 
	var pr_index = document.getElementById('pr_index');
	if(pr_index) return;
 
	var q = document.getElementById('textquality');
	if(q) {
		var new_img = document.createElement('img');
		new_img.setAttribute('src', icon_src(q.className));
		a.firstChild.appendChild(new_img);
	}
 
	for(var i=0; spanElem = document.getElementsByTagName('span')[i]; i++) {
		if (spanElem.className == 'pagequality')  {
			var new_img = document.createElement('img');
			new_img.setAttribute('src', icon_src(spanElem.title));
 
			if(wgCanonicalNamespace == 'Page') {
				a.firstChild.appendChild(new_img);
			}
			else {
				s1 = spanElem.parentNode.previousSibling;
				opttext = s1.firstChild.firstChild;
				img = opttext.firstChild.nextSibling.nextSibling.nextSibling;
				next = img.nextSibling;
				opttext.removeChild(img);
				opttext.insertBefore(new_img,next);
			}
		}
	}
}
addOnloadHook(pageQuality);


/* configure */
self.proofreadpage_add_container = true;
self.proofreadpage_disable_wheelzoom = false;
 
importScriptURI('http://wikisource.org/w/index.php?title=MediaWiki:Base.js&action=raw&ctype=text/javascript');
importScriptURI('http://wikisource.org/w/index.php?title=MediaWiki:PageNumbers.js&action=raw&ctype=text/javascript');
importScriptURI('http://wikisource.org/w/index.php?title=MediaWiki:DisplayFooter.js&action=raw&ctype=text/javascript');
importScriptURI('http://wikisource.org/w/index.php?title=MediaWiki:IndexForm.js&action=raw&ctype=text/javascript');


/********************************************
*** New buttons on toolbar box
*** by [[user:ThomasV]]
********************************************/

function addCustomButton(imageFile, speedTip, tagOpen, tagClose, sampleText) {
      mwCustomEditButtons[mwCustomEditButtons.length] =
         {"imageFile": imageFile,
          "speedTip": speedTip,
          "tagOpen": tagOpen,
          "tagClose": tagClose,
          "sampleText": sampleText};
}

addCustomButton('http://upload.wikimedia.org/wikipedia/commons/3/30/Btn_toolbar_rayer.png','Rayer','<s>','</s>','');
addCustomButton('http://upload.wikimedia.org/wikipedia/commons/8/88/Btn_toolbar_enum.png','Énumération','\\n# élément 1\\n# élément 2\\n# élément 3','','');
addCustomButton('http://upload.wikimedia.org/wikipedia/commons/1/11/Btn_toolbar_liste.png','Liste','\\n* élément A\\n* élément B\\n* élément C','','');
addCustomButton('http://upload.wikimedia.org/wikipedia/commons/8/8f/Button_poeme.png','Poésie','<poem>\\n\\n','\\n</poem>','');
addCustomButton('http://upload.wikimedia.org/wikipedia/commons/9/9e/Btn_toolbar_gallery.png','Galerie Photo','<gallery>\\n','\\n</gallery>','');
addCustomButton('http://upload.wikimedia.org/wikipedia/commons/3/37/Btn_toolbar_commentaire.png','Commentaire','<!--','-->','Insérer votre commentaire');
addCustomButton('http://upload.wikimedia.org/wikipedia/commons/c/c8/Button_redirect.png','Redirection','#REDIRECT \[\[','\]\]','nom de la destination');
addCustomButton('http://upload.wikimedia.org/wikipedia/commons/b/b4/Button_category03.png','Catégorie','\[\[Catégorie:','\]\]','nom de la catégorie');
addCustomButton('http://upload.wikimedia.org/wikipedia/commons/5/5f/Button_center.png','Texte centré','<center>','</center>','');
addCustomButton('http://upload.wikimedia.org/wikipedia/en/e/e9/Button_headline2.png','paragraphe niveau 3','===','===','');
addCustomButton('http://upload.wikimedia.org/wikipedia/en/8/8e/Button_shifting.png', 'Insérer un retrait',':','',':' );
addCustomButton('http://upload.wikimedia.org/wikipedia/en/5/58/Button_small.png','Texte plus petit','<small>','</small>','');
addCustomButton('http://upload.wikimedia.org/wikipedia/en/8/80/Button_upper_letter.png','Exposant','<sup>','</sup>','');
addCustomButton('http://upload.wikimedia.org/wikipedia/commons/4/4b/Button_nbsp.png','Espace insécable','&nbsp\;','','');
addCustomButton('http://upload.wikimedia.org/wikipedia/en/9/93/Button_sub_link.png','Lien vers sous-titre','\[\[Page\#','\]\]','Sub_page' );
addCustomButton('http://upload.wikimedia.org/wikipedia/en/f/fd/Button_blockquote.png','Block quote','<blockquote style=&quot;border: 1px solid blue; padding: 2em;&quot;>\\n','\\n</blockquote>','Block quote');
addCustomButton('http://upload.wikimedia.org/wikipedia/en/1/13/Button_enter.png','Aller à la ligne','<br />','','');
addCustomButton('http://upload.wikimedia.org/wikipedia/commons/4/4b/Button_class_text.png', 'Paragraphe texte','<div class=\'text\'>\\n\\n','\\n</div>','');
addCustomButton('http://upload.wikimedia.org/wikipedia/commons/7/78/Button_titre.png','Titre de page','\{\{Titre\|','\|\|\}\}','');
addCustomButton('http://upload.wikimedia.org/wikipedia/commons/0/03/Button_chapitre.png','Titre de Chapitre','\{\{chapitre\|livre=','\|auteur=\|nrpartie=\|nrchapitre=\|TitreChapitre=\|commentaires=\}\}','');
addCustomButton('http://upload.wikimedia.org/wikipedia/commons/c/c4/Button_ref.png','Ajoute une référence','<ref>','</ref>','');
addCustomButton('http://upload.wikimedia.org/wikipedia/commons/6/64/Buttonrefvs8.png','Liste des références','<references />','','');
addCustomButton('http://upload.wikimedia.org/wikipedia/commons/c/c3/Button_travaux.png','Relecture','\{\{subst:Infoédit\|1=','\|2= \|3= \|4= \|5= \|6= \}\}','');



/********************************************
*** Copyright tab
*** by [[user:ThomasV]]
********************************************/

function ongletCopyright() {  // id created by Template:Licence. It should match Template:Licence parameters
        var a = document.getElementById("p-cactions");
        if (a) 
        {
          b = a.getElementsByTagName("ul");
          if(b.length > 0)
          {
            if(document.getElementById("Creative Commons by-nc-sa"))
              { b[0].innerHTML = b[0].innerHTML 
                + '<li id="ca-nstab-user">'
                + '<a href="http://fr.wikisource.org/wiki/Wikisource:Creative_Commons_by-nc-sa">'   // /wiki/Wikilivres:Creative Commons by-nc-sa
                + 'Copyright</a></li>';
              }
            else if(document.getElementById("Copyright-ONU"))
              { b[0].innerHTML = b[0].innerHTML 
                + '<li id="ca-nstab-user">'
                + '<a href="http://fr.wikisource.org/wiki/Wikisource:Copyright-ONU">'   // /wiki/Wikilivres:Copyright-ONU
                + 'Copyright</a></li>';
              }
            else if(document.getElementById("Copyright-UNESCO"))
              { b[0].innerHTML = b[0].innerHTML 
                + '<li id="ca-nstab-user">'
                + '<a href="http://fr.wikisource.org/wiki/Wikisource:Copyright-UNESCO">'  // /wiki/Wikilivres:Copyright-UNESCO
                + 'Copyright</a></li>';
              }
            else if(document.getElementById("GFDL"))
              { b[0].innerHTML = b[0].innerHTML 
                + '<li id="ca-nstab-user">'
                + '<a href="http://fr.wikisource.org/wiki/Wikisource:Licence_GFDL">'  // /wiki/Wikilivres:Licence GFDL
                + 'Copyright</a></li>';
              }
          }
        }
}
      
addOnloadHook(ongletCopyright);



/*****************************************************************
*** Edittools: Menu for selecting subsets of special characters
*** 
******************************************************************/

function addCharSubsetMenu() {   // the options should match MediaWiki:Edittools
  var specialchars = document.getElementById('specialchars');

  if (specialchars) {
    var menu = "<select style=\"display:inline\" onChange=\"chooseCharSubset(selectedIndex)\">";
    menu += "<option>Wiki</option>";
    menu += "<option>Latin</option>";
    menu += "<option>Grec</option>";
    menu += "<option>Cyrillique</option>";
    menu += "<option>AHD</option>";
    menu += "<option>Allemand</option>";
    menu += "<option>Catalan</option>";
    menu += "<option>Croate</option>";
    menu += "<option>Espagnol</option>";
    menu += "<option>Espéranto</option>";
    menu += "<option>Estonien</option>";
    menu += "<option>Gallois</option>";
    menu += "<option>Hawaien</option>";
    menu += "<option>Hiéroglyphe</option>";
    menu += "<option>Islandais</option>";
    menu += "<option>Italien</option>";
    menu += "<option>Maltais</option>";
    menu += "<option>Pinyin</option>";
    menu += "<option>Polonais</option>";
    menu += "<option>Portugais</option>";
    menu += "<option>Rōmaji</option>";
    menu += "<option>Roumain</option>";
    menu += "<option>Scandinave</option>";
    menu += "<option>Serbe</option>";
    menu += "<option>Tchèque</option>";
    menu += "<option>Vieil anglais</option>";
    menu += "<option>Vietnamien</option>";
    menu += "<option>API</option>";
    menu += "</select>";
    specialchars.innerHTML = menu + specialchars.innerHTML;

    /* default subset - try to use a cookie some day */
    chooseCharSubset(0);
  }
}

/* select subsection of special characters */
function chooseCharSubset(s) {
  var l = document.getElementById('specialchars').getElementsByTagName('p');
  for (var i = 0; i < l.length ; i++) {
    l[i].style.display = i == s ? 'inline' : 'none';
    l[i].style.visibility = i == s ? 'visible' : 'hidden';
  }
}

addOnloadHook(addCharSubsetMenu);



/*****************************************************************
*** interwikiExtra
*** by [[user:ThomasV]]
******************************************************************/

function interwikiExtra() 
{
   // iterate over all <span>-elements
   for(var i=0; a = document.getElementsByTagName("span")[i]; i++) {
      // if found a linkInfo span
      if(a.className == "interwiki-info") {  // class created by Template:Interwiki-info
         // iterate over all <li>-elements
         var count=0;
         
         for(var j=0; b = document.getElementsByTagName("li")[j]; j++) {
            if(b.className == "interwiki-" + a.id) {
               b.innerHTML = b.innerHTML + " "+a.title;
               if(a.title == "(vo)") { b.title = "Original Text"; }
            }
         else if(b.className == "interwiki-" + a.id.substr(0,a.id.length-1)) {
               count = count+1;
               if(a.id.charAt(a.id.length-1) == count) {
                  b.innerHTML = b.innerHTML + " "+a.title;
               }
            }
         }
      }
      if(a.className == "OtherVersion") {   // class created by Template:OtherVersion (Modèle:AutreVersion in fr.ws)
         p = a.title.indexOf("|");
         pvers = document.getElementById("p-version");
         if (pvers == null) {
           c = document.getElementById("column-one");
           c.innerHTML = c.innerHTML
             + "<div class=\"portlet\" id=\"p-version\">"
             + "<h5>Other versions</h5>"
             + "<div class=\"pBody\">"
             + "<ul>"
             + "</ul>"
             + "</div>";
             pvers = document.getElementById("p-version");
           }
           e = pvers.getElementsByTagName("ul")[0]; 
           e.innerHTML = e.innerHTML 
             + "<li class=\"\"><a href='" 
             + a.title.substr(0,p)
             + "'>" + a.title.substr(p+1,a.title.length-1)+ "</a> " +"</li>";
      }
   }
}

addOnloadHook(interwikiExtra);



/*****************************************************************
*** footnotes as tooltip
*** from it.wikipedia.org
*** inserted by [[user:-jkb-]]
******************************************************************/

addOnloadHook ( function ()
{
 sups = document.getElementsByTagName("sup");
 for (i=0; i<sups.length; i++)
 {
   note_id = sups[i].childNodes[0].href;
   if (note_id && (note_id.indexOf("#") != -1))
   {
     note_id = document.getElementById(note_id.substr(note_id.indexOf("#")+1));
     if (note_id)
       if (document.all) 
       { 
           sups[i].title = note_id.innerText; 
           sups[i].childNodes[0].title = note_id.innerText; 
       } 
       else 
       { 
           sups[i].title = note_id.textContent; 
      }
   }
 }
})




/* </pre> */

/* MediaWiki:Monobook.js */
/* <pre> */

/* tooltips and access keys */
ta = new Object();
ta['pt-userpage'] = new Array('.','My user page');
ta['pt-anonuserpage'] = new Array('.','The user page for the ip you\'re editing as');
ta['pt-mytalk'] = new Array('n','My talk page');
ta['pt-anontalk'] = new Array('n','Discussion about edits from this ip address');
ta['pt-preferences'] = new Array('','My preferences');
ta['pt-watchlist'] = new Array('l','The list of pages you\'re monitoring for changes.');
ta['pt-mycontris'] = new Array('y','List of my contributions');
ta['pt-login'] = new Array('o','You are encouraged to log in, it is not mandatory however.');
ta['pt-anonlogin'] = new Array('o','You are encouraged to log in, it is not mandatory however.');
ta['pt-logout'] = new Array('o','Log out');
ta['ca-talk'] = new Array('t','Discussion about the content page');
ta['ca-edit'] = new Array('e','You can edit this page. Please use the preview button before saving.');
ta['ca-addsection'] = new Array('+','Add a comment to this discussion.');
ta['ca-viewsource'] = new Array('e','This page is protected. You can view its source.');
ta['ca-history'] = new Array('h','Past versions of this page.');
ta['ca-protect'] = new Array('=','Protect this page');
ta['ca-delete'] = new Array('d','Delete this page');
ta['ca-undelete'] = new Array('d','Restore the edits done to this page before it was deleted');
ta['ca-move'] = new Array('m','Move this page');
ta['ca-watch'] = new Array('w','Add this page to your watchlist');
ta['ca-unwatch'] = new Array('w','Remove this page from your watchlist');
ta['search'] = new Array('f','Search this wiki');
ta['p-logo'] = new Array('','Main Page');
ta['n-mainpage'] = new Array('z','Visit the Main Page');
ta['n-portal'] = new Array('','About the project, what you can do, where to find things');
ta['n-currentevents'] = new Array('','Find background information on current events');
ta['n-recentchanges'] = new Array('r','The list of recent changes in the wiki.');
ta['n-randompage'] = new Array('x','Load a random page');
ta['n-help'] = new Array('','The place to find out.');
ta['n-sitesupport'] = new Array('','Support us');
ta['t-whatlinkshere'] = new Array('j','List of all wiki pages that link here');
ta['t-recentchangeslinked'] = new Array('k','Recent changes in pages linked from this page');
ta['feed-rss'] = new Array('','RSS feed for this page');
ta['feed-atom'] = new Array('','Atom feed for this page');
ta['t-contributions'] = new Array('','View the list of contributions of this user');
ta['t-emailuser'] = new Array('','Send a mail to this user');
ta['t-upload'] = new Array('u','Upload images or media files');
ta['t-specialpages'] = new Array('q','List of all special pages');
ta['ca-nstab-main'] = new Array('c','View the content page');
ta['ca-nstab-user'] = new Array('c','View the user page');
ta['ca-nstab-media'] = new Array('c','View the media page');
ta['ca-nstab-special'] = new Array('','This is a special page, you can\'t edit the page itself.');
ta['ca-nstab-wp'] = new Array('a','View the project page');
ta['ca-nstab-image'] = new Array('c','View the image page');
ta['ca-nstab-mediawiki'] = new Array('c','View the system message');
ta['ca-nstab-template'] = new Array('c','View the template');
ta['ca-nstab-help'] = new Array('c','View the help page');
ta['ca-nstab-category'] = new Array('c','View the category page');


/* </pre> */
	/***
	*Expressions régulières
	*Auteur: ThomasV, Pathoschild
	*Note : cet outil utilise la syntaxe javascript : on utilise $ (et pas \) pour appeler un groupe dans la chaîne de remplacement.
	*Tutoriel : http://www.regular-expressions.info/tutorial.html
	****/

	/* create form */
	function custom() {

		/* if already open */
		if(document.getElementById('regexform')) customremove()
		else {	
                        editbox = document.getElementById('wpTextbox1');
			/* container */
			regexform = document.createElement('div');
			regexform.setAttribute('id','regexform');
			editbox.parentNode.insertBefore(regexform,editbox.parentNode.firstChild);

			/* form tag */
			var formform = document.createElement('form');
			formform.setAttribute('id','regexformform');
			formform.setAttribute('onSubmit','customgo(); return false;');
			regexform.appendChild(formform);
	
			// add input boxes
		        var newinput = document.createElement('input');
		        newinput.setAttribute('id','formsearch');
		        newlabel = document.createElement('label');
		        newlabel.setAttribute('for','formsearch');
			newlabel.appendChild(document.createTextNode("Remplacer "));

			formform.appendChild(newlabel);
			formform.appendChild(newinput);
		
			var newinput = document.createElement('input');
			newinput.setAttribute('id','formreplace');
			newlabel = document.createElement('label');
			newlabel.setAttribute('for','formreplace');
			newlabel.appendChild(document.createTextNode(' par '));
		
			formform.appendChild(newlabel);
			formform.appendChild(newinput);

			// go! link
			var go_button = document.createElement('input');
			go_button.setAttribute('type',"submit");
			go_button.setAttribute('title',"go!");
			go_button.setAttribute('value',"go!");
			formform.appendChild(go_button);

		}
	}
	


	/* run patterns */
	function customgo() {
		/* get search and replace strings */

                search = document.getElementById('formsearch').value;
		search = search.replace(/\\n/g, '\n');

                replace = document.getElementById('formreplace').value;
		replace = replace.replace(/\\n/g, '\n');

		/* convert input to regex */

		// without delimiters
		if(!search.match(/^\s*\/[\s\S]*\/[a-z]*\s*$/i)) {
			search = new RegExp(search,'g');
		}
		// with delimiters
		else {
			// break into parts
			var regpattern = search.replace(/^\s*\/([\s\S]*)\/[a-z]*\s*$/i,'$1');
			var regmodifiers = search.replace(/^\s*\/[\s\S]*\/([a-z]*)\s*$/,'$1');
			// filter invalid flags
			regmodifiers = regmodifiers.replace(/[^gim]/ig,'');

			search = new RegExp(regpattern, regmodifiers);
		}

		/* perform */
		editbox.value = editbox.value.replace(search,replace);

	}

	/* remove form */
	function customremove() {
		regexform.parentNode.removeChild(regexform);
		patterncount = -1;
	}


	/*******************
	*** create button
	********************/
        function add_regexp_button(){

             var toolbar = document.getElementById("toolbar");
		  if(toolbar){
			var image = document.createElement("img");
			image.width = 23;
			image.height = 22;
			image.border = 0;
			image.className = "mw-toolbar-editbutton";
			image.style.cursor = "pointer";
			image.alt = "regexp";
			image.title = "Expression régulière";
			image.src = "http://upload.wikimedia.org/wikipedia/commons/a/a0/Button_references_alt.png";
			image.onclick = custom;
			toolbar.appendChild(image);
                 }
       }
       
       addOnloadHook(add_regexp_button)