{assign var=records value=$items[$key]}
<a name="{$key}"></a>
<div class="row">	
	<div class="widget-head" style="background-color:#3695d5;">
		<h4 class="heading my-white">{$lable.pay_grades_currency.value}</h4>
	</div>
	<div class="widget-body">
		<table class="dynamicTable fixedHeaderColReorder table">
			<thead class="bg-gray">
				<tr>
					<th>{$lable.name.value}</th>
					<th>Minimum Salary</th>
					<th>Maximum Salary</th>
					<th> &nbsp; </th>
				</tr>
			</thead>
			<tbody>
			{if $items}
				{foreach from=$items item=vl}
				<tr class="gradeX">
					<td>{$vl.name|stripslashes}</td>
					<td>
						{if $vl.currency_id eq 'USD'}
							{$vl.min_salary|convert_usd}
						{else}
							{$vl.min_salary|convert_vnd}
						{/if}	
					</td>
					<td>
						{if $vl.currency_id eq 'USD'}
							{$vl.max_salary|convert_usd}
						{else}
							{$vl.max_salary|convert_vnd}
						{/if}
					</td>
					<td>
					<div class="form-actions pull-right">
						<a href="{$base_url}{$form.control}/index/?id={$vl.pay_grade_id}&option=edit&sub={$vl.currency_id}" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
						
						<a data-toggle="confirmation" data-placement="left" href="javascript:void(0)" data-href="{$form.control}/del/?id={$vl.pay_grade_id}&sub={$vl.currency_id}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
					
					</div>
					</td>
				</tr>
				{/foreach}
			{/if}	
			</tbody>
		</table>
		<br />
		
		<div class="add-multi">
			{include file="paygrades/pay_grades_empty.tpl"}
		</div>
		
			
	</div>
</div>