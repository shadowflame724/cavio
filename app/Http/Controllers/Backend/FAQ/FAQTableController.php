<?php

namespace App\Http\Controllers\Backend\FAQ;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\FAQ\FAQRepository;
use App\Http\Requests\Backend\FAQ\ManageFAQRequest;

/**
 * Class FAQTableController.
 */
class FAQTableController extends Controller
{
    /**
     * @var FAQRepository
     */
    protected $faq;

    /**
     * @param FAQRepository $faq
     */
    public function __construct(FAQRepository $faq)
    {
        $this->faq = $faq;
    }

    /**
     * @param ManageFAQRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageFAQRequest $request)
    {
        return Datatables::of($this->faq->getForDataTable())
            ->editColumn('created_at', function ($faq) {
                return $faq->created_at ? with(new Carbon($faq->created_at))->format('m/d/Y') : '';
            })
            ->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->addColumn('actions', function ($faq) {
                return '<a href="'.route('admin.faq.edit', array('faq' => $faq->id)).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a>
                
                <a data-method="delete" data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete" data-trans-title="Are you sure you want to do this?" class="btn btn-xs btn-danger" style="cursor:pointer;" onclick="$(this).find("form").submit();"><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i>
<form action="'.route('admin.faq.destroy', array('faq' => $faq->id)).'"  method="POST" name="delete_item" style="display:none">
   <input type="hidden" name="_method" value="delete">
   <input type="hidden" name="_token" value="'.csrf_token().'">
</form>
</a>';
            })
            ->rawColumns(['question', 'answer', 'actions'])
            ->make(true);
    }
}
