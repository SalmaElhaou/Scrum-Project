<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('admin.dashboard') }}" class="logo d-flex align-items-center">
           
            <span class="d-none d-lg-block">SEDEV.</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="query" placeholder="Search" title="Enter search keyword">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item dropdown pe-3">
                <button class="btn btn-warning d-flex align-items-center" id="logoutButton">
                    <span class="d-none d-md-block">{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</span>
                    <i class="bi bi-box-arrow-right ms-2"></i>
                </button>
            </li>
        </ul>
    </nav>
    
    <!-- Formulaire de logout caché -->
    <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    
    <script>
        document.getElementById('logoutButton').addEventListener('click', function() {
            document.getElementById('logoutForm').submit();
        });
    </script>
    
</header><!-- End Header -->
