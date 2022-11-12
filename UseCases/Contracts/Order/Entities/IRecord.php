<?php

namespace UseCases\Contracts\Order\Entities;

interface IRecord
{
    public function getId(): int;

    public function getOrderId();

    public function getUserId();
}
