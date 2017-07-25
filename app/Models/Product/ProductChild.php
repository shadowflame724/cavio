<?php
namespace App\Models\Product;

use App\Models\Product\Relationship\ProductChildRelationship;
use App\Models\Product\Attribute\ProductChildAttribute;
use Illuminate\Database\Eloquent\Model;

class ProductChild extends Model
{

    use ProductChildRelationship;
    use ProductChildAttribute;

    public $timestamps = false;
    protected $table = 'product_childs';
    protected $fillable = [
        'product_id',
        'code',
        'name',
        'name_ru',
        'name_it',
        'prev',
        'prev_ru',
        'prev_it',
        'dimensions',
        'sort',
        'published'
    ];

}
