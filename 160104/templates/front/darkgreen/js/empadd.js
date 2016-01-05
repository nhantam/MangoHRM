
$(document).ready(function() { 
	
	
	// Show ID create  
	$('#creat_login_account').on('click', function(e) { 
		
		var term = $('input:checkbox[name=creat_login_account]:checked').val();
		
		if(term) {
			$("#id_add_account_login").show();
		} else {
			$("#id_add_account_login").hide();
		}
		
	});
	
	// Show creat_supervisors STEP9
	$('#creat_supervisors').on('click', function(e) { 
		
		var term1 = $('input:checkbox[name=creat_supervisors]:checked').val();
		
		if(term1) {
			$("#id_creat_supervisors").show();
			$("#id_creat_subordinates").hide();
			$('#creat_subordinates').attr('checked',false);
			
		} else {
			$("#id_creat_supervisors").hide();
		}
		
	});

		// Show creat_subordinates STEP9
	$('#creat_subordinates').on('click', function(e) { 
		
		var term2 = $('input:checkbox[name=creat_subordinates]:checked').val();

		if(term2) {
			$("#id_creat_subordinates").show();
			$("#id_creat_supervisors").hide();
			$('#creat_supervisors').attr('checked',false);
			
		} else {
			$("#id_creat_subordinates").hide();
		}
		
	});

	// check du lieu khi click NEXT
	$('#btn_step_1').on('click', function(e){
											
		var emp_lastname = $('#emp_lastname').val();
		var emp_firstname = $('#emp_firstname').val();
		
		if(emp_firstname == '') {
			$('#valid_emp_firstname').html( input_firstname);
			return false;
		}
		if(emp_lastname == '') {
			$('#valid_emp_lastname').html( input_lastname );
			return false;
		}
		
		//  Checked Tạo tài khoản thì mới vào if
		if(document.getElementById('creat_login_account').checked) {
			
			var username = $('#username').val();
			var password = $('#password').val();
			var re_password = $('#re_password').val();
		
				if(username == '') {
					$('#valid_username').html(input_username); 
					return false;
				}
				
				if(password == '' || re_password == '') {
					$('#valid_re_password').html(input_password);
					return false;
				}
				
				if(password != re_password) {
					$('#valid_re_password').html(password_not_match);
					return false;
				}
				
				
		}
		
		$('form#frm_add_emp').submit();
		
	});
	
	
	//  click NEXT khi o step 2
	$('#btn_step_2').on('click', function(e){
											
		$('form#frm_add_emp').submit();
		
	});
	
	//  click NEXT khi o step 3	
	$('#btn_step_3').on('click', function(e){
		//alert(1111111);									
		$('form#frm_add_emp').submit();
		
	});
	
		//  click NEXT khi o step 4	
	$('#btn_step_4').on('click', function(e){							
		$('form#frm_add_emp').submit();
		
	});
	
		//  click NEXT khi o step 5	
	$('#btn_step_5').on('click', function(e){							
		$('form#frm_add_emp').submit();
		
	});
	
	// var term = $('input:checkbox[name=creat_login_account]:checked').val();
	
	//emp_passport
	
	
		//  click NEXT khi o step 6
	$('#btn_step_6').on('click', function(e){

		if(! checkEmployeePartport() ) {
			$('#valid_ep_passport_type_flg').html( input_passport_type_flg );
			return false;
		}	
		
		var ep_passport_num = $('#ep_passport_num').val();
		if(ep_passport_num == '') {
			$('#valid_ep_passport_num').html( input_passport_num );
			return false;
		}
		
		$('form#frm_add_emp').submit();
		
		
	});
	
		//  click NEXT khi o step 7
	$('#btn_step_7').on('click', function(e){							
		$('form#frm_add_emp').submit();
		
	});
	
	//  click NEXT khi o step 8
	$('#btn_step_8').on('click', function(e){
										  
		var sal_grd_code = $('#sal_grd_code').val();
		var currency_id = $('#currency_id').val();
		var basic_salary = $('#basic_salary').val();
		var salary_component = $('#salary_component').val();

		
		if(sal_grd_code == '') {
			$('#valid_sal_grd_code').html( input_pay_grades);
			return false;
		}
		
		if(currency_id == "") {
			$('#valid_currency_id').html( input_currency);
			return false;
		} 
		
		if(basic_salary == '') {
			$('#valid_basic_salary_input').html( input_amount );
			return false;
		}
		
		if(salary_component == '') {
			$('#valid_salary_component').html( input_salary_component );
			return false;
		}

		var creat_login_account=  document.getElementById('creat_login_account').checked;
		
		if(creat_login_account) {
				
				var account_number = $('#account_number').val();
				var account_name = $('#account_name').val();
				var account_bank = $('#account_bank').val();
				var account_amount = $('#account_amount').val();
				
					if(account_number == '') {
						$('#valid_account_number').html(input_account_number); 
						return false;
					}

					if(account_name == '') {
						$('#valid_account_name').html(input_account_name); 
						return false;
					}
					
					if(account_bank == '') {
						$('#valid_account_bank').html(input_account_bank);
						return false;
					}
					
					if(account_amount == '') {
						$('#valid_account_amount').html(input_account_amount);
						return false;
					}
					
			}
		
			var basic_salary = $('#basic_salary').val().trim();
			var min_salary = $('#min_salary').val();
			var max_salary = $('#max_salary').val();
			
			// check int
			if( !isnumberic(basic_salary) ){ 
				$('#valid_input').html( input_minmax);
				return false;
			}
			
			basic_salary = parseFloat(basic_salary);
			min_salary = parseFloat(min_salary);
			max_salary = parseFloat(max_salary);
			
			// lay value min,max  //so sanh min, max / neu khong thoa / xuat thong bao loi
			if( (basic_salary < min_salary) || (basic_salary > max_salary) ){
				$('#valid_input').html( input_minmax);
				return false;
			}

		$('form#frm_add_emp').submit();
		
	});  // end step 8
	
		//  click SAVE khi o STEP 9
	$('#btn_step_9').on('click', function(e){	
										  
		var emp_id_q = $('#emp_id_q').val();
		var erep_reporting_mode = $('#erep_reporting_mode').val();
		var emp_id_q2 = $('#emp_id_q2').val();
		var erep_reporting_mode2 = $('#erep_reporting_mode2').val();
		
		var creat_supervisors = $('input:checkbox[name=creat_supervisors]:checked').val();
		var creat_subordinates = $('input:checkbox[name=creat_subordinates]:checked').val();
		
		if(creat_supervisors) {
			if(emp_id_q == '') {
				$('#valid_emp_id_q').html( input_fullname);
				return false;
			}
			if(erep_reporting_mode == 0) {
				$('#valid_erep_reporting_mode').html( input_reporting_mode);
				return false;
			}
		}
		
		
		if(creat_subordinates) {
			if(emp_id_q2 == '') {
				$('#valid_emp_id_q2').html( input_fullname);
				return false;
			}
			if(erep_reporting_mode2 == 0) {
				$('#valid_erep_reporting_mode2').html( input_reporting_mode);
				return false;
			}
		}
										  
		$('form#frm_add_emp').submit();
		
	});
	
	
	// STEP 10 ===============
	
	// STEP 10 Experience
	$('#btn_add_experience').on('click', function(e) { 
		$("#id_add_experience").show();
		$('#btn_add_experience').hide(); 
	});
	
	$('#btn_cancel_experience').on('click', function(e) { 
		$("#id_add_experience").hide();
		$('#btn_add_experience').show();
	});
	
	$('#btn_post_experience').on('click', function(e) { 
		
		$("#frm_add_emp").attr('action', action_experience);
		
		// validat
		
		
		$('form#frm_add_emp').submit();
		
	});
	
	//END STEP 10 Experience

		
});



