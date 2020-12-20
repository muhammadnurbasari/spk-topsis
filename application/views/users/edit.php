
<form action="<?= base_url(); ?>manage/users/edit" method="post" id="form">
  <!-- alert -->
  <div class="alert-edit"></div>
  
  <div class="form-group">
    <input type="hidden" class="form-control" name="id" value="<?php echo $users->users_id; ?>">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="userName" value="<?php echo $users->username; ?>" autocomplete="off">
  </div>
  <button type="button" class="btn btn-primary btn-lg" id="btnEdit">UPDATE</button>
</form>
