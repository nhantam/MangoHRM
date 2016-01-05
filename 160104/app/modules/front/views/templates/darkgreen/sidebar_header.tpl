<nav class="navbar hidden-print main " role="navigation">
    <div class="navbar-header pull-left">
        <div class="user-action user-action-btn-navbar pull-left border-right" id="btn_navbar">
            <button class="btn btn-sm btn-navbar btn-inverse btn-stroke"><i class="fa fa-bars fa-2x"></i>
            </button>
        </div>
    </div>
    <ul class="main pull-right ">
		
		
        <li class="dropdown notif notifications hidden-xs" onmouseover="return viewedNotification();">
            <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-bell-fill"></i> <span class="label label-danger">{if $notification_no_viewed gt 0} {$notification_no_viewed} {/if}</span></a>
            <ul class="dropdown-menu chat media-list pull-right">
				{foreach from=$notification item=nn}
					<li class="media">
						<a class="pull-left" href="#">
							<img class="media-object thumb" src="{$base_tlp_admin}/assets/images/people/100/15.jpg"
							alt="50x50" width="50" />
						</a>
						<div class="media-body">
							<span class="label label-default pull-right">{$nn.date_add|date_format:"%D %H:%M"}</span>
							<h5 class="media-heading">{$nn.username}.</h5>
							<p class="margin-none">
							<a href="{$base_url_admin}{$nn.control}/index/?id={$nn.row_id}&option=edit&step=4&t=update" style="font-weight:normal;">
							{$nn.msg}
							</a>
							</p>
						</div>
					</li>
				{/foreach}
                <li><a href="{$base_url_admin}notification/list/" class="btn btn-primary"><i class="fa fa-list"></i> <span>View all messages</span></a>
                </li>
            </ul>
        </li>
		
		
        <li class="dropdown username">
            <a href="" class="dropdown-toggle" data-toggle="dropdown">
                <img src="{$base_tpl}/assets/images/people/35/2.jpg" class="img-circle"
                width="30" />{$ss_admin->adminLogin}
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu pull-right">
                <li>
					<a href="{$base_url}/{$form.module}/login/logout/" class="glyphicons lock no-ajaxify"><i></i>Logout</a>
                </li>
            </ul>
        </li>
    </ul>
    <div class="navbar-collapse collapse">
       &nbsp;
    </div>
</nav>

<script>
{literal}
function viewedNotification() {
	
	$.get( base_url+"joblistajx/viewed/", function( data ) { 
	
	});
	
}
{/literal}
</script>