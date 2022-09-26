<?php

namespace App\Repositories;

use App\Models\Category;


class CategoryRepository
{

    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }


    public function getAllCategory()
    {
        return $this->category->all();
    }
}
