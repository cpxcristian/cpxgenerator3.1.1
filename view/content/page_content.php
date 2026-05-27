<?php
	function topmenuContent() {
		$result = '';
		
		$result .= '
			<!-- Top Menu Items -->
			<ul class="nav navbar-right top-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
					<ul class="dropdown-menu message-dropdown">
						<li class="message-preview">
							<a href="#">
								<div class="media">
									<span class="pull-left">
										<img class="media-object" src="http://placehold.it/50x50" alt="">
									</span>
									<div class="media-body">
										<h5 class="media-heading"><strong>John Smith</strong>
										</h5>
										<p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
										<p>Lorem ipsum dolor sit amet, consectetur...</p>
									</div>
								</div>
							</a>
						</li>
						<li class="message-preview">
							<a href="#">
								<div class="media">
									<span class="pull-left">
										<img class="media-object" src="http://placehold.it/50x50" alt="">
									</span>
									<div class="media-body">
										<h5 class="media-heading"><strong>John Smith</strong>
										</h5>
										<p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
										<p>Lorem ipsum dolor sit amet, consectetur...</p>
									</div>
								</div>
							</a>
						</li>
						<li class="message-preview">
							<a href="#">
								<div class="media">
									<span class="pull-left">
										<img class="media-object" src="http://placehold.it/50x50" alt="">
									</span>
									<div class="media-body">
										<h5 class="media-heading"><strong>John Smith</strong>
										</h5>
										<p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
										<p>Lorem ipsum dolor sit amet, consectetur...</p>
									</div>
								</div>
							</a>
						</li>
						<li class="message-footer">
							<a href="#">Read All New Messages</a>
						</li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
					<ul class="dropdown-menu alert-dropdown">
						<li>
							<a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
						</li>
						<li>
							<a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
						</li>
						<li>
							<a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
						</li>
						<li>
							<a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
						</li>
						<li>
							<a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
						</li>
						<li>
							<a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="#">View All</a>
						</li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li>
							<a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
						</li>
						<li>
							<a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
						</li>
						<li>
							<a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
						</li>
					</ul>
				</li>
			</ul>
		';
		
		return $result;
	}

	function sidebarContent($param) {
		$result = '';
		
		$result .= '
			<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav side-nav">';
				foreach($param as $currentDB) {
					$result .= '
					<li>
						<a href="#" onclick="getTableList(\''.$currentDB["Database"].'\')">
							<i class="fa fa-fw fa-wrench"></i> '.$currentDB["Database"].'
						</a>
					</li>
					';
				}
		$result .= '
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		';
		
		return $result;
	}

	function showTableListContent($param, $database) {
		//var_dump($param);
		$result = '';
		
		$result .= '
		<div class="row">
			<form name="tableList">
			<div class="col-lg-12">
				<h1 class="page-header">
					'.$database.'
				</h1>
			</div>
			<input type="hidden" name="database" class="database" value="'.$database.'" />
			<div class="col-lg-8 col-lg-offset-1">
				<div class="col-lg-12">
					<a href="#" onclick="exportSelectedTables()">Exportar</a>
				</div>
				<div class="col-lg-12">
					<div class="col-lg-2 text-right">
						<label>Nombre del módulo</label>
					</div>
					<div class="col-lg-4">
						<input type="text" name="modulename" class="form-control modulename" value="selling" />
					</div>
				</div>
				<div class="col-lg-12 table-responsive">
					<table class="table table-hover tableList">
						<thead>
							<tr>
								<th><input type="checkbox" class="form-control select-all" onclick="selectAllTables()" /></th>
								<th>Nombre</th>
							</tr>
						</thead>
						<tbody>';
						foreach($param as $currentTable) {
							$result .= '
							<tr>
								<td>
									<input type="checkbox" id="'.$currentTable[0].'" name="tables[]" class="form-control '.$currentTable[0].'" value="'.$currentTable[0].'" />
								</td>
								<td>
									<label for="'.$currentTable[0].'">'.$currentTable[0].'</label>
								</td>
							</tr>
							';
						}
		$result .= '
						</tbody>
					</table>
				</div>
				<div class="col-lg-12">
					<a onclick="exportSelectedTables()">Exportar</a>
				</div>
			</div>
			</form>
		</div>
		<!-- /.row -->
		';
		
		return $result;
	}

?>
