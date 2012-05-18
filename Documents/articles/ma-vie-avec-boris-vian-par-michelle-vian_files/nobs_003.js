/*
 * Wousdat / WReport - Nobs - Weborama.com
 * Last update : 2009-02-10
 */
/* Wousdat */
document.write('<iframe src="http://behaviour.nouvelobs.com/wousdat.html" width="1" height="1" style="display:none;"></iframe>');
/* WReport */
/* ------------------ Variables ------------------------- */
var _NB_MAX_CONTENU_ 	= 1;
var _TAILLE_MAX_CONTENU_ = 100;
var _TAILLE_MAX_CHAINE_ = 50;
var _TAILLE_MAX_ALPHANUM_ = 30;
var WEBO_ID_GROUPE 	= 0;

var COOKIE_SEGMENTATION = 'wbo_segment_';

var WRP_ID		= 382236;
var WRP_SECTION		= 'default';
var WRP_SUBSECTION	= 'default';
var WRP_CONTENT;
var WRP_CHANNEL;
var WRP_ACC;

// Definition de l'objet
function wreport_counter(section,subsection,site,frame,channel,section_grp,subsection_grp)
{
	this.site = site;
	this.section;
	this.subsection;
	this.channel = '';
	this.content = '';
	this.nb_content = 0;
	this.url = '';
	this.frame = frame;

	this.traite_url = traite_url;
	this.traite_url();

	if (this.section == null || this.section == '') this.section=section;	
	if (this.subsection == null || this.subsection == '') this.subsection=subsection;
	
	this.segmentation = new Array('','','','','');
	this.profiles = '';
	this.profiling_cookie_mode = 1;
	this.cookie_segmentation = COOKIE_SEGMENTATION;
	this.domaine_segmentation = '';

	this.counter = new Image(1,1);

	/* Methodes */
	this.profiling_cookie_mode = profiling_cookie_mode;
	this.generate_url = generate_url;
	this.add_content = add_content;
	this.add_channel = add_channel;
	this.add_group = add_group;
	this.add_profile = add_profile;
	this.add_profiles = add_profiles;
	this.delete_profiles = delete_profiles;
	this.get_profiles = get_profiles;
	this.count = count;

	/* Initialisation */
	this.section = traite_chaine(this.section,_TAILLE_MAX_ALPHANUM_);
	this.subsection = traite_chaine(this.subsection,_TAILLE_MAX_ALPHANUM_);
	if (channel != null) this.add_channel(channel);
	if (section_grp != null && subsection_grp != null) this.add_group(section_grp,subsection_grp);
	this.cookie_segmentation += site;
}

//traite l url
function traite_url ()
{
	try {
		var str_default = this.section;
		var url_match = window.location.href;

		var url_match_net;
		var expr = /http:\/\/(.+)/;
		var test_reg= expr.exec(url_match);
		if (test_reg == null) url_match_net=url_match;
		else url_match_net =RegExp.$1;
		var pos1_slash = url_match_net.indexOf('/',0);

		if (pos1_slash==-1)
			this.section = url_match_net;
		else {
			var pos_d=pos1_slash+1;
			var pos2_slash = url_match_net.indexOf('/',pos_d);
			this.section = url_match_net.substr(0,pos1_slash);
			if (pos2_slash!=-1) this.subsection = url_match_net.substring(pos_d,pos2_slash);
		}
  		if (this.section.match(/^(\d+)\.(\d+)\.(\d+)\.(\d+)$/) 
		   || this.section.match(/^about:/i)
		   || this.section.match(/^file:/i)
		   || this.section.match(/^https/i)
		   || this.section.match(/^localhost/i)
		   ) {
			this.section = str_default;
			this.subsection = str_default;
		}
		this.section = this.section.replace(/^www\./i, '');
	} catch(e){1;}
}

