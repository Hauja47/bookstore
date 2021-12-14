<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', function () {
    if (auth()->check()) {
        return redirect(route('dashboard'));
    }

    return redirect(route('login'));
});

Route::get('/logout', [SessionController::class, 'destroy'])->middleware('auth')->name('logout');

// Login
Route::get('/login', [SessionController::class, 'create'])->name('login')->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->name('login')->middleware('guest');

// Dashboard
Route::get('/dashboard', function () {
    return view('main.dashboard');
})->middleware('auth')->name('dashboard');

// User
Route::get('/user', function () {
    return view('main.user');
})->middleware('auth')->name('user');


// Orders
Route::prefix('order')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('main.orders.order_list');
    })->name('orders.index');
});

// Refunds
Route::prefix('refund')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('main.refunds.refund_list');
    })->name('refunds.index');
});

// Products
Route::prefix('product')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('main.products.product_list');
    })->name('products.index');


    // Hiển thị form create
    Route::get('/create', [ProductController::class, 'create'])->name('products.create');
    // Xử lý create
    Route::post('/create', [ProductController::class, 'store']);
    // Hiển thị form edit
    Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('products.edit');
    // Xử lý edit
    Route::post('/edit/{product}', [ProductController::class, 'update']);
    // Xử lý delete
    Route::get('/delete/{product}', [ProductController::class, 'destroy'])->name('products.delete');

    Route::prefix('/option')->group(function () {
        Route::get('/', function () {
            return view('main.products.option');
        })->name('products.option');

        Route::prefix('brand')->group(function () {
            // Hiển thị form create
            Route::get('/create', [BrandController::class, 'create'])->name('brands.create');
            // Xử lý create
            Route::post('/create', [BrandController::class, 'store']);
            // Hiển thị form edit
            Route::get('/edit/{brand}', [BrandController::class, 'edit'])->name('brands.edit');
            // Xử lý edit
            Route::post('/edit/{brand}', [BrandController::class, 'update']);
            // Xử lý delete
            Route::get('/delete/{brand}', [BrandController::class, 'destroy'])->name('brands.delete');
        });

        Route::prefix('category')->group(function () {
            // Hiển thị form create
            Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
            // Xử lý create
            Route::post('/create', [CategoryController::class, 'store']);
            // Hiển thị form edit
            Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
            // Xử lý edit
            Route::post('/edit/{category}', [CategoryController::class, 'update']);
            // Xử lý delete
            Route::get('/delete/{category}', [CategoryController::class, 'destroy'])->name('categories.delete');
        });
    });
});

// Invoices
Route::prefix('invoice')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('main.invoices.invoice_list');
    })->name('invoices.index');
});

// Suppliers
Route::prefix('supplier')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('main.suppliers.supplier_list');
    })->name('suppliers.index');

    Route::get('/create', function () {
        return view('main.suppliers.create');
    })->name('suppliers.create');

    Route::get('/edit/{id}', function () {
        return view('main.suppliers.edit');
    })->name('suppliers.edit');
});

// Customers
Route::prefix('customer')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('main.customers.customer_list');
    })->name('customers.index');

    Route::get('/create', function () {
        return view('main.customers.create');
    })->name('customers.create');

    Route::get('/edit/{id}', function () {
        return view('main.customers.edit');
    })->name('customers.edit');
});

// Budgets
Route::prefix('budgets')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('main.budgets.budget_list');
    })->name('budgets.index');
});

// Expenditures
Route::prefix('expenditure')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('main.expenditures.expenditure_list');
    })->name('expenditures.index');
});

// Revenues
Route::prefix('revenue')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('main.revenues.revenue_list');
    })->name('revenues.index');
});

// Reports
Route::prefix('reports')->middleware('auth')->group(function () {
    Route::get('/stock', function () {
        return view('main.reports.stock');
    })->name('reports.stock');
    Route::get('/debt', function () {
        return view('main.reports.debt');
    })->name('reports.debt');
});

// Employees
Route::prefix('employee')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('main.employees.employee_list');
    })->name('employees.index');

    Route::get('/create', function () {
        return view('main.employees.create');
    })->name('employees.create');

    Route::get('/edit/{id}', function () {
        return view('main.employees.edit');
    })->name('employees.edit');
});

// Settings
Route::prefix('setting')->middleware('auth')->group(function () {
    Route::get('/regulation', function () {
        return view('main.settings.regulation');
    })->name('settings.regulation');
});




// Route::prefix('orders')->group(function () {
//     // Danh sách danh mục
//     Route::get('/', [OrdersController::class, 'index'])->name('orders.list');

//     // Lấy chi tiết 1 chuyên mục (Áp dụng show form sửa chuyên mục)
//     Route::get('/edit/{id}', [OrdersController::class, 'getOrder'])->name('orders.edit');

//     // Xử lý update chuyên mục
//     Route::post('/edit/{id}', [OrdersController::class, 'updateOrder']);

//     // Hiển thị form create dữ liệu
//     Route::get('/create', [OrdersController::class, 'createOrder'])->name('orders.create');

//     // Xử lý thêm chuyên mục
//     Route::post('/create', [OrdersController::class, 'handleAddOrder']);

//     // Xoá chuyên mục
//     Route::delete('/delete/{id}', [OrdersController::class, 'deleteOrder'])->name('orders.delete');

//     // Hiển thị form upload
//     Route::get('/upload', [OrdersController::class, 'getFile'])->name('orders.upload');

//     // Xử lý lấy thông tin file
//     Route::post('/upload', [OrdersController::class, 'handleFile']);
// });
