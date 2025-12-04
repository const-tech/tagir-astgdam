<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Governmental;
use App\Models\User;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('admin.layouts.admin', function ($view) {
            $fields = [
                'end_id_number',
                'end_insurance',
                'end_passport',
                'end_driver_card',
                'end_health_card',
                'end_is_employee',
                'end_resident',
            ];

            $counts = [
                'governmentals' => Governmental::whereDate('expire_date', '<', now())->count(),
            ];
            foreach ($fields as $f) {
                $counts[$f] = User::whereDate($f, '<', now())->count();
            }
            $counts['total'] = array_sum($counts);
            $view->with('expired_counts', $counts);
        });
    }
}
