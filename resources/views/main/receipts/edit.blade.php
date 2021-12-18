@extends('templates.template', [
'title'=> (($receipt->can_delete != 1) ? 'Thông tin' : 'Sửa').' phiếu thu',
'main_header'=> (($receipt->can_delete != 1) ? 'Thông tin' : 'Sửa').' phiếu thu',

'active_dashboard' => '',
'open_invoice' => '',
'active_invoice' => '',
'active_return_good' => '',
'open_product' => '',
'active_product' => '',
'active_goods_receipt' => '',
'active_provider' => '',
'active_customer' => '',
'open_budget' => 'sidebar__menu-dropdown-icon--open',
'active_payment' => '',
'active_receipt' => 'active',
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
    <style>
        #giver_names_div .input-wrapper {
            display: none;
        }

    </style>
@endsection

@section('main-content')
    <div class="main-content">
        <form action="{{ route('receipts.edit', ['receipt' => $receipt]) }}" method="post" id="form-main" enctype="multipart/form-data">
            @csrf
            <!-- FUNCTION BUTTON -->
            <div class="row main-function">
                <div class="col l-6 md-6 c-6">
                    <a href="{{ route('receipts.index') }}" class="btn-function btn-function__back">
                        <i class='btn-function-icon btn-function__back-icon bx bx-chevron-left'></i>
                        Quay lại danh sách phiếu thu
                    </a>
                </div>
                <div class="col l-6 md-6 c-6 {{ ($receipt->can_delete != 1) ? 'd-none' : ''}}">
                    <a href="{{ route('receipts.index') }}" class="btn-function btn-function__exit">
                        Thoát
                    </a>
                    <button type="submit" class="btn-function btn-function__save">
                        Lưu
                    </button>
                </div>
            </div>
            <!-- END  -->

            @php
                $id = $receipt->id;
                $giver_type = $receipt->giver_type;
                $giver_id = $receipt->giver_id;
                $giver_name = '';

                $employee_id = $receipt->employee_id;
                $money = $receipt->money;
                $note = $receipt->note;


            @endphp

            {{-- FORM --}}
            <div class="row">
                <!-- FORM ADD CUSTOMER -->
                <div class="col l-8 md-10 c-12 l-o-2 md-o-1">
                    <div class="box info-general">
                        <div class="box-header">
                            Thông tin phiếu thu
                        </div>
                        <div class="box-body">
                            <div class="grid row">
                                <div class="col l-6 md-6 c-12">
                                    @include('includes.input', [
                                    'label_title' => 'Mã phiếu thu',
                                    'required' => 'required',
                                    'disabled' => 'disabled',
                                    'input_type' => 'text',
                                    'input_id' => 'id',
                                    'input_name' => 'id',
                                    'input_value' => 'PT'.$id,
                                    'message' => '',
                                    ])
                                </div>
                                <div class="col l-6 md-6 c-12">
                                    @include('includes.input', [
                                    'label_title' => 'Ngày tạo đơn',
                                    'required' => 'required',
                                    'disabled' => 'readonly',
                                    'input_type' => 'datetime',
                                    'input_id' => 'created_at',
                                    'input_name' => 'created_at',
                                    'input_value' => \Carbon\Carbon::parse($receipt->created_at)->format("H:i d/m/Y"),
                                    'message' => '',
                                    ])
                                </div>
                                <div class="col l-6 md-6 c-12">
                                    <div class="input-wrapper">
                                        <label for="" class="input-label">
                                            Đối tượng gửi <span class="required">*</span>
                                        </label>

                                        <select class="header__search-select" name="giver_type" id="giver_type" disabled>
                                            <option hidden value=""></option>
                                            <option value="Nhân viên"
                                                {{ $giver_type == 'Nhân viên' ? 'selected' : '' }}>
                                                Nhân viên
                                            </option>
                                            <option value="Khách hàng"
                                                {{ $giver_type == 'Khách hàng' ? 'selected' : '' }}>
                                                Khách hàng</option>
                                            <option value="Nhà cung cấp"
                                                {{ $giver_type == 'Nhà cung cấp' ? 'selected' : '' }}>
                                                Nhà cung cấp</option>
                                        </select>
                                        @error('giver_type')
                                            <p class="error-msg">{{ $message }}</p>
                                            {{-- <p class="error-msg">Trường này không được trống</p> --}}
                                        @enderror
                                    </div>
                                </div>
                                <div class="col l-6 md-6 c-12 " id="giver_names_div" >

                                    {{-- Nhân viên --}}
                                    <div class="input-wrapper {{ $giver_type == 'Nhân viên' ? 'd-block' : ''}}" id="">
                                        <label for="" class="input-label">
                                            Tên đối tượng <span class="required">*</span>
                                        </label>

                                        <select class="header__search-select" name="giver_employee_id"
                                            id="giver_employee_id" disabled>
                                            <option hidden value=""></option>
                                            @foreach (\App\Models\Employee::all() as $employee)
                                                <option
                                                value="{{ $employee->id }}"
                                                {{ ($giver_type == 'Nhân viên' && $employee->id == $giver_id) ? 'selected' : '' }}
                                                >
                                                    {{ $employee->full_name . ' _ ' . $employee->phone_number }}</option>
                                            @endforeach
                                        </select>
                                        @error('giver_employee_id')
                                            <p class="error-msg">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- Khách hàng --}}
                                    <div class="input-wrapper {{ $giver_type == 'Khách hàng' ? 'd-block' : ''}}" id="">
                                        <label for="" class="input-label">
                                            Tên đối tượng <span class="required">*</span>
                                        </label>

                                        <select class="header__search-select" name="giver_customer_id"
                                            id="giver_customer_id" disabled>
                                            <option hidden value=""></option>
                                            @foreach (\App\Models\Customer::all() as $customer)
                                                <option
                                                value="{{ $customer->id }}"
                                                {{ ($giver_type == 'Khách hàng' && $customer->id == $giver_id) ? 'selected' : '' }}
                                                >
                                                    {{ $customer->full_name . ' _ ' . $customer->phone_number }}</option>
                                            @endforeach
                                        </select>
                                        @error('giver_customer_id')
                                            <p class="error-msg">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- Nhà cung cấp --}}
                                    <div class="input-wrapper {{ $giver_type == 'Nhà cung cấp' ? 'd-block' : ''}}" id="">
                                        <label for="" class="input-label">
                                            Tên đối tượng <span class="required">*</span>
                                        </label>

                                        <select class="header__search-select" name="giver_provider_id"
                                            id="giver_provider_id" disabled>
                                            <option hidden value=""></option>
                                            @foreach (\App\Models\Provider::all() as $provider)
                                                <option
                                                value="{{ $provider->id }}"
                                                {{ ($giver_type == 'Nhà cung cấp' && $provider->id == $giver_id) ? 'selected' : '' }}
                                                >
                                                    {{ $provider->name . ' _ ' . $provider->phone_number }}</option>
                                            @endforeach
                                        </select>
                                        @error('giver_provider_id')
                                            <p class="error-msg">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col l-6 md-6 c-12">
                                    {{-- Nhân viên thực hiện --}}
                                    <div class="input-wrapper" id="">
                                        <label for="" class="input-label">
                                            Nhân viên thực hiện <span class="required">*</span>
                                        </label>

                                        <select class="header__search-select" name="employee_id" id="employee_id" disabled>
                                            <option hidden value=""></option>
                                            @foreach (\App\Models\Employee::all() as $employee)
                                                <option value="{{ $employee->id }}" {{ ($employee->id == $employee_id) ? 'selected' : '' }}>
                                                    {{ $employee->full_name . ' _ ' . $employee->phone_number }}</option>
                                            @endforeach
                                        </select>
                                        @error('employee_id')
                                            <p class="error-msg">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col l-6 md-6 c-12">
                                    @include('includes.input', [
                                    'label_title' => 'Số tiền thu (VND)',
                                    'required' => 'required',
                                    'disabled' => ($receipt->can_delete != 1) ? 'disabled' : '',
                                    'input_type' => 'number',
                                    'input_id' => 'money',
                                    'input_name' => 'money',
                                    'input_value' => $receipt->money,
                                    'message' => '',
                                    ])
                                </div>
                                <div class="col l-12 md-12 c-12">
                                    @include('includes.input', [
                                    'label_title' => 'Ghi chú',
                                    'required' => 'required',
                                    'disabled' => ($receipt->can_edit_note == 0) ? 'disabled' : '',
                                    'input_type' => 'text',
                                    'input_id' => 'text',
                                    'input_name' => 'text',
                                    'input_value' => $receipt->note,
                                    'message' => '',
                                    ])
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- END customer TABLE -->
            </div>
            {{-- END FORM --}}
        </form>
    </div>
@endsection

@section('modal')

@endsection

@section('js')
    {{-- <script>
        let table = document.getElementsByTagName('table')[0];
        let mytable = new JSTable('table');
    </script> --}}

    <script src="{{ asset('js/receipt_add.js') }}"></script>
@endsection
