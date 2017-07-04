<?php

namespace App\Http\Controllers\Backend\Good;

use App\Http\Requests\Backend\Good\ManageGoodRequest;
use App\Http\Requests\Backend\Good\UpdateGoodRequest;
use App\Http\Requests\Backend\Good\StoreGoodRequest;
use App\Models\Category\Category;
use App\Models\Collection\Collection;
use App\Models\Good\Good;
use App\Http\Controllers\Controller;
use App\Models\Zone\Zone;
use App\Repositories\Backend\Good\GoodRepository;

class GoodController extends Controller
{

    /**
     * @var GoodRepository
     */
    protected $good;

    /**
     * @param GoodRepository $good
     */
    public function __construct(GoodRepository $good)
    {
        $this->good = $good;
    }

    /**
     * @param ManageGoodRequest $request
     *
     * @return mixed
     */
    public function index(ManageGoodRequest $request)
    {
        return view('backend.goods.index');
    }

    /**
     * @param ManageGoodRequest $request
     *
     * @return mixed
     */
    public function create(ManageGoodRequest $request)
    {
        $categories = Category::allLeaves()->get()->pluck('name', 'id');
        $collections = Collection::pluck('title', 'id');
        $zones = Zone::pluck('title', 'id');

        return view('backend.goods.create', [
            'categories' => $categories,
            'collections' => $collections,
            'zones' => $zones
        ]);
    }

    /**
     * @param StoreGoodRequest $request
     *
     * @return mixed
     */
    public function store(StoreGoodRequest $request)
    {
        $this->good->create($request->only('category_id', 'collection_id', 'zone_id', 'code', 'name',
            'dimensions', 'tissue', 'finish', 'description'));

        return redirect()->route('admin.good.index')->withFlashSuccess(trans('alerts.backend.goods.created'));
    }

    /**
     * @param Good $good
     * @param ManageGoodRequest $request
     *
     * @return mixed
     */
    public function edit(Good $good, ManageGoodRequest $request)
    {
        $categories = Category::allLeaves()->get()->pluck('name', 'id');
        $collections = Collection::pluck('title', 'id');
        $zones = Zone::pluck('title', 'id');

        return view('backend.goods.edit', [
            'good' => $good,
            'categories' => $categories,
            'collections' => $collections,
            'zones' => $zones
        ]);
    }

    /**
     * @param Good $good
     * @param UpdateGoodRequest $request
     *
     * @return mixed
     */
    public function update(Good $good, UpdateGoodRequest $request)
    {
        $this->good->update($good, $request->only('category_id', 'collection_id', 'zone_id', 'code', 'name',
            'dimensions', 'tissue', 'finish', 'description'));

        return redirect()->route('admin.good.index')->withFlashSuccess(trans('alerts.backend.goods.updated'));
    }

    /**
     * @param Good $good
     * @param ManageGoodRequest $request
     *
     * @return mixed
     */
    public function destroy(Good $good, ManageGoodRequest $request)
    {
        $this->good->delete($good);

        return redirect()->route('admin.good.index')->withFlashSuccess(trans('alerts.backend.goods.deleted'));
    }
}
