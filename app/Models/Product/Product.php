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
        'category_ids',
        'main_photo_data',
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

    public function getMainData()
    {
        $main_photo_data = (!empty($this->main_photo_data)) ? \GuzzleHttp\json_decode($this->main_photo_data) : [];
        $codes = (!empty($main_photo_data->codes)) ? $main_photo_data->codes : '#';
        $photos = (!empty($main_photo_data->photos)) ? $main_photo_data->photos : [];
        $prices = (!empty($main_photo_data->prices)) ? $main_photo_data->prices : [];
        $isDiscount = (!empty($main_photo_data->isDiscount)) ? $main_photo_data->isDiscount : false;
        $data = [
            'codes' => $codes,
            'photos' => $photos,
            'prices' => $prices,
            'isDiscount' => $isDiscount,
        ];
        return $data;
    }

}
