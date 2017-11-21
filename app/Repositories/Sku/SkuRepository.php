<?php

namespace App\Repositories\Sku;

use App\Models\Sku;

class SkuRepository implements SkuRepositoryInterface
{
    protected $eloquent;

    public function __construct(Sku $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    public function createSku(array $params)
    {
        return $this->eloquent->create($params);
    }
}
