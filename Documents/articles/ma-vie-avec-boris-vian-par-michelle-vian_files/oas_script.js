<!--//
var bot = navigator.userAgent;
var Expression		= /http:\/\/www.googlebot.com\/bot.html/gi;
var ExpressionA		= /http:\/\/www.google.com\/bot.html/gi;
var ExpressionB		= /Googlebot/gi;
if ( ( Expression.test(bot) || ExpressionA.test(bot) ) && ExpressionB.test(bot) )
	OAS_nopub = 'ok';

if ( typeof OAS_nopub == 'undefined' )
	OAS_nopub = 'no';
    
if ( typeof OAS_obs == 'undefined' )
	OAS_obs = '';

if ( !!OAS_nopub && OAS_nopub != "ok" ) {
	
	OAS_url			= 'http://uniprix.nouvelobs.com/RealMedia/ads/';
	OAS_referrer	= document.referrer;
	OAS_referrer	= OAS_referrer.substring(7, OAS_referrer.indexOf('/',7));
	if (OAS_referrer == '') OAS_referrer = 'AUCUN';
	OAS_query	 = '?ref=' + OAS_referrer;
	if (OAS_obs != '') OAS_query = OAS_query + '&key=' + OAS_obs;
	
	
	//changement de OAS_sitepage si la provenance est un rss
	var url_sitepage = window.location.href;
	var via_fx = url_sitepage.indexOf('idfx=RSS_');
	if (via_fx !=-1)
		OAS_sitepage = 'PERMANENTNOUVELOBS/rss';
	
	//end of configuration
	OAS_version = 10;
	OAS_rn = '001234567890'; OAS_rns = '1234567890';
	OAS_rn = new String (Math.random()); OAS_rns = OAS_rn.substring (2, 11);
	
	function OAS_NORMAL(pos) { 
		document.write('<A HREF="' + OAS_url + 'click_nx.ads/' + OAS_sitepage + '/1' + OAS_rns + '@' + OAS_listpos +
			'!' + pos + OAS_query + '" TARGET=_top>');
		document.write('<IMG SRC="' + OAS_url + 'adstream_nx.ads/' + OAS_sitepage + '/1' + OAS_rns + '@' + OAS_listpos +
			'!' + pos + OAS_query + '" BORDER=0></A>');
	}
	OAS_version = 11;
	if (navigator.userAgent.indexOf('Mozilla/3') != -1)
		OAS_version = 10;
	if (OAS_version >= 11 && OAS_nopub != "ok")
		document.write('<SCRIPT LANGUAGE=JavaScript1.1 SRC="' + OAS_url + 'adstream_mjx.ads/' + OAS_sitepage + '/1' + OAS_rns + '@' + OAS_listpos + OAS_query + '"><\/SCRIPT>');
	document.write('');
	
	function OAS_AD(pos) {
		if (OAS_version >= 11 && OAS_nopub != "ok")
			OAS_RICH(pos);
		else if (OAS_nopub != "ok")
			OAS_NORMAL(pos);
	}
}
//-->