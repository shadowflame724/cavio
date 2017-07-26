<?php
namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product\Relationship\ProductPhotoRelationship;
use App\Models\Product\Attribute\ProductPhotoAttribute;


class ProductPhoto extends Model {

    use ProductPhotoRelationship;
    use ProductPhotoAttribute;

    public $timestamps = false;
    protected $table = 'product_photos';
    protected $fillable = [
        'product_id',
        'photos',
        'prices_data',
        'finish_ids',
        'tissue_ids',
        'collection_ids',
        'main',
        'published',
        'prev',
        'prev_ru',
        'prev_it'
    ];

}
