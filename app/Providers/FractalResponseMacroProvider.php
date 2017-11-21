<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\TransformerAbstract;

class FractalResponseMacroProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Response::macro('fractal', function ($eloquent, $transformer) {
            if (!$transformer instanceof TransformerAbstract) {
                throw new InvalidArgumentException("Argument 2 must be an instance of " . TransformerAbstract::class);
            }

            $fractal = new Manager();

            if ($eloquent instanceof Illuminate\Support\Collection) {
                $resource = new Collection($eloquent, $transformer);
            } else {
                $resource = new Item($eloquent, $transformer);
            }

            return $fractal->createData($resource)->toJson();
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
