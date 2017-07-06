<?php

namespace App\Http\Controllers\Backend\FinishTissue;

use App\Http\Requests\Backend\FinishTissue\ManageFinishTissueRequest;
use App\Http\Requests\Backend\FinishTissue\UpdateFinishTissueRequest;
use App\Http\Requests\Backend\FinishTissue\StoreFinishTissueRequest;
use App\Models\FinishTissue\FinishTissue;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\FinishTissue\FinishTissueRepository;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;


class FinishTissueController extends Controller
{

    /**
     * @var FinishTissueRepository
     */
    protected $finishTissue;

    /**
     * @param FinishTissueRepository $finishTissue
     */
    public function __construct(FinishTissueRepository $finishTissue)
    {
        $this->finishTissue = $finishTissue;
    }

    /**
     * @param ManageFinishTissueRequest $request
     *
     * @return mixed
     */
    public function index(ManageFinishTissueRequest $request)
    {
        return view('backend.finishtissue.index');
    }

    /**
     * @param ManageFinishTissueRequest $request
     *
     * @return mixed
     */
    public function create(ManageFinishTissueRequest $request)
    {
        return view('backend.finishtissue.create');
    }

    /**
     * @param FinishTissue $finishTissue
     * @param StoreFinishTissueRequest $request
     *
     * @return mixed
     */
    public function store(StoreFinishTissueRequest $request)
    {
        $this->finishTissue->create($request->only('type', 'title', 'title_ru', 'title_it'));

        $this->moveImg($request->photo);

        return redirect()->route('admin.finish-tissue.index')->withFlashSuccess(trans('alerts.backend.finishtissue.created'));
    }

    /**
     *
     * @return mixed
     */
    public function storeChild(FinishTissue $finishTissue)
    {
        FinishTissue::create([
            'parent_id' => $finishTissue->id
        ]);

        return redirect()->route('admin.finish-tissue.edit', $finishTissue)->withFlashSuccess(trans('alerts.backend.finishtissue.created_child'));
    }

    /**
     * @param FinishTissue $finishTissue
     * @param ManageFinishTissueRequest $request
     *
     * @return mixed
     */
    public function edit(FinishTissue $finishTissue, ManageFinishTissueRequest $request)
    {
        return view('backend.finishtissue.edit', [
            'finishTissue' => $finishTissue,
        ]);
    }

    /**
     * @param FinishTissue $finishTissue
     * @param UpdateFinishTissueRequest $request
     *
     * @return mixed
     */
    public function update(FinishTissue $finishTissue, UpdateFinishTissueRequest $request)
    {
        dd($request->all());
        $children = $request['children'];

        foreach ($children as $key => $newChild) {
            $oldChild = FinishTissue::find($newChild['id']);
            $oldImage = $oldChild->image;
            $oldChild->parent_id = $finishTissue->id;
            $oldChild->title = $newChild['title'];

            $oldChild->image = $newChild['photo'];
            if ($oldChild->save()) {
                $this->moveImg($newChild['photo'], $oldImage);
            }
        }
        $oldName = $finishTissue->image;
        $this->finishTissue->update($finishTissue, $request->only('type', 'title', 'title_ru', 'title_it'));
        $this->moveImg($request->photo, $oldName);

        return redirect()->route('admin.finish-tissue.index')->withFlashSuccess(trans('alerts.backend.finishtissue.updated'));
    }

    /**
     * @param FinishTissue $finishTissue
     * @param ManageFinishTissueRequest $request
     *
     * @return mixed
     */
    public function destroy(FinishTissue $finishTissue, ManageFinishTissueRequest $request)
    {
        $imgName = $finishTissue->image;
        $this->finishTissue->delete($finishTissue);
        $this->deleteImg($imgName);

        return redirect()->route('admin.finish-tissue.index')->withFlashSuccess(trans('alerts.backend.finishtissue.deleted'));
    }
}
