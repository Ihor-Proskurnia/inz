<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\User;
use App\Models\Order;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(\L5Swagger\L5SwaggerServiceProvider::class);

        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::morphMap([
            'Order' => Order::class,
            'User' => User::class,
            'Category' => Category::class,
        ]);
    }
}
