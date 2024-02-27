<!-- Sidebar Start -->
<aside class="left-sidebar">
      <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="./index.html" class="text-nowrap logo-img">
            <img src="../assets/images/logos/download.png" width="100" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
            </div>
        </div>
    <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
            <li class="sidebar-item">
                <a class="sidebar-link" href="index.php?module=distributor&action=index" aria-expanded="false">
                <span>
                <i class="bi bi-person"></i>
                </span>
                <span class="hide-menu">Distributor</span>
                </a>
                <li class="sidebar-item">
                <a class="sidebar-link <?= !isset($_GET['module']) ? 'active' : '' ?>" href="index.php?module=kasir&action=index" aria-expanded="false">
                <span>
                <i class="bi bi-shop-window"></i>
                </span>
                <span class="hide-menu">Kasir</span>
                </a>
                </li>
                <li class="sidebar-item">
                <a class="sidebar-link" href="index.php?module=buku&action=index" aria-expanded="false">
                <span>
                <i class="bi bi-book"></i>
                </span>
                <span class="hide-menu">Buku</span>
                </a>
                </li>
               <li class="sidebar-item">
                <a class="sidebar-link" href="index.php?module=pasok&action=index" aria-expanded="false">
                <span>
                <i class="bi bi-box-seam"></i>
                </span>
                <span class="hide-menu">Pasok</span>
                </a>      
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="index.php?module=penjualan&action=index" aria-expanded="false">
                <span>
                <i class="bi bi-cart3"></i>
                </span>
                <span class="hide-menu">Penjualan</span>
                </a>    
            </li>
            </ul>
            
        </nav>
    </div>
</aside>