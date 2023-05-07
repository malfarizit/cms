<?= $this->session->flashdata('msg'); ?>
<div class="card card-outline card-primary">
    <div class="card-header">
        <h5 class="card-title">List <?= $title; ?></h5>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            <a href="<?= base_url('dept_dashboard/create'); ?>" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> New Dashboard</a>
        </div>
    </div>
    <div class="card-body p-0 table-responsive">
        <table class="table table-striped datatable">
            <thead>
                <th>#</th>
                <th>Dashboard Title</th>
                <th>Dashboard Description</th>
                <th>Author</th>
                <th>Department</th>
                <th>Post Date</th>
                <th></th>
            </thead>
            <tbody>
                <?php
                $n = 1;
                foreach ($dashboard as $row) : ?>
                    <tr>
                        <td width="50"><?= $n++; ?>.</td>
                        <td width="100"><?= $row->dashboard_title; ?></td>
                        <td><?= $row->dashboard_description; ?></td>
                        <td width="150"><?= $row->fullname; ?></td>
                        <td width="150"><?= $row->department_name; ?></td>
                        <td width="150"><?= $row->date; ?></td>
                        <td width="100" class="text-right">
                            <div class="btn-group">
                                <a href="<?= base_url('dept_dashboard/view/') . $row->dashboard_slug; ?>" class="btn btn-default btn-sm" target="_blank"><i class="fa fa-eye"></i></a>
                                <!-- <a href="<?= base_url('post/edit/') . $row->post_id; ?>" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a> -->
                                <a href="<?= base_url('dept_dashboard/delete/') . $row->id; ?>" onclick="return confirm('Confirm Delete ?');" class="btn btn-default btn-sm"><i class="fa fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>