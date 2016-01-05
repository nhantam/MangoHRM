<?php /* Smarty version 2.6.25, created on 2015-12-31 16:50:02
         compiled from empadd/step_8.tpl */ ?>
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
			
							
				<!-- loại lương -->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['pay_grades']['value']; ?>
(<span class="red">*</span>)</label> 
				<div class="input-group col-md-12">
				<select name="data[paygrades_id]" id="sal_grd_code" class="col-md-4 form-control" onchange="paycurrency()" onblur="hideMsg('sal_grd_code')">
					<option value=""> ---<?php echo $this->_tpl_vars['lable']['select']['value']; ?>
  <?php echo $this->_tpl_vars['lable']['pay_grades']['value']; ?>
---</option>
					<?php $_from = $this->_tpl_vars['paygrade']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vl']):
?>
						<option value="<?php echo $this->_tpl_vars['k']; ?>
"  <?php if ($this->_tpl_vars['data']['paygrades_id'] == $this->_tpl_vars['k']): ?> selected="selected"<?php endif; ?>> <?php echo $this->_tpl_vars['vl']['record']['name']; ?>
 </option>
					<?php endforeach; endif; unset($_from); ?>
				</select>
				<span id="valid_sal_grd_code" class="red"><?php echo $this->_tpl_vars['valid']['pay_grades']; ?>
</span>
				</div>
				<div class="separator"></div>		
				
				<!-- Tiền tệ -->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['currency']['value']; ?>
(<span class="red">*</span>)</label>
				<div class="input-group col-md-12" > 
					<div id="data_currency_id"> 
						<select name="data[currency_id]" id="currency_id" class="col-md-4 form-control" onchange="payminmax()">
							<option value=""> ---<?php echo $this->_tpl_vars['lable']['select']['value']; ?>
  <?php echo $this->_tpl_vars['lable']['currency']['value']; ?>
---</option>
							<?php $_from = $this->_tpl_vars['currencys']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vl']):
?>
								<option value="<?php echo $this->_tpl_vars['vl']['currency_id']; ?>
"  <?php if ($this->_tpl_vars['data']['currency_id'] == $this->_tpl_vars['vl']['currency_id']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['vl']['currency_name']; ?>
 </option>
							<?php endforeach; endif; unset($_from); ?>
						</select>
					</div>
					<span id="valid_currency_id" class="red"><?php echo $this->_tpl_vars['valid']['currency_id']; ?>
</span>
				</div>
				<div class="separator"></div>	
				
				<!-- Số tiền -->
				<label for="basic_salary"><?php echo $this->_tpl_vars['lable']['amount']['value']; ?>
(<span class="red">*</span>)</label> 
				<span id="valid_basic_salary" class="red"><?php echo $this->_tpl_vars['valid']['basic_salary']; ?>
</span>
				<div class="input-group col-md-12">
				<input type="text" name="data[basic_salary]" id="basic_salary" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['data']['basic_salary']; ?>
" placeholder="" maxlength="30" onblur="validMinMaxSalary()"  />
				<input type="hidden" id="min_salary" name="min_salary" value="" />
				<input type="hidden" id="max_salary" name="max_salary" value="" />
				<span id="valid_basic_salary_input" class="red"><?php echo $this->_tpl_vars['valid']['basic_salary']; ?>
</span>
					<div class="input-group col-md-12">
						<span id="valid_input" class="red"></span>
					</div>
				</div>
				<div class="separator"></div>
						
			</div>
			<!-- group box 1-- right-->
			<div class="col-md-6" >	


				<!-- thành phần lương -->
				<!--
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['salary_component']['value']; ?>
(<span class="red">*</span>)</label>
				<div class="input-group col-md-12">
					<input type="text" name="data[salary_component]" id="salary_component" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['data']['salary_component']; ?>
" placeholder="" maxlength="30" onblur="hideMsg('salary_component')" />
					<span id="valid_salary_component" class="red"><?php echo $this->_tpl_vars['valid']['salary_component']; ?>
</span>
				</div>
				<div class="separator"></div>	
				-->
				
				<!-- tần suất trả -->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['pay_frequency']['value']; ?>
