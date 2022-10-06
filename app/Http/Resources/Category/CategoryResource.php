<?php

namespace App\Http\Resources\Category;

use UseCases\Contracts\Category\Entities\ICategory;

class CategoryResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        /** @var ICategory $this */
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'excerpt' => $this->getExcerpt()
        ];
    }
}
