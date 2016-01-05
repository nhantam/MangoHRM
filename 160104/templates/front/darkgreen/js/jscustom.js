$(document).ready(function(e){
    $('.search-panel .dropdown-menu').find('a').click(function(e) {
        e.preventDefault();
        var param = $(this).attr("href").replace("#","");
        var concept = $(this).text();
		
		$('.search-panel span#search_concept').text(concept);
        $('.input-group #search_param').val(param);
		
		var search_type = $(this).attr("name");
		$('#search').val(search_type);
    });
	
	$('#btSearch').click(function(e) { 
		if( validSearch() ){
			$('form#frm_search').submit();
		} else {
			e.preventDefault();
		}
	});
	
	$('.submit_on_enter').keydown(function(event) {
        if (event.keyCode == 13 && validSearch() == false) {
			event.preventDefault();
            return false;
         }
    });
	 
	 
	 $('#btnContact').click(function(e) {
		if( validContact() ) {
			var f = $("form#frm_message");
            
			$.ajax({ type: "POST",   
				 url: url_contact,
				 async: false,
				 data: f.serialize(),
				 success: function(text){ 
					if(text == 1){
						//$('form#frm_message').reset();
						$("#frm_message").trigger('reset');
						$('#valid_form').html(send_mail_succ);
					} else if(text == 2) {
						$('#valid_form').html(system_send_fail);
					} else if(text == 0) {
						$('#valid_form').html(send_mail_fail);
					}
				 }
			});		
		}
	});
	 
});

$(document).ready(function(e){
    $('.lang-panel .dropdown-menu').find('a').click(function(e) {
        e.preventDefault();
        var param = $(this).attr("href").replace("#","");
        var concept = $(this).text();
        $('.lang-panel span#search_concept').text(concept);
        $('.input-group #search_param').val(param);
    });
});  


$(function(){
	window.prettyPrint && prettyPrint();
});


$(".meter > span").each(function() {
  $(this)
    .data("origWidth", $(this).width())
    .width(0)
    .animate({
      width: $(this).data("origWidth") // or + "%" if fluid
    }, 1200);
});

function hideMsgOther(id_name_end){  $('#'+id_name_end).html(''); }

function hideMsg(name_end){
	if( $('#'+name_end).val() != '') { $('#valid_'+name_end).html(''); }
}

function hideTerm(term){
	var term = $('input:checkbox[name=term]:checked').val();
	if(term == 1) { $('#valid_'+term).html(''); }
}

function validSearch() {
	var q = $('#q').val();
	var search_type = $('#search').val();
	
	if(q == '' || search_type == '') { return false; }
	
	if(search_type == 'product') {
		$('#frm_search').attr('action', base_url+'product/search/');
	} else if (search_type == 'hscode') {
		$('#frm_search').attr('action', base_url+'hscode/');
	} else if (search_type == 'hscodevn') {
		$('#frm_search').attr('action', base_url+'hscode/vietnam/');
	} else if (search_type == 'seller') {
		$('#frm_search').attr('action', base_url+'seller/search/');
	}
	
	return true;
}


function validContact() {
	var message = $('#message').val();
	var qty = $('#qty').val();
	var term = $('input:checkbox[name=term]:checked').val();
	
	if(message == '' || qty == '') { $('#valid_form').html(please_fill_required_fields); return false; } 
	
	if(term != 1) { $('#valid_term').html(you_agree_term); return false; }
	
	return true;
}