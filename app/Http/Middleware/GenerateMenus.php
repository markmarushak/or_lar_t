<?php

namespace App\Http\Middleware;

use Closure;

class GenerateMenus
{

    protected $request = null;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        //Declare Request to display it in menu
        $this->request = $request;

        //Edit Section menu
        \Menu::make('MyNavBar', function ($menu) {
            $menu->add('Affiliate Service', 'affiliate-service');
            //$menu->add('Other Service', 'affiliate-service');
        });

        //Edit Section menu Tabs
        \Menu::make('EditSectionMenu', function ($menu) {



            $menu->add('Connection',
                ['action' =>
                    ['\App\Http\Controllers\Affiliate\AffiliateService@connection',
                        'data_filters_rules_id' => $this->request->data_filters_rules_id,
                        'data_filters_rules_description' => $this->request->data_filters_rules_description
                    ]]);

            $menu->add('Form Builder',
                ['action' =>
                    ['\App\Http\Controllers\Affiliate\AffiliateService@formbuilder',
                        'data_filters_rules_id' => $this->request->data_filters_rules_id,
                        'data_filters_rules_description' => $this->request->data_filters_rules_description
                    ]]);

            $menu->add('Database Fields',
                ['action' =>
                    ['\App\Http\Controllers\Affiliate\AffiliateService@dataBaseFields',
                        'data_filters_rules_id' => $this->request->data_filters_rules_id,
                        'data_filters_rules_description' => $this->request->data_filters_rules_description
                    ]]);


            $menu->add('Affiliates/Partners',
                ['action' =>
                    ['\App\Http\Controllers\Affiliate\AffiliateService@affiliatesPartners',
                        'data_filters_rules_id' => $this->request->data_filters_rules_id,
                        'data_filters_rules_description' => $this->request->data_filters_rules_description
                    ]]);

            $menu->add('Affiliates/Partners', 'affiliates-partners');
            $menu->add('Data Filters & Rules', 'data-filters-rules');
            $menu->add('Output Overview', 'output-overview');
        });

        return $next($request);
    }
}