<?php /* Smarty version 2.6.25, created on 2015-12-31 14:06:51
         compiled from sidebar.tpl */ ?>
<div id="menu" class="hidden-print hidden-xs  sidebar-white">
    <div id="sidebar-collapse-wrapper">
        <div id="brandWrapper">
            <a href="<?php echo $this->_tpl_vars['base_url']; ?>
" class="display-block-inline pull-left logo">
                <img src="images/mango-hrm-small.png" alt="" />
            </a>
            <a href="<?php echo $this->_tpl_vars['base_url']; ?>
"><span class="text"><?php echo $this->_tpl_vars['lable']['this_project']['value']; ?>
</span></a>
        </div>
        <div id="logoWrapper">
            <div id="logo">
                <a href="<?php echo $this->_tpl_vars['base_url']; ?>
<?php echo $this->_tpl_vars['form']['control']; ?>
/<?php echo $this->_tpl_vars['form']['action']; ?>
/?lang=EN" class="btn btn-sm <?php if ($this->_tpl_vars['form']['lang'] == 'EN'): ?>btn-primary<?php else: ?>btn-inverse<?php endif; ?>"><i class="fa fa-exchange"></i> EN</a>
                <a href="<?php echo $this->_tpl_vars['base_url']; ?>
<?php echo $this->_tpl_vars['form']['control']; ?>
/<?php echo $this->_tpl_vars['form']['action']; ?>
/?lang=VN" class="btn btn-sm <?php if ($this->_tpl_vars['form']['lang'] == 'VN'): ?>btn-primary<?php else: ?>btn-inverse<?php endif; ?>"><i class="fa fa-exchange"></i> VN</a>

				<!--
                <a href="<?php echo $this->_tpl_vars['base_url']; ?>
mail/list/" class="btn btn-sm btn-inverse"><i class="fa fa-fw fa-envelope"></i>
                                    </a>
				-->
				
                <a href="<?php echo $this->_tpl_vars['base_url']; ?>
/login/logout/" class="btn btn-sm btn-inverse pull-right"><i class="fa fa-fw fa-sign-out"></i></a>
            </div>
        </div>
        <ul class="menu list-unstyled hide" id="navigation_components"></ul>
        <ul class="menu list-unstyled hide" id="navigation_modules"></ul>
        <ul class="menu list-unstyled hide" id="navigation_modules_front"></ul>
        <ul class="menu list-unstyled" id="navigation_modules_hrm">
            <li class="hasSubmenu <?php if ($this->_tpl_vars['form']['control'] == 'dashboard'): ?>active<?php endif; ?>">
                <a href="<?php echo $this->_tpl_vars['base_url']; ?>
" class="glyphicons home ">
                    <i></i><span><?php echo $this->_tpl_vars['lable']['dashboard']['value']; ?>
</span>
                </a>      
            </li>


            <li class="hasSubmenu <?php if ($this->_tpl_vars['form']['control'] == 'employee' || $this->_tpl_vars['form']['control'] == 'empadd'): ?>active<?php endif; ?>">
                <a href="#sidebar-collapse-employee" data-toggle="collapse" class="padd-left-5px"><i class="fa fa-male"></i><?php echo $this->_tpl_vars['lable']['employee']['value']; ?>
