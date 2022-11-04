<?php

namespace domain\Services\Category;

use App\Models\Category;

class CategoryService
{
    public function __construct()
    {
        $this->category = new Category();
    }

    public function all()
    {
        return $this->category->all();
    }

    public function store($data)
    {
        $category = $this->category->create($data);
        return $category;
    }

    public function show($id)
    {
        return $this->category->findOrFail($id);
    }

    public function update($data, $id)
    {
        $category = $this->category->findOrFail($id);
        $category->update($data);
        return $category;
    }

    public function destroy($id)
    {
        $category = $this->category->findOrFail($id);
        $category->delete();
        return $category;
    }

    public function getCategoryCount()
    {
        return $this->category->count();
    }
}
