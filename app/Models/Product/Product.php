<?php
namespace App\Models\Product;

use App\Models\Product\Relationship\ProductRelationship;
use App\Models\Product\Attribute\ProductAttribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;


class Product extends Model {

    use Sluggable;
    use SoftDeletes;
    use ProductRelationship;
    use ProductAttribute;

    protected $table = 'products';
    protected $fillable = [
        'code',
        'slug',
        'name',
        'name_ru',
        'name_it',
        'prev',
        'prev_ru',
        'prev_it',
        'title',
        'title_ru',
        'title_it',
        'description',
        'description_ru',
        'description_it',
        'sort',
        'published'
    ];
    protected $dates = ['deleted_at'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'code'
            ]
        ];
    }

    public function blocks()
    {
        return $this->hasMany(Block::class);
    }

}
