{include file="header.tpl"}
{include file="sidebar.tpl"}

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">


  
<!-- Content -->
<div id="content">

    {include file="sidebar_header.tpl"}
    
    {include file="breadcrumb.tpl"}
    <div class="innerLR"> 
	
		{if $alert neq ''} {include file="notes.tpl"} {/if}
        <form action="{$base_url}{$form.control}/{$form.action}/?id={$id}&sub={$sub}&option={$option}&sub_option={$sub_option}" method="post" name="frm_add_emp" id="frm_add_emp" enctype="multipart/form-data">
		
        	{include file="empadd/form_wizard.tpl"}
		</form>
		
        	{include file="empadd/step_9_list.tpl"}
		
		
    </div>    
</div>

{include file="footer.tpl"}
{include file="script_validator.tpl"}

<script>

var please_input = "{$lable.please_input.value}"; 
var input_fullname = please_input +" {$lable.fullname.value}"; 
var input_reporting_mode = please_input +" {$lable.report_method.value}"; 


var task = "{$task}";

</script>

<script src="{$base_tpl}/js/empadd.js"></script>
<script src="{$base_tpl}/assets/components/library/bootstrap/js/bootstrap-tooltip.js"></script>
<script src="{$base_tpl}/assets/components/library/bootstrap/js/bootstrap-confirmation.js"></script>

<script>
{literal}

	!function ($) {	
	
		$(function(){ 
			$('[data-toggle="confirmation"]').confirmation(); 
		}) 
	}(window.jQuery)
	
	
	$("#id_creat_supervisors").hide();
	$("#id_creat_subordinates").hide();
	
	if(task == 1) {
		$("#id_creat_supervisors").show();
		$( "#creat_subordinates" ).attr( "disabled", 'disabled' );
		//$('#creat_subordinates').first().attr("hidden", true);
	}
	
	if(task == 2) {
		$("#id_creat_subordinates").show();
		$( "#creat_supervisors" ).attr( "disabled", 'disabled' );
		//$('#creat_supervisors').first().attr("hidden", true);
	}
	
{/literal}
</script>


<script type="text/javascript" src="{$base_url}/data/jquery/autocomplete/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="{$base_url}/data/jquery/autocomplete/jquery.autocomplete.css" />

<script>

{literal}

var emp_number = $("#emp_number").val();

var url_search = base_url+"empajx/autoreport/?emp_number="+emp_number;

// search name supervisors STEP9 
function typeSearch() {	
	
	$("#search-box").autocomplete(url_search, {
		width: 300,
		scrollHeight: 300,
		mustMatch: false,
		matchContains: true,
		selectFirst: false,
		max: 10,
		minChars: 1,
		
		formatItem: function(row){
			var ret = '';
			if(row[3] != '') {
				ret += '<div style="float:left" class="auleft"><a href='+row[0]+'>'+row[1]+'</a></div>';
			} 
				  
			return ret;
		}
			
	}).result(function(event, data, formatted) {	
		
		$('#search-box').val(data[1]);
		$('#emp_id_q').val(data[0]);
		
	});
}

// search name supervisors STEP9

function typeSearch2() {	
	
	$("#search-box2").autocomplete(url_search, {
		width: 300,
		scrollHeight: 300,
		
		mustMatch: false,
		matchContains: true,
		selectFirst: false,
		max: 10,
		
		formatItem: function(row){          
			var ret = '';
			if(row[3] != '') {
				ret += '<div style="float:left" class="auleft"><a href='+row[0]+'>'+row[1]+'</a></div>';
			} 
				  
			return ret;
		}
			
	}).result(function(event, data, formatted) {	
		
		$('#search-box2').val(data[1]);
		$('#emp_id_q2').val(data[0]);
		
		
	});
}



$(document).ready(function () {

	typeSearch();
	typeSearch2();

});
	
{/literal}
</script>