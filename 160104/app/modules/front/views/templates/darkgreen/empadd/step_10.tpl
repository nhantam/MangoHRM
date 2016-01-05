 
  
<div class="row">

	<div class="col-md-12">
		
		<!-- Experience -->
		<div class="box-generic"> 
			<div class="widget-head" style="background-color:#EAEAEA;">
				<h4 class="heading my-white">{$lable.work_experience.value}</h4>
			</div>
			
			<div class="row">
				<div id="id_add_experience"> <!-- form hide-show-->
					{include file="empadd/step10_experience.tpl"}
				</div><!-- #id_add_experience-->
			</div>
		
			<div class="row">
				{include file="empadd/step10_experience_list.tpl"}
			</div>
		</div><!--// END box-generic-->
		
		<!-- -->
		

		
		<div class="col-md-12">
			(<span class="red">*</span>) {$lable.required_field.value}
			<div class="separator"></div>
		</div>
		
	</div>
</div>