<?php /* Smarty version 2.6.25, created on 2016-01-04 09:39:50
         compiled from empadd/step_6.tpl */ ?>
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
			
				<!-- tài liệu -->
				<div class="col-md-12" id="emp_passport">
					<?php $_from = $this->_tpl_vars['immigration']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vl']):
?>
						<label for="ep_passport_type_flg_<?php echo $this->_tpl_vars['k']; ?>
"><?php echo $this->_tpl_vars['vl']; ?>
</label>  
						<input type="radio" value="<?php echo $this->_tpl_vars['k']; ?>
" name="data[ep_passport_type_flg]" id="ep_passport_type_flg_<?php echo $this->_tpl_vars['k']; ?>
" <?php if ($this->_tpl_vars['data']['ep_passport_type_flg'] == $this->_tpl_vars['k']): ?> checked="checked" <?php endif; ?> onblur="hideMsg('ep_passport_type_flg')" />
					
					<?php endforeach; endif; unset($_from); ?>
					<label for="inputTitle"> (<span class="red">*</span>)</label>
					<span id="valid_ep_passport_type_flg" class="red"><?php echo $this->_tpl_vars['valid']['ep_passport_type_flg']; ?>
</span>
				</div>
				<div class="separator"></div>
			
				<!-- số -->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['number']['value']; ?>
 (<span class="red">*</span>)</label>
				<div class="input-group col-md-12">
					<input type="text" name="data[ep_passport_num]" id="ep_passport_num" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['data']['ep_passport_num']; ?>
" placeholder="" maxlength="30" onblur="hideMsg('ep_passport_num')" />
					<span id="valid_ep_passport_num" class="red"><?php echo $this->_tpl_vars['valid']['ep_passport_num']; ?>
</span>
				</div>
				<div class="separator"></div>
					
				
						<!-- ngày ban hành-->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['issued_date']['value']; ?>
</label>
				<div class="input-group col-md-12">
				<input type="date" name="data[ep_passportissueddate]" id="ep_passportissueddate" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['data']['ep_passportissueddate']; ?>
" placeholder="" maxlength="30" />
				</div>
				<div class="separator"></div>	
				
						<!-- ngày hiêu lực-->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['expiry_date']['value']; ?>
</label>
				<div class="input-group col-md-12">
				<input type="date" name="data[ep_passportexpiredate]" id="ep_passportexpiredate" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['data']['ep_passportexpiredate']; ?>
" placeholder="" maxlength="30" />
				</div>
				<div class="separator"></div>	
				
					 <!-- trạng thái -->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['eligible_status']['value']; ?>
</label>
				<div class="input-group col-md-12">
					<input type="text" name="data[ep_i9_status]" id="ep_i9_status" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['data']['ep_i9_status']; ?>
" placeholder="" maxlength="30" onblur="hideMsg('ep_i9_status')" />
				</div>
				<div class="separator"></div>
				
				
			</div>
			<!-- group box 1-- right-->
			<div class="col-md-6" >	
			
				<!-- ban hành bởi -->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['issued_by']['value']; ?>
</label>
				<div class="input-group col-md-12">
				<select name="data[country_code]" class="col-md-4 form-control">
					<option value=""> ---<?php echo $this->_tpl_vars['lable']['select']['value']; ?>
  <?php echo $this->_tpl_vars['lable']['nation_code']['value']; ?>
---</option>
					<?php $_from = $this->_tpl_vars['countries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vl']):
?>
						<option value="<?php echo $this->_tpl_vars['k']; ?>
"  <?php if ($this->_tpl_vars['data']['country_code'] == $this->_tpl_vars['k']): ?> selected="selected"<?php endif; ?>> <?php echo $this->_tpl_vars['vl']['name']; ?>
 </option>
					<?php endforeach; endif; unset($_from); ?>
				</select>
				</div>
				<div class="separator"></div>	
				
				<!-- ngày đủ đk xét-->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['eligible_review_date']['value']; ?>
</label>
				<div class="input-group col-md-12">
				<input type="date" name="data[ep_i9_review_date]" id="ep_i9_review_date" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['data']['ep_i9_review_date']; ?>
" placeholder="" maxlength="30" />
				</div>
				<div class="separator"></div>	
				
				 <!-- bình luận -->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['comments']['value']; ?>
</label>
				<div class="input-group col-md-12">
					<textarea rows="6" cols="47" name="data[ep_comments]" class="form-control" id="ep_comments"></textarea>
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