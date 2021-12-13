@extends('templates.template', [
'title'=> 'Danh sách Sản phẩm',
'main_header'=> 'Danh sách Sản phẩm',

'active_dashboard' => '',
'open_order' => '',
'active_order' => '',
'active_refund' => '',
'open_product' => 'sidebar__menu-dropdown-icon--open',
'active_product' => 'active',
'active_invoice' => '',
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
<link rel="stylesheet" href="{{ asset('css/product_list.css') }}">
@endsection

@section('main-content')
<div class="main-content">
    <!-- FUNCTION BUTTON -->
    <div class="row main-function">
        <div class="col l-6 md-6 c-6">
            <a href="" class="btn-function btn-function__export">
                <i class='btn-function-icon btn-function__export-icon bx bx-download' ></i>
                Xuất file
            </a>
        </div>
        <div class="col l-6 md-6 c-6">
            <a href="product/create" class="btn-function btn-function__add">
                <i class='btn-function-icon btn-function__add-icon bx bx-plus' ></i>
                <!-- <i class='btn-function-icon bx bx-plus-circle' ></i> -->
                Thêm sản phẩm
            </a>
        </div>
    </div>
    <!-- END  -->

    <div class="row">
        <!-- PRODUCT TABLE -->
        <div class="col l-12 md-12 c-12">
            <div class="box">
                <div class="box-body">
                    <table class="main-product-table">
                        <thead>
                            <tr>
                                <th>Mã sản phẩm</th>
                                <th>Ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Phiên bản</th>
                                <th>Nhãn hiệu</th>
                                <th>Loại sản phẩm</th>
                                <th>Tồn kho</th>
                                <th data-sortable="false"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
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
                                    <a href="" class="btn btn-outline btn-edit">
                                        <i class='btn-icon bx bx-edit-alt' ></i>
                                    </a>
                                    <a href="" class="btn btn-outline btn-remove">
                                        <i class='btn-icon bx bx-trash-alt' ></i>
                                    </a>

                                </td>
                            </tr>
                            <tr>
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
                                    <a href="" class="btn btn-outline btn-edit">
                                        <i class='btn-icon bx bx-edit-alt' ></i>
                                    </a>
                                    <a href="" class="btn btn-outline btn-remove">
                                        <i class='btn-icon bx bx-trash-alt' ></i>
                                    </a>

                                </td>
                            </tr>
                            <tr>
                                <td>SP0000002</td>
                                <td>
                                    <img src="{{ asset('images/no-image.png') }}" alt="" class="product-img">
                                </td>
                                <td>
                                    Balo Học Sinh Bé Trai Chống Gù Siêu Nhẹ Tiger Family Jolly
                                </td>
                                <td>Fresh Kicks</td>
                                <td>Tiger Family</td>
                                <td>
                                    Văn phòng phẩm
                                </td>
                                <td>10</td>
                                <td>
                                    <a href="" class="btn btn-outline btn-edit">
                                        <i class='btn-icon bx bx-edit-alt' ></i>
                                    </a>
                                    <a href="" class="btn btn-outline btn-remove">
                                        <i class='btn-icon bx bx-trash-alt' ></i>
                                    </a>

                                </td>
                            </tr>
                            <tr>
                                <td>SP0000020</td>
                                <td>
                                    <img src="{{ asset('images/no-image.png') }}" alt="" class="product-img">
                                </td>
                                <td>
                                    Bút Chì Gỗ 2B Stabilo PC4920R-2B
                                </td>
                                <td>Thân Neon Cam</td>
                                <td>VPP Stabilo</td>
                                <td>
                                    Văn phòng phẩm
                                </td>
                                <td>200</td>
                                <td>
                                    <a href="" class="btn btn-outline btn-edit">
                                        <i class='btn-icon bx bx-edit-alt' ></i>
                                    </a>
                                    <a href="" class="btn btn-outline btn-remove">
                                        <i class='btn-icon bx bx-trash-alt' ></i>
                                    </a>

                                </td>
                            </tr>
                            <tr>
                                <td>SP0000002</td>
                                <td>
                                    <img src="{{ asset('images/no-image.png') }}" alt="" class="product-img">
                                </td>
                                <td>
                                    Balo Học Sinh Bé Trai Chống Gù Siêu Nhẹ Tiger Family Jolly
                                </td>
                                <td>Fresh Kicks</td>
                                <td>Tiger Family</td>
                                <td>
                                    Văn phòng phẩm
                                </td>
                                <td>10</td>
                                <td>
                                    <a href="" class="btn btn-outline btn-edit">
                                        <i class='btn-icon bx bx-edit-alt' ></i>
                                    </a>
                                    <a href="" class="btn btn-outline btn-remove">
                                        <i class='btn-icon bx bx-trash-alt' ></i>
                                    </a>

                                </td>
                            </tr>
                            <tr>
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
                                    <a href="" class="btn btn-outline btn-edit">
                                        <i class='btn-icon bx bx-edit-alt' ></i>
                                    </a>
                                    <a href="" class="btn btn-outline btn-remove">
                                        <i class='btn-icon bx bx-trash-alt' ></i>
                                    </a>

                                </td>
                            </tr>
                            <tr>
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
                                    <a href="" class="btn btn-outline btn-edit">
                                        <i class='btn-icon bx bx-edit-alt' ></i>
                                    </a>
                                    <a href="" class="btn btn-outline btn-remove">
                                        <i class='btn-icon bx bx-trash-alt' ></i>
                                    </a>

                                </td>
                            </tr>
                            <tr>
                                <td>SP0000002</td>
                                <td>
                                    <img src="{{ asset('images/no-image.png') }}" alt="" class="product-img">
                                </td>
                                <td>
                                    Balo Học Sinh Bé Trai Chống Gù Siêu Nhẹ Tiger Family Jolly
                                </td>
                                <td>Fresh Kicks</td>
                                <td>Tiger Family</td>
                                <td>
                                    Văn phòng phẩm
                                </td>
                                <td>10</td>
                                <td>
                                    <a href="" class="btn btn-outline btn-edit">
                                        <i class='btn-icon bx bx-edit-alt' ></i>
                                    </a>
                                    <a href="" class="btn btn-outline btn-remove">
                                        <i class='btn-icon bx bx-trash-alt' ></i>
                                    </a>

                                </td>
                            </tr>
                            <tr>
                                <td>SP0000002</td>
                                <td>
                                    <img src="{{ asset('images/no-image.png') }}" alt="" class="product-img">
                                </td>
                                <td>
                                    Balo Học Sinh Bé Trai Chống Gù Siêu Nhẹ Tiger Family Jolly
                                </td>
                                <td>Fresh Kicks</td>
                                <td>Tiger Family</td>
                                <td>
                                    Văn phòng phẩm
                                </td>
                                <td>10</td>
                                <td>
                                    <a href="" class="btn btn-outline btn-edit">
                                        <i class='btn-icon bx bx-edit-alt' ></i>
                                    </a>
                                    <a href="" class="btn btn-outline btn-remove">
                                        <i class='btn-icon bx bx-trash-alt' ></i>
                                    </a>

                                </td>
                            </tr>
                            <tr>
                                <td>SP0000020</td>
                                <td>
                                    <img src="{{ asset('images/no-image.png') }}" alt="" class="product-img">
                                </td>
                                <td>
                                    Bút Chì Gỗ 2B Stabilo PC4920R-2B
                                </td>
                                <td>Thân Neon Cam</td>
                                <td>VPP Stabilo</td>
                                <td>
                                    Văn phòng phẩm
                                </td>
                                <td>200</td>
                                <td>
                                    <a href="" class="btn btn-outline btn-edit">
                                        <i class='btn-icon bx bx-edit-alt' ></i>
                                    </a>
                                    <a href="" class="btn btn-outline btn-remove">
                                        <i class='btn-icon bx bx-trash-alt' ></i>
                                    </a>

                                </td>
                            </tr>
                            <tr>
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
                                    <a href="" class="btn btn-outline btn-edit">
                                        <i class='btn-icon bx bx-edit-alt' ></i>
                                    </a>
                                    <a href="" class="btn btn-outline btn-remove">
                                        <i class='btn-icon bx bx-trash-alt' ></i>
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
</div>
@endsection

@section('js')
<script>
    let table = document.getElementsByTagName('table')[0];
    let mytable = new JSTable('table');
</script>
@endsection