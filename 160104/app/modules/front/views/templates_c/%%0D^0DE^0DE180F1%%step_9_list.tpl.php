<?php /* Smarty version 2.6.25, created on 2015-12-31 16:59:05
         compiled from empadd/step_9_list.tpl */ ?>
	<div class="box-generic">
	

<a name="<?php echo $this->_tpl_vars['key']; ?>
"></a>
<div class="row">	
	
	<div class="widget-body">
	<div class="col-md-6">
		<div class="widget-body">
		<table class="dynamicTable fixedHeaderColReorder table">
			<thead class="bg-gray">
				<tr>
					<th><?php echo $this->_tpl_vars['lable']['fullname']['value']; ?>
 (<?php echo $this->_tpl_vars['lable']['assigned_supervisors']['value']; ?>
)</th>
					<th><?php echo $this->_tpl_vars['lable']['report_method']['value']; ?>
</th>
					<th>&nbsp;  </th>
				</tr>
			</thead>
			<tbody>
			<?php if ($this->_tpl_vars['supervisors']): ?>
				  <?php $_from = $this->_tpl_vars['supervisors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vl']):
?>
				<tr class="gradeX">
				
					<td>
							<?php echo $this->_tpl_vars['vl']['emp_firstname']; ?>
 <?php echo $this->_tpl_vars['vl']['emp_middle_name']; ?>
 <?php echo $this->_tpl_vars['vl']['emp_lastname']; ?>

					</td>
			
					<td>
					
						<?php if ($this->_tpl_vars['vl']['erep_reporting_mode'] == 1): ?>
							<?php echo $this->_tpl_vars['lable']['direct']['value']; ?>

						<?php elseif ($this->_tpl_vars['vl']['erep_reporting_mode'] == 2): ?>
							<?php echo $this->_tpl_vars['lable']['indirect']['value']; ?>

						<?php elseif ($this->_tpl_vars['vl']['erep_reporting_mode'] == 3): ?>
							<?php echo $this->_tpl_vars['lable']['other']['value']; ?>

						<?php endif; ?>
					</td>
							
							
					<td>
					<div class="form-actions pull-right">
						<a href="<?php echo $this->_tpl_vars['base_url']; ?>
<?php echo $this->_tpl_vars['form']['control']; ?>
/step9/?id=<?php echo $this->_tpl_vars['id']; ?>
&sub=<?php echo $this->_tpl_vars['vl']['report_id']; ?>
&option=edit&sub_option=edit&t=1" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
						<a data-toggle="confirmation" data-placement="left" href="javascript:void(0)" data-href="<?php echo $this->_tpl_vars['form']['control']; ?>
/step9/?id=<?php echo $this->_tpl_vars['id']; ?>
&sub=<?php echo $this->_tpl_vars['vl']['report_id']; ?>
&option=edit&sub_option=del&t=1" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
					
					</div>
					</td>
				</tr>
				<?php endforeach; endif; unset($_from); ?>
			<?php endif; ?>	
			</tbody>
		</table>
		<br />
		</div>
	</div><!-- /class="col-md-6"-->
	
	<div class="col-md-6">
		<table class="dynamicTable fixedHeaderColReorder table">
			<thead class="bg-gray">
				<tr>
					<th><?php echo $this->_tpl_vars['lable']['fullname']['value']; ?>
 (<?php echo $this->_tpl_vars['lable']['assigned_subordinates']['value']; ?>
)</th>
					<th><?php echo $this->_tpl_vars['lable']['report_method']['value']; ?>
</th>
					<th>&nbsp;  </th>
				</tr>
			</thead>
			<tbody>
			<?php if ($this->_tpl_vars['subordinates']): ?>
				  <?php $_from = $this->_tpl_vars['subordinates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vl']):
?>
				<tr class="gradeX">
				
					<td>
							<?php echo $this->_tpl_vars['vl']['emp_firstname']; ?>
 <?php echo $this->_tpl_vars['vl']['emp_middle_name']; ?>
 <?php echo $this->_tpl_vars['vl']['emp_lastname']; ?>

					</td>
			
					<td>
					
						<?php if ($this->_tpl_vars['vl']['erep_reporting_mode'] == 1): ?>
							<?php echo $this->_tpl_vars['lable']['direct']['value']; ?>

						<?php elseif ($this->_tpl_vars['vl']['erep_reporting_mode'] == 2): ?>
							<?php echo $this->_tpl_vars['lable']['indirect']['value']; ?>

						<?php elseif ($this->_tpl_vars['vl']['erep_reporting_mode'] == 3): ?>
							<?php echo $this->_tpl_vars['lable']['other']['value']; ?>

						<?php endif; ?>
					</td>
							
							
					<td>
					<div class="form-actions pull-right">
						<a href="<?php echo $this->_tpl_vars['base_url']; ?>
<?php echo $this->_tpl_vars['form']['control']; ?>
/step9/?id=<?php echo $this->_tpl_vars['id']; ?>
&sub=<?php echo $this->_tpl_vars['vl']['report_id']; ?>
&option=edit&sub_option=edit&t=2" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
						<a data-toggle="confirmation" data-placement="left" href="javascript:void(0)" data-href="<?php echo $this->_tpl_vars['form']['control']; ?>
/step9/?id=<?php echo $this->_tpl_vars['id']; ?>
&sub=<?php echo $this->_tpl_vars['vl']['report_id']; ?>
&option=edit&sub_option=del&t=2" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
					
					</div>
					</td>
				</tr>
				<?php endforeach; endif; unset($_from); ?>
			<?php endif; ?>	
			</tbody>
		</table>
		<br />
	</div><!-- /class="col-md-6"-->




	</div>
</div>
	
	
</div><!-- /box-generic-->