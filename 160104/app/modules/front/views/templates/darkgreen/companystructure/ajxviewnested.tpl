<form id="appForm" name="appForm" action="{$base_url}/admin/category/viewnested" method="POST" enctype="multipart/form-data">
<table id="rounded-corner" summary="2011 E-store Admin">
<thead>
<tr>
	<th scope="col" class="rounded-company">ID</th>
	<th scope="col" class="rounded">Parent</th>
	<th scope="col" class="rounded">{$lable.categories}</th>	
	<th scope="col" class="rounded">Level</th>
	<th scope="col" class="rounded">{$lable.icon}</th>	
	<th scope="col" class="rounded">Edit</th>
	<th scope="col" class="rounded-q4">Delete</th>
</tr>
</thead>
<tfoot>
<tr>
	<td colspan="6" class="rounded-foot-left">
	<em>List {$lable.categories}</em>
	<br />
	<div style="width:50%">	 
	<a href="{$base_url}/{$form.module}/{$form.control}/addnested" class="bt_green"><span class="bt_green_lft"></span><strong>{$lable.add_item}</strong><span class="bt_green_r"></span></a>
	</div>
	<div style="width:49%; float:right">{include file="paginator_ajx.tpl"}</div>
	</td>
	<td class="rounded-foot-right">&nbsp;</td>
</tr>
</tfoot>
<tbody>
{foreach from=$items item=vl}
	<tr>
	<td>
		<input type="hidden" name="mcId[]" value="{$vl.mcId}" />
		{$vl.mcId}
	</td>
	<td>{$vl.parents}</td>
    <td id='contact-form'>
		
		{if $vl.level eq 0}
			<b style="color:red">{$vl.mcCategory}</b>
 		{elseif $vl.level eq 1}
	 		+ <b>{$vl.mcCategory}</b>
	 	{else}			
			{math assign="sub_level" equation='x*y' x=8 y=$vl.level}
	 		<span style="padding-left:{$sub_level}px;"> - - {$vl.mcCategory}</span>
	 	{/if}
		
		{*if $vl.sub==1}{$vl.subLink}{else}{$vl.mcCategory}{/if*}
		
		<span style="clear:both; padding:10px 30px 0px 0px;">
			<a class="tooltip" href='#'>{$lable.seo}<span class="custom help" style="clear:both; width:350px;">
			<table border="0" cellspacing="1" cellpadding="1" width="100%">
				<tr>
					<td width="25%" style="text-align:right">{$lable.seo} {$lable.title}: </td>
					<td>{$vl.mcTitle}</td>
				</tr>
				<tr>
					<td style="text-align:right">{$lable.seo} {$lable.keyword}: </td>
					<td>{$vl.mcKeyword}</td>
				</tr>
				<tr>
					<td style="text-align:right">{$lable.seo} {$lable.description}: </td>
					<td>{$vl.mcDescription}</td>
				</tr>				
			</table>				
			</span></a>
		</span>
	</td>	
	<td>{$vl.level}</td>
    <td>{if $vl.mcIcon neq ''}<img src="{$base_url}/image/icon/{$vl.mcIcon}" />{/if}</td>   
    <td>
    	<a href="{$base_url}/admin/category/addnested/id/{$vl.mcId}/option/edit"><img src="{$base_tlp_admin}/images/user_edit.png" alt="" title="" border="0" /></a>
	</td>
	<td>
		{if $ss_admin->adminRole eq ADMINISTRATOR}
    <a href="{$base_url}/admin/category/delnested/id/{$vl.mcId}/" class="ask"><img src="{$base_tlp_admin}/images/Delete.png" alt="" title="" border="0" /></a>{/if}
	</td>
	
    </tr>
    {if $vl.sub==1}{$vl.subdata}{/if}
{/foreach}
</tbody>
</table>
</form>