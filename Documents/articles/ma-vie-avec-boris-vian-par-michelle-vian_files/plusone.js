var gapi=window.gapi=window.gapi||{};(function(){var g=void 0,h=!0,i=!1,j=window,m=document,n="push",o="replace",p="indexOf",q="length",r="call",s="apply",u="join";var v=j,x=m,aa=v.location,ba=function(){},z=function(a,b,c){return a[b]=a[b]||c},A=function(a){for(var b=0;b<this[q];b++)if(this[b]===a)return b;return-1},ca=function(a){for(var a=a.sort(),b=[],c=g,d=0;d<a[q];d++){var e=a[d];e!=c&&b[n](e);c=e}return b},B=function(){var a;if((a=Object.create)&&/\[native code\]/.test(a))a=a(null);else{a={};for(var b in a)a[b]=g}return a},da=function(a){return function(){v.setTimeout(a,0)}},C=z(v,"gapi",{});var E=function(){var a=aa.href,b=D.h,c=RegExp("([?#].*&|[?#])jsh=([^&#]*)","g");if(a=a&&c.exec(a))try{b=decodeURIComponent(a[2])}catch(d){}return b};var D;D=z(v,"___jsl",B());z(D,"I",0);var F=function(a){return z(z(D,"H",B()),a,B())},ea=function(a,b){z(D,"df",B())[a]=b};var G=B(),H=[];H[n](["jsl",function(a){for(var b in a)if(Object.prototype.hasOwnProperty[r](a,b)){var c=a[b];"object"==typeof c?D[b]=z(D,b,[]).concat(c):z(D,b,c)}if(a=a.u)b=z(D,"us",[]),b[n](a),(c=/^https:(.*)$/.exec(a))&&b[n]("http:"+c[1]),z(D,"u",a)}]);G.m=function(a){var b=D.ms||"https://apis.google.com",a=a[0];if(!a||0<=a[p](".."))throw"Bad hint";return b+a};
var I=function(a){return a[u](",")[o](/\./g,"_")[o](/-/g,"_")},J=function(a,b){for(var c=[],d=0;d<a[q];++d){var e=a[d];e&&0>A[r](b,e)&&c[n](e)}return c},fa=function(){var a=E();if(!a)throw"Bad hint";return a},ga=function(a){var b=a.split(";"),c=G[b.shift()],b=c&&c(b);if(!b)throw"Bad hint:"+a;return b},ha=function(a){"loading"!=x.readyState?K(a):x.write(['<script src="',a,'"><\/script>'][u](""))},K=function(a){var b=x.createElement("script");b.setAttribute("src",a);b.async="true";a=x.getElementsByTagName("script")[0];
a.parentNode.insertBefore(b,a)},ia=function(a,b){var c=b&&b._c;if(c)for(var d=0;d<H[q];d++){var e=H[d][0],f=H[d][1];f&&Object.prototype.hasOwnProperty[r](c,e)&&f(c[e],a,b)}},L=function(){return i},O=function(){return h},P=function(a,b){var c=b||{};"function"==typeof b&&(c={},c.callback=b);ia(a,c);var d=c.h||fa(),e=c.callback,f=c.config,l=z(F(d),"r",[]).sort(),k=z(F(d),"L",[]).sort(),M=function(a){k[n][s](k,w);var b=((C||{}).config||{}).update;b?b(f):f&&z(D,"cu",[])[n](f);if(a){b=E();b=d===b?z(C,"_",
B()):B();b=z(F(d),"_",b);a(b)}e&&e();return 1},t=a?ca(a.split(":")):[],w=J(t,k);if(!w[q])return M();var w=J(t,l),N=D.I++,y="loaded_"+N;if(!L(w,c,d,y)){C[y]=function(a){if(!a)return 0;var b=function(){C[y]=null;return M(a)};if(C["loaded_"+(N-1)])C[y]=b;else for(b();b=C["loaded_"+ ++N];)if(!b())break};if(!w[q])return C[y](ba);t=ga(d);t=t[o]("__features__",I(w))[o](/\/$/,"")+(l[q]?"/ed=1/exm="+I(l):"")+(O(d)?"/cb=gapi."+y:"");l[n][s](l,w);c.sync||v.___gapisync?ha(t):K(t)}};C.load=P;var Q=function(a){var b=D.cm;return function(){b&&b();if(D.p)D.cm=Q(a);else{var c=a.shift();c&&P[s]({},c)}}},L=function(a,b,c,d){var e=z(D,"SL",[]);if(D.p)return e[n]([a[u](":"),b]),D.cm=Q(e),h;if(O(c))return i;if(D.LP)return e[n]([a[u](":"),b]),h;D.LP=h;D.cm=function(){C[d](function(){D.p=g;D.LP=i;var a=e.shift();a&&P[s]({},a)})};D.p=a;return i},O=function(a){return!/\/widget\/|ms=widget/.test(a)};var R=function(){return j.___jsl=j.___jsl||{}},S=function(a){var b=R();b[a]=b[a]||[];return b[a]},T=function(a){var b=R();b.cfg=!a&&b.cfg||{};return b.cfg},U=function(a){return"object"===typeof a&&/\[native code\]/.test(a[n])},V=function(a,b){if(b)for(var c in b)b.hasOwnProperty(c)&&(a[c]&&b[c]&&"object"===typeof a[c]&&"object"===typeof b[c]&&!U(a[c])&&!U(b[c])?V(a[c],b[c]):b[c]&&"object"===typeof b[c]?(a[c]=U(b[c])?[]:{},V(a[c],b[c])):a[c]=b[c])},W=function(a){if(a){var b="",c=a.nodeType;if(3==c||
4==c)b=a.nodeValue;else if(a.innerText)b=a.innerText;else if(a.innerHTML)b=a.innerHTML;else if(a.firstChild){b=[];for(a=a.firstChild;a;a=a.nextSibling)b[n](W(a));b=b[u]("")}return b}},X=function(){for(var a=["parsetags"],b=T(),c=0,d=a[q];b&&"object"===typeof b&&c<d;++c)b=b[a[c]];return c===a[q]&&b!==g?b:g},ja=function(){T(h);var a=j.___gcfg,b=S("cu");if(a&&a!==j.___gu){var c={};V(c,a);b[n](c);j.___gu=a}var a=S("cu"),d=m.scripts||m.getElementsByTagName("script")||[],c=[],e=[],f=R().u;f&&e[n](f);R().us&&
e[n][s](e,R().us);for(f=0;f<d[q];++f)for(var l=d[f],k=0;k<e[q];++k)l.src&&0==l.src[p](e[k])&&c[n](l);0==c[q]&&d[d[q]-1].src&&c[n](d[d[q]-1]);for(d=0;d<c[q];++d)if(!c[d].getAttribute("gapi_processed")){c[d].setAttribute("gapi_processed",h);if(e=W(c[d])){for(;0==e.charCodeAt(e[q]-1);)e=e.substring(0,e[q]-1);f=g;try{f=(new Function("return ("+e+"\n)"))()}catch(M){}if("object"===typeof f)e=f;else{try{f=(new Function("return ({"+e+"\n})"))()}catch(t){}e="object"===typeof f?f:{}}}else e=g;e&&a[n](e)}d=
S("cd");a=0;for(c=d[q];a<c;++a)V(T(),d[a]);d=S("ci");a=0;for(c=d[q];a<c;++a)V(T(),d[a]);a=0;for(c=b[q];a<c;++a)V(T(),b[a])};var ka=function(){var a=j.__GOOGLEAPIS;a&&(z(D,"ci",[])[n](a),j.__GOOGLEAPIS=g)};var Y=j,la=m,ma=function(a){if("complete"===la.readyState)a();else{var b=i,c=function(){if(!b)return b=h,a[s](this,arguments)};Y.addEventListener?(Y.addEventListener("load",c,i),Y.addEventListener("DOMContentLoaded",c,i)):Y.attachEvent&&(Y.attachEvent("onreadystatechange",function(){"complete"===la.readyState&&c[s](this,arguments)}),Y.attachEvent("onload",c))}};var na=B(),Z=z(D,"FW",[]),oa=function(){for(var a=B(),b=x.getElementsByTagName("*"),c=0;c<b[q];++c){var d=b[c],e=d.nodeName.toLowerCase(),f=g;if(!d.getAttribute("data-gapiscan")&&(0==e[p]("g:")?f=e.substr(2):(e=""+(d.className||d.getAttribute("class")))&&0==e[p]("g-")&&(f=e.substr(2)),f&&na[f]))d.setAttribute("data-gapiscan",h),z(a,f,[])[n](d)}return a},$=function(a){var b=oa(),c=[],d="explicit"==X(),e;for(e in b)Z[n](e),(C[e]&&C[e].go||d)&&c[n](e);b={};if(0<c[q])var f=a,a=function(){for(var a=0;a<
c[q];a++)C[c[a]].go();f&&f()};b.callback=a;P(Z[u](":"),b)},pa=function(a,b){for(var c=z(b._c,"ds",[]),d=0;d<a[q];d++)c[n](["gapi",a[d],"go"][u](".")),c[n](["gapi",a[d],"render"][u]("."))};H[n](["platform",function(a,b,c){b&&Z[n](b);for(b=0;b<a[q];b++)na[a[b]]=1;c&&pa(a,c);ka();ja();if("explicit"!=X()){var d;if(c&&(a=c.callback))d=da(a),c.callback=g;ma(function(){$(d)});$()}}]);z(C,"platform",{}).go=$;H[n](["ds",function(a,b,c){for(var d=[].slice,b=0,e;e=a[b];++b){for(var f=v,l=e.split("."),k=0;k<l[q]-1;++k)f=z(f,l[k],{});k=l[k];f[k]||(f[k]=function(){var a=3==l[q]?l[l[q]-2]:"",b=c._c.platform,f="gapi"==l[0]&&b&&0<=A[r](b,a),k=[];ea(e,function(a){for(var b=0;k[b];++b)a[s](v,k[b])});return function(){k[n](d[r](arguments,0));f&&P(a)}}())}}]);})();
gapi.load("plusone",{callback:window["gapi_onload"],_c:{"platform":["plusone","plus","additnow"],"jsl":{"u":"http://apis.google.com/js/plusone.js","ci":{"lexps":[34,38,65,36,40,44,15,45,17,48,52,57,62,60,30],"oauth-flow":{},"iframes":{"additnow":{"url":"https://apis.google.com/additnow/additnow.html?bsv=p"},"plus":{"url":":socialhost:/u/:session_index:/_/pages/badge?bsv=p"},":socialhost:":"https://plusone.google.com","configurator":{"url":":socialhost:/:session_prefix:_/plusbuttonconfigurator"},":signuphost:":"https://plus.google.com","plusone":{"preloadUrl":["https://ssl.gstatic.com/s2/oz/images/stars/po/Publisher/sprite4-a67f741843ffc4220554c34bd01bb0bb.png"],"params":{"count":"","url":"","size":""},"url":":socialhost:/:session_prefix:_/+1/fastbutton?bsv=p"},"plus_share":{"params":{"url":""},"url":":socialhost:/:session_prefix:_/+1/sharebutton?plusShare=true&bsv=p"}},"googleapis.config":{"mobilesignupurl":"https://m.google.com/app/plus/oob?"}},"h":"m;/_/apps-static/_/js/gapi/__features__/rt=j/ver=hO7R7pajnd4.es./sv=1/am=!tbK8W_8mwqaIodoNDQ/d=1/rs=AItRSTOlgywesEckxEsTagcSucGxKMNehw"},"ds":["gapi.plusone.go","gapi.plusone.render","gapi.plus.go","gapi.plus.render"]}});