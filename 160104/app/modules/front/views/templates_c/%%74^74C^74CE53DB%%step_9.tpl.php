<?php /* Smarty version 2.6.25, created on 2015-12-31 14:10:08
         compiled from empadd/step_9.tpl */ ?>
﻿ 
  
<div class="row">
	<div class="col-md-2">
		<strong>Product title</strong>
		<p class="muted">Lorem ipsum dolor sit amet, consecteturadipiscing elit.</p>
	</div>
	<div class="col-md-10">
		
		<!-- form hide-show-->
		<div class="box-generic">
		<div class="row">
		
		<!--Thêm Cấp Trên-->
			<div class="col-md-12">
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['add']['value']; ?>
 <?php echo $this->_tpl_vars['lable']['assigned_supervisors']['value']; ?>
</label>  
				<input type="checkbox" value="1" name="creat_supervisors" id="creat_supervisors" <?php if ($this->_tpl_vars['creat_supervisors'] == 1 || $this->_tpl_vars['task'] == 1): ?> checked="checked"  <?php endif; ?>  />
				<div class="separator"></div>
			</div>
			
			<div id="id_creat_supervisors">
			<div class="col-md-6">

					<!-- Tên cấp trên-->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['fullname']['value']; ?>
 (<span class="red">*</span>)</label>			
				<div class="input-group col-md-12">
				<input type="text" id="search-box" name="q" value="<?php echo $this->_tpl_vars['data']['fullname']; ?>
<?php if ($this->_tpl_vars['data']['name'] != ''): ?> - <?php endif; ?><?php echo $this->_tpl_vars['data']['name']; ?>
" class="col-md-6 form-control" onblur="hideMsg('emp_id_q')"  />
				<input type="hidden" name="data[emp_id_q]" id="emp_id_q" value="<?php echo $this->_tpl_vars['data']['emp_number']; ?>
" />
				<span id="valid_emp_id_q" class="red"><?php echo $this->_tpl_vars['valid']['emp_id_q']; ?>
</span>
				</div>
				<div class="separator"></div>	
				  
			</div>
			<div class="col-md-6">
			
				<!-- Hình thức báo cáo -->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['report_method']['value']; ?>
 (<span class="red">*</span>)</label>
				<div class="input-group col-md-12">
				<select name="data[erep_reporting_mode]" id= "erep_reporting_mode" class="col-md-4 form-control" onblur="hideMsg('erep_reporting_mode')" >
					<option value="0" <?php if ($this->_tpl_vars['data']['erep_reporting_mode'] == 0): ?> selected="selected"<?php endif; ?>> ---<?php echo $this->_tpl_vars['lable']['select']['value']; ?>
--- </option>	
					<option value="1" <?php if ($this->_tpl_vars['data']['erep_reporting_mode'] == 1): ?> selected="selected"<?php endif; ?>> <?php echo $this->_tpl_vars['lable']['direct']['value']; ?>
 </option>				
					<option value="2" <?php if ($this->_tpl_vars['data']['erep_reporting_mode'] == 2): ?> selected="selected"<?php endif; ?>> <?php echo $this->_tpl_vars['lable']['indirect']['value']; ?>
 </option>
					<option value="3" <?php if ($this->_tpl_vars['data']['erep_reporting_mode'] == 3): ?> selected="selected"<?php endif; ?>> <?php echo $this->_tpl_vars['lable']['other']['value']; ?>
 </option>
				</select>
				<span id="valid_erep_reporting_mode" class="red"><?php echo $this->_tpl_vars['valid']['erep_reporting_mode']; ?>
</span>
				</div>
				<div class="separator"></div>		

				 
			</div>
			
			</div><!-- #id_creat_supervisors-->
			
		</div>
		</div>		
		<!--// END form hide-show-->
		
		
		<!-- form hide-show-->
		<div class="box-generic">
		<div class="row">
		<!--
		<!--Thêm Cấp dưới-->
			<div class="col-md-12">
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['add']['value']; ?>
 <?php echo $this->_tpl_vars['lable']['assigned_subordinates']['value']; ?>
</label>  
				<input type="checkbox" value="1" name="creat_subordinates" id="creat_subordinates" <?php if ($this->_tpl_vars['creat_subordinates'] == 1 || $this->_tpl_vars['task'] == 2): ?> checked="checked" <?php endif; ?>  />
				<div class="separator"></div>
			</div>
			
			<div id="id_creat_subordinates">
			<div class="col-md-6">
			
				<!-- Tên cấp dưới -->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['fullname']['value']; ?>
 (<span class="red">*</span>)</label>			
				<div class="input-group col-md-12">
					<input type="text" id="search-box2" name="q" value="<?php echo $this->_tpl_vars['data']['fullname']; ?>
<?php if ($this->_tpl_vars['data']['name'] != ''): ?> - <?php endif; ?><?php echo $this->_tpl_vars['data']['name']; ?>
" class="col-md-6 form-control" onblur="hideMsg('emp_id_q2')" />
					<input type="hidden" name="data2[emp_id_q2]" id="emp_id_q2" value="<?php echo $this->_tpl_vars['data']['emp_number']; ?>
"  />
					<span id="valid_emp_id_q2" class="red"> <?php echo $this->_tpl_vars['valid']['emp_id_q2']; ?>
 </span>
				</div>
				<div class="separator"></div>	
				  
			</div>
			<div class="col-md-6">
			
				<!-- Hình thức báo cáo -->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['report_method']['value']; ?>
 (<span class="red">*</span>)</label>
				<div class="input-group col-md-12">
				<select name="data2[erep_reporting_mode2]" id="erep_reporting_mode2" class="col-md-4 form-control" onblur="hideMsg('erep_reporting_mode2')">
					<option value="0" <?php if ($this->_tpl_vars['data']['erep_reporting_mode'] == 0): ?> selected="selected"<?php endif; ?>> ---<?php echo $this->_tpl_vars['lable']['select']['value']; ?>
--- </option>	
					<option value="1" <?php if ($this->_tpl_vars['data']['erep_reporting_mode'] == 1): ?> selected="selected"<?php endif; ?>> <?php echo $this->_tpl_vars['lable']['direct']['value']; ?>
 </option>				
					<option value="2" <?php if ($this->_tpl_vars['data']['erep_reporting_mode'] == 2): ?> selected="selected"<?php endif; ?>> <?php echo $this->_tpl_vars['lable']['indirect']['value']; ?>
 </option>
					<option value="3" <?php if ($this->_tpl_vars['data']['erep_reporting_mode'] == 3): ?> selected="selected"<?php endif; ?>> <?php echo $this->_tpl_vars['lable']['other']['value']; ?>
 </option>
				</select>
				<span id="valid_erep_reporting_mode2" class="red"><?php echo $this->_tpl_vars['valid']['erep_reporting_mode2']; ?>
</span>
				</div>
				<div class="separator"></div>		

				 
			</div>
			
			</div><!-- #id_creat_subordinates-->
			
		</div>
		</div>		
		<!--// END form hide-show-->
		
		<div class="col-md-12">
			(<span class="red">*</span>) <?php echo $this->_tpl_vars['lable']['required_field']['value']; ?>

			<div class="separator"></div>
		</div>
		
	</div>
</div>