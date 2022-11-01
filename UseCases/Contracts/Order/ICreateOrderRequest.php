<?php

declare(strict_types=1);

namespace UseCases\Contracts\Order;

interface ICreateOrderRequest
{
    public function getCategoryId(): int;

    public function getDate(): string;

    public function getFromTime(): string;

    public function getToTime(): string;

    public function getName(): string;

    public function getDescription(): string;
}
