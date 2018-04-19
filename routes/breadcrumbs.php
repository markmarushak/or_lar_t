<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('home'));
});

// Home > About
Breadcrumbs::register('compaigns', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('compaigns', route('compaigns'));
});

?>