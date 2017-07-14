<?php

namespace App\Models\Product\Relationship;

use App\Models\Product\Product;
use App\Models\Product\ProductPrice;

trait ProductChildRelationship
{

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function prices()
    {
        return $this->hasMany(ProductPrice::class);
    }

}
