<?php /* Smarty version 2.6.25, created on 2016-01-04 11:01:02
         compiled from empadd/step_4.tpl */ ?>
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
			
						<!-- tên -->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['firstname']['value']; ?>
</label>
				<div class="input-group col-md-12">
					<input type="text" name="data[eec_name]" id="eec_name" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['data']['eec_name']; ?>
" placeholder="" maxlength="30" onblur="hideMsg('eec_name')" />
				</div>
				<div class="separator"></div>
				
						<!-- mối quan hệ -->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['relation']['value']; ?>
</label>
				<div class="input-group col-md-12">
					<input type="text" name="data[eec_relationship]" id="eec_relationship" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['data']['eec_relationship']; ?>
" placeholder="" maxlength="30" onblur="hideMsg('eec_relationship')" />
				</div>
				<div class="separator"></div>	
				
						<!-- địa chỉ -->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['address']['value']; ?>
</label>
				<div class="input-group col-md-12">
					<input type="text" name="data[eec_address]" id="eec_address" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['data']['eec_address']; ?>
" placeholder="" maxlength="30" onblur="hideMsg('eec_address')"/>
				</div>
				<div class="separator"></div>.
				
			</div>
			<!-- group box 1-- right-->
			<div class="col-md-6" >			
			
						<!-- điên thoại bàn-->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['hm_telephone']['value']; ?>
</label>
				<div class="input-group col-md-12">
					<input type="text" name="data[eec_home_no]" id="eec_home_no" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['data']['eec_home_no']; ?>
" placeholder="" maxlength="30" onblur="hideMsg('eec_home_no')"/>
				</div>
				<div class="separator"></div>
				
						<!-- đt di động-->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['mobile']['value']; ?>
</label>
				<div class="input-group col-md-12">
					<input type="text" name="data[eec_mobile_no]" id="eec_mobile_no" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['data']['eec_mobile_no']; ?>
" placeholder="" maxlength="30" onblur="hideMsg('eec_mobile_no')"/>
				</div>
				<div class="separator"></div>
				
						<!-- đt cơ quan-->
				<label for="inputTitle"><?php echo $this->_tpl_vars['lable']['work_telephone']['value']; ?>
</label>
				<div class="input-group col-md-12">
					<input type="text" name="data[eec_office_no]" id="eec_office_no" class="col-md-6 form-control" value="<?php echo $this->_tpl_vars['data']['eec_office_no']; ?>
" placeholder="" maxlength="30" onblur="hideMsg('eec_office_no')"/>
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