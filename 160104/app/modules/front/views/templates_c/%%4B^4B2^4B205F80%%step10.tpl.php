<?php /* Smarty version 2.6.25, created on 2016-01-04 17:00:33
         compiled from empadd/step10.tpl */ ?>
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

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">


  
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

var emp_number = "<?php echo $this->_tpl_vars['id']; ?>
";
var action_experience = base_url+'empadd/addexperience/?id='+emp_number;


var task = "<?php echo $this->_tpl_vars['task']; ?>
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
	
	
	$("#id_add_experience").hide();
	$("#id_creat_subordinates").hide();
	
	/*
	if(task == 1) {
		$("#id_creat_supervisors").show();
		$( "#creat_subordinates" ).attr( "disabled", \'disabled\' );
		//$(\'#creat_subordinates\').first().attr("hidden", true);
	}
	
	if(task == 2) {
		$("#id_creat_subordinates").show();
		$( "#creat_supervisors" ).attr( "disabled", \'disabled\' );
		//$(\'#creat_supervisors\').first().attr("hidden", true);
	}
	*/
	
'; ?>

</script>


<script type="text/javascript" src="<?php echo $this->_tpl_vars['base_url']; ?>
/data/jquery/autocomplete/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['base_url']; ?>
/data/jquery/autocomplete/jquery.autocomplete.css" />

<script>

<?php echo '

var emp_number = $("#emp_number").val();





'; ?>

</script>