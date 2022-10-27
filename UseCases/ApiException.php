<?php

declare(strict_types=1);

namespace UseCases;

use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class ApiException extends \RuntimeException implements HttpExceptionInterface
{
    public $causer;
    public $causer_params;

    /**
     * Returns the status code.
     *
     * @return int An HTTP response status code
     */
    public function getStatusCode(): int
    {
        return $this->getCode();
    }

    /**
     * Returns response headers.
     *
     * @return array Response headers
     */
    public function getHeaders(): array
    {
        return [];
    }
}
