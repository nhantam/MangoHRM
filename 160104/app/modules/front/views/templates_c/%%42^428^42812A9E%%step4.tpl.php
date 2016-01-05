<?php /* Smarty version 2.6.25, created on 2016-01-04 11:01:02
         compiled from empadd/step4.tpl */ ?>
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
" method="post" name="frm_add_emp" id="frm_add_emp" enctype="multipart/form-data">
        	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "empadd/form_wizard.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		</form>
        
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
var input_firstname = please_input +" <?php echo $this->_tpl_vars['lable']['firstname']['value']; ?>
"; 
var input_lastname = please_input +" <?php echo $this->_tpl_vars['lable']['lastname']['value']; ?>
"; 
var input_username = please_input +" <?php echo $this->_tpl_vars['lable']['username']['value']; ?>
"; 

var password_not_match = "<?php echo $this->_tpl_vars['lable']['password_not_match']['value']; ?>
";
var username_exist = "<?php echo $this->_tpl_vars['lable']['username_not_match']['value']; ?>
";

var input_password = please_input +" <?php echo $this->_tpl_vars['lable']['password']['value']; ?>
"; 
var input_re_password = please_input +" <?php echo $this->_tpl_vars['lable']['re_password']['value']; ?>
"; 


</script>

<script src="<?php echo $this->_tpl_vars['base_tpl']; ?>
/js/empadd.js"></script>

