{include file="header_main.tpl"}

<div id="wrapper">
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
		{include file="nav_bar_toplink.tpl"}
		{include file="nav_bar_left.tpl"}	
	</nav>
	
	<!-- Page-Level Plugin CSS - Tables -->
    <link href="{$base_tlp_admin}/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
	
	
	<div id="page-wrapper">
	
		{include file="breadcrumb.tpl"}
		
		<div class="row">
			{if $alert neq ''} {include file="notes.tpl"} {/if}
			
			<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Danh sách Tiêu Đề</div>
				<div class="panel-body">
					<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="dataTables-lang">
						<thead>
							<tr>
								<th>Biến</th>
								<th>Giá trị</th>
								<th>Thao tác</th>									
							</tr>
						</thead>
						<tbody>
						{foreach from=$lang item=vl}
							<tr class="{cycle values="odd gradeX, event gradeC"}">
								<td>{$vl.name}</td>
								<td>
									<input type="text" name="value" id="value" value="{$vl.value|stripslashes|stripslashes}" style="width:300px;" />
								</td>
								<td>
								<a href="{$base_url_admin}lang/?id={$vl.name}&option=edit" title="Sửa">Edit</a> <!--/ 								
								<a href="{$base_url_admin}lang/del/?id={$vl.name}" class="ask" title="Xóa bỏ khỏi hệ thống">Del</a>-->
								</td>
							</tr>
						{/foreach}								
						</tbody>
					</table>
					
					<a href="{$base_url_admin}lang/" id="btnLogin" class="btn btn-primary btn-sm">{$lang.add.value}</a>
					</div>					
				</div><!-- /.panel-body -->
			</div><!-- /.panel -->
		</div><!-- /.col-lg-12 -->			
		</div><!-- /.row -->
		
		<div class="row">{include file="body-footer.tpl"}</div><!-- /.row -->
		
	</div><!-- /#page-wrapper -->			
</div><!-- /#wrapper -->

{include file="footer.tpl"}

<script src="{$base_tlp_admin}/js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="{$base_tlp_admin}/js/plugins/dataTables/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="{$base_tlp_admin}/js/jconfirmaction.jquery.js"></script>
<script language="javascript">
{literal}
$(document).ready(function() { 
	$('#dataTables-lang').dataTable(); 
	//$('.ask').jConfirmAction(); $('#flashMsg').delay(4000).fadeOut("slow");
});
{/literal}
</script>