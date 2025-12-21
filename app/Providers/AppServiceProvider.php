<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\User;
use App\Models\Question;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

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
        View::composer('components.admin.sidebar', function ($view) {
            $view->with('nonaktifCount', User::where('status', 'nonaktif')->count());
            $view->with('questionCount', Question::doesntHave('answer')->count());
            $view->with('pendingOrderCount', Order::where('status', 'Pending')->count());
        });

        // Untuk navbar user
        View::composer('components.user.navbar', function ($view) {
            $notifOrderCount = 0;
            if (Auth::check()) {
                $notifOrderCount = Order::where('user_id', Auth::id())
                    ->whereIn('status', ['Diterima', 'Ditolak'])
                    ->count();
            }
            $view->with('notifOrderCount', $notifOrderCount);
        });
    }
}
