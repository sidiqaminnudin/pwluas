<?php if(isset($ok)):?><div class="alert alert-info"><?php echo $ok?></div><?php endif;?>
<?php if(isset($error)):?><div class="alert alert-danger"><?php echo $error?></div><?php endif;?>
<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
  <label for="company">Company:</label>
  <input type="text" class="form-control" value="<?php echo $company['name']?>" name="company">
</div>

<a href="<?php echo site_url()?>" class="btn btn-warning">Kembali</a>
<button id="save" class="btn btn-info">Simpan</button>
</form>