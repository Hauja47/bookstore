@extends('templates.template', [
'title'=> 'Sửa khách hàng',
'main_header'=> 'Sửa khách hàng',

'active_dashboard' => '',
'open_invoice' => '',
'active_invoice' => '',
'active_return_good' => '',
'open_product' => '',
'active_product' => '',
'active_goods_receipt' => '',
'active_provider' => '',
'active_customer' => 'active',
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
        <form {{ route('customers.edit', ['customer'=> $customer]) }}" method="post" id="form-main" enctype="multipart/form-data">
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
                    <button type="submit" class="btn-function btn-function__save">
                        {{-- <i class='btn-function-icon btn-function__add-icon bx bx-plus' ></i> --}}
                        <!-- <i class='btn-function-icon bx bx-plus-circle' ></i> -->
                        Lưu
                    </button>
                </div>
            </div>
            <!-- END  -->

            @php
                $id = $customer->id;
                $full_name = $customer->full_name;
                $phone_number = $customer->phone_number;
                $email = $customer->email;
                $address = $customer->address;
                $debt = $customer->debt;
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
                                    'input_id' => 'id',
                                    'input_name' => 'id',
                                    'input_value' => 'KH'.$id,
                                    'message' => '',
                                    ])
                                </div>
                                <div class="col l-12 md-12 c-12">
                                    @include('includes.input', [
                                    'label_title' => 'Tên khách hàng',
                                    'required' => 'required',
                                    'disabled' => '',
                                    'input_type' => 'text',
                                    'input_id' => 'full_name',
                                    'input_name' => 'full_name',
                                    'input_value' => $full_name,
                                    'message' => '',
                                    ])
                                </div>
                                <div class="col l-6 md-6 c-12">
                                    @include('includes.input', [
                                    'label_title' => 'Số điện thoại',
                                    'required' => 'required',
                                    'disabled' => '',
                                    'input_type' => 'tel',
                                    'input_id' => 'phone_number',
                                    'input_name' => 'phone_number',
                                    'input_value' => $phone_number,
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
                                    'input_name' => 'email',
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
                                    'input_name' => 'address',
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
                                    'input_id' => 'debt',
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

    <script src="{{ asset('js/product_add') }}"></script>
@endsection
