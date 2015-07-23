<?php

namespace Fungku\Kwiki\Providers;

use Fungku\Postmark\Contracts\Parseable;
use Fungku\Postmark\Parser;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Parseable::class, Parser::class);
    }
}
