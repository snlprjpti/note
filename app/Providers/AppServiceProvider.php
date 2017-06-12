<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Note;
use App\User;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
   public function boot()
    {
        Schema::defaultStringLength(191);

         $notes = Note::all();
        View::share('notes', $notes);  

        $users = User::all();
        View::share('users', $users);


    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    
}
