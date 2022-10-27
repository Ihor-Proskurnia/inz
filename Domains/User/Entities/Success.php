<?php

declare(strict_types=1);

namespace User\Entities;

use UseCases\Contracts\ResponseObjects\ISuccess;

class Success implements ISuccess
{
    public string $message;

    public function getMessage()
    {
        return $this->message;
    }
}
