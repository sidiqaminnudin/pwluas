<div class="row">
	<div class="col-md-6">
		<a href="<?php echo site_url()?>/data/addCity" class="btn btn-success">Add City</a>
	</div>
</div>	

<?php if(isset($ok)):?><div class="alert alert-info"><?php echo $ok?></div><?php endif;?>
<?php if(isset($error)):?><div class="alert alert-danger"><?php echo $error?></div><?php endif;?>

<table class="table table-striped">
	<thead>
		<tr>
			<th>No</th>
			<th>City Name</th>
			<th>Country</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1?>
		<?php foreach($allCity as $d):?>
		<tr>
			<td><?php echo $no?></td>
			<td><?php echo $d['cityname']?></td>
			<td><?php echo $d['country'] ?></td>
			<td><a href="<?php echo site_url()?>/data/editCity/<?php echo $d['idcity']?>" class='btn btn-warning'>Edit</a></td>
			<td><a href="<?php echo site_url()?>/data/delCity/<?php echo $d['idcity']?>" class='btn btn-danger'>Delete</a></td>
			<?php $no++?>
		</tr>
		<?php endforeach;?>	
	</tbody>
</table>
<a href="<?php echo site_url()?>" class="btn btn-warning">Kembali</