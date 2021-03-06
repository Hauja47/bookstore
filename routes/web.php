<?php

use App\Charts\LastSevenDayRevenueChart;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\GoodsReceiptController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ParameterController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\ReportStockController;


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
Route::get('/dashboard', function (LastSevenDayRevenueChart $chart) {
    return view('main.dashboard', ['chart' => $chart->build()]);
})->middleware('auth')->name('dashboard');

// User
Route::get('/user', function () {
    return view('main.user');
})->middleware('auth')->name('user');


// Return_goods
Route::prefix('return_good')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('main.return_goods.return_good_list');
    })->name('return_goods.index');
});

// Products
Route::prefix('product')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('main.products.product_list');
    })->name('products.index');


    // Hi???n th??? form create
    Route::get('/create', [ProductController::class, 'create'])->name('products.create');
    // X??? l?? create
    Route::post('/create', [ProductController::class, 'store']);
    // Hi???n th??? form edit
    Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('products.edit');
    // X??? l?? edit
    Route::post('/edit/{product}', [ProductController::class, 'update']);
    // X??? l?? delete
    Route::get('/delete/{product}', [ProductController::class, 'destroy'])->name('products.delete');

    Route::prefix('/option')->group(function () {
        Route::get('/', function () {
            return view('main.products.option');
        })->name('products.option');

        Route::prefix('brand')->group(function () {
            // Hi???n th??? form create
            Route::get('/create', [BrandController::class, 'create'])->name('brands.create');
            // X??? l?? create
            Route::post('/create', [BrandController::class, 'store']);
            // Hi???n th??? form edit
            Route::get('/edit/{brand}', [BrandController::class, 'edit'])->name('brands.edit');
            // X??? l?? edit
            Route::post('/edit/{brand}', [BrandController::class, 'update']);
            // X??? l?? delete
            Route::get('/delete/{brand}', [BrandController::class, 'destroy'])->name('brands.delete');
        });

        Route::prefix('category')->group(function () {
            // Hi???n th??? form create
            Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
            // X??? l?? create
            Route::post('/create', [CategoryController::class, 'store']);
            // Hi???n th??? form edit
            Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
            // X??? l?? edit
            Route::post('/edit/{category}', [CategoryController::class, 'update']);
            // X??? l?? delete
            Route::get('/delete/{category}', [CategoryController::class, 'destroy'])->name('categories.delete');
        });
    });
});

// Goods_receipts
Route::prefix('goods_receipt')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('main.goods_receipts.goods_receipt_list');
    })->name('goods_receipts.index');

    // Hi???n th??? form create
    Route::get('/create', [GoodsReceiptController::class, 'create'])->name('goods_receipts.create');
    // X??? l?? create
    Route::post('/create', [GoodsReceiptController::class, 'store']);
    // Hi???n th??? form edit
    Route::get('/edit/{goods_receipt}', [GoodsReceiptController::class, 'edit'])->name('goods_receipts.edit');
    // X??? l?? edit
    Route::post('/edit/{goods_receipt}', [GoodsReceiptController::class, 'update']);
    // X??? l?? delete
    Route::get('/delete/{goods_receipt}', [GoodsReceiptController::class, 'destroy'])->name('goods_receipts.delete');
});

// Providers
Route::prefix('provider')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('main.providers.provider_list');
    })->name('providers.index');

    // Hi???n th??? form create
    Route::get('/create', [ProviderController::class, 'create'])->name('providers.create');
    // X??? l?? create
    Route::post('/create', [ProviderController::class, 'store']);
    // Hi???n th??? form edit
    Route::get('/edit/{provider}', [ProviderController::class, 'edit'])->name('providers.edit');
    // X??? l?? edit
    Route::post('/edit/{provider}', [ProviderController::class, 'update']);
    // X??? l?? delete
    Route::get('/delete/{provider}', [ProviderController::class, 'destroy'])->name('providers.delete');
});

// Invoices
Route::prefix('invoice')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('main.invoices.invoice_list');
    })->name('invoices.index');

    // Hi???n th??? form create
    Route::get('/create', [InvoiceController::class, 'create'])->name('invoices.create');
    // X??? l?? create
    Route::post('/create', [InvoiceController::class, 'store']);
    // Hi???n th??? form edit
    Route::get('/edit/{invoice}', [InvoiceController::class, 'edit'])->name('invoices.edit');
    // X??? l?? edit
    Route::post('/edit/{invoice}', [InvoiceController::class, 'update']);
    // X??? l?? delete
    Route::get('/delete/{invoice}', [InvoiceController::class, 'destroy'])->name('invoices.delete');
});

// Customers
Route::prefix('customer')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('main.customers.customer_list');
    })->name('customers.index');

    // Hi???n th??? form create
    Route::get('/create', [CustomerController::class, 'create'])->name('customers.create');
    // X??? l?? create
    Route::post('/create', [CustomerController::class, 'store']);
    // Hi???n th??? form edit
    Route::get('/edit/{customer}', [CustomerController::class, 'edit'])->name('customers.edit');
    // X??? l?? edit
    Route::post('/edit/{customer}', [CustomerController::class, 'update']);
    // X??? l?? delete
    Route::get('/delete/{customer}', [CustomerController::class, 'destroy'])->name('customers.delete');
});

