@extends('templates.template', [
'title'=> 'Quản lý tuỳ chọn',
'main_header'=> 'Quản lý tuỳ chọn',

'active_dashboard' => '',
'open_order' => '',
'active_order' => '',
'active_refund' => '',
'open_product' => 'sidebar__menu-dropdown-icon--open',
'active_product' => 'active',
'active_invoice' => '',
'active_supplier' => '',
'active_customer' => '',
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
    {{-- <link rel="stylesheet" href="{{ asset('css/product_list.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/add.css') }}">
@endsection

@section('main-content')
    <div class="main-content">
        <form action="" method="post" id="form-main">
            @csrf
            <!-- FUNCTION BUTTON -->
            <div class="row main-function">
                <div class="col l-6 md-6 c-6">
                    <a href="{{ route('products.index') }}" class="btn-function btn-function__back">
                        <i class='btn-function-icon btn-function__back-icon bx bx-chevron-left'></i>
                        Quay lại danh sách sản phẩm
                    </a>
                </div>
                <div class="col l-6 md-6 c-6">
                    <a href="{{ route('products.index') }}" class="btn-function btn-function__exit">
                        {{-- <i class='btn-function-icon btn-function__add-icon bx bx-plus' ></i> --}}
                        <!-- <i class='btn-function-icon bx bx-plus-circle' ></i> -->
                        Thoát
                    </a>
                    <button type="submit" href="{{ route('products.index') }}" class="btn-function btn-function__save">
                        {{-- <i class='btn-function-icon btn-function__add-icon bx bx-plus' ></i> --}}
                        <!-- <i class='btn-function-icon bx bx-plus-circle' ></i> -->
                        Lưu
                    </button>
                </div>
            </div>
            <!-- END  -->

            {{-- FORM --}}
            <div class="row">
                <!-- FORM CREATE PRODUCT -->
                <div class="col l-6 md-12 c-12">
                    <div class="box info-general">
                        <div class="box-header">
                            Loại sản phẩm
                            <a href="{{ route('products.option') }}" class="btn-function btn-function__add" data-bs-toggle="modal" data-bs-target="#modal-addCategory">
                                <i class='btn-function-icon btn-function__add-icon bx bx-plus'></i>
                                <!-- <i class='btn-function-icon bx bx-plus-circle' ></i> -->
                                Thêm
                            </a>
                        </div>
                        <div class="box-body">
                            <table class="main-option-table">
                                <thead>
                                    <tr>
                                        <th>Mã loại sản phẩm</th>
                                        <th>Tên loại sản phẩm</th>
                                        <th data-sortable="false"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>LSP0000016</td>
                                        <td>
                                            Sách
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-outline btn-edit" data-bs-toggle="modal" data-bs-target="#modal-editCategory">
                                                <i class='btn-icon bx bx-edit-alt'></i>
                                            </a>
                                            <a href="" class="btn btn-outline btn-remove">
                                                <i class='btn-icon bx bx-trash-alt'></i>
                                            </a>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>LSP0000016</td>
                                        <td>
                                            Văn phòng phẩm
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-outline btn-edit" data-bs-toggle="modal" data-bs-target="#modal-editCategory">
                                                <i class='btn-icon bx bx-edit-alt'></i>
                                            </a>
                                            <a href="" class="btn btn-outline btn-remove">
                                                <i class='btn-icon bx bx-trash-alt'></i>
                                            </a>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>LSP0000016</td>
                                        <td>
                                            Đồ chơi
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-outline btn-edit" data-bs-toggle="modal" data-bs-target="#modal-editCategory">
                                                <i class='btn-icon bx bx-edit-alt'></i>
                                            </a>
                                            <a href="" class="btn btn-outline btn-remove">
                                                <i class='btn-icon bx bx-trash-alt'></i>
                                            </a>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col l-6 md-12 c-12">
                    <div class="box info-general">
                        <div class="box-header">
                            Nhãn hiệu
                            <a href="{{ route('products.option') }}" class="btn-function btn-function__add" data-bs-toggle="modal" data-bs-target="#modal-addBrand">
                                <i class='btn-function-icon btn-function__add-icon bx bx-plus'></i>
                                <!-- <i class='btn-function-icon bx bx-plus-circle' ></i> -->
                                Thêm
                            </a>
                        </div>
                        <div class="box-body">
                            <table class="main-option-table">
                                <thead>
                                    <tr>
                                        <th>Mã nhãn hiệu</th>
                                        <th>Tên nhãn hiệu</th>
                                        <th data-sortable="false"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>NH0000016</td>
                                        <td>
                                            NXB Kim Đồng
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-outline btn-edit" data-bs-toggle="modal" data-bs-target="#modal-editBrand">
                                                <i class='btn-icon bx bx-edit-alt'></i>
                                            </a>
                                            <a href="" class="btn btn-outline btn-remove">
                                                <i class='btn-icon bx bx-trash-alt'></i>
                                            </a>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>NH0000016</td>
                                        <td>
                                            NXB Kim Đồng
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-outline btn-edit" data-bs-toggle="modal" data-bs-target="#modal-editBrand">
                                                <i class='btn-icon bx bx-edit-alt'></i>
                                            </a>
                                            <a href="" class="btn btn-outline btn-remove">
                                                <i class='btn-icon bx bx-trash-alt'></i>
                                            </a>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>NH0000016</td>
                                        <td>
                                            NXB Giáo dục
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-outline btn-edit" data-bs-toggle="modal" data-bs-target="#modal-editBrand">
                                                <i class='btn-icon bx bx-edit-alt'></i>
                                            </a>
                                            <a href="" class="btn btn-outline btn-remove">
                                                <i class='btn-icon bx bx-trash-alt'></i>
                                            </a>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>NH0000016</td>
                                        <td>
                                            Văn phòng phẩm Hồng Hà
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-outline btn-edit" data-bs-toggle="modal" data-bs-target="#modal-editBrand">
                                                <i class='btn-icon bx bx-edit-alt'></i>
                                            </a>
                                            <a href="" class="btn btn-outline btn-remove">
                                                <i class='btn-icon bx bx-trash-alt'></i>
                                            </a>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="col l-6 md-12 c-12">
                    <div class="box info-general">
                        <div class="box-header">
                            Thể loại
                            <a href="{{ route('products.option') }}" class="btn-function btn-function__add" data-bs-toggle="modal" data-bs-target="#modal-addGenre">
                                <i class='btn-function-icon btn-function__add-icon bx bx-plus'></i>
                                <!-- <i class='btn-function-icon bx bx-plus-circle' ></i> -->
                                Thêm
                            </a>
                        </div>
                        <div class="box-body">
                            <table class="main-option-table">
                                <thead>
                                    <tr>
                                        <th>Mã thể loại</th>
                                        <th>Tên thể loại</th>
                                        <th data-sortable="false"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>TL0000016</td>
                                        <td>
                                            Giáo khoa
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-outline btn-edit" data-bs-toggle="modal" data-bs-target="#modal-editGenre">
                                                <i class='btn-icon bx bx-edit-alt'></i>
                                            </a>
                                            <a href="" class="btn btn-outline btn-remove">
                                                <i class='btn-icon bx bx-trash-alt'></i>
                                            </a>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>TL0000016</td>
                                        <td>
                                            Văn học
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-outline btn-edit" data-bs-toggle="modal" data-bs-target="#modal-editGenre">
                                                <i class='btn-icon bx bx-edit-alt'></i>
                                            </a>
                                            <a href="" class="btn btn-outline btn-remove">
                                                <i class='btn-icon bx bx-trash-alt'></i>
                                            </a>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>TL0000016</td>
                                        <td>
                                            Truyện tranh
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-outline btn-edit" data-bs-toggle="modal" data-bs-target="#modal-editGenre">
                                                <i class='btn-icon bx bx-edit-alt'></i>
                                            </a>
                                            <a href="" class="btn btn-outline btn-remove">
                                                <i class='btn-icon bx bx-trash-alt'></i>
                                            </a>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>TL0000016</td>
                                        <td>
                                            Khoa học viễn tưởng
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-outline btn-edit" data-bs-toggle="modal" data-bs-target="#modal-editGenre">
                                                <i class='btn-icon bx bx-edit-alt'></i>
                                            </a>
                                            <a href="" class="btn btn-outline btn-remove">
                                                <i class='btn-icon bx bx-trash-alt'></i>
                                            </a>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- END PRODUCT TABLE -->

            </div>
            {{-- END FORM --}}
        </form>
    </div>
@endsection

@section('modal')
    <!-- Modal -->
    {{-- Modal add Brand --}}
    @include('includes.modal_input', [
    'modal_name' => 'addBrand',
    'form_action' => '',
    'form_method' => 'post',
    'modal_title' => 'Thêm nhãn hiệu',
    'label_title' => 'Tên nhãn hiệu mới',
    'required' => 'required',
    'disabled' => '',
    'input_type' => 'text',
    'input_id' => 'brand_name',
    'input_name' => 'TenNhanHieu',
    'input_value' => '',
    'message' => '',
    ])

    {{-- Modal add Categpry --}}
    @include('includes.modal_input', [
    'modal_name' => 'addCategory',
    'form_action' => '',
    'form_method' => 'post',
    'modal_title' => 'Thêm loại sản phẩm',
    'label_title' => 'Tên loại sản phẩm mới',
    'required' => 'required',
    'disabled' => '',
    'input_type' => 'text',
    'input_id' => 'category_name',
    'input_name' => 'TenLoaiSanPham',
    'input_value' => '',
    'message' => '',
    ])

    {{-- Modal add Genre --}}
    @include('includes.modal_input', [
    'modal_name' => 'addGenre',
    'form_action' => '',
    'form_method' => 'post',
    'modal_title' => 'Thêm thể loại',
    'label_title' => 'Tên thể loại mới',
    'required' => 'required',
    'disabled' => '',
    'input_type' => 'text',
    'input_id' => 'genre_name',
    'input_name' => 'TenTheLoai',
    'input_value' => '',
    'message' => '',
    ])

    @php
        $brand_name = 'hello';
        $category_name = 'Sách';
        $genre_name = 'hello';
    @endphp

    <!-- Modal -->
    {{-- Modal edit Brand --}}
    @include('includes.modal_input', [
    'modal_name' => 'editBrand',
    'form_action' => '',
    'form_method' => 'post',
    'modal_title' => 'Sửa nhãn hiệu',
    'label_title' => 'Tên nhãn hiệu',
    'required' => 'required',
    'disabled' => '',
    'input_type' => 'text',
    'input_id' => 'brand_name',
    'input_name' => 'TenNhanHieu',
    'input_value' => $brand_name,
    'message' => '',
    ])

    {{-- Modal edit Categpry --}}
    @include('includes.modal_input', [
    'modal_name' => 'editCategory',
    'form_action' => '',
    'form_method' => 'post',
    'modal_title' => 'Sửa loại sản phẩm',
    'label_title' => 'Tên loại sản phẩm',
    'required' => 'required',
    'disabled' => '',
    'input_type' => 'text',
    'input_id' => 'category_name',
    'input_name' => 'TenLoaiSanPham',
    'input_value' => $category_name,
    'message' => '',
    ])

    {{-- Modal edit Genre --}}
    @include('includes.modal_input', [
    'modal_name' => 'editGenre',
    'form_action' => '',
    'form_method' => 'post',
    'modal_title' => 'Sửa thể loại',
    'label_title' => 'Tên thể loại',
    'required' => 'required',
    'disabled' => '',
    'input_type' => 'text',
    'input_id' => 'genre_name',
    'input_name' => 'TenTheLoai',
    'input_value' => $genre_name,
    'message' => '',
    ])
@endsection

@section('js')
    <script>
        let tables = document.getElementsByTagName('table');
        let mytables = [];
        for (let i = 0; i < tables.length; i++) {
            mytables[i] = new JSTable(tables[i]);
        }
    </script>

    <script src="{{ asset('js/create.js') }}"></script>
@endsection
