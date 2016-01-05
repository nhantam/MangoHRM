{include file="header.tpl"}
{include file="sidebar.tpl"}

<!-- Content -->
<div id="content">

    {include file="sidebar_header.tpl"}
    
    {include file="breadcrumb.tpl"}
    <div class="innerLR"> 
	
		{if $alert neq ''} {include file="notes.tpl"} {/if}
        
		<form action="{$base_url}{$form.control}/{$form.action}/" method="post" name="frm_add_emp" id="frm_add_emp" enctype="multipart/form-data">
        	{include file="empadd/form_wizard.tpl"}
		</form>
        
    </div>    
</div>

{include file="footer.tpl"}
{include file="script_validator.tpl"}

<script>

var please_input = "{$lable.please_input.value}"; 
var input_firstname = please_input +" {$lable.firstname.value}"; 
var input_lastname = please_input +" {$lable.lastname.value}"; 
var input_username = please_input +" {$lable.username.value}"; 

var password_not_match = "{$lable.password_not_match.value}";
var username_exist = "{$lable.username_not_match.value}";

var input_password = please_input +" {$lable.password.value}"; 
var input_re_password = please_input +" {$lable.re_password.value}"; 


</script>

<script src="{$base_tpl}/js/empadd.js"></script>

<script>

{literal}

		if(document.getElementById('creat_login_account').checked) {
			$("#id_add_account_login").show();
		} else {
			$("#id_add_account_login").hide();
		}
			
{/literal}
</script>
