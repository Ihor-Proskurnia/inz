<?php

declare(strict_types=1);

namespace User\Entities;

use User\Entities\Error as Error;
use Illuminate\Support\Facades\Log;
use User\Entities\Success as Success;
use Illuminate\Foundation\Application;
use UseCases\Contracts\ResponseObjects\IError;
use UseCases\Contracts\ResponseObjects\ISuccess;

class UserResponseFactory
{
    private Application $app;
    private Log $log;

    public function __construct(Application $app, Log $log)
    {
        $this->app = $app;
        $this->log = $log;
    }

    public function createErrorMessage($message, $exception): IError
    {
        $this->log::error($message);
        $this->log::error($exception->__toString());

        $result = $this->app->make(Error::class);

        $result->message = $message;

        return $result;
    }

    public function createSuccessMessage($message): ISuccess
    {
        $result = $this->app->make(Success::class);

        $result->message = $message;

        return $result;
    }

    public function createSimpleErrorMessage($message): IError
    {
        $result = $this->app->make(Error::class);

        $result->message = $message;

        return $result;
    }
}
