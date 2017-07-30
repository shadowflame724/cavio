<?php

namespace App\Http\Controllers\Backend\zone;

use App\Http\Requests\Backend\Zone\ManageZoneRequest;
use App\Http\Requests\Backend\Zone\UpdateZoneRequest;
use App\Http\Requests\Backend\Zone\StoreZoneRequest;
use App\Models\Zone\Zone;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Zone\ZoneRepository;

class zoneController extends Controller
{

    /**
     * @var ZoneRepository
     */
    protected $zone;

    /**
     * @param ZoneRepository $zone
     */
    public function __construct(ZoneRepository $zone)
    {
        $this->zone = $zone;
    }

    /**
     * @param ManageZoneRequest $request
     *
     * @return mixed
     */
    public function index(ManageZoneRequest $request)
    {
        return view('backend.zones.index');
    }

    /**
     * @param ManageZoneRequest $request
     *
     * @return mixed
     */
    public function create(ManageZoneRequest $request)
    {
        return view('backend.zones.create');
    }

    /**
     * @param StoreZoneRequest $request
     *
     * @return mixed
     */
    public function store(StoreZoneRequest $request)
    {
        $this->zone->create($request->all());
        $this->moveImg($request->photo);

        return redirect()->route('admin.zone.index')->withFlashSuccess(trans('alerts.backend.zone.created'));
    }

    /**
     * @param Zone $zone
     * @param ManageZoneRequest $request
     *
     * @return mixed
     */
    public function edit(Zone $zone, ManageZoneRequest $request)
    {
        return view('backend.zones.edit', [
            'zone' => $zone,
        ]);
    }

    /**
     * @param Zone $zone
     * @param UpdateZoneRequest $request
     *
     * @return mixed
     */
    public function update(Zone $zone, UpdateZoneRequest $request)
    {
        $oldName = $zone->image;
        $this->zone->update($zone, $request->all());
        $this->moveImg($request->photo, $oldName);

        return redirect()->route('admin.zone.index')->withFlashSuccess(trans('alerts.backend.zone.updated'));
    }

    /**
     * @param Zone $zone
     * @param ManageZoneRequest $request
     *
     * @return mixed
     */
    public function destroy(Zone $zone, ManageZoneRequest $request)
    {
        $imgName = $zone->image;
        $this->zone->delete($zone);
        $this->deleteImg($imgName);

        return redirect()->route('admin.zone.index')->withFlashSuccess(trans('alerts.backend.zone.deleted'));
    }
}
