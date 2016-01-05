
<link type="stylesheet/less" href="{$base_tpl}/chart_line.less" />

<!-- Sidebar Menu -->
{include file="sidebar.tpl"}
<!-- Content -->
<div id="content">

    {include file="sidebar_header.tpl"}
    
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
										<td><strong>1.</strong>{$lable.total_products.value}</td>
										<td class="text-center">{$totalProducts}</td>
										<td class="text-right">{$smarty.now|date_format}</td>
									</tr>
									<tr>
										<td><strong>2.</strong>{$lable.lable_hot_products.value}</td>
										<td class="text-center">{$hotProducts}</td>
										<td class="text-right">{$smarty.now|date_format}</td>
									</tr>
									<tr>
										<td><strong>3.</strong>{$lable.total_members.value}</td>
										<td class="text-center">{$totalMembers}</td>
										<td class="text-right">{$smarty.now|date_format}</td>
									</tr>
									<tr>
										<td><strong>4.</strong>{$lable.member.value} {$lable.official.value}</td>
										<td class="text-center">{$membersOfficial}</td>
										<td class="text-right">{$smarty.now|date_format}</td>
									</tr>
									<tr>
										<td><strong>5.</strong>{$lable.buying_requests.value}</td>
										<td class="text-center">{$totalBuying}</td>
										<td class="text-right">{$smarty.now|date_format}</td>
									</tr>
									<tr>
										<td><strong>6.</strong>{$lable.buying_requests.value} {$lable.ongoing.value}</td>
										<td class="text-center">{$buyingOngoing}</td>
										<td class="text-right">{$smarty.now|date_format}</td>
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
							<a href="{$base_url}admin/product/list/" class="display-block bg-success innerAll text-center text-white"><i class="icon-briefcase-1 fa-5x"></i>
							</a>
							<div class="text-center innerAll">
								<a href="{$base_url}admin/product/list/" class="strong  ">{$lable.mn_products.value}</a>
								<div class="clearfix"></div>
								<!--<small class="text-center"><i class="fa fa-clock-o"></i> 5:15</small>-->
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="widget">
							<a href="{$base_url}admin/member/" class="display-block bg-lightred innerAll text-center text-white"><i class="icon-user-2 fa-5x"></i>
							</a>
							<div class="text-center innerAll">
								<a href="{$base_url}admin/member/" class="strong  ">{$lable.member.value}</a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="widget">
							<a href="{$base_url}admin/reports/request/" class="display-block bg-mustard innerAll text-center text-white"><i class="icon-scale-2 fa-5x"></i>
							</a>
							<div class="text-center innerAll">
								<a href="{$base_url}admin/reports/request/" class="strong  ">{$lable.buying_requests.value}</a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					<div class="col-sm-3 ">
						<div class="widget">
							<a href="{$base_url}admin/cms/trades/" class="display-block bg-gray border-bottom innerAll text-center"><i class="icon-race-flag-fill fa-5x"></i>
							</a>
							<div class="text-center innerAll">
								<a href="{$base_url}admin/cms/trades/" class="strong  ">Trade show</a>
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
								<p class="innerB margin-none text-xlarge text-condensed strong"><i class="fa fa-th-large"></i> {$totalProducts}</p>
							</div>
						</div>
					</div>
					<div class="row row-merge">
						<div class="col-md-6">
							<div class="text-center innerAll">
								<p class="margin-none">{$lable.active.value}</p>
								<p class="lead check-none strong">{$approvedProducts}</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="text-center innerAll">
								<p class="margin-none">{$lable.inactive.value}</p>
								<p class="lead margin-none strong">{$notApproved}</p>
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

<script src="{$base_tpl}/assets/components/common/forms/elements/bootstrap-datepicker/assets/lib/js/bootstrap-datepicker.js?v=v1.0.3-rc2&sv=v0.0.1.1"></script>
    <script src="{$base_tpl}/assets/components/common/forms/elements/bootstrap-datepicker/assets/custom/js/bootstrap-datepicker.init.js?v=v1.0.3-rc2&sv=v0.0.1.1"></script>



