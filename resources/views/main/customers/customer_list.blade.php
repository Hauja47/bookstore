@extends('templates.template', [
'title'=> 'Danh sách khách hàng',
'main_header'=> 'Danh sách khách hàng',

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
<link rel="stylesheet" href="{{ asset('css/customer_list.css') }}">
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
            <a href="{{ route('customers.create') }}" class="btn-function btn-function__add">
                <i class='btn-function-icon btn-function__add-icon bx bx-plus' ></i>
                <!-- <i class='btn-function-icon bx bx-plus-circle' ></i> -->
                Thêm khách hàng
            </a>
        </div>
    </div>
    <!-- END  -->

    <div class="row">
        <!-- CUSTOMER TABLE -->
        <div class="col l-12 md-12 c-12">
            <div class="box">
                <div class="box-body">
                    <table class="main-customer-table">
                        <thead>
                            <tr>
                                <th>Mã khách hàng</th>
                                <th>Tên khách hàng</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Địa chỉ</th>
                                <th>Công nợ hiện tại</th>
                                <th data-sortable="false"></th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- <tr>
                                <td>KH0000016</td>
                                <td>
                                    nguyễn trùng khánh
                                </td>
                                <td>0123456789</td>
                                <td>
                                    khanhnguyen@gmail.com
                                </td>
                                <td>
                                    Bù Đăng, Bình Phước
                                </td>
                                <td>123.000 đ</td>
                                <td>
                                    <a href="{{ route('customers.edit', ['id' => 1]) }}" class="btn btn-outline btn-edit">
                                        <i class='btn-icon bx bx-edit-alt' ></i>
                                    </a>
                                    <a href="" class="btn btn-outline btn-remove">
                                        <i class='btn-icon bx bx-trash-alt' ></i>
                                    </a>

                                </td>
                            </tr>
                            <tr>
                                <td>KH0000016</td>
                                <td>
                                    nguyễn trùng khánh
                                </td>
                                <td>0123456789</td>
                                <td>
                                    khanhnguyen@gmail.com
                                </td>
                                <td>
                                    Bù Đăng, Bình Phước
                                </td>
                                <td>123.000 đ</td>
                                <td>
                                    <a href="{{ route('customers.edit', ['id' => 1]) }}" class="btn btn-outline btn-edit">
                                        <i class='btn-icon bx bx-edit-alt' ></i>
                                    </a>
                                    <a href="" class="btn btn-outline btn-remove">
                                        <i class='btn-icon bx bx-trash-alt' ></i>
                                    </a>

                                </td>
                            </tr>
                            <tr>
                                <td>KH0000016</td>
                                <td>
                                    nguyễn trùng khánh
                                </td>
                                <td>0123456789</td>
                                <td>
                                    khanhnguyen@gmail.com
                                </td>
                                <td>
                                    Bù Đăng, Bình Phước
                                </td>
                                <td>123.000 đ</td>
                                <td>
                                    <a href="{{ route('customers.edit', ['id' => 1]) }}" class="btn btn-outline btn-edit">
                                        <i class='btn-icon bx bx-edit-alt' ></i>
                                    </a>
                                    <a href="" class="btn btn-outline btn-remove">
                                        <i class='btn-icon bx bx-trash-alt' ></i>
                                    </a>

                                </td>
                            </tr>
                            <tr>
                                <td>KH0000016</td>
                                <td>
                                    nguyễn trùng khánh
                                </td>
                                <td>0123456789</td>
                                <td>
                                    khanhnguyen@gmail.com
                                </td>
                                <td>
                                    Bù Đăng, Bình Phước
                                </td>
                                <td>123.000 đ</td>
                                <td>
                                    <a href="{{ route('customers.edit', ['id' => 1]) }}" class="btn btn-outline btn-edit">
                                        <i class='btn-icon bx bx-edit-alt' ></i>
                                    </a>
                                    <a href="" class="btn btn-outline btn-remove">
                                        <i class='btn-icon bx bx-trash-alt' ></i>
                                    </a>

                                </td>
                            </tr>
                            <tr>
                                <td>KH0000016</td>
                                <td>
                                    nguyễn trùng khánh
                                </td>
                                <td>0123456789</td>
                                <td>
                                    khanhnguyen@gmail.com
                                </td>
                                <td>
                                    Bù Đăng, Bình Phước
                                </td>
                                <td>123.000 đ</td>
                                <td>
                                    <a href="{{ route('customers.edit', ['id' => 1]) }}" class="btn btn-outline btn-edit">
                                        <i class='btn-icon bx bx-edit-alt' ></i>
                                    </a>
                                    <a href="" class="btn btn-outline btn-remove">
                                        <i class='btn-icon bx bx-trash-alt' ></i>
                                    </a>

                                </td>
                            </tr> --}}
                            @foreach (\App\Models\Customer::all() as $customer)
                            <tr>
                                <td>{{ 'KH'.$customer->id }}</td>
                                <td>
                                    {{ $customer->full_name }}
                                </td>
                                <td>{{ $customer->phone_number }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>
                                    {{ $customer->address }}
                                </td>
                                <td>{{ number_format($customer->debt,).'đ' }}</td>
                                <td>
                                    <a href="{{ route('customers.edit', ['customer' => $customer]) }}" class="btn btn-outline btn-edit">
                                        <i class='btn-icon bx bx-edit-alt' ></i>
                                    </a>
                                    <a onclick="confirmation(event)" href="{{ route('customers.delete', ['customer' => $customer]) }}" class="btn btn-outline btn-remove">
                                        <i class='btn-icon bx bx-trash-alt' ></i>
                                    </a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END CUSTOMER TABLE -->

    </div>
</div>
@endsection

@section('js')
<script>
    let table = document.getElementsByTagName('table')[0];
    let mytable = new JSTable('table');
</script>
@endsection
