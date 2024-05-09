<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>SI TAKRO</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/logodesa.png">
    <!-- Pignose Calender -->
    <link href="/assets/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->

    <link rel="stylesheet" href="/assets/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="/assets/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    {{-- <link href="https://cdn.datatables.net/v/bs5/dt-1.13.8/datatables.min.css" rel="stylesheet"> --}}
    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">




</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3"
                    stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">


        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="{{ route('dashboard') }}">
                    <b class="logo-abbr"><img src="/assets/images/logositakro.png" alt=""> </b>
                    <span class="logo-compact"><img src="/assets/images/logositakro.png" alt=""></span>
                    <span class="brand-title">
                        <img src="/assets/images/logositakro.png" alt="">
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->

        <div class="header">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <div class="input-group icons">
                        <span class="brand-title">
                            <img src="/assets/images/logodesa.png" alt="">
                        </span>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="/assets/images/logodesa.png" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li><a href="{{ route('logout') }}"><i class="icon-key"></i>
                                                <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                    <li>
                        <a class="nav-link {{ request()->segment('1') == 'home' ? 'active' : '' }}"
                            href="{{ route('dashboard') }}" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="nav-link {{ request()->segment('1') == 'home' ? 'active' : '' }}"
                            href="{{ route('datapenduduk.dasa') }}" aria-expanded="false">
                            <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Data Penduduk</span>
                        </a>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="nav-link {{ request()->segment('1') == 'home' ? 'active' : '' }}"
                            href="{{ '/datamutasi/datam' }}" aria-expanded="false">
                            <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Data Mutasi</span>
                        </a>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="nav-link {{ request()->segment('1') == 'home' ? 'active' : '' }}"
                            href="{{ route('dasawisma.index') }}" aria-expanded="false">
                            <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Data Dasa wisma</span>
                        </a>
                    </li>
                    <li class="nav-label">SGDS Desa</li>
                    <li>
                        <a class="has-arrow nav-link {{ request()->segment('1') == 'home' ? 'active' : '' }}"
                            href="javascript:void()" aria-expanded="false">
                            <i class="fa-light fa-user"></i> <span class="nav-text">Individu</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('individu.index') }}">Data individu</a></li>
                            <li><a href="{{ route('pekerjaan.index') }}">Pekerjaan</a></li>
                            <li><a href="{{ route('datapenghasilan.index') }}">Penghasilan</a></li>
                            <li><a href="{{ route('datakesehatan.index') }}">Kesehatan</a></li>
                            <li><a href="{{ route('disabilitas.index') }}">Jenis disabilitas</a></li>
                            <li><a href="{{ route('pendidikan.index') }}">Pendidikan</a></li>
                        </ul>
                    </li>
                    {{-- <li class="non-clickable">
                        <a class="has-arrow nav-link {{ request()->segment('1') == 'home' ? 'active' : '' }}"
                            href="javascript:void()" aria-expanded="false">
                            <i class="icon-screen-tablet menu-icon"></i><span class="nav-text">KK</span>
                            <i class="fas fa-lock"></i> <!-- Icon Gembok -->
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ '/sdgs/individu/dataindividu' }}">Lokasi dan pemukiman</a></li>
                            <li><a href="{{ '/sdgs/individu/dataindividu' }}">Akses pendidikan</a></li>
                            <li><a href="{{ '/sdgs/individu/dataindividu' }}">Akses kesehatan</a></li>
                            <li><a href="{{ '/sdgs/individu/dataindividu' }}">Akses tenaga kerja</a></li>
                            <li><a href="{{ '/sdgs/individu/dataindividu' }}">Akses sarana prasarana</a></li>
                            <li><a href="{{ '/sdgs/individu/dataindividu' }}">Lain-lain</a></li>
                        </ul>
                    </li>
                    <li class="non-clickable">
                        <a class="has-arrow nav-link {{ request()->segment('1') == 'home' ? 'active' : '' }}"
                            href="javascript:void()" aria-expanded="false">
                            <i class="icon-graph menu-icon"></i> <span class="nav-text">RT</span>
                            <i class="fas fa-lock"></i> <!-- Icon Gembok -->
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ '/sdgs/individu/dataindividu' }}">Lokasi</a></li>
                            <li><a href="{{ '/sdgs/individu/dataindividu' }}">Pengurus</a></li>
                            <li><a href="{{ '/sdgs/individu/dataindividu' }}">Lembaga Ekonomi</a></li>
                            <li><a href="{{ '/sdgs/individu/dataindividu' }}">Industri</a></li>
                            <li><a href="{{ '/sdgs/individu/dataindividu' }}">Sarana Ekonomi</a></li>
                            <li><a href="{{ '/sdgs/individu/dataindividu' }}">Infrastuktur</a></li>
                            <li><a href="{{ '/sdgs/individu/dataindividu' }}">Lingkungan</a></li>
                            <li><a href="{{ '/sdgs/individu/dataindividu' }}">Bencana</a></li>
                            <li><a href="{{ '/sdgs/individu/dataindividu' }}">Mitigasi Bencana</a></li>
                            <li><a href="{{ '/sdgs/individu/dataindividu' }}">Sarana pendidikan</a></li>
                            <li><a href="{{ '/sdgs/individu/dataindividu' }}">Kesehatan</a></li>
                            <li><a href="{{ '/sdgs/individu/dataindividu' }}">KAjian Luar biasa</a></li>
                            <li><a href="{{ '/sdgs/individu/dataindividu' }}">Agama/Sosbud</a></li>
                            <li><a href="{{ '/sdgs/individu/dataindividu' }}">Lembaga agama</a></li>
                            <li><a href="{{ '/sdgs/individu/dataindividu' }}">Lembaga masyarakat</a></li>
                            <li><a href="{{ '/sdgs/individu/dataindividu' }}">Keamanan</a></li>
                            <li><a href="{{ '/sdgs/individu/dataindividu' }}">Tindak kejahatan</a></li>
                            <li><a href="{{ '/sdgs/individu/dataindividu' }}">KEGIATAN WARGA UNTUK MENJAGA KEAMANAN
                                    LINGKUNGAN SELAMA SATU TAHUN TERAKHIR</a></li>
                        </ul>
                    </li> --}}
                    <li>
                        <a class="has-arrow nav-link {{ request()->segment('1') == 'home' ? 'active' : '' }}"
                            href="javascript:void()" aria-expanded="false">
                            <i class="icon-screen-tablet menu-icon"></i><span class="nav-text">KK</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('lokasipemukiman.index') }}">Lokasi dan pemukiman</a></li>
                            <li><a href="{{ route('aksespendidikan.index') }}">Akses pendidikan</a></li>
                            <li><a href="{{ route('akseskesehatan.index') }}">Akses kesehatan</a></li>
                            <li><a href="{{ route('aksestenagakerja.index') }}">Akses tenaga kesehatan</a></li>
                            <li><a href="{{ route('aksessarpras.index') }}">Akses sarana prasarana</a></li>
                            <li><a href="{{ route('laink.index') }}">Lain-lain</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow nav-link {{ request()->segment('1') == 'home' ? 'active' : '' }}"
                            href="javascript:void()" aria-expanded="false">
                            <i class="icon-graph menu-icon"></i> <span class="nav-text">RT</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('datart.index') }}">Data RT</a></li>
                            <li><a href="{{ route('rtlokasi.index') }}">Lokasi</a></li>
                            <li><a href="{{ route('rtpengurus.index') }}">Pengurus</a></li>
                            <li><a href="{{ route('rtlembaga_ekonomi.index') }}">Lembaga Ekonomi</a></li>
                            <li><a href="{{ route('rtindustri.index') }}">Industri</a></li>
                            <li><a href="{{ route('rtsare.index') }}">Sarana Ekonomi</a></li>
                            <li><a href="{{ route('rt_fasilitas_ekonomi.index') }}">Fasilitas Ekonomi</a></li>
                            <li><a href="{{ route('rtinfrastuktur.index') }}">Infrastuktur</a></li>
                            <li><a href="{{ route('rtlingkungan.index') }}">Lingkungan</a></li>
                            <li><a href="{{ route('rtbencana.index') }}">Bencana</a></li>
                            <li><a href="{{ route('rtmitigasib.index') }}">Mitigasi Bencana</a></li>
                            <li><a href="{{ route('rt_saranapendidikan.index') }}">Sarana pendidikan</a></li>
                            <li><a href="{{ route('rt_kesehatan.index') }}">Kesehatan</a></li>
                            <li><a href="{{ route('rt_kejadianluarbiasa.index') }}">Kajian Luar biasa</a></li>
                            <li><a href="{{ route('rt_agama.index') }}">Agama/Sosbud</a></li>
                            <li><a href="{{ route('rtlembaga_keagamaan.index') }}">Lembaga agama</a></li>
                            <li><a href="{{ route('rtlembaga_masyarakat.index') }}">Lembaga masyarakat</a></li>
                            <li><a href="{{ route('rt_keamanan.index') }}">Keamanan</a></li>
                            <li><a href="{{ route('rt_tkejahatan.index') }}">Tindak kejahatan</a></li>
                            <li><a href="{{ route('rt_kegiatanwarga.index') }}">KEGIATAN WARGA UNTUK MENJAGA KEAMANAN
                                    LINGKUNGAN SELAMA SATU TAHUN TERAKHIR</a></li>
                        </ul>
                    </li>

                </ul>
                </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            @yield('content')


            <!-- #/ container -->
        </div>
        <!-- #/ container -->
    </div>
    <!--**********************************
            Content body end
        ***********************************-->


    <!--**********************************
            Footer start
        ***********************************-->
    <div class="footer">
        <div class="copyright">
            <p>Copyright &copy; Designed & Developed by <a href="https://wa.me/62811988274">Tim Smart Village Nasional
                </a> 2023</p>
        </div>
    </div>

    <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="/assets/plugins/common/common.min.js"></script>
    <script src="/assets/js/custom.min.js"></script>
    <script src="/assets/js/settings.js"></script>
    <script src="/assets/js/gleek.js"></script>
    <script src="/assets/js/styleSwitcher.js"></script>

    <!-- Chartjs -->
    <script src="/assets/plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="/assets/plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap -->
    <script src="/assets/plugins/d3v3/index.js"></script>
    <script src="/assets/plugins/topojson/topojson.min.js"></script>
    <script src="/assets/plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="/assets/plugins/raphael/raphael.min.js"></script>
    <script src="/assets/plugins/morris/morris.min.js"></script>
    <script src="/assets/js/plugins-init/morris-init.js"></script>
    <!-- Pignose Calender -->
    <script src="/assets/plugins/moment/moment.min.js"></script>
    <script src="/assets/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src="/assets/plugins/chartist/js/chartist.min.js"></script>
    <script src="/assets/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>
    <script src="/assets/plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.8/datatables.min.js"></script>
    <script src="/assets/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>
    <script src="/assets/js/dashboard/dashboard-1.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>


    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>







    {{-- <script>
        let timeout;

        function resetTimer() {
            clearTimeout(timeout);

            timeout = setTimeout(function() {
                window.location.href = '/logout'; // URL logout Anda
            }, 60000);
        }

        document.addEventListener('mousemove', resetTimer);
        document.addEventListener('keypress', resetTimer);
    </script> --}}




</body>

</html>
