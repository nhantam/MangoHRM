	<div class="box-generic">
	

<a name="{$key}"></a>
<div class="row">	
	
	<div class="widget-body">
	<div class="col-md-6">
		<div class="widget-body">
		<table class="dynamicTable fixedHeaderColReorder table">
			<thead class="bg-gray">
				<tr>
					<th>{$lable.fullname.value} ({$lable.assigned_supervisors.value})</th>
					<th>{$lable.report_method.value}</th>
					<th>&nbsp;  </th>
				</tr>
			</thead>
			<tbody>
			{if $supervisors}
				  {foreach from=$supervisors item=vl}
				<tr class="gradeX">
				
					<td>
							{$vl.emp_firstname} {$vl.emp_middle_name} {$vl.emp_lastname}
					</td>
			
					<td>
					
						{if $vl.erep_reporting_mode eq 1}
							{$lable.direct.value}
						{elseif $vl.erep_reporting_mode eq 2}
							{$lable.indirect.value}
						{elseif $vl.erep_reporting_mode eq 3}
							{$lable.other.value}
						{/if}
					</td>
							
							
					<td>
					<div class="form-actions pull-right">
						<a href="{$base_url}{$form.control}/step9/?id={$id}&sub={$vl.report_id}&option=edit&sub_option=edit&t=1" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
						<a data-toggle="confirmation" data-placement="left" href="javascript:void(0)" data-href="{$form.control}/step9/?id={$id}&sub={$vl.report_id}&option=edit&sub_option=del&t=1" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
					
					</div>
					</td>
				</tr>
				{/foreach}
			{/if}	
			</tbody>
		</table>
		<br />
		</div>
	</div><!-- /class="col-md-6"-->
	
	<div class="col-md-6">
		<table class="dynamicTable fixedHeaderColReorder table">
			<thead class="bg-gray">
				<tr>
					<th>{$lable.fullname.value} ({$lable.assigned_subordinates.value})</th>
					<th>{$lable.report_method.value}</th>
					<th>&nbsp;  </th>
				</tr>
			</thead>
			<tbody>
			{if $subordinates}
				  {foreach from=$subordinates item=vl}
				<tr class="gradeX">
				
					<td>
							{$vl.emp_firstname} {$vl.emp_middle_name} {$vl.emp_lastname}
					</td>
			
					<td>
					
						{if $vl.erep_reporting_mode eq 1}
							{$lable.direct.value}
						{elseif $vl.erep_reporting_mode eq 2}
							{$lable.indirect.value}
						{elseif $vl.erep_reporting_mode eq 3}
							{$lable.other.value}
						{/if}
					</td>
							
							
					<td>
					<div class="form-actions pull-right">
						<a href="{$base_url}{$form.control}/step9/?id={$id}&sub={$vl.report_id}&option=edit&sub_option=edit&t=2" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
						<a data-toggle="confirmation" data-placement="left" href="javascript:void(0)" data-href="{$form.control}/step9/?id={$id}&sub={$vl.report_id}&option=edit&sub_option=del&t=2" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
					
					</div>
					</td>
				</tr>
				{/foreach}
			{/if}	
			</tbody>
		</table>
		<br />
	</div><!-- /class="col-md-6"-->




	</div>
</div>
	
	
</div><!-- /box-generic-->