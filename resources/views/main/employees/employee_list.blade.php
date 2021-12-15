@extends('templates.template', [
'title'=> 'Danh sách nhân viên',
'main_header'=> 'Danh sách nhân viên',

'active_dashboard' => '',
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
'active_employee' => 'active',
'open_setting' => '',
'active_regulation' => '',
])

@section('css')
<link rel="stylesheet" href="{{ asset('css/list.css') }}">
<link rel="stylesheet" href="{{ asset('css/employee_list.css') }}">
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
            <a href="{{ route('employees.create') }}" class="btn-function btn-function__add">
                <i class='btn-function-icon btn-function__add-icon bx bx-plus' ></i>
                <!-- <i class='btn-function-icon bx bx-plus-circle' ></i> -->
                Thêm nhân viên
            </a>
        </div>
    </div>
    <!-- END  -->

    <div class="row">
        <!-- EMPLOYEE TABLE -->
        <div class="col l-12 md-12 c-12">
            <div class="box">
                <div class="box-body">
                    <table class="main-employee-table">
                        <thead>
                            <tr>
                                <th>Mã nhân viên</th>
                                <th>Ảnh</th>
                                <th>Tên nhân viên</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Địa chỉ</th>
                                <th>Ngày vào làm</th>
                                <th data-sortable="false"></th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- <tr>
                                <td>NV0000016</td>
                                <td>
                                    trần thị nhung
                                </td>
                                <td>0123456789</td>
                                <td>
                                    khanhnguyen@gmail.com
                                </td>
                                <td>
                                    Bù Đăng, Bình Phước
                                </td>
                                <td>10/11/2019</td>
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
                                <td>NV0000016</td>
                                <td>
                                    trần thị nhung
                                </td>
                                <td>0123456789</td>
                                <td>
                                    khanhnguyen@gmail.com
                                </td>
                                <td>
                                    Bù Đăng, Bình Phước
                                </td>
                                <td>10/11/2019</td>
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
                                <td>NV0000016</td>
                                <td>
                                    trần thị nhung
                                </td>
                                <td>0123456789</td>
                                <td>
                                    khanhnguyen@gmail.com
                                </td>
                                <td>
                                    Bù Đăng, Bình Phước
                                </td>
                                <td>10/11/2019</td>
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
                                <td>NV0000016</td>
                                <td>
                                    trần thị nhung
                                </td>
                                <td>0123456789</td>
                                <td>
                                    khanhnguyen@gmail.com
                                </td>
                                <td>
                                    Bù Đăng, Bình Phước
                                </td>
                                <td>10/11/2019</td>
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
                                <td>NV0000016</td>
                                <td>
                                    trần thị nhung
                                </td>
                                <td>0123456789</td>
                                <td>
                                    khanhnguyen@gmail.com
                                </td>
                                <td>
                                    Bù Đăng, Bình Phước
                                </td>
                                <td>10/11/2019</td>
                                <td>
                                    <a href="" class="btn btn-outline btn-edit">
                                        <i class='btn-icon bx bx-edit-alt' ></i>
                                    </a>
                                    <a href="" class="btn btn-outline btn-remove">
                                        <i class='btn-icon bx bx-trash-alt' ></i>
                                    </a>

                                </td>
                            </tr> --}}
                            @foreach (\App\Models\Employee::all() as $employee)
                            <tr>
                                <td>{{ 'NV'.$employee->id }}</td>
                                <td>
                                    <img src="{{ $employee->photo ? asset('/storage/'.$employee->photo) : asset('images/no-avatar.png')}}" alt="" class="employee-img">
                                </td>
                                <td>{{ $employee->full_name }}</td>
                                <td>{{ $employee->phone_number }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>
                                    {{ $employee->address }}
                                </td>
                                <td>{{ \Carbon\Carbon::parse($employee->created_at)->format('d/m/Y')}}</td>
                                <td>
                                    <a href="{{ route('employees.edit', ['employee' => $employee]) }}" class="btn btn-outline btn-edit">
                                        <i class='btn-icon bx bx-edit-alt' ></i>
                                    </a>
                                    <a onclick="confirmation(event)" href="{{ route('employees.delete', ['employee' => $employee]) }}" class="btn btn-outline btn-remove">
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
        <!-- END EMPLOYEE TABLE -->

    </div>
</div>
@endsection

@section('js')
<script>
    let table = document.getElementsByTagName('table')[0];
    let mytable = new JSTable('table');
</script>
@endsection
