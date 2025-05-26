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

<body class="g-sidenav-show   bg-gray-100 ">
    <div class="min-height-300 bg-dark position-absolute w-100"></div>

    @include('layouts.part.sidebar')

    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        @include('layouts.part.navbar')
        <!--  Navbar -->

        {{-- ini tampilan user --}}
        @if (Auth::user()->is_admin === 0)
            <div class="container-fluid py-4">
                @yield('content')

                <h3 class="mb-3 text-white">Dompet</h3>

                <div class="d-flex overflow-auto" style="white-space: nowrap;">
                    @php $no = 1; @endphp
                    @foreach ($dataDana as $data)
                        <div class="card me-3 bg-transparent shadow-xl" style="min-width: 350px">
                            <div class="overflow-hidden position-relative border-radius-xl"
                                style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/card-visa.jpg');">
                                <span class="mask bg-gradient-dark"></span>
                                <div class="card-body position-relative z-index-1 p-3">
                                    <i class="fas fa-wifi text-white p-2"></i>
                                    <h5 class="text-white mt-4 mb-1 pb-2">{{ $data['nama_dana'] }}</h5>
                                    <p class="text-white">Saldo : Rp. {{ number_format($data['saldo']) }}</p>
                                    <div class="d-flex">
                                        <div class="d-flex">
                                            <div class="me-4">
                                                <p class="text-white text-sm opacity-8 mb-0">Pemilik Dompet</p>
                                                <h6 class="text-white mb-0">{{ Auth::user()->username }}</h6>
                                            </div>
                                            <div>
                                                <p class="text-white text-sm opacity-8 mb-0">tanggal</p>
                                                <h6 class="text-white mb-0">{{ $data['tanggal'] }}</h6>
                                            </div>
                                        </div>
                                        <div class="ms-auto w-20 d-flex align-items-end justify-content-end">
                                            <img class="w-60 mt-2" src="{{ asset('admin/img/logos/mastercard.png') }}"
                                                alt="logo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="row mt-4">

                    <div class="col-md-7 mt-4">
                        <div class="card">
                            <div class="card-header pb-0 px-3">
                                <h6 class="mb-0">Informasi Keuangan per Dompet</h6>
                            </div>
                            <div class="card-body pt-4 p-3">
                                <ul class="list-group">

                                    @foreach ($dataDana as $dana)
                                        <li
                                            class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                            <div class="d-flex flex-column w-100">
                                                <h6 class="mb-3 text-sm">{{ $dana['nama_dana'] }}</h6>

                                                <span class="mb-2 text-xs">Total Pemasukan:
                                                    <span class="text-dark font-weight-bold ms-sm-2">
                                                        Rp{{ number_format($dana['total_pemasukan']) }}
                                                    </span>
                                                </span>
                                                <span class="mb-2 text-xs">Total Pengeluaran:
                                                    <span class="text-dark font-weight-bold ms-sm-2">
                                                        Rp{{ number_format($dana['total_pengeluaran']) }}
                                                    </span>
                                                </span>
                                                <span class="text-xs">Saldo Akhir:
                                                    <span class="text-dark font-weight-bold ms-sm-2">
                                                        Rp{{ number_format($dana['saldo']) }}
                                                    </span>
                                                </span>
                                            </div>
                                        </li>
                                    @endforeach

                                    @if (count($dataDana) == 0)
                                        <li
                                            class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                            <div class="d-flex flex-column w-100 text-center">
                                                <span class="text-sm text-muted">Belum ada data dompet, Tambahkan dompet
                                                    dahulu </span>
                                            </div>
                                        </li>
                                    @endif

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 mt-4">
                        <div class="card h-100 mb-4">
                            <div class="card-header pb-0 px-3">
                                <div class="row">
                                    <h4 class="mb-0">Aktivitas keuangan</h4>
                                </div>
                            </div>
                            <div class="card-body pt-4 p-3">
                                <ul class="list-group">
                                    <h6>Pemasukan</h6>
                                    @foreach ($pemasukan as $data)
                                        <li
                                            class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                            <div class="d-flex align-items-center">
                                                <button
                                                    class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                                        class="fas fa-arrow-up"></i></button>
                                                <div class="d-flex flex-column">
                                                    <h6 class="mb-1 text-dark text-sm">{{ $data->deskripsi }}</h6>
                                                    <span class="text-xs">{{ $data->tanggal }}</span>
                                                </div>
                                            </div>
                                            <div
                                                class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                                + Rp{{ number_format($data->jumlah) }}
                                            </div>
                                        </li>
                                    @endforeach
                                    <h6>Pengeluaran</h6>
                                    @foreach ($pengeluaran as $data)
                                        <li
                                            class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                            <div class="d-flex align-items-center">
                                                <button
                                                    class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                                        class="fas fa-arrow-down"></i></button>
                                                <div class="d-flex flex-column">
                                                    <h6 class="mb-1 text-dark text-sm">{{ $data->deskripsi }}</h6>
                                                    <span class="text-xs">{{ $data->tanggal }}</span>
                                                </div>
                                            </div>
                                            <div
                                                class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                                                - Rp{{ number_format($data->jumlah) }}
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        {{--  akhir tampilan user --}}

        {{-- tapilan admin --}}
        @if (Auth::user()->is_admin === 1)
            <div class="container-fluid py-4">
                <h2 class="mb-3 text-white">Data Pengguna</h2>

                <div class="row">
                    <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
                        <div class="card dark-version">
                            <div class="card-body p-3 ">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Total saldo seluruh
                                                pengguna</p>
                                            <h5 class="font-weight-bolder">
                                                Rp. {{ number_format($totsaldo) }}
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div
                                            class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                            <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
                        <div class="card dark-version">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah Pengguna</p>
                                            <h5 class="font-weight-bolder">
                                                {{ $totuser }}
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div
                                            class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                            <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-2">
                        <div class="card mb-4">
                            <div class="card-header pb-0">
                                <h4 class="mb-0">Informasi Pengguna</h4>
                            </div>
                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive p-3">
                                    <table class="table align-items-center mb-0">
                                        <thead class="bg-light">
                                            <tr align="center">
                                                <th class="text-uppercase text-secondary text-xs font-weight-bolder">No
                                                </th>
                                                <th class="text-uppercase text-secondary text-xs font-weight-bolder">
                                                    Nama</th>
                                                <th class="text-uppercase text-secondary text-xs font-weight-bolder">
                                                    Dompet</th>
                                                <th class="text-uppercase text-secondary text-xs font-weight-bolder">
                                                    Saldo</th>
                                                <th class="text-uppercase text-secondary text-xs font-weight-bolder">
                                                    Tanggal Pembuatan Akun</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 1; @endphp
                                            @foreach ($user as $data)
                                                <tr align="center">
                                                    <td>
                                                        <p class="text-sm mb-0">{{ $no++ }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="text-sm font-weight-bold mb-0">{{ $data->name }}
                                                        </p>
                                                    </td>
                                                    <td>
                                                        @foreach ($data->dana as $d)
                                                            <p class="text-sm mb-0">{{ $d->nama_dana }}</p>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach ($data->dana as $d)
                                                            <p class="text-sm mb-0">{{ number_format($d->saldo) }}</p>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        <p class="text-sm mb-0">{{ $data->created_at }}</p>
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
        @endif
        {{-- akhir tampilan admin --}}
        </div>
    </main>

    {{-- kustom tampilan --}}
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
    <script src="{{ asset('admin/js/core/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/bootstrap-notify.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/chartjs.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/Chart.extension.js') }}"></script>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    <script src="{{ asset('admin/js/argon-dashboard.min.js') }}"></script>
    <script src="{{ asset('admin/js/argon-dashboard.js') }}"></script>
    <script src="{{ asset('admin/js/argon-dashboard.js.map') }}"></script>
</body>

</html>
