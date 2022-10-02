<?php

declare(strict_types=1);

namespace UseCases;


use Illuminate\Log\Logger;
use Illuminate\Support\Arr;
use Illuminate\Foundation\Application;
use UseCases\Contracts\User\IUserService;
use User\UserService;

class DomainServiceFactory
{
    /**
     * @var Logger
     */
    protected $logger;
    /**
     * @var Application
     */
    protected $app;

    protected $bindings = [
        IUserService::class => UserService::class,
    ];

    /**
     * DomainServiceFactory constructor.
     *
     * @param Application $app
     * @param Logger $logger
     */
    public function __construct(Application $app, Logger $logger)
    {
        $this->logger = $logger;
        $this->app = $app;
    }


    /**
     * @template T
     *
     * @param class-string<T> $interface
     *
     * @return T
     */
    public function create(string $interface, ?array $params = [])
    {
        $service_class = Arr::get($this->bindings, $interface);

        try {
            return $this->app->make($service_class, $params);
        } catch (\Throwable $throwable) {
            $this->logger->error($throwable->getMessage());

            throw new DomainServiceException($interface, $params, $throwable);
        }
    }
}
