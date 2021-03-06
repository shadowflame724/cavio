<?php

namespace App\Http\Controllers\Backend\Good;

use App\Http\Requests\Backend\Good\ManageProductRequest;
use App\Http\Requests\Backend\Good\UpdateGoodRequest;
use App\Http\Requests\Backend\Good\StoreGoodRequest;
use App\Models\Category\Category;
use App\Models\Collection\Collection;
use App\Models\CollectionZone\CollectionZone;
use App\Models\FinishTissue\FinishTissue;
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
     * @param ManageProductRequest $request
     *
     * @return mixed
     */
    public function index(ManageProductRequest $request)
    {
        return view('backend.goods.index');
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

        return view('backend.goods.create', [
            'categories' => $categories,
            'collectionZones' => $collectionZones,
            'finishTissues' => $finishTissues,
        ]);
    }

    /**
     * @param StoreGoodRequest $request
     *
     * @return mixed
     */
    public function store(StoreGoodRequest $request)
    {
        $this->good->create($request->all());
        foreach ($request->images as $image) {
            $this->moveImg($image);
        }

        return redirect()->route('admin.good.index')->withFlashSuccess(trans('alerts.backend.goods.created'));
    }

    /**
     * @param Good $good
     * @param ManageProductRequest $request
     *
     * @return mixed
     */
    public function edit(Good $good, ManageProductRequest $request)
    {
        $categories = Category::allLeaves()->get()->pluck('name', 'id');
        $collectionZones = CollectionZone::pluck('title', 'id');
        $finishTissues = FinishTissue::where('parent_id', '!=', null)->get()->pluck('title', 'id');

        return view('backend.goods.edit', [
            'good' => $good,
            'categories' => $categories,
            'collectionZones' => $collectionZones,
            'finishTissues' => $finishTissues,
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
        dd($request->all());
        $this->good->update($good, $request->all());

        foreach ($request->images as $image) {
            $this->moveImg($image);
        }

        return redirect()->route('admin.good.index')->withFlashSuccess(trans('alerts.backend.goods.updated'));
    }

    /**
     * @param Good $good
     * @param ManageProductRequest $request
     *
     * @return mixed
     */
    public function destroy(Good $good, ManageProductRequest $request)
    {
        $this->good->delete($good);

        return redirect()->route('admin.good.index')->withFlashSuccess(trans('alerts.backend.goods.deleted'));
    }
}
