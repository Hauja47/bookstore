@extends('templates.template', [
'title'=> 'Thêm khách hàng',
'main_header'=> 'Thêm khách hàng',

'active_dashboard' => '',
'open_order' => '',
'active_order' => '',
'active_refund' => '',
'open_product' => '',
'active_product' => '',
'active_invoice' => '',
'active_supplier' => '',
'active_customer' => 'active',
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
                    <a href="{{ route('customers.index') }}" class="btn-function btn-function__back">
                        <i class='btn-function-icon btn-function__back-icon bx bx-chevron-left'></i>
                        Quay lại danh sách khách hàng
                    </a>
                </div>
                <div class="col l-6 md-6 c-6">
                    <a href="{{ route('customers.index') }}" class="btn-function btn-function__exit">
                        {{-- <i class='btn-function-icon btn-function__add-icon bx bx-plus' ></i> --}}
                        <!-- <i class='btn-function-icon bx bx-plus-circle' ></i> -->
                        Thoát
                    </a>
                    <button type="submit" href="{{ route('customers.index') }}" class="btn-function btn-function__save">
                        {{-- <i class='btn-function-icon btn-function__add-icon bx bx-plus' ></i> --}}
                        <!-- <i class='btn-function-icon bx bx-plus-circle' ></i> -->
                        Lưu
                    </button>
                </div>
            </div>
            <!-- END  -->

            @php
                $customer_code = 'KH01';
                $customer_name = 'Nguyễn Duy Trì';
                $phone = '0345678912';
                $email = 'giadinh@company.com';
                $address = 'Quận 4, Thành phố HCM';
                $debt = 0;
            @endphp

            {{-- FORM --}}
            <div class="row">
                <!-- FORM ADD CUSTOMER -->
                <div class="col l-8 md-10 c-12 l-o-2 md-o-1">
                    <div class="box info-general">
                        <div class="box-header">
                            Thông tin khách hàng
                        </div>
                        <div class="box-body">
                            <div class="grid row">
                                <div class="col l-6 md-6 c-12">
                                    @include('includes.input', [
                                    'label_title' => 'Mã khách hàng',
                                    'required' => 'required',
                                    'disabled' => 'disabled',
                                    'input_type' => 'text',
                                    'input_id' => 'customer_code',
                                    'input_name' => 'MaKH',
                                    'input_value' => $customer_code,
                                    'message' => '',
                                    ])
                                </div>
                                <div class="col l-12 md-12 c-12">
                                    @include('includes.input', [
                                    'label_title' => 'Tên khách hàng',
                                    'required' => 'required',
                                    'disabled' => '',
                                    'input_type' => 'text',
                                    'input_id' => 'customer_name',
                                    'input_name' => 'HoTen',
                                    'input_value' => $customer_name,
                                    'message' => '',
                                    ])
                                </div>
                                <div class="col l-6 md-6 c-12">
                                    @include('includes.input', [
                                    'label_title' => 'Số điện thoại',
                                    'required' => 'required',
                                    'disabled' => '',
                                    'input_type' => 'tel',
                                    'input_id' => 'phone',
                                    'input_name' => 'SDT',
                                    'input_value' => $phone,
                                    'message' => '',
                                    ])
                                </div>
                                <div class="col l-6 md-6 c-12">
                                    @include('includes.input', [
                                    'label_title' => 'Email',
                                    'required' => 'required',
                                    'disabled' => '',
                                    'input_type' => 'email',
                                    'input_id' => 'email',
                                    'input_name' => 'Email',
                                    'input_value' => $email,
                                    'message' => '',
                                    ])
                                </div>
                                <div class="col l-12 md-12 c-12">
                                    @include('includes.input', [
                                    'label_title' => 'Địa chỉ',
                                    'required' => 'required',
                                    'disabled' => '',
                                    'input_type' => 'text',
                                    'input_id' => 'address',
                                    'input_name' => 'DiaChi',
                                    'input_value' => $address,
                                    'message' => '',
                                    ])
                                </div>
                                <div class="col l-6 md-6 c-12 l-o-6 md-o-6">
                                    @include('includes.input', [
                                    'label_title' => 'Số tiền nợ (VND)',
                                    'required' => 'required',
                                    'disabled' => 'disabled',
                                    'input_type' => 'number',
                                    'input_id' => 'email',
                                    'input_name' => 'debt',
                                    'input_value' => $debt,
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

    <script src="{{ asset('js/create.js') }}"></script>
@endsection
