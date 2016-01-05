<?php /* Smarty version 2.6.25, created on 2016-01-04 10:07:31
         compiled from configqualifi/index_multi.tpl */ ?>
<div class="multi-general">
<div class="row">
	<form class="form-horizontal margin-none" name="appForm" method="post" action="<?php echo $this->_tpl_vars['base_url']; ?>
<?php echo $this->_tpl_vars['form']['control']; ?>
/add/">
	<input type="hidden" name="option" value="add" />
	<input type="hidden" name="primary" value="" />
	<input type="hidden" name="custom_type" id="custom_type" value="" />	
	<div class="col-md-11">                         
	   <div class="form-group">
			<label class="col-md-2 control-label" for="name"><?php echo $this->_tpl_vars['lang']['name']['value']; ?>
</label>
			<div class="col-md-10">
				<input class="form-control" name="name" value="" type="text" maxlength="80" />
				<span class="help-block"><?php echo $this->_tpl_vars['valid']['name']; ?>
</span>
			</div>
		</div>
	</div>
		
	<div class="col-md-1">
		<div class="form-actions pull-right">
		<button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> <?php echo $this->_tpl_vars['lang']['btn_save']['value']; ?>
</button>
		</div>
	</div>
	</form>
</div>
</div>