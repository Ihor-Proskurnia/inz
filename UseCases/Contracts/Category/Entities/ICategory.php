<?php

namespace UseCases\Contracts\Category\Entities;

use Illuminate\Support\Collection;

interface ICategory
{
    public function getId(): int;

    public function getName(): string;

    public function getDescription(): ?string;

    public function getExcerpt(): ?string;
}
