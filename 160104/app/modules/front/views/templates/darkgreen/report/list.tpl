{include file="header.tpl"}
{include file="sidebar.tpl"}
<link rel="stylesheet" href="{$base_tpl}/css/custom.css" />
<div id="content">

    {include file="sidebar_header.tpl"}    
    {include file="breadcrumb.tpl"}
    <div class="innerLR">
			
		{if $alert neq ''} {include file="notes.tpl"} {/if}
		
		{foreach from=$preset_general key=k item=vl}
			{include file="paygrades/list_loop.tpl" key=$k nameset=$vl}
		{/foreach}

    </div>    
</div>

<div id="general_empty" style="display:none;">
	{include file="jobtitlesetting/index_multi.tpl}
</div>
<input type="hidden" id="old_url_append" value="{$base_url_admin}{$form.control}/add/" />

{include file="footer.tpl"}

<script src="{$base_tpl}/js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="{$base_tpl}/js/plugins/dataTables/dataTables.bootstrap.js"></script>
<script src="{$base_tpl}/assets/components/library/bootstrap/js/bootstrap-tooltip.js"></script>
<script src="{$base_tpl}/assets/components/library/bootstrap/js/bootstrap-confirmation.js"></script>

<script language="javascript">
{literal}
$(document).ready(function() { 
	$('#dataTables-lang').dataTable(); 
	
	!function ($) {	
		$(function(){ $('[data-toggle="confirmation"]').confirmation(); }) 
	}(window.jQuery);
});
{/literal}
</script>

<script src="{$base_tpl}/js/general.js"></script>