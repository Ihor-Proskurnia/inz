<?php

declare(strict_types=1);

namespace UseCases\User;

use UseCases\Contracts\User\IUser;
use UseCases\DomainServiceFactory;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Application as App;
use UseCases\Contracts\Requests\Auth\IRegisterUser;

class Register
{
    private DomainServiceFactory $domain_service_factory;
    private App $app;

    /**
     * @param DomainServiceFactory $domain_service_factory
     * @param App $app
     */
    public function __construct(DomainServiceFactory $domain_service_factory, App $app)
    {
        $this->domain_service_factory = $domain_service_factory;
        $this->app = $app;
    }

    public function register(IRegisterUser $request)
    {
        /** @var IUser $user_service */
        $user_service = $this->domain_service_factory->create(IUser::class);

        $user = $user_service->register($request);

        $event = $this->app->makeWith(Registered::class, ['user' => $user]);

        $this->app->make('events')->dispatch($event);
    }
}
