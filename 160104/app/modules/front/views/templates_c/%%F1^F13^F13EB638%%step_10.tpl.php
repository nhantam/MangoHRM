<?php /* Smarty version 2.6.25, created on 2016-01-04 16:56:30
         compiled from empadd/step_10.tpl */ ?>
﻿ 
  
<div class="row">

	<div class="col-md-12">
		
		<!-- Experience -->
		<div class="box-generic"> 
			<div class="widget-head" style="background-color:#EAEAEA;">
				<h4 class="heading my-white"><?php echo $this->_tpl_vars['lable']['work_experience']['value']; ?>
</h4>
			</div>
			
			<div class="row">
				<div id="id_add_experience"> <!-- form hide-show-->
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "empadd/step10_experience.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				</div><!-- #id_add_experience-->
			</div>
		
			<div class="row">
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "empadd/step10_experience_list.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			</div>
		</div><!--// END box-generic-->
		
		<!-- -->
		

		
		<div class="col-md-12">
			(<span class="red">*</span>) <?php echo $this->_tpl_vars['lable']['required_field']['value']; ?>

			<div class="separator"></div>
		</div>
		
	</div>
</div>