</label>
				<div class="input-group col-md-12">
				<select name="data[payperiod_code]" class="col-md-4 form-control">
					<option value=""> ---<?php echo $this->_tpl_vars['lable']['select']['value']; ?>
  <?php echo $this->_tpl_vars['lable']['pay_frequency']['value']; ?>
---</option>
					<?php $_from = $this->_tpl_vars['pay_frequency']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vl']):
?>
						<option value="<?php echo $this->_tpl_vars['k']; ?>
"  <?php if ($this->_tpl_vars['data']['payperiod_code'] == $this->_tpl_vars['k']): ?> selected="selected"<?php endif; ?>> <?php echo $this->_tpl_vars['vl']['record']['name']; ?>
 </option>
					<?php endforeach; endif; unset($_from); ?>
				</select>
				</div>
				<div class="separator"></div>
				
				 <!-- bình luận -->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['comments']['value']; ?>
</label>
				<div class="input-group col-md-12">
					<textarea rows="6" cols="47" name="data[comments]" class="form-control" id="comments"  placeholder="" maxlength="30" > <?php echo $this->_tpl_vars['data']['comments']; ?>
 </textarea>
				</div>
				<div class="separator"></div>	

			
			</div>	

		</div>
		</div>
		
		<!-- form hide-show-->
		<div class="box-generic">
		<div class="row">
		
		<!--Thêm Chi tiết Chuyển Tiền gửi-->
			<div class="col-md-12">
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['add_direct_deposit_details']['value']; ?>
</label>  
				<input type="checkbox" value="1" name="creat_login_account" id="creat_login_account" <?php if ($this->_tpl_vars['creat_login_account'] == 1 | $this->_tpl_vars['account']['account_number'] != ""): ?> checked="checked" <?php endif; ?>  />
				<div class="separator"></div>
			</div>
			
			<div id="id_add_account_login">
			<div class="col-md-6">
			
				<!-- số tài khoản -->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['account_number']['value']; ?>
 (<span class="red">*</span>)</label>
				<div class="input-group col-md-12">
					<input type="text" id="account_number" name="account[account_number]" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['account']['account_number']; ?>
" placeholder="" maxlength="30" onblur="hideMsg('account_number')" />
					<span id="valid_account_number" class="red"><?php echo $this->_tpl_vars['valid']['account_number']; ?>
 </span>
				</div>
				<div class="separator"></div>	
				
				<!-- tên tài khoản -->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['account_name']['value']; ?>
 (<span class="red">*</span>)</label>
				<div class="input-group col-md-12">
					<input type="text" id="account_name" name="account[account_name]" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['account']['account_name']; ?>
" placeholder="" maxlength="30" onblur="hideMsg('account_name')" />
					<span id="valid_account_name" class="red"><?php echo $this->_tpl_vars['valid']['account_name']; ?>
 </span>
				</div>
				<div class="separator"></div>
				
				
			</div>
			<div class="col-md-6">
			
				<!-- ngân hàng -->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['account_bank']['value']; ?>
 (<span class="red">*</span>)</label>
				<div class="input-group col-md-12">
					<input type="text" id="account_bank" name="account[account_bank]" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['account']['account_bank']; ?>
" placeholder="" maxlength="30" onblur="hideMsg('account_bank')" />
					<span id="valid_account_bank" class="red"><?php echo $this->_tpl_vars['valid']['account_bank']; ?>
 </span>
				</div>
				<div class="separator"></div>
				
				<!-- só tiền -->
				<label for="basic_salary"><?php echo $this->_tpl_vars['lable']['amount']['value']; ?>
 (<span class="red">*</span>)</label>
				<div class="input-group col-md-12">
					<input type="text" id="account_amount" name="account[account_amount]" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['account']['account_amount']; ?>
" placeholder="" maxlength="30" onblur="hideMsg('account_amount')" />
					<span id="valid_account_amount" class="red"><?php echo $this->_tpl_vars['valid']['account_amount']; ?>
</span>
				</div>
				<div class="separator"></div>
				
			</div>
			
			</div><!-- #id_add_account_login-->
			
		</div>
		</div>		
		<!--// END form hide-show-->
		
		<div class="col-md-12">
			(<span class="red">*</span>) <?php echo $this->_tpl_vars['lable']['required_field']['value']; ?>

			<div class="separator"></div>
		</div>
		
	</div>
</div>