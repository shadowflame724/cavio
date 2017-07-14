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
use App\Http\Controllers\Controller;
use App\Models\Zone\Zone;
use App\Repositories\Backend\Product\ProductRepository;

class ProductController extends Controller
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
    public function index(ManageProductRequest $request)
    {
        return view('backend.products.index');
    }

    /**
     * @param ManageProductRequest $request
     *
     * @return mixed
     */
    public function create(ManageProductRequest $request)
    {
        $categories = Category::allLeaves()->get()->pluck('name', 'id');
        $collectionZones = CollectionZone::pluck('title', 'id');
        $finishTissues = FinishTissue::where('parent_id', '!=', null)->get()->pluck('title', 'id');

        return view('backend.products.create', [
            'categories' => $categories,
            'collectionZones' => $collectionZones,
            'finishTissues' => $finishTissues,
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
        foreach ($request->images as $image) {
            $this->moveImg($image);
        }

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
        $model = $this->product->getOne($product->id, ['childs','photos']);
//        dd($model);
        $categories = Category::allLeaves()->get()->pluck('name', 'id');
        $collectionZones = CollectionZone::pluck('title', 'id');
        $finishTissues = FinishTissue::where('parent_id', '!=', null)->get()->pluck('title', 'id');

        return view('backend.products.edit', [
            'product' => $model,
            'categories' => $categories,
            'collectionZones' => $collectionZones,
            'finishTissues' => $finishTissues,
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
        dd($request->all());
        $this->product->update($product, $request->all());

        foreach ($request->images as $image) {
            $this->moveImg($image);
        }

        return redirect()->route('admin.product.index')->withFlashSuccess(trans('alerts.backend.products.updated'));
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
