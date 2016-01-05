<?php /* Smarty version 2.6.25, created on 2016-01-04 10:07:31
         compiled from job/list.tpl */ ?>
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
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['base_tpl']; ?>
/css/custom.css" />
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
		
		<?php $_from = $this->_tpl_vars['preset_general']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['vl']):
?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "configqualifi/list_loop.tpl", 'smarty_include_vars' => array('key' => $this->_tpl_vars['k'],'nameset' => $this->_tpl_vars['vl'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php endforeach; endif; unset($_from); ?>

    </div>    
</div>

<div id="general_empty" style="display:none;">
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "configqualifi/index_multi.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
<input type="hidden" id="old_url_append" value="<?php echo $this->_tpl_vars['base_url_admin']; ?>
<?php echo $this->_tpl_vars['form']['control']; ?>
/add/" />

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script src="<?php echo $this->_tpl_vars['base_tpl']; ?>
/js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="<?php echo $this->_tpl_vars['base_tpl']; ?>
/js/plugins/dataTables/dataTables.bootstrap.js"></script>
<script src="<?php echo $this->_tpl_vars['base_tpl']; ?>
/assets/components/library/bootstrap/js/bootstrap-tooltip.js"></script>
<script src="<?php echo $this->_tpl_vars['base_tpl']; ?>
/assets/components/library/bootstrap/js/bootstrap-confirmation.js"></script>

<script language="javascript">
<?php echo '
$(document).ready(function() { 
	$(\'#dataTables-lang\').dataTable(); 
	
	!function ($) {	
		$(function(){ $(\'[data-toggle="confirmation"]\').confirmation(); }) 
	}(window.jQuery);
});
'; ?>

</script>

<script src="<?php echo $this->_tpl_vars['base_tpl']; ?>
/js/general.js"></script>