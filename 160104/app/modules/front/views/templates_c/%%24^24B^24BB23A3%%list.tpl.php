<?php /* Smarty version 2.6.25, created on 2016-01-04 11:15:21
         compiled from lang/list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'lang/list.tpl', 36, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "sidebar.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="content">

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "sidebar_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "breadcrumb.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <div class="innerLR">
			
			<?php if ($this->_tpl_vars['alert'] != ''): ?> <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "notes.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> <?php endif; ?>
			
			<link href="<?php echo $this->_tpl_vars['base_tpl']; ?>
/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
			
			<div class="widget">
				<div class="widget-head">
					<h4 class="heading"><?php echo $this->_tpl_vars['lable']['list']['value']; ?>
</h4>
				</div>
				<div class="widget-body innerAll inner-2x">
					
					<table class="table table-bordered table-condensed" id="dataTables-lang">
						<thead>
							<tr>
								<th><?php echo $this->_tpl_vars['lb']['var']; ?>
</th>
								<th><?php echo $this->_tpl_vars['lb']['name']; ?>
</th>								
							</tr>
						</thead>
						<tbody>
						<?php $_from = $this->_tpl_vars['lable']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vl']):
?>
							<tr>
								<td>
									<a href="<?php echo $this->_tpl_vars['base_url']; ?>
lang/?id=<?php echo $this->_tpl_vars['vl']['name']; ?>
&option=edit" title="<?php echo $this->_tpl_vars['lb']['modify']; ?>
"><?php echo $this->_tpl_vars['vl']['name']; ?>

									</a>
								</td>
								<td>
									<input class="form-control" type="text" name="value" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['vl']['value'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" style="width:400px;" />
								</td>								
							</tr>
						<?php endforeach; endif; unset($_from); ?>								
						</tbody>
					</table>
					
					<a href="<?php echo $this->_tpl_vars['base_url']; ?>
lang/" id="btnLogin" class="btn btn-primary btn-sm"><?php echo $this->_tpl_vars['lable']['add']['value']; ?>
</a>
				
				</div><!-- /.widget-body -->
			</div><!-- /.widget -->
			 
    </div>    
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script src="<?php echo $this->_tpl_vars['base_tpl']; ?>
/js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="<?php echo $this->_tpl_vars['base_tpl']; ?>
/js/plugins/dataTables/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['base_tpl']; ?>
/js/jconfirmaction.jquery.js"></script>
<script language="javascript">
<?php echo '
$(document).ready(function() { 
	$(\'#dataTables-lang\').dataTable(); 
	//$(\'.ask\').jConfirmAction(); $(\'#flashMsg\').delay(4000).fadeOut("slow");
});
'; ?>

</script>