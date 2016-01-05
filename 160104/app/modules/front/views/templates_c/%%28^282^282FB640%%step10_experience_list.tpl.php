<?php /* Smarty version 2.6.25, created on 2016-01-04 17:08:16
         compiled from empadd/step10_experience_list.tpl */ ?>
<div class="col-md-12">
	<div class="widget-body">
	
		<div class="form-actions pull-left">
			<div class="separator"></div>
			<button type="button" class="btn btn-primary btn_add_experience" name="btn_add_experience" id="btn_add_experience">
				<i class="fa fa-fw fa-plus-circle"></i> <?php echo $this->_tpl_vars['lable']['add']['value']; ?>

			</button> 	
		</div>
		<table class="dynamicTable fixedHeaderColReorder table">
			<thead class="bg-gray">
				<tr>
					<th><?php echo $this->_tpl_vars['lable']['company']['value']; ?>
</th>
					<th><?php echo $this->_tpl_vars['lable']['job_title']['value']; ?>
</th>
					<th><?php echo $this->_tpl_vars['lable']['start_date']['value']; ?>
</th>
					<th><?php echo $this->_tpl_vars['lable']['end_date']['value']; ?>
</th>
					<th><?php echo $this->_tpl_vars['lable']['comments']['value']; ?>
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
</div><!-- /class="col-md-12"-->