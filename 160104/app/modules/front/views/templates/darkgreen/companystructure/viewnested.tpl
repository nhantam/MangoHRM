{include file="header.tpl"}
{include file="sidebar.tpl"}

<div id="content">

    {include file="sidebar_header.tpl"}
    
    {include file="breadcrumb.tpl"}
    <div class="innerLR">
			
			{if $msg neq ''} {include file="notes.tpl"} {/if}
			
			<div class="widget">			
			<div class="widget-head">
				<h4 class="heading">{$heading}</h4>
			</div>
			
			<form name="frm_list" method="get" action="">
			<div class="widget-body overflow-x">
			
				<div class="purchase-product">					
					<div class="row">
						<div class="separator bottom"></div>
						
						<div class="form-actions pull-right">
							<h4>&nbsp; </h4>
							<a href="{$base_url}{$form.control}/addnested/" id="btnAddUser" class="btn btn-primary">{$lable.add.value}</a>
						</div>
						
					</div>
				</div>				
				<div class="separator"></div>
			
				<table class="dynamicTable fixedHeaderColReorder table">
					<thead class="bg-gray">
						<tr>
							<th>ID</th>
							<th>Parent</th>
							<th>{$lable.dept_brand.value}</th>
							<th>{$lable.level.value}</th>
							<th>&nbsp;  </th>
						</tr>
					</thead>
					<tbody>
						{foreach from=$items item=vl}
						<tr class="gradeX">
							<td>{$vl.mcId}</td>
							<td>{$vl.parents}</td>
							<td>
								{if $vl.level eq 0}
									<b style="color:red">{$vl.mcCategory}</b>
								{elseif $vl.level eq 1}
									+ <b>{$vl.mcCategory}</b>
								{else}			
									{math assign="sub_level" equation='x*y' x=12 y=$vl.level}
									<span style="padding-left:{$sub_level}px;"> - - {$vl.mcCategory}</span>
								{/if}
							</td>
							<td>
								{$vl.level}
							</td>
							<td class="right right_padding">
								{if $vl.level gt 0}					
								<a href="{$base_url}{$form.control}/addnested/id/{$vl.mcId}/option/edit" class="btn btn-sm btn-success button_margin" title="Update {$vl.mcCategory}"><i class="fa fa-pencil"></i></a>	
								{/if}
								
								{if $ss_admin->adminRole eq 'ADMINISTRATOR' && $vl.level gt 1}
									<a data-toggle="confirmation" data-placement="left" href="javascript:void(0)" data-href="{$base_url}{$form.control}/delnested/id/{$vl.mcId}" class="ask btn btn-sm btn-danger button_margin" title="Delete"><i class="fa fa-trash-o"></i></a>
								{/if}
													
							</td>
						</tr>
						{/foreach}
					</tbody>
				</table>
				
				{include file="paginator.tpl"}
				
			</div>
			</div>
			</form>	
			 
    </div>    
</div>

{include file="footer.tpl"}

<script src="{$base_tpl}/assets/components/library/bootstrap/js/bootstrap-tooltip.js"></script>
<script src="{$base_tpl}/assets/components/library/bootstrap/js/bootstrap-confirmation.js"></script>

<script>

{literal}
$(document).ready(function() { 

	!function ($) {
		$(function(){
			$('[data-toggle="confirmation"]').confirmation();	
		});
	}(window.jQuery)
	
});
{/literal}
</script>