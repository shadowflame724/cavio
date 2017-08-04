<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Collection\Collection;
use App\Models\CollectionZone\CollectionZone;
use App\Models\FinishTissue\FinishTissue;
use App\Models\Zone\Zone;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Product\ProductRepository;
use App\Http\Requests\Backend\Product\ManageProductRequest;

/**
 * Class ProductTableController.
 */
class ProductTableController extends Controller
{
    /**
     * @var ProductRepository
     */
    protected $product;

    /**
     * @return mixed
     */
    public function getCollections()
    {
        return $this->collections;
    }

    /**
     * @param mixed $collections
     */
    public function setCollections($collections)
    {
        $this->collections = $collections;
    }

    /**
     * @return mixed
     */
    public function getZones()
    {
        return $this->zones;
    }

    /**
     * @param mixed $zones
     */
    public function setZones($zones)
    {
        $this->zones = $zones;
    }

    protected $collections;

    protected $zones;

    /**
     * @param ProductRepository $product
     */
    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }

    /**
     * @param ManageProductRequest $request
     *
     * @return mixed
     */
    public function simpleTable(ManageProductRequest $request)
    {
        return Datatables::of($this->product->getForDataTable())
            ->editColumn('created_at', function ($product) {
                return $product->created_at ? with(new Carbon($product->created_at))->format('m/d/Y') : '';
            })
            ->editColumn('published', function ($product) {
                return $product->published ? 'Yes' : 'No';
            })
            ->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->addColumn('actions', function ($product) {
                return '<a href="' . route('admin.product.edit', array('product' => $product->id)) . '" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a>
<a href="' . route('admin.product.duplicate', array('product' => $product->id)) . '" class="btn btn-xs btn-primary"><i class="fa fa-clone" data-toggle="tooltip" data-placement="top" title="" data-original-title="Duplicate"></i></a>

                <a data-method="delete" data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete" data-trans-title="Are you sure you want to do this?" class="btn btn-xs btn-danger" style="cursor:pointer;" onclick="$(this).find("form").submit();"><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i>
<form action="' . route('admin.product.destroy', array('product' => $product->id)) . '"  method="POST" name="delete_item" style="display:none">
   <input type="hidden" name="_method" value="delete">
   <input type="hidden" name="_token" value="' . csrf_token() . '">
</form>
</a>
';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    /**
     * @param ManageProductRequest $request
     *
     * @return mixed
     */
    public function fullDataTable(ManageProductRequest $request)
    {

        $products = Datatables::of($this->product->getForPricesDataTable($this->getLangSuf()))
            ->editColumn('parent_created_at', function ($product) {
                return $product->parent_created_at ? with(new Carbon($product->parent_created_at))->format('m/d/Y') : '';
            })
            ->addColumn('published', function ($product) {
                $price_published = $product->price_published;
                $child_published = $product->child_published;
                $photo_published = $product->photo_published;
                $product_published = $product->product_published;
                $publish = 'No';
                if($price_published && $child_published && $photo_published && $product_published){
                    $publish = 'Yes';
                }
                return $publish;
            })
            ->filterColumn('parent_created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->editColumn('parent_updated_at', function ($product) {
                return $product->parent_updated_at ? with(new Carbon($product->parent_updated_at))->format('m/d/Y') : '';
            })
            ->filterColumn('parent_created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->editColumn('photos', function ($product) {
                $photoArr = explode(',', $product->photos);
                return '<img class="table_photo" src="/upload/products/' . $photoArr[0] . '" alt="">';
            })
            ->editColumn('finish_name', function ($product) {
                $langSuf = $this->getLangSuf();
                $finishes = FinishTissue::where('parent_id', '!=', null)
                    ->where('type', '=', 'finish')
                    ->select('id', 'title' . $langSuf)->get();
                $finishArr = explode(',', $product->finish_ids);
                $string = '';
                foreach ($finishes as $finishDB) {
                    foreach ($finishArr as $finish) {
                        if ($finishDB->id == $finish) {
                            $string .= $finishDB['title' . $langSuf] . ', ';
                        }
                    }
                }

                return rtrim($string, ', ');
            })
            ->editColumn('tissue_name', function ($product) {
                $langSuf = $this->getLangSuf();
                $tissues = FinishTissue::where('parent_id', '!=', null)
                    ->where('type', '=', 'tissue')
                    ->select('id', 'title' . $langSuf)->get();
                $tissueArr = explode(',', $product->tissue_ids);
                $string = '';
                foreach ($tissues as $tissueDB) {
                    foreach ($tissueArr as $tissue) {
                        if ($tissueDB->id == $tissue) {
                            $string .= $tissueDB['title' . $langSuf] . ', ';
                        }
                    }
                }

                return rtrim($string, ', ');
            })
            ->addColumn('collection_zones_name', function ($product) {
                $langSuf = $this->getLangSuf();
                $colZones = CollectionZone::all('id', 'collection_id', 'zone_id', 'name' . $langSuf);
                $colZonesArr = explode(',', $product->collection_zone_ids);
                $string = '';
                $collection_ids = '';
                $zonesName = '';
                $collectionNames = '';
                foreach ($colZones as $colZone) {
                    foreach ($colZonesArr as $zone) {
                        if ($colZone->id == $zone) {
                            $string .= $colZone['name' . $langSuf] . ', ';
                            $collection_ids = $colZone->collection_id . ',';
                            $zone_id = $colZone->zone_id;
                            $zone = Zone::where('id', $zone_id)->select('name' . $langSuf)->first();
                            $zonesName .= $zone['name' . $langSuf] . ', ';
                        }
                    }
                }
                $collections = Collection::whereIn('id', [$collection_ids])->select('name' . $langSuf)->get()->pluck('name' . $langSuf);
                foreach ($collections as $collection) {
                    $collectionNames .= $collection . ', ';
                }

                $this->setCollections($collectionNames);
                $this->setZones($zonesName);

                return rtrim($string, ', ');
            })
            ->editColumn('categories_name', function ($product) {
                $langSuf = $this->getLangSuf();
                $categories = Category::all('id', 'name' . $langSuf);
                $catArr = explode(',', $product->categories_ids);
                $string = '';
                foreach ($categories as $category) {
                    foreach ($catArr as $cat) {
                        if ($category->id == $cat) {
                            $string .= $category['name' . $langSuf] . ', ';
                        }
                    }
                }

                return rtrim($string, ', ');
            })
            ->addColumn('collection_name', function ($product) {
                $string = $this->getCollections();

                return rtrim($string, ', ');
            })
            ->addColumn('comments', function ($product) {
                $string = '<button type="button" '.
                    'class="btn btn-xs btn-default comments" data-container="body" '.
                    'data-toggle="popover" data-placement="left" data-html="true" '.
                    'data-content="<b>Product:</b> ' . $product->parent_prev . '<br>
<b>Child:</b> ' . $product->child_product_prev . '<br>
<b>Photo:</b> ' . $product->photos_prev . '">See comments</button>';
                return $string;
            })
            ->addColumn('zones_name', function ($product) {
                $string = $this->getZones();

                return rtrim($string, ', ');
            })
            ->editColumn('parent_code', function ($product) {
                return '<a href="' . route('admin.product.edit', array('product' => $product->parent_id)) . '">' . $product->parent_code . '</a>
            ';
            })
            ->rawColumns(['parent_code', 'photos', 'comments'])
            ->make(true);

        return $products;
    }

    public function getLangSuf()
    {
        $langSuf = '';
        if (\Lang::getLocale() == 'ru') {
            $langSuf = '_ru';
        } elseif (\Lang::getLocale() == 'it') {
            $langSuf = '_it';
        }

        return $langSuf;
    }
}
