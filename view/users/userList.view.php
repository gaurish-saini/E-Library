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
						<th></th>
					</tr>
				</thead>
				<tbody >
				<?php foreach($admin_list as $index=>$admin){	?>
					<tr>
						<td><?=++$index?></td>
						<td><?=$admin['user_name']?></td>
						<td><?=$admin['email_id']?></td>
						<td class="center"><a href='#deleteUser' data-target="deleteUser<?php echo $admin['uid']; ?>" class="modal-trigger indigo-text"><i class="material-icons icon-margin">delete</i></a></td>
					</tr>
					<div id="deleteUser<?php echo $admin['uid']; ?>" class="modal modal-del">
						<div class="modal-content">
						<h6>Are you sure ?<i class="right material-icons modal-close">close</i></h6></br>
						<p>You want to delete "<?=$admin['user_name'] ?>" and his details.</p>
						</div>
						<div class="modal-footer">
							<form class="right searchBar" style="padding: 4px;" action="/delusr" method="POST">
								<input type="submit" value="Agree" class="btn white-text indigo z-depth-0">
								<input type="hidden" name="uid" value="<?=$admin['uid']?>">
							</form>
						</div>
					</div>
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
						<th></th>
					</tr>
				</thead>
				<tbody >
				<?php foreach($reader_list as $index=>$reader){ ?>
					<tr>
						<td><?=++$index?></td>
						<td><?=$reader['user_name']?></td>
						<td><?=$reader['email_id']?></td>
						<td class="center"><a href='#deleteUser' data-target="deleteUser<?php echo $reader['uid']; ?>" class="modal-trigger indigo-text"><i class="material-icons icon-margin">delete</i></a></td>
					</tr>
					<div id="deleteUser<?php echo $reader['uid']; ?>" class="modal modal-del">
						<div class="modal-content">
						<h6>Are you sure ?<i class="right material-icons modal-close">close</i></h6></br>
						<p>You want to delete "<?=$reader['user_name'] ?>" and his details.</p>
						</div>
						<div class="modal-footer">
							<form class="right searchBar" style="padding: 4px;" action="/delusr" method="POST">
								<input type="submit" value="Agree" class="btn white-text indigo z-depth-0">
								<input type="hidden" name="uid" value="<?=$reader['uid']?>">
							</form>
						</div>
					</div>
				<?php } ?>
				</tbody>
			</table>
		</div>
</div>
