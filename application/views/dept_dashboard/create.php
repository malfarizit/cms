<?= form_open_multipart(); ?>
<div class="text-right mb-3">
    <a href="<?= base_url('dept_dashboard/'); ?>" class="btn btn-default">
        <i class="fa fa-arrow-left"></i> Back
    </a>
    <button type="submit" class="btn btn-primary">
        <i class="fa fa-save"></i> Save
    </button>
</div>
<div class="row">
    <div class="col-md-8 order-last order-md-first">
        <div class="card card-outline card-primary shadow-sm">
            <div class="card-header">
                <h3 class="card-title">Department Dashboard</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="dashboard_title">Dashboard Title</label>
                    <input id="dashboard_title" name="dashboard_title" class="form-control" type="text" placeholder="Dashboard Title..." value="<?= set_value('dashboard_title'); ?>" autocomplete="off">
                    <?= form_error('dashboard_title'); ?>
                </div>
                <div class="form-group">
                <label for="dashboard_link">Dashboard Link</label>
                <textarea id="dashboard_link" class="form-control" rows="2" name="dashboard_link" placeholder="Dashboard Link.."><?= set_value('dashboard_link'); ?></textarea>
                <?= form_error('dashboard_link'); ?>
                </div>
                <div class="form-group">
                <label for="dashboard_description">Dashboard Description</label>
                <textarea id="dashboard_description" class="form-control" rows="3" name="dashboard_description" placeholder="Dashboard Description.."><?= set_value('dashboard_description'); ?></textarea>
                <?= form_error('dashboard_description'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-outline card-primary shadow-sm">
            <div class="card-header">
                <h3 class="card-title">Department Info</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="department_id">Select department</label>
                    <select class="form-control" id="department_id" name="department_id" aria-label="Floating label select example">
                        <option value="">Select department</option>
                        <?php foreach ($department as $c) : ?>
                            <option value="<?= $c->department_id; ?>"><?= $c->department_name; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('department_id'); ?>
                </div>
                <div class="form-group">
                    <label class="form-label" for="date">Date</label>
                    <input class="form-control gijgo" value="<?= set_value('date', date('Y-m-d')); ?>" name="date" id="date" type="text" placeholder="Select a date" />
                    <?= form_error('date'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= form_close(); ?>