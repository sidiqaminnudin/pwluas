<?php if(isset($ok)):?><div class="alert alert-info"><?php echo $ok?></div><?php endif;?>
<?php if(isset($error)):?><div class="alert alert-danger"><?php echo $error?></div><?php endif;?>
<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
  <label for="name">Name:</label>
  <input type="text" class="form-control" value="<?php echo $member['fullname']?>" name="fullname">
</div>
<div class="form-group">
  <label for="email">Email:</label>
  <input type="email" class="form-control" value="<?php echo $member['email']?>" name="email">
</div>
<div class="form-group">
  <label for="company">Company:</label>
  <select class="form-control">
    <option selected="selected" value=""/>
    <?php 
    foreach($company as $row)
    { 
      echo '<option value="'.$row->name.'">'.$row->name.'</option>';
    }
    ?>
  </select>
</div>
<div class="form-group">
  <label for="address">Address:</label>
  <input type="text" class="form-control" value="<?php echo $member['address']?>" name="address">
</div>
<div class="form-group">
  <label for="city">City:</label>
  <select class="form-control">
    <option selected="selected" value=""/>
    <?php 
    foreach($city as $row)
    { 
      echo '<option value="'.$row->cityname.'">'.$row->cityname.','.$row->country.'</option>';
    }
    ?>
  </select>
</div>
<div class="form-group">
  <label for="country">Foto:</label>
  <input type="file" class="form-control" value="" name="foto">
</div>
<a href="<?php echo site_url()?>" class="btn btn-warning">Kembali</a>
<button id="save" class="btn btn-info">Simpan</button>
</form>