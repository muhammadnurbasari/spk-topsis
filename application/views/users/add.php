
<form action="<?= base_url(); ?>manage/users/add" method="post" id="form">
  <!-- alert -->
  <div class="alert-add"></div>
  
  <div class="form-group">
    <label for="username">Username <small class="text-danger">*required</small></label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="userName" autocomplete="off">
  </div>
  <div class="form-group">
    <label for="password">Password <small class="text-danger">*required</small></label>
    <input type="text" class="form-control" id="password" name="password" aria-describedby="password" autocomplete="off">
  </div>
  <div class="form-group">
    <label for="role">Role <small class="text-danger">*required</small></label>
    <select name="role" id="role" class="form-control">
      <option value="" disabled selected>Pilih !!</option>
      <option value="1">Admin</option>
      <option value="2">Manager</option>
    </select>
  </div>
  <button type="button" class="btn btn-primary btn-lg" id="btnSave">SAVE</button>
</form>
