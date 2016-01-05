<?php /* Smarty version 2.6.25, created on 2016-01-04 11:02:17
         compiled from empadd/step_2.tpl */ ?>
﻿<div class="row">
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
			
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['firstname']['value']; ?>
</label>
				<div class="input-group col-md-12">
					<input type="text" name="data[emp_firstname]" id="emp_firstname" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['tb_employee']['emp_firstname']; ?>
" placeholder="" maxlength="30" onblur="hideMsg('emp_firstname')" readonly="readonly" />
					<span id="valid_emp_firstname" class="red"><?php echo $this->_tpl_vars['valid']['emp_firstname']; ?>
</span>
				</div>
				<div class="separator"></div>
				
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['middle_name']['value']; ?>
</label>
				<div class="input-group col-md-12">
				<input type="text" name="data[emp_middle_name]" id="emp_middle_name" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['tb_employee']['emp_middle_name']; ?>
" placeholder="" maxlength="30" readonly="readonly" />
				</div>
				<div class="separator"></div>
				
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['lastname']['value']; ?>
</label>
				<div class="input-group col-md-12">
					<input type="text" name="data[emp_lastname]" id="emp_lastname" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['tb_employee']['emp_lastname']; ?>
" placeholder="" maxlength="30" onblur="hideMsg('emp_lastname')" readonly="readonly" />
					<span id="valid_emp_lastname" class="red"><?php echo $this->_tpl_vars['valid']['emp_lastname']; ?>
</span>
				</div>
				<div class="separator"></div>
				
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['nickname']['value']; ?>
</label>
				<div class="input-group col-md-12">
					<input type="text" name="data[emp_nick_name]" id="emp_nick_name" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['data']['emp_nick_name']; ?>
" placeholder="" maxlength="30" />
				</div>
				<div class="separator"></div>
				
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['birthday']['value']; ?>
</label>
				<div class="input-group col-md-12">
				<input type="date" name="data[emp_birthday]" id="emp_birthday" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['data']['emp_birthday']; ?>
" placeholder="" maxlength="30" />
				</div>
				<div class="separator"></div>				
				
				<label for="inputTitle"  ><?php echo $this->_tpl_vars['lable']['gender']['value']; ?>
</label>
				<select name="data[emp_gender]" class="col-md-4 form-control" >
					<option value="0" <?php if ($this->_tpl_vars['data']['emp_gender'] == 0): ?> selected="selected"<?php endif; ?>> <?php echo $this->_tpl_vars['lable']['male']['value']; ?>
 </option>				
					<option value="1" <?php if ($this->_tpl_vars['data']['emp_gender'] == 1): ?> selected="selected"<?php endif; ?>> <?php echo $this->_tpl_vars['lable']['female']['value']; ?>
 </option>
					<option value="2" <?php if ($this->_tpl_vars['data']['emp_gender'] == 2): ?> selected="selected"<?php endif; ?>> <?php echo $this->_tpl_vars['lable']['other']['value']; ?>
 </option>
				</select>
				<div class="separator" ></div>
				
								
				
			</div>
			<!-- group box 1-- right-->
			<div class="col-md-6" >			
				
				<label for="inputTitle"  ><?php echo $this->_tpl_vars['lable']['marital_status']['value']; ?>
</label>
				<div class="input-group col-md-12">
				<select name="data[emp_marital_status]" class="col-md-4 form-control">
					<option value="0" <?php if ($this->_tpl_vars['data']['emp_marital_status'] == 0): ?> selected="selected"<?php endif; ?>> <?php echo $this->_tpl_vars['lable']['alone']['value']; ?>
 </option>				
					<option value="1" <?php if ($this->_tpl_vars['data']['emp_marital_status'] == 1): ?> selected="selected"<?php endif; ?>> <?php echo $this->_tpl_vars['lable']['married']['value']; ?>
</option>
					<option value="2" <?php if ($this->_tpl_vars['data']['emp_marital_status'] == 2): ?> selected="selected"<?php endif; ?>> <?php echo $this->_tpl_vars['lable']['other']['value']; ?>
</option>
				</select>
				</div>
				<div class="separator"></div>	
				
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['nation_code']['value']; ?>
</label>
				<div class="input-group col-md-12">
				<select name="data[nation_code]" class="col-md-4 form-control">
					<option value=""> ---<?php echo $this->_tpl_vars['lable']['select']['value']; ?>
  <?php echo $this->_tpl_vars['lable']['nation_code']['value']; ?>
---</option>
					<?php $_from = $this->_tpl_vars['countries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vl']):
?>
						<option value="<?php echo $this->_tpl_vars['k']; ?>
"  <?php if ($this->_tpl_vars['data']['nation_code'] == $this->_tpl_vars['k']): ?> selected="selected"<?php endif; ?>> <?php echo $this->_tpl_vars['vl']['name']; ?>
 </option>
					<?php endforeach; endif; unset($_from); ?>
				</select>
				</div>
				<div class="separator"></div>	
				
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['dri_lice_num']['value']; ?>
</label>
				<div class="input-group col-md-12">
				<input type="text" name="data[emp_dri_lice_num]" id="emp_dri_lice_num" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['data']['emp_dri_lice_num']; ?>
" placeholder="" maxlength="30" />
				</div>
				<div class="separator"></div>
				
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['dri_lice_exp_date']['value']; ?>
</label>
				<div class="input-group col-md-12">
				<input type="date" name="data[emp_dri_lice_exp_date]" id="emp_dri_lice_exp_date" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['data']['emp_dri_lice_exp_date']; ?>
" placeholder="" maxlength="30" />
				</div>
				<div class="separator"></div>		
				
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['military_service']['value']; ?>
</label>
				<div class="input-group col-md-12">
				<input type="text" name="data[emp_military_service]" id="emp_military_service" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['data']['emp_military_service']; ?>
" placeholder="" maxlength="30" />
				</div>
				<div class="separator"></div>								
				
				<div class="col-md-12">
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['smoker']['value']; ?>
</label>  
				<input type="checkbox" value="1" name="data[emp_smoker]" id="emp_smoker" <?php if ($this->_tpl_vars['data']['emp_smoker'] == 1): ?> checked="checked" <?php endif; ?> />
				<div class="separator"></div>
			</div>

				
			</div>

		</div>
		</div>
		
		<div class="col-md-12">
			(<span class="red">*</span>) <?php echo $this->_tpl_vars['lable']['required_field']['value']; ?>

			<div class="separator"></div>
		</div>
		
	</div>
</div>