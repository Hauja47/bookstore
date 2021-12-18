@extends('templates.template', [
'title'=> 'Thông tin đơn nhập kho',
'main_header'=> 'Thông tin đơn nhập kho',

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
    <link rel="stylesheet" href="{{ asset('css/goods_receipt_list.css') }}">
@endsection

@section('main-content')
    <div class="main-content">
        <form action="{{ route('goods_receipts.edit', ['goods_receipt'=> $goods_receipt]) }}" method="post" id="form-main" enctype="multipart/form-data">
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
                    {{-- <a href="{{ route('goods_receipts.index') }}" class="btn-function btn-function__exit">
                        Thoát
                    </a>
                    <button type="submit" class="btn-function btn-function__save">
                        Lưu
                    </button> --}}
                </div>
            </div>
            <!-- END  -->

            @php
                $id = $goods_receipt->id;
                $provider_id = $goods_receipt->provider->id;
                $employee_id = $goods_receipt->employee->id;
                $employee_name = $goods_receipt->employee->full_name;

                // dd($goods_receipt->employee);

                $total_price = $goods_receipt->total_price;
            @endphp
            {{-- @foreach (\App\Models\Employee::all() as $employee)
                @if ($employee->id == $employee_id)
                    {{ $employee_name = $employee->name;  }}
                @endif
            @endforeach --}}

            {{-- FORM --}}
            <div class="row grid">
                <!-- FORM CREATE goods_receipt -->
                <div class="col l-4 md-12 c-12 ">
                    <div class="box info-general">
                        <div class="box-header">
                            Thông tin chung
                        </div>
                        <div class="box-body">
                                @include('includes.input', [
                                'label_title' => 'Mã đơn nhập kho',
                                'required' => 'required',
                                'disabled' => 'disabled',
                                'input_type' => 'text',
                                'input_id' => 'id',
                                'input_name' => 'id',
                                'input_value' => 'DNK'.$id,
                                'message' => '',
                                ])
                            <div class="input-wrapper">
                                <label for="" class="input-label">
                                    Nhà cung cấp <span class="required">*</span>
                                </label>
                                <select class="header__search-select" name="provider" id="provider" disabled>
                                    <option hidden value=""></option>
                                    @foreach (\App\Models\Provider::all() as $provider)
                                        <option value="{{ $provider->id }}" {{ ($provider_id == $provider->id) ? 'selected' : '' }}>
                                            {{ $provider->name . ' - ' . $provider->phone_number }}</option>
                                    @endforeach
                                </select>
                                @error('provider')
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
                                'input_value' => \Carbon\Carbon::parse($goods_receipt->created_at)->format("H:i d/m/Y"),
                                'message' => '',
                                ])
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
                                        <input type="number" readonly placeholder="" value="{{ $total_price }}" name="total_price"
                                            id="total_price" class="input-text  text-center p-3 font-weight-bold" min="0"
                                            step="1000">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col l-8 md-12 c-12">
                    <div class="box info-general">
                        <div class="box-header">
                            Sản phẩm đã nhập
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
                                    @foreach (\App\Models\GoodsReceipt::find($goods_receipt->id)->details as $goods_receipt_detail)
                                        {{-- @if ($goods_receipt_detail->goods_receipt_id == $id) --}}
                                        <tr>
                                            <td>
                                                <input hidden value="{{ $goods_receipt_detail->product->id }}" name="product_id[]">
                                                {{ $goods_receipt_detail->product->name }}
                                            </td>
                                            <td>{{ $goods_receipt_detail->product->version }}</td>
                                            <td>{{ $goods_receipt_detail->product->brand->name }}</td>
                                            <td>
                                                <input hidden value="{{ $goods_receipt_detail->cost }}" name="cost[]">
                                                {{ $goods_receipt_detail->cost.'đ' }}
                                            </td>
                                            <td>
                                                <input hidden value="{{ $goods_receipt_detail->quantity }}" name="quantity[]">
                                                {{ $goods_receipt_detail->quantity }}
                                            </td>
                                            <td>
                                            <input hidden value="{{ $goods_receipt_detail->total }}" name="total[]">
                                                {{ $goods_receipt_detail->total.'đ' }}
                                            </td>
                                        </tr>
                                        {{-- @endif --}}
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="box info-general">
                        <div class="box-header">
                            Phiếu chi
                        </div>
                        <div class="box-body">
                            <table class="main-product-table">
                                <thead>
                                    <tr>
                                        <th>Mã phiếu chi</th>
                                        <th>Nhân viên thực hiện</th>
                                        <th>Ghi chú</th>
                                        <th>Số tiền chi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $payment = \App\Models\GoodsReceipt::find($goods_receipt->id)->payment
                                    @endphp
                                    <tr>
                                        <td>PC{{ $payment->id }}</td>
                                        <td>
                                            {{ $payment->employee->full_name }}
                                        </td>
                                        <td>
                                            {{ $payment->note }}
                                        </td>
                                        <td>{{ number_format($payment->money) . 'đ' }}</td>
                                    </tr>

                                </tbody>
                            </table>
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

@endsection

@section('js')
    <script>
        // let tables = document.getElementsByTagName('table');
        // let mytables = [];
        // for (let i = 0; i < tables.length; i++) {
        //     mytables[i] = new JSTable(tables[i]);
        // }
    </script>

    <script src="{{ asset('js/product_add') }}"></script>
    <script src="{{ asset('js/photo.js') }}"></script>
    <script src="{{ asset('js/receipt_edit.js') }}"></script>
@endsection
