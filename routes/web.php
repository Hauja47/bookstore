<?php

use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     // print_r(session()->all());
//     // if (session()->has('isDark')) {
//     //     session()->put('isDark', !session('isDark'));
//     // }
//     // else {
//     //     //provide an initial value of isDark
//     //     session()->put('isDark', true);
//     // }

//     $allRoutes = collect(Route::getRoutes())->map(function ($route) { return $route->uri(); });
//     dd($allRoutes);
// });

// Route::get('/', function () {
//     return view('main.login');
// });

Route::get('/', [SessionController::class, 'create'])->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->name('login')->middleware('guest');

Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::get('dashboard', function () {
    return view('main.dashboard');
})->middleware('auth');

Route::prefix('order')->group(function () {
    Route::get('/', function () {
        return view('main.orders.order_list');
    });
});

Route::prefix('refund')->group(function () {
    Route::get('/', function () {
        return view('main.refunds.refund_list');
    });
});

Route::prefix('product')->group(function () {
    Route::get('/', function () {
        return view('main.products.product_list');
    });

    Route::get('/create', function () {
        return view('main.products.create');
    });
});

Route::prefix('invoice')->group(function () {
    Route::get('/', function () {
        return view('main.invoices.invoice_list');
    });
});

Route::prefix('customer')->group(function () {
    Route::get('/', function () {
        return view('main.customers.customer_list');
    });
});



Route::prefix('employee')->group(function () {
    Route::get('/', function () {
        return view('main.employees.employee_list');
    });
});




// Route::prefix('orders')->group(function () {
//     // Danh sách danh mục
//     Route::get('/', [OrdersController::class, 'index'])->name('orders.list');

//     // Lấy chi tiết 1 chuyên mục (Áp dụng show form sửa chuyên mục)
//     Route::get('/edit/{id}', [OrdersController::class, 'getOrder'])->name('orders.edit');

//     // Xử lý update chuyên mục
//     Route::post('/edit/{id}', [OrdersController::class, 'updateOrder']);

//     // Hiển thị form add dữ liệu
//     Route::get('/add', [OrdersController::class, 'addOrder'])->name('orders.add');

//     // Xử lý thêm chuyên mục
//     Route::post('/add', [OrdersController::class, 'handleAddOrder']);

//     // Xoá chuyên mục
//     Route::delete('/delete/{id}', [OrdersController::class, 'deleteOrder'])->name('orders.delete');

//     // Hiển thị form upload
//     Route::get('/upload', [OrdersController::class, 'getFile'])->name('orders.upload');

//     // Xử lý lấy thông tin file
//     Route::post('/upload', [OrdersController::class, 'handleFile']);
// });
