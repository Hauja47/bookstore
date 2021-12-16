@extends('templates.template', [
'title'=> 'Danh sách phiếu thu',
'main_header'=> 'Danh sách phiếu thu',

'active_dashboard' => '',
'open_invoice' => '',
'active_invoice' => '',
'active_return_good' => '',
'open_product' => '',
'active_product' => '',
'active_goods_receipt' => '',
'active_provider' => '',
'active_customer' => '',
'open_budget' => 'sidebar__menu-dropdown-icon--open',
'active_payment' => '',
'active_receipt' => 'active',
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
<link rel="stylesheet" href="{{ asset('css/budget_list.css') }}">

@endsection

@section('main-content')
<div class="main-content">
    <!-- FUNCTION BUTTON -->
    <div class="row main-function">
        <div class="col l-6 md-6 c-6">
            {{-- <a href="" class="btn-function btn-function__export">
                <i class='btn-function-icon btn-function__export-icon bx bx-download' ></i>
                Xuất file
            </a> --}}
        </div>
        <div class="col l-6 md-6 c-6">
            <a href="{{ route('receipts.create') }}" class="btn-function btn-function__add">
                <i class='btn-function-icon btn-function__add-icon bx bx-plus' ></i>
                <!-- <i class='btn-function-icon bx bx-plus-circle' ></i> -->
                Thêm phiếu thu
            </a>
        </div>
    </div>
    <!-- END  -->

    <div class="row">
        <!-- CUSTOMER TABLE -->
        <div class="col l-12 md-12 c-12">
            <div class="box">
                <div class="box-body">
                    <table class="main-budget-table">
                        <thead>
                            <tr>
                                <th>Mã phiếu thu</th>
                                <th>Đối tượng gửi</th>
                                <th>Tên đối tượng</th>
                                <th>Nhân viên thực hiện</th>
                                <th>Ghi chú</th>
                                <th>Số tiền thu</th>
                                <th data-sortable="false"></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach (\App\Models\Receipt::all() as $receipt)
                            <tr>
                                <td>{{ 'PT'.$receipt->id }}</td>
                                <td>{{ $receipt->giver_type}}</td>
                                <td>{{ $receipt->giver->name ?? $receipt->giver->full_name }}</td>
                                <td>
                                    {{ $receipt->employee->full_name }}
                                </td>
                                <td>
                                    {{ $receipt->note }}
                                </td>
                                <td>{{ number_format($receipt->money,).'đ' }}</td>
                                <td>
                                    <a href="{{ route('receipts.edit', ['receipt' => $receipt]) }}" class="btn btn-outline btn-edit">
                                        @if ($receipt->can_delete == 1)
                                            <i class='btn-icon bx bx-edit-alt' ></i>
                                        @else
                                            <i class='btn-icon bx bx-info-circle'></i>
                                        @endif
                                    </a>
                                    @if ($receipt->can_delete == 1)
                                    <a onclick="confirmation(event)" href="{{ route('receipts.delete', ['receipt' => $receipt]) }}" class="btn btn-outline btn-remove">
                                        <i class='btn-icon bx bx-trash-alt' ></i>
                                    </a>
                                    @endif
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
