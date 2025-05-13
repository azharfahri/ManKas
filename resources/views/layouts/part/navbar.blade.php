<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    data-scroll="false">
    <div class="container-fluid py-1 px-3">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Halaman</a></li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">Beranda</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">Beranda</h6>
        </nav>

        <!-- Navbar Right -->
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <ul class="navbar-nav justify-content-end w-100">

                <li class="nav-item dropdown pe-2 d-flex align-items-center ms-auto">
                    <a href="#" class="nav-link text-white p-0" id="dropdownUser" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa fa-user me-sm-1 text-white"></i>
                        <span class="d-sm-inline d-none">{{ Auth::user()->name }}</span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end mt-3 py-2 px-3 shadow z-index-5 border-radius-xl bg-white"
                        aria-labelledby="dropdownUser" style="min-width: 150px;">
                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md text-dark" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-sign-out-alt me-2 text-danger"></i>
                                    <span>Keluar</span>
                                </div>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>
