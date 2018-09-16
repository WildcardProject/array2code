<?php
namespace ProgrammingCat\Array2Code;
use Illuminate\Support\ServiceProvider;

class Array2CodeServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Array2Code::class, function () {
            return new Array2Code();
        });
        $this->app->alias(Array2Code::class, 'array2code');
    }

    public function provides()
    {
        return [Youtube::class];
    }
}