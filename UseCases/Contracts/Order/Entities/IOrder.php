<?php

namespace UseCases\Contracts\Order\Entities;

interface IOrder
{
    public function getId(): int;

    public function getCategory();

    public function getTrainer();

    public function getDate(): string;

    public function getFromTime();

    public function getToTime();

    public function getName(): string;

    public function getTrainerName(): ?string;

    public function getDescription(): string;

    public function checkHasRecord(): bool;

    public function getSportsman();
}
