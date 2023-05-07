<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title><?= $title; ?></title>
    <!-- CSS files -->
    <link href="<?= base_url(); ?>assets/dist/libs/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/dist/css/tabler.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/dist/css/tabler-flags.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/dist/css/tabler-payments.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/dist/css/tabler-vendors.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/dist/css/demo.min.css" rel="stylesheet" />
    <style>
        body {
            display: none;
        }
    </style>
</head>

<body class="antialiased">
    <div class="page">
        <header class="navbar navbar-expand-md navbar-light d-print-none">
            <div class="container-xl">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a href="<?= base_url(); ?>" class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pr-0 pr-md-3">
                    <!-- <img src="<?= base_url(); ?>assets/static/logo.svg" width="110" height="32" alt="Tabler" class="navbar-brand-image"> -->
                    Cladtek Portal
                </a>
                <div class="navbar-nav flex-row order-md-last ml-md-4">
                    
                    <?php if (userdata()) : ?>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-toggle="dropdown">
                                <?php if (userdata()->avatar) : ?>
                                    <span class="avatar avatar-sm" style="background-image: url(<?= base_url('assets/dist/img/users/') . userdata()->avatar ?>)"></span>
                                <?php else : ?>
                                    <span class="avatar avatar-sm bg-blue-lt"><?= user_initial(userdata()->fullname); ?></span>
                                <?php endif; ?>
                                <div class="d-none d-xl-block pl-2">
                                    <div><?= userdata()->fullname; ?></div>
                                    <div class="mt-1 small text-muted text-capitalize"><?= userdata()->role; ?></div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <?php if (userdata()->role != "member") : ?>
                                    <a href="<?= base_url('dashboard'); ?>" class="dropdown-item">Dashboard</a>
                                    <div class="dropdown-divider"></div>
                                <?php endif; ?>
                                <a href="<?= base_url('configuration/account') ?>" class="dropdown-item">My Account</a>
                                <a href="<?= base_url('signout'); ?>" class="dropdown-item">Sign Out</a>
                            </div>
                        </div>
                    <?php else : ?>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('signin') ?>">
                                    <span class="nav-link-title">
                                        Sign In
                                    </span>
                                </a>
                            </li>
                        </ul>
                    <?php endif; ?>
                </div>
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url() ?>">
                                    <span class="nav-link-title">
                                        Home
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#navbar-extra" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <span class="nav-link-title">
                                        Department
                                    </span>
                                </a>
                                <div class="dropdown-menu">
                                    <?php foreach (get_department() as $department) : ?>
                                        <a class="dropdown-item" href="<?= base_url('department/index') . '?department=' . $department->department_id . '&search=' ?>">
                                            <?= $department->department_name; ?>
                                        </a>
                                    <?php endforeach; ?>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= base_url() ?>">
                                        Show All
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('department/department_list') ?>">
                                    <span class="nav-link-title">
                                        Department List
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <div class="content">
            <div class="container-xl">