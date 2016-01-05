{include file="header_main.tpl"}
<div class="main_content">
{include file="menu_header.tpl"}
<div class="center_content"> 

<h4>
<div class="breadcrumbs">
<a href="{$base_url}/admin"><img src="{$base_url}/data/images/home.gif" border="0" /></a> &nbsp; 
<a href="{$base_url}/admin/category/view">{$lable.manager} {$lable.categories}</a> &nbsp;
<img src="{$base_tlp_admin}/images/breadcrumbs_arrow.gif" align="absmiddle" /> {$lable.list}
</div>
</h4>

<script language="javascript" type="text/javascript" src="{$base_tlp_admin}/js/check_frm.js"></script>
<link rel="stylesheet" type="text/css" href="{$base_tlp_admin}/css/jquery.popup.css" />
<script language="javascript" type="text/javascript" src="{$base_tlp_admin}/js/jquery.popup.js"></script>
<link type='text/css' href='{$base_url}/data/jquery/popup/css/contact.css' rel='stylesheet' media='screen' />
<script type='text/javascript' src='{$base_url}/data/jquery/popup/js/jquery.simplemodal.js'></script>

<div id="ajx_content" style="padding-left:10px;">
<form id="appForm" name="appForm" action="{$base_url}/admin/category" method="POST" enctype="multipart/form-data">
<table id="rounded-corner" summary="2011 E-store Admin">
<thead>
<tr>
	<th scope="col" class="rounded-company"></th>
	<th scope="col" class="rounded">{$lable.categories}</th>
	<th scope="col" class="rounded">{$lable.icon}</th>
	<th scope="col" class="rounded">Date Add</th>
	<th scope="col" class="rounded">Pos</th>
	<th scope="col" class="rounded">Edit</th>
	<th scope="col" class="rounded">Delete</th>
	<th scope="col" class="rounded-q4">Edit by Nested</th>	
</tr>
</thead>
<tfoot>
<tr>
	<td colspan="7" class="rounded-foot-left">
	<em>List {$lable.categories}</em>
	<br />
	<div style="width:50%">	 
	<a href="{$base_url}/{$form.module}/{$form.control}/add" class="bt_green"><span class="bt_green_lft"></span><strong>{$lable.add_item}</strong><span class="bt_green_r"></span></a>
	</div>
	<div style="width:49%; float:right">{include file="paginator.tpl"}</div>
	</td>
	<td class="rounded-foot-right">&nbsp;</td>
</tr>
</tfoot>
<tbody>
{foreach from=$items item=vl}
	<tr>
	<td><input type="hidden" name="mcId[]" value="{$vl.mcId}" /></td>
    <td id='contact-form'>
		
		{if $vl.sub==1}{$vl.subLink}{else}{$vl.mcCategory}{/if}
		
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
    <td>{if $vl.mcIcon neq ''}<img src="{$base_url}/image/icon/{$vl.mcIcon}" />{/if}</td>
    <td>{$vl.mcDateAdd|date_format:"%A, %B %e, %Y"}</td>
    <td><input type="text" name="mcPos" value="{$vl.mcPos}" style="width:30px;" onkeyup="updatePos('{$vl.mcId}', this.value, '{$urlPos}');" /></td>
	
	<td><a href="{$base_url}/admin/category/addnested/id/{$vl.mcId}/option/edit"><img src="{$base_tlp_admin}/images/user_edit.png" alt="" title="" border="0" /></a></td>
    <td>
    {if $ss_admin->adminRole eq ADMINISTRATOR}
    <a href="{$base_url}/admin/category/del/id/{$vl.mcId}" class="ask"><img src="{$base_tlp_admin}/images/Delete.png" alt="" title="" border="0" /></a>{/if}</td>	
	
	<td>
	{if $vl.updateStatus eq 0}
		<a href="{$base_url}/admin/category/addnested/id/{$vl.mcId}/option/edit"><img src="{$base_tlp_admin}/images/user_edit.png" alt="" title="" border="0" /></a>
	{/if}
	</td>
	
    </tr>
    {if $vl.sub==1}{$vl.subdata}{/if}
{/foreach}
</tbody>
</table>
</form>
</div>
<div id="ajx_pos" style="padding-left:10px;"></div>

<!-- preload the images -->
<div style="display:none"><img src="{$base_url}/data/jquery/popup/img/contact/loading.gif" /></div>
<script type="text/javascript" src="{$base_url}/data/jquery/popup/js/contact.js"></script>

</div><!--end of center content -->    
<div class="clear"></div>
</div><!--end of main content-->
{include file="footer.tpl"}