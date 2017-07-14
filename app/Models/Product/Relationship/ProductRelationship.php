<?php

namespace App\Models\Product\Relationship;

use App\Models\Product\ProductChild;
use App\Models\Product\ProductPhoto;

trait ProductRelationship
{

    public function childs()
    {
        return $this->hasMany(ProductChild::class)->orderBy('sort', 'DESC');
    }

    public function photos()
    {
        return $this->hasMany(ProductPhoto::class)->orderBy('sort', 'DESC');
    }

}
