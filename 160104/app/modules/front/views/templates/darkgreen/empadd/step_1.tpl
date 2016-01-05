<div class="row">
	<div class="col-md-2">
		<strong>Product title</strong>
		<p class="muted">Lorem ipsum dolor sit amet, consecteturadipiscing elit.</p>
	</div>
	<div class="col-md-10">
		
		<div class="box-generic">
		<div class="row">
		
			<div class="col-md-6">
				<label for="inputTitle">{$lable.firstname.value} (<span class="red">*</span>)</label>
				<div class="input-group col-md-12">
					<input type="text" name="data[emp_firstname]" id="emp_firstname" class="col-md-6 form-control" value="{$data.emp_firstname}" placeholder="" maxlength="30" onblur="hideMsg('emp_firstname')" />
					<span id="valid_emp_firstname" class="red">{$valid.emp_firstname}</span>
				</div>
				<div class="separator"></div>
				
				<label for="inputTitle">{$lable.middle_name.value}</label>
				<div class="input-group col-md-12">
				<input type="text" name="data[emp_middle_name]" id="emp_middle_name" class="col-md-6 form-control" value="{$data.emp_middle_name}" placeholder="" maxlength="30" />
				</div>
				<div class="separator"></div>
				
				<label for="inputTitle">{$lable.lastname.value} (<span class="red">*</span>)</label>
				<div class="input-group col-md-12">
					<input type="text" name="data[emp_lastname]" id="emp_lastname" class="col-md-6 form-control" value="{$data.emp_lastname}" placeholder="" maxlength="30" onblur="hideMsg('emp_lastname')" />
					<span id="valid_emp_lastname" class="red">{$valid.emp_lastname}</span>
				</div>
				<div class="separator"></div>
				
			</div>
			
			<div class="col-md-6">
				<label for="inputTitle">{$lable.picture.value}</label>
				<div class="input-group col-md-12">
					<input type="file" name="file_avatar" />
					<small>{$lable.file_image_support_avatar.value}</small>
					<span id="valid_avatar" class="red">
					{foreach from=$fileError item=error} &nbsp; {$error}<br />{/foreach}
					</span>
				</div>
				<div class="separator"></div>

			</div>
		
		</div>
		</div>
		
		<div class="box-generic">
		<div class="row">
		
			<div class="col-md-12">
				<label for="inputTitle">{$lable.creat_login_account.value}</label>  
				<input type="checkbox" value="1" name="creat_login_account" id="creat_login_account" {if $creat_login_account eq 1} checked="checked" {/if} />
				<div class="separator"></div>
			</div>
			
			<div id="id_add_account_login">
			
			<div class="col-md-6">
			
				<label for="inputTitle">{$lable.username.value} (<span class="red">*</span>)</label>
				<div class="input-group col-md-12">
					<input type="text" id="username" name="account[adminLogin]" class="col-md-6 form-control" value="{$account.adminLogin}" placeholder="" maxlength="30" onblur="hideMsg('username')" />
					<span id="valid_username" class="red">{$valid.username} </span>
				</div>
				
				<label for="inputTitle">{$lable.password.value} (<span class="red">*</span>)</label>
				<div class="input-group col-md-12">
					<input type="password" id="password" name="account[password]" class="col-md-6 form-control" value="" placeholder="" onblur="hideMsg('password')" />
				</div>	
				
				<label for="inputTitle">{$lable.re_password.value} (<span class="red">*</span>)</label>
				<div class="input-group col-md-12">
					<input type="password" id="re_password" name="account[re_password]" class="col-md-6 form-control" value="" placeholder="" onblur="hideMsg('re_password')" />
					<span id="valid_re_password" class="red">{$valid.re_password}</span>
				</div>	
				<div class="separator"></div>
				
			</div>
			
			<div class="col-md-6">
				<label for="inputTitle">{$lable.status.value}</label>
				<select name="account[adminAvail]" class="col-md-4 form-control">
					<option value="1"> {$lable.active.value} </option>
					<option value="0"> {$lable.disable.value} </option>
				</select>
				<div class="separator"></div>
			</div>
			
			</div><!-- #id_add_account_login-->
			
		
		</div>
		</div>
		
		<div class="col-md-12">
			(<span class="red">*</span>) {$lable.required_field.value}
			<div class="separator"></div>
		</div>
		
	</div>
</div>