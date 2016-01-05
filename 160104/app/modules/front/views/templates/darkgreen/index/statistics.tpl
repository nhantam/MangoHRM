<div class="col-lg-5">
	<div class="panel panel-default">
		<div class="panel-heading">
			<i class="fa fa-bell fa-fw"></i> Thống kê
		</div>
		<!-- /.panel-heading -->
		<div class="panel-body">
			<div class="list-group">
				<a href="#" class="list-group-item">
					<i class="fa fa-comment fa-fw"></i> {$lang.news.value}
					<span class="pull-right text-muted small">
						<em>update{if $news_lastupdate gt 0} {$news_lastupdate} day ago {else} today {/if}</em>
					</span>
				</a>
				<a href="#" class="list-group-item">
					<i class="fa fa-twitter fa-fw"></i> {$lang.events.value}
					<span class="pull-right text-muted small"><em>update{if $event_lastupdate gt 0} {$event_lastupdate} day ago {else} today {/if}</em>
					</span>
				</a>
				<a href="#" class="list-group-item">
					<i class="fa fa-envelope fa-fw"></i> {$lang.document.value}
					<span class="pull-right text-muted small"><em>update{if $rule_lastupdate gt 0} {$rule_lastupdate} day ago {else} today {/if}</em>
					</span>
				</a>
				<a href="#" class="list-group-item">
					<i class="fa fa-tasks fa-fw"></i> {$lang.calendar.value}
					<span class="pull-right text-muted small"><em>update{if $calendar_lastupdate gt 0} {$calendar_lastupdate} day ago {else} today {/if}</em>
					</span>
				</a>				
			</div><!-- /.list-group -->			
		</div><!-- /.panel-body -->
	</div><!-- .panel panel-default-->
</div><!-- /.col-lg-4 (nested) -->