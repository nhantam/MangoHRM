<?php /* Smarty version 2.6.25, created on 2016-01-04 09:39:36
         compiled from empadd/step_3.tpl */ ?>
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
						<!-- đường số 1 -->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['street1']['value']; ?>
</label>
				<div class="input-group col-md-12">
					<input type="text" name="data[emp_street1]" id="emp_street1" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['data']['emp_street1']; ?>
" placeholder="" maxlength="30" onblur="hideMsg('emp_street1')" />
				</div>
				<div class="separator"></div>
						<!-- đường số 2 -->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['street2']['value']; ?>
</label>
				<div class="input-group col-md-12">
					<input type="text" name="data[emp_street2]" id="emp_street2" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['data']['emp_street2']; ?>
" placeholder="" maxlength="30" onblur="hideMsg('emp_street2')"/>
				</div>
				<div class="separator"></div>.
						<!-- thành phố-->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['city']['value']; ?>
</label>
				<div class="input-group col-md-12">
					<input type="text" name="data[city_code]" id="city_code" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['data']['city_code']; ?>
" placeholder="" maxlength="30" onblur="hideMsg('city_code')"/>
				</div>
				<div class="separator"></div>
						<!-- tỉnh-->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['provincial']['value']; ?>
</label>
				<div class="input-group col-md-12">
					<input type="text" name="data[provin_code]" id="provin_code" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['data']['provin_code']; ?>
" placeholder="" maxlength="30" onblur="hideMsg('provin_code')"/>
				</div>
				<div class="separator"></div>
						<!-- emp_zipcode mã bưu chính-->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['zipcode']['value']; ?>
</label>
				<div class="input-group col-md-12">
					<input type="text" name="data[emp_zipcode]" id="emp_zipcode" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['data']['emp_zipcode']; ?>
" placeholder="" maxlength="30" onblur="hideMsg('emp_zipcode')"/>
				</div>
				<div class="separator"></div>
						<!-- coun_code-->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['coun_code']['value']; ?>
</label>
				<div class="input-group col-md-12">
				<select name="data[coun_code]" class="col-md-4 form-control">
					<option value=""> ---<?php echo $this->_tpl_vars['lable']['select']['value']; ?>
 <?php echo $this->_tpl_vars['lable']['coun_code']['value']; ?>
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
								
				
			</div>
			<!-- group box 1-- right-->
			<div class="col-md-6" >			
			
						<!-- điên thoại bàn-->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['hm_telephone']['value']; ?>
</label>
				<div class="input-group col-md-12">
					<input type="text" name="data[emp_hm_telephone]" id="emp_hm_telephone" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['data']['emp_hm_telephone']; ?>
" placeholder="" maxlength="30" onblur="hideMsg('emp_hm_telephone')"/>
				</div>
				<div class="separator"></div>
				
						<!-- đt di động-->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['mobile']['value']; ?>
</label>
				<div class="input-group col-md-12">
					<input type="text" name="data[emp_mobile]" id="emp_work_telephone" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['data']['emp_mobile']; ?>
" placeholder="" maxlength="30" onblur="hideMsg('emp_mobile')"/>
				</div>
				<div class="separator"></div>
				
						<!-- đt cơ quan-->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['work_telephone']['value']; ?>
</label>
				<div class="input-group col-md-12">
					<input type="text" name="data[emp_work_telephone]" id="emp_work_telephone" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['data']['emp_work_telephone']; ?>
" placeholder="" maxlength="30" onblur="hideMsg('emp_work_telephone')"/>
				</div>
				<div class="separator"></div>
				
						<!-- mail làm việc-->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['work_email']['value']; ?>
</label>
				<div class="input-group col-md-12">
					<input type="text" name="data[emp_work_email]" id="emp_work_email" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['data']['emp_work_email']; ?>
" placeholder="" maxlength="30" onblur="hideMsg('emp_work_email')"/>
				</div>
				<div class="separator"></div>
				
						<!-- mail khác-->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['other_email']['value']; ?>
</label>
				<div class="input-group col-md-12">
					<input type="text" name="data[emp_oth_email]" id="emp_oth_email" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['data']['emp_oth_email']; ?>
" placeholder="" maxlength="30" onblur="hideMsg('emp_oth_email')"/>
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