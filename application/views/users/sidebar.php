<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('user/index'); ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-money-bill-alt"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Money Survival</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Heading -->
            <div class="sidebar-heading">
                Finance
            </div>

            <!-- Nav Item - Home -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('user/index'); ?>">
                    <i class="fas fa-home"></i>
                    <span>Home</span></a>
            </li>

            <!-- Nav Item - My Wallet Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-wallet"></i>
                    <span>My Wallet</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Menu:</h6>
                        <a class="collapse-item" href="<?= base_url('KontrolPengeluaran/harian'); ?>">Pengeluaran Harian</a>
                        <a class="collapse-item" href="<?= base_url('KontrolPengeluaran/rutin'); ?>">Pengeluaran Rutin</a>
                        <a class="collapse-item" href="<?= base_url('KontrolPemasukan/harian'); ?>">Pemasukan Harian</a>
                        <a class="collapse-item" href="<?= base_url('KontrolPemasukan/rutin'); ?>">Pemasukan Rutin</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Debt(Hutang) -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('KontrolHutang'); ?>">
                    <i class="fas fa-comments-dollar"></i>
                    <span>Debt</span></a>
            </li>

            <!-- Nav Item - Keuangan Berkelompok -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('KontrolBersama'); ?>">
                    <i class="fas fa-users"></i>
                    <span>Group Finance</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Profile
            </div>

            <!-- Nav Item - My Profile -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('user/viewprofile'); ?>">
                    <i class="far fa-user"></i>
                    <span>My Profile</span></a>
            </li>

            <!-- Nav Item - My Profile -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('user/editprofile'); ?>">
                    <i class="fas fa-user-edit"></i>
                    <span>Edit Profile</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->