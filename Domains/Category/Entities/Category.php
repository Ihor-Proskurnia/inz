<?php

namespace Category\Entities;

use App\Models\Traits\Filterable;
use App\Models\Category as BaseModel;
use App\Traits\DomainMorphMap;
use UseCases\Contracts\Category\Entities\ICategory;

class Category extends BaseModel implements ICategory
{
    use DomainMorphMap;
    use Filterable;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getExcerpt(): ?string
    {
        return $this->excerpt;
    }
}
