<?php

namespace domain\Facades\Category;

use domain\Services\Category\CategoryService;
use Illuminate\Support\Facades\Facade;

class CategoryFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return CategoryService::class;
    }
}
