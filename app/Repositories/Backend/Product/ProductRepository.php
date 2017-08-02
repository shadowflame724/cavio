<?php

namespace App\Repositories\Backend\Product;

use App\Models\Dimensions\Dimensions;
use App\Models\Product\Product;
use App\Models\Product\ProductChild;
use App\Models\Product\ProductPhoto;
use App\Models\Product\ProductPrice;
use App\Models\Category\Category;
use App\Models\Collection\Collection;
use App\Models\CollectionZone\CollectionZone;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Product\ProductCreated;
use App\Events\Backend\Product\ProductDeleted;
use App\Events\Backend\Product\ProductUpdated;

/**
 * Class ProductRepository.
 */
class ProductRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Product::class;

    /**
     * @param string $order_by
     * @param string $sort
     *
     * @return mixed
     */
    public function getAll($order_by = 'sort', $sort = 'asc')
    {
        return $this->query()
            ->orderBy($order_by, $sort)
            ->get();
    }

    public function getOne($id, $with = null)
    {
        $model = $this->query();
        if ($with) {
            $model = $model->with($with);
        }
        $model = $model->findOrFail($id);

        return $model;
    }

    public function issetBySlug($slug)
    {
        $model = Product::where([
            'slug' => $slug
        ])->first();
        if ($model) {
            return true;
        }
        return false;
    }

    /**
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('product_table') . '.id',
                config('product_table') . '.code',
                config('product_table') . '.slug',
                config('product_table') . '.name',
                config('product_table') . '.created_at',
            ]);
    }

    /**
     * @return Collection
     */
    public static function getProdsDataByPriceIds($iDs, $langSuf= '')
    {
        return DB::table('product_prices')
            ->join('product_photos', 'product_prices.product_photo_id', '=', 'product_photos.id')
            ->join('product_childs', 'product_prices.product_child_id', '=', 'product_childs.id')
            ->join('products', 'product_childs.product_id', '=', 'products.id')
            ->join('collection_zones', 'product_photos.collection_ids', '=', 'collection_zones.id')
            ->join('collections', 'collection_zones.collection_id', '=', 'collections.id')
            ->join('zones', 'collection_zones.zone_id', '=', 'zones.id')
            ->join('categories', 'products.category_ids', '=', 'categories.id')
            ->join('finish_tissues as finish', 'product_photos.finish_ids', '=', 'finish.id')
            ->join('finish_tissues as tissue', 'product_photos.tissue_ids', '=', 'tissue.id')
            ->whereIn('product_prices.id', $iDs)
            ->select(
                'product_prices.price',
                'product_prices.discount',
                'product_childs.code as child_product_code',
                'product_childs.name' . $langSuf . ' as child_product_name',
                'products.name' . $langSuf . ' as parent_product_name',
                'product_photos.photos',
                'collections.name' . $langSuf . ' as collection_name',
                'collection_zones.name' . $langSuf . ' as collection_zones_name',
                'zones.name' . $langSuf . ' as zones_name',
                'finish.title' . $langSuf . ' as finish_title',
                'tissue.title' . $langSuf . ' as tissue_title',
                'categories.name' . $langSuf . ' as categories_name'
                )
            ->get();
    }

    /**
     * @return Collection
     */
    public static function getForPricesDataTable($langSuf= '')
    {
        return DB::table('product_prices')
            ->join('product_photos', 'product_prices.product_photo_id', '=', 'product_photos.id')
            ->join('product_childs', 'product_prices.product_child_id', '=', 'product_childs.id')
            ->join('products', 'product_childs.product_id', '=', 'products.id')
            ->join('collection_zones', 'product_photos.collection_ids', '=', 'collection_zones.id')
            ->join('collections', 'collection_zones.collection_id', '=', 'collections.id')
            ->join('zones', 'collection_zones.zone_id', '=', 'zones.id')
            ->join('categories', 'products.category_ids', '=', 'categories.id')
            ->join('finish_tissues as finish', 'product_photos.finish_ids', '=', 'finish.id')
            ->join('finish_tissues as tissue', 'product_photos.tissue_ids', '=', 'tissue.id')
            ->select(
                'product_prices.price',
                'product_childs.code as child_product_code',
                'product_childs.name' . $langSuf . ' as child_product_name',
                'product_photos.photos',
                'products.id as parent_id',
                'products.code as parent_code',
                'products.name' . $langSuf . ' as parent_name',
                'products.created_at as parent_created_at',
                'products.updated_at as parent_updated_at',
                'collections.name' . $langSuf . ' as collection_name',
                'collection_zones.name' . $langSuf . ' as collection_zones_name',
                'zones.name' . $langSuf . ' as zones_name',
                'product_photos.finish_ids as finish_ids',
                'tissue.title' . $langSuf . ' as tissue_title',
                'categories.name' . $langSuf . ' as categories_name')
            ->get();
    }

    /**
     * @param $input array
     * @param $productId int
     * @param $isInsert bool
     *
     * @throws GeneralException
     *
     * @return array
     */
    public function implodeData($input = [], $productId = null, $isInsert = false)
    {
        $allData = [
            'childs' => [],
            'photos' => [],
            'prices' => [],
        ];

        $newChildData = [];
        $childCodes = [];
        $mainCodes = [];
        foreach ($input['child'] as $ch_id => $item) {
            $publish = isset($item['published']) ? 1 : 0;
            if ($publish) {
                $mainCodes[] = '#' . $item['code'];
            }
            $newChildData[$ch_id] = [
                'product_id' => $productId,
                'code' => $item['code'],
                'name' => $item['name'],
                'name_ru' => $item['name_ru'],
                'name_it' => $item['name_it'],
                'prev' => $item['prev'],
                'prev_ru' => $item['prev_ru'],
                'prev_it' => $item['prev_it'],
                'dimensions' => $item['dimensions'],
                'published' => $publish,
            ];
            $childCodes[$item['code']] = $ch_id;
        }
        $newPhotoData = [];
        $newPriceData = [];
        $mainPrices = [
            0 => 99999999, // 'min'
            1 => -1, // 'max'
        ];
//        dd($input);
        $keyPrice = 0;
        $isDiscount = false;
        foreach ($input['photo'] as $ph_id => $item) {
            $isMainPhoto = isset($item['main']) ? 1 : 0;
            $phOnePhotos = isset($item['photos']) ? implode(',', $item['photos']) : '';
            $phOneFinish = isset($item['finish_ids']) ? implode(',', $item['finish_ids']) : '';
            $phOneTissue = isset($item['tissue_ids']) ? implode(',', $item['tissue_ids']) : '';
            $phOneCollection = isset($item['collection_ids']) ? implode(',', $item['collection_ids']) : '';
            $newPhotoData[$ph_id] = [
                'product_id' => $productId,
                'photos' => $phOnePhotos,
                'prices_data' => $item['prices_data'],
                'finish_ids' => $phOneFinish,
                'tissue_ids' => $phOneTissue,
                'collection_ids' => $phOneCollection,
                'prev' => $item['prev'],
                'prev_ru' => $item['prev_ru'],
                'prev_it' => $item['prev_it'],
                'main' => $isMainPhoto,
                'published' => isset($item['published']) ? 1 : 0
            ];
            foreach ($item['price'] as $pr_id => $prOne) {
                $ch_id = isset($childCodes[$prOne['child_code']]) ? $childCodes[$prOne['child_code']] : '';

                if (!empty($ch_id) && $pr_id !== 'KEY') {
                    $discount = (int)$prOne['discount'];
                    $def_price = (int)$prOne['def_price'];
                    $cus_price = (int)$prOne['cus_price'];
                    $price = (int)$prOne['price'];
                    $publish = true;
                    $custom = isset($prOne['custom']) ? 1 : 0;
                    // если не стоит кастом и не ввели значение def_price
                    // или стоит кастом и не ввели значение price
                    // делаем цену неактивной
                    if ((!($def_price > 0) && !$custom) || (!($cus_price > 0) && $custom)) {
                        $publish = false;
                    } else {
                        $price = ($custom) ? $cus_price : $def_price;
                    }
                    // если кто-то у радителей неопубликован - цена недоступна
                    $publChild = (isset($newChildData[$ch_id]['published']) && $newChildData[$ch_id]['published'] == 1) ? true : false;
                    $publPhoto = (isset($newPhotoData[$ph_id]['published']) && $newPhotoData[$ph_id]['published'] == 1) ? true : false;
                    if (!$publChild || !$publPhoto) {
                        $publish = false;
                    }
                    if ($publish) {
                        if ($mainPrices[0] > $price) $mainPrices[0] = $price; // min
                        if ($mainPrices[1] < $price) $mainPrices[1] = $price; // max
                        if ($discount > 0) {
                            $isDiscount = true;
                        }
                    }
                    $newPriceData[$keyPrice] = [
                        'product_child_id' => $ch_id,
                        'product_photo_id' => $ph_id,
                        'discount' => $discount,
                        'def_price' => $def_price,
                        'cus_price' => $cus_price,
                        'price' => $price,
                        'custom' => $custom,
                        'published' => $publish
                    ];
//                    echo 'keyPrice: '.$keyPrice.'<br>';
                    $keyPrice++;
                }
//                echo '_______________<br>';
            }
            if ($isMainPhoto) {
                $mainPhoto = isset($item['photos'][0]) ? $item['photos'][0] : '';
                $mainPhotoData['photos'] = $mainPhoto;
            }
        }
        $mainPhotoData['prices'] = false;
        $mainPhotoData['isDiscount'] = $isDiscount;
        if ($mainPrices[0] == 99999999 || $mainPrices[1] == -1) { // нету min или max
            if ($mainPrices[0] == 99999999 && $mainPrices[1] == -1) { // нету min и max
                $mainPhotoData['prices'] = '';
            } elseif ($mainPrices[0] == 99999999) { // нету min
                $mainPhotoData['prices'] = $mainPrices[1] . ' €';
            } elseif ($mainPrices[1] == -1) { // нету max
                $mainPhotoData['prices'] = $mainPrices[0] . ' €';
            }
        } else { // есть и min и max
            $mainPhotoData['prices'] = implode(' — ', [
                $mainPrices[0] . ' €',
                $mainPrices[1] . ' €'
            ]);
        }
        $mainPhotoData['codes'] = implode(',', $mainCodes);

        $allData['childs'] = $newChildData;
        $allData['photos'] = $newPhotoData;
        $allData['prices'] = $newPriceData;
        $allData['main_photo_data'] = $mainPhotoData;

        return $allData;
    }

    public function remFromArr($product_ids = false, $product_id = false)
    {
        if (!$product_ids || !$product_id) {
            return '';
        }
        $oneProdIds = explode(',', $product_ids);
        $arr = [];
        foreach ($oneProdIds as $oneProdId) {
            if ((int)$oneProdId !== (int)$product_id && (int)$oneProdId > 0) {
                $arr[] = (int)$oneProdId;
            }
        }
        return implode(',', $arr);
    }

    public function addInArr($product_ids = false, $product_id = false)
    {
        if ((int)$product_id > 0) {
            $oneProdIds = explode(',', $product_ids);
            $notInCat = true;
            foreach ($oneProdIds as $oneProdId) {
                if ((int)$oneProdId == (int)$product_id) {
                    $notInCat = false;
                }
            }
            if ($notInCat) {
                array_push($oneProdIds, $product_id);
                $arr = [];
                foreach ($oneProdIds as $oneProdId) {
                    if ((int)$oneProdId > 0) {
                        $arr[] = (int)$oneProdId;
                    }
                }
                return implode(',', $arr);
            }
        }
        return false;
    }

    public function updateCollectionProducts($oldIds = [], $newIds = [], $product_id = [])
    {
        $remArr = array_diff($oldIds, $newIds);
        $addArr = array_diff($newIds, $oldIds);

        foreach ($remArr as $new_id) {
            $oneModel = CollectionZone::find($new_id);
            $oneModel->product_ids = $this->remFromArr($oneModel->product_ids, $product_id);
            $oneModel->save();
            $oneModel->collection->product_ids = $this->remFromArr($oneModel->collection->product_ids, $product_id);
            $oneModel->collection->save();
        }
        foreach ($addArr as $new_id) {
            $oneModel = CollectionZone::find($new_id);
            $new_product_ids = $this->addInArr($oneModel->product_ids, $product_id);
            if ($new_product_ids) {
                $oneModel->product_ids = $new_product_ids;
                $oneModel->save();
            }
            $coll_product_ids = $this->addInArr($oneModel->collection->product_ids, $product_id);
            if ($coll_product_ids) {
                $oneModel->collection->product_ids = $coll_product_ids;
                $oneModel->collection->save();
            }
        }

        return true;
    }

    public function updateCategoryProducts($oldIds = [], $newIds = [], $product_id = [])
    {
        $remArr = array_diff($oldIds, $newIds);
        $addArr = array_diff($newIds, $oldIds);

        foreach ($remArr as $new_id) {
            $catModel = Category::find($new_id);
            $catModel->product_ids = $this->remFromArr($catModel->product_ids, $product_id);
            $catModel->save();
        }
        foreach ($addArr as $new_id) {
            $catModel = Category::find($new_id);
            $catProds = explode(',', $catModel->product_ids);
            $notInCat = true;
            foreach ($catProds as $catProd) {
                if ($catProd == $product_id) {
                    $notInCat = false;
                }
            }
            if ($notInCat) {
                array_push($catProds, $product_id);
                $arr = [];
                foreach ($catProds as $catProd) {
                    if ((int)$catProd > 0) {
                        $arr[] = (int)$catProd;
                    }
                }
                $catModel->product_ids = implode(',', $arr);
                $catModel->save();
            }
        }

        return true;
    }

    public function removeProductsFromCollection($remIds = [], $product_id = 0)
    {
        foreach ($remIds as $new_id) {
            $oneModel = CollectionZone::find($new_id);
            $oneModel->product_ids = $this->remFromArr($oneModel->product_ids, $product_id);
            $oneModel->save();
            $oneModel->collection->product_ids = $this->remFromArr($oneModel->collection->product_ids, $product_id);
            $oneModel->collection->save();
        }

        return true;
    }

    public function removeProductsFromCategory($remIds = [], $product_id = 0)
    {
        foreach ($remIds as $new_id) {
            $catModel = Category::find($new_id);
            $catModel->product_ids = $this->remFromArr($catModel->product_ids, $product_id);
            $catModel->save();
        }

        return true;
    }

    /**
     * @param array $input
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function create(array $input)
    {
        $product = self::MODEL;
        $product = new $product();
        $product->category_ids = implode(',', $input['category_ids']);
        $product->code = $input['code'];
        $link = $input['name'];
        $product->slug = isset($input['slug']) ? $input['slug'] : $link;
        $product->name = $input['name'];
        $product->name_ru = $input['name_ru'];
        $product->name_it = $input['name_it'];
        $product->title = $input['name'];
        $product->title_ru = $input['name_ru'];
        $product->title_it = $input['name_it'];
        $product->prev = $input['prev'];
        $product->prev_ru = $input['prev_ru'];
        $product->prev_it = $input['prev_it'];
        $product->description = $input['prev'];
        $product->description_ru = $input['prev_ru'];
        $product->description_it = $input['prev_it'];
        $product->published = isset($input['published']) ? 1 : 0;
        $product->save();

        $allData = $this->implodeData($input, $product->id, false);
//        dd($allData);
        DB::transaction(function () use ($product, $allData, $input) {
            $product->main_photo_data = json_encode($allData['main_photo_data']);
            if (!isset($allData['main_photo_data']['photos'])) {
                $product->published = 0;
            }
            if ($product->published) {
                $this->updateCategoryProducts([], $input['category_ids'], $product->id);
            }
            $oldChildIds = [];
            foreach ($allData['childs'] as $ch_id => $childOne) {
                $one = $childOne;
                $child = ProductChild::create($one);
                $oldChildIds[$ch_id] = $child->id;
            }
            // ProductPhotos
            $oldPhotoIds = [];
            foreach ($allData['photos'] as $ph_id => $photoOne) {
                $one = $photoOne;
                $photo = ProductPhoto::create($one);
                $oldPhotoIds[$ph_id] = $photo->id;
                if ($product->published && $photo->published) {
                    $collection_ids = explode(',', $photo->collection_ids);
                    $this->updateCollectionProducts([], $collection_ids, $product->id);
                }
            }
            // ProductPrices
            foreach ($allData['prices'] as $pr_id => $priceOne) {
                $chKey = $priceOne['product_child_id'];
                $phKey = $priceOne['product_photo_id'];
                $chNewKey = isset($oldChildIds[$chKey]) ? $oldChildIds[$chKey] : false;
                $phNewKey = isset($oldPhotoIds[$phKey]) ? $oldPhotoIds[$phKey] : false;
                if ($chNewKey && $phNewKey) {
                    $one = $priceOne;
                    $one["product_child_id"] = $chNewKey;
                    $one["product_photo_id"] = $phNewKey;
                    ProductPrice::create($one);
                }
            }
            if ($product->save()) {
//                event(new ProductUpdated($product));

                return true;
            }

            $product->delete();
            return false;
        });
    }

    public function update(Model $product, array $input)
    {
        $oldCats = explode(',', $product->category_ids);
        $product->category_ids = implode(',', $input['category_ids']);
        $product->code = $input['code'];
        $product->slug = $input['slug'];
        $product->name = $input['name'];
        $product->name_ru = $input['name_ru'];
        $product->name_it = $input['name_it'];
        $product->prev = $input['prev'];
        $product->prev_ru = $input['prev_ru'];
        $product->prev_it = $input['prev_it'];
        $product->published = isset($input['published']) ? 1 : 0;

        $allData = $this->implodeData($input, $product->id, false);

//        dd($allData);
        $product->main_photo_data = json_encode($allData['main_photo_data']);
        if (!isset($allData['main_photo_data']['photos'])) {
            $product->published = 0;
        }
        if ($product->published) {
            $this->updateCategoryProducts($oldCats, $input['category_ids'], $product->id);
        } else {
            $this->removeProductsFromCategory($oldCats, $product->id);
            $this->removeProductsFromCategory($input['category_ids'], $product->id);
        }

//        dd($allData);
//        dd($input);

        DB::transaction(function () use ($product, $allData) {
            // ProductChilds
            foreach ($allData['childs'] as $ch_id => $childOne) {
                $child = ProductChild::find($ch_id);
                $child->update($childOne);
            }
            // ProductPhotos
            foreach ($allData['photos'] as $ph_id => $photoOne) {
                $photo = ProductPhoto::find($ph_id);
                $photo->update($photoOne);
                if ($product->published) {
                    $collection_ids = explode(',', $photo->collection_ids);
                    $this->updateCollectionProducts([], $collection_ids, $product->id);
                } else {
                    $collection_ids = explode(',', $photo->collection_ids);
                    $this->removeProductsFromCollection($collection_ids, $product->id);
                }
            }
            // ProductPrices
            foreach ($allData['prices'] as $pr_id => $priceOne) {
                $chKey = $priceOne['product_child_id'];
                $phKey = $priceOne['product_photo_id'];
                $ch_id = isset($allData['childs'][$chKey]) ? $chKey : false;
                $ph_id = isset($allData['photos'][$phKey]) ? $phKey : false;
                if ($ch_id && $ph_id) {
                    ProductPrice::where([
                        'product_child_id' => $ch_id,
                        'product_photo_id' => $ph_id
                    ])->update($priceOne);
                }
            }
            if ($product->save()) {
//                event(new ProductUpdated($product));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.product.update_error'));
        });
    }

    /**
     * @param Model $product
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $product)
    {
        DB::transaction(function () use ($product) {
            if ($product->delete()) {
                event(new ProductDeleted($product));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.product.delete_error'));
        });
    }
}
