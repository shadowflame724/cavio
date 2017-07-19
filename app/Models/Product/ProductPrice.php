<?php
namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product\Relationship\ProductPriceRelationship;
use App\Models\Product\Attribute\ProductPriceAttribute;


class ProductPrice extends Model {

    use ProductPriceRelationship;
    use ProductPriceAttribute;

    public $timestamps = false;
    protected $table = 'product_prices';
    protected $fillable = [
        'product_child_id',
        'product_photo_id',
        'def_price',
        'price',
        'custom',
        'published'
    ];

}
