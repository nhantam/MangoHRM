{include file="header_main.tpl"}

<div id="wrapper">
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
		{include file="nav_bar_toplink.tpl"}
		{include file="nav_bar_left.tpl"}	
	</nav>

	<div id="page-wrapper">
	
		{include file="breadcrumb.tpl"}
				
		<div class="row">
			{if $alert neq ''} {include file="notes.tpl"} {/if}
			
			<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Form Tiêu Đề</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-6">
							<form role="form" action="{$base_url_admin}lang/add/" method="post">
								<div class="form-group {if $valid.name neq ''} has-error {/if}">
									<label>Biến</label>
									<input name="primary" id="primary" class="form-control" value="{$data.name|stripslashes}" {if $data.name neq ''} readonly="readonly" {/if} style="width:300px;" maxlength="80" />
									<p class="help-block">{$valid.name}</p>
								</div>
								<div class="form-group">
									<label>Giá trị</label>
									<input name="value" id="value" value="{$data.value|stripslashes|stripslashes}" class="form-control" placeholder="Nhập nội dung" />
								</div>
								
								<button type="submit" class="btn btn-primary">{if $data.name neq ''}{$lang.update.value}{else}{$lang.add.value}{/if}</button>								
								<input type="hidden" name="option" id="option" value="{$option}" />
							</form>
						</div>
						
					</div><!-- /.row (nested) -->
				</div><!-- /.panel-body -->
			</div><!-- /.panel -->
		</div><!-- /.col-lg-12 -->			
		</div><!-- /.row -->
		
		<div class="row">{include file="body-footer.tpl"}</div><!-- /.row -->
		
	</div><!-- /#page-wrapper -->			
</div><!-- /#wrapper -->

{include file="footer.tpl"}