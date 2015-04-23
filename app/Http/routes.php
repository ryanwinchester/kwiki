<?php

$app->get('/', function () use ($app) {
    return 'home';
});

// ------------------------------------------------------------------------------
// Wiki routes
// ------------------------------------------------------------------------------
$app->get('{one}', [
    'uses' => 'Fungku\Kwiki\Http\Controllers\WikiController@one',
    'as'   => 'wiki.one'
]);

$app->get('{one}/{two}', [
    'uses' => 'Fungku\Kwiki\Http\Controllers\WikiController@two',
    'as'   => 'wiki.two'
]);

$app->get('{one}/{two}/{three}', [
    'uses' => 'Fungku\Kwiki\Http\Controllers\WikiController@three',
    'as'   => 'wiki.three'
]);

$app->get('{one}/{two}/{three}/{four}', [
    'uses' => 'Fungku\Kwiki\Http\Controllers\WikiController@four',
    'as'   => 'wiki.four'
]);
