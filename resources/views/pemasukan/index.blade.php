<!--
=========================================================
* Argon Dashboard 3 - v2.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2024 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/jpg" href="{{ asset('admin/gambar/dana1.jpg') }}">
    <title>
        Dompetin (Laporan Keuangan Pribadi)
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.1.0" rel="stylesheet" />

    <link href="{{ asset('admin/css/argon-dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/argon-dashboard.css.map') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/argon-dashboard.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/nucleo-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/nucleo-svg.css') }}" rel="stylesheet">
</head>

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 bg-dark position-absolute w-100"></div>

    @include('layouts.part.sidebar')

    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
            data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white"
                                href="{{ route('home') }}">Halaman</a></li>
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Pemasukan</li>
                    </ol>
                    <h6 class="font-weight-bolder text-white mb-0">Data Pemasukan</h6>
                </nav>
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
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show text-white" role="alert"
                            style="background: linear-gradient(87deg, #11cdef 0, #1171ef 100%);">
                            <span class="alert-icon"><i class="ni ni-check-bold"></i></span>
                            <span class="alert-text">{{ session('success') }}</span>
                            <button type="button" class="btn-close text-white" data-bs-dismiss="alert"
                                aria-label="Close" style="filter: brightness(0) invert(1);"><i
                                    class="ni ni-fat-remove"></i></button>
                        </div>
                    @endif

                    <div class="card mb-4">


                        <div class="card-header pb-0">
                            <h6>Pemasukan Anda</h6>
                            <a href="{{ route('pemasukan.create') }}" type="button" class="btn btn-primary "
                                style="width: 15%">Tambah</a>
                        </div>

                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                No</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Deskripsi</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Jumlah</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Nama Dompet</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Tanggal</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Action</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @foreach ($pemasukan as $data)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $no++ }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $data->deskripsi }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0" align="center">Rp.
                                                        {{ number_format($data->jumlah) }} </p>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $data->dana->nama_dana }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $data->tanggal }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td align="center">
                                                    <form action="{{ route('pemasukan.destroy', $data->id) }}"
                                                        method="POST">
                                                        <a href="{{ route('pemasukan.edit', $data->id) }}"
                                                            type="button" class="btn btn-success">Edit</a>
                                                        <a href="{{ route('pemasukan.show', $data->id) }}"
                                                            type="button" class="btn btn-warning">Lihat</a>

                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Apakah kamu yakin?')">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </main>
    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-light position-fixed px-3 py-2">
            <i class="fa fa-cog py-2"> </i>
        </a>
        <div class="card shadow-lg">
            <div class="card-header pb-0 pt-3 ">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">Kustomisasi tampilan</h5>
                    <p>Kustom tampilanmu sesuai yang kamu butuhkan.</p>
                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="fa fa-close"></i>
                    </button>
                </div>
                <!-- End Toggle Button -->
            </div>
            <hr class="horizontal dark my-1">
            <div class="card-body pt-sm-3 pt-0 overflow-auto">
                <!-- Sidebar Backgrounds -->
                <div>
                    <h6 class="mb-0">Warna sidebar</h6>
                </div>
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors my-2 text-start">
                        <span class="badge filter bg-gradient-primary active" data-color="primary"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-dark" data-color="dark"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-info" data-color="info"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-success" data-color="success"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-warning" data-color="warning"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-danger" data-color="danger"
                            onclick="sidebarColor(this)"></span>
                    </div>
                </a>
                <!-- Sidenav Type -->
                <div class="mt-3">
                    <h6 class="mb-0">Tipe Sidenav</h6>
                    <p class="text-sm">Pilih 2 tipe berbeda</p>
                </div>
                <div class="d-flex">
                    <button class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2" data-class="bg-white"
                        onclick="sidebarType(this)">Cerah</button>
                    <button class="btn bg-gradient-primary w-100 px-3 mb-2" data-class="bg-default"
                        onclick="sidebarType(this)">Gelap</button>
                </div>
                <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
                <hr class="horizontal dark my-sm-4">
                <div class="mt-2 mb-5 d-flex">
                    <h6 class="mb-0">Cerah / Gelap</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version"
                            onclick="darkMode(this)">
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('admin/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('admin/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/chartjs.min.js') }}"></script>
    <script>
        var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#5e72e4",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/argon-dashboard.min.js?v=2.1.0"></script>

    <script src="{{ asset('admin/js/argon-dashboard.min.js') }}"></script>
    <script src="{{ asset('admin/js/argon-dashboard.js') }}"></script>
    <script src="{{ asset('admin/js/argon-dashboard.js.map') }}"></script>
</body>

</html>
