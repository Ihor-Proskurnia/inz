<?php

declare(strict_types=1);

namespace UseCases;

use Throwable;

class DomainServiceException extends ApiException
{
    public function __construct($causer, $causer_params = null, Throwable $previous = null)
    {
        $message = trans('exceptions.DomainServiceException', ['causer' => $causer]);
        parent::__construct($message, $this->code, $previous);
        $this->causer = $causer;
        $this->causer_params = $causer_params;
    }
}
