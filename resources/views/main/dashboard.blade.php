@extends('templates.template', [
'title'=> 'Trang chủ',
'main_header'=> 'Trang chủ',
'active_dashboard' => 'active',
'open_order' => '',
'active_order' => '',
'active_refund' => '',
'open_product' => '',
'active_product' => '',
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

@endsection

@section('main-content')
<!-- MAIN-CONTENT -->
<div class="main-content">
    <!-- COUNTER -->
    <div class="row main-counter">
        <div class="col l-3 md-6 c-12">
            <div class="main-counter__item">
                <div class="box box-hover">
                    <div class="main-counter__item-title">
                        Hoá đơn
                    </div>
                    <div class="main-counter__item-info">
                        <span class="main-counter__item-count">
                            60
                        </span>
                        <i class='main-counter__item-icon bx bx-shopping-bag'></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col l-3 md-6 c-12">
            <div class="main-counter__item">
                <div class="box box-hover ">
                    <div class="main-counter__item-title">
                        Tỉ lệ trả hàng
                    </div>
                    <div class="main-counter__item-info">
                        <span class="main-counter__item-count">
                            0%
                        </span>
                        <i class='main-counter__item-icon bx bx-reset'></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col l-3 md-6 c-12">
            <div class="main-counter__item">
                <div class="box box-hover">
                    <div class="main-counter__item-title">
                        Doanh thu
                    </div>
                    <div class="main-counter__item-info">
                        <span class="main-counter__item-count">
                            10,000,000đ
                        </span>
                        <i class='main-counter__item-icon bx bx-money'></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col l-3 md-6 c-12">
            <div class="main-counter__item">
                <div class="box box-hover">
                    <div class="main-counter__item-title">
                        Khách hàng
                    </div>
                    <div class="main-counter__item-info">
                        <span class="main-counter__item-count">
                            20
                        </span>
                        <i class='main-counter__item-icon bx bx-user'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END COUNTER -->

    <div class="row">
        <!-- TOP PRODUCT -->
        <div class="col l-5 md-12 c-12">
            <div class="main-top-product">
                <div class="box full-height">
                    <div class="box-header">
                        top sản phẩm
                    </div>
                    <div class="box-body">
                        <div class="main-top-product__list">
                            <a href="" class="main-top-product__item">
                                <img src="images/home/number-1.png" alt="Ảnh sản phẩm"
                                    class="main-top-product__item-img">
                                <div class="main-top-product__item-info">
                                    <h5 class="main-top-product__item-name text-ellipse"
                                        title="Cà Phê Cùng Tony - Tái Bản (Tặng Kèm 1 Cuốn Sổ Tay Cà Phê Cùng Tony - Số Lượng Có Hạn) - Bìa mềm">
                                        Cà Phê Cùng Tony - Tái Bản (Tặng Kèm 1 Cuốn Sổ Tay Cà Phê Cùng Tony - Số Lượng
                                        Có Hạn) - Bìa mềm</h5>
                                    <span class="main-top-product__item-text">SP0000001</span>
                                </div>
                                <div class="main-top-product__item-sold">
                                    <span class="main-top-product__item-text">Số lượng</span>
                                    <h5 class="main-top-product__item-sold-quantity">10</h5>
                                </div>
                            </a>
                            <a href="" class="main-top-product__item">
                                <img src="images/home/number-2.png" alt="Ảnh sản phẩm"
                                    class="main-top-product__item-img">
                                <div class="main-top-product__item-info">
                                    <h5 class="main-top-product__item-name text-ellipse"
                                        title="Lẽ Phải Của Phi Lý Trí (Tái Bản) - Bìa mềm">Lẽ Phải Của Phi Lý Trí (Tái
                                        Bản) - Bìa mềm</h5>
                                    <span class="main-top-product__item-text">SP0000002</span>
                                </div>
                                <div class="main-top-product__item-sold">
                                    <span class="main-top-product__item-text">Số lượng</span>
                                    <h5 class="main-top-product__item-sold-quantity">8</h5>
                                </div>
                            </a>
                            <a href="" class="main-top-product__item">
                                <img src="images/home/number-3.png" alt="Ảnh sản phẩm"
                                    class="main-top-product__item-img">
                                <div class="main-top-product__item-info">
                                    <h5 class="main-top-product__item-name text-ellipse"
                                        title="Những Giấc Mơ Ở Hiệu Sách Morisaki - Bìa mềm">Những Giấc Mơ Ở Hiệu Sách
                                        Morisaki - Bìa mềm</h5>
                                    <span class="main-top-product__item-text">SP0000003</span>
                                </div>
                                <div class="main-top-product__item-sold">
                                    <span class="main-top-product__item-text">Số lượng</span>
                                    <h5 class="main-top-product__item-sold-quantity">7</h5>
                                </div>
                            </a>
                            <a href="" class="main-top-product__item">
                                <img src="images/home/number-4.png" alt="Ảnh sản phẩm"
                                    class="main-top-product__item-img">
                                <div class="main-top-product__item-info">
                                    <h5 class="main-top-product__item-name text-ellipse"
                                        title="3 Phút Cho Ông Bố Bận Rộn - Bìa mềm">3 Phút Cho Ông Bố Bận Rộn - Bìa mềm
                                    </h5>
                                    <span class="main-top-product__item-text">SP0000004</span>
                                </div>
                                <div class="main-top-product__item-sold">
                                    <span class="main-top-product__item-text">Số lượng</span>
                                    <h5 class="main-top-product__item-sold-quantity">4</h5>
                                </div>
                            </a>
                            <!-- <a href="" class="main-top-product__item">
                                        <img src="images/home/number-5.png" alt="Ảnh sản phẩm" class="main-top-product__item-img">
                                        <div class="main-top-product__item-info">
                                            <h5 class="main-top-product__item-name text-ellipse" title="20 Tuổi Trở Thành Người Biết Nói Giỏi Làm - Bìa mềm">20 Tuổi Trở Thành Người Biết Nói Giỏi Làm - Bìa mềm</h5>
                                            <span class="main-top-product__item-text">SP0000005</span>
                                        </div>
                                        <div class="main-top-product__item-sold">
                                            <span class="main-top-product__item-text">Số lượng</span>
                                            <h5 class="main-top-product__item-sold-quantity">3</h5>
                                        </div>
                                    </a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END TOP PRODUCT -->

        <!-- CATEGORY CHART -->
        <!-- <div class="col l-4 md-6 c-12">
                    <div class="main-category-chart">
                        <div class="box full-height">
                            <div class="box-header">
                                category
                            </div>
                            <div class="box-body">
                                <div id="category-chart"></div>
                            </div>
                        </div>
                    </div>
                </div> -->
        <!-- END CATEGORY CHART -->

        <!-- SALE CHART -->
        <div class="col l-7 md-12 c-12">
            <div class="main-sale-chart">
                <div class="box full-height">
                    <div class="box-header">
                        doanh thu 7 ngày gần nhất
                    </div>
                    <div class="box-body">
                        <div id="sale-chart"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END CUSTOMER CHART -->

        <!-- ORDER TABLE -->
        <!-- <div class="col l-12 md-12 c-12">
                    <div class="main-latest-order-table">
                        <div class="box">
                            <div class="box-header">
                                Recent orders
                            </div>
                            <div class="box-body">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Customer</th>
                                            <th>Date</th>
                                            <th>Order status</th>
                                            <th>Payment</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#2345</td>
                                            <td>
                                                <div class="main-latest-order-table__order-owner">
                                                    <img src="images/user-avatar.png" alt="user image" class="main-latest-order-table__order-owner-img">
                                                    <span>trần b</span>
                                                </div>
                                            </td>
                                            <td>7:51 17/11/2021</td>
                                            <td>
                                                <span class="main-latest-order-table__order-status main-latest-order-table__order-status--ready">
                                                    Ready
                                                </span>
                                            </td>
                                            <td>
                                                <div class="main-latest-order-table__payment-status main-latest-order-table__payment-status--pending">
                                                    <div class="dot"></div>
                                                    <span>Pending</span>
                                                </div>
                                            </td>
                                            <td>$123.45</td>
                                        </tr>
                                        <tr>
                                            <td>#2345</td>
                                            <td>
                                                <div class="main-latest-order-table__order-owner">
                                                    <img src="images/user-avatar.png" alt="user image" class="main-latest-order-table__order-owner-img">
                                                    <span>trần b</span>
                                                </div>
                                            </td>
                                            <td>7:51 17/11/2021</td>
                                            <td>
                                                <span class="main-latest-order-table__order-status main-latest-order-table__order-status--ready">
                                                    Ready
                                                </span>
                                            </td>
                                            <td>
                                                <div class="main-latest-order-table__payment-status main-latest-order-table__payment-status--pending">
                                                    <div class="dot"></div>
                                                    <span>Pending</span>
                                                </div>
                                            </td>
                                            <td>$123.45</td>
                                        </tr>
                                        <tr>
                                            <td>#2345</td>
                                            <td>
                                                <div class="main-latest-order-table__order-owner">
                                                    <img src="images/user-avatar.png" alt="user image" class="main-latest-order-table__order-owner-img">
                                                    <span>trần b</span>
                                                </div>
                                            </td>
                                            <td>7:51 17/11/2021</td>
                                            <td>
                                                <span class="main-latest-order-table__order-status main-latest-order-table__order-status--shipping">
                                                    Shipping
                                                </span>
                                            </td>
                                            <td>
                                                <div class="main-latest-order-table__payment-status main-latest-order-table__payment-status--paid">
                                                    <div class="dot"></div>
                                                    <span>Paid</span>
                                                </div>
                                            </td>
                                            <td>$123.45</td>
                                        </tr>
                                        <tr>
                                            <td>#2345</td>
                                            <td>
                                                <div class="main-latest-order-table__order-owner">
                                                    <img src="images/user-avatar.png" alt="user image" class="main-latest-order-table__order-owner-img">
                                                    <span>trần b</span>
                                                </div>
                                            </td>
                                            <td>7:51 17/11/2021</td>
                                            <td>
                                                <span class="main-latest-order-table__order-status main-latest-order-table__order-status--shipped">
                                                    Shipped
                                                </span>
                                            </td>
                                            <td>
                                                <div class="main-latest-order-table__payment-status main-latest-order-table__payment-status--pending">
                                                    <div class="dot"></div>
                                                    <span>Paid</span>
                                                </div>
                                            </td>
                                            <td>$123.45</td>
                                        </tr>
                                        <tr>
                                            <td>#2345</td>
                                            <td>
                                                <div class="main-latest-order-table__order-owner">
                                                    <img src="images/user-avatar.png" alt="user image" class="main-latest-order-table__order-owner-img">
                                                    <span>trần b</span>
                                                </div>
                                            </td>
                                            <td>7:51 17/11/2021</td>
                                            <td>
                                                <span class="main-latest-order-table__order-status main-latest-order-table__order-status--ready">
                                                    Shipping
                                                </span>
                                            </td>
                                            <td>
                                                <div class="main-latest-order-table__payment-status main-latest-order-table__payment-status--pending">
                                                    <div class="dot"></div>
                                                    <span>Pending</span>
                                                </div>
                                            </td>
                                            <td>$123.45</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> -->
        <!-- END ORDER TABLE -->

        <!-- LATEST ORDER TABLE -->
        <div class="col l-12 md-12 c-12">
            <div class="box">
                <div class="box-header">
                    Hoá đơn gần đây
                </div>
                <div class="box-body">
                    <table class="main-latest-order-table">
                        <thead>
                            <tr>
                                <th>Mã hoá đơn</th>
                                <th>Khách hàng</th>
                                <th>Ngày tạo đơn</th>
                                <th>Thanh toán</th>
                                <th>Số lượng sản phẩm</th>
                                <th>Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>HD0000016</td>
                                <td>
                                    nguyễn trùng khánh
                                </td>
                                <td>7:51 17/11/2021</td>
                                <td>
                                    <div
                                        class="main-latest-order-table__payment-status main-latest-order-table__payment-status--paid">
                                        <div class="dot"></div>
                                        <span>Hoàn tất</span>
                                    </div>
                                </td>
                                <td>10</td>
                                <td>123.000 đ</td>
                            </tr>
                            <tr>
                                <td>HD0000016</td>
                                <td>
                                    nguyễn trùng khánh
                                </td>
                                <td>7:51 17/11/2021</td>
                                <td>
                                    <div
                                        class="main-latest-order-table__payment-status main-latest-order-table__payment-status--paid">
                                        <div class="dot"></div>
                                        <span>Hoàn tất</span>
                                    </div>
                                </td>
                                <td>10</td>
                                <td>123.000 đ</td>
                            </tr>
                            <tr>
                                <td>HD0000016</td>
                                <td>
                                    nguyễn trùng khánh
                                </td>
                                <td>7:51 17/11/2021</td>
                                <td>
                                    <div
                                        class="main-latest-order-table__payment-status main-latest-order-table__payment-status--paid">
                                        <div class="dot"></div>
                                        <span>Hoàn tất</span>
                                    </div>
                                </td>
                                <td>10</td>
                                <td>123.000 đ</td>
                            </tr>
                            <tr>
                                <td>HD0000016</td>
                                <td>
                                    nguyễn trùng khánh
                                </td>
                                <td>7:51 17/11/2021</td>
                                <td>
                                    <div
                                        class="main-latest-order-table__payment-status main-latest-order-table__payment-status--paid">
                                        <div class="dot"></div>
                                        <span>Hoàn tất</span>
                                    </div>
                                </td>
                                <td>10</td>
                                <td>123.000 đ</td>
                            </tr>
                            <tr>
                                <td>HD0000016</td>
                                <td>
                                    nguyễn trùng khánh
                                </td>
                                <td>7:51 17/11/2021</td>
                                <td>
                                    <div
                                        class="main-latest-order-table__payment-status main-latest-order-table__payment-status--paid">
                                        <div class="dot"></div>
                                        <span>Hoàn tất</span>
                                    </div>
                                </td>
                                <td>10</td>
                                <td>123.000 đ</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END LATEST ORDER TABLE -->

    </div>
</div>

<!-- END MAIN-CONTENT -->
@endsection

@section('js')

@endsection