// Gére la url de comptage
function generate_url ()
{
	var _date_ = new Date();
	this.date = parseInt(_date_.getTime()/1000 - 60*_date_.getTimezoneOffset());
	this.ref = ''+escape(document.referrer);

	this.ta = '0x0';
	this.co = 0;
	this.nav = navigator.appName;

	this.get_profiles();

	if ( parseInt(navigator.appVersion)>=4)
	{
    	this.ta = screen.width+"x"+screen.height;
		this.co = (this.nav!="Netscape")?screen.colorDepth:screen.pixelDepth;
	}
    if((this.frame != null)&&(this.nav!="Netscape"))
    {
    	var reftmp = 'parent.document.referrer';
        if((this.frame<5)&&(this.frame>0)) {
        	for(_k=this.frame;_k>1;_k--) reftmp = 'parent.' + reftmp;
		}
        var mon_ref = eval(reftmp);
        if(document.referrer == parent.location || document.referrer=='') this.ref=''+escape(mon_ref)
	}

    if ( location.protocol == 'https:')
    {
    	this.url = "https://ssl.weborama.fr";
    } else {
    	this.url = "http://wreport.weborama.fr";
    }
	this.url += "/fcgi-bin/comptage_wreport.fcgi?WRP_ID="+this.site;
    if(this.profiles != null)  this.url += "&WRP_PFL="+this.profiles;

	var is_mac=(wf_uaO('mac')!=-1);
	var is_opera=(wf_uaO('opera')!=-1);
	if((!is_mac)&&(!is_opera)) {
		var msieind=navigator.userAgent.indexOf('MSIE');
		if(msieind>0) {
			if(parseInt(navigator.userAgent.charAt(msieind+5))>=5) {
				document.body.addBehavior("#default#clientCaps");
				this.cnx = (document.body.connectionType == 'modem') ? 'A':'B';
				document.body.addBehavior("#default#homePage");
				this.home = (document.body.isHomePage(location.href)) ? 'A':'B';
				this.url+="&CONN="+this.cnx+"&ISHOME="+this.home;
			}
		}
	}
	this.url += "&WRP_SECTION="+this.section+"&WRP_SUBSECTION="+this.subsection;

	if(this.site_grp != null && this.section_grp != null && this.subsection_grp != null)
    {
		this.url+="&WRP_ID_GRP="+this.site_grp+"&WRP_SECTION_GRP="+this.section_grp+"&WRP_SUBSECTION_GRP="+this.subsection_grp;
	}

	if(this.content != null) this.url+="&WRP_CONTENT="+this.content;
	if(this.channel != null) this.url+="&WRP_CHANNEL="+this.channel;

    this.url += "&ver=2&da2="+this.date+"&ta="+this.ta+"&co="+this.co+"&ref="+this.ref;
}

// Realise le comptage
function count()
{
	this.generate_url();
	this.counter.src = this.url;
	return 1;
}

// Ajout de l'information de chaine thétique


function add_channel(chaine)
{
	if (chaine == null || chaine == '') return 0;
	this.channel = traite_chaine(chaine,_TAILLE_MAX_CHAINE_);
	return 1;
}

// Ajout de double comptage option groupe
function add_group (section,subsection)
{
	this.site_grp = WEBO_ID_GROUPE;
	this.section_grp = traite_chaine(section,_TAILLE_MAX_ALPHANUM_);
	this.subsection_grp = traite_chaine(subsection,_TAILLE_MAX_ALPHANUM_);
}

// Ajout de CONTENU
function add_content (chaine)
{
	if (chaine == null || chaine == '') return 0;
	this.nb_content++;
	if ( this.nb_content > _NB_MAX_CONTENU_ ) return 0;
	if ( this.nb_content > 1 ) this.content = this.content.concat('|');
	chaine = chaine.replace('|',' ');
	this.content = this.content.concat( traite_chaine(chaine,_TAILLE_MAX_CONTENU_));
	return 1;
}


/* ------------------ Profilling ------------------------ */

// Modification du mode pour le profiling ( avec cookie ou sans )
function profiling_cookie_mode (mode)
{
	if (mode == 'on')
		this.profiling_cookie_mode = 1;
	else
		this.profiling_cookie_mode = 0;
}

// Ajout d'un profil pour le profiling
function add_profile (numero,valeur)
{
	numero = parseInt(numero,10);
	if ((numero < 1) || (numero > 5)) return -2;
	if ( this.profiling_cookie_mode == 0 )
	{
		numero--;
		this.segmentation[numero] = valeur;
		return 1;
	}
	if(parseInt(navigator.appVersion,10)<=3) return -1;
	nb_mois = 12;
	var verif_val_I = /^\d+$/;
	if(verif_val_I.test(valeur)) valeur = encode_en_lettre(valeur);
	var verif_val_A = /^\w*$/;
	if(verif_val_A.test(valeur)) {
		var mon_profil_wbo = GetCookie(this.cookie_segmentation);
		tab_segment = new Array('','','','','');
		if(mon_profil_wbo != null) {
			tab_segment = mon_profil_wbo.split('|');
			if(tab_segment.length != 5) tab_segment = ('','','','','');
				//On véfie qu'une mise àour est néssaire.
			if(tab_segment[numero - 1]==valeur) return 1;
		}
		if(this.domaine_segmentation == '') {
			this.domaine_segmentation = window.location.host;
			tab_points = new Array();
			tab_points = window.location.host.split('.');
			if(tab_points.length>2) this.domaine_segmentation = this.domaine_segmentation.substring(this.domaine_segmentation.indexOf('.'),this.domaine_segmentation.length);
			if(tab_points.length==2) this.domaine_segmentation = '.' + this.domaine_segmentation;
		}
		var ma_chaine_profil='';
		for(var i=1; i<=5; i++) {
			if(i==numero) tab_segment[i-1]=valeur;
			if((tab_segment[i-1]=='') || (tab_segment[i-1]==null)) tab_segment[i-1] = '';
			ma_chaine_profil += tab_segment[i-1];
			if(i<5) ma_chaine_profil += '|';
		}
		expd = new Date();
		expd.setTime(expd.getTime() + (nb_mois * 30 * 24 * 3600 * 1000));
		SetCookie (this.cookie_segmentation,ma_chaine_profil,expd,'/',this.domaine_segmentation);
		return 2;
	}
	else return -3;
}

