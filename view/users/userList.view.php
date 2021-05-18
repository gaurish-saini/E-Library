<div class="container grey lighten-4">
		<ul id="tabs-swipe" class="tabs row tab-color s12 center">
					<li class="tab col s6"><a href="#admin">List of Admins</a></li>
					<li class="tab col s6"><a href="#reader">List of Readers</a></li>
				</ul>
				<div id="admin" class="s6">
					<table class="highlight">
						<thead>
						<tr>
							<th>Username</th>
							<th class="center"><a href="addadmin.php"><i class="material-icons black-text">add</i></a></th>
						</tr>
						</thead>
						<tbody>
						<?php foreach( $admin_list as $admin_list ){ ?>
							<tr>
								<td><?=$admin_list['username'])?></td>
								<?php if($admin_list['username'] != $login_session ): ?>
									<td class="center"><i class="material-icons icon-margin">delete</i></td>
									<td></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div id="reader" class="s6">
					<table class="highlight">
						<thead>
						<tr>
							<th>Username</th>
							<th class="center"><i class="material-icons">add</i></th>
						</tr>
						</thead>
						<tbody>
						<?php foreach( $reader_list as $reader_list ){ ?>
							<tr>
								<td><?php echo htmlspecialchars($reader_list['username']); ?></td>
								<td class="center">
									<i class="material-icons icon-margin">delete</i>
									<i class="material-icons">edit</i>
								</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
	</div>