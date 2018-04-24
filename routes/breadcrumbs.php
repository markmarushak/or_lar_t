<?php

// Dashboard
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('home'));
});

// Dashboard > Affiliate Service
Breadcrumbs::register('affiliate-service', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Affiliate Service', route('affiliate-service'));
});

// Dashboard > Affiliate Service > compaigns
Breadcrumbs::register('compaigns', function($breadcrumbs)
{
    $breadcrumbs->parent('affiliate-service');
    $breadcrumbs->push('Compaigns', route('compaigns'));
});


Breadcrumbs::register('email-bulk-split', function($breadcrumbs) {

    $breadcrumbs->parent('compaigns');

    $breadcrumbs->push('Email BulkSplit', route('email-bulk-split'));

});

Breadcrumbs::register('data-filters-rules', function($breadcrumbs) {

    $breadcrumbs->parent('email-bulk-split');

    $breadcrumbs->push('Data Filters & Rules', route('data-filters-rules'));

});


//data-filters-rules-edit
Breadcrumbs::register('data-filters-rules-edit', function($breadcrumbs) {

    $breadcrumbs->parent('data-filters-rules');

    $breadcrumbs->push('Edit Section', route('data-filters-rules-edit', 'data_filters_rules_id'));

});

?>