// Ajout du profiling
function add_profiles (p1,p2,p3,p4,p5) {
	this.add_profile(1,p1);
	this.add_profile(2,p2);
	this.add_profile(3,p3);
	this.add_profile(4,p4);
	this.add_profile(5,p5);
}

// Destruction du cookie de profiling ou de la variable
function delete_profiles ()
{
	if ( this.profiling_cookie_mode == 0 )
	{
		this.segmentation = Array('','','','','');
	}
	else
	{
		expd = new Date();
		expd.setTime(expd.getTime() - (24 * 3600 * 1000));
		SetCookie (this.cookie_segmentation,'||||',expd,'/',this.domaine_segmentation);
	}
}

// Recuperation des informations de profiling ( on renvoie une chaine escapé)
function get_profiles () {
	this.profiles = GetCookie(this.cookie_segmentation);
	if( this.profiles == null) {
		this.profiles = '';
		var verif_val_I = /^\d+$/;
		for(var i=1;i<=5;i++) {
			if(verif_val_I.test(this.segmentation[i-1])) this.segmentation[i-1] = encode_en_lettre(this.segmentation[i-1]);
			this.profiles += this.segmentation[i-1];
			if(i<5) this.profiles += '|';
		}
	}
	this.profiles = escape(this.profiles);
}

/* ------------------ Generales --------------------------- */
function encode_en_lettre (num) {
	num = parseInt(num,10);
	if(num > 2500) return '';
	var num1 = parseInt(num/52,10);
	var num2 = num % 52;

	num1 += 65;
	if (num1>90) num1+=6;

	num2 += 65;
	if (num2>90) num2+=6;

	var mon_code52 = String.fromCharCode(num1) + String.fromCharCode(num2);
	return mon_code52;
}

// Nettoyage dune chaine de caracteres
function traite_chaine (str,taille_max) {
	var s = traduction(str);
	var bag = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-.,;:_ ";
	var i;
	var returnString = "";
	if (s == null) return "";
	s = "" + s;
	s = s.substr(0,taille_max);
	for (i = 0; i < s.length; i++) {
		var c = s.charAt(i);
		if (bag.indexOf(c) != -1) returnString += c;
	}
	returnString = unicite_espace(returnString);
	returnString = escape(returnString);
	return returnString;
}

function convertir(chaine)
{
	var str = chaine.replace(/&#(\d+);/,"$1");
	return String.fromCharCode(str);
}

function traduction(chaine)
{
	var chaine_b = unescape(chaine);
	var i=0;
	while ( chaine_b != chaine && i<5 )
	{
		i++;
		chaine = chaine_b;
		chaine_b = unescape(chaine_b);	
	}
	return chaine_b.replace(/&#(\d+);/gi, convertir);
}

function unicite_espace (chaine)
{
	var str = chaine.replace(/(\s+)/g,' ');
	str = str.replace(/(^\s*)|(\s*$)/g,"");
	return str;
}

// Identification du type de navigateur
function wf_uaO(c) {
	var wf_ual=navigator.userAgent.toLowerCase();
	return(wf_ual.indexOf(c))
}


/* ------------------ Cookies --------------------------- */
function getCookieVal (offset) {
	var endstr = document.cookie.indexOf (";", offset);
    if (endstr == -1)
        endstr = document.cookie.length;
	return unescape(document.cookie.substring(offset, endstr));
}

function GetCookie (name) {
	var arg = name + "=";
	var alen = arg.length;
	var clen = document.cookie.length;
	var i = 0;
	while (i < clen) {
		var j = i + alen;
		if (document.cookie.substring(i, j) == arg)
			return getCookieVal (j);
		i = document.cookie.indexOf(" ", i) + 1;
		if (i == 0) break;
	}
    return null;
}

function SetCookie (name,value,expires,path,domain,secure)  {
	document.cookie = name + "=" + escape (value) +
	((expires) ? "; expires=" + expires.toGMTString() : "") +
	((path) ? "; path=" + path : "") +
	((domain) ? "; domain=" + domain : "") +
	((secure) ? "; secure" : "");
}

/* ------- Retro comptabilite ------- */

wreport_ok = 1;
/*  declenchement du code de mesure d audience */
if(wreport_ok==1){ var w_counter = new wreport_counter(WRP_SECTION, WRP_SUBSECTION, WRP_ID, WRP_ACC, WRP_CHANNEL);
w_counter.add_content(WRP_CONTENT);
w_counter.count();}


