@extends('templates.template', [
'title'=> 'Sửa Thông tin hoá đơn',
'main_header'=> 'Sửa Thông tin hoá đơn',

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
        <form action="{{ route('invoices.edit', ['invoice'=> $invoice]) }}" method="post" id="form-main" enctype="multipart/form-data">
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
                        Thoát
                    </a>
                    <button type="submit" class="btn-function btn-function__save">
                        Lưu
                    </button>
                </div>
            </div>
            <!-- END  -->

            @php
                $id = $invoice->id;
                $customer_id = $invoice->customer->id;
                $employee_id = $invoice->employee->id;
                $employee_name = $invoice->employee->full_name;

                // dd($invoice->employee);

                $total_price = $invoice->total;
                $paid = $invoice->paid;
                $balance = $invoice->balance;
            @endphp
            {{-- @foreach (\App\Models\Employee::all() as $employee)
                @if ($employee->id == $employee_id)
                    {{ $employee_name = $employee->name;  }}
                @endif
            @endforeach --}}

            {{-- FORM --}}
            <div class="row grid">
                <!-- FORM CREATE invoice -->
                <div class="col l-4 md-12 c-12 ">
                    <div class="box info-general">
                        <div class="box-header">
                            Thông tin chung
                        </div>
                        <div class="box-body">
                            <div class="input-wrapper">
                                <label for="" class="input-label">
                                    Khách hàng <span class="required">*</span>
                                </label>
                                <select class="header__search-select" name="customer_id" id="customer_id" disabled>
                                    <option hidden value=""></option>
                                    @foreach (\App\Models\Customer::all() as $customer)
                                        <option value="{{ $customer->id }}" {{ ($customer_id == $customer->id) ? 'selected' : '' }}>
                                            {{ $customer->full_name . ' - ' . $customer->phone_number }}</option>
                                    @endforeach
                                </select>
                                @error('customer_id')
                                    <p class="error-msg">{{ $message }}</p>
                                    {{-- <p class="error-msg">Trường này không được trống</p> --}}
                                @enderror
                            </div>
                            @include('includes.input', [
                                    'label_title' => 'Nhân viên thực hiện',
                                    'required' => 'required',
                                    'disabled' => 'readonly',
                                    'input_type' => 'text',
                                    'input_id' => 'employee_name',
                                    'input_name' => 'employee_name',
                                    'input_value' => $employee_name,
                                    'message' => '',
                                    ])

                                @include('includes.input', [
                                'label_title' => 'Ngày tạo đơn',
                                'required' => 'required',
                                'disabled' => 'readonly',
                                'input_type' => 'datetime',
                                'input_id' => 'created_at',
                                'input_name' => 'created_at',
                                'input_value' => \Carbon\Carbon::parse($invoice->created_at)->format("H:i d/m/Y"),
                                'message' => '',
                                ])
                        </div>
                    </div>
                    {{-- <div class="box info-general">
                        <div class="box-header">
                            Chọn sản phẩm
                            <a href="javascript:void(0)" class="btn-function btn-function__add" id="btn-move">
                                Cho vào danh sách
                            </a>
                        </div>
                        <div class="box-body">
                            <div class="input-wrapper">
                                <select class="header__search-select" name="product" id="product">
                                    <option hidden value=""></option>
                                    @foreach (\App\Models\Product::all() as $product)
                                        <option value="{{ $product->id }}" {{ ($product_id == $product->id) ? 'selected' : ''}}>
                                            {{ $product->name . ' - ' . $product->version }}</option>
                                    @endforeach
                                </select>
                                @error('product')
                                    <p class="error-msg">{{ $message }}</p>
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
                                    'input_value' => '',
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
                                    'input_value' => '',
                                    'message' => '',
                                    ])
                                </div>
                            </div>
                        </div>
                    </div> --}}
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
                                        <input type="number" readonly placeholder="" value="{{ $total_price }}" name="total_price"
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
                                    'input_value' => $paid,
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
                                    'input_value' => $balance,
                                    'message' => '',
                                    ])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col l-8 md-12 c-12">
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
                                    @foreach (\App\Models\InvoiceDetail::all() as $invoice_detail)
                                        @if ($invoice_detail->invoice->id == $id)
                                        <tr>
                                            <td>
                                                <input hidden value="{{ $invoice_detail->product->id }}" name="product_id[]">
                                                {{ $invoice_detail->product->name }}
                                            </td>
                                            <td>{{ $invoice_detail->product->version }}</td>
                                            <td>{{ $invoice_detail->product->brand->name }}</td>
                                            <td>
                                                <input hidden value="{{ $invoice_detail->cost }}" name="cost[]">
                                                {{ $invoice_detail->cost.'đ' }}
                                            </td>
                                            <td>
                                                <input hidden value="{{ $invoice_detail->quantity }}" name="quantity[]">
                                                {{ $invoice_detail->quantity }}
                                            </td>
                                            <td>
                                            <input hidden value="{{ $invoice_detail->total }}" name="total[]">
                                                {{ $invoice_detail->total.'đ' }}
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach

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

    {{-- Modal add invoiceType --}}
    {{-- @include('includes.modal_input', [
    'modal_name' => 'addinvoiceType',
    'form_action' => '',
    'form_method' => 'post',
    'modal_title' => 'Thêm loại sản phẩm',
    'label_title' => 'Tên loại sản phẩm mới',
    'required' => 'required',
    'disabled' => '',
    'input_type' => 'text',
    'input_id' => 'invoice_type_name',
    'input_name' => 'invoice_type_name',
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
    <script src="{{ asset('js/receipt_edit.js') }}"></script>
@endsection
