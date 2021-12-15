@extends('templates.template', [
'title'=> 'Nhà cung cấp',
'main_header'=> 'Nhà cung cấp',

'active_dashboard' => '',
'open_invoice' => '',
'active_invoice' => '',
'active_return_good' => '',
'open_product' => 'sidebar__menu-dropdown-icon--open',
'active_product' => '',
'active_goods_receipt' => '',
'active_provider' => 'active',
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
<link rel="stylesheet" href="{{ asset('css/list.css') }}">
<link rel="stylesheet" href="{{ asset('css/provider_list.css') }}">
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
            <a href="{{ route('providers.create') }}" class="btn-function btn-function__add">
                <i class='btn-function-icon btn-function__add-icon bx bx-plus' ></i>
                <!-- <i class='btn-function-icon bx bx-plus-circle' ></i> -->
                Thêm nhà cung cấp
            </a>
        </div>
    </div>
    <!-- END  -->

    <div class="row">
        <!-- provider TABLE -->
        <div class="col l-12 md-12 c-12">
            <div class="box">
                <div class="box-body">
                    <table class="main-provider-table">
                        <thead>
                            <tr>
                                <th>Mã nhà cung cấp</th>
                                <th>Tên nhà cung cấp</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Địa chỉ</th>
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
                                <td>
                                    <a href="{{ route('providers.edit', ['id' => 1]) }}" class="btn btn-outline btn-edit">
                                        <i class='btn-icon bx bx-edit-alt' ></i>
                                    </a>
                                    <a href="" class="btn btn-outline btn-remove">
                                        <i class='btn-icon bx bx-trash-alt' ></i>
                                    </a>

                                </td>
                            </tr> --}}
                            @foreach (\App\Models\Provider::all() as $provider)
                            <tr>
                                <td>{{ 'NCC'.$provider->id }}</td>
                                <td>
                                    {{ $provider->name }}
                                </td>
                                <td>{{ $provider->phone_number }}</td>
                                <td>{{ $provider->email }}</td>
                                <td>
                                    {{ $provider->address }}
                                </td>
                                <td>
                                    <a href="{{ route('providers.edit', ['provider' => $provider]) }}" class="btn btn-outline btn-edit">
                                        <i class='btn-icon bx bx-edit-alt' ></i>
                                    </a>
                                    <a onclick="confirmation(event)" href="{{ route('providers.delete', ['provider' => $provider]) }}" class="btn btn-outline btn-remove">
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
        <!-- END provider TABLE -->

    </div>
</div>
@endsection

@section('js')
<script>
    let table = document.getElementsByTagName('table')[0];
    let mytable = new JSTable('table');
</script>
@endsection
