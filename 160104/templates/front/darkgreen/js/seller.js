
$(document).ready(function() { 
	
	$('#btnContactSeller').on('click', function(e) { 
		validFormContact();
	});
	
	
	$('#btnReplyRequest').on('click', function(e) {
		validFormRequest();
	});
	
	
});



/**
* hiden msg
* input id = name_end
* alert: valid_ + name_end
*/
function hideMsg(name_end){
	if( $('#'+name_end).val() != '') { $('#valid_'+name_end).html(''); }
}

function hideMsgOther(id_name_end){  $('#'+id_name_end).html(''); }

function isnumberic(s) {
	var str="01234556789";
	var i, l, ch;
	l = s.length;
	
	for(i=0; i<l; i++) 	{
		ch=s.charAt(i);
		if(str.indexOf(ch)== -1) return false;
	}
	
	return true;
}

function validEmail(email) { 
	invalidChars = " /:,;*#%~?="
	for(i=0; i<invalidChars.length; i++ ) {
		badChar = invalidChars.charAt(i)
		if(email.indexOf(badChar,0)>-1 ) return false
	}

	atPos = email.indexOf("@",1)
	if( atPos == -1 ) return false
	if( email.indexOf("@",atPos+1)>-1 ) return false
	periodPos = email.indexOf(".",atPos)
	if( periodPos == -1 ) return false
	if( periodPos+3>email.length )	return false
	return true
}


function validFormContact() {
	var msg_subject = $('#msg_subject').val();
	var msg_content = CKEDITOR.instances['msg_content'].getData()
	var qty_needed = $('#qty_needed').val();
	var term = $('input:checkbox[name=term]:checked').val();
	
	if(msg_subject == ''){
		$('#valid_msg_subject').html(please_fill_required_fields); return false;
	}
	
	if(msg_content == ''){
		$('#valid_msg_content').html(please_fill_required_fields); return false;
	}
	
	if(qty_needed == ''){
		$('#valid_qty_needed').html(please_fill_required_fields); return false;
	}
	
	if(term != 1) { $('#valid_term').html(you_agree_term); return false; }
	
	$('form#frm_message').submit();
}


function validFormRequest() {
	var msg_subject = $('#msg_subject').val();
	var msg_content = CKEDITOR.instances['msg_content'].getData()
	var term = $('input:checkbox[name=term]:checked').val();
	
	if(msg_subject == ''){
		$('#valid_msg_subject').html(please_fill_required_fields); return false;
	}
	
	if(msg_content == ''){
		$('#valid_msg_content').html(please_fill_required_fields); return false;
	}
	
	if(term != 1) { $('#valid_term').html(you_agree_term); return false; }
	
	$('form#frm_message').submit();
}