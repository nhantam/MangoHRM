<?php /* Smarty version 2.6.25, created on 2016-01-04 09:39:40
         compiled from empadd/step_7.tpl */ ?>
﻿
<div class="row">
	<div class="col-md-2">
		<strong>Product title</strong>
		<p class="muted">Lorem ipsum dolor sit amet, consecteturadipiscing elit.</p>
	</div>
	<div class="col-md-10">
		<!-- group box 1-->
		<div class="box-generic">
		<div class="row">
			<!-- group box 1--left-->
			<div class="col-md-6">
			
							
				<!-- chức vụ -->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['job_title']['value']; ?>
</label>
				<div class="input-group col-md-12">
				<select name="data[emp_job_title]" class="col-md-4 form-control">
						<option value="">-- <?php echo $this->_tpl_vars['lable']['select']['value']; ?>
 <?php echo $this->_tpl_vars['lable']['job_title']['value']; ?>
 --</option>
						<?php $_from = $this->_tpl_vars['cbxJobTitle']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vl']):
?>
						<option value="<?php echo $this->_tpl_vars['k']; ?>
"  <?php if ($this->_tpl_vars['data']['emp_job_title'] == $this->_tpl_vars['k']): ?> selected="selected"<?php endif; ?>> <?php echo $this->_tpl_vars['vl']['record']['name']; ?>
 </option>
						<?php endforeach; endif; unset($_from); ?>
				</select>
				</div>
				<div class="separator"></div>	
								
				<!-- tình trạng công việc -->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['emp_status']['value']; ?>
</label>
				<div class="input-group col-md-12">
				<select name="data[emp_status]" class="col-md-4 form-control">
						<option value="">-- <?php echo $this->_tpl_vars['lable']['select']['value']; ?>
 <?php echo $this->_tpl_vars['lable']['emp_status']['value']; ?>
 --</option>
						<?php $_from = $this->_tpl_vars['cbxEmpStatus']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vl']):
?>
						<option value="<?php echo $this->_tpl_vars['k']; ?>
"  <?php if ($this->_tpl_vars['data']['emp_status'] == $this->_tpl_vars['k']): ?> selected="selected"<?php endif; ?>> <?php echo $this->_tpl_vars['vl']['record']['name']; ?>
 </option>
						<?php endforeach; endif; unset($_from); ?>
				</select>
				</div>
				<div class="separator"></div>	
								
				<!-- ngành nghề -->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['job_category']['value']; ?>
</label>
				<div class="input-group col-md-12">
				<select name="data[emp_job_cat]" class="col-md-4 form-control">
					<option value=""> ---<?php echo $this->_tpl_vars['lable']['select']['value']; ?>
  <?php echo $this->_tpl_vars['lable']['job_category']['value']; ?>
---</option>
						<?php $_from = $this->_tpl_vars['cbxJobCategory']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vl']):
?>
						<option value="<?php echo $this->_tpl_vars['k']; ?>
"  <?php if ($this->_tpl_vars['data']['emp_job_cat'] == $this->_tpl_vars['k']): ?> selected="selected"<?php endif; ?>> <?php echo $this->_tpl_vars['vl']['record']['name']; ?>
 </option>
						<?php endforeach; endif; unset($_from); ?>
				</select>
				</div>
				<div class="separator"></div>				
				
			</div>
			<!-- group box 1-- right-->
			<div class="col-md-6" >	
			
				<!-- ngày tham gia-->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['joined_date']['value']; ?>
</label>
				<div class="input-group col-md-12">
				<input type="date" name="data[joined_date]" id="joined_date" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['data']['joined_date']; ?>
" placeholder="" maxlength="30" />
				</div>
				<div class="separator"></div>	
								
				<!-- tiểu đơn vị -->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['sub_unit']['value']; ?>
</label>
				<div class="input-group col-md-12">
				<select data-placeholder="Danh mục.." class="col-md-4 form-control" name="data[emp_sub_unit]" id="select2_1">
					<?php echo $this->_tpl_vars['arrNested']['cmb']; ?>

				</select>
				</div>
				<div class="separator"></div>	
								
				<!-- Vị trí -->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['location']['value']; ?>
</label>
				<div class="input-group col-md-12">
				<select name="data[emp_location]" class="col-md-4 form-control">
					<option value=""> ---<?php echo $this->_tpl_vars['lable']['select']['value']; ?>
  <?php echo $this->_tpl_vars['lable']['location']['value']; ?>
---</option>
					<?php $_from = $this->_tpl_vars['locations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vl']):
?>
						<option value="<?php echo $this->_tpl_vars['vl']['id']; ?>
"  <?php if ($this->_tpl_vars['data']['emp_location'] == $this->_tpl_vars['vl']['id']): ?> selected="selected"<?php endif; ?>> <?php echo $this->_tpl_vars['vl']['name']; ?>
 </option>
					<?php endforeach; endif; unset($_from); ?>
				</select>
				</div>
				<div class="separator"></div>	
				
				</div>
				</div>
				</div>
		<div class="box-generic">
		<div class="row">
		
			<!-- group box 2-->
			<div class="input-group col-md-12">
				<div class="col-md-6">
					<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['employment_contract']['value']; ?>
</label>
				</div>
			</div>
			<!-- group box 2--left-->
			<div class="col-md-6">
				
				<!-- ngày bắt đầu-->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['start_date']['value']; ?>
</label>
				<div class="input-group col-md-12">
				<input type="date" name="data[econ_extend_start_date]" id="econ_extend_start_date" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['contractExtend']['econ_extend_start_date']; ?>
" maxlength="30" />
				</div>
				<div class="separator"></div>	
			</div>
			<!-- group box 2--right-->
			<div class="col-md-6">
				<!-- ngày kết thúc-->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['end_date']['value']; ?>
</label>
				<div class="input-group col-md-12">
				<input type="date" name="data[econ_extend_end_date]" id="econ_extend_end_date" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['contractExtend']['econ_extend_end_date']; ?>
" maxlength="30" />
				</div>
				<div class="separator"></div>	
			</div>
			
			</div>	
			
			
		
		</div>
		
		<div class="col-md-12">
				(<span class="red">*</span>) <?php echo $this->_tpl_vars['lable']['required_field']['value']; ?>

				<div class="separator"></div>
			</div>
			
		</div>
		
		
	</div>
</div>