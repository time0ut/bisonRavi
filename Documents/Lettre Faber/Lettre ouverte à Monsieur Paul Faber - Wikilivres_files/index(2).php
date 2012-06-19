/*********************************
* page numbers for proofreadpage
* by [[user:ThomasV]]
**********************************/


var layout_num = 0;

function toggle_layout() {
  var n=0; for( key in self.ws_layouts ) n++;
  layout_num = (layout_num+1) % n;
  SetCookie("layout",""+layout_num);
  set_layout(layout_num);
}

if(!self.ws_layouts) self.ws_layouts = {}

function set_layout(layout_num) {
  var i=0; for( key in self.ws_layouts ) { if(i==layout_num) layout_name = key; i++; }
  d = self.ws_layouts[layout_name];
  for( key in d ) {
     if(key.substring(0,1)=='.') {
        var t = get_elements_by_classname( key.substring(1,key.length) ,"span"); 
        for(var i=0; i<t.length; i++)  t[i].style.cssText = d[key];
     } else if(key.substring(0,1)=='#') {
        var item = document.getElementById(key.substring(1,key.length));
        if(item) item.style.cssText = d[key];
     }
  }
  o_a = document.getElementById("option-textLayout");
  if(o_a) o_a.innerHTML = "<a href='javascript:toggle_layout();'>"+layout_name+"</a>";

  refresh_pagenumbers();
}

function add_page_container(){
        if(wgNamespaceNumber!=0 && wgNamespaceNumber!=2 ) return; 
        var a = null;
        if(wgAction=="view"||wgAction=="purge") a = document.getElementById("bodyContent"); 
        if(wgAction=="submit") a = document.getElementById("wikiPreview"); 
        if (!a) return;
        if( document.getElementById("text-wrap") ) return;

        if( !self.proofreadpage_source_href && get_elements_by_classname("pagenum","span").length==0 ) return;

	var t = get_elements_by_classname("text","div"); 
        for(var i=0; i<t.length; i++)  t[i].className =""; 
        t = get_elements_by_classname("lefttext","div"); 
        for(var i=0; i<t.length; i++)  t[i].className =""; 
        t = get_elements_by_classname("centertext","div"); 
        for(var i=0; i<t.length; i++)  t[i].className =""; 
        t = get_elements_by_classname("indented-page","div"); 
        for(var i=0; i<t.length; i++)  t[i].className =""; 
        t = get_elements_by_classname("prose","div"); 
        for(var i=0; i<t.length; i++)  t[i].className =""; 


	a.innerHTML = "<div id=\"text-wrap\"><div id=\"text-container\"><div id=\"text\">"+a.innerHTML + "</div></div></div><div style=\"clear:both\"/>";
	var b = document.getElementById("contentSub");
	if(b) { 
	  b.parentNode.removeChild(b); 
	  a.insertBefore(b,a.firstChild); 
        }
	var b = document.getElementById("catlinks");
	if(b) { 
	  b.parentNode.removeChild(b); 
	  a.appendChild(b);
        }
}

function init_page_layout() {
    if(self.debug_page_layout) return;

    if(document.URL.indexOf("match=") > 0 ) return;
    if(document.URL.indexOf("diff=") > 0 ) return;

    var k=false; 
    for( key in self.ws_layouts ) { k = true;}
    if(!k) return;

    add_page_container();

    if(document.getElementById("text-wrap")) {
       var optlist = get_optlist();
       /*p = document.getElementById('p-displayOptions'); 
       if(self.proofreadpage_debug) alert(p);*/
       mw.util.addPortletLink ('p-displayOptions', 'javascript:toggle_layout();', ws_msg('layout'), 'option-textLayout', '' );
       layout = GetCookie("layout") ;
       if(layout) layout_num = parseInt( layout ); else layout_num = 0;
       if(!layout_num) layout_num = 0;
       set_layout(layout_num);
    }
}