/**
* hiden msg
* input id = name_end
* alert: valid_ + name_end
*/
function hideMsg(name_end){
	if( $('#'+name_end).val() != ''){ 
		$('#valid_'+name_end).html(''); 
	}
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

function checkEmployeePartport() {
	var flag = 0;
	
	$('#emp_passport input:radio').each(function () {

        var $this = $(this)

        if ($(this).prop('checked')) {
            flag = 1;
        }

    });
	
	return flag;

}


function paycurrency() {
	
	var id = $('#sal_grd_code').val();
	// $('#valid_basic_salary').html('');
	
	if( id ) { 
		$.ajax({ type: "POST",   
			 url: url_paycurrency,
			 async: false,
			 data: "id="+id,
			 success: function(text){ 
				// alert(text);
				$('#data_currency_id').html(text);
				// gan vao tien te data_currency_id
			 }
		});
	}
	
}

function payminmax() {
	
	var pay_grade_id = $('#sal_grd_code').val();
	var currency_id = $('#currency_id').val();
	
	// alert(pay_grade_id+'='+currency_id);
	
	if( pay_grade_id != '' && currency_id != '') { 
		
		$('#valid_currency_id').html('');
		
		$.ajax({ type: "POST",   
			 url: url_payminmax,
			 async: false,
			 data: "pg_id="+pay_grade_id+"&currency_id="+currency_id,
			 success: function(text){ 
				
				var obj = jQuery.parseJSON(text);
				
				var minMax,flag=0;
				if(obj.min_salary != '') {
					minMax = 'Min: '+obj.min_salary;
					flag = 1;
					$('#min_salary').val(obj.min_salary);
				}
				
				if(obj.max_salary != '') {
					minMax += ' - Max: '+obj.max_salary;
					flag = 1;
					$('#max_salary').val(obj.max_salary);
				}
				 
				if(flag = 1) {
					$('#valid_basic_salary').html(minMax);
				}
				
				var basic_salary = $('#basic_salary').val();
				 
				 if(basic_salary != '') {
					validMinMaxSalary(); 
				 }
				 
				// $('#data_currency_id').html(text);
				// gan vao tien te data_currency_id
				
				
			 }
		});
	}
	
}

//min max STEP 8
function validMinMaxSalary() {
	
	// lay value tu file salary
	var basic_salary = $('#basic_salary').val().trim();
	var min_salary = $('#min_salary').val();
	var max_salary = $('#max_salary').val();
	
	// check int
	if( !isnumberic(basic_salary) ){ 
		$('#valid_input').html( input_minmax);
		return false;
	}
	
	basic_salary = parseFloat(basic_salary);
	min_salary = parseFloat(min_salary);
	max_salary = parseFloat(max_salary);
	
	// lay value min,max  //so sanh min, max / neu khong thoa / xuat thong bao loi
 	if( (basic_salary < min_salary) || (basic_salary > max_salary) ){
		$('#valid_input').html( input_minmax);
		return false;
	} else {
		$('#valid_input').html('');
		$('#valid_basic_salary_input').html(''); 
	}
	
}