<?php

// ------------------------------------------------------------------------------
// Wiki routes
// ------------------------------------------------------------------------------
$app->get('/', [
    'uses' => 'WikiController@index',
    'as'   => 'wiki.index'
]);

$app->get('{one}', [
    'uses' => 'WikiController@one',
    'as'   => 'wiki.one'
]);

$app->get('{one}/{two}', [
    'uses' => 'WikiController@two',
    'as'   => 'wiki.two'
]);

$app->get('{one}/{two}/{three}', [
    'uses' => 'WikiController@three',
    'as'   => 'wiki.three'
]);

$app->get('{one}/{two}/{three}/{four}', [
    'uses' => 'WikiController@four',
    'as'   => 'wiki.four'
]);
