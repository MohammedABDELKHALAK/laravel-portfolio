<?php

namespace App\Providers;

use App\Models\User;
use App\View\Components\Dots;
use Illuminate\Support\Facades\Blade;
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
        $profile = User::with(['social'])->select('*')
            ->first(); 
            
        View::composer('resume.*', function ($view) use ($profile) {
            $view->with('profile', $profile);
        });

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
