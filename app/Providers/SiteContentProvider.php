<?php

namespace App\Providers;

use App\Models\SiteContent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class SiteContentProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $data['sc'] = DB::table('site_contents')->first();
         View::share($data) ;
    }
}
