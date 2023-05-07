<?= $this->session->flashdata('msg'); ?>
<div class="row">
    <div class="col-md-3 mb-4">
        <?= form_open('', '', ['department_id' => '']); ?>
        <div class="card card-outline card-primary shadow-sm">
            <div class="card-header">
                <h3 class="card-title" id="form-title">New Department</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="department_name" class="form-label required">Department</label>
                    <input value="<?= set_value('department_name'); ?>" type="text" name="department_name" id="department_name" class="form-control" placeholder="department Name...">
                    <?= form_error('department_name'); ?>
                </div>
                <div class="mb-3">
                    <label for="department_desc" class="form-label">Description</label>
                    <textarea name="department_desc" id="department_desc" rows="3" class="form-control" placeholder="department Description..."><?= set_value('department_desc'); ?></textarea>
                    <?= form_error('department_desc'); ?>
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="reset" id="btn-cancel" class="btn btn-secondary">Clear</button>
                <button type="submit" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 12l5 5l10 -10" /></svg>
                    Save
                </button>
            </div>
        </div>
        <?= form_close(); ?>
    </div>
    <div class="col-md-9">
        <div class="card card-outline card-primary shadow-sm">
            <div class="card-header">
                <h3 class="card-title">Post Content</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <div class="card-body p-0 table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Department</th>
                            <th>Description</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $n = 1;
                        if ($department) :
                            foreach ($department as $row) :
                        ?>
                                <tr>
                                    <td><?= $n++; ?>.</td>
                                    <td><?= $row->department_name; ?></td>
                                    <td><?= $row->department_desc; ?></td>
                                    <td class="text-right" width="180">
                                        <div class="btn-group">
                                            <button type="button" data-id="<?= $row->department_id ?>" data-name="<?= $row->department_name ?>" data-desc="<?= $row->department_desc ?>" class="btn btn-default btn-sm btn-edit"><i class="fa fa-edit"></i> Edit</button>
                                            <a href="<?= base_url('department/delete/') . $row->department_id; ?>" onclick="return confirm('Yakin ingin hapus ?');" class="btn btn-default btn-sm"><i class="fa fa-trash"></i> Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td class="text-center" colspan="4">No Data</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('body').on('click', '.btn-edit', function() {
            let id = $(this).data('id'),
                name = $(this).data('name'),
                desc = $(this).data('desc');

            $('#form-title').text('Edit department - ID#' + id);
            $('[name=department_id]').val(id);
            $('#department_name').val(name).select();
            $('#department_desc').val(desc);

            document.querySelector('#form-title').scrollIntoView({
                behavior: 'smooth'
            });
        });

        $('body').on('click', '#btn-cancel', function() {
            $('#form-title').text('New department');
            $('[name=department_id]').val('');
            $('#department_name').val('').select();
            $('#department_desc').val('');
        });
    });
</script>