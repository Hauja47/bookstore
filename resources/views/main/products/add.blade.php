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
'active_supplier' => '',
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
    <link rel="stylesheet" href="{{ asset('css/add.css') }}">
@endsection

@section('main-content')
    <div class="main-content">
        <form action="" method="post" id="form-main">
            @csrf
            <!-- FUNCTION BUTTON -->
            <div class="row main-function">
                <div class="col l-6 md-6 c-6">
                    <a href="{{ route('products.index') }}" class="btn-function btn-function__back">
                        <i class='btn-function-icon btn-function__back-icon bx bx-chevron-left'></i>
                        Quay lại danh sách sản phẩm
                    </a>
                </div>
                <div class="col l-6 md-6 c-6">
                    <a href="{{ route('products.index') }}" class="btn-function btn-function__exit">
                        {{-- <i class='btn-function-icon btn-function__add-icon bx bx-plus' ></i> --}}
                        <!-- <i class='btn-function-icon bx bx-plus-circle' ></i> -->
                        Thoát
                    </a>
                    <button type="submit" href="{{ route('products.index') }}" class="btn-function btn-function__save">
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
                                    @include('includes.input', [
                                    'label_title' => 'Tên sản phẩm',
                                    'required' => 'required',
                                    'disabled' => '',
                                    'input_type' => 'text',
                                    'input_id' => 'product_name',
                                    'input_name' => 'TenSanPham',
                                    'input_value' => '',
                                    'message' => '',
                                    ])
                                </div>
                                <div class="col l-6 md-6 c-12">
                                    @include('includes.input', [
                                    'label_title' => 'Phiên bản',
                                    'required' => 'required',
                                    'disabled' => '',
                                    'input_type' => 'text',
                                    'input_id' => 'product_version',
                                    'input_name' => 'PhienBan',
                                    'input_value' => '',
                                    'message' => '',
                                    ])
                                </div>
                                <div class="col l-6 md-6 c-12">
                                    <div class="input-wrapper">
                                        <label for="" class="input-label">
                                            Nhãn hiệu <span class="required">*</span>
                                        </label>

                                        <input type="checkbox" hidden id="ckb-select-brand">
                                        <label class="header__search-select" for="ckb-select-brand" id="label-brand">
                                            <span class="header__search-select-label">Trống</span>
                                            <i class="header__search-select-icon fas fa-angle-down"></i>
                                        </label>
                                        <ul class="header__search-option" id="brand__drop-down">
                                            <li class="header__search-option-item" data-bs-toggle="modal"
                                                data-bs-target="#modal-addBrand">
                                                <i class='bx bx-plus-circle'></i>
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

                    <div class="box info-general">
                        <div class="box-header">
                            Ảnh sản phẩm
                        </div>
                        <div class="box-body">
                            <div class="grid row">
                                <div class="col l-12 md-12 c-12">
                                    @include('includes.input', [
                                    'label_title' => 'Chọn đường dẫn ảnh',
                                    'required' => '',
                                    'disabled' => '',
                                    'input_type' => 'file',
                                    'input_id' => 'photo',
                                    'input_name' => 'photo',
                                    'path_photo' => 'images/book-1.jpg',
                                    'message' => '',
                                    ])

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
                            <div class="grid row">
                                <div class="col l-12 md-12 c-">
                                    <div class="input-wrapper">
                                        <label for="" class="input-label">
                                            Loại sản phẩm <span class="required">*</span>
                                        </label>

                                        <input type="checkbox" hidden id="ckb-select-category">
                                        <label class="header__search-select" for="ckb-select-category" id="label-category">
                                            <span class="header__search-select-label">Trống</span>
                                            <i class="header__search-select-icon fas fa-angle-down"></i>
                                        </label>
                                        <ul class="header__search-option" id="category__drop-down">
                                            <li class="header__search-option-item d-none" data-bs-toggle="modal"
                                                data-bs-target="#modal-addCategory">
                                                <i class='bx bx-plus-circle'></i>
                                                <span>Thêm loại sản phẩm mới</span>
                                            </li>
                                            <li class="header__search-option-item">
                                                <span>Sách</span>
                                            </li>
                                            <li class="header__search-option-item ">
                                                <span>Văn phòng phẩm</span>
                                            </li>
                                            <li class="header__search-option-item">
                                                <span>Đồ chơi</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col l-12 md-12 c-12">
                                    <div class="info-book">
                                        <div class="input-wrapper">
                                            <label for="" class="input-label">
                                                Thể loại <span class="required">*</span>
                                            </label>

                                            <input type="checkbox" hidden id="ckb-select-genre">
                                            <label class="header__search-select" for="ckb-select-genre" id="label-genre">
                                                <span class="header__search-select-label">Trống</span>
                                                <i class="header__search-select-icon fas fa-angle-down"></i>
                                            </label>
                                            <ul class="header__search-option" id="genre__drop-down">
                                                <li class="header__search-option-item" data-bs-toggle="modal"
                                                    data-bs-target="#modal-addGenre">
                                                    <i class='bx bx-plus-circle'></i>
                                                    <span>Thêm thể loại mới</span>
                                                </li>
                                                <li class="header__search-option-item">
                                                    <span>Giáo khoa</span>
                                                </li>
                                                <li class="header__search-option-item ">
                                                    <span>Khoa học viễn tưởng</span>
                                                </li>
                                                <li class="header__search-option-item ">
                                                    <span>Văn học</span>
                                                </li>
                                                <li class="header__search-option-item ">
                                                    <span>Tiểu thuyết</span>
                                                </li>
                                                <li class="header__search-option-item ">
                                                    <span>Truyện tranh</span>
                                                </li>

                                            </ul>
                                        </div>

                                        @include('includes.input', [
                                            'label_title' => 'Tác giả',
                                            'required' => 'required',
                                            'disabled' => '',
                                            'input_type' => 'text',
                                            'input_id' => 'author_name',
                                            'input_name' => 'TacGia',
                                            'input_value' => '',
                                            'message' => '',
                                        ])

                                        @include('includes.input', [
                                            'label_title' => 'Năm xuất bản',
                                            'required' => 'required',
                                            'disabled' => '',
                                            'input_type' => 'text',
                                            'input_id' => 'published_year',
                                            'input_name' => 'NamXuatBan',
                                            'input_value' => '',
                                            'message' => '',
                                        ])
                                    </div>

                                    <div class="info-stationary">
                                        @include('includes.input', [
                                            'label_title' => 'Chất liệu',
                                            'required' => 'required',
                                            'disabled' => '',
                                            'input_type' => 'text',
                                            'input_id' => 'material',
                                            'input_name' => 'ChatLieu',
                                            'input_value' => '',
                                            'message' => '',
                                        ])

                                        @include('includes.input', [
                                            'label_title' => 'Màu sắc',
                                            'required' => 'required',
                                            'disabled' => '',
                                            'input_type' => 'text',
                                            'input_id' => 'color',
                                            'input_name' => 'MauSac',
                                            'input_value' => '',
                                            'message' => '',
                                        ])

                                        @include('includes.input', [
                                            'label_title' => 'Nơi sản xuất',
                                            'required' => 'required',
                                            'disabled' => '',
                                            'input_type' => 'text',
                                            'input_id' => 'original',
                                            'input_name' => 'NoiSanXuat',
                                            'input_value' => '',
                                            'message' => '',
                                        ])
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PRODUCT TABLE -->

            </div>
            {{-- END FORM --}}
        </form>
    </div>
