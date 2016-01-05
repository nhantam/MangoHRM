<div class="box-generic">
	

<a name="{$key}"></a>
<div class="row">	
	
	<div class="widget-body">
		<table class="dynamicTable fixedHeaderColReorder table">
			<thead class="bg-gray">
				<tr>
					<th>{$lable.pay_grades.value}</th>
					<th>{$lable.amount.value}</th>
					<th>{$lable.add_direct_deposit_details.value}</th>
					<th>&nbsp;  </th>
				</tr>
			</thead>
			<tbody>
			{if $salary}
				  {foreach from=$salary item=vl}
				<tr class="gradeX">
				
					<td>
							{$vl.name}
					</td>
			
					<td>
					
						{if $vl.currency_id eq 'USD'}
							{$vl.basic_salary|convert_usd}
						{else}
							{$vl.basic_salary|convert_vnd}
						{/if}
					</td>
							<td>
							
							{if $vl.account_number neq ''}
							
								<div class="row">
									<div class="col-md-6" style="text-align:right;">
										{$lable.account_number.value}:
									</div>
									<div>{$vl.account_number}</div>
								</div>
								
								<div class="row">
									<div class="col-md-6" style="text-align:right;">
										{$lable.account_name.value}:
									</div>
									<div>{$vl.account_name}</div>
								</div>
								
								<div class="row">
									<div class="col-md-6" style="text-align:right;">
										{$lable.account_bank.value}:
									</div>
									<div>{$vl.account_bank}</div>
								</div>
								
								<div class="row">
									<div class="col-md-6" style="text-align:right;">
										{$lable.amount.value}:
									</div>
									<div>{$vl.account_amount}</div>
								</div>
								
							{/if}
							</td>
							
					<td>
					<div class="form-actions pull-right">
						<a href="{$base_url}{$form.control}/step8/?id={$id}&sub={$vl.salary_id}&option=edit&sub_option=edit" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
						
						<a data-toggle="confirmation" data-placement="left" href="javascript:void(0)" data-href="{$form.control}/step8/?id={$id}&sub={$vl.salary_id}&option=edit&sub_option=del" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
					
					</div>
					</td>
				</tr>
				{/foreach}
			{/if}	
			</tbody>
		</table>
		<br />
		

		
			
	</div>
</div>
	
	
</div><!-- /box-generic-->