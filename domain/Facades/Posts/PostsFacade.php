<?php
namespace domain\Facades\Posts;

use domain\Services\Posts\PostService;
use Illuminate\Support\Facades\Facade;

class PostsFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return PostService::class;
    }
}
