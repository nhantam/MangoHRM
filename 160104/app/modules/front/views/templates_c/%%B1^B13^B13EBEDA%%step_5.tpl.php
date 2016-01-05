<?php /* Smarty version 2.6.25, created on 2016-01-04 11:01:08
         compiled from empadd/step_5.tpl */ ?>
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
			
						<!-- tên -->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['firstname']['value']; ?>
</label>
				<div class="input-group col-md-12">
					<input type="text" name="data[ed_name]" id="ed_name" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['data']['ed_name']; ?>
" placeholder="" maxlength="30" onblur="hideMsg('ed_name')" />
				</div>
				<div class="separator"></div>
				
				<!-- mối quan hệ -->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['relation']['value']; ?>
</label>
				<div class="input-group col-md-12">
				<select name="data[ed_relationship_type]" class="col-md-4 form-control">
					<option value=""> ---<?php echo $this->_tpl_vars['lable']['select']['value']; ?>
  <?php echo $this->_tpl_vars['lable']['relation']['value']; ?>
---</option>
					<?php $_from = $this->_tpl_vars['select_box']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vl']):
?>
						<option value="<?php echo $this->_tpl_vars['vl']['id']; ?>
"  <?php if ($this->_tpl_vars['data']['ed_relationship_type'] == $this->_tpl_vars['vl']['id']): ?> selected="selected"<?php endif; ?>> <?php echo $this->_tpl_vars['vl']['name']; ?>
 </option>
					<?php endforeach; endif; unset($_from); ?>
				</select>
				</div>
				<div class="separator"></div>		
				
						<!-- ngày sinh-->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['birthday']['value']; ?>
</label>
				<div class="input-group col-md-12">
				<input type="date" name="data[ed_birthday]" id="ed_birthday" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['data']['ed_birthday']; ?>
" placeholder="" maxlength="30" />
				</div>
				<div class="separator"></div>	
				
			</div>
			<!-- group box 1-- right-->


		</div>
		</div>
		
		<div class="col-md-12">
			(<span class="red">*</span>) <?php echo $this->_tpl_vars['lable']['required_field']['value']; ?>

			<div class="separator"></div>
		</div>
		
	</div>
</div>