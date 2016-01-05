{include file="header.tpl"}
{include file="sidebar.tpl"}

<div id="content">

    {include file="sidebar_header.tpl"}
    
    {include file="breadcrumb.tpl"}
    <div class="innerLR">
			
			{if $alert neq ''} {include file="notes.tpl"} {/if}
			
			<link href="{$base_tpl}/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
			
			<div class="widget">
				<div class="widget-head">
					<h4 class="heading">{$lable.list.value}</h4>
				</div>
				<div class="widget-body innerAll inner-2x">
					
					<table class="table table-bordered table-condensed" id="dataTables-lang">
						<thead>
							<tr>
								<th>{$lb.var}</th>
								<th>{$lb.name}</th>								
							</tr>
						</thead>
						<tbody>
						{foreach from=$lable item=vl}
							<tr>
								<td>
									<a href="{$base_url}lang/?id={$vl.name}&option=edit" title="{$lb.modify}">{$vl.name}
									</a>
								</td>
								<td>
									<input class="form-control" type="text" name="value" value="{$vl.value|stripslashes|stripslashes}" style="width:400px;" />
								</td>								
							</tr>
						{/foreach}								
						</tbody>
					</table>
					
					<a href="{$base_url}lang/" id="btnLogin" class="btn btn-primary btn-sm">{$lable.add.value}</a>
				
				</div><!-- /.widget-body -->
			</div><!-- /.widget -->
			 
    </div>    
</div>

{include file="footer.tpl"}

<script src="{$base_tpl}/js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="{$base_tpl}/js/plugins/dataTables/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="{$base_tpl}/js/jconfirmaction.jquery.js"></script>
<script language="javascript">
{literal}
$(document).ready(function() { 
	$('#dataTables-lang').dataTable(); 
	//$('.ask').jConfirmAction(); $('#flashMsg').delay(4000).fadeOut("slow");
});
{/literal}
</script>