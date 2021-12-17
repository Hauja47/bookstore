@extends('templates.template', [
'title'=> 'Quy định cửa hàng',
'main_header'=> 'Quy định cửa hàng',

'active_dashboard' => '',
'open_invoice' => '',
'active_invoice' => '',
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
'open_setting' => 'sidebar__menu-dropdown-icon--open',
'active_regulation' => 'active',
])

@section('css')
    <link rel="stylesheet" href="{{ asset('css/list.css') }}">
    <link rel="stylesheet" href="{{ asset('css/add.css') }}">
@endsection

@section('main-content')
    <div class="main-content">
        <form action="{{ route('settings.regulation.edit') }}" method="post" id="form-main" enctype="multipart/form-data">
            @csrf
            <!-- FUNCTION BUTTON -->
            <div class="row main-function">
                <div class="col l-6 md-6 c-6">
                    {{-- <a href="{{ route('providers.index') }}" class="btn-function btn-function__back">
                    <i class='btn-function-icon btn-function__back-icon bx bx-chevron-left'></i>
                    Quay lại danh sách nhà cung cấp
                </a> --}}
                </div>
                <div class="col l-6 md-6 c-6">
                    {{-- <a href="{{ route('providers.index') }}" class="btn-function btn-function__exit">
                    Thoát
                </a> --}}
                    {{-- <button type="submit" class="btn-function btn-function__save">
                    Lưu
                </button> --}}
                </div>
            </div>
            <!-- END  -->

            @php
                $disabled = 'readonly';
            @endphp

            {{-- FORM --}}
            <div class="row">
                <!-- FORM ADD provider -->
                <div class="col l-8 md-10 c-12 l-o-2 md-o-1">
                    <div class="box info-general">
                        <div class="box-header">
                            Thông tin quy định
                            @can('admin')
                                <button type="submit" class="btn-function btn-function__save">
                                    Lưu
                                </button>
                                @php
                                    $disabled = '';
                                @endphp
                            @endcan
                        </div>

                        <div class="box-body">
                            <div class="grid row">
                                <div class="col l-6 md-6 c-12">
                                    @include('includes.input', [
                                    'label_title' => 'Số lượng nhập tối thiểu',
                                    'required' => 'required',
                                    'disabled' => $disabled,
                                    'input_type' => 'number',
                                    'input_id' => 'min_imported_number',
                                    'input_name' => 'min_imported_number',
                                    'input_value' => $parameters[0]->value,
                                    'message' => '',
                                    ])
                                </div>
                                <div class="col l-6 md-6 c-12">
                                    @include('includes.input', [
                                    'label_title' => 'Số lượng tồn tối đa trước khi nhập kkho',
                                    'required' => 'required',
                                    'disabled' => $disabled,
                                    'input_type' => 'number',
                                    'input_id' => 'max_in_stock_number_before_import',
                                    'input_name' => 'max_in_stock_number_before_import',
                                    'input_value' => $parameters[1]->value,
                                    'message' => '',
                                    ])
                                </div>
                                <div class="col l-6 md-6 c-12">
                                    @include('includes.input', [
                                    'label_title' => 'Số tiền nợ tối đa',
                                    'required' => 'required',
                                    'disabled' => $disabled,
                                    'input_type' => 'number',
                                    'input_id' => 'max_debt',
                                    'input_name' => 'max_debt',
                                    'input_value' => $parameters[2]->value,
                                    'message' => '',
                                    ])
                                </div>
                                <div class="col l-6 md-6 c-12">
                                    @include('includes.input', [
                                    'label_title' => 'Số lượng tồn tối thiểu sau khi bán',
                                    'required' => 'required',
                                    'disabled' => $disabled,
                                    'input_type' => 'number',
                                    'input_id' => 'min_in_stock_number_after_sale',
                                    'input_name' => 'min_in_stock_number_after_sale',
                                    'input_value' => $parameters[3]->value,
                                    'message' => '',
                                    ])
                                </div>
                                <div class="col l-6 md-6 c-12">
                                    @include('includes.input', [
                                    'label_title' => 'Tỉ giá bán thêm vào (%)',
                                    'required' => 'required',
                                    'disabled' => $disabled,
                                    'input_type' => 'number',
                                    'input_id' => 'rate_price',
                                    'input_name' => 'rate_price',
                                    'input_value' => $parameters[4]->value,
                                    'message' => '',
                                    ])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END provider TABLE -->

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
@endsection
