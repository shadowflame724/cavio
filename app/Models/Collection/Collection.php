<?php

namespace App\Models\Collection;

use App\Models\CollectionZone\CollectionZone;
use App\Models\Good\Good;
use App\Models\Marker\Marker;
use App\Models\Product\Product;
use App\Models\Zone\Zone;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use Sluggable;

    protected $fillable = ['title', 'title_ru', 'title_it',
        'description', 'description_ru', 'description_it',
        'image', 'name', 'name_ru', 'name_it',
        'prev', 'prev_ru', 'prev_it', 'sort'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function markers()
    {
        return $this->hasMany(Marker::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function collectionZones()
    {
        return $this->hasMany(CollectionZone::class);
    }

    public function getProductsByIds()
    {
        if(empty($this->product_ids)) return [];
        $ids = [];
        $expArr = explode(',',$this->product_ids);
        foreach ($expArr as $one) {
            $id = (int)$one;
            if($id > 0){
                $ids[$id] = $id;
            }
        }

        return $ids;
    }

}
