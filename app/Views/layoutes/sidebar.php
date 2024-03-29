        <!-- Sidebar -->
        <style>
            #accorditionSidebar {
                position: fixed;
            }
        </style>
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="logo"><img class="logo" src="<?= base_url('img/logo.png'); ?>" alt=""></i>
                    <style>
                        .logo {
                            width: 60px;
                            height: 60px;
                        }
                    </style>
                </div>
                <div class="sidebar-brand-text mx-3">SumutLARIS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <?php if (in_groups('admin')) : ?>
                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="/">
                        <i class="fas fa-home"></i>
                        <span>Home</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/TransaksiV">
                        <i class="fas fa-coins"></i>
                        <span>Transaksi</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/listUser">
                        <i class="fas fa-users"></i>
                        <span>Users</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url(); ?>/admin/Produk/tabelproduk">
                        <i class="fas fa-table"></i>
                        <span>Daftar Produk</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    User Profile
                </div>
            <?php endif; ?>
            <?php if (in_groups('user')) : ?>
                <li class="nav-item">
                    <a class="nav-link active" href="<?= base_url(); ?>">
                        <i class="fas fa-home"></i>
                        <span>Home</span></a>
                </li>
                <div class="sidebar-heading">
                    User Profile
                </div>
            <?php endif; ?>
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <?php
                $userModel = model(UserModel::class);
                $user = $userModel->profile();
                ?>
                <a class="nav-link " href="<?= base_url(); ?>Admin/user/profile/<?= $user->id; ?>">
                    <i class="fas fa-user"></i>
                    <span>My Profile</span></a>
                <?php if (in_groups('admin')) : ?>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/HalamanProduk">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Halaman Produk</span></a>
            </li>
        <?php endif; ?>
        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>/user/editprofil/<?= $user->id; ?>">
                <i class="fas fa-user-edit"></i>
                <span>Edit Profile</span></a>
        </li>
        <li class="nav-item">
            <?php
            $userModel = model(UserModel::class);
            $user = $userModel->profile();
            ?>
            <a class="nav-link" href="<?= base_url('Transaksi/Pesanan/' . $user->id); ?>">
                <i class="fas fa-envelope"></i>
                <span>Pesananmu</span>
            </a>
            <a class="nav-link" href="<?= base_url('Keranjang/Produk/' . $user->id); ?>">
                <i class="fas fa-cart-plus"></i>
                <span>Keranjang</span>
            </a>


        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('logout'); ?>">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

        </ul>
        <!-- End of Sidebar -->