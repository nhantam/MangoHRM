<?php /* Smarty version 2.6.25, created on 2016-01-04 11:15:41
         compiled from lang/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'lang/index.tpl', 34, false),)), $this); ?>
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

<!-- Content -->
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
        
        <form class="form-horizontal margin-none" id="frm_data" name="frm_data" method="post" action="<?php echo $this->_tpl_vars['base_url_admin']; ?>
lang/add/" autocomplete="off">
		<input type="hidden" name="option" id="option" value="<?php echo $this->_tpl_vars['option']; ?>
" />
		
		
            <!-- Widget -->
            <div class="widget">
                <!-- Widget heading -->
                <div class="widget-head">
                    <h4 class="heading"><?php echo $this->_tpl_vars['task']; ?>
</h4>
                </div>
                <!-- // Widget heading END -->
                <div class="widget-body innerAll inner-2x">
                    <!-- Row -->
                    <div class="row innerLR">
                        <!-- Column -->
                        <div class="col-md-8">
							
							<?php if ($this->_tpl_vars['alert'] != ''): ?> <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "notes.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> <?php endif; ?>
							
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="primary"><?php echo $this->_tpl_vars['lable']['var']['value']; ?>
</label>
                                <div class="col-md-8">
                                    <input type="text" name="data[name]" class="form-control" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['name'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" <?php if ($this->_tpl_vars['data']['name'] != ''): ?> readonly="readonly" <?php endif; ?> style="width:300px;" maxlength="80" />
									<p class="help-block"><?php echo $this->_tpl_vars['valid']['name']; ?>
</p>
                                </div>
                           </div>
                           <div class="form-group">
                                <label class="col-md-4 control-label" for="lang_value"><?php echo $this->_tpl_vars['lable']['name']['value']; ?>
</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" name="data[value]" rows="3"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['data']['value'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</textarea>
									
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-8">
                                    <div class="form-actions">
										<button type="submit" id="btLang" class="btn btn-primary"><i class="fa fa-check-circle"></i> <?php if ($this->_tpl_vars['option'] == 'edit'): ?> <?php echo $this->_tpl_vars['lable']['btn_edit']['value']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['lable']['btn_save']['value']; ?>
 <?php endif; ?></button>
									</div>									
                                </div>
                            </div>                           
                           
                        </div>
                        <!-- // Column END -->
                    </div>
                    <!-- // Row END -->
                   
                    </div>
                    <div class="separator"></div>                    
                </div>
            </div>
            <!-- // Widget END -->
        </form>
        
    </div>    
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "script_validator.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>