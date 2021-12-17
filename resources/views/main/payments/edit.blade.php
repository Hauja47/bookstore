@extends('templates.template', [
'title'=> 'Sửa phiếu chi',
'main_header'=> 'Sửa phiếu chi',

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
'active_payment' => 'active',
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
    <style>
        #receiver_names_div .input-wrapper {
            display: none;
        }

    </style>
@endsection

@section('main-content')
    <div class="main-content">
        <form action="{{ route('payments.create') }}" method="post" id="form-main" enctype="multipart/form-data">
            @csrf
            <!-- FUNCTION BUTTON -->
            <div class="row main-function">
                <div class="col l-6 md-6 c-6">
                    <a href="{{ route('payments.index') }}" class="btn-function btn-function__back">
                        <i class='btn-function-icon btn-function__back-icon bx bx-chevron-left'></i>
                        Quay lại danh sách phiếu chi
                    </a>
                </div>
                <div class="col l-6 md-6 c-6 {{ ($payment->can_delete != 1) ? 'd-none' : ''}}">
                    <a href="{{ route('payments.index') }}" class="btn-function btn-function__exit">
                        Thoát
                    </a>
                    <button type="submit" class="btn-function btn-function__save">
                        Lưu
                    </button>
                </div>
            </div>
            <!-- END  -->

            @php
                $id = $payment->id;
                $receiver_type = $payment->receiver_type;
                $receiver_id = $payment->receiver_id;
                $receiver_name = '';

                $employee_id = $payment->employee_id;
                $money = $payment->money;
                $note = $payment->note;


            @endphp

            {{-- FORM --}}
            <div class="row">
                <!-- FORM ADD CUSTOMER -->
                <div class="col l-8 md-10 c-12 l-o-2 md-o-1">
                    <div class="box info-general">
                        <div class="box-header">
                            Thông tin phiếu chi
                        </div>
                        <div class="box-body">
                            <div class="grid row">
                                <div class="col l-6 md-6 c-12">
                                    @include('includes.input', [
                                    'label_title' => 'Mã phiếu chi',
                                    'required' => 'required',
                                    'disabled' => 'disabled',
                                    'input_type' => 'text',
                                    'input_id' => 'id',
                                    'input_name' => 'id',
                                    'input_value' => 'PC'.$id,
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
                                    'input_value' => \Carbon\Carbon::parse($payment->created_at)->format("H:i d/m/Y"),
                                    'message' => '',
                                    ])
                                </div>
                                <div class="col l-6 md-6 c-12">
                                    <div class="input-wrapper">
                                        <label for="" class="input-label">
                                            Đối tượng nhận <span class="required">*</span>
                                        </label>

                                        <select class="header__search-select" name="receiver_type" id="receiver_type" {{ ($payment->can_delete != 1) ? 'disabled' : '' }}>
                                            <option hidden value=""></option>
                                            <option value="Nhân viên"
                                                {{ $receiver_type == 'Nhân viên' ? 'selected' : '' }}>
                                                Nhân viên
                                            </option>
                                            <option value="Khách hàng"
                                                {{ $receiver_type == 'Khách hàng' ? 'selected' : '' }}>
                                                Khách hàng</option>
                                            <option value="Nhà cung cấp"
                                                {{ $receiver_type == 'Nhà cung cấp' ? 'selected' : '' }}>
                                                Nhà cung cấp</option>
                                        </select>
                                        @error('receiver_type')
                                            <p class="error-msg">{{ $message }}</p>
                                            {{-- <p class="error-msg">Trường này không được trống</p> --}}
                                        @enderror
                                    </div>
                                </div>
                                <div class="col l-6 md-6 c-12 " id="receiver_names_div" >

                                    {{-- Nhân viên --}}
                                    <div class="input-wrapper {{ $receiver_type == 'Nhân viên' ? 'd-block' : ''}}" id="">
                                        <label for="" class="input-label">
                                            Tên đối tượng <span class="required">*</span>
                                        </label>

                                        <select class="header__search-select" name="receiver_employee_id"
                                            id="receiver_employee_id" {{ ($payment->can_delete != 1) ? 'disabled' : ''}}>
                                            <option hidden value=""></option>
                                            @foreach (\App\Models\Employee::all() as $employee)
                                                <option
                                                value="{{ $employee->id }}
                                                {{ ($receiver_type == 'Nhân viên' && $employee->id == $receiver_id) ? 'selected' : '' }}"
                                                >
                                                    {{ $employee->full_name . ' _ ' . $employee->phone_number }}</option>
                                            @endforeach
                                        </select>
                                        @error('receiver_employee_id')
                                            <p class="error-msg">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- Khách hàng --}}
                                    <div class="input-wrapper {{ $receiver_type == 'Khách hàng' ? 'd-block' : ''}}" id="">
                                        <label for="" class="input-label">
                                            Tên đối tượng <span class="required">*</span>
                                        </label>

                                        <select class="header__search-select" name="receiver_customer_id"
                                            id="receiver_customer_id" {{ ($payment->can_delete != 1) ? 'disabled' : ''}}>
                                            <option hidden value=""></option>
                                            @foreach (\App\Models\Customer::all() as $customer)
                                                <option
                                                value="{{ $customer->id }}"
                                                {{ ($receiver_type == 'Khách hàng' && $customer->id == $receiver_id) ? 'selected' : '' }}
                                                >
                                                    {{ $customer->full_name . ' _ ' . $customer->phone_number }}</option>
                                            @endforeach
                                        </select>
                                        @error('receiver_customer_id')
                                            <p class="error-msg">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- Nhà cung cấp --}}
                                    <div class="input-wrapper {{ $receiver_type == 'Nhà cung cấp' ? 'd-block' : ''}}" id="">
                                        <label for="" class="input-label">
                                            Tên đối tượng <span class="required">*</span>
                                        </label>

                                        <select class="header__search-select" name="receiver_provider_id"
                                            id="receiver_provider_id" {{ ($payment->can_delete != 1) ? 'disabled' : ''}}>
                                            <option hidden value=""></option>
                                            @foreach (\App\Models\Provider::all() as $provider)
                                                <option
                                                value="{{ $provider->id }}"
                                                {{ ($receiver_type == 'Nhà cung cấp' && $provider->id == $receiver_id) ? 'selected' : '' }}
                                                >
                                                    {{ $provider->name . ' _ ' . $provider->phone_number }}</option>
                                            @endforeach
                                        </select>
                                        @error('receiver_provider_id')
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
                                    'label_title' => 'Số tiền chi (VND)',
                                    'required' => 'required',
                                    'disabled' => ($payment->can_delete != 1) ? 'disabled' : '',
                                    'input_type' => 'number',
                                    'input_id' => 'money',
                                    'input_name' => 'money',
                                    'input_value' => $payment->money,
                                    'message' => '',
                                    ])
                                </div>
                                <div class="col l-12 md-12 c-12">
                                    @include('includes.input', [
                                    'label_title' => 'Ghi chú',
                                    'required' => 'required',
                                    'disabled' => ($payment->can_edit_note == 0) ? 'disabled' : '',
                                    'input_type' => 'text',
                                    'input_id' => 'text',
                                    'input_name' => 'text',
                                    'input_value' => $payment->note,
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

    <script src="{{ asset('js/budget_add.js') }}"></script>
@endsection
