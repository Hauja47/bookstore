@extends('templates.template', [
'title'=> 'Thêm Sản phẩm',
'main_header'=> 'Thêm Sản phẩm',

'active_dashboard' => '',
'open_order' => '',
'active_order' => '',
'active_refund' => '',
'open_product' => 'sidebar__menu-dropdown-icon--open',
'active_product' => 'active',
'active_invoice' => '',
'active_customer' => '',
'open_budget' => '',
'active_expenditure' => '',
'active_revenue' => '',
'active_budget' => '',
'open_report' => '',
'active_report_stock' => '',
'active_report_dept' => '',
'active_employee' => '',
'open_setting' => '',
'active_regulation' => '',
])

@section('css')
    <link rel="stylesheet" href="{{ asset('css/list.css') }}">
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
@endsection

@section('main-content')
    <div class="main-content">
        <form action="" method="post">
            <!-- FUNCTION BUTTON -->
            <div class="row main-function">
                <div class="col l-6 md-6 c-6">
                    <a href="../product" class="btn-function btn-function__back">
                        <i class='btn-function-icon btn-function__back-icon bx bx-chevron-left'></i>
                        Quay lại danh sách sản phẩm
                    </a>
                </div>
                <div class="col l-6 md-6 c-6">
                    <a href="../product" class="btn-function btn-function__exit">
                        {{-- <i class='btn-function-icon btn-function__add-icon bx bx-plus' ></i> --}}
                        <!-- <i class='btn-function-icon bx bx-plus-circle' ></i> -->
                        Thoát
                    </a>
                    <button type="submit" href="../product" class="btn-function btn-function__save">
                        {{-- <i class='btn-function-icon btn-function__add-icon bx bx-plus' ></i> --}}
                        <!-- <i class='btn-function-icon bx bx-plus-circle' ></i> -->
                        Lưu
                    </button>
                </div>
            </div>
            <!-- END  -->

            {{-- FORM --}}
            <div class="row">
                <!-- FORM CREATE PRODUCT -->
                <div class="col l-7 md-7 c-12">
                    <div class="box info-general">
                        <div class="box-header">
                            Thông tin chung
                        </div>
                        <div class="box-body">
                            <div class="grid row">
                                <div class="col l-12 md-12 c-12">
                                    <div class="input-wrapper">
                                        <label for="product_name" class="input-label">Tên sản phẩm <span class="required">*</span></label>
                                        <input type="text" name="product_name" id="product_name" class="input-text">
                                    </div>
                                </div>
                                <div class="col l-6 md-6 c-12">
                                    <div class="input-wrapper">
                                        <label for="product_version" class="input-label">Phiên bản <span class="required">*</span></label>
                                        <input type="text" name="product_version" id="product_version" class="input-text">
                                    </div>
                                </div>
                                <div class="col l-6 md-6 c-12">
                                    <div class="input-wrapper">
                                        <label for="product_brand" class="input-label">
                                            Nhãn hiệu <span class="required">*</span>
                                        </label>

                                        <input type="checkbox" hidden id="ckbSelect">
                                        <label class="header__search-select" for="ckbSelect">
                                            <span class="header__search-select-label">All</span>
                                            <i class="header__search-select-icon fas fa-angle-down"></i>
                                        </label>
                                        <ul class="header__search-option">
                                            <li class="header__search-option-item">
                                                <i class='bx bx-plus-circle' ></i>
                                                <span>Thêm nhãn hiệu mới</span>
                                            </li>
                                            <li class="header__search-option-item">
                                                <span>NXB Giáo dục</span>
                                            </li>
                                            <li class="header__search-option-item ">
                                                <span>Văn phòng phẩm Hồng Hà</span>
                                            </li>
                                            <li class="header__search-option-item ">
                                                <span>NXB Kim Đồng</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col l-5 md-5 c-12">
                    <div class="box info-additional">
                        <div class="box-header">
                            Thông tin bổ sung
                        </div>
                        <div class="box-body">

                            <input type="text">

                        </div>
                    </div>
                </div>
                <!-- END PRODUCT TABLE -->

            </div>
            {{-- END FORM --}}
        </form>
    </div>
@endsection

@section('js')
    {{-- <script>
        let table = document.getElementsByTagName('table')[0];
        let mytable = new JSTable('table');
    </script> --}}

    <script src="{{ asset('js/create.js') }}"></script>
@endsection
