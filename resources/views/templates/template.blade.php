<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{ $title }} </title>
    <link rel="icon" href="images/app-logo-icon.png" type="image/png">
    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <!-- BOXICONS -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- FONT AWESOME 5 -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- BOOTSTRAP 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- JSTable -->
    <link rel="stylesheet" href="{{ asset('dist/jstable.css') }}">
    <!-- APP CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/grid.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    @yield('css')
</head>

<body class="{{ $theme }}">
    <!-- APP -->
    <div class="app">
        <!-- SIDEBAR -->
        <div class="sidebar">
            <div class="sidebar__logo">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Trang chủ" class="sidebar__logo-img">
                <div class="sidebar__logo-mobile-close" id="mobile-sidebar-close">
                    <i class='sidebar__logo-mobile-close-icon bx bx-left-arrow-alt'></i>
                </div>
            </div>
            <div class="sidebar__user">
                <a href="" class="sidebar__user-info">
                    <img src="{{ asset('images/user-avatar.png') }}" alt="User Avatar" class="sidebar__user-img">
                    <span class="sidebar__user-name">Nguyễn A</span>
                </a>
                <a href="/" class="sidebar__user-logout btn btn-outline">
                    <i class='sidebar__user-logout-icon bx bx-log-out bx-rotate-180'></i>
                </a>
            </div>
            <!-- SIDEBAR MENU -->
            <ul class="sidebar__menu">
                <li class="sidebar__menu-item {{ $active_dashboard }}">
                    <a href="dashboard" class="sidebar__menu-link">
                        <i class='sidebar__menu-item-icon bx bx-home'></i>
                        Trang chủ
                    </a>
                </li>
                <li class="sidebar__sub-menu">
                    <div class="sidebar__menu-dropdown">
                        <i class='sidebar__menu-item-icon bx bx-receipt'></i>
                        Hoá đơn
                        <span class="sidebar__menu-dropdown-icon {{ $open_order }}"></span>
                    </div>
                    <ul class="sidebar__sub-menu-list">
                        <li class="sidebar__sub-menu-item {{ $active_order }}">
                            <a href="order" class="sidebar__sub-menu-link">
                                Danh sách hoá đơn
                            </a>
                        </li>
                        <li class="sidebar__sub-menu-item {{ $active_refund }}">
                            <a href="refund" class="sidebar__sub-menu-link">
                                Đơn trả hàng
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar__sub-menu">
                    <div class="sidebar__menu-dropdown">
                        <i class='sidebar__menu-item-icon bx bx-shopping-bag'></i>
                        Sản phẩm
                        <span class="sidebar__menu-dropdown-icon {{ $open_product }}"></span>
                    </div>
                    <ul class="sidebar__sub-menu-list">
                        <li class="sidebar__sub-menu-item {{ $active_product }}">
                            <a href="product" class="sidebar__sub-menu-link">
                                Danh sách sản phẩm
                            </a>
                        </li>
                        <li class="sidebar__sub-menu-item {{ $active_invoice }}">
                            <a href="invoice" class="sidebar__sub-menu-link">
                                Đơn nhập kho
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar__menu-item {{ $active_customer }}">
                    <a href="customer" class="sidebar__menu-link">
                        <i class='sidebar__menu-item-icon bx bx-user-circle'></i>
                        Khách hàng
                    </a>
                </li>
                <li class="sidebar__sub-menu">
                    <div class="sidebar__menu-dropdown">
                        <i class='sidebar__menu-item-icon bx bx-money'></i>
                        Sổ quỹ
                        <span class="sidebar__menu-dropdown-icon {{ $open_budget }}"></span>
                    </div>
                    <ul class="sidebar__sub-menu-list">
                        <li class="sidebar__sub-menu-item {{ $active_expenditure }}">
                            <a href="" class="sidebar__sub-menu-link">
                                Phiếu chi
                            </a>
                        </li>
                        <li class="sidebar__sub-menu-item {{ $active_revenue }}">
                            <a href="" class="sidebar__sub-menu-link">
                                Phiếu thu
                            </a>
                        </li>
                        <li class="sidebar__sub-menu-item {{ $active_budget }}">
                            <a href="" class="sidebar__sub-menu-link">
                                Sổ quỹ
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar__sub-menu">
                    <div class="sidebar__menu-dropdown">
                        <i class='sidebar__menu-item-icon bx bx-bar-chart-alt-2'></i>
                        Báo cáo
                        <span class="sidebar__menu-dropdown-icon {{ $open_report }}"></span>
                    </div>
                    <ul class="sidebar__sub-menu-list">
                        <li class="sidebar__sub-menu-item {{ $active_report_stock }}">
                            <a href="" class="sidebar__sub-menu-link">
                                Báo cáo kho
                            </a>
                        </li>
                        <li class="sidebar__sub-menu-item {{ $active_report_dept }}">
                            <a href="" class="sidebar__sub-menu-link">
                                Báo cáo công nợ
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar__menu-item {{ $active_employee }}">
                    <a href="employee" class="sidebar__menu-link">
                        <i class='sidebar__menu-item-icon bx bx-user-pin'></i>
                        Nhân viên
                    </a>
                </li>
                <li class="sidebar__sub-menu">
                    <div class="sidebar__menu-dropdown">
                        <i class='sidebar__menu-item-icon bx bx-cog'></i>
                        Thiết lập
                        <span class="sidebar__menu-dropdown-icon {{ $open_setting }}"></span>
                    </div>
                    <ul class="sidebar__sub-menu-list">
                        <li class="sidebar__sub-menu-item">
                            <a href="javascript:void(0)" class="sidebar__sub-menu-link" id="darkmode-toggle">
                                Chế độ nền tối
                                <span class="sub-menu-link__darkmode-switch @if ($theme == 'dark-mode') sub-menu-link__darkmode-switch--active @endif"></span>
                            </a>
                        </li>
                        <li class="sidebar__sub-menu-item {{ $active_regulation }}">
                            <a href="regulation" class="sidebar__sub-menu-link">
                                Quy định
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- END SIDEBAR -->

        <!-- MAIN -->
        <main class="main">
            <!-- MAIN-HEADER -->
            <div class="main-header">
                <div class="main-header__mobile-menu" id="mobile-menu-toggle">
                    <i class='main-header__mobile-menu-icon bx bx-menu'></i>
                </div>
                <div class="main-header__title">
                    {{ $main_header }}
                </div>
            </div>
            <!-- END MAIN-HEADER -->

            <!-- MAIN-CONTENT -->
            @yield('main-content')
            <!-- END MAIN-CONTENT -->
        </main>
        <!-- END MAIN -->

        <div class="app__overlay"></div>
    </div>

    <!-- SCRIPTS -->
    <!-- APEX CHART -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <!-- BOOTSTRAP 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- JSTable -->
    <script src="{{ asset('dist/jstable.min.js') }}"></script>

    <!-- APP JS -->
    <script>
        // truyền biến $theme sang javascript
        var theme = {!! json_encode($theme) !!};
    </script>
    <script src="{{ asset('js/app.js') }}"></script>

    @yield('js')
</body>

</html>