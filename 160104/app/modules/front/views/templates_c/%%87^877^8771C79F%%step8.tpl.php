<?php /* Smarty version 2.6.25, created on 2015-12-31 14:06:51
         compiled from empadd/step8.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "sidebar.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<!-- Content -->
<div id="content">

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "sidebar_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "breadcrumb.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <div class="innerLR"> 
	
		<?php if ($this->_tpl_vars['alert'] != ''): ?> <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "notes.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> <?php endif; ?>
        <form action="<?php echo $this->_tpl_vars['base_url']; ?>
<?php echo $this->_tpl_vars['form']['control']; ?>
/<?php echo $this->_tpl_vars['form']['action']; ?>
/?id=<?php echo $this->_tpl_vars['id']; ?>
&sub=<?php echo $this->_tpl_vars['sub']; ?>
&option=<?php echo $this->_tpl_vars['option']; ?>
&sub_option=<?php echo $this->_tpl_vars['sub_option']; ?>
" method="post" name="frm_add_emp" id="frm_add_emp" enctype="multipart/form-data">
        	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "empadd/form_wizard.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		</form>
        
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "empadd/step_8_list.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		
    </div>    
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "script_validator.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script>

var please_input = "<?php echo $this->_tpl_vars['lable']['please_input']['value']; ?>
"; 
var input_currency = please_input +" <?php echo $this->_tpl_vars['lable']['currency']['value']; ?>
"; 
var input_amount = please_input +" <?php echo $this->_tpl_vars['lable']['amount']['value']; ?>
"; 
var input_salary_component = please_input +" <?php echo $this->_tpl_vars['lable']['salary_component']['value']; ?>
"; 
var input_pay_grades = please_input +" <?php echo $this->_tpl_vars['lable']['pay_grades']['value']; ?>
"; 

var password_not_match = "<?php echo $this->_tpl_vars['lable']['password_not_match']['value']; ?>
";
var username_exist = "<?php echo $this->_tpl_vars['lable']['username_not_match']['value']; ?>
";

var input_account_number = please_input +" <?php echo $this->_tpl_vars['lable']['account_number']['value']; ?>
"; 
var input_account_name = please_input +" <?php echo $this->_tpl_vars['lable']['account_name']['value']; ?>
"; 
var input_account_bank = please_input +" <?php echo $this->_tpl_vars['lable']['account_bank']['value']; ?>
"; 
var input_account_amount = please_input +" <?php echo $this->_tpl_vars['lable']['amount']['value']; ?>
"; 

var url_paycurrency = base_url+"empajx/paycurrency/";
var url_payminmax = base_url+"empajx/payminmax/";
var input_minmax = please_input +" <?php echo $this->_tpl_vars['lable']['minmaxval']['value']; ?>
";

</script>

<script src="<?php echo $this->_tpl_vars['base_tpl']; ?>
/js/empadd.js"></script>
<script src="<?php echo $this->_tpl_vars['base_tpl']; ?>
/assets/components/library/bootstrap/js/bootstrap-tooltip.js"></script>
<script src="<?php echo $this->_tpl_vars['base_tpl']; ?>
/assets/components/library/bootstrap/js/bootstrap-confirmation.js"></script>

<script>
<?php echo '

	!function ($) {	
		$(function(){ 
			$(\'[data-toggle="confirmation"]\').confirmation(); 
		}) 
	}(window.jQuery)
	

	if(document.getElementById(\'creat_login_account\').checked) {
		$("#id_add_account_login").show();
	} else {
		$("#id_add_account_login").hide();
	}
	
'; ?>

</script>

