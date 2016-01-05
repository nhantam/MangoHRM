
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
				<label for="inputTitle">{$lable.pay_grades.value}(<span class="red">*</span>)</label> 
				<div class="input-group col-md-12">
				<select name="data[paygrades_id]" id="sal_grd_code" class="col-md-4 form-control" onchange="paycurrency()" onblur="hideMsg('sal_grd_code')">
					<option value=""> ---{$lable.select.value}  {$lable.pay_grades.value}---</option>
					{foreach from=$paygrade item=vl key=k}
						<option value="{$k}"  {if $data.paygrades_id eq $k} selected="selected"{/if}> {$vl.record.name} </option>
					{/foreach}
				</select>
				<span id="valid_sal_grd_code" class="red">{$valid.pay_grades}</span>
				</div>
				<div class="separator"></div>		
				
				<!-- Tiền tệ -->
				<label for="inputTitle">{$lable.currency.value}(<span class="red">*</span>)</label>
				<div class="input-group col-md-12" > 
					<div id="data_currency_id"> 
						<select name="data[currency_id]" id="currency_id" class="col-md-4 form-control" onchange="payminmax()">
							<option value=""> ---{$lable.select.value}  {$lable.currency.value}---</option>
							{foreach from=$currencys item=vl}
								<option value="{$vl.currency_id}"  {if $data.currency_id eq $vl.currency_id} selected="selected"{/if}>{$vl.currency_name} </option>
							{/foreach}
						</select>
					</div>
					<span id="valid_currency_id" class="red">{$valid.currency_id}</span>
				</div>
				<div class="separator"></div>	
				
				<!-- Số tiền -->
				<label for="basic_salary">{$lable.amount.value}(<span class="red">*</span>)</label> 
				<span id="valid_basic_salary" class="red">{$valid.basic_salary}</span>
				<div class="input-group col-md-12">
				<input type="text" name="data[basic_salary]" id="basic_salary" class="col-md-6 form-control" value="{$data.basic_salary}" placeholder="" maxlength="30" onblur="validMinMaxSalary()"  />
				<input type="hidden" id="min_salary" name="min_salary" value="" />
				<input type="hidden" id="max_salary" name="max_salary" value="" />
				<span id="valid_basic_salary_input" class="red">{$valid.basic_salary}</span>
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
				<label for="inputTitle">{$lable.salary_component.value}(<span class="red">*</span>)</label>
				<div class="input-group col-md-12">
					<input type="text" name="data[salary_component]" id="salary_component" class="col-md-6 form-control" value="{$data.salary_component}" placeholder="" maxlength="30" onblur="hideMsg('salary_component')" />
					<span id="valid_salary_component" class="red">{$valid.salary_component}</span>
				</div>
				<div class="separator"></div>	
				-->
				
				<!-- tần suất trả -->
				<label for="inputTitle">{$lable.pay_frequency.value}</label>
				<div class="input-group col-md-12">
				<select name="data[payperiod_code]" class="col-md-4 form-control">
					<option value=""> ---{$lable.select.value}  {$lable.pay_frequency.value}---</option>
					{foreach from=$pay_frequency item=vl key=k}
						<option value="{$k}"  {if $data.payperiod_code eq $k} selected="selected"{/if}> {$vl.record.name} </option>
					{/foreach}
				</select>
				</div>
				<div class="separator"></div>
				
				 <!-- bình luận -->
				<label for="inputTitle">{$lable.comments.value}</label>
				<div class="input-group col-md-12">
					<textarea rows="6" cols="47" name="data[comments]" class="form-control" id="comments"  placeholder="" maxlength="30" > {$data.comments} </textarea>
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
				<label for="inputTitle">{$lable.add_direct_deposit_details.value}</label>  
				<input type="checkbox" value="1" name="creat_login_account" id="creat_login_account" {if $creat_login_account eq 1 | $account.account_number != "" } checked="checked" {/if}  />
				<div class="separator"></div>
			</div>
			
			<div id="id_add_account_login">
			<div class="col-md-6">
			
				<!-- số tài khoản -->
				<label for="inputTitle">{$lable.account_number.value} (<span class="red">*</span>)</label>
				<div class="input-group col-md-12">
					<input type="text" id="account_number" name="account[account_number]" class="col-md-6 form-control" value="{$account.account_number}" placeholder="" maxlength="30" onblur="hideMsg('account_number')" />
					<span id="valid_account_number" class="red">{$valid.account_number} </span>
				</div>
				<div class="separator"></div>	
				
				<!-- tên tài khoản -->
				<label for="inputTitle">{$lable.account_name.value} (<span class="red">*</span>)</label>
				<div class="input-group col-md-12">
					<input type="text" id="account_name" name="account[account_name]" class="col-md-6 form-control" value="{$account.account_name}" placeholder="" maxlength="30" onblur="hideMsg('account_name')" />
					<span id="valid_account_name" class="red">{$valid.account_name} </span>
				</div>
				<div class="separator"></div>
				
				
			</div>
			<div class="col-md-6">
			
				<!-- ngân hàng -->
				<label for="inputTitle">{$lable.account_bank.value} (<span class="red">*</span>)</label>
				<div class="input-group col-md-12">
					<input type="text" id="account_bank" name="account[account_bank]" class="col-md-6 form-control" value="{$account.account_bank}" placeholder="" maxlength="30" onblur="hideMsg('account_bank')" />
					<span id="valid_account_bank" class="red">{$valid.account_bank} </span>
				</div>
				<div class="separator"></div>
				
				<!-- só tiền -->
				<label for="basic_salary">{$lable.amount.value} (<span class="red">*</span>)</label>
				<div class="input-group col-md-12">
					<input type="text" id="account_amount" name="account[account_amount]" class="col-md-6 form-control" value="{$account.account_amount}" placeholder="" maxlength="30" onblur="hideMsg('account_amount')" />
					<span id="valid_account_amount" class="red">{$valid.account_amount}</span>
				</div>
				<div class="separator"></div>
				
			</div>
			
			</div><!-- #id_add_account_login-->
			
		</div>
		</div>		
		<!--// END form hide-show-->
		
		<div class="col-md-12">
			(<span class="red">*</span>) {$lable.required_field.value}
			<div class="separator"></div>
		</div>
		
	</div>
</div>