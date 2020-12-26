
<form action="<?= base_url(); ?>manage/criterias/add" method="post" id="form">
  <!-- alert -->
  <div class="alert-add"></div>
  
  <div class="form-group">
    <label for="criterias_name">Nama Kriteria <small class="text-danger">*required</small></label>
    <input type="text" class="form-control" id="criterias_name" name="criterias_name" aria-describedby="criterias_name" autocomplete="off">
  </div>
  <div class="form-group">
    <label for="criterias_attribute">Attribute Kriteria <small class="text-danger">*required</small></label>
    <select name="criterias_attribute" id="criterias_attribute" class="form-control">
        <option value="" selected disabled>pilih !!</option>
        <option value="1">Benefit</option>
        <option value="2">Cost</option>
    </select>
  </div>
  <div class="form-group">
    <label for="criterias_crips">Kepentingan Kriteria ( crips ) <small class="text-danger">*required</small></label>
    <select name="criterias_crips" id="criterias_crips" class="form-control">
        <option value="" selected disabled>pilih !!</option>
        <option value="1">Sangat Rendah ( nilai 1 )</option>
        <option value="2">Rendah ( nilai 2 )</option>
        <option value="3">Cukup ( nilai 3 )</option>
        <option value="4">Tinggi ( nilai 4 )</option>
        <option value="5">Sangat Tinggi ( nilai 5 )</option>
    </select>
  </div>
  <button type="button" class="btn btn-primary btn-lg" id="btnSave">SAVE</button>
</form>
