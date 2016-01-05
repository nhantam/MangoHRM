{include file="header_main.tpl"}
<div class="main_content">
{include file="menu_header.tpl"}
<div class="center_content"> 

<h4>
<div class="breadcrumbs">
<a href="{$base_url}/admin"><img src="{$base_url}/data/images/home.gif" border="0" /></a> &nbsp; 
<a href="{$base_url}/admin/category/view">{$lable.manager} {$lable.categories}</a> &nbsp;
<img src="{$base_tlp_admin}/images/breadcrumbs_arrow.gif" align="absmiddle" /> {$lable.add}
</div>
</h4>


<link rel="stylesheet" type="text/css" href="{$base_url}/data/jquery/toggle/style.css" />
<script type=text/javascript>
{literal}
$(document).ready(function(){	
	$(".toggle_container").hide();
	$("h2.trigger").click(function(){ $(this).toggleClass("active").next().slideToggle("slow"); });
});
{/literal}
</script>



<div class="form">
<script language="javascript" type="text/javascript" src="{$base_tlp_admin}/js/check_frm.js"></script>

<form id="appForm" action="{$base_url}/admin/category/addcat/" method="POST" enctype="multipart/form-data" class="niceform">
<fieldset>
<dl class="error" style="text-align:center">{$msg}</dl>
<dl>
	<dt><label for="root">{$lable.root}:</label></dt>
	<dd><select size="1" name="cmbCat" id="cmbCat" style="line-height:18px;">
		<option value="0"> {$lable.root}</option>
		{$cmbCate}
		</select>
	</dd>
</dl>
<dl>
	<dt><label for="categories"><span class="required">*</span> {$lable.categories}:</label></dt>
	<dd>
		<input type="text" name="mcCategory" id="mcCategory" size="54" value="{$dataDesc.mcCategory}" />
		<div class="error" style="width:300px;padding-top:10px">{$valid.mcCategory}</div>
	</dd>
</dl>
<dl>
	<dt><label for="root">{$lable.pos}:</label></dt>
	<dd><select size="1" name="cmbPos" id="cmbPos">
		<option value="0" selected="selected">--- {$lable.choice}&nbsp; {$lable.pos} ---</option>
		{$pos}
		</select>
	</dd>
</dl>
<dl>
    <dt><label for="upload">{$lable.icon}:</label></dt>
    <dd>
    	<input type="file" name="fileicon" id="fileicon" />
    	<div class="error" style="width:200px;">
    		{foreach from=$fileError item=error} {$error} &nbsp; {/foreach}
    		{if $dataDesc.mcIcon neq ''}
    		<div id="id_big">
    			<table border="0" cellpadding="0" cellspacing="0" width="200">
    			<tr>
    				<td width="100"><img src="{$base_url}/image/icon/{$dataDesc.mcIcon}" /></td>
    				<td valign="middle" width="100">
    					<a href="javascript:delimg('/admin/category/delimg', 'icon', '{$dataDesc.mcId}');">Delete</a>
    					<input type="hidden" name="oldFileBigImg" id="oldFileBigImg" value="{$dataDesc.mcIcon}" />
    				</td>
    			</tr>
    			</table>
    		</div>			
			{/if}
    	</div>
    </dd>    
</dl>


<div style="clear:both;"></div>
<div style="clear:both;">

	<dl>
		<dt><label for="seo">{$lable.seo} {$lable.title}:</label></dt>
		<dd><input type="text" name="seoTitle" id="seoTitle" style="width:500px;" value="{$dataDesc.seoTitle}" />
		</dd>
	</dl>
	
	<dl>
		<dt><label for="seo">{$lable.seo} {$lable.keyword}:</label></dt>
		<dd>
			<textarea name="seoKey" id="seoKey" style="width:500px; height:40px;">{$dataDesc.seoKey}</textarea>
		</dd>
	</dl>
	
	<dl>
		<dt><label for="seo">{$lable.seo} {$lable.description}:</label></dt>
		<dd>
			<textarea name="seoDesc" id="seoDesc" style="width:500px; height:40px;">{$dataDesc.seoDesc}</textarea>
		</dd>
	</dl>


</div>


<dl class="submit">
	<input type="submit" name="submit" id="submit" value=" {if $option=='edit'} {$lable.edit} {else} {$lable.add}{/if} " />
</dl>
</fieldset>
<input type="hidden" name="primary" id="primary" value="{$dataDesc.mcId}" />
<input type="hidden" name="option" id="option" value="{$option}" />
</form>
</div>

</div><!--end of center content -->    
<div class="clear"></div>
</div><!--end of main content-->
{include file="footer.tpl"}