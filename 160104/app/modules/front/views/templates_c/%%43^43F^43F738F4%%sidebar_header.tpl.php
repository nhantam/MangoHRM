<?php /* Smarty version 2.6.25, created on 2015-12-31 14:06:51
         compiled from sidebar_header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'sidebar_header.tpl', 21, false),)), $this); ?>
<nav class="navbar hidden-print main " role="navigation">
    <div class="navbar-header pull-left">
        <div class="user-action user-action-btn-navbar pull-left border-right" id="btn_navbar">
            <button class="btn btn-sm btn-navbar btn-inverse btn-stroke"><i class="fa fa-bars fa-2x"></i>
            </button>
        </div>
    </div>
    <ul class="main pull-right ">
		
		
        <li class="dropdown notif notifications hidden-xs" onmouseover="return viewedNotification();">
            <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-bell-fill"></i> <span class="label label-danger"><?php if ($this->_tpl_vars['notification_no_viewed'] > 0): ?> <?php echo $this->_tpl_vars['notification_no_viewed']; ?>
 <?php endif; ?></span></a>
            <ul class="dropdown-menu chat media-list pull-right">
				<?php $_from = $this->_tpl_vars['notification']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['nn']):
?>
					<li class="media">
						<a class="pull-left" href="#">
							<img class="media-object thumb" src="<?php echo $this->_tpl_vars['base_tlp_admin']; ?>
/assets/images/people/100/15.jpg"
							alt="50x50" width="50" />
						</a>
						<div class="media-body">
							<span class="label label-default pull-right"><?php echo ((is_array($_tmp=$this->_tpl_vars['nn']['date_add'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%D %H:%M") : smarty_modifier_date_format($_tmp, "%D %H:%M")); ?>
</span>
							<h5 class="media-heading"><?php echo $this->_tpl_vars['nn']['username']; ?>
.</h5>
							<p class="margin-none">
							<a href="<?php echo $this->_tpl_vars['base_url_admin']; ?>
<?php echo $this->_tpl_vars['nn']['control']; ?>
/index/?id=<?php echo $this->_tpl_vars['nn']['row_id']; ?>
&option=edit&step=4&t=update" style="font-weight:normal;">
							<?php echo $this->_tpl_vars['nn']['msg']; ?>

							</a>
							</p>
						</div>
					</li>
				<?php endforeach; endif; unset($_from); ?>
                <li><a href="<?php echo $this->_tpl_vars['base_url_admin']; ?>
notification/list/" class="btn btn-primary"><i class="fa fa-list"></i> <span>View all messages</span></a>
                </li>
            </ul>
        </li>
		
		
        <li class="dropdown username">
            <a href="" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo $this->_tpl_vars['base_tpl']; ?>
/assets/images/people/35/2.jpg" class="img-circle"
                width="30" /><?php echo $this->_tpl_vars['ss_admin']->adminLogin; ?>

                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu pull-right">
                <li>
					<a href="<?php echo $this->_tpl_vars['base_url']; ?>
/<?php echo $this->_tpl_vars['form']['module']; ?>
/login/logout/" class="glyphicons lock no-ajaxify"><i></i>Logout</a>
                </li>
            </ul>
        </li>
    </ul>
    <div class="navbar-collapse collapse">
       &nbsp;
    </div>
</nav>

<script>
<?php echo '
function viewedNotification() {
	
	$.get( base_url+"joblistajx/viewed/", function( data ) { 
	
	});
	
}
'; ?>

</script>