<div class="row">
	<div class="col-md-6">
		<a href="<?php echo site_url()?>/data/addCompany" class="btn btn-success">Add City</a>
	</div>
</div>	

<?php if(isset($ok)):?><div class="alert alert-info"><?php echo $ok?></div><?php endif;?>
<?php if(isset($error)):?><div class="alert alert-danger"><?php echo $error?></div><?php endif;?>

<table class="table table-striped">
	<thead>
		<tr>
			<th>No</th>
			<th>City Name</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1?>
		<?php foreach($allCompany as $d):?>
		<tr>
			<td><?php echo $no?></td>
			<td><?php echo $d['name']?></td>
			<td><a href="<?php echo site_url()?>/data/editCompany/<?php echo $d['idcompany']?>" class='btn btn-warning'>Edit</a></td>
			<td><a href="<?php echo site_url()?>/data/delCompany/<?php echo $d['idcompany']?>" class='btn btn-danger'>Delete</a></td>
			<?php $no++?>
		</tr>
		<?php endforeach;?>	
	</tbody>
</table>
<a href="<?php echo site_url()?>" class="btn btn-warning">Kembali</