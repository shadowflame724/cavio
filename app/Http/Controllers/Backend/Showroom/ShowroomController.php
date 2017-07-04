<?php

namespace App\Http\Controllers\Backend\Showroom;

use App\Http\Requests\Backend\Showroom\ManageShowroomRequest;
use App\Http\Requests\Backend\Showroom\UpdateShowroomRequest;
use App\Http\Requests\Backend\Showroom\StoreShowroomRequest;
use App\Models\Showroom\Showroom;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Showroom\ShowroomRepository;


class ShowroomController extends Controller
{

    /**
     * @var ShowroomRepository
     */
    protected $showroom;

    /**
     * @param ShowroomRepository $showroom
     */
    public function __construct(ShowroomRepository $showroom)
    {
        $this->showroom = $showroom;
    }

    /**
     * @param ManageShowroomRequest $request
     *
     * @return mixed
     */
    public function index(ManageShowroomRequest $request)
    {
        return view('backend.showrooms.index');
    }

    /**
     * @param ManageShowroomRequest $request
     *
     * @return mixed
     */
    public function create(ManageShowroomRequest $request)
    {
        return view('backend.showrooms.create');
    }

    /**
     * @param StoreShowroomRequest $request
     *
     * @return mixed
     */
    public function store(StoreShowroomRequest $request)
    {
        $this->showroom->create($request->all());

        return redirect()->route('admin.showroom.index')->withFlashSuccess(trans('alerts.backend.showroom.created'));
    }

    /**
     * @param Showroom $showroom
     * @return mixed
     */
    public function edit(Showroom $showroom)
    {
        return view('backend.showrooms.edit', [
            'showroom' => $showroom,
        ]);
    }

    /**
     * @param Showroom $showroom
     * @param UpdateShowroomRequest $request
     *
     * @return mixed
     */
    public function update(Showroom $showroom, UpdateShowroomRequest $request)
    {
        $this->showroom->update($showroom, $request->all());

        return redirect()->route('admin.showroom.index')->withFlashSuccess(trans('alerts.backend.showroom.updated'));
    }

    /**
     * @param Showroom $showroom
     * @param ManageShowroomRequest $request
     *
     * @return mixed
     */
    public function destroy(Showroom $showroom, ManageShowroomRequest $request)
    {
        $this->showroom->delete($showroom);

        return redirect()->route('admin.showrooms.index')->withFlashSuccess(trans('alerts.backend.showroom.deleted'));
    }
}
