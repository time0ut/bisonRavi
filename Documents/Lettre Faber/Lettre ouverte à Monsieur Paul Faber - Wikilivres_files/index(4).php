/********************************
  enhanced form for index pages
*********************************/


function set_index_field(name,value,on_book,on_collection,on_journal,on_phdthesis, on_dictionary){
	var f = document.getElementsByName(name)[0];
	if(!f) return;
	f = f[0];
	if(f) {
		if( (value=="book" && on_book) || (value=="journal" && on_journal) || (value=="collection" && on_collection) || (value=="phdthesis" && on_phdthesis) || value=="dictionary" && on_dictionary ) {
			f.disabled=false;
			f.parentNode.parentNode.style.display="";
		} else {
			f.disabled=true;
			f.parentNode.parentNode.style.display="none";
		}
	}
}



function type_changed(f,value) {
	//see http://www.easybib.com/reference/guide/apa/dictionary
	set_index_field( ws_msg('author'),     value, 1, 1, 0, 1, 0);
	set_index_field( ws_msg('translator'), value, 1, 1, 0, 0, 0);
	set_index_field( ws_msg('editor'),     value, 1, 1, 1, 0, 1);
	set_index_field( ws_msg('place'),      value, 1, 1, 1, 0, 1);
	set_index_field( ws_msg('editor'),     value, 1, 1, 1, 0, 1);
	set_index_field( ws_msg('volume'),     value, 1, 1, 1, 0, 1);
	set_index_field( ws_msg('school'),     value, 0, 0, 0, 1, 0);
}


function index_choices(){
	if( wgCanonicalNamespace == self.index_ns_prefixes[wgContentLanguage] ) {
		var f = document.editform;
                var value = "book"; //fixme: understand this
		if(f) {
			var a = f.Type;
			if(a) {

				value = a.value;
				a.parentNode.innerHTML="<select onchange=\"type_changed(this.form,this.options[this.selectedIndex].value);\" name=\"Type\">"
+"<option value=\"book\" selected=true>" + ws_msg('book') + "</option>"
+"<option value=\"collection\">" + ws_msg('collection') + "</option>"
+"<option value=\"journal\">" + ws_msg('journal') + "</option>"
+"<option value=\"phdthesis\">" + ws_msg('phdthesis') + "</option>"
+"<option value=\"dictionary\">" + ws_msg('dictionary') + "</option>" 
+"</select>";
				a = f.Type;
				for (var i=0; i < a.length; i++) {
					if (a[i].value == value) a[i].selected = true;
				}
				if(value=="") value="book";
				type_changed(f,value);
			}

			var suffix = wgPageName.substring(wgPageName.length-4,wgPageName.length).toLowerCase();
			if( suffix=='djvu' || suffix=='.pdf') {
				var m_source = ws_msg('Source');
				set_index_field( m_source, value, 0, 0, 0, 0, 0);
				f = document.getElementsByName(m_source)[0];
				if(f) {
				 if( suffix=='djvu' ) f.value='djvu';
				 if( suffix=='.pdf' ) f.value='pdf';
                                }
				f = document.getElementsByName( ws_msg('Image'))[0];
				if(f && f.value=="") f.value="1";
				f = document.getElementsByName( ws_msg('Pages'))[0];
				if(f && f.value=="") f.value="<pagelist />";
			}
			var a = document.getElementsByName(ws_msg('progress'))[0];
			if(a) {
				value = a.value;
				a.parentNode.innerHTML="<select name=\""+ ws_msg('progress') + "\">"
+"<option value=\"\" selected=true></option>"
+"<option value=\"T\">" + ws_msg('progress_T') + "</option>"
+"<option value=\"V\">" + ws_msg('progress_V') + "</option>"
+"<option value=\"C\">" + ws_msg('progress_C') + "</option>"
+"<option value=\"MS\">"+ ws_msg('progress_MS')+ "</option>"
+"<option value=\"OCR\">"+ws_msg('progress_OCR')+"</option>"
+"<option value=\"X\">" + ws_msg('progress_X') + "</option>"
+"<option value=\"L\">" + ws_msg('progress_L') + "</option>"
+"</select>";
				a = document.getElementsByName(ws_msg('progress'))[0];
				for (var i=0; i < a.length; i++) {
					if (a[i].value == value) a[i].selected = true;
				}
			}

		}
	}
}
hookEvent("load",index_choices);