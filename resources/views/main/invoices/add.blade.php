@extends('templates.template', [
'title'=> 'Tạo đơn hàng',
'main_header'=> 'Tạo đơn hàng',

'active_dashboard' => '',
'open_invoice' => 'sidebar__menu-dropdown-icon--open',
'active_invoice' => 'active',
'active_return_good' => '',
'open_product' => '',
'active_product' => '',
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
    <link rel="stylesheet" href="{{ asset('css/invoice_list.css') }}">
@endsection

@section('main-content')
    <div class="main-content">
        <form action="{{ route('invoices.create') }}" method="post" id="form-main" enctype="multipart/form-data">
            @csrf
            <!-- FUNCTION BUTTON -->
            <div class="row main-function">
                <div class="col l-6 md-6 c-6">
                    <a href="{{ route('invoices.index') }}" class="btn-function btn-function__back">
                        <i class='btn-function-icon btn-function__back-icon bx bx-chevron-left'></i>
                        Quay lại danh sách hoá đơn
                    </a>
                </div>
                <div class="col l-6 md-6 c-6">
                    <a href="{{ route('invoices.index') }}" class="btn-function btn-function__exit">
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
                <!-- FORM CREATE invoice -->
                <div class="col l-4 md-5 c-12 ">
                    <div class="box info-general">
                        <div class="box-header">
                            Chọn khách hàng
                        </div>
                        <div class="box-body">
                            <div class="input-wrapper">
                                <select class="header__search-select" name="customer_id" id="customer_id">
                                    <option hidden value=""></option>
                                    @foreach (\App\Models\Customer::all() as $customer)
                                        <option value="{{ $customer->id }}">
                                            {{ $customer->full_name . ' _ ' . $customer->phone_number }}</option>
                                    @endforeach
                                </select>
                                @error('customer_id')
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
                                            {{ $product->name.' _ '.$product->version.' _ '.$product->brand->name.' _ '.$product->price }}</option>
                                            @php
                                                $price = $product->price;
                                            @endphp
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
                                    'input_id' => 'quantity_input',
                                    'input_name' => 'quantity_input',
                                    'input_value' => '1',
                                    'message' => '',
                                    ])
                                </div>
                                <div class="col l-5 md-5 c-12 l-o-2 md-o-2">
                                    @include('includes.input', [
                                    'label_title' => 'Đơn giá',
                                    'required' => 'required',
                                    'disabled' => 'readonly',
                                    'input_type' => 'number',
                                    'input_id' => 'cost_input',
                                    'input_name' => 'cost_input',
                                    'input_value' => $price,
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

                            <div class="row grid">
                                <div class="col l-5 md-5 c-12">
                                    @include('includes.input', [
                                    'label_title' => 'Thanh toán (VND)',
                                    'required' => 'required',
                                    'disabled' => '',
                                    'input_type' => 'number',
                                    'input_id' => 'paid',
                                    'input_name' => 'paid',
                                    'input_value' => 0,
                                    'message' => '',
                                    ])
                                </div>
                                <div class="col l-5 md-5 c-12 l-o-2 md-o-2">
                                    @include('includes.input', [
                                    'label_title' => 'Còn lại (VND)',
                                    'required' => '',
                                    'disabled' => 'readonly',
                                    'input_type' => 'number',
                                    'input_id' => 'balance',
                                    'input_name' => 'balance',
                                    'input_value' => '0',
                                    'message' => '',
                                    ])
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
                        </div>
                    </div>
                </div>
                <!-- END invoice TABLE -->
            </div>
            {{-- END FORM --}}
        </form>
    </div>
@endsection

@section('modal')

@endsection

@section('js')
    <script>
        // let tables = document.getElementsByTagName('table');
        // let mytables = [];
        // for (let i = 0; i < tables.length; i++) {
        //     mytables[i] = new JSTable(tables[i]);
        // }
    </script>

    {{-- <script src="{{ asset('js/create.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/photo.js') }}"></script> --}}
    <script src="{{ asset('js/invoice_add.js') }}"></script>
@endsection
