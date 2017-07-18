<?php

namespace App\Models\Product\Relationship;

use App\Models\Product\ProductChild;
use App\Models\Product\ProductPhoto;

trait ProductPriceRelationship
{

    public function child()
    {
        return $this->belongsTo(ProductChild::class, 'product_child_id');
    }

    public function photo()
    {
        return $this->belongsTo(ProductPhoto::class, 'product_photo_id');
    }

}
