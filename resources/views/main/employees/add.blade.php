@extends('templates.template', [
'title'=> 'Thêm nhân viên',
'main_header'=> 'Thêm nhân viên',

'active_dashboard' => '',
'open_order' => '',
'active_order' => '',
'active_refund' => '',
'open_product' => '',
'active_product' => '',
'active_invoice' => '',
'active_provider' => '',
'active_customer' => '',
'open_budget' => '',
'active_expenditure' => '',
'active_revenue' => '',
'active_budget' => '',
'open_report' => '',
'active_report_stock' => '',
'active_report_dept' => '',
'active_employee' => 'active',
'open_setting' => '',
'active_regulation' => '',
])

@section('css')
    <link rel="stylesheet" href="{{ asset('css/list.css') }}">
    <link rel="stylesheet" href="{{ asset('css/add.css') }}">
@endsection

@section('main-content')
    <div class="main-content">
        <form action="{{ route('employees.create') }}" method="post" id="form-main" enctype="multipart/form-data">
            @csrf
            <!-- FUNCTION BUTTON -->
            <div class="row main-function">
                <div class="col l-6 md-6 c-6">
                    <a href="{{ route('employees.index') }}" class="btn-function btn-function__back">
                        <i class='btn-function-icon btn-function__back-icon bx bx-chevron-left'></i>
                        Quay lại danh sách nhân viên
                    </a>
                </div>
                <div class="col l-6 md-6 c-6">
                    <a href="{{ route('employees.index') }}" class="btn-function btn-function__exit">
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
                <!-- FORM ADD EMPLOYEE -->
                <div class="col l-7 md-12 c-12">
                    <div class="box info-general">
                        <div class="box-header">
                            Thông tin nhân viên
                        </div>
                        <div class="box-body">
                            <div class="grid row">
                                <div class="col l-12 md-12 c-12">
                                    @include('includes.input', [
                                    'label_title' => 'Tên nhân viên',
                                    'required' => 'required',
                                    'disabled' => '',
                                    'input_type' => 'text',
                                    'input_id' => 'full_name',
                                    'input_name' => 'full_name',
                                    'input_value' => '',
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
                                    'input_value' => '',
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
                                    'input_value' => '',
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
                                    'input_value' => '',
                                    'message' => '',
                                    ])
                                </div>
                                <div class="col l-6 md-6 c-12">
                                    @include('includes.input', [
                                    'label_title' => 'Ngày vào làm',
                                    'required' => 'required',
                                    'disabled' => '',
                                    'input_type' => 'date',
                                    'input_id' => 'created_at',
                                    'input_name' => 'created_at',
                                    'input_value' => date("Y-m-d"),
                                    'message' => '',
                                    ])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col l-5 md-12 c-12">
                    <div class="box info-general">
                        <div class="box-header">
                            Thông tin Tài khoản
                        </div>
                        <div class="box-body">
                            <div class="grid row">
                                <div class="col l-6 md-6 c-12">
                                    @include('includes.input', [
                                    'label_title' => 'Tài khoản',
                                    'required' => 'required',
                                    'disabled' => '',
                                    'input_type' => 'text',
                                    'input_id' => 'username',
                                    'input_name' => 'username',
                                    'input_value' => '',
                                    'message' => '',
                                    ])
                                </div>
                                <div class="col l-6 md-6 c-12">
                                    @include('includes.input', [
                                    'label_title' => 'Mật khẩu',
                                    'required' => 'required',
                                    'disabled' => '',
                                    'input_type' => 'password',
                                    'input_id' => 'password',
                                    'input_name' => 'password',
                                    'input_value' => '',
                                    'message' => '',
                                    ])
                                </div>

                                <div class="col l-6 md-6 c-12">
                                    <div class="input-wrapper">
                                        <label for="" class="input-label">
                                            Vai trò <span class="required">*</span>
                                        </label>
                                        <select class="header__search-select" name="role" id="role">
                                            <option hidden value=""></option>
                                            <option value="0">Nhân viên</option>
                                            <option value="1">Quản trị viên</option>
                                        </select>
                                        @error('role')
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
                            Ảnh đại diện
                        </div>
                        <div class="box-body">
                            <div class="grid row">
                                <div class="col l-12 md-12 c-12">
                                    <div class="img-wrapper">
                                    @include('includes.input', [
                                    'label_title' => 'Chọn đường dẫn ảnh',
                                    'required' => '',
                                    'disabled' => '',
                                    'input_type' => 'file',
                                    'input_id' => 'photo',
                                    'input_name' => 'photo',
                                    'path_photo' => 'images/no-avatar.png',
                                    'message' => '',
                                    ])

                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END EMPLOYEE TABLE -->
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
    <script src="{{ asset('js/login.js') }}"></script>
    <script src="{{ asset('js/photo.js') }}"></script>
@endsection
