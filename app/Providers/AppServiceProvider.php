<?php

namespace App\Providers;

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
        View::composer(['conversations.create', 'conversations.index', 'conversations.show'], function ($view) {
            $view->with(
                'conversations',
                auth()->user()->conversations()->orderBy('last_message_at', 'desc')->get()
            );
        });
    }
}
