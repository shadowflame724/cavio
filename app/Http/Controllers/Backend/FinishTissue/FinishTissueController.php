<?php

namespace App\Http\Controllers\Backend\FinishTissue;

use App\Http\Requests\Backend\FinishTissue\ManageFinishTissueRequest;
use App\Http\Requests\Backend\FinishTissue\UpdateFinishTissueRequest;
use App\Http\Requests\Backend\FinishTissue\StoreFinishTissueRequest;
use App\Models\Collection\Collection;
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
        $parents = FinishTissue::where('parent_id', null)->get();

        return view('backend.finishtissue.create', [
            'parents' => $parents]);
    }

    /**
     * @param StoreFinishTissueRequest $request
     *
     * @return mixed
     */
    public function store(StoreFinishTissueRequest $request)
    {
        if ($request->parent != 'rootFinish' AND $request->parent != 'rootTissue') {
        $this->validate($request, [
            'short' => 'required|max:10',
            'photo' => 'required',
        ]);
    }
        $this->finishTissue->create($request->all());

        $this->moveImg($request->photo);

        return redirect()->route('admin.finish-tissue.index')->withFlashSuccess(trans('alerts.backend.finishtissue.created'));
    }

    /**
     * @param FinishTissue $finishTissue
     * @param ManageFinishTissueRequest $request
     *
     * @return mixed
     */
    public function edit(FinishTissue $finishTissue, ManageFinishTissueRequest $request)
    {
        $parents = FinishTissue::where('parent_id', null)->get();

        return view('backend.finishtissue.edit', [
            'finishTissue' => $finishTissue,
            'parents' => $parents
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
        $oldName = $finishTissue->image;
        if ($request->parent != 'rootFinish' AND $request->parent != 'rootTissue') {
            $this->validate($request, [
                'short' => 'required|max:10',
                'photo' => 'required',
            ]);
        }
        $this->finishTissue->update($finishTissue, $request->all());

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

        if ($finishTissue->children()->count() > 0) {
            return redirect()->route('admin.finish-tissue.index')->withErrors(trans('exceptions.backend.access.finishtissue.delete_with_child_error'));
        }
        $this->finishTissue->delete($finishTissue);
        $this->deleteImg($imgName);

        return redirect()->route('admin.finish-tissue.index')->withFlashSuccess(trans('alerts.backend.finishtissue.deleted'));
    }
}
