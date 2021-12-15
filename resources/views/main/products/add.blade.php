@extends('templates.template', [
'title'=> 'Thêm Sản phẩm',
'main_header'=> 'Thêm Sản phẩm',

'active_dashboard' => '',
'open_invoice' => '',
'active_invoice' => '',
'active_return_good' => '',
'open_product' => 'sidebar__menu-dropdown-icon--open',
'active_product' => 'active',
'active_goods_receipt' => '',
'active_provider' => '',
'active_customer' => '',
'open_budget' => '',
'active_payment' => '',
'active_receipt' => '',
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
        <form action="{{ route('products.create') }}" method="post" id="form-main" enctype="multipart/form-data">
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
                    <button type="submit" class="btn-function btn-function__save">
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
                                    'input_name' => 'product_name',
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
                                    'input_id' => 'version',
                                    'input_name' => 'version',
                                    'input_value' => '',
                                    'message' => '',
                                    ])
                                </div>
                                <div class="col l-6 md-6 c-12">
                                    <div class="input-wrapper">
                                        <label for="" class="input-label">
                                            Nhãn hiệu <span class="required">*</span>
                                        </label>

                                        {{-- <input type="checkbox" hidden id="ckb-select-brand">
                                        <label class="header__search-select" for="ckb-select-brand" id="label-brand">
                                            <span class="header__search-select-label" name="brand_name">Trống</span>
                                            <i class="header__search-select-icon fas fa-angle-down"></i>
                                        </label>
                                        <ul class="header__search-option" id="brand__drop-down">
                                            <li class="header__search-option-item d-none" data-bs-toggle="modal"
                                                data-bs-target="#modal-addBrand">
                                                <i class='bx bx-plus-circle'></i>
                                                <span>Thêm nhãn hiệu mới</span>
                                            </li>
                                            @foreach (\App\Models\Brand::all() as $brand)
                                                <li class="header__search-option-item" value="{{ $brand->id }}">
                                                    <span>{{ $brand->name }}</span>
                                                </li>
                                            @endforeach
                                        </ul> --}}

                                        <select class="header__search-select" name="brand_id" id="brand_id">
                                            <option hidden value=""></option>
                                            @foreach (\App\Models\Brand::all() as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                            <p class="error-msg">{{ $message }}</p>
                                            {{-- <p class="error-msg">Trường này không được trống</p> --}}
                                        @enderror
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
                                    'path_photo' => 'images/no-image.png',
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

                                        {{-- <input type="checkbox" hidden id="ckb-select-product_type">
                                        <label class="header__search-select" for="ckb-select-product_type"
                                            id="label-product_type">
                                            <span class="header__search-select-label" name="product_type_name">Trống</span>
                                            <i class="header__search-select-icon fas fa-angle-down"></i>
                                        </label>
                                        <ul class="header__search-option" id="product_type__drop-down">
                                            <li class="header__search-option-item d-none" data-bs-toggle="modal"
                                                data-bs-target="#modal-addProductType">
                                                <i class='bx bx-plus-circle'></i>
                                                <span>Thêm loại sản phẩm mới</span>
                                            </li>
                                            <li class="header__search-option-item">
                                                <span>Sách</span>
                                            </li>
                                            <li class="header__search-option-item ">
                                                <span>Văn phòng phẩm</span>
                                            </li>
                                            @foreach (\App\Models\ProductType::all() as $product_type)
                                                <li class="header__search-option-item" value="{{ $product_type->id }}">
                                                    <span>{{ $product_type->name }}</span>
                                                </li>
                                            @endforeach
                                        </ul> --}}

                                        <select class="header__search-select" name="productable_type" id="productable_type">
                                            <option hidden value=""></option>
                                            <option value="Sách"
                                                {{ old(request('productable_type')) == 'Sách' ? 'selected' : '' }}>Sách
                                            </option>
                                            <option value="Văn phòng phẩm"
                                                {{ old(request('productable_type')) == 'Văn phòng phẩm' ? 'selected' : '' }}>
                                                Văn phòng phẩm</option>

                                            {{-- <option value="Sách">Sách</option>
                                            <option value="Văn phòng phẩm">Văn phòng phẩm</option> --}}
                                        </select>
                                        @error('productable_type')
                                            <p class="error-msg">{{ $message }}</p>
                                            {{-- <p class="error-msg">Trường này không được trống</p> --}}
                                        @enderror
                                    </div>
                                </div>

                                <div class="col l-12 md-12 c-12">
                                    <div class="info-book">
                                        <div class="input-wrapper">
                                            <label for="" class="input-label">
                                                Thể loại <span class="required">*</span>
                                            </label>

                                            {{-- <input type="checkbox" hidden id="ckb-select-category">
                                            <label class="header__search-select" for="ckb-select-category" id="label-category">
                                                <span class="header__search-select-label">Trống</span>
                                                <i class="header__search-select-icon fas fa-angle-down"></i>
                                            </label>
                                            <ul class="header__search-option" id="category__drop-down">
                                                <li class="header__search-option-item d-none" data-bs-toggle="modal"
                                                    data-bs-target="#modal-addCategory">
                                                    <i class='bx bx-plus-circle'></i>
                                                    <span>Thêm thể loại mới</span>
                                                </li>
                                                @foreach (\App\Models\Category::all() as $category)
                                                <li class="header__search-option-item" value="{{ $category->id }}" name="category_name">
                                                    <span>{{ $category->name }}</span>
                                                </li>
                                                @endforeach
                                            </ul> --}}

                                            <select class="header__search-select" name="category_id" id="category_id">
                                                <option hidden value=""></option>
                                                @foreach (\App\Models\Category::all() as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <p class="error-msg">{{ $message }}</p>
                                                {{-- <p class="error-msg">Trường này không được trống</p> --}}
                                            @enderror
                                        </div>

                                        @include('includes.input', [
                                        'label_title' => 'Tác giả',
                                        'required' => 'required',
                                        'disabled' => '',
                                        'input_type' => 'text',
                                        'input_id' => 'author',
                                        'input_name' => 'author',
                                        'input_value' => '',
                                        'message' => '',
                                        ])

                                        @include('includes.input', [
                                        'label_title' => 'Năm xuất bản',
                                        'required' => 'required',
                                        'disabled' => '',
                                        'input_type' => 'number',
                                        'input_id' => 'publish_year',
                                        'input_name' => 'publish_year',
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
                                        'input_name' => 'material',
                                        'input_value' => '',
                                        'message' => '',
                                        ])

                                        @include('includes.input', [
                                        'label_title' => 'Màu sắc',
                                        'required' => 'required',
                                        'disabled' => '',
                                        'input_type' => 'text',
                                        'input_id' => 'color',
                                        'input_name' => 'color',
                                        'input_value' => '',
                                        'message' => '',
                                        ])

                                        @include('includes.input', [
                                        'label_title' => 'Nơi sản xuất',
                                        'required' => 'required',
                                        'disabled' => '',
                                        'input_type' => 'text',
                                        'input_id' => 'origin',
                                        'input_name' => 'origin',
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
    {{-- @include('includes.modal_input', [
    'modal_name' => 'addBrand',
    'form_action' => '',
    'form_method' => 'post',
    'modal_title' => 'Thêm nhãn hiệu',
    'label_title' => 'Tên nhãn hiệu mới',
    'required' => 'required',
    'disabled' => '',
    'input_type' => 'text',
    'input_id' => 'brand_name',
    'input_name' => 'brand_name',
    'input_value' => '',
    'path' => '',
    'message' => '',
    ]) --}}

    {{-- Modal add ProductType --}}
    {{-- @include('includes.modal_input', [
    'modal_name' => 'addProductType',
    'form_action' => '',
    'form_method' => 'post',
    'modal_title' => 'Thêm loại sản phẩm',
    'label_title' => 'Tên loại sản phẩm mới',
    'required' => 'required',
    'disabled' => '',
    'input_type' => 'text',
    'input_id' => 'product_type_name',
    'input_name' => 'product_type_name',
    'input_value' => '',
    'path' => '',
    'message' => '',
    ]) --}}

    {{-- Modal add Categpry --}}
    {{-- @include('includes.modal_input', [
    'modal_name' => 'addCategpry',
    'form_action' => '',
    'form_method' => 'post',
    'modal_title' => 'Thêm thể loại',
    'label_title' => 'Tên thể loại mới',
    'required' => 'required',
    'disabled' => '',
    'input_type' => 'text',
    'input_id' => 'category_name',
    'input_name' => 'category_name',
    'input_value' => '',
    'path' => '',
    'message' => '',
    ]) --}}

@endsection

@section('js')
    {{-- <script>
        let table = document.getElementsByTagName('table')[0];
        let mytable = new JSTable('table');
    </script> --}}

    <script src="{{ asset('js/create.js') }}"></script>
    <script src="{{ asset('js/photo.js') }}"></script>
@endsection
