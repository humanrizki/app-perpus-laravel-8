<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\RuleAdmin;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Mediconesystems\LivewireDatatables\Exports\DatatableExport;
use Mediconesystems\LivewireDatatables\LivewireDatatablesServiceProvider;

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
        //
        
        // Paginator::defaultView('vendor.pagination.default');
        // Paginator::defaultSimpleView('vendor.pagination.simple-default');
        Paginator::useTailwind();
        LivewireDatatablesServiceProvider::publishableProviders();
        LivewireDatatablesServiceProvider::publishableGroups();
        // Gate::define('add-book',function(Admin $admin){
        //     return $admin->can('add-book');
        // });
    }
}
