@extends('templates.template', [
'title'=> 'Danh sách phiếu chi',
'main_header'=> 'Danh sách phiếu chi',

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
'active_payment' => 'active',
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
            <a href="{{ route('payments.create') }}" class="btn-function btn-function__add">
                <i class='btn-function-icon btn-function__add-icon bx bx-plus' ></i>
                <!-- <i class='btn-function-icon bx bx-plus-circle' ></i> -->
                Thêm phiếu chi
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
                                <th>Mã phiếu chi</th>
                                <th>Đối tượng nhận</th>
                                <th>Tên đối tượng</th>
                                <th>Nhân viên thực hiện</th>
                                <th>Ghi chú</th>
                                <th>Số tiền chi</th>
                                <th data-sortable="false"></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach (\App\Models\Payment::all() as $payment)
                            <tr>
                                <td>{{ 'PT'.$payment->id }}</td>
                                <td>{{ $payment->receiver_type}}</td>
                                <td>{{ $payment->receiver->name ?? $payment->receiver->full_name }}</td>
                                <td>
                                    {{ $payment->employee->full_name }}
                                </td>
                                <td>
                                    {{ $payment->note }}
                                </td>
                                <td>{{ number_format($payment->money,).'đ' }}</td>
                                <td>
                                    <a href="{{ route('payments.edit', ['payment' => $payment]) }}" class="btn btn-outline btn-edit">
                                        @if ($payment->can_edit_note == 1)
                                            <i class='btn-icon bx bx-edit-alt' ></i>
                                        @else
                                            <i class='btn-icon bx bx-info-circle'></i>
                                        @endif
                                    </a>
                                    @if ($payment->can_delete == 1)
                                    <a onclick="confirmation(event)" href="{{ route('payments.delete', ['payment' => $payment]) }}" class="btn btn-outline btn-remove">
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
