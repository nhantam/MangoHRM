<?php /* Smarty version 2.6.25, created on 2015-12-31 14:10:08
         compiled from empadd/step9.tpl */ ?>
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
		
        	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "empadd/step_9_list.tpl", 'smarty_include_vars' => array()));
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
var input_fullname = please_input +" <?php echo $this->_tpl_vars['lable']['fullname']['value']; ?>
"; 
var input_reporting_mode = please_input +" <?php echo $this->_tpl_vars['lable']['report_method']['value']; ?>
"; 


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
	
	
	$("#id_creat_supervisors").hide();
	$("#id_creat_subordinates").hide();
	
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
	
'; ?>

</script>


<script type="text/javascript" src="<?php echo $this->_tpl_vars['base_url']; ?>
/data/jquery/autocomplete/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['base_url']; ?>
/data/jquery/autocomplete/jquery.autocomplete.css" />

<script>

<?php echo '

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
			var ret = \'\';
			if(row[3] != \'\') {
				ret += \'<div style="float:left" class="auleft"><a href=\'+row[0]+\'>\'+row[1]+\'</a></div>\';
			} 
				  
			return ret;
		}
			
	}).result(function(event, data, formatted) {	
		
		$(\'#search-box\').val(data[1]);
		$(\'#emp_id_q\').val(data[0]);
		
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
			var ret = \'\';
			if(row[3] != \'\') {
				ret += \'<div style="float:left" class="auleft"><a href=\'+row[0]+\'>\'+row[1]+\'</a></div>\';
			} 
				  
			return ret;
		}
			
	}).result(function(event, data, formatted) {	
		
		$(\'#search-box2\').val(data[1]);
		$(\'#emp_id_q2\').val(data[0]);
		
		
	});
}



$(document).ready(function () {

	typeSearch();
	typeSearch2();

});
	
'; ?>

</script>