function hide_pagenumbers(){
   var ml = get_elements_by_classname( 'pagenumber', 'span' );
   for(var i=0; i<ml.length; i++) {
     ml[i].style.display="none";
   }
   o_a = document.getElementById("option-pageNumbers");
   if(o_a) {
     o_a.innerHTML = "<a href='javascript:show_pagenumbers();'>"+ws_msg('show_page_numbers')+"</a>"; 
   }
   SetCookie("pagenum","0") ;
}

function show_pagenumbers(){
   var ml = get_elements_by_classname( 'pagenumber', 'span' );
   for(var i=0; i<ml.length; i++) {
     ml[i].style.display="";
   }
   o_a = document.getElementById("option-pageNumbers");
   if(o_a){
     o_a.innerHTML = "<a href='javascript:hide_pagenumbers();'>"+ws_msg('hide_page_numbers')+"</a>"; 
   }
   SetCookie("pagenum","1") ;
}

// see http://stackoverflow.com/questions/1472842/firefox-and-chrome-give-different-values-for-offsettop 

function get_offset(item) {
	var ox=0; var oy=0;
	var zme = item;
	for(zmi=0;zmi<50;zmi++) {
		if(zme+1 == 1 ) { 
			break;
		} 
		else {
			ox+=zme.offsetLeft;
                        oy+=zme.offsetTop;
		}
		zme=zme.offsetParent; 
	}
	return [ox,oy, item.offsetTop];
}

function pagenum_over(ox,oy,prev_ox,prev_oy,h,w) {
  if(self.proofreadpage_disable_highlighting) return true;
  var ct = document.getElementById("ct-popup");
  if(!ct) return true;
  var dd = h/10;
  ct.style.top = (oy-h+dd)+"px";
  ct.style.height= "";

  ct.firstChild.style.width = (w-ox)+"px";
  ct.firstChild.nextSibling.style.height = (prev_oy-oy-h)+"px";
  ct.firstChild.nextSibling.nextSibling.style.width = prev_ox+"px";
  return true;

}

function pagenum_out(){
  if(self.proofreadpage_disable_highlighting) return true;
  var ct = document.getElementById("ct-popup");
  if(!ct) return true;
  ct.style.height= "0px";
  ct.firstChild.style.width = "0px";
  ct.firstChild.nextSibling.style.height = "0px";
  ct.firstChild.nextSibling.nextSibling.style.width = "0px";
  return true;
}



function init_page_numbers() {

	if(document.URL.indexOf("match=") > 0 ) return;

    self.pagenum_ml = get_elements_by_classname( 'pagenum', 'span' );

    if( !self.proofreadpage_source_href && self.pagenum_ml.length==0) return;

    var optlist = get_optlist();
    mw.util.addPortletLink ('p-displayOptions', 'javascript:hide_pagenumbers();', ws_msg('hide_page_numbers'), 'option-pageNumbers', '', 'n' );

    var cs = self.pagenum_ml[0].parentNode.parentNode;
    //this happens for empty pages ; check if there are other cases
    if(cs.tagName=="P") cs = cs.parentNode; 

    /* Measure the line height and the height of an empty span */
    var ct = document.createElement("div");
    ct.setAttribute("id","my-ct");
    cs.insertBefore(ct,cs.firstChild);
    var ss = document.createElement("div"); /*we need a div, not a span*/
    ss.innerHTML="&nbsp;<span></span>";     /*empty span following some text */
    ss.setAttribute("id","my-ss");
    cs.appendChild(ss);

    /* container for page numbers */
    var div_pagenums = document.createElement("div"); 
    div_pagenums.setAttribute("id","ct-pagenums");
    /* insert the container in the grandparent node, or parent, or self */
    var mcs = document.getElementById("text-wrap");
    if(!mcs) {
      if(cs.parentNode.parentNode.style.position=="relative") mcs = cs.parentNode.parentNode;
      else if(cs.parentNode.style.position=="relative") mcs = cs.parentNode; 
      else { mcs = cs; mcs.style.position = "relative"; }
    } 
    mcs.appendChild(div_pagenums);

    /* container for the highlight */
    var div_popup = document.createElement("div"); 
    var opacity="background-color:#000000;opacity:0.2;-ms-filter:alpha(opacity=20);filter:alpha(opacity=20);";
    div_popup.setAttribute("id","ct-popup");
    div_popup.style.cssText = "position:absolute;width:100%;";
    div_popup.innerHTML = "<div style=\""+opacity+"float:right;width:0px;\" >&nbsp;</div>"
      +"<div style=\""+opacity+"width:100%;height:0px;clear:both;\"></div>"
      +"<div style=\""+opacity+"width:0px;\">&nbsp;</div>";
    cs.appendChild(div_popup);

    refresh_pagenumbers();
}


