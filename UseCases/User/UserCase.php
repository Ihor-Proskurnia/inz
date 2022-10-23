<?php

declare(strict_types=1);

namespace UseCases\User;

use UseCases\Contracts\User\Entities\IUser;
use UseCases\Contracts\User\IUser as IUserService;
use UseCases\DomainServiceFactory;
use UseCases\Contracts\User\IUsersListRequest;
use Illuminate\Pagination\LengthAwarePaginator;

class UserCase
{
    private DomainServiceFactory $domain_service_factory;

    /**
     * @param DomainServiceFactory $domain_service_factory
     */
    public function __construct(DomainServiceFactory $domain_service_factory)
    {
        $this->domain_service_factory = $domain_service_factory;
    }

    public function showUsers(IUsersListRequest $request): LengthAwarePaginator
    {
        /** @var IUserService $user_service */
        $user_service = $this->domain_service_factory->create(IUserService::class);

        return $user_service->showUsers($request);
    }

    public function showUser(int $user_id): IUser
    {
        /** @var IUserService $user_service */
        $user_service = $this->domain_service_factory->create(IUserService::class);

        return $user_service->showUser($user_id);
    }
}
