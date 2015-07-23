<?php

// ------------------------------------------------------------------------------
// Wiki routes
// ------------------------------------------------------------------------------
$app->get('/', [
    'uses' => 'WikiController@makePage',
    'as'   => 'wiki.index'
]);

$app->get('{one}', [
    'uses' => 'WikiController@makePage',
    'as'   => 'wiki.one'
]);

$app->get('{one}/{two}', [
    'uses' => 'WikiController@makePage',
    'as'   => 'wiki.two'
]);

$app->get('{one}/{two}/{three}', [
    'uses' => 'WikiController@makePage',
    'as'   => 'wiki.three'
]);

$app->get('{one}/{two}/{three}/{four}', [
    'uses' => 'WikiController@makePage',
    'as'   => 'wiki.four'
]);