function refresh_pagenumbers() {
    var ct = document.getElementById("my-ct");
    if(!ct) return;
    var ss = document.getElementById("my-ss");

    var cs = ct.parentNode;
    /* set it to relative because the highlight is of width 100% */
    cs.style.position = "relative"; /* fixme : this interacts with layouts */

    var lineheight = ss.offsetHeight; 
    var offset_h = ss.lastChild.offsetHeight;

    var linewidth = cs.offsetWidth; 
    var ct_o = get_offset(ct);
    var ct_ox = ct_o[0]; 
    var ct_oy = ct_o[1];
    var oo = get_offset(ss);
    var ox = oo[0] - ct_ox; var oy = oo[1] - ct_oy;

    var oh ="";
    for(var i=self.pagenum_ml.length-1; i>=0; i--) {
        var a = self.pagenum_ml[i];
        var num = decodeURI( a.id );
        if(num==".CE.9E") num="Ξ";
        if(num==".E2.80.93") num="—";
        if(num==".E2.80.94") num="—";
        var page = a.title;
        var pagetitle = decodeURI( page );
        var page_url = wgArticlePath.replace("$1", encodeURIComponent( pagetitle.replace(/ /g,"_") ) );
        // encodeURIComponent encodes '/', which breaks subpages
        page_url = page_url.replace(/%2F/g, '/');
        var ll = a.parentNode.nextSibling;
        if(ll && ll.tagName=="A" && ll.className=="new") class_str=" class=\"new\" "; else class_str="";
        var link_str = "<a href=\""+page_url+"\"" + class_str + " title=\""+escapeQuotesHTML(pagetitle)+"\">"+escapeQuotesHTML(num)+"</a>" 
        if(self.proofreadpage_numbers_inline){
                a.innerHTML = "&#x0020;<span class=\"pagenumber noprint\" style=\"color:#666666; display:inline; margin:0px; padding:0px;\">[<b>"+link_str+"</b>]</span>&#x0020;";
        }
        else { 
            if(a.offsetTop==0 && i!=0) { 
                //if(self.proofreadpage_debug) alert("zero2 "+a.id+" "+a.parentNode.offsetTop); 
                continue;
            }
            prev_ox = ox;
            prev_oy = oy;
            a_o = get_offset(a); 
            ox = a_o[0] - ct_ox;
            oy = a_o[1] - ct_oy + offset_h;

            if(prev_oy - oy > 5) {
                  oh = oh + "<div class=\"pagenumber noprint\" onmouseover=\"pagenum_over("+ ox + "," + oy + "," + prev_ox + "," + prev_oy + "," + lineheight + "," + linewidth + ");\" onmouseout=\"pagenum_out();\" style=\"position:absolute; left:-4em; top:"+(oy+cs.offsetTop-lineheight)+"px; text-indent:0em; text-align:left; font-size:80%; font-weight:normal; font-style: normal;\">["+link_str+"]</div>";
            }
        }
     }
     if(!self.proofreadpage_numbers_inline) {
        var ct_pagenums = document.getElementById("ct-pagenums");
        ct_pagenums.innerHTML = oh;
    }
    pagenum_out();
    if( parseInt(GetCookie("pagenum")) == 0 ) hide_pagenumbers();
}

//fixme : this is sensitive to order (detection of containers with "relative" position)
addOnloadHook(init_page_layout);
addOnloadHook(init_page_numbers);