// Budgets
Route::prefix('budgets')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('main.budgets.budget_list');
    })->name('budgets.index');
});

// Payments Chi
Route::prefix('payment')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('main.payments.payment_list');
    })->name('payments.index');

    // Hi???n th??? form create
    Route::get('/create', [PaymentController::class, 'create'])->name('payments.create');
    // X??? l?? create
    Route::post('/create', [PaymentController::class, 'store']);
    // Hi???n th??? form edit
    Route::get('/edit/{payment}', [PaymentController::class, 'edit'])->name('payments.edit');
    // X??? l?? edit
    Route::post('/edit/{payment}', [PaymentController::class, 'update']);
    // X??? l?? delete
    Route::get('/delete/{payment}', [PaymentController::class, 'destroy'])->name('payments.delete');
});

// Receipt Thu
Route::prefix('receipt')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('main.receipts.receipt_list');
    })->name('receipts.index');

    // Hi???n th??? form create
    Route::get('/create', [ReceiptController::class, 'create'])->name('receipts.create');
    // X??? l?? create
    Route::post('/create', [ReceiptController::class, 'store']);
    // Hi???n th??? form edit
    Route::get('/edit/{receipt}', [ReceiptController::class, 'edit'])->name('receipts.edit');
    // X??? l?? edit
    Route::post('/edit/{receipt}', [ReceiptController::class, 'update']);
    // X??? l?? delete
    Route::get('/delete/{receipt}', [ReceiptController::class, 'destroy'])->name('receipts.delete');
});

// Reports
Route::prefix('report')->middleware('auth')->group(function () {
    Route::get('/stock', function () {
        return view('main.reports.stock');
    })->name('reports.stock');

    Route::get('/debt', function () {
        return view('main.reports.debt');
    })->name('reports.debt');

    Route::get('/budget', function () {
        return view('main.reports.budget');
    })->name('reports.budget');
});

// Settings
Route::prefix('setting')->middleware('auth')->group(function () {
    Route::get('/regulation', function () {
        return view('main.settings.regulation', ['parameters' => \App\Models\Parameter::all()]);
    })->name('settings.regulation');

    // X??? l?? edit
    Route::post('/regulation', [ParameterController::class, 'update'])->middleware('can:admin')->name('settings.regulation.edit');
});

// Employees
Route::prefix('employee')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('main.employees.employee_list');
    })->name('employees.index');

    // Hi???n th??? form create
    Route::get('/create', [EmployeeController::class, 'create'])->name('employees.create');
    // X??? l?? create
    Route::post('/create', [EmployeeController::class, 'store']);
    // Hi???n th??? form edit
    Route::get('/edit/{employee}', [EmployeeController::class, 'edit'])->name('employees.edit');
    // X??? l?? edit
    Route::post('/edit/{employee}', [EmployeeController::class, 'update']);
    // X??? l?? delete
    Route::get('/delete/{employee}', [EmployeeController::class, 'destroy'])->name('employees.delete');
});

// Settings
Route::prefix('setting')->middleware('auth')->group(function () {
    Route::get('/regulation', function () {
        return view('main.settings.regulation', ['parameters' => \App\Models\Parameter::all()]);
    })->name('settings.regulation');



    // X??? l?? edit
    Route::post('/regulation', [ParameterController::class, 'update'])->middleware('can:admin')->name('settings.regulation.edit');
});




// Route::prefix('invoices')->group(function () {
//     // Danh s??ch danh m???c
//     Route::get('/', [InvoicesController::class, 'index'])->name('invoices.list');

//     // L???y chi ti???t 1 chuy??n m???c (??p d???ng show form s???a chuy??n m???c)
//     Route::get('/edit/{id}', [InvoicesController::class, 'getInvoice'])->name('invoices.edit');

//     // X??? l?? update chuy??n m???c
//     Route::post('/edit/{id}', [InvoicesController::class, 'updateInvoice']);

//     // Hi???n th??? form create d??? li???u
//     Route::get('/create', [InvoicesController::class, 'createInvoice'])->name('invoices.create');

//     // X??? l?? th??m chuy??n m???c
//     Route::post('/create', [InvoicesController::class, 'handleAddInvoice']);

//     // Xo?? chuy??n m???c
//     Route::delete('/delete/{id}', [InvoicesController::class, 'deleteInvoice'])->name('invoices.delete');

//     // Hi???n th??? form upload
//     Route::get('/upload', [InvoicesController::class, 'getFile'])->name('invoices.upload');

//     // X??? l?? l???y th??ng tin file
//     Route::post('/upload', [InvoicesController::class, 'handleFile']);
// });
