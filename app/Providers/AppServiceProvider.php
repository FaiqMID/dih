<?php

namespace App\Providers;

use App\Models\Notification;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrap();
        View::composer('*', function ($view) {
            if (Auth::check()){
                $notifications = Notification::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->limit(3)->get();
                $notifCount = $notifications->where('is_read', false)->count();
                \Cart::session(Auth::user()->id);
                if (\Cart::getContent()){
                    $cartCount = \Cart::getContent()->count();
                }
                $view->with([
                    'notifs' => $notifications,
                    'notifCount' => $notifCount,
                    'cartCount' => $cartCount
                ]);
            }
        });
    }
}
