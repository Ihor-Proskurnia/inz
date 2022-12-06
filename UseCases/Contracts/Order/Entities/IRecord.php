<?php

namespace UseCases\Contracts\Order\Entities;

interface IRecord
{
    public function getId(): int;

    public function getOrderId();

    public function getUserId();

    public function getDate();

    public function getFromTime();

    public function getToTime();

    public function getName(): string;

    public function getDescription(): string;
}
