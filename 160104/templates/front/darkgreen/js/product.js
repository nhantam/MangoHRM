
$(document).ready(function() { 
	
	// Category
	$('#c').on('change', function(e) { 
		$('#page').val('');
		$('form#frm_list').submit();								   
	});
	
	//btnGo
	$('#btnGo').on('click', function(e) { 
		var page = $('#page').val();
		if(page > 0) { $('form#frm_list').submit(); }
	});
	
	$('#frm_country input').on('click', function(e) {
		var country = $(this).val();
		if(country) {
			$('form#frm_country').submit();
		}
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