<?php

declare(strict_types=1);

namespace UseCases\Category;

use UseCases\Contracts\Category\ICategoryService;
use UseCases\DomainServiceFactory;
use UseCases\Contracts\Category\ICategoryListRequest;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryCase
{
    private DomainServiceFactory $domain_service_factory;

    /**
     * @param DomainServiceFactory $domain_service_factory
     */
    public function __construct(DomainServiceFactory $domain_service_factory)
    {
        $this->domain_service_factory = $domain_service_factory;
    }

    public function showCategories( ICategoryListRequest $request): LengthAwarePaginator
    {
        /** @var ICategoryService $Category_service */
        $category_service = $this->domain_service_factory->create(ICategoryService::class);

        return $category_service->showCategories($request);
    }
}
