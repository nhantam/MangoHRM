<?php /* Smarty version 2.6.25, created on 2016-01-04 11:02:25
         compiled from empadd/step_1.tpl */ ?>
﻿<div class="row">
	<div class="col-md-2">
		<strong>Product title</strong>
		<p class="muted">Lorem ipsum dolor sit amet, consecteturadipiscing elit.</p>
	</div>
	<div class="col-md-10">
		
		<div class="box-generic">
		<div class="row">
		
			<div class="col-md-6">
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['firstname']['value']; ?>
 (<span class="red">*</span>)</label>
				<div class="input-group col-md-12">
					<input type="text" name="data[emp_firstname]" id="emp_firstname" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['data']['emp_firstname']; ?>
" placeholder="" maxlength="30" onblur="hideMsg('emp_firstname')" />
					<span id="valid_emp_firstname" class="red"><?php echo $this->_tpl_vars['valid']['emp_firstname']; ?>
</span>
				</div>
				<div class="separator"></div>
				
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['middle_name']['value']; ?>
</label>
				<div class="input-group col-md-12">
				<input type="text" name="data[emp_middle_name]" id="emp_middle_name" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['data']['emp_middle_name']; ?>
" placeholder="" maxlength="30" />
				</div>
				<div class="separator"></div>
				
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['lastname']['value']; ?>
 (<span class="red">*</span>)</label>
				<div class="input-group col-md-12">
					<input type="text" name="data[emp_lastname]" id="emp_lastname" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['data']['emp_lastname']; ?>
" placeholder="" maxlength="30" onblur="hideMsg('emp_lastname')" />
					<span id="valid_emp_lastname" class="red"><?php echo $this->_tpl_vars['valid']['emp_lastname']; ?>
</span>
				</div>
				<div class="separator"></div>
				
			</div>
			
			<div class="col-md-6">
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['picture']['value']; ?>
</label>
				<div class="input-group col-md-12">
					<input type="file" name="file_avatar" />
					<small><?php echo $this->_tpl_vars['lable']['file_image_support_avatar']['value']; ?>
</small>
					<span id="valid_avatar" class="red">
					<?php $_from = $this->_tpl_vars['fileError']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?> &nbsp; <?php echo $this->_tpl_vars['error']; ?>
<br /><?php endforeach; endif; unset($_from); ?>
					</span>
				</div>
				<div class="separator"></div>

			</div>
		
		</div>
		</div>
		
		<div class="box-generic">
		<div class="row">
		
			<div class="col-md-12">
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['creat_login_account']['value']; ?>
</label>  
				<input type="checkbox" value="1" name="creat_login_account" id="creat_login_account" <?php if ($this->_tpl_vars['creat_login_account'] == 1): ?> checked="checked" <?php endif; ?> />
				<div class="separator"></div>
			</div>
			
			<div id="id_add_account_login">
			
			<div class="col-md-6">
			
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['username']['value']; ?>
 (<span class="red">*</span>)</label>
				<div class="input-group col-md-12">
					<input type="text" id="username" name="account[adminLogin]" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['account']['adminLogin']; ?>
" placeholder="" maxlength="30" onblur="hideMsg('username')" />
					<span id="valid_username" class="red"><?php echo $this->_tpl_vars['valid']['username']; ?>
 </span>
				</div>
				
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['password']['value']; ?>
 (<span class="red">*</span>)</label>
				<div class="input-group col-md-12">
					<input type="password" id="password" name="account[password]" class="col-md-6 form-control" value="" placeholder="" onblur="hideMsg('password')" />
				</div>	
				
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['re_password']['value']; ?>
 (<span class="red">*</span>)</label>
				<div class="input-group col-md-12">
					<input type="password" id="re_password" name="account[re_password]" class="col-md-6 form-control" value="" placeholder="" onblur="hideMsg('re_password')" />
					<span id="valid_re_password" class="red"><?php echo $this->_tpl_vars['valid']['re_password']; ?>
</span>
				</div>	
				<div class="separator"></div>
				
			</div>
			
			<div class="col-md-6">
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['status']['value']; ?>
</label>
				<select name="account[adminAvail]" class="col-md-4 form-control">
					<option value="1"> <?php echo $this->_tpl_vars['lable']['active']['value']; ?>
 </option>
					<option value="0"> <?php echo $this->_tpl_vars['lable']['disable']['value']; ?>
 </option>
				</select>
				<div class="separator"></div>
			</div>
			
			</div><!-- #id_add_account_login-->
			
		
		</div>
		</div>
		
		<div class="col-md-12">
			(<span class="red">*</span>) <?php echo $this->_tpl_vars['lable']['required_field']['value']; ?>

			<div class="separator"></div>
		</div>
		
	</div>
</div>