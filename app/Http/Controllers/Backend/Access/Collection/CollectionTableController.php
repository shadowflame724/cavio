<?php

namespace App\Http\Controllers\Backend\Access\Collection;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Access\Collection\CollectionRepository;
use App\Http\Requests\Backend\Access\Collection\ManageCollectionRequest;

/**
 * Class CollectionTableController.
 */
class CollectionTableController extends Controller
{
    /**
     * @var CollectionRepository
     */
    protected $collection;

    /**
     * @param CollectionRepository $collection
     */
    public function __construct(CollectionRepository $collection)
    {
        $this->collection = $collection;
    }

    /**
     * @param ManageCollectionRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageCollectionRequest $request)
    {
        return Datatables::of($this->collection->getForDataTable())
            ->addColumn('actions', function ($collection) {
                return '<a href="collection/' . $collection->id . '/edit" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a>
                
                <a data-method="delete" data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete" data-trans-title="Are you sure you want to do this?" class="btn btn-xs btn-danger" style="cursor:pointer;" onclick="$(this).find("form").submit();"><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i>
<form action="collection/' . $collection->id . '"  method="POST" name="delete_item" style="display:none">
   <input type="hidden" name="_method" value="delete">
   <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
</form>
</a>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
