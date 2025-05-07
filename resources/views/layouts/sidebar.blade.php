<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">

                {{-- Dashboard --}}
                <a class="nav-link" href="{{ '/' }}">
                    <div class="sb-nav-link-icon"><i class="bi bi-house"></i></div>
                    Dashboard
                </a>

                {{-- Kategori --}}
                <a class="nav-link" href="{{ '/kategori' }}">
                    <div class="sb-nav-link-icon"><i class="bi bi-clipboard-check"></i></div>
                    Kategori
                </a>

                {{-- Produk --}}
                <a class="nav-link" href="{{ '/produk' }}">
                    <div class="sb-nav-link-icon"><i class="bi bi-box2"></i></div>
                    Produk
                </a>

                {{-- Logout --}}
                <a class="nav-link" href="#"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">iSamvi Store</div>
            By: Suwendo
        </div>
    </nav>
</div>
