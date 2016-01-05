

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


$(document).ready(function() { 
	
	// Setting/General
	$('#btn_pay_grades').on('click', function(e) { //add multi general	
											  
		var currency_id = $('#currency_id').val();
		
		var min_salary = $('#min_salary').val();
		var max_salary = $('#max_salary').val();
		
		if(currency_id == '') {
			$('#valid_currency_id').html(valid_currency_id); return false;	
		}
		
		if(min_salary != '' && !isnumberic(min_salary) ) {
			$('#valid_min_salary').html(require_input_int); return false;
		}
		
		if(max_salary != '' && !isnumberic(max_salary)) {
			$('#valid_max_salary').html(require_input_int); return false;
		}
		
		$('form#frm_pay_grades').submit();
		
	});
	
	
	
});


