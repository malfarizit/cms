<div class="row">
<?php foreach ($dash as $dashboard) :
?>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><?= $dashboard->department_name; ?></h5>
        <p class="card-text"><?= $dashboard->department_desc; ?></p>
        <a href="<?= base_url('department/view/') . $dashboard->department_slug; ?>" class="btn btn-primary">Detail</a>
      </div>
    </div>
  </div>
  <?php endforeach ?>
</div>
