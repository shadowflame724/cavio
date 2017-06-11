<?php

namespace App\Http\Controllers\Backend\News;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\News\NewsRepository;
use App\Http\Requests\Backend\News\ManageNewsRequest;

/**
 * Class NewsTableController.
 */
class NewsTableController extends Controller
{
    /**
     * @var NewsRepository
     */
    protected $news;

    /**
     * @param NewsRepository $news
     */
    public function __construct(NewsRepository $news)
    {
        $this->news = $news;
    }

    /**
     * @param ManageNewsRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageNewsRequest $request)
    {
        return Datatables::of($this->news->getForDataTable())
            ->addColumn('actions', function ($news) {
                return '<a href="'.route('admin.news.edit', array('news' => $news->id)).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a>
                
                <a data-method="delete" data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete" data-trans-title="Are you sure you want to do this?" class="btn btn-xs btn-danger" style="cursor:pointer;" onclick="$(this).find("form").submit();"><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i>
<form action="'.route('admin.news.destroy', array('news' => $news->id)).'"  method="POST" name="delete_item" style="display:none">
   <input type="hidden" name="_method" value="delete">
   <input type="hidden" name="_token" value="'.csrf_token().'">
</form>
</a>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
