@extends('templates.template', [
'title'=> 'Danh sách Đơn trả hàng',
'main_header'=> 'Danh sách Đơn trả hàng',

'active_dashboard' => '',
'open_invoice' => 'sidebar__menu-dropdown-icon--open',
'active_invoice' => '',
'active_return_good' => 'active',
'open_product' => '',
'active_product' => '',
'active_goods_receipt' => '',
'active_provider' => '',
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
<link rel="stylesheet" href="{{ asset('css/return_good_list.css') }}">
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
            <a href="{{ route('return_goods.create') }}" class="btn-function btn-function__add">
                <i class='btn-function-icon btn-function__add-icon bx bx-plus' ></i>
                <!-- <i class='btn-function-icon bx bx-plus-circle' ></i> -->
                Tạo đơn trả hàng
            </a>
        </div>
    </div>
    <!-- END  -->

    <div class="row">
        <!-- RETURN_GOOD TABLE -->
        <div class="col l-12 md-12 c-12">
            <div class="box">
                <div class="box-body">
                    <table class="main-return_good-table">
                        <thead>
                            <tr>
                                <th>Mã đơn trả hàng</th>
                                <th>Mã hoá đơn</th>
                                <th>Khách hàng</th>
                                <th>Ngày tạo đơn</th>
                                <th>Lý do trả hàng</th>
                                <th>Tổng hoàn tiền</th>
                                <th data-sortable="false"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>DTH0000001</td>
                                <td>HD0000016</td>
                                <td>
                                    nguyễn trùng khánh
                                </td>
                                <td>17/11/2021 7:51</td>
                                <td>Hàng bị lỗi</td>
                                <td>123.000 đ</td>
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
                                <td>DTH0000001</td>
                                <td>HD0000016</td>
                                <td>
                                    nguyễn trùng khánh
                                </td>
                                <td>17/11/2021 7:51</td>
                                <td>Hàng bị lỗi</td>
                                <td>123.000 đ</td>
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
                                <td>DTH0000001</td>
                                <td>HD0000016</td>
                                <td>
                                    nguyễn trùng khánh
                                </td>
                                <td>17/11/2021 7:51</td>
                                <td>Hàng bị lỗi</td>
                                <td>123.000 đ</td>
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
                                <td>DTH0000001</td>
                                <td>HD0000016</td>
                                <td>
                                    nguyễn trùng khánh
                                </td>
                                <td>17/11/2021 7:51</td>
                                <td>Hàng bị lỗi</td>
                                <td>123.000 đ</td>
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
                                <td>DTH0000001</td>
                                <td>HD0000016</td>
                                <td>
                                    nguyễn trùng khánh
                                </td>
                                <td>17/11/2021 7:51</td>
                                <td>Hàng bị lỗi</td>
                                <td>123.000 đ</td>
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
                                <td>DTH0000001</td>
                                <td>HD0000016</td>
                                <td>
                                    nguyễn trùng khánh
                                </td>
                                <td>17/11/2021 7:51</td>
                                <td>Hàng bị lỗi</td>
                                <td>123.000 đ</td>
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
                                <td>DTH0000001</td>
                                <td>HD0000016</td>
                                <td>
                                    nguyễn trùng khánh
                                </td>
                                <td>17/11/2021 7:51</td>
                                <td>Hàng bị lỗi</td>
                                <td>123.000 đ</td>
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
                                <td>DTH0000001</td>
                                <td>HD0000016</td>
                                <td>
                                    nguyễn trùng khánh
                                </td>
                                <td>17/11/2021 7:51</td>
                                <td>Hàng bị lỗi</td>
                                <td>123.000 đ</td>
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
                                <td>DTH0000001</td>
                                <td>HD0000016</td>
                                <td>
                                    nguyễn trùng khánh
                                </td>
                                <td>17/11/2021 7:51</td>
                                <td>Hàng bị lỗi</td>
                                <td>123.000 đ</td>
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
                                <td>DTH0000001</td>
                                <td>HD0000016</td>
                                <td>
                                    nguyễn trùng khánh
                                </td>
                                <td>17/11/2021 7:51</td>
                                <td>Hàng bị lỗi</td>
                                <td>123.000 đ</td>
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
                                <td>DTH0000001</td>
                                <td>HD0000016</td>
                                <td>
                                    nguyễn trùng khánh
                                </td>
                                <td>17/11/2021 7:51</td>
                                <td>Hàng bị lỗi</td>
                                <td>123.000 đ</td>
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
                                <td>DTH0000001</td>
                                <td>HD0000016</td>
                                <td>
                                    nguyễn trùng khánh
                                </td>
                                <td>17/11/2021 7:51</td>
                                <td>Hàng bị lỗi</td>
                                <td>123.000 đ</td>
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
                                <td>DTH0000001</td>
                                <td>HD0000016</td>
                                <td>
                                    nguyễn trùng khánh
                                </td>
                                <td>17/11/2021 7:51</td>
                                <td>Hàng bị lỗi</td>
                                <td>123.000 đ</td>
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
        <!-- END RETURN_GOOD TABLE -->

    </div>
</div>
@endsection

@section('js')
<script>
    let table = document.getElementsByTagName('table')[0];
    let mytable = new JSTable('table');
</script>
@endsection
