<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link " href="{{ route('admin.dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#create-account" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Accounts</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="create-account" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.personnes') }}">
                        <i class="bi bi-circle"></i><span>Create Account</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('comptes.index') }}">
                        <i class="bi bi-circle"></i><span>Accounts List</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#accountList" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Login History</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="accountList" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('login.history') }}">
                        <i class="bi bi-circle"></i><span>list of authenticated accounts</span>
                    </a>
                </li>
               
            </ul>
        </li><!-- End Components Nav -->
    </ul>
</aside><!-- End Sidebar -->
