<div class="container grey lighten-4" style="margin-top: 30px;">
	<ul id="tabs-swipe" class="tabs row tab-color s12 center">
		<li class="tab col s6"><a href="#admin">List of Admins</a></li>
		<li class="tab col s6"><a href="#reader">List of Readers</a></li>
	</ul>
	<?php
	while($total1=mysqli_fetch_assoc($total_users)){
	?>
	<div id="admin" class="s6">
		<?php 
		$i=0;
		if($total1['type']=='0'){
		?>
			<table class="highlight">
				<thead>
					<tr>
						<th>S.No</th>
						<th>Username</th>
						<th>e-Mail</th>
						<th class="center"><a href="addadmin.php"><i class="material-icons black-text">add</i></a></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?=++$i?></td>
						<td><?=$total1['user_name']?></td>
						<td><?=$total1['email_id']?></td>
						<td class="center"><i class="material-icons icon-margin">delete</i></td>
						<td></td>
					</tr>
				</tbody>
			</table>
		<?php } ?>
	</div>
		<?php 
		$j=0;
		if($total1['type']=='1'){
		?>
		<div id="reader" class="s6">
			<table class="highlight">
				<thead>
					<tr>
						<th>S.No</th>
						<th>Username</th>
						<th>e-Mail</th>
						<th class="center"><a href="addadmin.php"><i class="material-icons black-text">add</i></a></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?=++$j?></td>
						<td><?=$total1['user_name']?></td>
						<td><?=$total1['email_id']?></td>
						<td class="center"><i class="material-icons icon-margin">delete</i></td>
						<td></td>
					</tr>
				</tbody>
			</table>
		</div>
		<?php } ?>
	<?php } ?>
</div>