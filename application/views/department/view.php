<div class="row row-cards">
    <div class="col-lg-12">
        <div class="card mb-2 col-sm-20">
            <div class="card-body">
                <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('department/department_list'); ?>">
                            Home
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#"><?= $department->department_name; ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $department->department_name; ?></li>
                </ol>
            </div>
        </div>
        <?php if (userdata()) : ?>
        <?php if (userdata()->role != "member") : ?>
        <div class="card mb-3 col-sm-20">
            <div class="card-body">
                <div class="post-meta">
                <div class="row">
                <div class="col-sm-6">
                <div class="card">
                    <div class="card-header" style="background: #1C9AD6; color: #fff; text-align:center;">
                    <?= $department->department_name; ?> Dashboard
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($dashboard as $row) :
                        ?>
                    <li class="list-group-item"><?= $row->dashboard_slug; ?></li>
                    <?php endforeach ?>
                    </ul>
                    </div>
                    
                </div>
                
                <div class="col-sm-6">
                <div class="card">
                    <div class="card-header" style="background: #1C9AD6; color: #fff; text-align: center;">
                    <?= $department->department_name; ?> Data Control
                    </div>
                    <ul class="list-group list-group-flush">
                        
                        <li class="list-group-item"><?= $department->dashboard_slug; ?></li>
                        <!-- <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li> -->
                    </ul>
                    </div>
                    <?php endif; ?>
                </div>
                <?php else : ?>

            <div class="card mb-3 col-sm-20" style="text-align:center;">
            <div class="card-body">
                <div class="post-meta">
                <div class="row">
                <div class="col-sm-12">
                <div class="card">
                    <div class="card-header" style="background: #1C9AD6; color: #fff; text-align:center;">
                    <?= $department->department_name; ?> Dashboard
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    </div>
                </div>
                </div>
                <?php endif; ?>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>