@endsection

@section('modal')
    <!-- Modal -->
    {{-- Modal add Brand --}}
    @include('includes.modal_input', [
    'modal_name' => 'addBrand',
    'form_action' => '',
    'form_method' => 'post',
    'modal_title' => 'Thêm nhãn hiệu',
    'label_title' => 'Tên nhãn hiệu mới',
    'required' => 'required',
    'disabled' => '',
    'input_type' => 'text',
    'input_id' => 'brand_name',
    'input_name' => 'TenNhanHieu',
    'input_value' => '',
    'message' => '',
    ])

    {{-- Modal add Categpry --}}
    @include('includes.modal_input', [
    'modal_name' => 'addCategory',
    'form_action' => '',
    'form_method' => 'post',
    'modal_title' => 'Thêm loại sản phẩm',
    'label_title' => 'Tên loại sản phẩm mới',
    'required' => 'required',
    'disabled' => '',
    'input_type' => 'text',
    'input_id' => 'category_name',
    'input_name' => 'TenLoaiSanPham',
    'input_value' => '',
    'message' => '',
    ])

    {{-- Modal add Genre --}}
    @include('includes.modal_input', [
    'modal_name' => 'addGenre',
    'form_action' => '',
    'form_method' => 'post',
    'modal_title' => 'Thêm thể loại',
    'label_title' => 'Tên thể loại mới',
    'required' => 'required',
    'disabled' => '',
    'input_type' => 'text',
    'input_id' => 'genre_name',
    'input_name' => 'TenTheLoai',
    'input_value' => '',
    'message' => '',
    ])

@endsection

@section('js')
    {{-- <script>
        let table = document.getElementsByTagName('table')[0];
        let mytable = new JSTable('table');
    </script> --}}

    <script src="{{ asset('js/create.js') }}"></script>
@endsection
