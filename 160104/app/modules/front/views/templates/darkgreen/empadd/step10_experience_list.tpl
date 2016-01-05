<div class="col-md-12">
	<div class="widget-body">
	
		<div class="form-actions pull-left">
			<div class="separator"></div>
			<button type="button" class="btn btn-primary btn_add_experience" name="btn_add_experience" id="btn_add_experience">
				<i class="fa fa-fw fa-plus-circle"></i> {$lable.add.value}
			</button> 	
		</div>
		<table class="dynamicTable fixedHeaderColReorder table">
			<thead class="bg-gray">
				<tr>
					<th>{$lable.company.value}</th>
					<th>{$lable.job_title.value}</th>
					<th>{$lable.start_date.value}</th>
					<th>{$lable.end_date.value}</th>
					<th>{$lable.comments.value}</th>
					<th>&nbsp;  </th>
				</tr>
			</thead>
			<tbody>
			{if $supervisors}
				  {foreach from=$supervisors item=vl}
				<tr class="gradeX">
				
					<td>
							{$vl.emp_firstname}
					</td>
					<td>
							2
					</td>
					<td>
							3
					</td>
					<td>
							4
					</td>
					<td>
							5
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
</div><!-- /class="col-md-12"-->