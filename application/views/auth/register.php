<?= $this->session->flashdata('msg'); ?>
<div class="row">
    <div class="col-md-3 mb-4">
        <?= form_open('', '', ['user_id' => '']); ?>
        <div class="card card-outline card-primary shadow-sm">
            <div class="card-header">
                <h3 class="card-title" id="form-title">New User</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <div class="card-body">
                <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input value="<?= set_value('fullname'); ?>" name="fullname" type="text" class="form-control" placeholder="Enter Your Full Name">
                        <?= form_error('fullname'); ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input value="<?= set_value('username'); ?>" name="username" type="text" class="form-control" placeholder="Enter Username">
                        <?= form_error('username'); ?>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Password</label>
                        <div class="input-group input-group-flat">
                            <input name="password" type="password" class="form-control" placeholder="Password" autocomplete="off">
                            <span class="input-group-text">
                                <a href="#" class="link-secondary" title="Show password" data-toggle="tooltip"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <circle cx="12" cy="12" r="2" />
                                        <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
                                </a>
                            </span>
                        </div>
                        <?= form_error('password'); ?>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Confirm Password</label>
                        <div class="input-group input-group-flat">
                            <input name="password2" type="password" class="form-control" placeholder="Confirm Password" autocomplete="off">
                            <span class="input-group-text">
                                <a href="#" class="link-secondary" title="Show password" data-toggle="tooltip"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <circle cx="12" cy="12" r="2" />
                                        <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
                                </a>
                            </span>
                        </div>
                        <?= form_error('password2'); ?>
                    </div>
                    <div class="mb-2">
                    <label for="role">Select Role</label>
                        <select class="form-control" id="role" name="role" aria-label="Floating label select example">
                            <option value="">Select Role</option>
                                <option value="admin">Admin</option>
                                <option value="member">Member</option>
                        </select>
                        <?= form_error('role'); ?>
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
                            <th>Username</th>
                            <th>Full Name</th>
                            <th>Role</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $n = 1;
                        if ($users) :
                            foreach ($users as $row) :
                        ?>
                                <tr>
                                    <td><?= $n++; ?>.</td>
                                    <td><?= $row->username; ?></td>
                                    <td><?= $row->fullname; ?></td>
                                    <td><?= $row->role; ?></td>
                                    <td class="text-right" width="180">
                                        <div class="btn-group">
                                            <button type="button" data-id="<?= $row->user_id ?>" data-username="<?= $row->username ?>" data-password="<?= $row->password ?>" class="btn btn-default btn-sm btn-edit"><i class="fa fa-edit"></i> Edit</button>
                                            <a href="<?= base_url('auth/delete/') . $row->user_id; ?>" onclick="return confirm('Yakin ingin hapus ?');" class="btn btn-default btn-sm"><i class="fa fa-trash"></i> Delete</a>
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
                username = $(this).data('usernamename'),
                password = $(this).data('password');
                role = $(this).data('role');

            $('#form-title').text('Edit User - ID#' + id);
            $('[name=user_id]').val(id);
            $('#fullname').val(username).select();
            $('#username').val(username);
            $('#password').val(password);
            $('#role').val(role);

            document.querySelector('#form-title').scrollIntoView({
                behavior: 'smooth'
            });
        });

        $('body').on('click', '#btn-cancel', function() {
            $('#form-title').text('New department');
            $('[name=user_id]').val('');
            $('#fullname').val('').select();
            $('#username').val('');
            $('#password').val('');
            $('#role').val('');
        });
    });
</script>