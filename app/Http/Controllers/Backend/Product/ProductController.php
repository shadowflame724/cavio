<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Requests\Backend\Product\ManageProductRequest;
use App\Http\Requests\Backend\Product\UpdateProductRequest;
use App\Http\Requests\Backend\Product\StoreProductRequest;
use App\Models\Category\Category;
use App\Models\Collection\Collection;
use App\Models\CollectionZone\CollectionZone;
use App\Models\FinishTissue\FinishTissue;
use App\Models\Product\Product;
use App\Models\Product\ProductChild;
use App\Models\Product\ProductPhoto;
use App\Models\Product\ProductPrice;
use App\Http\Controllers\Controller;
use App\Models\Zone\Zone;
use App\Repositories\Backend\Product\ProductRepository;
use Maatwebsite\Excel\Facades\Excel;
use Cache;

class ProductController extends Controller
{

    /**
     * @var ProductRepository
     */
    protected $product;
    protected $langSuf;

    /**
     * @param ProductRepository $product
     */
    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
        $lang = app()->getLocale();
        $appLangs = config('app.langs');
        $this->langSuf = $appLangs['suf'];
    }

    /**
     * @param ManageProductRequest $request
     *
     * @return mixed
     */
    public function index(ManageProductRequest $request)
    {
        return view('backend.products.index');
    }


    public function getBySlug($slug)
    {
        $res = $this->product->issetBySlug($slug);
        if ($res) {
            $slug .= '-' . random_alphanumeric_key(4);
            return $this->getBySlug($slug);
        }
        return $slug;
    }

    /**
     * @param ManageProductRequest $request
     *
     * @return mixed
     */
    public function getDataFromImport()
    {
        $results = Excel::load('public/excel/import.xlsx', function($reader) {
//            $reader->dd();
//            $reader->each(function($sheet) {
//                // Loop through all rows
//                $sheet->each(function($row) {
//                    $res[] = $row;
////                    dd($row);
//                });
//
//            });
//            $reader->dd();
//            $res = $reader->toArray();
            // reader methods

        });

        $resDatas = $results->skipRows(3)->get();
        $resTitles = $results->skipRows(1)->takeRows(1)->get();
        $res = [];
        $keyOne = 0;
        $prev_key = 0;
        foreach ($resDatas as $key => $result) {
//            echo $prev_key.': ';
            foreach ($result as $name => $item) {
                $one = '';
                if(!empty($item)) {
                    $one = $item;
                } elseif(isset($res[$prev_key]) && isset($res[$prev_key][$name])) {
                    $one = $res[$prev_key][$name];
                }
//                echo' ';print_r($one); echo'| ';
                $res[$keyOne][$name] = $one;
            }
//            echo'<br>';
            $prev_key = $keyOne;
            $keyOne++;
        }

        $resGroupData = [];
        foreach ($res as $k => $onePhoto) {
            $prntCode = (isset($onePhoto['parent_code'])) ? $onePhoto['parent_code'] : null;
            if($prntCode) {
                if (!isset($resGroupData[$prntCode])){
                    $resGroupData[$prntCode] = [
                        'childs' => [],
                        'name' => '',
                        'name_ru' => '',
                        'name_it' => '',
                        'prev' => '',
                        'prev_ru' => '',
                        'prev_it' => '',
                    ];
                }
                if(!empty($onePhoto['shop_name_en'])){
                    $resGroupData[$prntCode]['name'] = $onePhoto['shop_name_en'];
                } //unset($onePhoto['shop_name_en']);

                if(!empty($onePhoto['shop_name_ru'])){
                    $resGroupData[$prntCode]['name_ru'] = $onePhoto['shop_name_ru'];
                } //unset($onePhoto['shop_name_ru']);

                if(!empty($onePhoto['shop_name_it'])){
                    $resGroupData[$prntCode]['name_it'] = $onePhoto['shop_name_it'];
                } //unset($onePhoto['shop_name_it']);

                if(!empty($onePhoto['prnt_descr_en'])){
                    $resGroupData[$prntCode]['prev'] = $onePhoto['prnt_descr_en'];
                } //unset($onePhoto['prnt_descr_en']);

                if(!empty($onePhoto['prnt_descr_ru'])){
                    $resGroupData[$prntCode]['prev_ru'] = $onePhoto['prnt_descr_ru'];
                } //unset($onePhoto['prnt_descr_ru']);

                if(!empty($onePhoto['prnt_descr_it'])){
                    $resGroupData[$prntCode]['prev_it'] = $onePhoto['prnt_descr_it'];
                } //unset($onePhoto['prnt_descr_it']);

                $chldCode = (isset($onePhoto['child_code'])) ? $onePhoto['child_code'] : null;
                if($chldCode) {
                    if (!isset($resGroupData[$prntCode]['childs'][$chldCode])){
                        $resGroupData[$prntCode]['childs'][$chldCode] = [
                            'count_lines' => 1,
                            'code' => $chldCode,
                            'name' => '',
                            'name_ru' => '',
                            'name_it' => '',
                            'prev' => '',
                            'prev_ru' => '',
                            'prev_it' => '',
                            'photos' => [],
                            'dimensions' => [
                                'length' => $onePhoto['length_cm'],
                                'diametr' => $onePhoto['diametr_cm'],
                                'width' => $onePhoto['width_cm'],
                                'height' => $onePhoto['height_cm'],
                                'mattress' => $onePhoto['mattress_cm'],
                                'niche' => $onePhoto['niche_cm'],
                            ],
                        ];
                    } else {
                        $cnt = (int)$resGroupData[$prntCode]['childs'][$chldCode]['count_lines']+1;
                        $resGroupData[$prntCode]['childs'][$chldCode]['count_lines'] = $cnt;
                    }
                    if(!empty($onePhoto['name_en'])){
                        $resGroupData[$prntCode]['childs'][$chldCode]['name'] = $onePhoto['name_en'];
                    } //unset($onePhoto['name_en']);

                    if(!empty($onePhoto['name_ru'])){
                        $resGroupData[$prntCode]['childs'][$chldCode]['name_ru'] = $onePhoto['name_ru'];
                    } //unset($onePhoto['name_ru']);

                    if(!empty($onePhoto['name_it'])){
                        $resGroupData[$prntCode]['childs'][$chldCode]['name_it'] = $onePhoto['name_it'];
                    } //unset($onePhoto['name_it']);

                    if(!empty($onePhoto['child_descr_en'])){
                        $resGroupData[$prntCode]['childs'][$chldCode]['prev'] = $onePhoto['child_descr_en'];
                    } //unset($onePhoto['child_descr_en']);

                    if(!empty($onePhoto['child_descr_ru'])){
                        $resGroupData[$prntCode]['childs'][$chldCode]['prev_ru'] = $onePhoto['child_descr_ru'];
                    } //unset($onePhoto['child_descr_ru']);

                    if(!empty($onePhoto['child_descr_it'])){
                        $resGroupData[$prntCode]['childs'][$chldCode]['prev_it'] = $onePhoto['child_descr_it'];
                    } //unset($onePhoto['child_descr_it']);

                    $arrPhotos = explode(',', trim($onePhoto['photo']));
                    $keyPhotos = implode('__', $arrPhotos);
                    $resGroupData[$prntCode]['childs'][$chldCode]['photos'][$keyPhotos] = [
                        'photos' => $arrPhotos,
                        'child_code' => $chldCode,
                        'prices' => [
                            't1' => [
                                'f1' => $onePhoto['t1_f1'],
                                'f2' => $onePhoto['t1_f2'],
                                'f3' => $onePhoto['t1_f3'],
                                'f4' => $onePhoto['t1_f4'],
                            ],
                            't2' => [
                                'f1' => $onePhoto['t2_f1'],
                                'f2' => $onePhoto['t2_f2'],
                                'f3' => $onePhoto['t2_f3'],
                                'f4' => $onePhoto['t2_f4'],
                            ],
                            't3' => [
                                'f1' => $onePhoto['t3_f1'],
                                'f2' => $onePhoto['t3_f2'],
                                'f3' => $onePhoto['t3_f3'],
                                'f4' => $onePhoto['t3_f4'],
                            ],
                            't4' => [
                                'f1' => $onePhoto['t4_f1'],
                                'f2' => $onePhoto['t4_f2'],
                                'f3' => $onePhoto['t4_f3'],
                                'f4' => $onePhoto['t4_f4'],
                            ],
                            'tp' => [
                                'f1' => $onePhoto['tp_f1'],
                                'f2' => $onePhoto['tp_f2'],
                                'f3' => $onePhoto['tp_f3'],
                                'f4' => $onePhoto['tp_f4'],
                            ],
                            'tci' => [
                                'f1' => $onePhoto['tci_f1'],
                                'f2' => $onePhoto['tci_f2'],
                                'f3' => $onePhoto['tci_f3'],
                                'f4' => $onePhoto['tci_f4'],
                            ],
                        ]
                    ];
                }
            }
        }
//        echo'<br>';

//        dd($resDatas);
//        dd($resGroupData);
//        dd('excel');
        return $resGroupData;
    }

    /**
     * @param ManageProductRequest $request
     *
     * @return mixed
     */
    public function create(Product $product, ProductChild $child, ProductPhoto $photo, ProductPrice $price, ManageProductRequest $request)
    {
//        $model = $product;
        $langSuf = $this->langSuf;
        $collectionZones = CollectionZone::pluck('title', 'id');

        Cache::flush();
        $import = Cache::remember('get_data_from_import', 24*60, function() {
            return $this->getDataFromImport();
        });
//        dd($import);
        $parentCodes = [
            0 => 'Select PARENT_CODE'
        ];
        $parentChildCodes = [
            0 => [
                0 => 'Select CHILD_CODE'
            ]
        ];
        $childCodes = [
            0 => 'Select CHILD_CODE'
        ];
        foreach ($import as $prntKey => $parent) {
            foreach ($parent['childs'] as $chldKey => $item) {
                if(!empty($prntKey)){
                    if (!isset($parentCodes[$prntKey])) {
                        $parentCodes[$prntKey] = $prntKey;
                    }
                    if (!isset($parentChildCodes[$prntKey])) {
                        $parentChildCodes[$prntKey] = [
                            0 => 'Select CHILD_CODE'
                        ];
                    }
                    $parentChildCodes[$prntKey][$chldKey] = $chldKey;
                }
                if (!isset($childCodes[$chldKey])) {
                    $childCodes[$chldKey] = $chldKey;
                }
            }
        }
//        dd($parentChildCodes);
//        dd($parentCodes);
        $finishTissues = FinishTissue::where('parent_id', '!=', null)
            ->where('short', '!=', '')
            ->get();
        $finishCodes = [];
        $tissueCodes = [];
        foreach ($finishTissues as $item) {
            if($item->type == 'finish'){
                $finishCodes[$item->id] = [
                    'short' => $item->short,
                    'name' => $item->{'title'.$langSuf}.' ['.$item->short.']'
                ];
            }
            if($item->type == 'tissue'){
                $tissueCodes[$item->id] = [
                    'short' => $item->short,
                    'name' => $item->{'title'.$langSuf}.' ['.$item->short.']'
                ];
            }
        }
        $collections = Collection::with('collectionZones')->get();
        $collectionCodes = [];
        foreach ($collections as $collection) {
            $zones = [];

            foreach ($collection->collectionZones as $zone) {
                $zones[$zone->id] = $zone->{'title'.$langSuf};
            }
            if(!empty($zones)){
                $collectionCodes[$collection->id] = [
                    'label' => $collection->{'title'.$langSuf},
                    'group' => $zones
                ];
            }
        }
        $categoryModel = Category::get();
        $categoryCodes = [];
        foreach ($categoryModel as $category) {
            if (empty($category->parent_id)) {
                $categoryCodes[$category->id] = [
                    'label' => $category->{'name'.$langSuf},
                    'group' => []
                ];
            } else {
                $categoryCodes[$category->parent_id]['group'][$category->id] = $category->{'name'.$langSuf};
            }
        }

//dd($categories);
        return view('backend.products.create', [
            'product' => $product,
            'child' => $child,
            'photo' => $photo,
            'price' => $price,
            'importData' => $import,
            'parentCodes' => $parentCodes,
            'parentChildCodes' => $parentChildCodes,
            'childCodes' => $childCodes,
            'finishCodes' => $finishCodes,
            'tissueCodes' => $tissueCodes,
            'categoryCodes' => $categoryCodes,
            'collectionCodes' => $collectionCodes,
        ]);
    }

    /**
     * @param StoreProductRequest $request
     *
     * @return mixed
     */
    public function store(StoreProductRequest $request)
    {
        $this->product->create($request->all());


        return redirect()->route('admin.product.index')->withFlashSuccess(trans('alerts.backend.products.created'));
    }

    /**
     * @param Product $product
     * @param ManageProductRequest $request
     *
     * @return mixed
     */
    public function edit(Product $product, ManageProductRequest $request)
    {
        $langSuf = $this->langSuf;
        $model = $this->product->getOne($product->id, ['childs','photos','photos.prices','photos.prices.child']);
//        dd($model);
        $parentCodes = [
            'ANLettoDOUBLE' => 'ANLettoDOUBLE',
            'BNLettoDOUBLE' => 'BNLettoDOUBLE',
            'CNLettoDOUBLE' => 'CNLettoDOUBLE',
            'DNLettoDOUBLE' => 'DNLettoDOUBLE'
        ];
        $childCodes = [
            'BN8830' => 'BN8830',
            'BN8831' => 'BN8831'
        ];
        $collectionZones = CollectionZone::pluck('title', 'id');
        $finishTissues = FinishTissue::where('parent_id', '!=', null)
            ->where('short', '!=', '')
            ->get();
        $finishCodes = [];
        $tissueCodes = [];
        foreach ($finishTissues as $item) {
            if($item->type == 'finish'){
                $finishCodes[$item->id] = [
                    'short' => $item->short,
                    'name' => $item->{'title'.$langSuf}.' ['.$item->short.']'
                ];
            }
            if($item->type == 'tissue'){
                $tissueCodes[$item->id] = [
                    'short' => $item->short,
                    'name' => $item->{'title'.$langSuf}.' ['.$item->short.']'
                ];
            }
        }
        $categoryModel = Category::get();
        $categoryCodes = [];
        foreach ($categoryModel as $category) {
            if (empty($category->parent_id)) {
                $categoryCodes[$category->id] = [
                    'label' => $category->{'name'.$langSuf},
                    'group' => []
                ];
            } else {
                $categoryCodes[$category->parent_id]['group'][$category->id] = $category->{'name'.$langSuf};
            }
        }

        $collections = Collection::with('collectionZones')->get();
        $collectionCodes = [];
        foreach ($collections as $collection) {
            $zones = [];

            foreach ($collection->collectionZones as $zone) {
                $zones[$zone->id] = $zone->title;
            }
            if(!empty($zones)){
                $collectionCodes[$collection->id] = [
                    'label' => $collection->title,
                    'group' => $zones
                ];
            }
        }

        return view('backend.products.edit', [
            'product' => $model,
            'childCodes' => $childCodes,
            'finishCodes' => $finishCodes,
            'tissueCodes' => $tissueCodes,
            'collectionCodes' => $collectionCodes,
            'categoryCodes' => $categoryCodes,
        ]);
    }

    /**
     * @param Product $product
     * @param UpdateProductRequest $request
     *
     * @return mixed
     */
    public function update(Product $product, UpdateProductRequest $request)
    {
        $this->product->update($product, $request->all());

//        foreach ($request->images as $image) {
//            $this->moveImg($image);
//        }

        return redirect()->route('admin.product.edit', $product->id)->withFlashSuccess(trans('alerts.backend.products.updated'));
    }

    /**
     * @param Product $product
     * @param ManageProductRequest $request
     *
     * @return mixed
     */
    public function destroy(Product $product, ManageProductRequest $request)
    {
        $this->product->delete($product);

        return redirect()->route('admin.product.index')->withFlashSuccess(trans('alerts.backend.products.deleted'));
    }
}
