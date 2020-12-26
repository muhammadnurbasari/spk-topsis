
<form action="<?= base_url(); ?>manage/criterias/edit" method="post" id="form">
  <!-- alert -->
  <div class="alert-edit"></div>
  
  <div class="form-group">
    <input type="hidden" class="form-control" name="id" value="<?php echo $criterias->criterias_id; ?>">
    <label for="criterias_name">nama kriteria </label>
    <input type="text" class="form-control" id="criterias_name" name="criterias_name" aria-describedby="criterias_name" value="<?php echo $criterias->criterias_name; ?>" autocomplete="off">
  </div>
  <div class="form-group">
    <label for="criterias_attribute">Attribute Kriteria <small class="text-danger">*required</small></label>
    <select name="criterias_attribute" id="criterias_attribute" class="form-control">
    <?php 
        $opt_1 = "";
        $opt_2 = "";

        $criterias->criterias_attribute == "1" ? $opt_1 = "selected" : $opt_2 = "selected";
    ?>
        <option value="" selected disabled>pilih !!</option>
        <option value="1" <?= $opt_1?>>Benefit</option>
        <option value="2" <?= $opt_2?>>Cost</option>
    </select>
  </div>
  <div class="form-group">
    <label for="criterias_crips">Kepentingan Kriteria ( crips ) <small class="text-danger">*required</small></label>
    <select name="criterias_crips" id="criterias_crips" class="form-control">
    <?php 
        $opt_1 = "";
        $opt_2 = "";
        $opt_3 = "";
        $opt_4 = "";
        $opt_5 = "";

        if ($criterias->criterias_crips == "1") {
            $opt_1 = "selected";
        } elseif ($criterias->criterias_crips == "2") {
            $opt_2 = "selected";
        } elseif ($criterias->criterias_crips == "3"){
            $opt_3 = "selected";
        } elseif ($criterias->criterias_crips == "4") {
            $opt_4 = "selected";
        } elseif ($criterias->criterias_crips == "5") {
            $opt_5 = "selected";
        }
    ?>
        <option value="" selected disabled>pilih !!</option>
        <option value="1" <?= $opt_1; ?>>Sangat Rendah ( nilai 1 )</option>
        <option value="2" <?= $opt_2; ?>>Rendah ( nilai 2 )</option>
        <option value="3" <?= $opt_3; ?>>Cukup ( nilai 3 )</option>
        <option value="4" <?= $opt_4; ?>>Tinggi ( nilai 4 )</option>
        <option value="5" <?= $opt_5; ?>>Sangat Tinggi ( nilai 5 )</option>
    </select>
  </div>
  <button type="button" class="btn btn-primary btn-lg" id="btnEdit">UPDATE</button>
</form>
