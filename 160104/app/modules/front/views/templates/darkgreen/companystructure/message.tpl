{include file="header.tpl"}
{include file="sidebar.tpl"}

<link rel="stylesheet" href="{$base_tlp_admin}/css/custom.css" />

<div id="content">

    {include file="sidebar_header.tpl"}
    
    {include file="breadcrumb.tpl"}
    <div class="innerLR">
			
			{if $msg neq ''} {include file="notes.tpl"} {/if}
			
			<div class="widget">			
			<div class="widget-head">
				<h4 class="heading">{$heading}</h4>
			</div>
			 
    </div>    
</div>

{include file="footer.tpl"}

<script src="{$base_tlp_admin}/assets/components/library/bootstrap/js/bootstrap-tooltip.js"></script>
<script src="{$base_tlp_admin}/assets/components/library/bootstrap/js/bootstrap-confirmation.js"></script>

<script src="{$base_tlp_admin}/assets/components/common/forms/elements/bootstrap-datepicker/assets/lib/js/bootstrap-datepicker.js?v=v1.0.3-rc2&sv=v0.0.1.1"></script>
<script src="{$base_tlp_admin}/assets/components/common/forms/elements/bootstrap-datepicker/assets/custom/js/bootstrap-datepicker.init.js?v=v1.0.3-rc2&sv=v0.0.1.1"></script>
