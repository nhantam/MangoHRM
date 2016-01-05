<div id="menu" class="hidden-print hidden-xs  sidebar-white">
    <div id="sidebar-collapse-wrapper">
        <div id="brandWrapper">
            <a href="{$base_url}" class="display-block-inline pull-left logo">
                <img src="images/mango-hrm-small.png" alt="" />
            </a>
            <a href="{$base_url}"><span class="text">{$lable.this_project.value}</span></a>
        </div>
        <div id="logoWrapper">
            <div id="logo">
                <a href="{$base_url}{$form.control}/{$form.action}/?lang=EN" class="btn btn-sm {if $form.lang eq 'EN'}btn-primary{else}btn-inverse{/if}"><i class="fa fa-exchange"></i> EN</a>
                <a href="{$base_url}{$form.control}/{$form.action}/?lang=VN" class="btn btn-sm {if $form.lang eq 'VN'}btn-primary{else}btn-inverse{/if}"><i class="fa fa-exchange"></i> VN</a>

				<!--
                <a href="{$base_url}mail/list/" class="btn btn-sm btn-inverse"><i class="fa fa-fw fa-envelope"></i>
                    {*if $notification_mail gt 0}
                    <span class="badge pull-right badge-primary">{$notification_mail}</span>
                    {/if*}
                </a>
				-->
				
                <a href="{$base_url}/login/logout/" class="btn btn-sm btn-inverse pull-right"><i class="fa fa-fw fa-sign-out"></i></a>
            </div>
        </div>
        <ul class="menu list-unstyled hide" id="navigation_components"></ul>
        <ul class="menu list-unstyled hide" id="navigation_modules"></ul>
        <ul class="menu list-unstyled hide" id="navigation_modules_front"></ul>
        <ul class="menu list-unstyled" id="navigation_modules_hrm">
            <li class="hasSubmenu {if $form.control eq 'dashboard'}active{/if}">
                <a href="{$base_url}" class="glyphicons home ">
                    <i></i><span>{$lable.dashboard.value}</span>
                </a>      
            </li>


            <li class="hasSubmenu {if $form.control eq 'employee' || $form.control eq 'empadd'}active{/if}">
                <a href="#sidebar-collapse-employee" data-toggle="collapse" class="padd-left-5px"><i class="fa fa-male"></i>{$lable.employee.value}</a>
                <ul id="sidebar-collapse-employee" class="collapse {if $form.control eq 'employee' || $form.control eq 'empadd'}in{/if}">
                    
					<li {if $form.control eq 'employee' and $form.action eq 'index'}class="active"{/if}><a href="{$base_url}employee/"><i class="fa fa-list-ol"></i> {$lable.list.value}</a></li>
                    <li {if $form.control eq 'empadd' and $form.action eq 'index'}class="active"{/if}><a href="{$base_url}empadd/add/"><i class="fa fa-plus"></i> {$lable.add.value}</a></li>
					 <li {if $form.action eq 'inactive'}class="active"{/if}><a href="{$base_url}employee/report/"><i class="fa fa-save"></i> {$lable.report.value}</a></li>
					
					<li class="hasSubmenu {if $form.control eq 'memberlog'}active{/if}"><a href="#employee-config" data-toggle="collapse"><i class="fa fa-wrench"></i>{$lable.config.value}</a>
						<ul id="employee-config" class="collapse {if $form.control eq 'job'}in{/if}">
							<li>
								<a href="{$base_url}country/"><i class="fa fa-wrench"></i>Data import</a>
							</li>
							<li>
								<a href="{$base_url}country/"><i class="fa fa-wrench"></i>Report method</a>
							</li>
						</ul>
					</li>
                </ul>
            </li>
			
			
            <li class="hasSubmenu {if $form.control eq 'product'}active{/if}">
                <a href="#sidebar-collapse-leave" data-toggle="collapse" class="padd-left-5px"><i class="fa fa-list"></i>Leave</a>
                <ul id="sidebar-collapse-leave" class="collapse {if $form.control eq 'product'}in{/if}">
                    
					<li {if $form.action eq 'inactive'}class="active"{/if}><a href="{$base_url}product/inactive/" class="padd-left-5px"><i class="fa fa-list-ol"></i> {$lable.list.value}</a></li>
                    <li {if $form.action eq 'add'}class="active"{/if}><a href="{$base_url}product/add/" class="padd-left-5px"><i class="fa fa-list-ol"></i> Assign Leave</a></li>
					 <li {if $form.action eq 'inactive'}class="active"{/if}><a href="{$base_url}product/inactive/" class="padd-left-5px"><i class="fa fa-list-ol"></i> My Leave</a>
					 </li>
					 <li {if $form.action eq 'inactive'}class="active"{/if}><a href="{$base_url}product/inactive/" class="padd-left-5px"><i class="fa fa-list-ol"></i> Apply</a>
					 </li>
					
					<li class="hasSubmenu {if $form.control eq 'memberlog'}active{/if}"><a href="#entitlements-config" data-toggle="collapse"class="padd-left-5px"><i class="fa fa-wrench"></i>Entitlements</a>
						<ul id="entitlements-config" class="collapse {if $form.control eq 'job'}in{/if}">
							<li>
								<a href="{$base_url}country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Add Leave Entitlement</a>
							</li>
							<li>
								<a href="{$base_url}country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Employee Entitlements</a>
							</li>
							<li>
								<a href="{$base_url}country/" class="padd-left-10px"><i class="fa fa-wrench"></i>My Entitlements</a>
							</li>
						</ul>
					</li>
					
					<li class="hasSubmenu {if $form.control eq 'memberlog'}active{/if}"><a href="#entitlements-config" data-toggle="collapse"class="padd-left-5px"><i class="fa fa-wrench"></i>Reports</a>
						<ul id="entitlements-config" class="collapse {if $form.control eq 'job'}in{/if}">
							<li>
								<a href="{$base_url}country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Leave Entitlements</a>
							</li>
							<li>
								<a href="{$base_url}country/" class="padd-left-10px"><i class="fa fa-wrench"></i>My Leave Entitlements</a>
							</li>
						</ul>
					</li>
					
					<li class="hasSubmenu {if $form.control eq 'memberlog'}active{/if}"><a href="#leave-config" data-toggle="collapse" class="padd-left-5px"><i class="fa fa-wrench"></i>Config</a>
						<ul id="leave-config" class="collapse {if $form.control eq 'job'}in{/if}">
							<li>
								<a href="{$base_url}country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Leave Period</a>
							</li>
							<li>
								<a href="{$base_url}country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Leave Types</a>
							</li>
							<li>
								<a href="{$base_url}country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Work Week</a>
							</li>
							<li>
								<a href="{$base_url}country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Holidays</a>
							</li>
						</ul>
					</li>
                </ul>
            </li>



            <li class="hasSubmenu {if $form.control eq 'weblink'}active{/if}">
                <a href="#sidebar-collapse-time" data-toggle="collapse" class="glyphicons globe padd-left-5px"><i></i><span>Time</span></a>
                <ul id="sidebar-collapse-time" class="collapse {if $form.control eq 'weblink'}in{/if}">
				
					<li class="hasSubmenu {if $form.control eq 'memberlog'}active{/if}"><a href="#time-project-info" data-toggle="collapse"class="padd-left-5px"><i class="fa fa-wrench"></i>Project info</a>
						<ul id="time-project-info" class="collapse {if $form.control eq 'job'}in{/if}">
							<li>
								<a href="{$base_url}country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Customers</a>
							</li>
							<li>
								<a href="{$base_url}country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Projects</a>
							</li>
						</ul>
					</li>
					
					<li class="hasSubmenu {if $form.control eq 'memberlog'}active{/if}"><a href="#time-Timesheets" data-toggle="collapse"class="padd-left-5px"><i class="fa fa-wrench"></i>Timesheets</a>
						<ul id="time-Timesheets" class="collapse {if $form.control eq 'job'}in{/if}">
							<li>
								<a href="{$base_url}country/" class="padd-left-10px"><i class="fa fa-wrench"></i>My Timesheets</a>
							</li>
							<li>
								<a href="{$base_url}country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Employee Timesheets</a>
							</li>
						</ul>
					</li>
					
					<li class="hasSubmenu {if $form.control eq 'memberlog'}active{/if}"><a href="#time-Timesheets" data-toggle="collapse"class="padd-left-5px"><i class="fa fa-wrench"></i>Attendance</a>
						<ul id="time-Timesheets" class="collapse {if $form.control eq 'job'}in{/if}">
							<li>
								<a href="{$base_url}country/" class="padd-left-10px"><i class="fa fa-wrench"></i>My Attendance Records</a>
							</li>
							<li>
								<a href="{$base_url}country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Punch In/Out</a>
							</li>
							<li>
								<a href="{$base_url}country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Employee Records</a>
							</li>
							<li>
								<a href="{$base_url}country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Configuration</a>
							</li>
						</ul>
					</li>
					
                   
                </ul>
            </li>
			
			
			<li class="hasSubmenu {if $form.control eq 'weblink'}active{/if}">
                <a href="#sidebar-collapse-Recruitment" data-toggle="collapse" class="glyphicons globe padd-left-5px"><i></i><span>Recruitment</span></a>
                <ul id="sidebar-collapse-Recruitment" class="collapse {if $form.control eq 'weblink'}in{/if}">
				
					<li {if $form.control eq 'country'}class="active"{/if}><a href="{$base_url}country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Candidates</a></li>
					
					<li {if $form.control eq 'country'}class="active"{/if}><a href="{$base_url}country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Vacancies</a></li>
					
                </ul>
            </li>
			
			
			<li class="hasSubmenu {if $form.control eq 'weblink'}active{/if}">
                <a href="#sidebar-collapse-myinfo" data-toggle="collapse" class="glyphicons globe padd-left-5px"><i></i><span>My Info</span></a>
                <ul id="sidebar-collapse-myinfo" class="collapse {if $form.control eq 'weblink'}in{/if}">
				
					<li {if $form.control eq 'country'}class="active"{/if}><a href="{$base_url}country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Personal Details</a></li>
					
					<li {if $form.control eq 'country'}class="active"{/if}><a href="{$base_url}country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Contact Details</a></li>
					<li {if $form.control eq 'country'}class="active"{/if}><a href="{$base_url}country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Emergency Contacts</a></li>
					<li {if $form.control eq 'country'}class="active"{/if}><a href="{$base_url}country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Assigned Dependents</a></li>
					<li {if $form.control eq 'country'}class="active"{/if}><a href="{$base_url}country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Immigration</a></li>
					
					<li {if $form.control eq 'country'}class="active"{/if}><a href="{$base_url}country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Job</a></li>
					<li {if $form.control eq 'country'}class="active"{/if}><a href="{$base_url}country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Salary</a></li>
					<li {if $form.control eq 'country'}class="active"{/if}><a href="{$base_url}country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Tax Exemptions</a></li>
					<li {if $form.control eq 'country'}class="active"{/if}><a href="{$base_url}country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Report-to</a></li>
					
					<li {if $form.control eq 'country'}class="active"{/if}><a href="{$base_url}country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Qualifications</a></li>
					<li {if $form.control eq 'country'}class="active"{/if}><a href="{$base_url}country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Memberships</a></li>
					
                </ul>
            </li>



			
			<li class="hasSubmenu {if $form.control eq 'weblink'}active{/if}">
                <a href="#sidebar-collapse-Performance" data-toggle="collapse" class="glyphicons globe padd-left-5px"><i></i><span>Performance</span></a>
                <ul id="sidebar-collapse-Performance" class="collapse {if $form.control eq 'weblink'}in{/if}">
				
					<li class="hasSubmenu {if $form.control eq 'memberlog'}active{/if}"><a href="#time-project-info" data-toggle="collapse"class="padd-left-5px"><i class="fa fa-wrench"></i>Configure</a>
						<ul id="time-project-info" class="collapse {if $form.control eq 'job'}in{/if}">
							<li>
								<a href="{$base_url}country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Trackers</a>
							</li>
							<li>
								<a href="{$base_url}country/" class="padd-left-10px"><i class="fa fa-wrench"></i>KPIs</a>
							</li>
						</ul>
					</li>
					
					
					<li class="hasSubmenu {if $form.control eq 'memberlog'}active{/if}"><a href="#time-project-info" data-toggle="collapse"class="padd-left-5px"><i class="fa fa-wrench"></i>Manage Reviews</a>
						<ul id="time-project-info" class="collapse {if $form.control eq 'job'}in{/if}">
							<li>
								<a href="{$base_url}country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Manage Reviews</a>
							</li>
							<li>
								<a href="{$base_url}country/" class="padd-left-10px"><i class="fa fa-wrench"></i>My Reviews</a>
							</li>
							<li>
								<a href="{$base_url}country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Review List</a>
							</li>
						</ul>
					</li>
					
					
					<li {if $form.control eq 'country'}class="active"{/if}><a href="{$base_url}country/" class="padd-left-10px"><i class="fa fa-wrench"></i>My Trackers</a></li>
					
					<li {if $form.control eq 'country'}class="active"{/if}><a href="{$base_url}country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Employee Trackers</a></li>
                   
                </ul>
            </li>


			<li class="hasSubmenu {if $form.control eq 'weblink'}active{/if}">
                <a href="#sidebar-collapse-directory" data-toggle="collapse" class="glyphicons globe padd-left-5px"><i></i><span>Search directory</span></a>
                <ul id="sidebar-collapse-directory" class="collapse {if $form.control eq 'weblink'}in{/if}">
				
					<li {if $form.control eq 'country'}class="active"{/if}><a href="{$base_url}country/" class="padd-left-5px"><i class="fa fa-wrench"></i>Search</a></li>
                   
                </ul>
            </li>
			

            <li class="hasSubmenu {if $form.control eq 'configqualifi' || $form.control eq 'companystructure' || $form.control eq 'locations' || $form.control eq 'lang' || $form.control eq 'general'}active{/if}">

                <a href="#sidebar-collapse-maps" data-toggle="collapse" class="glyphicons settings padd-left-5px"><i></i><span>{$lable.setting.value}</span></a>
                <ul id="sidebar-collapse-maps" class="collapse {if $form.control eq 'configqualifi' || $form.control eq 'companystructure' || $form.control eq 'locations' || $form.control eq 'lang' || $form.control eq 'general'}in{/if}">

                    <li {if $form.control eq 'users'}class="active"{/if}><a href="{$base_url}users/" class="padd-left-5px"><i class="fa fa-user"></i>{$lable.user_management.value}</a></li>
                    <li class="hasSubmenu {if $form.control eq 'memberlog'}active{/if}"><a href="#job-sub" data-toggle="collapse" class="padd-left-5px"><i class="fa fa-list-ol"></i>{$lable.job.value}</a>
						<ul id="job-sub" class="collapse {if $form.control eq 'job'}in{/if}">
							<li>
								<a href="{$base_url}job/list/" class="padd-left-10px"><i class="fa fa-wrench"></i>Jobs</a>
							</li>
							<li>
								<a href="{$base_url}paygrades/list/" class="padd-left-10px">{if $form.control eq 'weblink'}active{/if}<i class="fa fa-wrench"></i>Pay Grades</a>
							</li>
							<li>
								<a href="{$base_url}report/list" class="padd-left-10px"><i class="fa fa-wrench"></i>Report Method</a>
							</li>
							<li>
								<a href="{$base_url}empstatus/list/" class="padd-left-10px"><i class="fa fa-wrench"></i>Employment Status</a>
							</li>
							<li>
								<a href="{$base_url}country/" class="padd-left-10px"><i class="fa fa-wrench"></i>Work Shifts</a>
							</li>
						</ul>
					</li>
					
					 <li class="hasSubmenu {if $form.control eq 'companystructure' || $form.control eq 'locations'}active{/if}"><a href="#org-sub" data-toggle="collapse" class="padd-left-5px"><i class="fa  fa-building-o"></i>{$lable.organization.value}</a>
						<ul id="org-sub" class="collapse {if $form.control eq 'companystructure' || $form.control eq 'locations'}in{/if}">
							<li>
								<a href="{$base_url}country/"><i class="fa fa-wrench"></i>General Information</a>
							</li>
							<li {if $form.control eq 'locations'} class="active" {/if}>
								<a href="{$base_url}locations/list/"><i class="fa fa-wrench"></i>Locations</a>
							</li>
							<li {if $form.control eq 'companystructure'} class="active" {/if}>
								<a href="{$base_url}companystructure/viewnested/"><i class="fa fa-wrench"></i>{$lable.company_structure.value}</a>
							</li>
						</ul>
					</li>
					
					
					 <li class="hasSubmenu {if $form.control eq 'configqualifi'}active{/if}"><a href="#qualifi-sub" data-toggle="collapse" class="padd-left-5px"><i class="fa fa-briefcase"></i>{$lable.qualifications.value}</a>
						<ul id="qualifi-sub" class="collapse {if $form.control eq 'configqualifi'}in{/if}">
							<li>
								<a href="{$base_url}configqualifi/list/#skill"><i class="fa fa-calendar"></i>Skills</a>
							</li>
							<li>
								<a href="{$base_url}configqualifi/list/#education"><i class="fa fa-suitcase"></i>Education</a>
							</li>
							<li>
								<a href="{$base_url}configqualifi/list/#licenses"><i class="fa fa-certificate"></i>Licenses</a>
							</li>
							<li>
								<a href="{$base_url}configqualifi/list/#memberships"><i class="fa fa-user-md"></i>Memberships</a>
							</li>
							<li>
								<a href="{$base_url}country/"><i class="fa fa-wrench"></i>Languages</a>
							</li>
						</ul>
					</li>
					
					<li class="hasSubmenu {if $form.control eq 'memberlog'}active{/if}"><a href="#config-sub" data-toggle="collapse" class="padd-left-5px"><i class="fa fa-wrench"></i>{$lable.configuration.value}</a>
						<ul id="config-sub" class="collapse {if $form.control eq 'job'}in{/if}">
							<li>
								<a href="{$base_url}country/"><i class="fa fa-wrench"></i>{$lable.email.value}</a>
							</li>
							<li>
								<a href="{$base_url}country/"><i class="fa fa-wrench"></i>{$lable.localization.value}</a>
							</li>
						</ul>
					</li>
					
                    
                    <li {if $form.control eq 'country'}class="active"{/if}><a href="{$base_url}country/" class="padd-left-5px"><i class="fa fa-flag"></i>{$lable.countries.value}</a></li>
                    <li {if $form.control eq 'provience'}class="active"{/if}><a href="{$base_url}provience/" class="padd-left-5px"><i class="fa fa-map-marker"></i>{$lable.provience.value}</a></li>
                   
                    <li {if $form.control eq 'lang'}class="active"{/if}><a href="{$base_url}lang/list" class="padd-left-5px"><i class="fa fa-exchange"></i>{$lable.language.value}</a></li>
					
					<li {if $form.control eq 'general'}class="active"{/if}><a href="{$base_url}general/list" class="padd-left-5px"><i class="fa fa-exchange"></i>{$lable.general.value}</a></li>

                </ul>
            </li>
            <li class="hasSubmenu"> &nbsp; </li>
            <li class="hasSubmenu"> &nbsp; </li>
        </ul>

    </div>
</div>
<!-- // Sidebar Menu END -->