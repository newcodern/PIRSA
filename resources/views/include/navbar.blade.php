@include('sweetalert::alert')
<link href="https://fonts.gstatic.com" rel="preconnect">
<link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">
<link href="{{ asset('NiceAdmin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('NiceAdmin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('NiceAdmin/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
<link href="{{ asset('NiceAdmin/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
<link href="{{ asset('NiceAdmin/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
<link href="{{ asset('NiceAdmin/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
<link href="{{ asset('NiceAdmin/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
<link href="{{ asset('NiceAdmin/assets/css/style.css') }}" rel="stylesheet">

@if (auth('AbottomAdmin')->check())
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ route('auth.main') }}" class="logo d-flex align-items-center">
                <span class="d-none d-lg-block">Pirsa</span>
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

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::User()->name }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ Auth::User()->name }}n</h6>
                            <span>{{ Auth::User()->role }}</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                                <i class="bi bi-question-circle"></i>
                                <span>Need Help?</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>
                                    <form method="post" action="{{ route('auth.Bottomadmin.logout') }}">@csrf
                                        <button type="submit" id="logout_bridge" hidden></button> <label
                                            style="cursor: pointer;" class="item-sb" for="logout_bridge"
                                            href="#">Logout</label></form>
                                </span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header>



    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="{{ route('auth.main') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse"
                    href="#" aria-expanded="false">
                    <i class="bi bi-menu-button-wide"></i><span>Index Admin</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav" style="">
                    <li>
                        <a href="{{ route('auth.Bottomadmin.index.manage.users') }}">
                            <i class="bi bi-circle"></i><span>Add Users</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-navSPBE" data-bs-toggle="collapse"
                    href="#" aria-expanded="false">
                    <i class="bi bi-journal-text"></i><span>SPBE</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-navSPBE" class="nav-content collapse" data-bs-parent="#sidebar-nav" style="">
                    <li>
                        <a href="{{ route('auth.Bottomadmin.index.manage.SPBE.add') }}">
                            <i class="bi bi-circle"></i><span>Add SPBE</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('auth.Bottomadmin.index.manage.SPBE') }}">
                            <i class="bi bi-circle"></i><span>Manage SPBE</span>
                        </a>
                    </li>
                    <li>
                        <a href="forms-editors.html">
                            <i class="bi bi-circle"></i><span>Form Editors</span>
                        </a>
                    </li>
                    <li>
                        <a href="forms-validation.html">
                            <i class="bi bi-circle"></i><span>Form Validation</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-navKendaraan" data-bs-toggle="collapse"
                    href="#" aria-expanded="false">
                    <i class="bi bi-journal-text"></i><span>Kendaraan</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-navKendaraan" class="nav-content collapse" data-bs-parent="#sidebar-nav"
                    style="">
                    <li>
                        <a href="{{ route('auth.Bottomadmin.index.manage.kendaraan.add') }}">
                            <i class="bi bi-circle"></i><span>Tambah Kendaraan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('auth.Bottomadmin.index.manage.kendaraan.view') }}">
                            <i class="bi bi-circle"></i><span>Manage Kendaran</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-navDriver" data-bs-toggle="collapse"
                    href="#" aria-expanded="false">
                    <i class="bi bi-journal-text"></i><span>Driver</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-navDriver" class="nav-content collapse" data-bs-parent="#sidebar-nav" style="">
                    <li>
                        <a href="{{ route('auth.Bottomadmin.index.manage.mgIDDriver') }}">
                            <i class="bi bi-circle"></i><span>Manage ID Driver</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('auth.Bottomadmin.index.manage.mgIDDriver.add') }}">
                            <i class="bi bi-circle"></i><span>Add ID Driver</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-navKIM" data-bs-toggle="collapse"
                    href="#" aria-expanded="false">
                    <i class="bi bi-journal-text"></i><span>KIM</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-navKIM" class="nav-content collapse" data-bs-parent="#sidebar-nav" style="">
                    <li>
                        <a href="{{ route('auth.Bottomadmin.index.manage.KIMandID') }}">
                            <i class="bi bi-circle"></i><span>Manage KIM</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('auth.Bottomadmin.index.manage.KIMandID.add') }}">
                            <i class="bi bi-circle"></i><span>Add KIM</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>

    </aside>
@elseif(auth('ASecurity')->check())
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ route('auth.main') }}" class="logo d-flex align-items-center">
                <span class="d-none d-lg-block">Pirsa</span>
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

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::User()->name }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ Auth::User()->name }}n</h6>
                            <span>{{ Auth::User()->role }}</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                                <i class="bi bi-question-circle"></i>
                                <span>Need Help?</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>
                                    <form method="post" action="{{ route('auth.ASecurity.logout') }}">@csrf <button
                                            type="submit" id="logout_bridge" hidden></button> <label
                                            style="cursor: pointer;" class="item-sb" for="logout_bridge"
                                            href="#">Logout</label></form>
                                </span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header>



    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="{{ route('auth.main') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse"
                    href="#" aria-expanded="false">
                    <i class="bi bi-menu-button-wide"></i><span>Flowchart Security</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#"
                    aria-expanded="false">
                    <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav" style="">
                    <li>
                        <a href="forms-elements.html">
                            <i class="bi bi-circle"></i><span>Form Elements</span>
                        </a>
                    </li>
                    <li>
                        <a href="forms-layouts.html">
                            <i class="bi bi-circle"></i><span>Form Layouts</span>
                        </a>
                    </li>
                    <li>
                        <a href="forms-editors.html">
                            <i class="bi bi-circle"></i><span>Form Editors</span>
                        </a>
                    </li>
                    <li>
                        <a href="forms-validation.html">
                            <i class="bi bi-circle"></i><span>Form Validation</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>

    </aside>
@endif

<script src="{{ asset('NiceAdmin/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('NiceAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('NiceAdmin/assets/vendor/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('NiceAdmin/assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('NiceAdmin/assets/vendor/quill/quill.min.js') }}"></script>
<script src="{{ asset('NiceAdmin/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('NiceAdmin/assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('NiceAdmin/assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('NiceAdmin/assets/js/main.js') }}"></script>
<script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
