<?php /* Smarty version 2.6.25, created on 2015-12-31 14:06:52
         compiled from empadd/step_8_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'convert_usd', 'empadd/step_8_list.tpl', 29, false),array('modifier', 'convert_vnd', 'empadd/step_8_list.tpl', 31, false),)), $this); ?>
<div class="box-generic">
	

<a name="<?php echo $this->_tpl_vars['key']; ?>
"></a>
<div class="row">	
	
	<div class="widget-body">
		<table class="dynamicTable fixedHeaderColReorder table">
			<thead class="bg-gray">
				<tr>
					<th><?php echo $this->_tpl_vars['lable']['pay_grades']['value']; ?>
</th>
					<th><?php echo $this->_tpl_vars['lable']['amount']['value']; ?>
</th>
					<th><?php echo $this->_tpl_vars['lable']['add_direct_deposit_details']['value']; ?>
</th>
					<th>&nbsp;  </th>
				</tr>
			</thead>
			<tbody>
			<?php if ($this->_tpl_vars['salary']): ?>
				  <?php $_from = $this->_tpl_vars['salary']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vl']):
?>
				<tr class="gradeX">
				
					<td>
							<?php echo $this->_tpl_vars['vl']['name']; ?>

					</td>
			
					<td>
					
						<?php if ($this->_tpl_vars['vl']['currency_id'] == 'USD'): ?>
							<?php echo ((is_array($_tmp=$this->_tpl_vars['vl']['basic_salary'])) ? $this->_run_mod_handler('convert_usd', true, $_tmp) : smarty_modifier_convert_usd($_tmp)); ?>

						<?php else: ?>
							<?php echo ((is_array($_tmp=$this->_tpl_vars['vl']['basic_salary'])) ? $this->_run_mod_handler('convert_vnd', true, $_tmp) : smarty_modifier_convert_vnd($_tmp)); ?>

						<?php endif; ?>
					</td>
							<td>
							
							<?php if ($this->_tpl_vars['vl']['account_number'] != ''): ?>
							
								<div class="row">
									<div class="col-md-6" style="text-align:right;">
										<?php echo $this->_tpl_vars['lable']['account_number']['value']; ?>
:
									</div>
									<div><?php echo $this->_tpl_vars['vl']['account_number']; ?>
</div>
								</div>
								
								<div class="row">
									<div class="col-md-6" style="text-align:right;">
										<?php echo $this->_tpl_vars['lable']['account_name']['value']; ?>
:
									</div>
									<div><?php echo $this->_tpl_vars['vl']['account_name']; ?>
</div>
								</div>
								
								<div class="row">
									<div class="col-md-6" style="text-align:right;">
										<?php echo $this->_tpl_vars['lable']['account_bank']['value']; ?>
:
									</div>
									<div><?php echo $this->_tpl_vars['vl']['account_bank']; ?>
</div>
								</div>
								
								<div class="row">
									<div class="col-md-6" style="text-align:right;">
										<?php echo $this->_tpl_vars['lable']['amount']['value']; ?>
:
									</div>
									<div><?php echo $this->_tpl_vars['vl']['account_amount']; ?>
</div>
								</div>
								
							<?php endif; ?>
							</td>
							
					<td>
					<div class="form-actions pull-right">
						<a href="<?php echo $this->_tpl_vars['base_url']; ?>
<?php echo $this->_tpl_vars['form']['control']; ?>
/step8/?id=<?php echo $this->_tpl_vars['id']; ?>
&sub=<?php echo $this->_tpl_vars['vl']['salary_id']; ?>
&option=edit&sub_option=edit" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
						
						<a data-toggle="confirmation" data-placement="left" href="javascript:void(0)" data-href="<?php echo $this->_tpl_vars['form']['control']; ?>
/step8/?id=<?php echo $this->_tpl_vars['id']; ?>
&sub=<?php echo $this->_tpl_vars['vl']['salary_id']; ?>
&option=edit&sub_option=del" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
					
					</div>
					</td>
				</tr>
				<?php endforeach; endif; unset($_from); ?>
			<?php endif; ?>	
			</tbody>
		</table>
		<br />
		

		
			
	</div>
</div>
	
	
</div><!-- /box-generic-->