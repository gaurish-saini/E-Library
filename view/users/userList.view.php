<div class="container grey lighten-4" style="margin-top: 30px;">
	<ul id="tabs-swipe" class="tabs row tab-color s12 center">
		<li class="tab col s6"><a href="#adminList">List of Admins</a></li>
		<li class="tab col s6"><a href="#readerList">List of Readers</a></li>
	</ul>
	<?php
	$admin_list = [];
	$reader_list = [];
	while($user_detail=mysqli_fetch_assoc($total_users)){
		if($user_detail['type']=='0'){
			$admin_list[]= $user_detail;
		}
		elseif($user_detail['type']=='1'){
			$reader_list[]= $user_detail;
		}
	}
		?>
		<div id="adminList" class="s6">
			<table class="highlight">
				<thead>
					<tr>
						<th>S.No</th>
						<th>Username</th>
						<th>e-Mail</th>
					</tr>
				</thead>
				<tbody >
				<?php foreach($admin_list as $index=>$admin){	?>
					<tr>
						<td><?=++$index?></td>
						<td><?=$admin['user_name']?></td>
						<td><?=$admin['email_id']?></td>
						<td class="center"><i class="material-icons icon-margin">delete</i></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
		<div id="readerList" class="s6">
			<table class="highlight">
				<thead>
					<tr>
						<th>S.No</th>
						<th>Username</th>
						<th>e-Mail</th>
					</tr>
				</thead>
				<tbody >
				<?php foreach($reader_list as $index=>$reader){ ?>
					<tr>
						<td><?=++$index?></td>
						<td><?=$reader['user_name']?></td>
						<td><?=$reader['email_id']?></td>
						<td class="center"><i class="material-icons icon-margin">delete</i></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
</div>
