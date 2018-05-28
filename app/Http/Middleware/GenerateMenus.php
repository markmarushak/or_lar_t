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
                    ['\App\Http\Controllers\Affiliate\DataFilterRuleController@connection',
                        'data_filters_rules_id' => $this->request->data_filters_rules_id,
                        'data_filters_rules_description' => $this->request->data_filters_rules_description
                    ]]);


            $menu->add('Form Builder',
                ['action' =>
                    ['\App\Http\Controllers\Affiliate\DataFilterRuleController@formbuilder',
                        'data_filters_rules_id' => $this->request->data_filters_rules_id,
                        'data_filters_rules_description' => $this->request->data_filters_rules_description
                    ]]);

            $menu->add('Database Fields',
                ['action' =>
                    ['\App\Http\Controllers\Affiliate\AffiliateController@dataBaseFields',
                        'data_filters_rules_id' => $this->request->data_filters_rules_id,
                        'data_filters_rules_description' => $this->request->data_filters_rules_description
                    ]]);


            $menu->add('Affiliates/Partners',
                ['action' =>
                    ['\App\Http\Controllers\Affiliate\AffiliateController@affiliatesPartners',
                        'data_filters_rules_id' => $this->request->data_filters_rules_id,
                        'data_filters_rules_description' => $this->request->data_filters_rules_description
                    ]]);


            $menu->add('Data Filters & Rules',
                ['action' =>
                    ['\App\Http\Controllers\Affiliate\AffiliateController@dataFiltersRulesData',
                        'data_filters_rules_id' => $this->request->data_filters_rules_id,
                        'data_filters_rules_description' => $this->request->data_filters_rules_description
                    ]]);

            //output-overview
            $menu->add('Output Overview',
                ['action' =>
                    ['\App\Http\Controllers\Affiliate\AffiliateController@outputOverview',
                        'data_filters_rules_id' => $this->request->data_filters_rules_id,
                        'data_filters_rules_description' => $this->request->data_filters_rules_description
                    ]]);

        });

        return $next($request);
    }
}