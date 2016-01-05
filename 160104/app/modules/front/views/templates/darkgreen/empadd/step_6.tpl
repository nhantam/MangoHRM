
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
			
				<!-- tài liệu -->
				<div class="col-md-12" id="emp_passport">
					{foreach from=$immigration item=vl key=k}
						<label for="ep_passport_type_flg_{$k}">{$vl}</label>  
						<input type="radio" value="{$k}" name="data[ep_passport_type_flg]" id="ep_passport_type_flg_{$k}" {if $data.ep_passport_type_flg eq $k} checked="checked" {/if} onblur="hideMsg('ep_passport_type_flg')" />
					
					{/foreach}
					<label for="inputTitle"> (<span class="red">*</span>)</label>
					<span id="valid_ep_passport_type_flg" class="red">{$valid.ep_passport_type_flg}</span>
				</div>
				<div class="separator"></div>
			
				<!-- số -->
				<label for="inputTitle">{$lable.number.value} (<span class="red">*</span>)</label>
				<div class="input-group col-md-12">
					<input type="text" name="data[ep_passport_num]" id="ep_passport_num" class="col-md-6 form-control" value="{$data.ep_passport_num}" placeholder="" maxlength="30" onblur="hideMsg('ep_passport_num')" />
					<span id="valid_ep_passport_num" class="red">{$valid.ep_passport_num}</span>
				</div>
				<div class="separator"></div>
					
				
						<!-- ngày ban hành-->
				<label for="inputTitle">{$lable.issued_date.value}</label>
				<div class="input-group col-md-12">
				<input type="date" name="data[ep_passportissueddate]" id="ep_passportissueddate" class="col-md-6 form-control" value="{$data.ep_passportissueddate}" placeholder="" maxlength="30" />
				</div>
				<div class="separator"></div>	
				
						<!-- ngày hiêu lực-->
				<label for="inputTitle">{$lable.expiry_date.value}</label>
				<div class="input-group col-md-12">
				<input type="date" name="data[ep_passportexpiredate]" id="ep_passportexpiredate" class="col-md-6 form-control" value="{$data.ep_passportexpiredate}" placeholder="" maxlength="30" />
				</div>
				<div class="separator"></div>	
				
					 <!-- trạng thái -->
				<label for="inputTitle">{$lable.eligible_status.value}</label>
				<div class="input-group col-md-12">
					<input type="text" name="data[ep_i9_status]" id="ep_i9_status" class="col-md-6 form-control" value="{$data.ep_i9_status}" placeholder="" maxlength="30" onblur="hideMsg('ep_i9_status')" />
				</div>
				<div class="separator"></div>
				
				
			</div>
			<!-- group box 1-- right-->
			<div class="col-md-6" >	
			
				<!-- ban hành bởi -->
				<label for="inputTitle">{$lable.issued_by.value}</label>
				<div class="input-group col-md-12">
				<select name="data[country_code]" class="col-md-4 form-control">
					<option value=""> ---{$lable.select.value}  {$lable.nation_code.value}---</option>
					{foreach from=$countries item=vl key=k}
						<option value="{$k}"  {if $data.country_code eq $k} selected="selected"{/if}> {$vl.name} </option>
					{/foreach}
				</select>
				</div>
				<div class="separator"></div>	
				
				<!-- ngày đủ đk xét-->
				<label for="inputTitle">{$lable.eligible_review_date.value}</label>
				<div class="input-group col-md-12">
				<input type="date" name="data[ep_i9_review_date]" id="ep_i9_review_date" class="col-md-6 form-control" value="{$data.ep_i9_review_date}" placeholder="" maxlength="30" />
				</div>
				<div class="separator"></div>	
				
				 <!-- bình luận -->
				<label for="inputTitle">{$lable.comments.value}</label>
				<div class="input-group col-md-12">
					<textarea rows="6" cols="47" name="data[ep_comments]" class="form-control" id="ep_comments"></textarea>
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