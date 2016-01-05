<div class="col-md-6">

	<label for="inputTitle">{$lable.company.value} (<span class="red">*</span>)</label>
	<div class="input-group col-md-12">
		<input type="text" id="account_name" name="data[eexp_company]" class="col-md-6 form-control" value="{$data.eexp_company}" placeholder="" maxlength="30" onblur="hideMsg('eexp_company')" />
		<span id="valid_eexp_company" class="red">{$valid.eexp_company} </span>
	</div>
	<div class="separator"></div>
	
	<!-- ngày bắt đầu-->
	<label for="inputTitle">{$lable.start_date.value}</label>
	<div class="input-group col-md-12">
	<input type="date" name="data[econ_extend_start_date]" id="econ_extend_start_date" class="col-md-6 form-control" value="{$contractExtend.econ_extend_start_date}" maxlength="30" />
	</div>
	<div class="separator"></div>	
	
	<!-- ngày kết thúc-->
	<label for="inputTitle">{$lable.end_date.value}</label>
	<div class="input-group col-md-12">
	<input type="date" name="data[econ_extend_end_date]" id="econ_extend_end_date" class="col-md-6 form-control" value="{$contractExtend.econ_extend_end_date}" maxlength="30" />
	</div>
	<div class="separator"></div>	

	</div>
	<div class="col-md-6">

	<!-- chức vụ-->
	<label for="inputTitle">{$lable.job_title.value} (<span class="red">*</span>)</label>
	<div class="input-group col-md-12">
		<input type="text" id="account_name" name="account[account_name]" class="col-md-6 form-control" value="{$account.account_name}" placeholder="" maxlength="30" onblur="hideMsg('account_name')" />
		<span id="valid_account_name" class="red">{$valid.account_name} </span>
	</div>
	<div class="separator"></div>
	
	<!-- bình luận -->
	<label for="inputTitle">{$lable.comments.value}</label>
	<div class="input-group col-md-12">
		<textarea rows="5" cols="47" name="data[comments]" class="form-control" id="comments"  placeholder="" maxlength="30" > {$data.comments} </textarea>
	</div>
	<div class="separator"></div>	
	
</div>
	
<div class="col-md-12">
	<div class="form-actions pull-left"> <!--button Save-->
		<div class="separator"></div>
		<button type="button" class="btn btn-sm btn-success" name="btn_post_experience" id="btn_post_experience">
			<i class="fa fa-check-circle"></i> {$lable.btn_save.value}
		</button> &nbsp; 
		<button type="button" class="btn btn-sm btn-danger" name="btn_cancel_experience" id="btn_cancel_experience">
			<i class="fa fa-times"></i> {$lable.cancel.value}
		</button>
	</div>

	
</div>