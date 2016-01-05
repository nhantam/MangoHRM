{include file="header.tpl"}
{include file="sidebar.tpl"}

<!-- Content -->
<div id="content">

    {include file="sidebar_header.tpl"}
    
    {include file="breadcrumb.tpl"}
    <div class="innerLR"> 
	
		{if $alert neq ''} {include file="notes.tpl"} {/if}
        <form action="{$base_url}{$form.control}/{$form.action}/?id={$id}&sub={$sub}&option={$option}&sub_option={$sub_option}" method="post" name="frm_add_emp" id="frm_add_emp" enctype="multipart/form-data">
        	{include file="empadd/form_wizard.tpl"}
		</form>
        
		{include file="empadd/step_8_list.tpl"}
		
    </div>    
</div>

{include file="footer.tpl"}
{include file="script_validator.tpl"}

<script>

var please_input = "{$lable.please_input.value}"; 
var input_currency = please_input +" {$lable.currency.value}"; 
var input_amount = please_input +" {$lable.amount.value}"; 
var input_salary_component = please_input +" {$lable.salary_component.value}"; 
var input_pay_grades = please_input +" {$lable.pay_grades.value}"; 

var password_not_match = "{$lable.password_not_match.value}";
var username_exist = "{$lable.username_not_match.value}";

var input_account_number = please_input +" {$lable.account_number.value}"; 
var input_account_name = please_input +" {$lable.account_name.value}"; 
var input_account_bank = please_input +" {$lable.account_bank.value}"; 
var input_account_amount = please_input +" {$lable.amount.value}"; 

var url_paycurrency = base_url+"empajx/paycurrency/";
var url_payminmax = base_url+"empajx/payminmax/";
var input_minmax = please_input +" {$lable.minmaxval.value}";

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
	

	if(document.getElementById('creat_login_account').checked) {
		$("#id_add_account_login").show();
	} else {
		$("#id_add_account_login").hide();
	}
	
{/literal}
</script>


