<?php

namespace App\Providers;

use App\Models\ReturnGoodsReceipt;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Fix: Specified key was too long; max key length is 1000 bytes
        Schema::defaultStringLength(191);

        //Dark mode
        view()->composer('templates.template', function ($view) {
            $theme = Cookie::get('theme');
            // dd($theme);
            if ($theme != 'dark-mode') {
                $theme = '';
            } else {
                $theme = 'dark-mode';
            }

            $view->with('theme', $theme);
        });
        Blade::directive('datetime', function ($expression) {
            return "<?php echo ($expression)->format('d/m/Y H:i'); ?>";
        });

        //Map model with name
        Relation::morphMap([
            'Sách' => 'App\Models\Book',
            'Văn phòng phẩm' => 'App\Models\Stationery',
            'Nhân viên' => 'App\Models\Employee',
            'Nhà cung cấp' => 'App\Models\Provider',
            'Khách hàng' => 'App\Models\Customer',
            'Đơn nhập hàng' => 'App\Models\GoodsReceipt',
            'Đơn trả hàng' => ReturnGoodsReceipt::class
        ]);

        //Define role admin
        Gate::define('admin', function (User $user) {
            return $user->role == 1;
        });
    }
}
