{include file="login/header.tpl"}

<div class="container">


<!-- Main Container Fluid -->
<div class="container-fluid menu-hidden">
<!-- Content -->
<div id="content">

<div class="container">
<!-- row-app -->
<div class="row row-app">
<!-- col -->
<!-- col-separator.box -->
<div class="col-separator col-unscrollable box">
<!-- col-table -->
<div class="col-table">
	
	<img src="images/mango-logo.jpg" alt="Mongo HRM" />
	<h4 class="innerAll margin-none border-bottom text-center">
	HRM
	</h4>
	<!-- col-table-row -->
	<div class="col-table-row">
		<!-- col-app -->
		<div class="col-app col-unscrollable">
			<!-- col-app -->
			<div class="col-app">
				<div class="login">
					<div class="placeholder text-center"><i class="fa fa-lock"></i>
					</div>
					
					<div class="panel panel-default col-md-4 col-sm-6 col-sm-offset-3 col-md-offset-4">
						<div class="panel-body">
						{if $error neq ''} {include file="error.tpl"} {/if}
							<form role="form" method="post" action="{$base_url}{$form.control}/index/">
								<div class="form-group">
									<label for="exampleInputEmail1">Username</label>
									<input type="text" name="data[username]" id="username" class="form-control" placeholder="Enter username">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Password</label>
									<input type="password" name="data[password]" id="password" class="form-control" placeholder="Password">
								</div>
								<button type="submit" class="btn btn-primary btn-block">Login</button>
								<div class="checkbox">
									<label>
										<input name="remember" type="checkbox" value="1">Remember me
									</label>
								</div>
							</form>
						</div>
					</div>
					
					<!--
					<div class="col-sm-4 col-sm-offset-4 text-center">
						<div class="innerAll">
							<a href="signup.html?lang=en" class="btn btn-info">Create a new account? <i class="fa fa-pencil"></i> </a>
							<div class="separator"></div>
						</div>
					</div>
					-->
					
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- // END col-app -->
		</div>
		<!-- // END col-app.col-unscrollable -->
	</div>
	<!-- // END col-table-row -->
</div>
<!-- // END col-table -->
</div>
<!-- // END col-separator.box -->
</div>
<!-- // END row-app -->

{include file="login/footer.tpl"}