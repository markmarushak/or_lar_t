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

//affiliates-partners
Breadcrumbs::register('affiliates-partners', function($breadcrumbs) {

    $breadcrumbs->parent('affiliate-service');
    $breadcrumbs->push('Affiliates/Partners', route('affiliates-partners'));
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

//data-filters-rules-add
Breadcrumbs::register('data-filters-rules-add', function($breadcrumbs) {
    $breadcrumbs->parent('data-filters-rules');
    $breadcrumbs->push('Add', route('data-filters-rules-add'));
});

//data-filters-rules-edit
Breadcrumbs::register('data-filters-rules-edit', function($breadcrumbs, $param = null) {
    $breadcrumbs->parent('data-filters-rules');
    $breadcrumbs->push($param . 'Garasje-Tilbub.no - Edit Section', route('data-filters-rules-edit', ['data_filters_rules_id', 'data_filters_rules_description']));
});

//connection
Breadcrumbs::register('connection', function($breadcrumbs) {

    $breadcrumbs->parent('data-filters-rules-edit');
    $breadcrumbs->push('Connection', route('connection', ['data_filters_rules_id', 'data_filters_rules_description']));
});

//form-builder
Breadcrumbs::register('form-builder', function($breadcrumbs) {

    $breadcrumbs->parent('data-filters-rules-edit');
    $breadcrumbs->push('Form Builder', route('form-builder', ['data_filters_rules_id', 'data_filters_rules_description']));
});


//data-base-fields
Breadcrumbs::register('data-base-fields', function($breadcrumbs) {

    $breadcrumbs->parent('data-filters-rules-edit');
    $breadcrumbs->push('Database Fields', route('data-base-fields', ['data_filters_rules_id', 'data_filters_rules_description']));
});



//data-filters-rules-data
Breadcrumbs::register('data-filters-rules-data', function($breadcrumbs) {

    $breadcrumbs->parent('data-filters-rules-edit');
    $breadcrumbs->push('Data Filters & Rules', route('data-filters-rules-data', ['data_filters_rules_id', 'data_filters_rules_description']));
});

//output-overview
Breadcrumbs::register('output-overview', function($breadcrumbs) {

    $breadcrumbs->parent('data-filters-rules-edit');
    $breadcrumbs->push('Output Overview', route('output-overview', ['data_filters_rules_id', 'data_filters_rules_description']));
});


//output-overview-single
Breadcrumbs::register('output-overview-single', function($breadcrumbs, $nameEntry ) {


    $breadcrumbs->parent('output-overview');
    $breadcrumbs->push($nameEntry ,route('output-overview-single', [  'single_id', 'data_filters_rules_id', 'data_filters_rules_description']));
});

?>