{include file="header.tpl"}
{include file="sidebar.tpl"}

<div id="content">

    {include file="sidebar_header.tpl"}
    
    {include file="breadcrumb.tpl"}
    <div class="innerLR">
        
        <form class="form-horizontal margin-none" id="frm_data" name="frm_data" method="post" action="{$base_url}{$form.control}/processnested/">
		<input type="hidden" name="option" id="option" value="{$option}" />
		<input type="hidden" name="data[mcId]" id="mcId" value="{$data.mcId}" />
		
            <!-- Widget -->
            <div class="widget">
                <!-- Widget heading -->
                <div class="widget-head">
                    <h4 class="heading">{$heading}</h4>
                </div>
                <!-- // Widget heading END -->
                <div class="widget-body innerAll inner-2x">
                    <!-- Row -->
                    <div class="row innerLR">
                        <!-- Column -->
                        <div class="col-md-10">
							
							{if $alert neq ''} {include file="notes.tpl"} {/if}
							
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="primary">{$lable.company_structure.value}</label>
                                <div class="col-md-6">
                                    <select data-placeholder="Danh mục.." class="col-md-8 form-control" name="data[parents]" id="select2_1">
										{$arrNested.cmb}
									</select>
									<p class="help-block">{$valid.cmbCat}</p>
                                </div>
                           </div>
						   
						   <div class="form-group">
                                <label class="col-md-4 control-label" for="lang_value">{$lable.dept_brand.value}</label>
                                <div class="col-md-6">
									<input type="text" name="data[mcCategory]" id="mcCategory" value="{$arrNested.mcCategory}" class="form-control" />
								</div>
							</div>	
							
							<div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-8">
                                    <div class="form-actions">
										<button type="submit" id="btnSubUnit" class="btn btn-primary"><i class="fa fa-check-circle"></i> {if $option eq 'edit'} {$lable.btn_edit.value} {else} {$lable.btn_save.value} {/if}</button>
									</div>									
                                </div>	
                            </div>                           	
                           
                        </div>
                        <!-- // Column END -->
                    </div>
                    <!-- // Row END -->
                   
                    </div>
                    <div class="separator"></div>                    
                </div>
            </div> <!-- // Widget END -->
        </form>
        
    </div>    
</div>

{include file="footer.tpl"}
{include file="script_validator.tpl"}


<!--
<script src="{$base_tlp_admin}/assets/components/common/forms/elements/bootstrap-select/assets/lib/js/bootstrap-select.js?v=v1.0.3-rc2"></script>
<script src="{$base_tlp_admin}/assets/components/common/forms/elements/bootstrap-select/assets/custom/js/bootstrap-select.init.js?v=v1.0.3-rc2"></script>
<script src="{$base_tlp_admin}/assets/components/common/forms/elements/select2/assets/lib/js/select2.js?v=v1.0.3-rc2&sv=v0.0.1.1"></script>
<script src="{$base_tlp_admin}/assets/components/common/forms/elements/select2/assets/custom/js/select2.init.js?v=v1.0.3-rc2&sv=v0.0.1.1"></script>
<script src="{$base_tlp_admin}/assets/components/common/forms/elements/multiselect/assets/lib/js/jquery.multi-select.js?v=v1.0.3-rc2&sv=v0.0.1.1"></script>
<script src="{$base_tlp_admin}/assets/components/common/forms/elements/multiselect/assets/custom/js/multiselect.init.js?v=v1.0.3-rc2&sv=v0.0.1.1"></script>
-->

<!--
<script src="{$base_tlp_admin}/js/bang.js"></script>
-->

