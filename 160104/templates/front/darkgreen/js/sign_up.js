
$(document).ready(function() { 
	
	// Sign up
	$('#btn_signup').on('click', function(e) { 
		validateSignup();								   
	});
	
	// Sign in
	$('#btn_signin').on('click', function(e) {
		validateSignin();								   
	});
	
	// re-send mail confirm
	$('#btn_confirm').on('click', function(e) {
		sendmailConfirm();								   
	});
	
	
	// change password
	$('#btn_changepassword').on('click', function(e) {
			changePassword();								   
	});
	
	
	$('.remember').on('click', function(e) { 
		if ( $('#remember').is(":checked") ) { 
			$('#remember').removeAttr('checked');
		} else {
			$('#remember').attr('checked', 'checked');
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

function hideTerm(term){
	var term = $('input:checkbox[name=term]:checked').val();
	if(term == 1) { $('#valid_'+term).html(''); }
}

function username_n_focus() {
	$('#n_id_username').removeClass("red").addClass("aaa");
}

function password_n_fucos() {
	$('#n_id_password').removeClass("red").addClass("aaa");	
}

function changePassword(){
	var new_pwd 	= $('#new_pwd').val();
	var confirm_new_pwd = $('#confirm_new_pwd').val();
	
	if( new_pwd != confirm_new_pwd || new_pwd =='' || confirm_new_pwd =='') {
		$('#valid_confirm_new_pwd').html(passsword_not_match); return;
	}
	
	$('form#frm_data').submit();
}


function validateSignup(){
	
	var username 	= $('#username').val();
	var username = username.replace(/\s+/g, '');
	$('#username').val(username);
	
	var email 		= $('#email').val();
	var email = email.replace(/\s+/g, '');
	$('#email').val(email);
	
	var pwd 		= $('#pwd').val();
	var confirm_pwd = $('#confirm_pwd').val();
	
	var firstname 	= $('#firstname').val();
	var lastname 	= $('#lastname').val();
	
	var country_id 	= $('#country_id').val();
	
	var company 	= $('#company').val();
	var company_code= $('#company_code').val();
	
	var regRandom 	= $('#regRandom').val();
	
	var term = $('input:checkbox[name=term]:checked').val();
	
	if(username == '') {
		$('#valid_username').html( required_input+' '+lang_username); return;
	}
	
	var n_username = username.length;
	if(n_username < 4 || n_username > 20) {
		$('#n_id_username').removeClass("aaa").addClass("red");
	}
	
	if( email == '' || !validEmail(email) ) { $('#valid_email').html(email_invalid); return; }
	
	var n_pwd = pwd.length;
	if(n_pwd < 6 || n_pwd > 20) {
		$('#n_id_password').removeClass("aaa").addClass("red");
	}
	
	if( pwd != confirm_pwd || pwd =='' || confirm_pwd =='') {
		$('#valid_confirm_pwd').html(passsword_not_match); return;
	}
	
	if(firstname == '') {
		$('#valid_firstname').html( required_input+' '+lang_firstname); return;
	}
	
	if(lastname == '') {
		$('#valid_lastname').html( required_input+' '+lang_lastname); return;
	}
	
	if(country_id == '') {
		$('#valid_country_id').html( required_input+' '+country); return;
	}
	
	
	if(company == '') {
		$('#valid_company').html( required_input+' '+company_name); return;
	}
	
	if(company_code == '') {
		$('#valid_company_code').html( required_input+' '+business_license); return;
	}
	
	if( ! isnumberic(company_code) ) {
		$('#valid_company_code').html(business_license_only_number); return;
	}
	
	
	if(regRandom == '') {
		$('#valid_regRandom').html(captcha_not_match); return;
	}
	
	if(term != 1) { $('#valid_term').html(you_agree_term); return; }
	
	
	$('form#frm_reg').submit();
}


function validateSignin(){
	
	var username 	= $('#username').val();
	var pwd 		= $('#pwd').val();
	
	if(username == '') {
		$('#valid_username').html( required_input+' '+lang_username); return;
	}
	
	if( pwd =='') { $('#valid_pwd').html(passsword_not_match); return; }
	
	$('#frm_signin').submit();
}




function sendmailConfirm(){
	
	var email 	= $('#email').val();
	
	if( email == '' || !validEmail(email) ) {
		$('#valid_email').html(email_invalid); return;
	}
	
	$('#frm_confirm').submit();
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