</a>
                <ul id="sidebar-collapse-employee" class="collapse <?php if ($this->_tpl_vars['form']['control'] == 'employee' || $this->_tpl_vars['form']['control'] == 'empadd'): ?>in<?php endif; ?>">
                    
					<li <?php if ($this->_tpl_vars['form']['control'] == 'employee' && $this->_tpl_vars['form']['action'] == 'index'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['base_url']; ?>
employee/"><i class="fa fa-list-ol"></i> <?php echo $this->_tpl_vars['lable']['list']['value']; ?>
</a></li>
                    <li <?php if ($this->_tpl_vars['form']['control'] == 'empadd' && $this->_tpl_vars['form']['action'] == 'index'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['base_url']; ?>
empadd/add/"><i class="fa fa-plus"></i> <?php echo $this->_tpl_vars['lable']['add']['value']; ?>
</a></li>
					 <li <?php if ($this->_tpl_vars['form']['action'] == 'inactive'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['base_url']; ?>
employee/report/"><i class="fa fa-save"></i> <?php echo $this->_tpl_vars['lable']['report']['value']; ?>
</a></li>
					
					<li class="hasSubmenu <?php if ($this->_tpl_vars['form']['control'] == 'memberlog'): ?>active<?php endif; ?>"><a href="#employee-config" data-toggle="collapse"><i class="fa fa-wrench"></i><?php echo $this->_tpl_vars['lable']['config']['value']; ?>
</a>
						<ul id="employee-config" class="collapse <?php if ($this->_tpl_vars['form']['control'] == 'job'): ?>in<?php endif; ?>">
							<li>
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/"><i class="fa fa-wrench"></i>Data import</a>
							</li>
							<li>
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/"><i class="fa fa-wrench"></i>Report method</a>
							</li>
						</ul>
					</li>
                </ul>
            </li>
			
			
            <li class="hasSubmenu <?php if ($this->_tpl_vars['form']['control'] == 'product'): ?>active<?php endif; ?>">
                <a href="#sidebar-collapse-leave" data-toggle="collapse" class="padd-left-5px"><i class="fa fa-list"></i>Leave</a>
                <ul id="sidebar-collapse-leave" class="collapse <?php if ($this->_tpl_vars['form']['control'] == 'product'): ?>in<?php endif; ?>">
                    
					<li <?php if ($this->_tpl_vars['form']['action'] == 'inactive'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['base_url']; ?>
product/inactive/" class="padd-left-5px"><i class="fa fa-list-ol"></i> <?php echo $this->_tpl_vars['lable']['list']['value']; ?>
</a></li>
                    <li <?php if ($this->_tpl_vars['form']['action'] == 'add'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['base_url']; ?>
product/add/" class="padd-left-5px"><i class="fa fa-list-ol"></i> Assign Leave</a></li>
					 <li <?php if ($this->_tpl_vars['form']['action'] == 'inactive'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['base_url']; ?>
product/inactive/" class="padd-left-5px"><i class="fa fa-list-ol"></i> My Leave</a>
					 </li>
					 <li <?php if ($this->_tpl_vars['form']['action'] == 'inactive'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['base_url']; ?>
product/inactive/" class="padd-left-5px"><i class="fa fa-list-ol"></i> Apply</a>
					 </li>
					
					<li class="hasSubmenu <?php if ($this->_tpl_vars['form']['control'] == 'memberlog'): ?>active<?php endif; ?>"><a href="#entitlements-config" data-toggle="collapse"class="padd-left-5px"><i class="fa fa-wrench"></i>Entitlements</a>
						<ul id="entitlements-config" class="collapse <?php if ($this->_tpl_vars['form']['control'] == 'job'): ?>in<?php endif; ?>">
							<li>
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Add Leave Entitlement</a>
							</li>
							<li>
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Employee Entitlements</a>
							</li>
							<li>
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/" class="padd-left-10px"><i class="fa fa-wrench"></i>My Entitlements</a>
							</li>
						</ul>
					</li>
					
					<li class="hasSubmenu <?php if ($this->_tpl_vars['form']['control'] == 'memberlog'): ?>active<?php endif; ?>"><a href="#entitlements-config" data-toggle="collapse"class="padd-left-5px"><i class="fa fa-wrench"></i>Reports</a>
						<ul id="entitlements-config" class="collapse <?php if ($this->_tpl_vars['form']['control'] == 'job'): ?>in<?php endif; ?>">
							<li>
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Leave Entitlements</a>
							</li>
							<li>
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/" class="padd-left-10px"><i class="fa fa-wrench"></i>My Leave Entitlements</a>
							</li>
						</ul>
					</li>
					
					<li class="hasSubmenu <?php if ($this->_tpl_vars['form']['control'] == 'memberlog'): ?>active<?php endif; ?>"><a href="#leave-config" data-toggle="collapse" class="padd-left-5px"><i class="fa fa-wrench"></i>Config</a>
						<ul id="leave-config" class="collapse <?php if ($this->_tpl_vars['form']['control'] == 'job'): ?>in<?php endif; ?>">
							<li>
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Leave Period</a>
							</li>
							<li>
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Leave Types</a>
							</li>
							<li>
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Work Week</a>
							</li>
							<li>
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Holidays</a>
							</li>
						</ul>
					</li>
                </ul>
            </li>



            <li class="hasSubmenu <?php if ($this->_tpl_vars['form']['control'] == 'weblink'): ?>active<?php endif; ?>">
                <a href="#sidebar-collapse-time" data-toggle="collapse" class="glyphicons globe padd-left-5px"><i></i><span>Time</span></a>
                <ul id="sidebar-collapse-time" class="collapse <?php if ($this->_tpl_vars['form']['control'] == 'weblink'): ?>in<?php endif; ?>">
				
					<li class="hasSubmenu <?php if ($this->_tpl_vars['form']['control'] == 'memberlog'): ?>active<?php endif; ?>"><a href="#time-project-info" data-toggle="collapse"class="padd-left-5px"><i class="fa fa-wrench"></i>Project info</a>
						<ul id="time-project-info" class="collapse <?php if ($this->_tpl_vars['form']['control'] == 'job'): ?>in<?php endif; ?>">
							<li>
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Customers</a>
							</li>
							<li>
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Projects</a>
							</li>
						</ul>
					</li>
					
					<li class="hasSubmenu <?php if ($this->_tpl_vars['form']['control'] == 'memberlog'): ?>active<?php endif; ?>"><a href="#time-Timesheets" data-toggle="collapse"class="padd-left-5px"><i class="fa fa-wrench"></i>Timesheets</a>
						<ul id="time-Timesheets" class="collapse <?php if ($this->_tpl_vars['form']['control'] == 'job'): ?>in<?php endif; ?>">
							<li>
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/" class="padd-left-10px"><i class="fa fa-wrench"></i>My Timesheets</a>
							</li>
							<li>
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Employee Timesheets</a>
							</li>
						</ul>
					</li>
					
					<li class="hasSubmenu <?php if ($this->_tpl_vars['form']['control'] == 'memberlog'): ?>active<?php endif; ?>"><a href="#time-Timesheets" data-toggle="collapse"class="padd-left-5px"><i class="fa fa-wrench"></i>Attendance</a>
						<ul id="time-Timesheets" class="collapse <?php if ($this->_tpl_vars['form']['control'] == 'job'): ?>in<?php endif; ?>">
							<li>
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/" class="padd-left-10px"><i class="fa fa-wrench"></i>My Attendance Records</a>
							</li>
							<li>
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Punch In/Out</a>
							</li>
							<li>
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Employee Records</a>
							</li>
							<li>
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Configuration</a>
							</li>
						</ul>
					</li>
					
                   
                </ul>
            </li>
			
			
			<li class="hasSubmenu <?php if ($this->_tpl_vars['form']['control'] == 'weblink'): ?>active<?php endif; ?>">
                <a href="#sidebar-collapse-Recruitment" data-toggle="collapse" class="glyphicons globe padd-left-5px"><i></i><span>Recruitment</span></a>
                <ul id="sidebar-collapse-Recruitment" class="collapse <?php if ($this->_tpl_vars['form']['control'] == 'weblink'): ?>in<?php endif; ?>">
				
					<li <?php if ($this->_tpl_vars['form']['control'] == 'country'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Candidates</a></li>
					
					<li <?php if ($this->_tpl_vars['form']['control'] == 'country'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Vacancies</a></li>
					
                </ul>
            </li>
			
			
			<li class="hasSubmenu <?php if ($this->_tpl_vars['form']['control'] == 'weblink'): ?>active<?php endif; ?>">
                <a href="#sidebar-collapse-myinfo" data-toggle="collapse" class="glyphicons globe padd-left-5px"><i></i><span>My Info</span></a>
                <ul id="sidebar-collapse-myinfo" class="collapse <?php if ($this->_tpl_vars['form']['control'] == 'weblink'): ?>in<?php endif; ?>">
				
					<li <?php if ($this->_tpl_vars['form']['control'] == 'country'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Personal Details</a></li>
					
					<li <?php if ($this->_tpl_vars['form']['control'] == 'country'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Contact Details</a></li>
					<li <?php if ($this->_tpl_vars['form']['control'] == 'country'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Emergency Contacts</a></li>
					<li <?php if ($this->_tpl_vars['form']['control'] == 'country'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Assigned Dependents</a></li>
					<li <?php if ($this->_tpl_vars['form']['control'] == 'country'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Immigration</a></li>
					
					<li <?php if ($this->_tpl_vars['form']['control'] == 'country'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Job</a></li>
					<li <?php if ($this->_tpl_vars['form']['control'] == 'country'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Salary</a></li>
					<li <?php if ($this->_tpl_vars['form']['control'] == 'country'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Tax Exemptions</a></li>
					<li <?php if ($this->_tpl_vars['form']['control'] == 'country'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Report-to</a></li>
					
					<li <?php if ($this->_tpl_vars['form']['control'] == 'country'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Qualifications</a></li>
					<li <?php if ($this->_tpl_vars['form']['control'] == 'country'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Memberships</a></li>
					
                </ul>
            </li>



			
			<li class="hasSubmenu <?php if ($this->_tpl_vars['form']['control'] == 'weblink'): ?>active<?php endif; ?>">
                <a href="#sidebar-collapse-Performance" data-toggle="collapse" class="glyphicons globe padd-left-5px"><i></i><span>Performance</span></a>
                <ul id="sidebar-collapse-Performance" class="collapse <?php if ($this->_tpl_vars['form']['control'] == 'weblink'): ?>in<?php endif; ?>">
				
					<li class="hasSubmenu <?php if ($this->_tpl_vars['form']['control'] == 'memberlog'): ?>active<?php endif; ?>"><a href="#time-project-info" data-toggle="collapse"class="padd-left-5px"><i class="fa fa-wrench"></i>Configure</a>
						<ul id="time-project-info" class="collapse <?php if ($this->_tpl_vars['form']['control'] == 'job'): ?>in<?php endif; ?>">
							<li>
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Trackers</a>
							</li>
							<li>
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/" class="padd-left-10px"><i class="fa fa-wrench"></i>KPIs</a>
							</li>
						</ul>
					</li>
					
					
					<li class="hasSubmenu <?php if ($this->_tpl_vars['form']['control'] == 'memberlog'): ?>active<?php endif; ?>"><a href="#time-project-info" data-toggle="collapse"class="padd-left-5px"><i class="fa fa-wrench"></i>Manage Reviews</a>
						<ul id="time-project-info" class="collapse <?php if ($this->_tpl_vars['form']['control'] == 'job'): ?>in<?php endif; ?>">
							<li>
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Manage Reviews</a>
							</li>
							<li>
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/" class="padd-left-10px"><i class="fa fa-wrench"></i>My Reviews</a>
							</li>
							<li>
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Review List</a>
							</li>
						</ul>
					</li>
					
					
					<li <?php if ($this->_tpl_vars['form']['control'] == 'country'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/" class="padd-left-10px"><i class="fa fa-wrench"></i>My Trackers</a></li>
					
					<li <?php if ($this->_tpl_vars['form']['control'] == 'country'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Employee Trackers</a></li>
                   
                </ul>
            </li>


			<li class="hasSubmenu <?php if ($this->_tpl_vars['form']['control'] == 'weblink'): ?>active<?php endif; ?>">
                <a href="#sidebar-collapse-directory" data-toggle="collapse" class="glyphicons globe padd-left-5px"><i></i><span>Search directory</span></a>
                <ul id="sidebar-collapse-directory" class="collapse <?php if ($this->_tpl_vars['form']['control'] == 'weblink'): ?>in<?php endif; ?>">
				
					<li <?php if ($this->_tpl_vars['form']['control'] == 'country'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/" class="padd-left-5px"><i class="fa fa-wrench"></i>Search</a></li>
                   
                </ul>
            </li>
			

            <li class="hasSubmenu <?php if ($this->_tpl_vars['form']['control'] == 'configqualifi' || $this->_tpl_vars['form']['control'] == 'companystructure' || $this->_tpl_vars['form']['control'] == 'locations' || $this->_tpl_vars['form']['control'] == 'lang' || $this->_tpl_vars['form']['control'] == 'general'): ?>active<?php endif; ?>">

                <a href="#sidebar-collapse-maps" data-toggle="collapse" class="glyphicons settings padd-left-5px"><i></i><span><?php echo $this->_tpl_vars['lable']['setting']['value']; ?>
</span></a>
                <ul id="sidebar-collapse-maps" class="collapse <?php if ($this->_tpl_vars['form']['control'] == 'configqualifi' || $this->_tpl_vars['form']['control'] == 'companystructure' || $this->_tpl_vars['form']['control'] == 'locations' || $this->_tpl_vars['form']['control'] == 'lang' || $this->_tpl_vars['form']['control'] == 'general'): ?>in<?php endif; ?>">

                    <li <?php if ($this->_tpl_vars['form']['control'] == 'users'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['base_url']; ?>
users/" class="padd-left-5px"><i class="fa fa-user"></i><?php echo $this->_tpl_vars['lable']['user_management']['value']; ?>
</a></li>
                    <li class="hasSubmenu <?php if ($this->_tpl_vars['form']['control'] == 'memberlog'): ?>active<?php endif; ?>"><a href="#job-sub" data-toggle="collapse" class="padd-left-5px"><i class="fa fa-list-ol"></i><?php echo $this->_tpl_vars['lable']['job']['value']; ?>
</a>
						<ul id="job-sub" class="collapse <?php if ($this->_tpl_vars['form']['control'] == 'job'): ?>in<?php endif; ?>">
							<li>
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
job/list/" class="padd-left-10px"><i class="fa fa-wrench"></i>Jobs</a>
							</li>
							<li>
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
paygrades/list/" class="padd-left-10px"><?php if ($this->_tpl_vars['form']['control'] == 'weblink'): ?>active<?php endif; ?><i class="fa fa-wrench"></i>Pay Grades</a>
							</li>
							<li>
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
report/list" class="padd-left-10px"><i class="fa fa-wrench"></i>Report Method</a>
							</li>
							<li>
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
empstatus/list/" class="padd-left-10px"><i class="fa fa-wrench"></i>Employment Status</a>
							</li>
							<li>
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Work Shifts</a>
							</li>
						</ul>
					</li>
					
					 <li class="hasSubmenu <?php if ($this->_tpl_vars['form']['control'] == 'companystructure' || $this->_tpl_vars['form']['control'] == 'locations'): ?>active<?php endif; ?>"><a href="#org-sub" data-toggle="collapse" class="padd-left-5px"><i class="fa  fa-building-o"></i><?php echo $this->_tpl_vars['lable']['organization']['value']; ?>
</a>
						<ul id="org-sub" class="collapse <?php if ($this->_tpl_vars['form']['control'] == 'companystructure' || $this->_tpl_vars['form']['control'] == 'locations'): ?>in<?php endif; ?>">
							<li>
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/"><i class="fa fa-wrench"></i>General Information</a>
							</li>
							<li <?php if ($this->_tpl_vars['form']['control'] == 'locations'): ?> class="active" <?php endif; ?>>
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
locations/list/"><i class="fa fa-wrench"></i>Locations</a>
							</li>
							<li <?php if ($this->_tpl_vars['form']['control'] == 'companystructure'): ?> class="active" <?php endif; ?>>
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
companystructure/viewnested/"><i class="fa fa-wrench"></i><?php echo $this->_tpl_vars['lable']['company_structure']['value']; ?>
</a>
							</li>
						</ul>
					</li>
					
					
					 <li class="hasSubmenu <?php if ($this->_tpl_vars['form']['control'] == 'configqualifi'): ?>active<?php endif; ?>"><a href="#qualifi-sub" data-toggle="collapse" class="padd-left-5px"><i class="fa fa-briefcase"></i><?php echo $this->_tpl_vars['lable']['qualifications']['value']; ?>
</a>
						<ul id="qualifi-sub" class="collapse <?php if ($this->_tpl_vars['form']['control'] == 'configqualifi'): ?>in<?php endif; ?>">
							<li>
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
configqualifi/list/#skill"><i class="fa fa-calendar"></i>Skills</a>
							</li>
							<li>
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
configqualifi/list/#education"><i class="fa fa-suitcase"></i>Education</a>
							</li>
							<li>
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
configqualifi/list/#licenses"><i class="fa fa-certificate"></i>Licenses</a>
							</li>
							<li>
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
configqualifi/list/#memberships"><i class="fa fa-user-md"></i>Memberships</a>
							</li>
							<li>
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/"><i class="fa fa-wrench"></i>Languages</a>
							</li>
						</ul>
					</li>
					
					<li class="hasSubmenu <?php if ($this->_tpl_vars['form']['control'] == 'memberlog'): ?>active<?php endif; ?>"><a href="#config-sub" data-toggle="collapse" class="padd-left-5px"><i class="fa fa-wrench"></i><?php echo $this->_tpl_vars['lable']['configuration']['value']; ?>
</a>
						<ul id="config-sub" class="collapse <?php if ($this->_tpl_vars['form']['control'] == 'job'): ?>in<?php endif; ?>">
							<li>
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/"><i class="fa fa-wrench"></i><?php echo $this->_tpl_vars['lable']['email']['value']; ?>
</a>
							</li>
							<li>
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/"><i class="fa fa-wrench"></i><?php echo $this->_tpl_vars['lable']['localization']['value']; ?>
</a>
							</li>
						</ul>
					</li>
					
                    
                    <li <?php if ($this->_tpl_vars['form']['control'] == 'country'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['base_url']; ?>
country/" class="padd-left-5px"><i class="fa fa-flag"></i><?php echo $this->_tpl_vars['lable']['countries']['value']; ?>
</a></li>
                    <li <?php if ($this->_tpl_vars['form']['control'] == 'provience'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['base_url']; ?>
provience/" class="padd-left-5px"><i class="fa fa-map-marker"></i><?php echo $this->_tpl_vars['lable']['provience']['value']; ?>
</a></li>
                   
                    <li <?php if ($this->_tpl_vars['form']['control'] == 'lang'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['base_url']; ?>
lang/list" class="padd-left-5px"><i class="fa fa-exchange"></i><?php echo $this->_tpl_vars['lable']['language']['value']; ?>
</a></li>
					
					<li <?php if ($this->_tpl_vars['form']['control'] == 'general'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['base_url']; ?>
general/list" class="padd-left-5px"><i class="fa fa-exchange"></i><?php echo $this->_tpl_vars['lable']['general']['value']; ?>
</a></li>

                </ul>
            </li>
            <li class="hasSubmenu"> &nbsp; </li>
            <li class="hasSubmenu"> &nbsp; </li>
        </ul>

    </div>
</div>
<!-- // Sidebar Menu END -->