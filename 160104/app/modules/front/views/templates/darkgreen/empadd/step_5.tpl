
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
				<label for="inputTitle">{$lable.firstname.value}</label>
				<div class="input-group col-md-12">
					<input type="text" name="data[ed_name]" id="ed_name" class="col-md-6 form-control" value="{$data.ed_name}" placeholder="" maxlength="30" onblur="hideMsg('ed_name')" />
				</div>
				<div class="separator"></div>
				
				<!-- mối quan hệ -->
				<label for="inputTitle">{$lable.relation.value}</label>
				<div class="input-group col-md-12">
				<select name="data[ed_relationship_type]" class="col-md-4 form-control">
					<option value=""> ---{$lable.select.value}  {$lable.relation.value}---</option>
					{foreach from=$select_box item=vl key=k}
						<option value="{$vl.id}"  {if $data.ed_relationship_type eq $vl.id} selected="selected"{/if}> {$vl.name} </option>
					{/foreach}
				</select>
				</div>
				<div class="separator"></div>		
				
						<!-- ngày sinh-->
				<label for="inputTitle">{$lable.birthday.value}</label>
				<div class="input-group col-md-12">
				<input type="date" name="data[ed_birthday]" id="ed_birthday" class="col-md-6 form-control" value="{$data.ed_birthday}" placeholder="" maxlength="30" />
				</div>
				<div class="separator"></div>	
				
			</div>
			<!-- group box 1-- right-->


		</div>
		</div>
		
		<div class="col-md-12">
			(<span class="red">*</span>) {$lable.required_field.value}
			<div class="separator"></div>
		</div>
		
	</div>
</div>