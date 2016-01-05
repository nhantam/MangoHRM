<?php /* Smarty version 2.6.25, created on 2016-01-04 15:48:27
         compiled from empadd/form_wizard.tpl */ ?>
﻿<!-- Form Wizard / Widget Tabs / Vertical -->
<input type="hidden" name="emp_number" id="emp_number" value="<?php echo $this->_tpl_vars['id']; ?>
" />
<input type="hidden" name="step" id="step" value="<?php echo $this->_tpl_vars['step']; ?>
" />

<div class="wizard">
	<div class="widget widget-tabs widget-tabs-double widget-tabs-vertical row row-merge">
		<!-- Widget heading -->
		<div class="widget-head col-md-3">
			<ul>
				<li <?php if ($this->_tpl_vars['step'] == 1): ?>class="active"<?php endif; ?>>
					<a href="<?php echo $this->_tpl_vars['base_url']; ?>
<?php echo $this->_tpl_vars['form']['control']; ?>
/step1/" class="glyphicons user">
						<i></i>
						<span class="strong"><?php echo $this->_tpl_vars['lable']['step']['value']; ?>
 1</span>
						<span><?php echo $this->_tpl_vars['lable']['add']['value']; ?>
</span>
					</a>
				</li>
				<li <?php if ($this->_tpl_vars['step'] == 2): ?>class="active"<?php endif; ?>>
					<a href="#tab2-4" class="glyphicons calculator" data-toggle="tab">
						<i></i>
						<span class="strong"><?php echo $this->_tpl_vars['lable']['step']['value']; ?>
 2</span>
						<span><?php echo $this->_tpl_vars['lable']['personal_details']['value']; ?>
</span>
					</a>
				</li>
				<li <?php if ($this->_tpl_vars['step'] == 3): ?>class="active"<?php endif; ?>>
					<a href="#tab3-4" class="glyphicons credit_card" data-toggle="tab">
						<i></i>
						<span class="strong"><?php echo $this->_tpl_vars['lable']['step']['value']; ?>
 3</span>
						<span><?php echo $this->_tpl_vars['lable']['contact_detail']['value']; ?>
</span>
					</a>
				</li>
				<li <?php if ($this->_tpl_vars['step'] == 4): ?>class="active"<?php endif; ?>>
					<a href="#tab4-4" class="glyphicons circle_ok" data-toggle="tab">
						<i></i>
						<span class="strong"><?php echo $this->_tpl_vars['lable']['step']['value']; ?>
 4</span>
						<span><?php echo $this->_tpl_vars['lable']['emergency_contacts']['value']; ?>
</span>
					</a>
				</li>
				<li <?php if ($this->_tpl_vars['step'] == 5): ?>class="active"<?php endif; ?>>
					<a href="#tab4-4" class="glyphicons circle_ok" data-toggle="tab">
						<i></i>
						<span class="strong"><?php echo $this->_tpl_vars['lable']['step']['value']; ?>
 5</span>
						<span><?php echo $this->_tpl_vars['lable']['dependents']['value']; ?>
</span>
					</a>
				</li>
				<li <?php if ($this->_tpl_vars['step'] == 6): ?>class="active"<?php endif; ?>>
					<a href="#tab5-4" class="glyphicons circle_ok" data-toggle="tab">
						<i></i>
						<span class="strong"><?php echo $this->_tpl_vars['lable']['step']['value']; ?>
 6</span>
						<span><?php echo $this->_tpl_vars['lable']['immigration']['value']; ?>
</span>
					</a>
				</li>
				
				<li <?php if ($this->_tpl_vars['step'] == 7): ?>class="active"<?php endif; ?>>
					<a href="#tab6-4" class="glyphicons circle_ok" data-toggle="tab">
						<i></i>
						<span class="strong"><?php echo $this->_tpl_vars['lable']['step']['value']; ?>
 7</span>
						<span><?php echo $this->_tpl_vars['lable']['job']['value']; ?>
</span>
					</a>
				</li>
				
				<li <?php if ($this->_tpl_vars['step'] == 8): ?>class="active"<?php endif; ?>>
					<a href="#tab6-4" class="glyphicons circle_ok" data-toggle="tab">
						<i></i>
						<span class="strong"><?php echo $this->_tpl_vars['lable']['step']['value']; ?>
 8</span>
						<span><?php echo $this->_tpl_vars['lable']['salary']['value']; ?>
</span>
					</a>
				</li>
				
				<li <?php if ($this->_tpl_vars['step'] == 9): ?>class="active"<?php endif; ?>>
					<a href="<?php echo $this->_tpl_vars['base_url']; ?>
<?php echo $this->_tpl_vars['form']['control']; ?>
/step9/?id=<?php echo $this->_tpl_vars['id']; ?>
" class="glyphicons circle_ok">
						<i></i>
						<span class="strong"><?php echo $this->_tpl_vars['lable']['step']['value']; ?>
 9</span>
						<span><?php echo $this->_tpl_vars['lable']['report_to']['value']; ?>
</span>
					</a>
				</li>
				
				<li>
					<a href="#tab10-4" class="glyphicons circle_ok" data-toggle="tab">
						<i></i>
						<span class="strong"><?php echo $this->_tpl_vars['lable']['step']['value']; ?>
 10</span>
						<span><?php echo $this->_tpl_vars['lable']['qualifications']['value']; ?>
</span>
					</a>
				</li>
				
				<li>
					<a href="#tab11-4" class="glyphicons circle_ok" data-toggle="tab">
						<i></i>
						<span class="strong"><?php echo $this->_tpl_vars['lable']['step']['value']; ?>
 11</span>
						<span><?php echo $this->_tpl_vars['lable']['memberships']['value']; ?>
