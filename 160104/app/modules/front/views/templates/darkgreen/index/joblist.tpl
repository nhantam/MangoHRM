
<link type="stylesheet/less" href="{$base_tlp_admin}/progress.less" />
<link rel="stylesheet" href="{$base_tlp_admin}/css/custom.css" />
			
<div class="widget">		
	 <div class="widget-head innerAll half">
		<h4 class="margin-none"><i class="fa fa-fw icon-star"></i>Job list</h4>
	</div>
	
	<form name="frm_list" method="get" action="" autocomplete="off">
	<div class="widget-body overflow-x">
	
	<div class="separator"></div>
	
	<table class="dynamicTable fixedHeaderColReorder table">
		<thead class="bg-gray">
			<tr>
				<th>Company Name</th>
				<th>Job Name</th>
				<th>Job Number</th>
				<th style="width:18%;">Progress</th>
				<th style="width:15%;">Last update</th>
			</tr>
		</thead>
		<tbody>
			{foreach from=$joblist item=vl}
			<tr class="gradeX">
				<td>
					{$vl.company_name|stripslashes}
				</td>
				<td>
					{$vl.job_name|stripslashes}
				</td>
				<td>
					#{$vl.id} - {$vl.date_add|date_format}
				</td>
				<td>
					{include file="joblist/list_progress.tpl" percentage=$vl.percentage}
				</td>
				<td class="right right_padding">{$vl.qc}</td>
			</tr>
			{/foreach}
		</tbody>
	</table>
	
	{include file="paginator.tpl"}
	
</div>
</div> 
</form>
			

<script src="{$base_tlp}/assets/components/library/bootstrap/js/bootstrap-tooltip.js"></script>
<script src="{$base_tlp}/assets/components/library/bootstrap/js/bootstrap-typeahead.js"></script>

<script language="javascript">
{literal}
$(document).ready(function() { 
	
	$('#auto-complete').typeahead({
		onSelect: function(item) {
			var machine_id = item.value;
			var production = item.text;
			$('#machine_id').val(machine_id);
			$('#auto-complete').val(production);
			
			//$.each(item, function(key, element) { alert('key: ' + key + '\n' + 'value: ' + element); });			
		},
		ajax: {
			url: base_url_admin+"joblistajx/typeahead/",
			displayField: 'name',						
			timeout: 500,			
			triggerLength: 1,
			method: "post",
			loadingClass: "loading-circle",
		}
	});	
	
});
{/literal}
</script>