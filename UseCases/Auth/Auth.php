<?php

declare(strict_types=1);

namespace UseCases\Auth;

use App\Models\User;
//use App\Events\ForgotEvent;
use UseCases\Contracts\Auth\IAuth;
use UseCases\DomainServiceFactory;
use Illuminate\Foundation\Application as App;
use UseCases\Contracts\Requests\Auth\ILoginRequest;
use UseCases\Contracts\Requests\Auth\IChangeRequest;
use UseCases\Contracts\Requests\Auth\IForgotRequest;

class Auth
{
    private DomainServiceFactory $domain_service_factory;
    private App $app;

    /**
     * @param DomainServiceFactory $domain_service_factory
     */
    public function __construct(DomainServiceFactory $domain_service_factory, App $app)
    {
        $this->domain_service_factory = $domain_service_factory;
        $this->app = $app;
    }

    public function login(ILoginRequest $request)
    {
        /** @var IAuth $auth_service */
        $auth_service = $this->domain_service_factory->create(IAuth::class);

        return $auth_service->login($request);
    }

//    public function forgot(IForgotRequest $request): void
//    {
//        /** @var IAuth $auth_service */
//        $auth_service = $this->domain_service_factory->create(IAuth::class);
//
//        $user =  $auth_service->forgot($request);
//
//        $event = $this->app->makeWith(ForgotEvent::class, ['user' => $user, 'password' => $user->password]);
//
//        $this->app->make('events')->dispatch($event);
//    }

    public function changePassword(IChangeRequest $request, User $user)
    {
        /** @var IAuth $auth_service */
        $auth_service = $this->domain_service_factory->create(IAuth::class);

        return $auth_service->changePassword($request, $user);
    }
}
