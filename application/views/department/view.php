<div class="row row-cards">
    <div class="col-lg-8">
        <div class="card mb-2 col-sm-20">
            <div class="card-body">
                <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url(); ?>">
                            Home
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#"><?= $department->department_name; ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $department->department_name; ?></li>
                </ol>
            </div>
        </div>
        <div class="card mb-3 col-sm-20">
            <div class="card-body">
                <div class="post-meta">
                <div class="row">
                <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                    <?= $department->department_name; ?> Dashboard
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                    <?= $department->department_name; ?> Data Control
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    </div>
                </div
                </div>
                </div>
            </div>
        </div>
    </div>
</div>