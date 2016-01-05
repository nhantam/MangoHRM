
$(document).ready(function() { 
	
	// btn Contact us
	$('#btnContact').on('click', function(e) {
		validContact();								   
	});
	
	
	// btn Contact us
	$('#btnOrderAdv').on('click', function(e) {
		validOrderAdv();								   
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


function validContact(){
	
	var username 	= $('#username').val();
	var telephone 	= $('#telephone').val();
	var email 		= $('#email').val();
	var regRandom 	= $('#regRandom').val();
	
	if(username == '') { $('#valid_username').html( required_input+' '+username); return; }
	
	if(telephone == '') { $('#valid_telephone').html( required_input+' '+telephone ); return; }
	
	if( email == '' || !validEmail(email) ) { $('#valid_email').html(email_invalid); return; }
	
	checkCapcha = matchCaptcha(regRandom);
	
	if(regRandom == '' || checkCapcha == 0) { $('#valid_regRandom').html(captcha_not_match); return; }
	
	$('form#frm_contact').submit();
}


function validOrderAdv(){
	
	var username 	= $('#username').val();
	var telephone 	= $('#telephone').val();
	var email 		= $('#email').val();
	var regRandom 	= $('#regRandom').val();
	
	if(username == ' ') { $('#valid_username').html( required_input+' '+username); return; }
	
	if(telephone == '') { $('#valid_telephone').html( required_input+' '+telephone ); return; }
	
	if( email == '' || !validEmail(email) ) { $('#valid_email').html(email_invalid); return; }
	
	checkCapcha = matchCaptcha(regRandom);
	
	if(regRandom == '' || checkCapcha == 0) { $('#valid_regRandom').html(captcha_not_match); return; }
	
	$('form#frm_adv').submit();
}


function matchCaptcha(captcha) {
	var flag = 0;
	if(captcha) {
		$.ajax({
			type: "POST",
			url: base_url+"signup/matchcaptcha/",
			async: false,		
			data: "regRandom="+captcha,
			success: function(text){
				if(text >= 1) { flag = 1 } 
			}
		});
	}
	
	return flag;
}


function resetRegCaptcha(){
	$("#regRandom").html("");
	var src = base_url+'signup/random/'+ Math.random();
	$("#imgRegRandom").attr("src", src);
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