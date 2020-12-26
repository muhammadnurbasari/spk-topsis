
<form action="<?= base_url(); ?>manage/users/edit" method="post" id="form">
  <!-- alert -->
  <div class="alert-edit"></div>
  
  <div class="form-group">
    <input type="hidden" class="form-control" name="id" value="<?php echo $users->users_id; ?>">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="userName" value="<?php echo $users->username; ?>" autocomplete="off">
  </div>
  <div class="form-group">
    <label for="role">Role <small class="text-danger">*required</small></label>
    <select name="role" id="role" class="form-control">
    <?php
      $opt_1 = "";
      $opt_2 = "";
      
      // ternary
      $users->users_id == "1" ? $opt_1 = "selected" : $opt_2 = "selected";
    ?>
      <option value="" disabled>Pilih !!</option>
      <option value="1" <?= $opt_1;?>>Admin</option>
      <option value="2" <?= $opt_2;?>>Manager</option>
    </select>
  </div>
  <button type="button" class="btn btn-primary btn-lg" id="btnEdit">UPDATE</button>
</form>
