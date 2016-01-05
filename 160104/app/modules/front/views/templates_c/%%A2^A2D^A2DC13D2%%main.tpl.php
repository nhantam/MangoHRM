<?php /* Smarty version 2.6.25, created on 2016-01-04 13:50:44
         compiled from index/main.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'index/main.tpl', 39, false),)), $this); ?>

<link type="stylesheet/less" href="<?php echo $this->_tpl_vars['base_tpl']; ?>
/chart_line.less" />

<!-- Sidebar Menu -->
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
    
    <div class="innerLR">
        <h2 class="margin-none">Dashboard <!--&nbsp;<i class="fa fa-fw fa-pencil text-muted"></i>-->
        </h2>
        <div class="row">
            <div class="col-md-8">
               
			    
                <!-- //Row -->
				
				<!-- Widget	 -->
					<div class="widget">
						<div class="widget-head innerAll half">
							<h4 class="margin-none"><i class="fa fa-fw icon-star"></i> Trends</h4>
						</div>
						<!-- Widget -->
						<div class="widget-body innerAll inner-2x">
							<table class="table table-striped margin-none">
								<thead>
									<tr>
										<th>Box office</th>
										<th class="text-center">Total</th>
										<th class="text-right" style="width: 100px;">Date</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><strong>1.</strong><?php echo $this->_tpl_vars['lable']['total_products']['value']; ?>
</td>
										<td class="text-center"><?php echo $this->_tpl_vars['totalProducts']; ?>
</td>
										<td class="text-right"><?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
									</tr>
									<tr>
										<td><strong>2.</strong><?php echo $this->_tpl_vars['lable']['lable_hot_products']['value']; ?>
</td>
										<td class="text-center"><?php echo $this->_tpl_vars['hotProducts']; ?>
</td>
										<td class="text-right"><?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
									</tr>
									<tr>
										<td><strong>3.</strong><?php echo $this->_tpl_vars['lable']['total_members']['value']; ?>
</td>
										<td class="text-center"><?php echo $this->_tpl_vars['totalMembers']; ?>
</td>
										<td class="text-right"><?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
									</tr>
									<tr>
										<td><strong>4.</strong><?php echo $this->_tpl_vars['lable']['member']['value']; ?>
 <?php echo $this->_tpl_vars['lable']['official']['value']; ?>
</td>
										<td class="text-center"><?php echo $this->_tpl_vars['membersOfficial']; ?>
</td>
										<td class="text-right"><?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
									</tr>
									<tr>
										<td><strong>5.</strong><?php echo $this->_tpl_vars['lable']['buying_requests']['value']; ?>
</td>
										<td class="text-center"><?php echo $this->_tpl_vars['totalBuying']; ?>
</td>
										<td class="text-right"><?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
									</tr>
									<tr>
										<td><strong>6.</strong><?php echo $this->_tpl_vars['lable']['buying_requests']['value']; ?>
 <?php echo $this->_tpl_vars['lable']['ongoing']['value']; ?>
</td>
										<td class="text-center"><?php echo $this->_tpl_vars['buyingOngoing']; ?>
</td>
										<td class="text-right"><?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
									</tr>
								</tbody>
							</table>
						</div>
						<!-- // End Widget Body -->
					</div>
					<!-- // End Widget -->
						
                <!-- Widget -->
				
				
				<div class="row">
					<div class="col-sm-3">
						<div class="widget">
							<a href="<?php echo $this->_tpl_vars['base_url']; ?>
admin/product/list/" class="display-block bg-success innerAll text-center text-white"><i class="icon-briefcase-1 fa-5x"></i>
							</a>
							<div class="text-center innerAll">
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
admin/product/list/" class="strong  "><?php echo $this->_tpl_vars['lable']['mn_products']['value']; ?>
</a>
								<div class="clearfix"></div>
								<!--<small class="text-center"><i class="fa fa-clock-o"></i> 5:15</small>-->
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="widget">
							<a href="<?php echo $this->_tpl_vars['base_url']; ?>
admin/member/" class="display-block bg-lightred innerAll text-center text-white"><i class="icon-user-2 fa-5x"></i>
							</a>
							<div class="text-center innerAll">
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
admin/member/" class="strong  "><?php echo $this->_tpl_vars['lable']['member']['value']; ?>
</a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="widget">
							<a href="<?php echo $this->_tpl_vars['base_url']; ?>
admin/reports/request/" class="display-block bg-mustard innerAll text-center text-white"><i class="icon-scale-2 fa-5x"></i>
							</a>
							<div class="text-center innerAll">
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
admin/reports/request/" class="strong  "><?php echo $this->_tpl_vars['lable']['buying_requests']['value']; ?>
</a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					<div class="col-sm-3 ">
						<div class="widget">
							<a href="<?php echo $this->_tpl_vars['base_url']; ?>
admin/cms/trades/" class="display-block bg-gray border-bottom innerAll text-center"><i class="icon-race-flag-fill fa-5x"></i>
							</a>
							<div class="text-center innerAll">
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
admin/cms/trades/" class="strong  ">Trade show</a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</div>
				
                
            </div>
            <!-- //  End Col -->
			
            <div class="col-md-4">
            	 <!-- Widget -->
				<div class="widget">
					<div class="bg-primary text-center innerAll">
						<div class="innerTB">
							<h4 class="innerTB text-white">Total Products</h4>
							<div class="strong text-xlarge text-white">
								<p class="innerB margin-none text-xlarge text-condensed strong"><i class="fa fa-th-large"></i> <?php echo $this->_tpl_vars['totalProducts']; ?>
</p>
							</div>
						</div>
					</div>
					<div class="row row-merge">
						<div class="col-md-6">
							<div class="text-center innerAll">
								<p class="margin-none"><?php echo $this->_tpl_vars['lable']['active']['value']; ?>
</p>
								<p class="lead check-none strong"><?php echo $this->_tpl_vars['approvedProducts']; ?>
</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="text-center innerAll">
								<p class="margin-none"><?php echo $this->_tpl_vars['lable']['inactive']['value']; ?>
</p>
								<p class="lead margin-none strong"><?php echo $this->_tpl_vars['notApproved']; ?>
</p>
							</div>
						</div>
					</div>
				</div>
				<!-- //Widget -->    
				
				<!-- Widget -->
					<div class="widget widget-body-gray">
						<!-- Widget Heading -->
						<div class="widget-head">
							<h4 class="heading glyphicons calendar"><i></i>Calendar</h4>
						</div>
						<!-- // Widget Heading END -->
						<div class="widget-body innerAll inner-2x">
							<div id="datepicker-inline"></div>
						</div>
					</div>
					<!-- // Widget END -->
					
            </div>
            <!-- //End Col -->
        </div>
    </div>
</div>

<script src="<?php echo $this->_tpl_vars['base_tpl']; ?>
/assets/components/common/forms/elements/bootstrap-datepicker/assets/lib/js/bootstrap-datepicker.js?v=v1.0.3-rc2&sv=v0.0.1.1"></script>
    <script src="<?php echo $this->_tpl_vars['base_tpl']; ?>
/assets/components/common/forms/elements/bootstrap-datepicker/assets/custom/js/bootstrap-datepicker.init.js?v=v1.0.3-rc2&sv=v0.0.1.1"></script>


