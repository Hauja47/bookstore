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
    <link rel="stylesheet" href="{{ asset('css/product_list.css') }}">
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
                <div class="col l-12 md-12 c-12">
                    <div class="box report">
                        <div class="box-header">
                            Báo cáo tồn kho
                            <div class="input-wrapper">
                                <input type="month" placeholder=""
                                    value="{{ date('Y-m') }}" name="month_year"
                                    id="month_year" class="input-text" max="{{ date('Y-m') }}">
                            <button type="submit" class="btn-function btn-function__save">
                                Cập nhật
                            </button>
                            </div>
                        </div>

                        <div class="box-body">
                            <table class="main-product-table">
                                <thead>
                                    <tr>
                                        <th colspan="4">Sản phẩm</th>
                                        <th rowspan="2">Tồn đầu kì</th>
                                        <th rowspan="2">Nhập trong kì</th>
                                        <th rowspan="2">Xuất trong kì</th>

                                        <th rowspan="2">Tồn cuối kì</th>
                                        <th data-sortable="false"></th>
                                    </tr>
                                    <tr>
                                        <th>Mã sản phẩm</th>
                                        <th>Ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Phiên bản</th>
                                        <th data-sortable="false"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- <tr>
                                    <td>SP0000016</td>
                                    <td>
                                        <img src="{{ asset('images/no-image.png') }}" alt="" class="product-img">
                                    </td>
                                    <td>
                                        Thế Nào Và Tại Sao - Những Ngôi Sao - Điều Tuyệt Vời Của Vũ Trụ
                                    </td>
                                    <td>Bìa mềm</td>
                                    <td>NXB Phụ nữ</td>
                                    <td>
                                        Sách
                                    </td>
                                    <td>80</td>
                                    <td>
                                        <a href="{{ route('products.edit', ['id' => 1]) }}" class="btn btn-outline btn-edit">
                                            <i class='btn-icon bx bx-edit-alt' ></i>
                                        </a>
                                        <a href="" class="btn btn-outline btn-remove">
                                            <i class='btn-icon bx bx-trash-alt' ></i>
                                        </a>

                                    </td>
                                </tr>
                                <tr> --}}

                                    @foreach (\App\Models\Product::all() as $product)
                                        {{-- @php
                                    dd($product->brand->name)
                                @endphp --}}
                                        <tr>
                                            <td>{{ 'SP' . $product->id }}</td>
                                            <td>
                                                <img src="{{ $product->photo ? asset('/storage/' . $product->photo) : asset('images/no-image.png') }}"
                                                    alt="" class="product-img">
                                            </td>
                                            <td>
                                                {{ $product->name }}
                                            </td>
                                            <td>{{ $product->version }}</td>
                                            <td>{{ $product->brand->name }}</td>
                                            <td>
                                                {{ $product->productable_type }}
                                            </td>
                                            <td>{{ $product->in_stock }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
