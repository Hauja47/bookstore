@extends('templates.template', [
'title'=> 'Đơn nhập kho',
'main_header'=> 'Đơn nhập kho',

'active_dashboard' => '',
'open_order' => '',
'active_order' => '',
'active_refund' => '',
'open_product' => 'sidebar__menu-dropdown-icon--open',
'active_product' => '',
'active_invoice' => 'active',
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
<link rel="stylesheet" href="{{ asset('css/invoice_list.css') }}">
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
            <a href="" class="btn-function btn-function__add">
                <i class='btn-function-icon btn-function__add-icon bx bx-plus' ></i>
                <!-- <i class='btn-function-icon bx bx-plus-circle' ></i> -->
                Tạo đơn nhập kho
            </a>
        </div>
    </div>
    <!-- END  -->

    <div class="row">
        <!-- PRODUCT TABLE -->
        <div class="col l-12 md-12 c-12">
            <div class="box">
                <div class="box-body">
                    <table class="main-import-table">
                        <thead>
                            <tr>
                                <th>Mã đơn nhập</th>
                                <th>Nhà cung cấp</th>
                                <th>Nhân viên thực hiện</th>
                                <th>Ngày tạo đơn</th>
                                <th>Thanh toán</th>
                                <th>Tổng tiền</th>
                                <th data-sortable="false"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>DNK0000016</td>
                                <td>
                                    Công ty Văn phòng phẩm
                                </td>
                                <td>
                                    nguyễn trùng khánh
                                </td>
                                <td>17/11/2021 7:51</td>
                                <td>
                                    <div class="main-import-table__payment-status main-import-table__payment-status--paid">
                                        <div class="dot"></div>
                                        <span>Hoàn tất</span>
                                    </div>
                                </td>
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
