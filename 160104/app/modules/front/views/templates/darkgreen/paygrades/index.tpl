{include file="header.tpl"}
{include file="sidebar.tpl"}

<div id="content">

    {include file="sidebar_header.tpl"}    
    {include file="breadcrumb.tpl"}
	
    <div class="innerLR">
        
       
            
            <div class="widget">
                
                <div class="widget-head"><h4 class="heading">{$lable.pay_grades.value}</h4></div>                
                <div class="widget-body">
                    
                    <div class="row innerLR">
						{if $alert neq ''} {include file="notes.tpl"} {/if}
                       
					    
						<div class="box-generic">
							
							<br />
							<form class="form-horizontal margin-none" id="langForm" name="langForm" method="post" action="{$form.control}/add/" autocomplete="off">
							<input type="hidden" name="option" id="option" value="{$option}" />
							<input type="hidden" name="primary" id="primary" value="{$data.id}" />
							<input type="hidden" name="custom_type" value="{$data.type}" />
							<input type="hidden" name="b" value="{$data.type}" />
						
							<div class="row">
								<div class="col-md-6">
								   <div class="form-group">
										<label class="col-md-3 control-label" for="name">{$lable.name.value} (<span class="red">*</span>)</label>
										<div class="col-md-7">
											<input class="form-control" name="name" id="name" value="{$data.name|stripslashes|stripslashes}" type="text" maxlength="80" />
											<span class="help-block">{$valid.name}</span>
										</div>
										
										<div class="col-md-2">
											<div class="form-actions pull-right">
												<button type="submit" class="btn btn-primary">
													<i class="fa fa-check-circle"></i> {$lable.btn_save.value}</button>
											</div>
										</div>
								
									</div>
								</div>												
							</div>	<!--.row--> 
							</form>
							
							<br clear="all" />
							
							{include file="paygrades/list_currency.tpl"}
							
							
						</div><!-- /box-generic-->
						
						
						                        
                    </div><!-- // Row END -->
                   
                    </div>                    
                </div>
				
				
				
            </div> <!-- // Widget END -->
        
		
    </div>
</div>


{include file="footer.tpl"}
{include file="script_validator.tpl"}

<script src="{$base_tpl}/js/chosen.jquery.js" type="text/javascript"></script>

<script src="{$base_tpl}/assets/components/library/bootstrap/js/bootstrap-tooltip.js"></script>
<script src="{$base_tpl}/assets/components/library/bootstrap/js/bootstrap-confirmation.js"></script>
<script language="javascript">

var valid_currency_id = "Please select Currency";
var require_input_int = "Vui long nhap so nguyen"

{literal}	
	!function ($) {	
		$(function(){ 
			$('[data-toggle="confirmation"]').confirmation(); 
		}) 
	}(window.jQuery)	
	
	$('#currency_id').chosen({disable_search_threshold: 10});
	
{/literal}
</script>
<script src="{$base_tpl}/js/pay_grades.js"></script>