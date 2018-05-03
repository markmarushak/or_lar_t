<?php

namespace App\Http\Middleware;

use Closure;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //Edit Section menu
        \Menu::make('MyNavBar', function ($menu) {
            $menu->add('Affiliate Service', 'affiliate-service');
            //$menu->add('Other Service', 'affiliate-service');
        });

        //Edit Section menu Tabs
        \Menu::make('EditSectionMenu', function ($menu) {



            $menu->add('Connection', 'connection');
            $menu->add('Form Builder', 'form-builder');
            $menu->add('Database Fields', 'database-fields');
            $menu->add('Affiliates/Partners', 'affiliates-partners');
            $menu->add('Data Filters & Rules', 'data-filters-rules');
            $menu->add('Output Overview', 'output-overview');
        });

        return $next($request);
    }
}