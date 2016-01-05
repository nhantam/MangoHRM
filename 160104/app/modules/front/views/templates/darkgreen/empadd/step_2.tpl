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
			
				<label for="inputTitle">{$lable.firstname.value}</label>
				<div class="input-group col-md-12">
					<input type="text" name="data[emp_firstname]" id="emp_firstname" class="col-md-6 form-control" value="{$tb_employee.emp_firstname}" placeholder="" maxlength="30" onblur="hideMsg('emp_firstname')" readonly="readonly" />
					<span id="valid_emp_firstname" class="red">{$valid.emp_firstname}</span>
				</div>
				<div class="separator"></div>
				
				<label for="inputTitle">{$lable.middle_name.value}</label>
				<div class="input-group col-md-12">
				<input type="text" name="data[emp_middle_name]" id="emp_middle_name" class="col-md-6 form-control" value="{$tb_employee.emp_middle_name}" placeholder="" maxlength="30" readonly="readonly" />
				</div>
				<div class="separator"></div>
				
				<label for="inputTitle">{$lable.lastname.value}</label>
				<div class="input-group col-md-12">
					<input type="text" name="data[emp_lastname]" id="emp_lastname" class="col-md-6 form-control" value="{$tb_employee.emp_lastname}" placeholder="" maxlength="30" onblur="hideMsg('emp_lastname')" readonly="readonly" />
					<span id="valid_emp_lastname" class="red">{$valid.emp_lastname}</span>
				</div>
				<div class="separator"></div>
				
				<label for="inputTitle">{$lable.nickname.value}</label>
				<div class="input-group col-md-12">
					<input type="text" name="data[emp_nick_name]" id="emp_nick_name" class="col-md-6 form-control" value="{$data.emp_nick_name}" placeholder="" maxlength="30" />
				</div>
				<div class="separator"></div>
				
				<label for="inputTitle">{$lable.birthday.value}</label>
				<div class="input-group col-md-12">
				<input type="date" name="data[emp_birthday]" id="emp_birthday" class="col-md-6 form-control" value="{$data.emp_birthday}" placeholder="" maxlength="30" />
				</div>
				<div class="separator"></div>				
				
				<label for="inputTitle"  >{$lable.gender.value}</label>
				<select name="data[emp_gender]" class="col-md-4 form-control" >
					<option value="0" {if $data.emp_gender eq 0} selected="selected"{/if}> {$lable.male.value} </option>				
					<option value="1" {if $data.emp_gender eq 1} selected="selected"{/if}> {$lable.female.value} </option>
					<option value="2" {if $data.emp_gender eq 2} selected="selected"{/if}> {$lable.other.value} </option>
				</select>
				<div class="separator" ></div>
				
								
				
			</div>
			<!-- group box 1-- right-->
			<div class="col-md-6" >			
				
				<label for="inputTitle"  >{$lable.marital_status.value}</label>
				<div class="input-group col-md-12">
				<select name="data[emp_marital_status]" class="col-md-4 form-control">
					<option value="0" {if $data.emp_marital_status eq 0} selected="selected"{/if}> {$lable.alone.value} </option>				
					<option value="1" {if $data.emp_marital_status eq 1} selected="selected"{/if}> {$lable.married.value}</option>
					<option value="2" {if $data.emp_marital_status eq 2} selected="selected"{/if}> {$lable.other.value}</option>
				</select>
				</div>
				<div class="separator"></div>	
				
				<label for="inputTitle">{$lable.nation_code.value}</label>
				<div class="input-group col-md-12">
				<select name="data[nation_code]" class="col-md-4 form-control">
					<option value=""> ---{$lable.select.value}  {$lable.nation_code.value}---</option>
					{foreach from=$countries item=vl key=k}
						<option value="{$k}"  {if $data.nation_code eq $k} selected="selected"{/if}> {$vl.name} </option>
					{/foreach}
				</select>
				</div>
				<div class="separator"></div>	
				
				<label for="inputTitle">{$lable.dri_lice_num.value}</label>
				<div class="input-group col-md-12">
				<input type="text" name="data[emp_dri_lice_num]" id="emp_dri_lice_num" class="col-md-6 form-control" value="{$data.emp_dri_lice_num}" placeholder="" maxlength="30" />
				</div>
				<div class="separator"></div>
				
				<label for="inputTitle">{$lable.dri_lice_exp_date.value}</label>
				<div class="input-group col-md-12">
				<input type="date" name="data[emp_dri_lice_exp_date]" id="emp_dri_lice_exp_date" class="col-md-6 form-control" value="{$data.emp_dri_lice_exp_date}" placeholder="" maxlength="30" />
				</div>
				<div class="separator"></div>		
				
				<label for="inputTitle">{$lable.military_service.value}</label>
				<div class="input-group col-md-12">
				<input type="text" name="data[emp_military_service]" id="emp_military_service" class="col-md-6 form-control" value="{$data.emp_military_service}" placeholder="" maxlength="30" />
				</div>
				<div class="separator"></div>								
				
				<div class="col-md-12">
				<label for="inputTitle">{$lable.smoker.value}</label>  
				<input type="checkbox" value="1" name="data[emp_smoker]" id="emp_smoker" {if $data.emp_smoker eq 1} checked="checked" {/if} />
				<div class="separator"></div>
			</div>

				
			</div>

		</div>
		</div>
		
		<div class="col-md-12">
			(<span class="red">*</span>) {$lable.required_field.value}
			<div class="separator"></div>
		</div>
		
	</div>
</div>