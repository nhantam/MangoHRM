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
		
		
		
    </div>    
</div>

{include file="footer.tpl"}
{include file="script_validator.tpl"}

<script>

var please_input = "{$lable.please_input.value}"; 

var emp_number = "{$id}";
var action_experience = base_url+'empadd/addexperience/?id='+emp_number;


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
	
	
	$("#id_add_experience").hide();
	$("#id_creat_subordinates").hide();
	
	/*
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
	*/
	
{/literal}
</script>


<script type="text/javascript" src="{$base_url}/data/jquery/autocomplete/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="{$base_url}/data/jquery/autocomplete/jquery.autocomplete.css" />

<script>

{literal}

var emp_number = $("#emp_number").val();





{/literal}
</script>