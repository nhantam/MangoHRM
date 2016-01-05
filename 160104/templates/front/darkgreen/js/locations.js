
$(document).ready(function() { 
	
	// Add/Edit Setting/Locations
	$('#btnSaveLocation').on('click', function(e) { //add multi general	
											  
		var name = $('#name').val();
		var country_code = $('#country_code').val();
		
		
		if(name == '') {
			$('#valid_name').html(please_input_name); return false;	
		}
		
		if(country_code == '' ) {
			$('#valid_country_code').html(please_select_country); return false;
		}
		
		
		$('form#frm_data').submit();
		
	});
	
	
});


function hideMsg(name_end){
	if( $('#'+name_end).val() != '') { $('#valid_'+name_end).html(''); }
}

