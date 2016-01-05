{include file="header.tpl"}
{include file="sidebar.tpl"}
<link rel="stylesheet" href="{$base_tpl}/css/chosen.css">

<div id="content">

    {include file="sidebar_header.tpl"}
    {include file="breadcrumb.tpl"}
	
    <div class="innerLR">
        
        <form class="form-horizontal margin-none" id="frm_data" name="frm_data" method="post" action="{$form.control}/add/" autocomplete="off">
		<input type="hidden" name="primary" id="primary" value="{$data.id}" />
		<input type="hidden" name="option" id="option" value="{$option}" />
		
            <div class="widget">
                
                <div class="widget-head">
                    <h4 class="heading">{$heading}</h4>
                </div>
                
                <div class="widget-body innerAll inner-2x">
                    <div class="row innerLR">
					
                        	<div class="col-md-12">
								<!-- group box 1-->
								<div class="box-generic">
								<div class="row">
									<!-- group box 1--left-->
									<div class="col-md-6">
									
										<label for="inputTitle">{$lable.name.value} <span class="red">*</span></label>
										<div class="input-group col-md-10">
											<input type="text" name="data[name]" id="name" value="{$data.name|stripslashes}" class="col-md-4 form-control" maxlength="50" onblur="hideMsg('name')" />
											<span id="valid_name" class="red">{$valid.name}</span>	
										</div>
										<div class="separator"></div>	
														
										<label for="inputTitle">{$lable.countries.value} <span class="red">*</span></label>
										<div class="input-group col-md-10">
											<select name="data[country_code]" id="country_code" class="col-md-4 form-control" onchange="hideMsg('country_code')">
												<option value="">-- {$lable.select.value} --</option>
												{foreach from=$countries item=vl key=k}
												<option value="{$k}"  {if $data.country_code eq $k} selected="selected"{/if}> {$vl.name} </option>
												{/foreach}
											</select>
											<span id="valid_country_code" class="red">{$valid.country_code}</span>
										</div>
										<div class="separator"></div>	
														
										<label for="inputTitle">{$lable.provience_state.value}</label>
										<div class="input-group col-md-10">
											<input type="text" name="data[province]" id="province" value="{$data.province|stripslashes}" class="col-md-4 form-control" maxlength="50" />
										</div>
										<div class="separator"></div>	
						
										<label for="inputTitle">{$lable.provience.value}</label>
										<div class="input-group col-md-10">
											<input type="text" name="data[city]" id="city" value="{$data.city|stripslashes}" class="col-md-4 form-control" maxlength="50" />
										</div>
										<div class="separator"></div>
										
										<label for="inputTitle">{$lable.address.value}</label>
										<div class="input-group col-md-10">
											<textarea name="data[address]" id="address" class="form-control" rows="3">{$data.address|stripslashes}</textarea>
										</div>
										<div class="separator"></div>	
										
									
										
									</div>
									<!-- group box 1-- right-->
									<div class="col-md-6" >	
														
										<label for="inputTitle">{$lable.zipcode.value}</label>
										<div class="input-group col-md-12">
											<input type="text" name="data[zip_code]" id="zip_code" value="{$data.zip_code}" class="col-md-4 form-control" maxlength="50" />
										</div>
										<div class="separator"></div>	
														
										<label for="inputTitle">{$lable.phone.value}</label>
										<div class="input-group col-md-12">
											<input type="text" name="data[phone]" id="phone" value="{$data.phone}" class="col-md-4 form-control" maxlength="50" />
										</div>
										<div class="separator"></div>	
						
										<label for="inputTitle">Fax</label>
										<div class="input-group col-md-12">
											<input type="text" name="data[fax]" id="fax" value="{$data.fax}" class="col-md-4 form-control" maxlength="50" />
										</div>
										<div class="separator"></div>	
						
										<label for="inputTitle">{$lable.notes.value}</label>
										<div class="input-group col-md-12">
											<textarea name="data[notes]" id="notes" class="form-control" rows="3">{$data.notes|stripslashes}</textarea>
										</div>
										<div class="separator"></div>	
									
									
									</div>	
									
									
						
								</div>
								
								<button type="button" id="btnSaveLocation" class="btn btn-primary"><i class="fa fa-check-circle"></i> {$lable.btn_save.value}</button>
													
								</div>
								
								<div class="col-md-12">
									<div class="form-actions pull-right">
										(<span class="red">*</span>) {$lable.required_field.value}
									</div>	
									<div class="separator"></div>
								</div>
								
							</div>
							
                    	</div><!-- // Row END -->
						
                   
                    </div>
                    <div class="separator"></div>                    
                </div>
				
            </div><!-- // Widget END -->
        </form>
        
    </div><!-- .innerLR-->
	  
</div><!-- .content-->

{include file="footer.tpl"}
{include file="script_validator.tpl"}

<script src="{$base_tpl}/js/chosen.jquery.js" type="text/javascript"></script>

<script src="{$base_tpl}/js/locations.js" type="text/javascript"></script>
<script>

var please_input_name = "{$lable.please_input.value} Name";
var please_select_country = "{$lable.please.value} {$lable.select.value} {$lable.countries.value}";

{literal}

	$('#country_code').chosen({disable_search_threshold: 10});

{/literal}
</script>