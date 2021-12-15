@extends('templates.template', [
'title'=> 'Tạo đơn nhập kho',
'main_header'=> 'Tạo đơn nhập kho',

'active_dashboard' => '',
'open_invoice' => '',
'active_invoice' => '',
'active_return_good' => '',
'open_product' => 'sidebar__menu-dropdown-icon--open',
'active_product' => '',
'active_goods_receipt' => 'active',
'active_provider' => '',
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
    <link rel="stylesheet" href="{{ asset('css/goods_receipt_list.css') }}">
@endsection

@section('main-content')
    <div class="main-content">
        <form action="{{ route('goods_receipts.create') }}" method="post" id="form-main" enctype="multipart/form-data">
            @csrf
            <!-- FUNCTION BUTTON -->
            <div class="row main-function">
                <div class="col l-6 md-6 c-6">
                    <a href="{{ route('goods_receipts.index') }}" class="btn-function btn-function__back">
                        <i class='btn-function-icon btn-function__back-icon bx bx-chevron-left'></i>
                        Quay lại đơn nhập kho
                    </a>
                </div>
                <div class="col l-6 md-6 c-6">
                    <a href="{{ route('goods_receipts.index') }}" class="btn-function btn-function__exit">
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
            <div class="row grid">
                <!-- FORM CREATE goods_receipt -->
                <div class="col l-4 md-5 c-12 ">
                    <div class="box info-general">
                        <div class="box-header">
                            Chọn nhà cung cấp
                        </div>
                        <div class="box-body">
                            <div class="input-wrapper">
                                <select class="header__search-select" name="provider_id" id="provider_id">
                                    <option hidden value=""></option>
                                    @foreach (\App\Models\Provider::all() as $provider)
                                        <option value="{{ $provider->id }}">
                                            {{ $provider->name . ' - ' . $provider->phone_number }}</option>
                                    @endforeach
                                </select>
                                @error('provider_id')
                                    <p class="error-msg">{{ $message }}</p>
                                    {{-- <p class="error-msg">Trường này không được trống</p> --}}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="box info-general">
                        <div class="box-header">
                            Chọn sản phẩm
                            <a href="javascript:void(0)" class="btn-function btn-function__add" id="btn-move">
                                <!-- <i class='btn-function-icon bx bx-plus-circle' ></i> -->
                                Cho vào danh sách
                            </a>
                        </div>
                        <div class="box-body">
                            <div class="input-wrapper">
                                <select class="header__search-select" name="product" id="product">
                                    <option hidden value=""></option>
                                    @foreach (\App\Models\Product::all() as $product)
                                        <option value="{{ $product->id }}">
                                            {{ $product->name . ' - ' . $product->version . ' - ' . $product->brand->name }}</option>
                                    @endforeach
                                </select>
                                @error('product')
                                    <p class="error-msg">{{ $message }}</p>
                                    {{-- <p class="error-msg">Trường này không được trống</p> --}}
                                @enderror
                            </div>
                            <div class="row grid">
                                <div class="col l-5 md-5 c-12">
                                    @include('includes.input', [
                                    'label_title' => 'Số lượng',
                                    'required' => 'required',
                                    'disabled' => '',
                                    'input_type' => 'number',
                                    'input_id' => 'quantity',
                                    'input_name' => 'quantity',
                                    'input_value' => '1',
                                    'message' => '',
                                    ])
                                </div>
                                <div class="col l-5 md-5 c-12 l-o-2 md-o-2">
                                    @include('includes.input', [
                                    'label_title' => 'Đơn giá',
                                    'required' => 'required',
                                    'disabled' => '',
                                    'input_type' => 'number',
                                    'input_id' => 'cost',
                                    'input_name' => 'cost',
                                    'input_value' => '1000',
                                    'message' => '',
                                    ])
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box info-general">
                        <div class="box-header justify-content-center">
                            Tổng tiền (VND)
                        </div>
                        <div class="box-body">

                            <div class="row grid">
                                <div class="col l-8 md-8 c-12 l-o-2 md-o-2">
                                    <div class="input-wrapper">
                                        <label for="total_price" class="input-label d-none">
                                            <span class="d-none">*</span>
                                        </label>
                                        <input type="number" readonly placeholder="" value="0" name="total_price"
                                            id="total_price" class="input-text  text-center p-3 font-weight-bold" min="0"
                                            step="1000">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col l-8 md-7 c-12">
                    <div class="box info-general">
                        <div class="box-header">
                            Sản phẩm đã thêm
                        </div>
                        <div class="box-body">
                            <table class="main-product-table">
                                <thead>
                                    <tr>
                                        <th>Tên sản phẩm</th>
                                        <th>Phiên bản</th>
                                        <th>NXB/Nhãn hiệu</th>
                                        <th>Đơn giá</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach (\App\Models\Product::all() as $product)
                                        <tr>
                                            <td>
                                                {{ $product->name }}
                                            </td>
                                            <td>{{ $product->version }}</td>

                                            <td>

                                            </td>
                                            <td>

                                            </td>
                                            <td>
                                            </td>
                                        </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>
                            @error('product_id')
                            <p class="error-msg">{{ $message }}</p>
                            {{-- <p class="error-msg">Trường này không được trống</p> --}}
                        @enderror
                        </div>
                    </div>
                </div>
                <!-- END goods_receipt TABLE -->
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

    {{-- Modal add goods_receiptType --}}
    {{-- @include('includes.modal_input', [
    'modal_name' => 'addgoods_receiptType',
    'form_action' => '',
    'form_method' => 'post',
    'modal_title' => 'Thêm loại sản phẩm',
    'label_title' => 'Tên loại sản phẩm mới',
    'required' => 'required',
    'disabled' => '',
    'input_type' => 'text',
    'input_id' => 'goods_receipt_type_name',
    'input_name' => 'goods_receipt_type_name',
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
    <script>
        // let tables = document.getElementsByTagName('table');
        // let mytables = [];
        // for (let i = 0; i < tables.length; i++) {
        //     mytables[i] = new JSTable(tables[i]);
        // }
    </script>

    <script src="{{ asset('js/create.js') }}"></script>
    <script src="{{ asset('js/photo.js') }}"></script>
    <script src="{{ asset('js/receipt_add.js') }}"></script>
@endsection
