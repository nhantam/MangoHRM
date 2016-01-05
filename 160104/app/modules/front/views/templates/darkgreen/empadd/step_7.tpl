
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
				<label for="inputTitle">{$lable.job_title.value}</label>
				<div class="input-group col-md-12">
				<select name="data[emp_job_title]" class="col-md-4 form-control">
						<option value="">-- {$lable.select.value} {$lable.job_title.value} --</option>
						{foreach from=$cbxJobTitle item=vl key=k}
						<option value="{$k}"  {if $data.emp_job_title eq $k} selected="selected"{/if}> {$vl.record.name} </option>
						{/foreach}
				</select>
				</div>
				<div class="separator"></div>	
								
				<!-- tình trạng công việc -->
				<label for="inputTitle">{$lable.emp_status.value}</label>
				<div class="input-group col-md-12">
				<select name="data[emp_status]" class="col-md-4 form-control">
						<option value="">-- {$lable.select.value} {$lable.emp_status.value} --</option>
						{foreach from=$cbxEmpStatus item=vl key=k}
						<option value="{$k}"  {if $data.emp_status eq $k} selected="selected"{/if}> {$vl.record.name} </option>
						{/foreach}
				</select>
				</div>
				<div class="separator"></div>	
								
				<!-- ngành nghề -->
				<label for="inputTitle">{$lable.job_category.value}</label>
				<div class="input-group col-md-12">
				<select name="data[emp_job_cat]" class="col-md-4 form-control">
					<option value=""> ---{$lable.select.value}  {$lable.job_category.value}---</option>
						{foreach from=$cbxJobCategory item=vl key=k}
						<option value="{$k}"  {if $data.emp_job_cat eq $k} selected="selected"{/if}> {$vl.record.name} </option>
						{/foreach}
				</select>
				</div>
				<div class="separator"></div>				
				
			</div>
			<!-- group box 1-- right-->
			<div class="col-md-6" >	
			
				<!-- ngày tham gia-->
				<label for="inputTitle">{$lable.joined_date.value}</label>
				<div class="input-group col-md-12">
				<input type="date" name="data[joined_date]" id="joined_date" class="col-md-6 form-control" value="{$data.joined_date}" placeholder="" maxlength="30" />
				</div>
				<div class="separator"></div>	
								
				<!-- tiểu đơn vị -->
				<label for="inputTitle">{$lable.sub_unit.value}</label>
				<div class="input-group col-md-12">
				<select data-placeholder="Danh mục.." class="col-md-4 form-control" name="data[emp_sub_unit]" id="select2_1">
					{$arrNested.cmb}
				</select>
				</div>
				<div class="separator"></div>	
								
				<!-- Vị trí -->
				<label for="inputTitle">{$lable.location.value}</label>
				<div class="input-group col-md-12">
				<select name="data[emp_location]" class="col-md-4 form-control">
					<option value=""> ---{$lable.select.value}  {$lable.location.value}---</option>
					{foreach from=$locations item=vl key=k}
						<option value="{$vl.id}"  {if $data.emp_location eq $vl.id} selected="selected"{/if}> {$vl.name} </option>
					{/foreach}
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
					<label for="inputTitle">{$lable.employment_contract.value}</label>
				</div>
			</div>
			<!-- group box 2--left-->
			<div class="col-md-6">
				
				<!-- ngày bắt đầu-->
				<label for="inputTitle">{$lable.start_date.value}</label>
				<div class="input-group col-md-12">
				<input type="date" name="data[econ_extend_start_date]" id="econ_extend_start_date" class="col-md-6 form-control" value="{$contractExtend.econ_extend_start_date}" maxlength="30" />
				</div>
				<div class="separator"></div>	
			</div>
			<!-- group box 2--right-->
			<div class="col-md-6">
				<!-- ngày kết thúc-->
				<label for="inputTitle">{$lable.end_date.value}</label>
				<div class="input-group col-md-12">
				<input type="date" name="data[econ_extend_end_date]" id="econ_extend_end_date" class="col-md-6 form-control" value="{$contractExtend.econ_extend_end_date}" maxlength="30" />
				</div>
				<div class="separator"></div>	
			</div>
			
			</div>	
			
			
		
		</div>
		
		<div class="col-md-12">
				(<span class="red">*</span>) {$lable.required_field.value}
				<div class="separator"></div>
			</div>
			
		</div>
		
		
	</div>
</div>