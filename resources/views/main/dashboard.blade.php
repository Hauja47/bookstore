@extends('templates.template', [
'title'=> 'Trang chủ',
'main_header'=> 'Trang chủ',
'active_dashboard' => 'active',
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
'open_setting' => '',
'active_regulation' => '',
])

@section('css')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
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
                            {{ (\App\Models\Invoice::all()->count()) }}
                        </span>
                        <i class='main-counter__item-icon bx bx-receipt'></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col l-3 md-6 c-12">
            <div class="main-counter__item">
                <div class="box box-hover ">
                    <div class="main-counter__item-title">
                        Lợi nhuận
                    </div>
                    <div class="main-counter__item-info">
                        <span class="main-counter__item-count">
                            @php
                                $doanhthu = \App\Models\Receipt::sum('money');
                                $chiphi = \App\Models\Payment::sum('money');
                                $loinhuan = ($doanhthu - $chiphi) / $doanhthu * 100;

                            @endphp
                            {{ ($loinhuan <= 0) ? 0 : number_format($loinhuan, 1, ".", ",") }}%
                        </span>
                        <i class='main-counter__item-icon bx bx-wallet'></i>
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
                            {{ number_format($chiphi,) }}đ
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
                            {{ (\App\Models\Customer::all()->count()) }}
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
                        top sản phẩm 7 ngày gần nhất
                    </div>
                    <div class="box-body">
                        <div class="main-top-product__list">
                            @php
                                $i = 1
                            @endphp
                            @foreach (\App\Models\InvoiceDetail::selectRaw('*, sum(quantity) as sum')
                                                                    ->groupBy('product_id')
                                                                    ->orderByRaw('sum(quantity) DESC')
                                                                    ->whereRaw('created_at >= DATE(NOW()) - INTERVAL 7 DAY')
                                                                    ->take(5)
                                                                    ->get() as $detail)
                            <a href="{{ route('products.edit', ['product' => $detail->product]) }}" class="main-top-product__item">
                                <img src={{ "images/home/number-".$i.".png" }} alt="Ảnh sản phẩm"
                                    class="main-top-product__item-img">
                                <div class="main-top-product__item-info">
                                    <h5 class="main-top-product__item-name text-ellipse"
                                        title="{{ $detail->product->name }}">
                                        {{ $detail->product->name }}</h5>
                                    <span class="main-top-product__item-text">{{ 'SP'.$detail->product->id }}</span>
                                </div>
                                <div class="main-top-product__item-sold">
                                    <span class="main-top-product__item-text">Số lượng</span>
                                    <h5 class="main-top-product__item-sold-quantity">{{ $detail->sum }}</h5>
                                </div>
                            </a>
                            @php
                                $i++
                            @endphp
                            @endforeach
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
                        {{-- <div id="sale-chart"></div> --}}
                        {!! $chart->container() !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- END CUSTOMER CHART -->

        <!-- INVOICE TABLE -->
        <!-- <div class="col l-12 md-12 c-12">
                    <div class="main-latest-invoice-table">
                        <div class="box">
                            <div class="box-header">
                                Recent invoices
                            </div>
                            <div class="box-body">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Customer</th>
                                            <th>Date</th>
                                            <th>Invoice status</th>
                                            <th>Payment</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#2345</td>
                                            <td>
                                                <div class="main-latest-invoice-table__invoice-owner">
                                                    <img src="images/user-avatar.png" alt="user image" class="main-latest-invoice-table__invoice-owner-img">
                                                    <span>trần b</span>
                                                </div>
                                            </td>
                                            <td>7:51 17/11/2021</td>
                                            <td>
                                                <span class="main-latest-invoice-table__invoice-status main-latest-invoice-table__invoice-status--ready">
                                                    Ready
                                                </span>
                                            </td>
                                            <td>
                                                <div class="main-latest-invoice-table__payment-status main-latest-invoice-table__payment-status--pending">
                                                    <div class="dot"></div>
                                                    <span>Pending</span>
                                                </div>
                                            </td>
                                            <td>$123.45</td>
                                        </tr>
                                        <tr>
                                            <td>#2345</td>
                                            <td>
                                                <div class="main-latest-invoice-table__invoice-owner">
                                                    <img src="images/user-avatar.png" alt="user image" class="main-latest-invoice-table__invoice-owner-img">
                                                    <span>trần b</span>
                                                </div>
                                            </td>
                                            <td>7:51 17/11/2021</td>
                                            <td>
                                                <span class="main-latest-invoice-table__invoice-status main-latest-invoice-table__invoice-status--ready">
                                                    Ready
                                                </span>
                                            </td>
                                            <td>
                                                <div class="main-latest-invoice-table__payment-status main-latest-invoice-table__payment-status--pending">
                                                    <div class="dot"></div>
                                                    <span>Pending</span>
                                                </div>
                                            </td>
                                            <td>$123.45</td>
                                        </tr>
                                        <tr>
                                            <td>#2345</td>
                                            <td>
                                                <div class="main-latest-invoice-table__invoice-owner">
                                                    <img src="images/user-avatar.png" alt="user image" class="main-latest-invoice-table__invoice-owner-img">
                                                    <span>trần b</span>
                                                </div>
                                            </td>
                                            <td>7:51 17/11/2021</td>
                                            <td>
                                                <span class="main-latest-invoice-table__invoice-status main-latest-invoice-table__invoice-status--shipping">
                                                    Shipping
                                                </span>
                                            </td>
                                            <td>
                                                <div class="main-latest-invoice-table__payment-status main-latest-invoice-table__payment-status--paid">
                                                    <div class="dot"></div>
                                                    <span>Paid</span>
                                                </div>
                                            </td>
                                            <td>$123.45</td>
                                        </tr>
                                        <tr>
                                            <td>#2345</td>
                                            <td>
                                                <div class="main-latest-invoice-table__invoice-owner">
                                                    <img src="images/user-avatar.png" alt="user image" class="main-latest-invoice-table__invoice-owner-img">
                                                    <span>trần b</span>
                                                </div>
                                            </td>
                                            <td>7:51 17/11/2021</td>
                                            <td>
                                                <span class="main-latest-invoice-table__invoice-status main-latest-invoice-table__invoice-status--shipped">
                                                    Shipped
                                                </span>
                                            </td>
                                            <td>
                                                <div class="main-latest-invoice-table__payment-status main-latest-invoice-table__payment-status--pending">
                                                    <div class="dot"></div>
                                                    <span>Paid</span>
                                                </div>
                                            </td>
                                            <td>$123.45</td>
                                        </tr>
                                        <tr>
                                            <td>#2345</td>
                                            <td>
                                                <div class="main-latest-invoice-table__invoice-owner">
                                                    <img src="images/user-avatar.png" alt="user image" class="main-latest-invoice-table__invoice-owner-img">
                                                    <span>trần b</span>
                                                </div>
                                            </td>
                                            <td>7:51 17/11/2021</td>
                                            <td>
                                                <span class="main-latest-invoice-table__invoice-status main-latest-invoice-table__invoice-status--ready">
                                                    Shipping
                                                </span>
                                            </td>
                                            <td>
                                                <div class="main-latest-invoice-table__payment-status main-latest-invoice-table__payment-status--pending">
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
        <!-- END INVOICE TABLE -->

        <!-- LATEST INVOICE TABLE -->
        <div class="col l-12 md-12 c-12">
            <div class="box">
                <div class="box-header">
                    Hoá đơn gần đây
                </div>
                <div class="box-body">
                    <table class="main-latest-invoice-table">
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
                            @foreach (\App\Models\Invoice::take(5)->latest()->get() as $invoice)
                            <tr>
                                <td>HD{{ $invoice->id }}</td>
                                <td>
                                    {{ $invoice->customer->full_name }}
                                </td>
                                <td>{{ $invoice->created_at }}</td>
                                <td>
                                    @if ($invoice->balance == 0)
                                        <div class="main-latest-invoice-table__payment-status main-latest-invoice-table__payment-status--paid">
                                            <div class="dot"></div>
                                            <span>Hoàn tất</span>
                                        </div>
                                    @elseif ($invoice->balance == $invoice->total)
                                    <div class="main-latest-invoice-table__payment-status main-latest-invoice-table__payment-status--not-paid">
                                        <div class="dot"></div>
                                        <span>Chưa thanh toán</span>
                                    </div>
                                    @else
                                        <div class="main-latest-invoice-table__payment-status main-latest-invoice-table__payment-status--pending">
                                            <div class="dot"></div>
                                            <span>Một phần</span>
                                        </div>
                                    @endif
                                </td>
                                <td>{{ $invoice->details->sum('quantity') }}</td>
                                <td>{{ $invoice->total }} đ</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END LATEST INVOICE TABLE -->

    </div>
</div>
<script src="{{ $chart->cdn() }}"></script>

{{ $chart->script() }}

<!-- END MAIN-CONTENT -->
@endsection

@section('js')
{{-- <script>
    let table = document.getElementsByTagName('table')[0];
    let mytable = new JSTable('table');
</script> --}}
@endsection
