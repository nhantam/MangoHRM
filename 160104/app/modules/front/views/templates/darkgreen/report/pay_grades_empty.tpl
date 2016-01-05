<link rel="stylesheet" href="{$base_tpl}/css/chosen.css">
<div class="multi-producttion"> 
<div class="box-generic"> 
<div class="row"> 

	<form class="form-horizontal margin-none" id="frm_pay_grades" name="frm_pay_grades" method="post" action="{$form.control}/addpaygrades/" autocomplete="off">
	<input type="hidden" name="option" id="option" value="{$option}" />
	<input type="hidden" name="data[pay_grade_id]" id="pay_grade_id" value="{$data.id}" />
	<input type="hidden" name="custom_type" value="{$data.type}" />
	<input type="hidden" name="b" value="{$data.type}" />
	<input type="hidden" name="sub" value="{$sub}" /> 
	
	<div class="col-md-4" style="padding:0px;">                         
	   <div class="form-group">
			<label class="col-md-4 control-label" for="currency_id" style="padding:0px;">Currency <span class="red">*</span></label>
			<div class="col-md-8">
				<select name="data[currency_id]" id="currency_id">
					<option value="">Select Currency</option>
					{foreach from=$currencyType item=vl}
						<option value="{$vl.currency_id}" {if $sub_edit.currency_id eq $vl.currency_id} selected="selected"{/if}>{$vl.currency_id} - {$vl.currency_name}</option>
					{/foreach}
				</select>
				<span id="valid_currency_id" class="red" style="clear:both;">{$valid.currency_id}</span>
			</div>
		</div>
	</div>
	
	<div class="col-md-3" style="padding-right:0px;">                         
	   <div class="form-group">
			<label class="col-md-3 control-label" for="min_salary">Minimum Salary</label>
			<div class="col-md-9">
				<input class="form-control" name="data[min_salary]" id="min_salary" value="{$sub_edit.min_salary}" type="text" maxlength="20" />
				<span id="valid_min_salary" class="red">{$valid.min_salary}</span>
			</div>
		</div>
	</div>
	
	<div class="col-md-3">                         
	   <div class="form-group">
			<label class="col-md-3 control-label" for="max_salary">Maximum Salary</label>
			<div class="col-md-9">
				<input class="form-control" name="data[max_salary]" id="max_salary" value="{$sub_edit.max_salary}" type="text" maxlength="20" />
				<span id="valid_max_salary" class="red">{$valid.max_salary}</span>
			</div>
		</div>
	</div>
	
	<div class="col-md-1">
		<div class="form-actions pull-right">
			<button type="button" id="btn_pay_grades" class="btn btn-primary"><i class="fa fa-check-circle"></i> </button>
		</div>
	</div>
	</form>
	
</div> 
</div> 
</div> 