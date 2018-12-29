<table class="table table-striped">
	<tbody>
		<tr>
			<?php if($member['foto']!=null):?>
				<img src="<?= base_url(); ?>uploads/<?php echo $member['foto']?>" width="100"/>
				<?php endif?>
		</tr>
		<tr>
			<td>Email</td>
			<td><?php echo $member['email']?></td>
		</tr>
		<tr>
			<td>Company</td>
			<td><?php echo $member['name']?></td>
		</tr>
		<tr>
			<td>address</td>
			<td><?php echo $member['address']?></td>
		</tr>
		<tr>
			<td>City</td>
			<td><?php echo $member['cityname']?></td>
		</tr>
		<tr>
			<td>Country</td>
			<td><?php echo $member['country']?></td>
		</tr>
	</tbody>
</table>
<a href="<?php echo site_url()?>" class="btn btn-warning">Kembali</a>