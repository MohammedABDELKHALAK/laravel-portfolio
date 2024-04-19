<?php

namespace App\Providers;

use App\Models\User;
use App\View\Components\Dots;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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

        // retrieve the user data to Share the profile data with views in the 'resume' folder
        // to allow visitor shows the porfolio without bieng auth

        // i made Schema::hasTable('users') in if condition it's for if you config the app like apply migrate or composer update 
        //to avoid iny errors because laravel start with regester and boots methods so pay attation on App/Provider
        //and Route::currentRouteName() i made it to avoid error when make first user regstration, i specify whish exact rouutes will work
        // i use php method in_array because i have bunch of routes

        // i give this (Default profile to null) because when i used Route::currentRouteName(), i got error message "Undefined variable $profile"
        // so that why i used  View::share('profile', null) to share the default value for $profile to all view pages which i mention it below resume.*


        //************* i commented this because i used midlware method is best practice **********//
        //*****************************************************************************************//

        // View::share('profile', null);

        // if (Schema::hasTable('users') && in_array(Route::currentRouteName(), ['resume.home', 'resume.resume', 'resume.project'])) {

        //     $profile = User::with(['social', 'experiences', 'skills'])->select('*')
        //         ->first();

        //     View::composer('resume.*', function ($view) use ($profile) {
        //         $view->with('profile', $profile);
        //     });
        // }

        //*************************************** *//
        //*************************************** *//

        // Share the profile data with all views
        // view()->share('profile', $profile);

        // other hard way to Share the profile data with all views '*' means all folders in the view
        //    View::composer('*', function ($view) use ($profile) {
        //     $view->with('profile', $profile);
        // });


        // Share the profile data with specific views in the 'your_folder' folder
        // View::composer(['your_folder.view1', 'your_folder.view2'], function ($view) use ($profile) {
        //     $view->with('profile', $profile);
        // });
    }
}
