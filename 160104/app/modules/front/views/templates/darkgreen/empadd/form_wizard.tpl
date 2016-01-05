<!-- Form Wizard / Widget Tabs / Vertical -->
<input type="hidden" name="emp_number" id="emp_number" value="{$id}" />
<input type="hidden" name="step" id="step" value="{$step}" />

<div class="wizard">
	<div class="widget widget-tabs widget-tabs-double widget-tabs-vertical row row-merge">
		<!-- Widget heading -->
		<div class="widget-head col-md-3">
			<ul>
				<li {if $step eq 1}class="active"{/if}>
					<a href="{$base_url}{$form.control}/step1/" class="glyphicons user">
						<i></i>
						<span class="strong">{$lable.step.value} 1</span>
						<span>{$lable.add.value}</span>
					</a>
				</li>
				<li {if $step eq 2}class="active"{/if}>
					<a href="#tab2-4" class="glyphicons calculator" data-toggle="tab">
						<i></i>
						<span class="strong">{$lable.step.value} 2</span>
						<span>{$lable.personal_details.value}</span>
					</a>
				</li>
				<li {if $step eq 3}class="active"{/if}>
					<a href="#tab3-4" class="glyphicons credit_card" data-toggle="tab">
						<i></i>
						<span class="strong">{$lable.step.value} 3</span>
						<span>{$lable.contact_detail.value}</span>
					</a>
				</li>
				<li {if $step eq 4}class="active"{/if}>
					<a href="#tab4-4" class="glyphicons circle_ok" data-toggle="tab">
						<i></i>
						<span class="strong">{$lable.step.value} 4</span>
						<span>{$lable.emergency_contacts.value}</span>
					</a>
				</li>
				<li {if $step eq 5}class="active"{/if}>
					<a href="#tab4-4" class="glyphicons circle_ok" data-toggle="tab">
						<i></i>
						<span class="strong">{$lable.step.value} 5</span>
						<span>{$lable.dependents.value}</span>
					</a>
				</li>
				<li {if $step eq 6}class="active"{/if}>
					<a href="#tab5-4" class="glyphicons circle_ok" data-toggle="tab">
						<i></i>
						<span class="strong">{$lable.step.value} 6</span>
						<span>{$lable.immigration.value}</span>
					</a>
				</li>
				
				<li {if $step eq 7}class="active"{/if}>
					<a href="#tab6-4" class="glyphicons circle_ok" data-toggle="tab">
						<i></i>
						<span class="strong">{$lable.step.value} 7</span>
						<span>{$lable.job.value}</span>
					</a>
				</li>
				
				<li {if $step eq 8}class="active"{/if}>
					<a href="#tab6-4" class="glyphicons circle_ok" data-toggle="tab">
						<i></i>
						<span class="strong">{$lable.step.value} 8</span>
						<span>{$lable.salary.value}</span>
					</a>
				</li>
				
				<li {if $step eq 9}class="active"{/if}>
					<a href="{$base_url}{$form.control}/step9/?id={$id}" class="glyphicons circle_ok">
						<i></i>
						<span class="strong">{$lable.step.value} 9</span>
						<span>{$lable.report_to.value}</span>
					</a>
				</li>
				
				<li>
					<a href="#tab10-4" class="glyphicons circle_ok" data-toggle="tab">
						<i></i>
						<span class="strong">{$lable.step.value} 10</span>
						<span>{$lable.qualifications.value}</span>
					</a>
				</li>
				
				<li>
					<a href="#tab11-4" class="glyphicons circle_ok" data-toggle="tab">
						<i></i>
						<span class="strong">{$lable.step.value} 11</span>
						<span>{$lable.memberships.value}</span>
					</a>
				</li>
				
				
			</ul>
		</div>
		<!-- // Widget heading END -->
		<div class="widget-body col-md-9">
			<div class="tab-content">
				<!-- Step 1 -->
				<div class="tab-pane {if $step eq 1}active{/if}" id="tab1-11">
					{if $step eq 1}
						{include file="empadd/step_1.tpl"}
					{/if}
				</div>
				<!-- // Step 1 END -->
				<!-- Step 2 -->
				<div class="tab-pane {if $step eq 2}active{/if}" id="tab2-11">
				{if $step eq 2}
					{include file="empadd/step_2.tpl"}
				{/if}
				</div>
				<!-- // Step 2 END -->
				<!-- Step 3 -->
				<div class="tab-pane {if $step eq 3}active{/if}" id="tab3-11">
				{if $step eq 3}
					{include file="empadd/step_3.tpl"}
				{/if}
				</div>
				<!-- // Step 3 END -->
				<!-- Step 4 -->
				<div class="tab-pane {if $step eq 4}active{/if}" id="tab4-11">
				{if $step eq 4}
					{include file="empadd/step_4.tpl"}
				{/if}
				</div>
				<!-- // Step 4 END -->
				
				<!-- Step 5 -->
				<div class="tab-pane {if $step eq 5}active{/if}" id="tab5-11">
				{if $step eq 5}
					{include file="empadd/step_5.tpl"}
				{/if}
				</div>
				<!-- // Step 5 END -->
				
				<!-- Step 6 -->
				<div class="tab-pane {if $step eq 6}active{/if}" id="tab5-11">
				{if $step eq 6}
					{include file="empadd/step_6.tpl"}
				{/if}
				</div>
				<!-- // Step 6 END -->
				
				<!-- Step 7 -->
				<div class="tab-pane {if $step eq 7}active{/if}" id="tab5-11">
				{if $step eq 7}
					{include file="empadd/step_7.tpl"}
				{/if}
				</div>
				<!-- // Step 7 END -->
				
				<!-- Step 8-->
				<div class="tab-pane {if $step eq 8}active{/if}" id="tab5-11">
				{if $step eq 8}
					{include file="empadd/step_8.tpl"}
				{/if}
				</div>
				<!-- // Step 8 END -->
				
				<!-- Step 9 -->
				<div class="tab-pane {if $step eq 9}active{/if}" id="tab5-11">
				{if $step eq 9}
					{include file="empadd/step_9.tpl"}
				{/if}
				</div>
				<!-- // Step 9 END -->
				
				<!-- Step 10 -->
				<div class="tab-pane {if $step eq 10}active{/if}" id="tab5-11">
				{if $step eq 10}
					{include file="empadd/step_10.tpl"}
				{/if}
				</div>
				<!-- // Step 9 END -->
				
				<!--
				<ul class="pagination margin-bottom-none pull-left">
					<li class="primary previous first"><a href="#" class="no-ajaxify">First</a>
					</li>
					<li class="last primary"><a href="#" class="no-ajaxify">Last</a>
					</li>
				</ul>
				-->
				
				{if $step eq 8 && $sub neq ''}
					<div class="pull-right">
						<button type="button" class="btn btn-primary btn_add_general" id="btn_step_{$step}" name="btn_step_{$step}"><i class="fa fa-check-circle"></i> {$lable.btn_save.value}</button>
					</div>
				{elseif $step eq 9}
					<div class="pull-right">
						<button type="button" class="btn btn-primary btn_add_general" id="btn_step_{$step}" name="btn_step_{$step}"><i class="fa fa-check-circle"></i> {$lable.btn_save.value}</button>
					</div>
					
				{else}
					<ul class="pagination margin-bottom-none pull-right">
						<li class="primary previous disabled"><a href="#" class="no-ajaxify">Previous</a>
						</li>
						<li class="next primary"><a id="btn_step_{$step}" class="no-ajaxify">Next</a>
						</li>
						<li class="next finish primary" style="display:none;"><a href="#" class="no-ajaxify">Finish</a>
						</li>
					</ul>
				{/if}
				
				

				<div class="clearfix"></div>
				<!-- // Wizard pagination controls END -->
			</div>
		</div>
	</div>
</div>
<!-- // Form Wizard / Widget Tabs / Vertical END -->