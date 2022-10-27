<?php

namespace App\Traits;

use ReflectionClass;
use Illuminate\Database\Eloquent\Relations\Relation;

trait DomainMorphMap
{
    public function getMorphClass(): string
    {
        return array_search($this->getParentClass(), Relation::$morphMap);
    }

    protected function getParentClass(): string
    {
        return (new ReflectionClass($this))->getParentClass()->getName();
    }
}
