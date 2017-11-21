<?php

namespace App\Transformers\Sku;

use App\Models\Sku;
use League\Fractal\TransformerAbstract;

class SkuTransformer extends TransformerAbstract
{
    public function transform(Sku $sku)
    {
        return [
            'id' => $sku->id,
            'sku' => $sku->code,
            'desc' => $sku->desc,
            'links' => [
                [
                    'rel' => 'self',
                    'uri' => 'api/skus/' . $sku->id,
                ],
            ],
        ];
    }
}
