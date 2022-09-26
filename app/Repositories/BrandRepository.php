<?php

namespace App\Repositories;

use App\Models\Brand;


class BrandRepository
{

    protected $brand;

    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }


    public function getAllBrand()
    {
        return $this->brand->all();
    }
}

