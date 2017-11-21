<?php

namespace App\Http\Controllers\Sku;

use App\Http\Controllers\Controller;
use App\Repositories\Sku\SkuRepositoryInterface;
use App\Transformers\Sku\SkuTransformer;
use Illuminate\Http\Request;

class SkuController extends Controller
{
    private $sku;
    //
    public function __construct(SkuRepositoryInterface $sku)
    {
        $this->sku = $sku;
    }

    public function store(Request $request)
    {
        $code = $request->input('sku', null);
        $desc = $request->input('desc', null);

        $params = $request->only([
            'code' => $code,
            'desc' => $desc,
        ]);

        $sku = $this->sku->createSku($params);

        return response()->fractal($sku, new SkuTransformer());
    }
}
