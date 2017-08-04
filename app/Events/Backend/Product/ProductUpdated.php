<?php

namespace App\Events\Backend\Product;

use Illuminate\Queue\SerializesModels;

/**
 * Class ProductUpdated.
 */
class ProductUpdated
{
    use SerializesModels;

    /**
     * @var
     */
    public $product;

    /**
     * @param $product
     */
    public function __construct($product)
    {
        $this->product = $product;
    }
}
