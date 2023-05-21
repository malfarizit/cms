<div class="row row-cards">
    <div class="col-lg-12">
        <div class="card mb-2 col-sm-20">
            <div class="card-body">
                <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('department/department_dashboard'); ?>">
                            Home
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                </ol>
            </div>
        </div>
        <div class="card mb-3 col-sm-20">
        <div id="reportContainer" class="dds__d-none" style="height:804px; overflow-y:hidden">
        <?= $department['dashboard_slug']; ?>
    <iframe id="reportFrame" onload="powerBiLoaded()" frameborder="0" seamless="seamless" class="viewer pbi-frame" style=" width: 100%; height: 840px;" src="">
    </iframe>
</div>
        </div>
    </div>
</div>