</span>
					</a>
				</li>
				
				
			</ul>
		</div>
		<!-- // Widget heading END -->
		<div class="widget-body col-md-9">
			<div class="tab-content">
				<!-- Step 1 -->
				<div class="tab-pane <?php if ($this->_tpl_vars['step'] == 1): ?>active<?php endif; ?>" id="tab1-11">
					<?php if ($this->_tpl_vars['step'] == 1): ?>
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "empadd/step_1.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					<?php endif; ?>
				</div>
				<!-- // Step 1 END -->
				<!-- Step 2 -->
				<div class="tab-pane <?php if ($this->_tpl_vars['step'] == 2): ?>active<?php endif; ?>" id="tab2-11">
				<?php if ($this->_tpl_vars['step'] == 2): ?>
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "empadd/step_2.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				<?php endif; ?>
				</div>
				<!-- // Step 2 END -->
				<!-- Step 3 -->
				<div class="tab-pane <?php if ($this->_tpl_vars['step'] == 3): ?>active<?php endif; ?>" id="tab3-11">
				<?php if ($this->_tpl_vars['step'] == 3): ?>
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "empadd/step_3.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				<?php endif; ?>
				</div>
				<!-- // Step 3 END -->
				<!-- Step 4 -->
				<div class="tab-pane <?php if ($this->_tpl_vars['step'] == 4): ?>active<?php endif; ?>" id="tab4-11">
				<?php if ($this->_tpl_vars['step'] == 4): ?>
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "empadd/step_4.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				<?php endif; ?>
				</div>
				<!-- // Step 4 END -->
				
				<!-- Step 5 -->
				<div class="tab-pane <?php if ($this->_tpl_vars['step'] == 5): ?>active<?php endif; ?>" id="tab5-11">
				<?php if ($this->_tpl_vars['step'] == 5): ?>
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "empadd/step_5.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				<?php endif; ?>
				</div>
				<!-- // Step 5 END -->
				
				<!-- Step 6 -->
				<div class="tab-pane <?php if ($this->_tpl_vars['step'] == 6): ?>active<?php endif; ?>" id="tab5-11">
				<?php if ($this->_tpl_vars['step'] == 6): ?>
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "empadd/step_6.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				<?php endif; ?>
				</div>
				<!-- // Step 6 END -->
				
				<!-- Step 7 -->
				<div class="tab-pane <?php if ($this->_tpl_vars['step'] == 7): ?>active<?php endif; ?>" id="tab5-11">
				<?php if ($this->_tpl_vars['step'] == 7): ?>
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "empadd/step_7.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				<?php endif; ?>
				</div>
				<!-- // Step 7 END -->
				
				<!-- Step 8-->
				<div class="tab-pane <?php if ($this->_tpl_vars['step'] == 8): ?>active<?php endif; ?>" id="tab5-11">
				<?php if ($this->_tpl_vars['step'] == 8): ?>
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "empadd/step_8.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				<?php endif; ?>
				</div>
				<!-- // Step 8 END -->
				
				<!-- Step 9 -->
				<div class="tab-pane <?php if ($this->_tpl_vars['step'] == 9): ?>active<?php endif; ?>" id="tab5-11">
				<?php if ($this->_tpl_vars['step'] == 9): ?>
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "empadd/step_9.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				<?php endif; ?>
				</div>
				<!-- // Step 9 END -->
				
				<!-- Step 10 -->
				<div class="tab-pane <?php if ($this->_tpl_vars['step'] == 10): ?>active<?php endif; ?>" id="tab5-11">
				<?php if ($this->_tpl_vars['step'] == 10): ?>
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "empadd/step_10.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				<?php endif; ?>
				</div>
				<!-- // Step 9 END -->
				
				<!--
				<ul class="pagination margin-bottom-none pull-left">
					<li class="primary previous first"><a href="#" class="no-ajaxify">First</a>
					</li>
					<li class="last primary"><a href="#" class="no-ajaxify">Last</a>
					</li>
				</ul>
				-->
				
				<?php if ($this->_tpl_vars['step'] == 8 && $this->_tpl_vars['sub'] != ''): ?>
					<div class="pull-right">
						<button type="button" class="btn btn-primary btn_add_general" id="btn_step_<?php echo $this->_tpl_vars['step']; ?>
" name="btn_step_<?php echo $this->_tpl_vars['step']; ?>
"><i class="fa fa-check-circle"></i> <?php echo $this->_tpl_vars['lable']['btn_save']['value']; ?>
</button>
					</div>
				<?php elseif ($this->_tpl_vars['step'] == 9): ?>
					<div class="pull-right">
						<button type="button" class="btn btn-primary btn_add_general" id="btn_step_<?php echo $this->_tpl_vars['step']; ?>
" name="btn_step_<?php echo $this->_tpl_vars['step']; ?>
"><i class="fa fa-check-circle"></i> <?php echo $this->_tpl_vars['lable']['btn_save']['value']; ?>
</button>
					</div>
					
				<?php else: ?>
					<ul class="pagination margin-bottom-none pull-right">
						<li class="primary previous disabled"><a href="#" class="no-ajaxify">Previous</a>
						</li>
						<li class="next primary"><a id="btn_step_<?php echo $this->_tpl_vars['step']; ?>
" class="no-ajaxify">Next</a>
						</li>
						<li class="next finish primary" style="display:none;"><a href="#" class="no-ajaxify">Finish</a>
						</li>
					</ul>
				<?php endif; ?>
				
				

				<div class="clearfix"></div>
				<!-- // Wizard pagination controls END -->
			</div>
		</div>
	</div>
</div>
<!-- // Form Wizard / Widget Tabs / Vertical END -->