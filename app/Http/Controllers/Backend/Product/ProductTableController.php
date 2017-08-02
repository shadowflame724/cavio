<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Models\Collection\Collection;
use App\Models\CollectionZone\CollectionZone;
use Carbon\Carbon;
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
            ->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->addColumn('actions', function ($product) {
                return '<a href="' . route('admin.product.edit', array('product' => $product->id)) . '" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a>

                <a data-method="delete" data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete" data-trans-title="Are you sure you want to do this?" class="btn btn-xs btn-danger" style="cursor:pointer;" onclick="$(this).find("form").submit();"><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i>
<form action="' . route('admin.product.destroy', array('product' => $product->id)) . '"  method="POST" name="delete_item" style="display:none">
   <input type="hidden" name="_method" value="delete">
   <input type="hidden" name="_token" value="' . csrf_token() . '">
</form>
</a>';
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
        $langSuf = '';
        if (\Lang::getLocale() == 'ru') {
            $langSuf = '_ru';
        } elseif (\Lang::getLocale() == 'it') {
            $langSuf = '_it';
        }

        $products = Datatables::of($this->product->getForPricesDataTable($langSuf))
            ->editColumn('parent_created_at', function ($product) {
                return $product->parent_created_at ? with(new Carbon($product->parent_created_at))->format('m/d/Y') : '';
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
            ->editColumn('child_product_code', function ($product) {
                return '<a href="' . route('admin.product.edit', array('product' => $product->parent_id)) . '">'.$product->child_product_code.'</a>
            ';
            })
            ->rawColumns(['child_product_code', 'photos'])
            ->make(true);

        return $products;
    }
}
