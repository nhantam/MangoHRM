<?php /* Smarty version 2.6.25, created on 2016-01-04 10:07:31
         compiled from configqualifi/list_loop.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'configqualifi/list_loop.tpl', 19, false),)), $this); ?>
<?php $this->assign('records', $this->_tpl_vars['items'][$this->_tpl_vars['key']]); ?>
<a name="<?php echo $this->_tpl_vars['key']; ?>
"></a>
<div class="widget">	
	<div class="widget-head" style="background-color:#3695d5;">
		<h4 class="heading my-white"><?php echo $this->_tpl_vars['nameset']; ?>
</h4>
	</div>
	<div class="widget-body overflow-x">
		<table class="dynamicTable fixedHeaderColReorder table">
			<thead class="bg-gray">
				<tr>
					<th><?php echo $this->_tpl_vars['lable']['name']['value']; ?>
</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<?php $_from = $this->_tpl_vars['records']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vl']):
?>
				<?php $this->assign('set', $this->_tpl_vars['vl']['record']); ?>
				<tr class="gradeX">
					<td><?php echo ((is_array($_tmp=$this->_tpl_vars['set']['name'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td>
					<td>
					<div class="form-actions pull-right">
					<a href="<?php echo $this->_tpl_vars['base_url_admin']; ?>
<?php echo $this->_tpl_vars['form']['control']; ?>
/index/?id=<?php echo $this->_tpl_vars['set']['id']; ?>
&option=edit" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
					<!--
					<a data-toggle="confirmation" data-placement="left" href="javascript:void(0)" data-href="<?php echo $this->_tpl_vars['base_url_admin']; ?>
<?php echo $this->_tpl_vars['form']['control']; ?>
/del/?id=<?php echo $this->_tpl_vars['set']['id']; ?>
&option=list" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></a>
					-->
					
					</div>
					</td>
				</tr>
				<?php endforeach; endif; unset($_from); ?>
			</tbody>
		</table>
		<div class="add-multi"> &nbsp; </div>
		
		<div class="form-actions pull-right">
			<div class="separator"></div>
			<button type="button" class="btn btn-primary btn_add_general" name="<?php echo $this->_tpl_vars['key']; ?>
"><i class="fa fa-fw fa-plus-circle"></i> <?php echo $this->_tpl_vars['lable']['add']['value']; ?>
</button>			
		</div>
			
	</div>
</div>